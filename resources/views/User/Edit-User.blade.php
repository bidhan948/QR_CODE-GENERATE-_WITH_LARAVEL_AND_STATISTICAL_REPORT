@extends('layout')
@section('page_title', 'Edit User')
@section('Change_user_detail', 'active')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Edit detail</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit your Detail</h3>
                                </div>
                                <hr>
                                <form action="{{ url('editUserDetailSubmit/'.$data[0]->id) }}" method="post" novalidate="novalidate" id="form">
                                    @csrf
                                    <div class="form-group has-success">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input id="name" name="name" type="text" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error" value="{{ $data[0]->name }}">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('name')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="link" class="control-label mb-1">Old Password</label>
                                        <input id="link" name="o_password" type="password" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('o_password')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="link" class="control-label mb-1">New Password</label>
                                        <input id="link" name="n_password" type="password" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('n_password')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="link" class="control-label mb-1">Confirm Password</label>
                                        <input id="link" name="c_password" type="password" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('c_password')
                                            <p class="text-danger p-1">{{ $message }}</p>
                                        @enderror
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
