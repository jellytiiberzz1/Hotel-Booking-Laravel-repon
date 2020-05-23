@extends('admin.layouts.master')

@section('title')
    Thêm nhân viên
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm nhân viên</h6>
        </div>
        <div class="row" style="margin: 5px">
            <div class="col-lg-12">
                <form role="form" action="{{ route('member.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="form-group">
                        <label>Tên nhân viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên nhân viên">
                        @if($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </fieldset>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <select class="form-control" name="role">
                            <option value="1">ADMIN</option>
                            <option value="2">Nhân viên</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                        @if($errors->has('address'))
                            <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label >CMND</label>
                        <input type="text" name="CMND" class="form-control" placeholder="Nhập CMND">
                        @if($errors->has('CMND'))
                            <div class="alert alert-danger">{{ $errors->first('CMND') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select class="form-control" name="gender">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại">
                        @if($errors->has('phone'))
                            <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Ngày sinh</label>
                        <input type="date" name="birthday" class="form-control">
                        @if($errors->has('birthday'))
                            <div class="alert alert-danger">{{ $errors->first('birthday') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Nhập email">
                        @if($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                        @if($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" name="password2" class="form-control" placeholder="Nhập lại mật khẩu">
                        @if($errors->has('password2'))
                            <div class="alert alert-danger">{{ $errors->first('password2') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh minh họa</label>
                        <input type="file" name="avatar" class="form-control">
                        @if($errors->has('avatar'))
                            <div class="alert alert-danger">{{ $errors->first('avatar') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                    <button type="reset" class="btn btn-primary">Làm lại</button>
                </form>
            </div>
        </div>
    </div>
@endsection
