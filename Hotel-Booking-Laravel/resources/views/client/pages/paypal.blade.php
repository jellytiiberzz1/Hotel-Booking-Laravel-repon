@extends('client.layout.master')


@section('title')Chi tiết hóa đơn
@endsection
@section('content6')
<div class="hero-wrap" style="background-image: url({{asset('client/images/bg_1.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span> <span>Cart</span>
                    </p>
                    <h1 class="mb-4 bread">Thanh toán PayPal</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main-content section clearfix">
    <div class="container">
        <div class="ed-booking-tab">
            <div class="tab-control">
                <ul class="nav nav-tabs ">
                    <li role="presentation" class="ed-done">
                        <a href="/find">
                  <span class="ed-step">
                    <span class="ed-step-fill"></span>
                  </span>
                            <span class="ed-step-bar"></span>
                            <span class="ed-step-text">1 Select Room</span>
                        </a>
                    </li>
                    <li role="presentation" class="ed-done">
                        <a href="{{ route('addBook',['slug' => $cate->slug]) }}">
                  <span class="ed-step">
                    <span class="ed-step-fill"></span>
                  </span>
                            <span class="ed-step-text">2 Your Details</span>
                        </a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="">
                  <span class="ed-step">
                    <span class="ed-step-fill"></span>
                  </span>
                            <span class="ed-step-bar"></span>
                            <span class="ed-step-text">3 Payment</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="ed-payment">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="ed-reservation">
                            <h3 class="headline mb-4">Chi Tiết Đặt Phòng</h3>
                            <ul class="ed-reservation-detail">
                                <li>
                                    <span>Loại Phòng</span>
                                    <span>
                          <img src="{{asset('img/upload/category')}}{{ '/'.$cate->image }}" alt="image" class="img-fluid">
                          {{$cate->name}}
                        </span>
                                </li>
                                <li>
                                    <span>Kiểu Phòng</span>
                                    <span>Phòng đơn</span>
                                </li>

                                <li>
                                    <span>Số Lượng</span>
                                    <span>2 Người lớn, 1 Trẻ em</span>
                                </li>
                            </ul>

                            <h4 class="headline">Tổng Cộng</h4>
                            <div class="ed-total">
                      <span class="total-room">
                        <span></span>Room
                      </span>
                                <span class="total-offer">
                        <span>25%</span>off
                      </span>
                                <div class="ed-total-price">
                                    <span class="offer-price" style="font-size: 15px">{{ number_format((($cate->price)*25/100)+($cate->price))}}&nbspVNĐ</span>
                                    <span class="total-price" style="font-size: 15px">{{ number_format($cate->price)}}&nbspVNĐ</span>
                                </div>
                            </div>

                            <div class="ed-pay-card">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><img src="{{asset('client/images/booking/card1.jpg')}}"
                                                                      alt="image" class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{asset('client/images/booking/card2.jpg')}}"
                                                                      alt="image" class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{asset('client/images/booking/card3.jpg')}}"
                                                                      alt="image" class="img-fluid"></li>
                                    <li class="list-inline-item"><img
                                            src="{{asset('client/images/booking/card4.jpg')}} " alt="image"
                                            class="img-fluid"></li>
                                    <li class="list-inline-item"><img src="{{asset('client/images/booking/card5.jpg')}}"
                                                                      alt="image" class="img-fluid"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-8">
                        <div class="comment-form py-4">
                            <h3 class="headline mb-4 font-weight-bold border-bottom pb-3">Thanh toán</h3>
                            <form class="form-top" method="POST" id="payment-form"
                                  action="{!! URL::to('paypal') !!}">
                                {{ csrf_field() }}
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label for="form-group" class="col-sm-4">Số tiền trả trước (USD): </label>
                                        <input id="amount" type="text" name="amount" class="form-control"
                                               value="{{($cate->usd)}}" readonly>
                                    </div>
                                    <div class="form-group ">
                                    <label for="inputname" class="col-sm-4 col-form-label">Novotel (Phòng đặt): </label>
                                        <input id="item" type="text" name="item" class="form-control"
                                               value=" {{$cate->name}}" readonly>
                                    </div>

                                </div>
                                <div class="form-group row ed-security">
                                    <div class="col-sm-8">

                                    </div>
                                </div>

                                <div class="form-bottom mt-5 border-top pt-4">
                                    <input type="checkbox" name="term">
                                    <span class="policy">I have read and accept the
                          <a href="#">terms</a> and
                          <a href="#">conditions</a>.
                        </span>

                                    <button><img src="{{asset('client/images/booking/card6.png')}}"></button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
