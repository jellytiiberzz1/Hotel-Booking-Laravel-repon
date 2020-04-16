@extends('client.layout.master')

@section('title')Chi tiết phòng{{ $room3->Category->name }}
@endsection
@section('content6')
<div class="hero-wrap" style="background-image: url('{{asset('client/images/bg_1.jpg')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Trang Chủ</a></span>
                        <span>Phòng</span></p>
                    <h1 class="mb-4 bread">Chi Tiết Phòng</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="single-slider owl-carousel">
                            <div class="item">
                                <div class="room-img" style="background-image: url({{asset('img/upload/rooms/'.$room3->image)}});"></div>
                            </div>
                            <div class="item">
                                <div class="room-img" style="background-image: url({{asset('client/images/room-5.jpg')}});"></div>
                            </div>
                            <div class="item">
                                <div class="room-img" style="background-image: url({{asset('client/images/room-6.jpg')}});"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                        <h2 class="mb-4">{{$room3->Category->name}}</h2>
                        <p>Căn phòng chứa đựng những điều tốt đẹp nhất...</p>
                        <div class="d-md-flex mt-5 mb-5">
                            <ul class="list">
                                <li><span>Giá phòng : </span> <b>{{number_format($room3->price)}}<span>&nbspVNĐ</span></b>
                                </li>
                            </ul>
                            <ul class="list ml-md-5">
                                <li><span>Mô tả :</span>{!! $room3->description !!}</li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 room-single ftco-animate mb-5 mt-4">
                        <h3 class="mb-4">Xem Nhanh Phòng</h3>
                        <div class="block-16">
                            <figure>
                                <img src="{{asset('client/images/room-4.jpg')}}" alt="Image placeholder"
                                     class="img-fluid">
                                <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span
                                        class="icon-play"></span></a>
                            </figure>
                        </div>
                    </div>

                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-4">
                        <h4 class="mb-4">Đánh Giá</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post" class="star-rating">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i> 5 Sao</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star-o"></i> 4 Sao</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 3 Sao</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                                        class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 2 Sao</span></p>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">
                                            <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i><i class="icon-star-o"></i><i
                                                        class="icon-star-o"></i> 1 Sao</span></p>
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sidebar ftco-animate fadeInUp ">
                <div class="sidebar-box ftco-animate">
                    @if(Auth::check())
                        <a  href="{{ route('addBook',['id' => $room3->id]) }}" style="color: white;background-color: red;padding: 20px 30px;">
                            Đặt Phòng
                        </a>
                    @else
                        <script type="text/javascript">
                            alert('Vui lòng đăng nhập để có thể đặt phòng!');
                        </script>
                    @endif
                </div>
                <div class="sidebar-box ftco-animate">
                    <h3>TAG</h3>
                    <div class="tagcloud">

                        <a href="#" class="tag-cloud-link">Thực đơn</a>
                        <a href="#" class="tag-cloud-link">Thức ăn</a>
                        <a href="#" class="tag-cloud-link">Đồ ngọt</a>
                        <a href="#" class="tag-cloud-link">Đồ mặn</a>
                        <a href="#" class="tag-cloud-link">Ngon miệng</a>

                        <a href="#" class="tag-cloud-link">Đồ uống</a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Trích dẫn</h3>
                    <p>Trong cuộc sống có rất nhiều việc bạn không muốn làm nhưng không thể không làm, đây chính là
                        trách nhiệm; trong cuộc sống có rất nhiều việc bạn muốn làm nhưng không thể làm, đây chính là
                        vận mệnh.</p>
                </div>

            </div>
        </div>
    </div>


</section>

@endsection
