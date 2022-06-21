@extends('layout.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$web->account}}-{{$web->listname}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   

                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead class="thead-light">
                                <tr> 
                                    <th>Hostname</th>
                                    <th>IP</th>
                                    <th>Status</th>
                                    <th>Port</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($web->hostname as $hostname)
                                @php
                                    $hostnamer=str_replace('.', '-', $hostname);
                                @endphp
                                    @foreach ($web['ip'][$hostnamer] as $ip)
                                    <tr>
                                        <td>{{$hostname}} </td>
                                        <td>
                                            {{$ip}}</small>
                                        </td>
                                        @if ($web['status'][$hostnamer] == 'active')
                                        <td>
                                            <h5><span class="badge badge-success-lighten">Active</span></h5>
                                        </td>
                                        @else
                                        <td>
                                            <h5><span class="badge badge-danger-lighten">Not Active</span></h5>
                                        </td>
                                        @endif
                                        @php
                                            $ipr=str_replace('.', '-', $ip);
                                        @endphp
                                        <td>
                                            @foreach ($web['port'][$ipr] as $port)
                                            {{$port}}   
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
</div>
@endsection
