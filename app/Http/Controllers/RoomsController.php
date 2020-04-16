<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomsRequest;
use App\Rooms;
use Illuminate\Http\Request;
use App\Category;
use App\Kind_Rooms;
use File;
use Validator;


class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Rooms::paginate(5);
        return view('admin.pages.rooms.list', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->get();
        $kindrooms = Kind_Rooms::where('status', 1)->get();
        return view('admin.pages.rooms.create', compact('category', 'kindrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRoomsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if ($file_size <= 2048576) {
                    $file_name = date('D-m-yyyy') . '-' . rand() . '-' . utf8tourl($file_name);
                    if ($file->move('img/upload/rooms', $file_name)) {
                        $data = $request->all();
                        $data['slug'] = utf8tourl($request->number_room);
                        $data['image'] = $file_name;
                        Rooms::create($data);
                        return redirect()->route('rooms.index')->with('thongbao', 'Đã thêm thành công sản phẩm mới');
                    }
                } else {
                    return back()->with('error', 'Bạn không thể upload ảnh quá 1mb');
                }
            } else {
                return back()->with('error', 'File bạn chọn không là hình ảnh');
            }
        } else {
            return back()->with('error', 'Bạn chưa thêm ảnh minh họa cho sản phẩm');
        }
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
    public function edit($id)
    {
        $category = Category::where('status', 1)->get();
        $kindrooms = Kind_Rooms::where('status', 1)->get();
        $rooms = Rooms::find($id);
        return response()->json(['category' => $category, 'kindrooms' => $kindrooms, 'room' => $rooms], 200);
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
        $validator = Validator::make($request->all(),
            [
                'number_room' => 'required|min:2|max:255',
                'image' => 'image',
                'description' => 'required|min:10',
                'price' => 'required|numeric',
                'sale' => 'numeric',
                'created_at' => 'required|date|after:tomorrow',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'min' => ':attribute tối thiểu có 2 ký tự',
                'max' => ':attribute tối đa có 255 ký tự',
                'numeric' => ':attribute phải là một số ',
                'image' => ':attribute không là hình ảnh',
                'after' => ':attribute vào phải lớn hơn hoặc bằng ngày hiện tại',
            ],
            [
                'number_room' => 'Tên phòng',
                'description' => 'Mô tả phòng',
                'price' => 'Đơn giá phòng',
                'sale' => 'Giá khuyến mại',
                'image' => 'Ảnh minh họa',
                'created_at' => 'ngày vào',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => 'true', 'message' => $validator->errors()], 200);
        }
        $rooms = Rooms::find($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if ($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif') {
                if ($file_size <= 2048576) {
                    $file_name = date('d-mm-YYYY') . '-' . rand() . '-' . utf8tourl($file_name);
                    if ($file->move('img/upload/rooms', $file_name)) {
                        $data['image'] = $file_name;
                        if (File::exists('img/upload/rooms' . $rooms->image)) {
                            //Xóa file
                            unlink('img/upload/rooms' . $rooms->image);
                        }
                    }
                } else {
                    return response()->json(['error', 'Dung lượng file quá lớn'], 200);
                }
            } else {
                return response()->json(['error', 'File bạn chọn không phải hình ảnh'], 200);
            }
        } else {
            $data['image'] = $rooms->image;
        }
        $rooms->update($data);
        return response()->json(['result' => 'Đã sửa thành công phòng có id là ' . $id], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $rooms = Rooms::find($id);
        if (File::exists('img/upload/rooms/' . $rooms->image)) {
            unlink('img/upload/rooms/' . $rooms->image);
        }
        $rooms->delete();
        return response()->json(['result' => 'Đã xóa thành công phòng có id là ' . $id], 200);
    }

}
