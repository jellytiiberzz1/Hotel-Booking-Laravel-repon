@extends('admin.layouts.master')

@section('title')
    Thêm Phòng
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm Phòng</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('rooms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Số Phòng</label>
                        <input class="form-control" name="number_room" placeholder="Nhập số phòng">
                        @if($errors->has('number_room'))
                            <div class="alert alert-danger">{{ $errors->first('number_room') }}</div>
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
                        <label>Mô tả phòng</label>
                        <textarea name="description" id="demo" cols="5" rows="5" class="form-control"></textarea>
                        @if($errors->has('description'))
                            <div class="alert alert-danger">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Mệnh giá</label>
                        <input type="text" name="price" placeholder="Nhập mệnh giá" class="form-control">
                        @if($errors->has('price'))
                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <input type="hidden" name="usd" value="0" class="form-control">
                    <div class="form-group">
                        <label for="price">Giá khuyến mại</label>
                        <input type="text" name="sale" value="0" placeholder="Nhập giá khuyến mại nếu có" class="form-control">
                        @if($errors->has('sale'))
                            <div class="alert alert-danger">{{ $errors->first('sale') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Loại phòng</label>
                        <select class="form-control cateRooms" name="idCategory">
                            @foreach($category as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kiểu phòng</label>
                        <select class="form-control roomkindRooms" name="idKindRooms">
                            @foreach($kindrooms as $kind)
                                <option value="{{ $kind->id }}">{{ $kind->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Ảnh minh họa</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>




                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
