
@extends('admin.layouts.master')

@section('title')
    Danh sách nhân viên
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">CMND</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">CMND</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($customer as $key => $value)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$value->name}}</td>
                            <td>{{$value->address}}</td>
                            <td>
                                <span class="label label-success">
                                @if($value->status==1)
                                        {{ "Hoạt động" }}
                                    @elseif($value->role==2)
                                        {{ "Đã khóa" }}
                                    @endif
                                </span>
                            </td>
                            <td>{{$value->CMND}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->email}}</td>

                            {{--                            <td><img src="{{asset('img/upload/rooms')}}{{ '/'.$value->image }}" width="100"--}}
                            {{--                                     height="100">--}}
                            {{--                            </td>--}}
                            <td>

                                <button class="btn btn-primary editCustomer" title="{{ "Sửa ".$value->name }}"
                                        data-toggle="modal" data-target="#edit" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteCustomer" title="{{ "Xóa ".$value->name }}"
                                        data-toggle="modal" data-target="#delete" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $customer->links() }}</div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success delCustomer">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

