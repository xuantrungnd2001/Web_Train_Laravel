@extends('layout.layout')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thêm sinh viên</h4>
            </div>
            @if (session('status')=='success')
            <div class="alert alert-success" role="alert">
                <i class="dripicons-checkmark mr-2"></i> Tạo taì khoản <strong>thành công</strong>
            </div>
            @elseif (session('status')=='error')
            <div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong mr-2"></i> Tạo tài khoản <strong>thất bại</strong>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xl col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content align-self-center">
                        <!-- end tab-pane -->
                        <div class="tab-pane active" id="settings">
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i
                                        class="mdi mdi-account-circle mr-1"></i> Thông tin tài khoản
                                </h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account">Tên đăng nhập</label>
                                            <input type="text" class="form-control" id="account"
                                                name="account" placeholder="Tên đăng nhập">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Họ và tên</label>
                                            <input type="text" class="form-control" id="name"
                                                name="name" placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email"
                                                name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Số điện thoại</label>
                                            <input type="text" class="form-control" id="phone"
                                                name="phone" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="Mật khẩu">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Xác nhận mật khẩu">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-2" name="save"><i
                                            class="mdi mdi-content-save"></i> Lưu</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->

</div>
@endsection