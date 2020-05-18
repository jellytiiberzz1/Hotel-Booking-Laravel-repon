@extends('admin.layouts.master')

@section('title')
    Danh sách loại phòng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên loại phòng</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>USD</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên loại phòng</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>USD</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($category as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td><img src="{{asset('img/upload/category')}}{{ '/'.$value->image }}" width="100" height="100"></td>
                            <td>{{ number_format($value->price,2) }}<span>&nbspVNĐ</span></td>
                            <td>{{ $value->usd}}<span>&nbspUSD</span></td>
                            <td>{!! $value->description !!}</td>
                            <td>
                                @if($value->status==1)
                                    {{ "Hiển thị" }}
                                @else
                                    {{ "Không hiển thị" }}
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-primary editCate" title="{{ "Sửa ".$value->name }}" data-toggle="modal" data-target="#edit" type="button" data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteCate" title="{{ "Xóa ".$value->name }}" data-toggle="modal" data-target="#delete" type="button" data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $category->links() }}</div>
            </div>
        </div>
    </div>
    <!-- Edit Modal-->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa <span class="title"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin: 5px">
                        <div class="col-lg-12">
                            <form role="form" id="updateCategory" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" class="idCategory">
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên loại phòng">
                                    <div class="alert alert-danger errorName"></div>
                                </fieldset>
                                <img class="img img-thumbnail imageThu" width="100" height="100" lign="center">
                                <div class="form-group">
                                    <label for="image">Ảnh minh họa</label>
                                    <input type="file" name="image" class="form-control image">
                                    <div class="alert alert-danger errorImage"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Đơn giá</label>
                                    <input type="text" name="price" placeholder="Nhập đơn giá"
                                           class="form-control price">
                                    <div class="alert alert-danger errorPrice"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Đơn giá USD</label>
                                    <input type="text" name="usd" placeholder="Nhập đơn giá"
                                           class="form-control usd">
                                    <div class="alert alert-danger errorUSD"></div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="form-control description" id="demo" name="description" cols="5"
                                              rows="5" placeholder="Mô tả phòng"></textarea>
                                    <div class="alert alert-danger errorDescription"></div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control status" name="status">
                                        <option value="1" class="ht">Hiển Thị</option>
                                        <option value="0" class="kht">Không Hiển Thị</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-success" value="Sửa">
                                <button type="reset" class="btn btn-primary">Làm Lại</button>
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete Modal-->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xóa ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="margin-left: 183px;">
                    <button type="button" class="btn btn-success del">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
@endsection
