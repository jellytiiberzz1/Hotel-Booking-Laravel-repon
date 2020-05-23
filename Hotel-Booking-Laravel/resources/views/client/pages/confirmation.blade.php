@extends('client.layout.master')
<link rel="stylesheet" href="{{asset('client/css/style3.css')}}">

@section('title')Chi tiết hóa đơn
@endsection
<div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span> <span>Cart</span>
                    </p>
                    <h1 class="mb-4 bread">Chi Tiết Hóa Đơn</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-wrapper ">
    <!-- MAIN CONTENT -->
    <section class="main-content section clearfix">
        <div class="border payment-confirm position-relative">
            <div class="row justify-content-center align-items-center ">
                <div class="col-md-12 col-sm-12 col-12 col-lg-4 mb-4 mb-lg-0">
                    <img src="{{asset('img/upload/category')}}{{ '/'.$cate->image }}" class="img-fluid w-100" alt="confirm img"/>
                    <a href="#"><h2 class="text-uppercase text-dark mt-3 mb-4">Phòng đơn</h2></a>
                    <h4 class="headline">Cảm ơn quý khách đã sử dụng dịch vụ của khách sạn chúng tôi - khách sạh Supportel.</h4>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 col-lg-8">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed-cinfirm-detail ">
                                <h3 class="headline">Mã hóa đơn của bạn: #{{$booking->code_order}}</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <span>Check In:</span>
                                        {{$booking->date_from}}
                                    </li>
                                    <li>
                                        <span>Check Out:</span>
                                        {{$booking->date_to}}
                                    </li>
                                    <li>
                                        <span>Adults:</span>
                                        2
                                    </li>
                                    <li>
                                        <span>Child:</span>
                                        1
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="ed-cinfirm-detail">
                                <h3 class="headline">Your Personal Information</h3>

                                <ul class="list-unstyled">
                                    <li>
                                        <span>Full name:  </span>
                                        {{$booking->name}}
                                    </li>
                                    <li>
                                        <span>Address:  </span>
                                        {{$booking->address}}
                                    </li>

                                    <li>
                                        <span>Email:  </span>
                                        {{$booking->email}}
                                    </li>
                                    <li>
                                        <span>Phone:  </span>
                                        {{$booking->phone}}
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div class="total-amount border-top border-bottom py-4 mt-4 mb-4">

                                <h2>Tổng cộng: <span> {{ $booking->amount }}&nbspUSD</span></h2>

                            </div>

                            <a href="/" class="btn btn-solid-border">Xác Nhận</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
</div>
