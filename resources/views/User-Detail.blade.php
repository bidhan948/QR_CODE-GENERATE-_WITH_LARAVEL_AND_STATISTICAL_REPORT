@extends('layout')
@section('page_title', session('name') ." Detail")
@section('Change_user_detail', 'active')
@section('container')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                @if (session()->has('msg'))
                <p class="text-center text-success alert-success p-1 mb-3">{{ session('msg') }}</p>
                @endif
                <div class="overview-wrap mb-3">
                    <a class="au-btn au-btn-icon au-btn--blue text-white " href="{{ url('Update-Detail/'.$data[0]->id) }}">
                        <i class="zmdi zmdi-plus "></i>Update Detail</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Your Details</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Your Details</h3>
                            </div>
                            <hr>
                            <form novalidate="novalidate" id="form">
                                <div class="form-group has-success">
                                    <label for="name" class="control-label mb-1">User Name</label>
                                    <input id="name" name="name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error" value="{{$data[0]->name}}" readonly>
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="control-label mb-1">Email</label>
                                    <input id="Email" name="Email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$data[0]->email}}" readonly>
                                    <div id="email_check"></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="total_qr" class="control-label mb-1">Total Qr</label>
                                            <input id="total_qr" name="total_qr" type="text" class="form-control cc-exp" autocomplete="cc-exp" value="{{$data[0]->total_qr}}" readonly>
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="control-label mb-1">QR Code Used</label>
                                    <input id="Email" name="Email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$qr_code}}" readonly>
                                    <div id="email_check"></div>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="control-label mb-1">Total Qr code hit</label>
                                    <input id="Email" name="Email" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{$qr_code_used}}" readonly>
                                    <div id="email_check"></div>
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