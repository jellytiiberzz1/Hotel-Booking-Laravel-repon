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
                    <h1 class="mb-4 bread">Chi Tiết Hóa Đơn</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main-content section clearfix">
    <div class="container">
        <div class="ed-booking-tab">
            <div class="tab-control">
                <ul class="nav nav-tabs">
                    <li role="presentation" class="ed-done">
                        <a href="/find">
                  <span class="ed-step">
                    <span class="ed-step-fill"></span>
                  </span>
                            <span class="ed-step-bar"></span>
                            <span class="ed-step-text">1 Select Room</span>
                        </a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="{{ route('addBook',['id' => $room->id]) }}">
                  <span class="ed-step">
                    <span class="ed-step-fill"></span>
                  </span>
                            <span class="ed-step-text">2 Your Details</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="booking-step3.html">
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
            <div role="tabpanel" class="tab-pane active" id="client-details">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="ed-reservation">
                            <h3 class="headline mb-4">Chi Tiết Đặt Phòng</h3>
                            <ul class="ed-reservation-detail">
                                <li>
                                    <span>Loại Phòng</span>
                                    <span>
                          <img src="{{asset('img/upload/rooms')}}{{ '/'.$room->image }}" alt="image" class="img-fluid">
                          {{$room->Category->name}}
                        </span>
                                </li>
                                <li>
                                    <span>Loại Phòng</span>
                                    <span>{{ $room->Kind_rooms->name}}</span>
                                </li>

                                <li>
                                    <span>Số Lượng</span>
                                    <span>2 Người lớn, 1 Trẻ em</span>
                                </li>
                            </ul>

                            <h4 class="headline">Tổng Cộng</h4>
                            <div class="ed-total">
                      <span class="total-room">
                        <span>{{$room->number_room}}</span>Room
                      </span>
                                <span class="total-offer">
                        <span>25%</span>off
                      </span>
                                <div class="ed-total-price">
                                    <span class="offer-price" style="font-size: 15px">{{ number_format($room->price)}}&nbspVNĐ</span>
                                    <span class="total-price" style="font-size: 15px">{{ number_format($room->sale)}}&nbspVNĐ</span>
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

                    <div class="col-md-6 col-sm-6 col-lg-8">
                        <div class="comment-form p-4">
                            <h3 class="headline mb-5 font-weight-bold">Thông tin cá nhân</h3>
                            <div id="alert"></div><!--Response Holder-->
                            <form action="{{route('booking.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control name" placeholder="Họ và Tên"
                                                   name="name">
                                            @if($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control email" placeholder="E-mail"
                                                   name="email">
                                            @if($errors->has('email'))
                                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control CMND" placeholder="CMND" name="CMND">
                                            @if($errors->has('CMND'))
                                                <div class="alert alert-danger">{{ $errors->first('CMND') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control address" placeholder="Địa chỉ"
                                                   name="address">
                                            @if($errors->has('address'))
                                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control phone" placeholder="Phone"
                                                   name="phone">
                                            @if($errors->has('phone'))
                                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>

                                        <input type="hidden" value="{{ $room->id }}" name="idRoom">
                                        <input type="hidden" value="{{ rand() }}" name="code_order">
                                        <input type="hidden" value="{{ '1' }}" name="status">
                                        <input type="hidden" value="{{($room->usd)}}" name="amount">

                                        {{--                                            <input type="hidden" value="{{ $room->image }}" name="image">--}}
                                        {{--                                            <input type="hidden" value="{{ $room->price }}" name="price">--}}
                                        <input type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}"
                                               name="idUser">
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control checkin_date" placeholder="Ngày vào" type="text"
                                                   name="date_from"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control checkout_date" placeholder="Ngày ra" type="text"
                                                   name="date_to"/>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control additional_information" placeholder="Yêu Cầu Thêm"
                                                  rows="5"
                                                  name="additional_information" required></textarea>
                                        <div class="mt-4">
                                            <button class="btn btn-primary">Đặt Phòng</button>
                                            {{-- <a href="" class="btn btn-main float-right" style="background: #b0914f;color: #fff;" id="booking-submit-btn" >Submit </a>--}}
                                        </div>
                                    </div>

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
