@extends('client.layout.master')

@section('title')Tìm phòng
@endsection
<div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span></p>
                    <h1 class="mb-4 bread">Tìm Phòng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 450px;margin-bottom:-50px;">
    <section class="ftco-booking ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-1 aside-stretch">
                    <form action="/find" class="booking-form" method="get">
                        <div class="row booking-form">
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Ngày Vào</label>
                                        <input type="text" name="date_form" class="form-control checkin_date"
                                               placeholder="Ngày vào">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md d-flex py-md-4">
                                <div class="form-group align-self-stretch d-flex align-items-end">
                                    <div class="wrap bg-white align-self-stretch py-3 px-4">
                                        <label for="#">Ngày Ra</label>
                                        <input type="text" name="date_to" class="form-control checkout_date"
                                               placeholder="Ngày ra">
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
                                                <select name="key" id="" class="form-control">
                                                    <option value="">Chọn loại phòng</option>
                                                    <option value="1">Phòng Thường I</option>
                                                    <option value="2">Phòng Thường II</option>
                                                    <option value="3">Phòng Cao Cấp</option>
                                                    <option value="4">Phòng V.I.P</option>
                                                    <option value="5">Phòng Family</option>
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
                                       class="btn btn-black py-5 py-md-3 px-4 align-self-stretch d-block"><span> Kiểm Tra Phòng <small>Đảm Bảo Giá Tốt Nhất!</small></span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
</div>
<div class="container" style="margin-top: 50px;">
    <table id="order_table" class="table table-bordered"  style="color: #333333; text-align: center">
        <thead>
        <tr>
            <th>STT</th>
            <th>Loại Phòng</th>
            <th>Hình Ảnh</th>
            <th>Kiểu Phòng</th>
            <th>Mô Tả</th>
            <th>Giá</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($room3 as $key=>$value)
            <tr>
                <th scope="row">{{$key+=1}}</th>
                <td>{{$value->Category->name}}</td>
                <td><img src="{{asset('img/upload/category')}}{{ '/'.$value->Category->image }}"
                    ></td>
                <td>{{$value->Kind_rooms->name}}</td>
                <td>{!! $value->Category->description !!}</td>
                <td>
                        <strike style="color: #333333">{{number_format((($value->Category->price)*25/100)+($value->Category->price))}}</strike><br>
                        <span
                            class="">{{number_format($value->Category->price)}}<span>&nbspVNĐ</span></span>
                </td>

                <th>
                    <center>
                        <a style="margin: auto;border: 1px solid white;" class="btn btn-success"
                           href="chi-tiet-{{$value->Category->slug}}">Chi tiết phòng</a>
                    </center>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
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

