<?php

namespace App\Http\Controllers;

use App\Bookings;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function redirectProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $user = Socialite::driver($social)->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return back()->with('thongbao', 'Đăng nhập thành công');
    }

    private function findOrCreateUser($user)
    {
        $authUser = User::where('social_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        } else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'social_id' => $user->id,
                'ruler' => 0,
                'status' => 0,
                'avatar' => $user->avatar,
            ]);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect('/')->with('thongbao','Đăng xuất thành công');
        }
    }

    public function loginClient(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data, $request->has('remember'))) {
            return back()->with('thongbao', 'Đăng nhập thành công');
        } else {
            return back()->with('error', 'Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }

    public function registerClient(Request $request)
    {

        $this->validate($request,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:255',
                're_password' => 'required|same:password',
            ],
            [
                'name.required' => 'Họ và tên không được bỏ trống',
                'name.min' => 'Họ và tên phải có tối thiểu 2 ký tự',
                'name.max' => 'Họ và tên tối đa có 255 ký tự',
                'email.required' => 'Địa chỉ email không được bỏ trống',
                'email.email' => 'Địa chỉ email nhập không đúng định dạng',
                'email.unique' => 'Đã tồn tại địa chỉ email trong hệ thống',
                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 ký tự',
                'password.max' => 'Mật khẩu tối đa có 255 ký tự',
                're_password.required' => 'Không được bỏ trống',
                're_password.same' => 'Nhập không đúng với trường mật khẩu',
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return back()->with('thongbao','Đăng ký tài khoản thành công');
    }

    public function updateUser(Request $request)
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
        if($user = User::find(Auth::user()->id)){}
        $user->fullname = $request->fullname;
        $user->birthday = $request->birthday;
        $user->CMND = $request->CMND;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->save();
        return back()->with('thongbao', 'Đã cập nhật thông tin cá nhân thành công');

    }
    public function loginAdmin(Request $request) {
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            if(Auth::user()->role > 0)
                return redirect('admin/')
                    ->with('thongbao','Đăng nhập thành công');
        }else{
            return redirect('admin/login')
                ->with('error','Đăng nhập thất bại. Xin vui lòng kiểm tra lại tài khoản');
        }
    }
    public function reservation(){
        $user = User::find(Auth::user()->id);

        $booking = Bookings::where('idUser',$user->id)->get();
        return view('client.pages.reservation', compact( 'booking'));
    }
}
