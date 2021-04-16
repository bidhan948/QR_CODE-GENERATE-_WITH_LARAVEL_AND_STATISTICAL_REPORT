@extends('layout')
@section('page_title', 'Add Size')
@section('Size', 'active')
@section('container')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">ADD USER</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Size</h3>
                                </div>
                                <hr>
                                <form action="{{ url('addSizeSubmit') }}" method="post" novalidate="novalidate" id="form">
                                    @csrf
                                    <div class="form-group has-success">
                                        <label for="Size" class="control-label mb-1">Enter the size</label>
                                        <input id="Size" name="Size" type="text" class="form-control cc-name valid"
                                            data-val="true" data-val-required="Please enter the name on card"
                                            autocomplete="cc-name" aria-required="true" aria-invalid="false"
                                            aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name"
                                            data-valmsg-replace="true"></span>
                                        @error('Size')
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
