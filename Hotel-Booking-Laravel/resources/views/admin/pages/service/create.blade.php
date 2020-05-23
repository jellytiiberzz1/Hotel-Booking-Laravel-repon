@extends('admin.layouts.master')

@section('title')
    Thêm Dịch vụ
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Dịch vụ</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tên phòng</label>
                        <select class="form-control" name="idRoom">
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->number_room }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    <div class="form-group">
                        <label>Dịch vụ phòng</label>
                        <select class="form-control" name="idServiceslug">
                            @foreach($serviecSlug as $Slug)
                                <option value="{{ $Slug->id }}">{{ $Slug->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số lượng</label>
                        <input class="form-control" type="text" name="quantity" placeholder="Nhập số lượng">
                        @if($errors->has('quantity'))
                            <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input class="form-control" type="text" name="price" placeholder="Nhập giá tiền">
                        @if($errors->has('price'))
                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Chú thích</label>
                        <textarea class="form-control" type="text" name="note" cols="5" rows="5" ></textarea>
                        @if($errors->has('note'))
                            <div class="alert alert-danger">{{ $errors->first('note') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Ngày tạo</label>
                        <input class="form-control" type="date" name="created_at">
                        @if($errors->has('created_at'))
                            <div class="alert alert-danger">{{ $errors->first('created_at') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập Lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
