@extends('layout')
@section('page_title', 'Size')
@section('Size', 'active')
@section('container')
<style>
    #color{
        /* height: 10px; */
        width: 20px;
    }
</style>
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
                        <a class="au-btn au-btn-icon au-btn--blue text-white font-weight-bold" href="{{ url('Add-Size') }}">
                            <i class="zmdi zmdi-plus font-weight-bold px-1"></i>Add Size</a>
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
                                    <th>Size</th>
                                    <th>Added On</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data != "")
                                @php
                                $i = 0;
                                @endphp
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td class="text-center">{{$item->created_at->toDateString('Y-m-d')}}</td>
                                    <td><a href="{{url('Edit-Size/'.$item->id)}}" class="btn btn-success">Edit <i class="fas fa-edit p-1"></i></a>
                                    <td><a href="{{url('deleteSize/'.$item->id)}}" class="btn btn-outline-danger">Delete <i class="fas fa-trash-alt p-1"></i></a>
                                    </td>
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