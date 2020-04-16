@extends('admin.layouts.master')

@section('title')
    Danh sách dịch vụ
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dịch vụ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead >
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên phòng</th>
                        <th scope="col">Dịch vụ</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Ghi chú</th>
                        <th scope="col">Ngày tạo dịch vụ</th>
                        <th scope="col">Ngày cập nhật</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($service as $key => $value)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td>{{$value->rooms->number_room}}</td>
                            <td>{{ $value->ServiceSlug->name }}</td>
                            <td>{{ number_format($value->quantity) }}</td>
                            <td>{{ number_format($value->price,2)}}<span>&nbspVNĐ</span></td>
                            <td>{!! $value->note !!}</td>
                            <td>{{$value->created_at}}</td>
                            <td>{{$value->updated_at}}</td>
                            <td>

                                <button class="btn btn-primary editService" title="{{ "Sửa ".'dịch vụ' }}"
                                        data-toggle="modal" data-target="#edit" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteService" title="{{ "Xóa ".'dịch vụ' }}"
                                        data-toggle="modal" data-target="#delete" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $service->links() }}</div>
            </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa dịch vụ<span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" id="updateService" method="post" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="form-group">
                                    <label>Tên phòng</label>
                                    <select class="form-control serviceRooms" name="idRoom"></select>
                                </fieldset>
                                <div class="form-group">
                                    <label>Dịch vụ phòng</label>
                                    <select class="form-control serviceType" name="idServiceslug"></select>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input class="form-control serviceQuantity" type="number" min="0" name="quantity" placeholder="Nhập số lượng">
                                    <div class="alert alert-danger errorQuantity"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input class="form-control servicePrice" type="text" name="price" placeholder="Nhập giá tiền">
                                    <div class="alert alert-danger errorPrice"></div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Chú thích</label>
                                    <textarea class="form-control serviceNote" type="text"  name="note" cols="5" rows="5" ></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Ngày tạo</label>
                                    <input class="form-control created_at" type="date" name="created_at">
                                    <div class="alert alert-danger errorCreated_at"></div>
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
                    <button type="button" class="btn btn-success delService">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
@endsection
