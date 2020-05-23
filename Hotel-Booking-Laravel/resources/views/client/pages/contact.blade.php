@extends('client.layout.master')
@section('title')Liên Hệ
@endsection

<div class="hero-wrap" style="  background-image: url('{{asset('client/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span>
                        <span>Liên Hệ</span></p>
                    <h1 class="mb-4 bread">Thông Tin Liên Hệ</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h3">Thông Tin Liên Hệ</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Địa Chỉ:</span> 03 Quang Trung - Đà Nẵng ( DUY TÂN UNIVERSITY )</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Số điện thoại</span> <a href="tel://+84702158015">+84 702158015</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Email:</span> <a href="mailto:ducthach0608@gmail.com">ducthach0608@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Website</span> <a href="#">https://www.fb.com/nducthach</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="/message" class="bg-white p-5 contact-form" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="fullname" placeholder="Tên của bạn">
                        @if($errors->has('fullname'))
                            <div class="alert alert-danger">{{ $errors->first('fullname') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email của bạn">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại của bạn">
                        @if($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                  placeholder="Lời nhắn"></textarea>
                        @if($errors->has('message'))
                            <div class="alert alert-danger">{{ $errors->first('message') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" value="GỬI" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.821903988554!2d108.22059661502554!3d16.07472904355986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218307d81c91d%3A0xbc7c14cab8a09c8!2zxJDhuqFpIGjhu41jIER1eSBUw6Ju!5e0!3m2!1svi!2s!4v1565973946577!5m2!1svi!2s"
                    width="600" height="600" frameborder="0" style="border:0"></iframe>

            </div>

        </div>
    </div>
</section>
