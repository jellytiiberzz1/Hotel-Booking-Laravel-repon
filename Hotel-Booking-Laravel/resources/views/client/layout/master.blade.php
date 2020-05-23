<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Supportel | @yield('title')</title>
    <link rel="icon" href="https://www.freelogodesign.org/file/app/client/thumb/74c59f4e-ccef-4118-a250-8086ebcd74d6_200x200.png?1589823320764" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('client/css/login.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('client/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}" type="text/css" media="all" >
    <link rel="stylesheet" href="{{asset('client/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style2.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style3.css')}}">
    <link rel="stylesheet" href="{{asset('libraries/css/toastr.css')}}">
</head>
<body>

{{--nav--}}
@include('client.layout.header')
{{--login--}}
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center"><i>Đăng nhập</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Địa Chỉ Email</label>
                        <input type="text" class="form-control" placeholder=" " name="email">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" placeholder=" " name="password">
                    </div>
                    <div class="sub-w3l">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name='remember' id="customControlAutosizing">
                            <label class="custom-control-label" for="customControlAutosizing" >Nhớ Mật Khẩu?</label>
                        </div>
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="btn btn-warning" value="Đăng Nhập">
                    </div>
                    <p class="text-center dont-do mt-3">
                        <a href="#" data-toggle="modal" data-target="#">
                            Quên mật khẩu
                        </a>
                    </p>
                    <div class="division">
                        <div class="line l"></div>
                        <span>or</span>
                        <div class="line r"></div>
                    </div>
                    <div class="social">
                        <a id="google_login" class="circle google" href="login/google">
                            <i class="fab fa-google-plus-g"></i>
                            Đăng nhập bằng google
                        </a>
                        <a id="facebook_login" class="circle facebook" href="login/facebook">
                            <i class="fab fa-facebook-f"></i>
                            Đăng nhập bằng facebook
                        </a>
                    </div>

                    <p class="text-center dont-do mt-3">Nếu bạn chưa có tài khoản?
                        <a href="#" data-toggle="modal" data-target="#register">
                            Đăng Ký Ngay
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
{{--register--}}
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i>Đăng Ký</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Họ và tên</label>
                        <input type="text" class="form-control" placeholder="Nhập họ và tên" name="name">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Địa chỉ email</label>
                        <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password" id="password1">
                        @if($errors->has('password'))
                            <div class="alert alert-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="re_password" id="password2">
                        @if($errors->has('re_assword'))
                            <div class="alert alert-danger">
                                {{ $errors->first('re_password') }}
                            </div>
                        @endif
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="btn btn-warning" value="Đăng Ký">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--slide--}}
@yield('slide')
@yield('booking')
@yield('content1')
@yield('content2')
@yield('content3')
@yield('content4')
@yield('content5')
@yield('content6')


{{--booking--}}
@include('client.layout.footer')
</body>

</html>
