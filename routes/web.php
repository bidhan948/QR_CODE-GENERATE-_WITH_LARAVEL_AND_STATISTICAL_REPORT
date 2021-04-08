<?php
use App\Http\Controllers\QrCodrController;
use App\Http\Controllers\UsersTbController;
use App\Http\Controllers\QrTrafficController;

Route::get('/logout',function(){
    session()->forget('id');
    session()->forget('name');
    session()->forget('email');
    session()->forget('password');
    session()->forget('role');
    session()->flash('msg','Logged Out successfully');
    return redirect('login');
});
Route::view('/login','login');
Route::POST('loginSubmit',[UsersTbController::class,'loginSubmit']);

Route::group(['middleware'=>['userAuth']],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/Add-User',[UsersTbController::class,'addUser']);
});