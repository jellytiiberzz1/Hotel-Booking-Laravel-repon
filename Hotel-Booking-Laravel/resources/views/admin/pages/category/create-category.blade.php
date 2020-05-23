@extends('admin.layouts.master')

@section('title')
    Thêm danh mục Rooms
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Loại Phòng</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Nhập loại phòng">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Hiển Thị</option>
                            <option value="0">Không Hiển Thị</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Giá tiền</label>
                        <input type="text" name="price" class="form-control" placeholder="Nhập giá tiền">
                        @if($errors->has('price'))
                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Giá usd</label>
                        <input type="text" name="usd" class="form-control" placeholder="Nhập giá tiền usd">
                        @if($errors->has('usd'))
                            <div class="alert alert-danger">{{ $errors->first('usd') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mô tả phòng</label>
                        <textarea name="description" id="demo" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <button type="reset" class="btn btn-primary">Làm lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
