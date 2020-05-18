<?php

namespace App\Http\Controllers;

use App\Bookings;
use App\Category;
use App\Contacts;
use App\Http\Requests\ContactRequest;
use App\Rooms;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function index()
    {
        $cate = Category::where('status', 1)->get();
        return view('client.pages.index', ['cate' => $cate]);


    }
//    public function room()
//    { $room3 = Rooms::where('status', 1)->get();
//        return view('client.pages.room', ['room3' => $room3]);
//    }

    public function restaurant()
    {
        return view('client.pages.restaurant');
    }

    public function findrooms(Request $request)
    {
        if ($request->date_from == '' || $request->date_to == '') {
            $room3 = Rooms::where('status', 1)->get();
            if ($request->key != null) {
                $room3 = Rooms::where('idCategory', '=', $request->key)
                    ->where('status', 1)
                    ->get();
            }
        } elseif ($request->key == null) {
            $room3 = Rooms::WhereNotIn('date_from', [$request->date_from])
                ->whereNotIn('date_to', [$request->date_to])
                ->get();
        } else {
            $room3 = Rooms::WhereNotIn('date_from', [$request->date_from])
                ->whereNotIn('date_to', [$request->date_to])
                ->where('idCategory', '=', $request->key)
                ->get();
        }

        return view('client.pages.book', compact('room3'));
    }

    public function rooms()
    {
        $cate = Category::where('status', 1)->get();
        return view('client.pages.room', ['room' => $cate]);
    }

    public function about()
    {

        return view('client.pages.about');
    }

    public function contact()
    {
        return view('client.pages.contact');
    }

    public function contactPost(ContactRequest $request)
    {
//
        Contacts::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,

        ]);
        return redirect('/')->with('thongbao', 'Cảm ơn đã gửi phản hồi');
    }

    public function getDetail($slug)
    {
        $cate = Category::where('slug', $slug)->where('status', 1)->first();
        return view('client.pages.roomsingle', ['cate' => $cate]);
    }

    public function infor()
    {
        if (Auth::check()) {
            return view('client.pages.information');

        } else {
            return redirect()->to('/');
        }
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request,
            [
                'fullname' => 'required|min:5|max:255',
                'address' => 'required|min:5|max:255',
                'birthday' => 'required',
                'CMND' => 'required|numeric',
                'phone' => 'required|numeric',
            ],
            [
                'fullname.required' => 'Họ và Tên không được bỏ trống',
                'address.required' => 'Họ và Tên không được bỏ trống',
                'birthday.required' => 'Ngày sinh không được bỏ trống',
                'CMND.required' => 'CMND không được bỏ trống',
                'phone.required' => 'Số điện thoại không được bỏ trống',
                'fullname.min' => 'Họ và Tên phải có tối thiểu 5 ký tự',
                'address.min' => 'Địa chỉ phải có tối thiểu 5 ký tự',
                'CMND.min' => 'CMND phải có tối thiểu 6 ký tự',
                'fullname.max' => 'Họ và Tên tối đa 255 ký tự',
                'address.max' => 'Địa chỉ tối đa 255 ký tự',
                'CMND.max' => 'CMND tối đa 9 ký tự',
                'CMND.numeric' => 'CMND phải là số',
                'phone.numeric' => 'Số điện thoại phải là số',
            ]
        );
        $user = User::find(Auth::user()->id);
        $user->fullname = $request->fullname;
        $user->birthday = $request->birthday;
        $user->CMND = $request->CMND;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->save();
        return back()->with('thongbao', 'Đã cập nhật thông tin cá nhân thành công');
    }

//    public function getSearch(Request $request){
//        $room = Rooms::WhereDate('begin','like','%'.$request->key)
//    }
}
