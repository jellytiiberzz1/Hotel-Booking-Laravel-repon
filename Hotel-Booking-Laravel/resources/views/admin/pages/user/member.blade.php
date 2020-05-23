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
                        <th scope="col">Thông tin nhân viên</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Thông tin nhân viên</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Quyền</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Chỉnh sửa</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($member as $key => $value)
                        <tr>
                            <th scope="row">{{$key+=1}}</th>
                            <td><b>Tên NV:</b>{{$value->name}}<br/>
                                <b>Địa chỉ:</b>{{$value->address}}<br/>
                                <b>ID công dân:</b>{{$value->CMND}}<br/>
                                <b>Giới tính:</b> <span class="label label-success">
                                @if($value->gender==1)
                                        {{ "Nam" }}
                                    @elseif($value->gender==2)
                                        {{ "Nữ" }}
                                    @endif
                                </span><br/>
                                <b>SĐT:</b> {{$value->phone}}<br/>
                                <b>Email:</b> {{$value->email}}<br/>
                            </td>
                            <td><img src="{{asset('img/upload/avatar')}}{{ '/'.$value->avatar }}" width="150" height="150"></td>
                            <td>
                                <span class="label label-success">
                                @if($value->role==1)
                                        {{ "Admin" }}
                                    @elseif($value->role==2)
                                        {{ "Nhân viên" }}
                                    @endif
                                </span>
                            </td>
                            <td>
                                <span class="lable label-danger">
                                 @if($value->status==1)
                                        {{ "Khóa" }}
                                    @else
                                        {{ "Đang sử dụng" }}
                                    @endif
                                </span>
                            </td>

                            <td>

                                <button class="btn btn-primary editMember" title="{{ "Sửa ".$value->name }}"
                                        data-toggle="modal" data-target="#edit" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger deleteMember" title="{{ "Xóa ".$value->name }}"
                                        data-toggle="modal" data-target="#delete" type="button"
                                        data-id="{{ $value->id }}"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">{{ $member->links() }}</div>
            </div>
        </div>
    </div>
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
                            <form role="form" id="updateUser" method="post" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <label>Name</label>
                                    <input class="form-control name" name="name" placeholder="Nhập tên">
                                    <div class="alert alert-danger errorName"></div>
                                </fieldset>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select class="form-control role" name="role">
                                        <option value="1" class="ad">Admin</option>
                                        <option value="2" class="nv">Nhân viên</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <select class="form-control status" name="status">
                                        <option value="0" class="ht">Đang sử dụng</option>
                                        <option value="1" class="kht">Đã khóa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <select class="form-control gender" name="gender">
                                        <option value="1" class="nam">Nam</option>
                                        <option value="2" class="nu">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Địa chỉ</label>
                                    <input type="text" name="address" placeholder="Nhập địa chỉ"
                                           class="form-control address">
                                    <div class="alert alert-danger errorAddress"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">CMND</label>
                                    <input type="text" name="CMND" placeholder="Nhập chứng minh"
                                           class="form-control CMND">
                                    <div class="alert alert-danger errorCMND"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Số điện thoai</label>
                                    <input type="text" name="phone" placeholder="Nhập số điện thoại"
                                           class="form-control phone">
                                    <div class="alert alert-danger errorPhone"></div>
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input class="form-control birthday" type="date" name="birthday">
                                    <div class="alert alert-danger errorBirthday"></div>
                                </div>
                                <div class="form-group">
                                    <label for="price">Email</label>
                                    <input type="text" name="email" placeholder="Nhập Email"
                                           class="form-control email">
                                    <div class="alert alert-danger errorEmail"></div>
                                </div>
                                <img class="img img-thumbnail imageAva" width="100" height="100" lign="center">
                                <div class="form-group">
                                    <label for="image">Ảnh minh họa</label>
                                    <input type="file" name="avatar" class="form-control avatar">
                                    <div class="alert alert-danger errorAvatar"></div>
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
                    <button type="button" class="btn btn-success delMember">Có</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không</button>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
