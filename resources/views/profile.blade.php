@extends('layout')
@section('page_title', session('name') . ' Dashboard')
@section('', 'active')
@section('container')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session()->has('msg'))
                            <p class="text-center text-success alert-success p-1 mb-3">{{ session('msg') }}</p>
                        @endif
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                            <a class="au-btn au-btn-icon au-btn--blue text-white font-weight-bold"
                                href="{{ url('Add-Qr') }}">
                                <i class="zmdi zmdi-plus font-weight-bold"></i>Add Qr</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-1 m-b-25 text-center">Qr's Report</h2>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>QR code</th>
                                        <th>Link</th>
                                        <th>Size</th>
                                        <th>Added On</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($data != '')
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="pt-4">{{ ++$i }}</td>
                                                <td class="pt-4">{{ $item->qr_name }} <br> <a
                                                        href="{{ url('QR-Report/' . $item->id) }}">Report</a><br>
                                                    @if (session('role') == 1)
                                                        Added by : {{ $item->name }}
                                                    @endif
                                                </td>
                                                <td><a href="{{ url('report/' . $item->id) }}">
                                                        <img src="https://chart.apis.google.com/chart?cht=qr&chs={{ $item->size }}&chl={{ $item->link }}&chco={{ $item->color }}"
                                                            alt="QR" target="_blank"></a>
                                                    <br>
                                                    <a href="{{url('downloadQr/'.$item->id)}}" class="">Download</a>
                                                </td>
                                                <td class="text-center pt-4">{{ Str::of($item->link)->limit(20) }}</td>
                                                <td class="pt-4">{{ $item->size }}</td>
                                                <td class="text-center pt-4">{{ $item->created_at }}
                                                </td>
                                                <td class="pt-4"> <a href="{{ url('Edit-Qr/' . $item->id) }}"
                                                        class="btn btn-success">Edit
                                                        <i class="fas fa-edit p-1"></i></a>
                                                </td>
                                                <td class="pt-4">
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('qrswitchStatus/0/' . $item->id) }}"
                                                            class="btn btn-info">Active <i
                                                                class="fas fa-dot-circle p-1"></i></a>
                                                </td>
                                            @else
                                                <a href="{{ url('qrswitchStatus/1/' . $item->id) }}"
                                                    class="btn btn-danger">Deactive <i
                                                        class="fas fa-dot-circle p-1"></i></a></td>
                                        @endif
                                        </tr>
                                    @endforeach
                                @else
                                    No data found
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
