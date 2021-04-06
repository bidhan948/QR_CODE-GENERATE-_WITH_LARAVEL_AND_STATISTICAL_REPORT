<?php
use App\Http\Controllers\QrCodrController;
use App\Http\Controllers\UsersTbController;
use App\Http\Controllers\QrTrafficController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login','login');
Route::POST('loginSubmit',[UsersTbController::class,'loginSubmit']);
