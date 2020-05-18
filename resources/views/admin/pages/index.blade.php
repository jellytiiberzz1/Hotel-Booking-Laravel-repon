@extends('admin.layouts.master')

@section('title')
    Trang chủ
@endsection
@section('content')
    <h1 class="h3 mb-4 text-gray-800"><span></span><i class="fas fa-home"></i>Trang chủ </h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số nhân viên
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}/{{$user}}</div>

                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng số khách hàng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer}}/{{$customer2}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-male fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số phòng đang hoạt
                                động
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$room}}/{{$room3}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-closed fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Số phòng còn trống
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$room2}}/{{$room3}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--        <h2 class="text-gray-800">Đơn đặt phòng</h2>--}}
{{--        <table class="table table-light">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th scope="col">STT</th>--}}
{{--                <th scope="col">Tên</th>--}}
{{--                <th scope="col">Mã hóa đơn</th>--}}
{{--                <th scope="col">Phòng</th>--}}
{{--                <th scope="col">Ngày vào/Ngày Ra</th>--}}
{{--                <th scope="col">Số tiền đặt</th>--}}
{{--                <th scope="col">Tình trạng</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($booking as $key => $value)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{$key+=1}}</th>--}}
{{--                    <td>{{$value->name}}</td>--}}
{{--                    <td>{{$value->code_order}}</td>--}}
{{--                    <td>{{$value->rooms->number_room}}</td>--}}
{{--                    <td>{{$value->date_from}}--}}
{{--                        <span>/</span>{{$value->date_from}}--}}
{{--                    </td>--}}
{{--                    <td>{{$value->amount}}&nbspUSD</td>--}}
{{--                    <td>@if($value->status==1)--}}
{{--                            {{ "Đang chờ..." }}--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
    <h2 class="text-gray-800">Tổng doanh thu {{$amount}}</h2>
    <table class="table table-light">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Mã hóa đơn</th>
            <th scope="col">Phòng</th>
            <th scope="col">Ngày vào/Ngày Ra</th>
            <th scope="col">Số tiền đặt</th>
            <th scope="col">Địa chỉ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($booking as $key => $value)
            <tr>
                <th scope="row">{{$key+=1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->code_order}}</td>
                <td>{{$value->Category->name}}</td>
                <td>{{$value->date_to}}
                </td>
                <td>{{$value->amount}}&nbspUSD</td>
                <td>{{$value->address}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    <h2 class="text-gray-800">Tổng doanh thu tháng 3 {{$amount}}</h2>--}}
{{--    <table class="table table-light">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th scope="col">STT</th>--}}
{{--            <th scope="col">Tên</th>--}}
{{--            <th scope="col">Mã hóa đơn</th>--}}
{{--            <th scope="col">Phòng</th>--}}
{{--            <th scope="col">Ngày vào/Ngày Ra</th>--}}
{{--            <th scope="col">Số tiền đặt</th>--}}
{{--            <th scope="col">Địa chỉ</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($booking as $key => $value)--}}
{{--            <tr>--}}
{{--                <th scope="row">{{$key+=1}}</th>--}}
{{--                <td>{{$value->name}}</td>--}}
{{--                <td>{{$value->code_order}}</td>--}}
{{--                <td>{{$value->rooms->number_room}}</td>--}}
{{--                <td>{{$value->date_to}}--}}
{{--                </td>--}}
{{--                <td>{{$value->amount}}&nbspUSD</td>--}}
{{--                <td>{{$value->address}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--    </table>--}}
@endsection
