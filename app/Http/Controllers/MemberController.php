<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Contacts;
use App\Http\Requests\MemberRequest;
use App\User;
use Hash;
use File;
use Validator;
use Illuminate\Http\Request;
use Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->can('view', User::class)) {
            $member = User::where('role', '>=', 1)->paginate(10);
            $contact = Contacts::all();
            $booking = Bookings::where('status', 1)->get();
            return view('admin.pages.user.member', compact('member', 'contact', 'booking'));
        } else

            return redirect('admin/error');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->can('view', User::class)) {
            $contact = Contacts::all();
            $booking = Bookings::where('status', 1)->get();
            return view('admin.pages.user.addmember', compact('contact', 'booking'));
        } else

            return redirect('admin/error');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $user = Auth::user();
        if ($user->can('view', User::class)) {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                //Lấy tên file
                $file_name = $file->getClientOriginalName();
                //Lấy loại file
                $file_type = $file->getMimeType();
                //Kích thước file với đơn vị byte
                $file_size = $file->getSize();
                if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                    if ($file_size <= 2048576) {
                        $file_name = date('D-m-yyyy') . '-' . rand() . '-' . utf8tourl($file_name);
                        if ($file->move('img/upload/avatar', $file_name)) {
                            $data = $request->all();
                            if ($request->password == $request->password2) {
                                $data['avatar'] = $file_name;
                                $data['password'] = Hash::make($request->password);
                                User::create($data);
                                return redirect()->route('member.index')->with('thongbao', 'Đã thêm thành công nhân viên mới');
                            }
                            return back()->with('error', 'Mật khẩu không trùng khớp');
                        }
                    } else {
                        return back()->with('error', 'Bạn không thể upload ảnh quá 1mb');
                    }
                } else {
                    return back()->with('error', 'File bạn chọn không là hình ảnh');
                }
            } else {
                return back()->with('error', 'Bạn chưa thêm ảnh minh họa cho nhân viên');
            }

        } else

            return redirect('admin/error');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->can('view', User::class)) {
            $member = User::find($id);
            return response()->json(['member' => $member], 200);
        } else

            return redirect('admin/error');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->can('view', User::class)) {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|min:5|max:255',
                    'email' => 'required|email|',
                    'phone' => 'required|numeric',
                    'address' => 'required|min:5|max:255',
                    'birthday' => 'required',

                ],
                [
                    'required' => ':attribute không được bỏ trống',
                    'email' => ':attribute không đúng định dạng địa chỉ email',
                    'numeric' => ':attribute không đúng định dạng số ',
                    'min' => ':attribute tối thiểu có 5 ký tự',
                    'max' => ':attribute tối đa có 255 ký tự',
                ],
                [
                    'name' => 'Họ và tên',
                    'email' => 'Địa chỉ email',
                    'birthday' => 'Ngày sinh',
                    'CMND' => 'Số chứng minh nhân dân',
                    'phone' => 'Số điện thoại',
                    'address' => 'Địa chỉ nơi ở',

                ]
            );
            if ($validator->fails()) {
                return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
            }
            $member = User::find($id);
            $data = $request->all();
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                //Lấy tên file
                $file_name = $file->getClientOriginalName();
                //Lấy loại file
                $file_type = $file->getMimeType();
                //Kích thước file với đơn vị byte
                $file_size = $file->getSize();
                if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                    if ($file_size <= 2048576) {
                        $file_name = date('d-mm-YYYY') . '-' . rand() . '-' . utf8tourl($file_name);
                        if ($file->move('img/upload/avatar', $file_name)) {
                            $data['avatar'] = $file_name;
                            if (File::exists('img/upload/avatar' . $member->avatar)) {
                                //Xóa file
                                unlink('img/upload/avatar' . $member->avatar);
                            }
                        }
                    } else {
                        return response()->json(['error', 'Dung lượng file quá lớn'], 200);
                    }
                } else {
                    return response()->json(['error', 'File bạn chọn không phải hình ảnh'], 200);
                }
            } else {
                $data['avatar'] = $member->avatar;
            }
            $member->update($data);
            return response()->json(['result' => 'Đã sửa thành công nhân viên có id là ' . $id], 200);
        } else

            return redirect('admin/error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user->can('view', Category::class)) {
            $member = User::find($id);
            $member->delete();
            return response()->json(['success' => 'Xóa thành công']);
        } else

            return redirect('admin/error');
    }
}
