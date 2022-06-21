@extends('layout.layout')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Danh sách website</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{route('web.create')}}" class="btn btn-success mb-2"><i
                                    class="mdi mdi-plus-circle mr-2"></i> Thêm danh sách</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100"
                            id="products">
                            <thead>
                                <tr>
                                    <th>Tên danh sách</th>
                                    <th style="width: 75px;">Sửa</th>
                                    <th style="width: 75px;">Xóa</th>
                                    <th>Tên danh sách</th>
                                    <th style="width: 75px;">Sửa</th>
                                    <th style="width: 75px;">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 0;
                                    @endphp
                                @foreach ($data as $web)
                                    @php if($num % 2 === 0)
                                    echo'<tr>';
                                    @endphp
                                    
                                    <td class="table-user">
                                        <img src="{{asset('images/users/avatar.png')}}" alt="table-user"
                                            class="mr-2 rounded-circle">
                                        <a href="{{route('web.show',$web)}}" 
                                            class="text-body
                                            font-weight-semibold">{{$web->listname}}</a>
                                    </td>
                                    <td><a href="{{route('web.edit',$web)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a></td>
                                    <td><a href="{{route('web.delete',$web)}}" class="action-icon"> <i class="mdi mdi-delete"></i></a></td>
                                    @php if($num % 2 === 1)
                                        echo'</tr>';
                                        $num++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div>
@endsection