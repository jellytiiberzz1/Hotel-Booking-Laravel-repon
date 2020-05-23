@extends('client.layout.master')
<link rel="stylesheet" href="{{asset('client/css/rooms.css')}}">
@section('title')Danh sách loại phòng
@endsection

@section('content3')
    <div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span> <span>Phòng</span>
                        </p>
                        <h1 class="mb-4 bread">Loại Phòng</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section bg-light ftco-room">
        <div class="container-fluid px-0">
            <div class="row no-gutters justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Novotel</span>
                    <h2 class="mb-5">Luôn ở bên bạn</h2>
                </div>
            </div>
                <div class="container">
                    <div class="row">
                        @foreach($room as $value => $key)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="hotel-room text-center">
                                <a href="chi-tiet-{{$key->slug}}" class="d-block mb-0 thumbnail"><img src="{{asset('img/upload/category')}}{{ '/'.$key->image }}" alt="Image" class="img-fluid"></a>
                                <div class="hotel-room-body">
                                    <h3 class="heading mb-0"><a href="chi-tiet-{{$key->slug}}">{{$key->name}}</a></h3>
                                    <span class="price" style="font-size: 32px">{{number_format($key->price)}}<span>&nbspVNĐ</span></span>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
    </section>
@endsection

