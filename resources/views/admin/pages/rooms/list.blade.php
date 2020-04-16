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
                    <thead >
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Thông tin</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giới thiệu</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Thông tin</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giới thiệu</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($rooms as $key => $value)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$value->number_room}}</td>

                            <td>
                                <b>Mệnh giá phòng:</b>{{ number_format($value->price,2) }}<span>&nbspVNĐ</span>
                                <br/>
                                <b>Giá khuyến mãi:</b>{{ number_format($value->sale,2)}}<span>&nbspVNĐ</span>
                                <br/>
                                <b>Kiểu phòng</b>{{$value->Kind_rooms->name}}
                                <br/>
                                <b>Loại phòng:</b>{{$value->Category->name}}
                                <br/>
                            </td>
                            <td><img src="{{asset('img/upload/rooms')}}{{ '/'.$value->image }}" width="100"
                                     height="100">
                            </td>
                            <td>{!! $value->description !!}</td>

                            <td>{{$value->updated_at}}</td>
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
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control number_room" name="number_room"
                                           placeholder="Nhập tên loại sản phẩm">
                                    <div class="alert alert-danger errorNumber_room"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">Trống</option>
                                        <option value="0" class="kht">Đang sửa dụng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control description" id="demo" name="description" cols="5"
                                              rows="5" placeholder="Mô tả phòng"></textarea>
                                    <div class="alert alert-danger errorDescription"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Đơn giá</label>
                                    <input type="text" name="price" placeholder="Nhập đơn giá"
                                           class="form-control price">
                                    <div class="alert alert-danger errorPrice"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá khuyến mại</label>
                                    <input type="text" name="sale" value="0" placeholder="Nhập giá khuyến mại nếu có"
                                           class="form-control sale">
                                    <div class="alert alert-danger errorSale"></div>
                                </div>
                                <div class="form-group">
                                    <label>Loại phòng</label>
                                    <select class="form-control cateRooms" name="idCategory"></select>
                                </div>
                                <div class="form-group">
                                    <label>Kiểu phòng</label>
                                    <select class="form-control roomkindRooms" name="idKindRooms"></select>
                                </div>
                                <img class="img img-thumbnail imageThum" width="100" height="100" lign="center">
                                <div class="form-group">
                                    <label for="price">Ảnh minh họa</label>
                                    <input type="file" name="image" class="form-control image">
                                    <div class="alert alert-danger errorImage"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ngày vào</label>
                                    <input class="form-control created_at" type="date" name="created_at">
                                    <div class="alert alert-danger errorCreated_at"></div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Sửa">
{{--                                <button type="reset" class="btn btn-primary">Nhập Lại</button>--}}
{{--                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>--}}
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
