@extends('layout.layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Thông tin người dùng</h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg">
            <div class="card">
                <div class="card-body">
                    
                    <div class="tab-content align-self-center">
                        <div class="tab-pane active" id="aboutme">
                            <div class="col-xl col-lg">
                                <div class="card text-center">
                                    <div class="card-body justify-content-md-center">
                                        <img src="{{asset('images/users/avatar.png')}}"
                                            class="rounded-circle avatar-lg img-thumbnail"
                                            alt="profile-image">
                                        <div class="text-center mt-3 ">
                                            <p class="text-muted mb-2 font-13"><strong>Họ và tên
                                                    :</strong> <span
                                                    class="ml-2">{{$user->name}}</span>
                                            </p>
                                            <p class="text-muted mb-2 font-13"><strong>Tài khoản
                                                    :</strong> <span
                                                    class="ml-2">{{$user->account}}</span>
                                            </p>
                                            <p class="text-muted mb-2 font-13"><strong>Số điện thoại
                                                    :</strong><span
                                                    class="ml-2">{{$user->phone}}</span>
                                            </p>

                                            <p class="text-muted mb-2 font-13"><strong>Email :</strong>
                                                <span
                                                    class="ml-2 ">{{$user->email}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection