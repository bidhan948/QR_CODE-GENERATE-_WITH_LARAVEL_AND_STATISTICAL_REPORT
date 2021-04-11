@extends('layout')
@section('page_title', 'Edit User')
@section('dashboard', 'active')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Edit USER</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit User</h3>
                                </div>
                                <hr>
                                <form action="{{ url('editUserSubmit/'.$data[0]->id) }}" method="post" novalidate="novalidate" id="form">
                                    @csrf
                                    <div class="form-group has-success">
                                        <label for="name" class="control-label mb-1">User Name</label>
                                        <input id="name" name="name" type="text" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error" value="{{$data[0]->name}}">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('name')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Email" class="control-label mb-1">Email</label>
                                        <input id="Email" name="Email" type="text" class="form-control" aria-required="true"
                                            aria-invalid="false" value="{{$data[0]->email}}">
                                        <div id="email_check"></div>
                                        @error('Email')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="total_qr" class="control-label mb-1">Total Qr</label>
                                                <input id="total_qr" name="total_qr" type="text" class="form-control cc-exp"
                                                    autocomplete="cc-exp" value="{{$data[0]->total_qr}}">
                                                <span class="help-block" data-valmsg-for="cc-exp"
                                                    data-valmsg-replace="true"></span>
                                                @error('total_qr')
                                                    <p class="text-danger p-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Submit</span>
                                        </button>
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
