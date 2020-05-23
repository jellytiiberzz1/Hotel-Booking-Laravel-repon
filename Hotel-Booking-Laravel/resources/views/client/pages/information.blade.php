@extends('client.layout.master')

@section('title')Thông tin cá nhân
@endsection
@section('content6')
<div class="opaPr">
    <div class="wrapper" style="background-image: url('{{asset('client/images/swimming-pool.jpg')}}');">
        <div class="inner">
            <div class="image-holder">
                <img style="width: 400px;height: 530px; margin-top: 70px;"
                     src="@if(Auth::user()->avatar==""){{asset('client/images/default.png')}} @else {{Auth::user()->avatar}}@endif"
                     alt="">
            </div>
            <form action="/edituser" method="post">
                @csrf
                <h3>Thông tin cá nhân</h3><br>
                <div class="form-wrapper1">
                    <input readonly type="text" name="name" value="{{Auth::user()->name}}" class="form-control1">
                </div>
                <div class="form-wrapper1">
                    <input type="text" value="{{Auth::user()->fullname}}" placeholder="Họ và Tên" name="fullname"
                           class="form-control1">
                    @if($errors->has('fullname'))
                        <div class="alert alert-danger">
                            {{ $errors->first('fullname') }}
                        </div>
                    @endif
                </div>
                <div class="form-wrapper1"><h1 style="font-size: 13px;">Ngày Sinh</h1>
                    <input type="date"  value="{{Auth::user()->birthday}}" name="birthday" class="form-control1">

                </div>
                <div class="form-wrapper1">
                    <input type="number" name="CMND" placeholder="CMND" value="{{Auth::user()->CMND}}"
                           class="form-control1">
                    @if($errors->has('CMND'))
                        <div class="alert alert-danger">
                            {{ $errors->first('CMND') }}
                        </div>
                    @endif
                </div>
                <div class="form-wrapper1">
                    <input type="number" name="phone" placeholder="Số điện thoại" value="{{Auth::user()->phone}}"
                           class="form-control1">
                    @if($errors->has('phone'))
                        <div class="alert alert-danger">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-wrapper1">
                    <input readonly type="email" name="email" placeholder="Địa Chỉ Email"
                           value="{{Auth::user()->email}}" class="form-control1">

                </div>
                <div class="form-wrapper1">
                    <select name="gender" id="" class="form-control1">
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Khác</option>
                    </select>
                </div>
                <div class="form-wrapper1">
                    <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Địa chỉ" class="form-control1">
                    @if($errors->has('address'))
                        <div class="alert alert-danger">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                <button>Xác nhận</button>
            </form>
        </div>
    </div>
</div>
@endsection
