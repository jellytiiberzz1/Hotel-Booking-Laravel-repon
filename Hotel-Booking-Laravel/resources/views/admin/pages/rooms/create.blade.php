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
                            <option value="1">Phòng trống</option>
                            <option value="2">Phòng đặt trước</option>
                            <option value="0">Phòng đang sử dụng</option>
                        </select>
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
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
