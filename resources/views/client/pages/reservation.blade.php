
@extends('client.layout.master')

@section('title')Thông tin phòng đặt
@endsection
@section('content6')
<div class="opaPr">
    <div class="wrapper" style="background-image: url('{{asset('client/images/swimming-pool.jpg')}}');">
        <table class="table table-light">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên</th>
                <th scope="col">Mã hóa đơn</th>
                <th scope="col">Phòng</th>
                <th scope="col">Ngày vào/Ngày Ra</th>
                <th scope="col">Số tiền đặt</th>
                <th scope="col">Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            @foreach($booking as $key => $value)
            <tr>
                <th scope="row">{{$key+=1}}</th>
                <td>{{$value->name}}</td>
                <td>{{$value->code_order}}</td>
                <td>{{$value->rooms->number_room}}</td>
                <td>{{$value->date_from}}
                <span>/</span>{{$value->date_from}}
                </td>
                <td>{{$value->amount}}&nbspUSD</td>
                <td>@if($value->status==1)
                        {{ "Đang chờ..." }}
                    @else
                        {{ "Thành công" }}
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
