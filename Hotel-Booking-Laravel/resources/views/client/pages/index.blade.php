@extends('client.layout.master')

@section('title')
    Trang chủ
@endsection

@section('slide')
    <div class="hero">
        <section class="home-slider owl-carousel">
            <div class="slider-item" style="background-image:url({{asset('client/images/bg_1.jpg')}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Supportel</h1>
                                <h2>Còn hơn cả một khách sạn, chúng tôi gọi đây là một trải nghiệm mới...</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image:url({{asset('client/images/bg_2.jpg')}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center">
                        <div class="col-md-8 ftco-animate">
                            <div class="text mb-5 pb-5">
                                <h1 class="mb-3">Một trải nghiệm hoàn toàn mới</h1>
                                <h2>Supportel Hotel &amp; Resort</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('booking')
    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">
                    <form action="/find" class="booking-form" method="get">
                        <div class="row">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Ngày Vào</label>
                                        <input type="text" class="form-control checkin_date" placeholder="Ngày vào"
                                               name="date_from">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Ngày Ra</label>
                                        <input type="text" class="form-control checkout_date" placeholder="Ngày ra"
                                               name="date_to">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Loại Phòng</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="key" id="key" class="form-control">
                                                    <option value="">Chọn loại phòng</option>
                                                    @foreach($cate as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Số Khách</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">1 người</option>
                                                    <option value="">2 người</option>
                                                    <option value="">3 người</option>
                                                    <option value="">4 người</option>
                                                    <option value="">5 người</option>
                                                    <option value="">6 người</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex">
                                <div class="form-group d-flex align-self-stretch" style="background: #000000;border: 1px solid #000000;color: #fff;">
                                    <button
                                        class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span> Kiểm Tra Phòng <small>Đảm Bảo Giá Tốt Nhất!</small></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content1')
    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-wrap">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url({{asset('client/images/room-3.jpg')}});">
                        <div class="text text-center pb-2">
                            <h3>Phòng VVIP</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url({{asset('client/images/swimming-pool.jpg')}});">
                        <div class="text text-center pb-2">
                            <h3>Hồ Bơi</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="services-wrap img align-items-end d-flex"
                       style="background-image: url({{asset('client/images/resto.jpg')}});">
                        <div class="text text-center pb-2">
                            <h3>Nhà Hàng</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="services-wrap services-overlay img align-items-center d-flex"
                         style="background-image: url({{asset('client/images/sleep.jpg')}});">
                        <div class="text text-center pb-2">
                            <h3 class="mb-0">Phòng Đôi</h3>
                            <span>Special Rooms</span>
                            <div class="d-flex mt-2 justify-content-center">
                                <div class="icon">
                                    <a href="#"><span class="ion-ios-arrow-forward"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content2')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Chào Mừng Bạn Đến Với Novotel Hotel</span>
                    <h2 class="mb-4">Một Tầm Nhìn Mới Về Khách Sạng Hạng Sang</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-reception-bell"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Phục Vụ Chu Đáo</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services active py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-serving-dish"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Buffet Sáng</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-car"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Đưa Đón Tận Tình</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="flaticon-spa"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Chăm Sóc Sức Khoẻ</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-bed"></span>
                            </div>
                        </div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Phòng Thân Mật</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content3')
    <section class="ftco-section bg-light ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Supportel</span>
                    <h2 class="mb-4">Luôn ở bên bạn</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="room-wrap">
                        <div class="img d-flex align-items-center"
                             style="background-image: url({{asset('client/images/bg_3.jpg')}});">
                            <div class="text text-center px-4 py-4">
                                <h2>Chào Mừng Bạn Đến Với <a href="/">SUPPORTEL</a></h2>

                            </div>
                        </div>
                    </div>
                </div>
                @foreach($cate as $room)
                    <div class="col-lg-6">
                        <div class="room-wrap d-md-flex">
                            <a href="chi-tiet-{{$room->slug}}" class="img"
                               style="background-image: url(img/upload/category/{{$room->image}});"></a>
                            <div class="half left-arrow d-flex align-items-center">
                                <div class="text p-4 p-xl-5 text-center">
                                    <p class="star mb-0"><span class="ion-ios-star"></span><span
                                            class="ion-ios-star"></span><span class="ion-ios-star"></span><span
                                            class="ion-ios-star"></span><span class="ion-ios-star"></span></p>
                                    <p class="mb-0">
                                            <span class="price mr-1">{{number_format($room->price)}}</span>
                                            <br>
                                        <span class="per">Một đêm</span>
                                    </p>
                                    <h3 class="mb-3"><a
                                            href="chi-tiet-{{$room->slug}}">{{$room->name}}</a></h3>
                                    <p class="pt-1"><a href="chi-tiet-{{$room->slug}}"
                                                       class="btn-custom px-3 py-2">Chi tiết về
                                            phòng
                                            <span class="icon-long-arrow-right"></span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('content4')
    <section class="ftco-section ftco-no-pt ftco-no-pb px-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-end">
                <div class="col-md-12">
                    <div id="home" class="video-hero"
                         style="height: 800px; background-image: url({{asset('client/images/bg_1.jpg')}}); background-size:cover; background-position: center center;">
                        <a class="player"
                           data-property="{videoURL:'https://www.youtube.com/watch?v=ism1XqnZJEg',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content5')
    <section class="ftco-section ftco-menu"
             style="background-image: url({{asset('client/images/restaurant-pattern.jpg')}})">;
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Nhà Hàng</span>
                    <h2>NHÀ HÀNG</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last"
                             style="background-image: url({{asset('client/images/menu-1.jpg')}});"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Bánh Kem Nho</span></h3>
                                <span class="price price-left">20.000</span>
                            </div>
                            <div class="d-block">
                                <p>Hoà quyện cùng nhiều loại nguyên liệu khác nhau...</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last"
                             style="background-image: url({{asset('client/images/menu-2.jpg')}});"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Bánh Kem hương Vani</span></h3>
                                <span class="price price-left">20.000</span>
                            </div>
                            <div class="d-block">
                                <p>Mùi vị không bao giờ quên...</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last"
                             style="background-image: url({{asset('client/images/menu-3.jpg')}});"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Bánh Dâu</span></h3>
                                <span class="price price-left">25.000</span>
                            </div>
                            <div class="d-block">
                                <p>Nguyên liệu được lấy từ Vườn Dâu Văn Bảo, có kinh nghiệm hơn 30 năm trồng
                                    dâu...</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img order-md-last"
                             style="background-image: url({{asset('client/images/menu-4.jpg')}});"></div>
                        <div class="desc pr-3 text-md-right">
                            <div class="d-md-flex text align-items-center">
                                <h3 class="order-md-last heading-left"><span>Bánh Sô-Cô-La</span></h3>
                                <span class="price price-left">40.000</span>
                            </div>
                            <div class="d-block">
                                <p>Hương vị đặc biệt nhất tạo nên những thứ đặc biệt nhất...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img"
                             style="background-image: url({{asset('client/images/menu-5.jpg')}});"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Tựa Bên Quả Hồng</span></h3>
                                <span class="price">400.000</span>
                            </div>
                            <div class="d-block">
                                <p>Món ăn được yêu thích nhất!</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img"
                             style="background-image: url({{asset('client/images/menu-6.jpg')}});"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Ngũ Quả</span></h3>
                                <span class="price">150.000</span>
                            </div>
                            <div class="d-block">
                                <p>Được chế biến từ nhiều nguyên liệu khác nhau...</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img"
                             style="background-image: url({{asset('client/images/menu-7.jpg')}});"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Nước Dâu</span></h3>
                                <span class="price">50.000</span>
                            </div>
                            <div class="d-block">
                                <p>Nguyên liệu được lấy từ vườn dâu Văn Bảo, có kinh nghiệm hơn 30 năm trồng dâu</p>
                            </div>
                        </div>
                    </div>
                    <div class="pricing-entry d-flex ftco-animate">
                        <div class="img"
                             style="background-image: url({{asset('client/images/menu-8.jpg')}});"></div>
                        <div class="desc pl-3">
                            <div class="d-md-flex text align-items-center">
                                <h3><span>Nước Trái Cây</span></h3>
                                <span class="price">50.000</span>
                            </div>
                            <div class="d-block">
                                <p>Nguyên liệu được lấy từ vườn nông trại sạch Huy Thông!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content6')
    <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Hình Ảnh</span>
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('client/images/insta-1.jpg')}}" class="insta-img image-popup"
                       style="background-image: url({{asset('client/images/insta-1.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('client/images/insta-2.jpg')}}" class="insta-img image-popup"
                       style="background-image: url({{asset('client/images/insta-2.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('client/images/insta-3.jpg')}}" class="insta-img image-popup"
                       style="background-image: url({{asset('client/images/insta-3.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('client/images/insta-4.jpg')}}" class="insta-img image-popup"
                       style="background-image: url({{asset('client/images/insta-4.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="{{asset('client/images/insta-5.jpg')}}" class="insta-img image-popup"
                       style="background-image: url({{asset('client/images/insta-5.jpg')}});">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
