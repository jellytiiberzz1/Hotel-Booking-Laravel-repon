@extends('admin.layouts.master')

@section('title')
    Danh sách phòng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Phòng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Thông tin khách hàng</th>
                        <th scope="col">Giới thiệu</th>
                        <th scope="col">Ngày vào/Ngày ra</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Thông tin khách hàng</th>
                        <th scope="col">Giới thiệu</th>
                        <th scope="col">Ngày vào/Ngày ra</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($rooms as $key => $value)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$value->number_room}}</td>
                            <td><b>Tên KH:</b>{{$value->name}}<br/>
                                <b>Địa chỉ:</b>{{$value->address}}<br/>
                                <b>ID công dân:</b>{{$value->CMND}}<br/>
                               <b>SĐT:</b> {{$value->phone}}<br/>
                            </td>
                            <td>
                                <b>Kiểu phòng: </b>{{$value->Kind_rooms->name}}
                                <br/>
                                <b>Loại phòng: </b>{{$value->Category->name}}
                                <br/>
                            </td>
                            <td>{{date('d-m-Y', strtotime($value->date_from))}}<br/>
                                {{date('d-m-Y', strtotime($value->date_to))}}<br/>
                            </td>
                            <td>
                                @if($value->status == 1)
                                    {{ "Phòng trống" }}
                                @elseif($value->status == 2)
                                    {{ "Phòng đã đặt" }}
                                @else
                                    {{"Đang sử dụng"}}
                                @endif
                            </td>
                            <td>

                                <button class="btn btn-primary editRooms" title="{{ "Sửa ".$value->number_room }}"
                                        data-toggle="modal" data-target="#edit" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteRooms" title="{{ "Xóa ".$value->number_room }}"
                                        data-toggle="modal" data-target="#delete" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $rooms->links() }}</div>
            </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa phòng <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" id="updateRoom" method="post" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <label>Tên số phòng</label>
                                    <input class="form-control number_room" name="number_room"
                                           placeholder="Nhập số phòng">
                                    <div class="alert alert-danger errorNumber_room"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Họ&Tên khách hàng</label>
                                    <input type="text" class="form-control name" placeholder="Họ và Tên"
                                           name="name">
                                    <div class="alert alert-danger errorName"></div>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control address" placeholder="Địa chỉ"
                                           name="address">
                                    <div class="alert alert-danger errorAddress"></div>
                                </div>
                                <div class="form-group">
                                    <label>Chứng minh thư</label>
                                    <input type="text" class="form-control CMND" placeholder="Chứng minh thư"
                                           name="CMND">
                                    <div class="alert alert-danger errorCMND"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control phone" placeholder="phone"
                                           name="phone">
                                    <div class="alert alert-danger errorPhone"></div>
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="t">Trống</option>
                                        <option value="2" class="dt">Đặt trước</option>
                                        <option value="0" class="sd">Đang sửa dụng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Loại phòng</label>
                                    <select class="form-control cateRooms" name="idCategory"></select>
                                </div>
                                <div class="form-group">
                                    <label>Kiểu phòng</label>
                                    <select class="form-control roomkindRooms" name="idKindRooms"></select>
                                </div>
                                <div class="form-group">
                                    <label>Ngày vào</label>
                                    <input class="form-control date_from" type="date" name="date_from">
                                    <div class="alert alert-danger errorDate_from"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ngày ra</label>
                                    <input class="form-control date_to" type="date" name="date_to">
                                    <div class="alert alert-danger errorDate_to"></div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Sửa">
                                <button type="reset" class="btn btn-primary">Nhập Lại</button>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
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
                    <button type="button" class="btn btn-success delRooms">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
@endsection
