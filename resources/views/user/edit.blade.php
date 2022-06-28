@extends('layout.layout')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thay đổi thông tin người dùng</h4>
            </div>
            @if (session('status')==='success')
            <div class="alert alert-success" role="alert">
            <i class="dripicons-checkmark mr-2"></i> Cập nhật taì khoản <strong>thành công</strong>
            </div>
            @elseif (session('status')==='error'||$errors->any())
            <div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong mr-2"></i> Cập nhật tài khoản <strong>thất bại</strong>
            </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="col-xl-8 col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content align-self-center">
                        <div class="tab-pane active" id="settings">
                            <form action="{{route('user.update',$user)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" value="{{$user->email}}" type="text"
                                                class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input name="phone" value="{{$user->phone}}" type="text"
                                                class="form-control" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                        
                                    <div class="col-md-6">
                                        @if (session('user')->role === 'user')
                                        <div class="form-group">
                                            <label>Mật khẩu cũ</label>
                                            <input name="old_password" type="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                        @endif
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mật khẩu mới</label>
                                            <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                                        </div>
                                    </div>
                        
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Xác nhận mật khẩu</label>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                placeholder="Xác nhận mật khẩu">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button name="update" type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                                        Lưu</button>
                                        @if (session('user')->role === 'admin')
                                        <a href="{{route('user.delete',$user)}}" class="btn btn-danger mt-2"><i
                                            class="mdi mdi-delete"></i>Xóa</a>
                                        
                                        @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection