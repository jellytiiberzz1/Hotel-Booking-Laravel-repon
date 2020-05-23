@extends('client.layout.master')
@section('title')
    Về Chúng Tôi
@endsection


@section('content2')
    <div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span>
                            <span>Về Chúng Tôi</span></p>
                        <h1 class="mb-4 bread">Thông Tin Khách Sạn</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftc-no-pb ftc-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-md-5 img img-2 img-3 d-flex justify-content-center align-items-center"
                     style="background-image: url({{asset('client/images/bg_2.jpg')}});">
                    <a href="https://vimeo.com/45830194"
                       class="icon popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="icon-play"></span>
                    </a>
                </div>
                <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                    <div class="heading-section heading-section-wo-line pt-md-5 mb-5">
                        <div class="ml-md-0">
                            <span class="subheading">Khách Sạn NOVOTEL</span>
                            <h2 class="mb-4">Chào Mừng Bạn Đến Với Khách Sạn Chúng Tôi</h2>
                        </div>
                    </div>
                    <div class="pb-md-5">
                        <p>Ra đời năm 1967, Novotel là thương hiệu đầu tiên và bền bỉ nhất của AccorHotels vận hành với
                            450
                            khách sạn và khu nghỉ dưỡng tại 61 quốc gia. Tại Việt Nam có sáu khách sạn Novotel với 1,362
                            phòng, là thương hiệu của AccorHotels có sự hiện diện rộng rãi nhất tại Việt Nam. Các khách
                            sạn
                            mới khai trương gần đây bao gồm Novotel Phu Quoc Resort, khai trương tháng 1 năm 2016 với
                            366
                            phòng, suites và villas trên hòn đảo nổi tiếng với vẻ đẹp thiên nhiên, nhiều điểm du lịch
                            hấp
                            dẫn và nhiều tour du lịch sinh thái, và Novotel Suites Hanoi – khách sạn Novotel Suites đầu
                            tiên
                            tại Châu Á Thái Bình Dương chính thức khai trương tháng này tại quận Cầu Giấy với 151 phòng
                            và
                            suites lý tưởng cho những chuyến đi trung và dài ngày. Tiếp theo đó sẽ là Novotel Suites
                            Manila
                            và Seoul. Mang phong cách của Novotel, Novotel Suites với hệ thống phòng thiết kế theo kiểu
                            suite, rộng rãi và tiện nghi, được thiết kế tương thích với khu vực làm việc và lễ tân.
                            Phòng
                            dành cho tối đa sáu người, với gian bếp nhỏ cùng nhiều tiện ích phù hợp cho du khách ở trung
                            và
                            dài ngày.</p>
                        <ul class="ftco-social d-flex">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@section('content4')
    <section class="ftco-section ftco-no-pt ftco-no-pb px-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-end">
                <div class="col-md-12">
                    <div id="home" class="video-hero"
                         style="height: 800px; background-image: url({{asset('client/images/bg_1.jpg')}}); background-size:cover; background-position: center center;">
                        <a class="player"
                           data-property="{videoURL:'https://www.youtube.com/watch?v=ism1XqnZJEg',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}"></a>
                        <div class="container">
                            <div class="row justify-content-start d-flex align-items-end height-text ">
                                <div class="col-md-8">
                                    <div class="text">
                                        <h1>We're Most Recommended Hotel</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content6')
    <section class="ftco-section testimony-section bg-light"></section>
    <section class="instagram ftco-section ftco-no-pb">
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
