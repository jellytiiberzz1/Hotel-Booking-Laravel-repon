@extends('client.layout.master')

@section('title')Nhà Hàng
@endsection
@section('content5')
    <div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span>
                            <span>RESTAURANT</span></p>
                        <h1 class="mb-4 bread">Nhà Hàng</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
