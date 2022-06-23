@extends('layout.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
    
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Chỉnh sửa website</h4>
            </div>
            
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-xl">
                            <div class="form-group mt-3 mt-xl-0">
                                <form action="{{route('web.edit',$web)}}" name="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="listname">Tiêu đề</label>
                                        <input name="listname" type="text" id="projectname"
                                            class="form-control" placeholder="Nhập tiêu đề" value="{{$web->listname}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="startport">Start port</label>
                                        <input name="startport" type="number" id="startport"
                                            class="form-control" placeholder="1-65535" >
                                    </div>
                                    <div class="form-group">
                                        <label for="endport">End port</label>
                                        <input name="endport" type="number" id="endport"
                                            class="form-control" placeholder="1-65535" >
                                    </div>
                                    <div class="fallback">
                                        <input name="file" type="file" />
                                    </div>
                                    <button type="submit" class="btn btn-success mt-2" name="tasks"><i
                                            class="mdi mdi-content-save"></i>
                                        Lưu</button>
                                </form>
                            </div>
                        </div>
                        <div class="text-left">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection