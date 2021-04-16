<?php
use App\Http\Controllers\QrCodrController;
use App\Http\Controllers\UsersTbController;
use App\Http\Controllers\QrTrafficConptroller;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/',[UsersTbController::class,'index'])->middleware('adminAuth');
    Route::get('/Add-User',[UsersTbController::class,'addUser'])->middleware('adminAuth');
    Route::POST('/addUserSubmit',[UsersTbController::class,'addUserSubmit'])->middleware('adminAuth');
    Route::POST('/addUserSubmitEmailCheck',[UsersTbController::class,'addUserSubmitEmailVerify'])->middleware('adminAuth');
    Route::get('/Edit-User/{id}',[UsersTbController::class,'editUser'])->middleware('adminAuth');
    Route::POST('/editUserSubmit/{id}',[UsersTbController::class,'editUserSubmit'])->middleware('adminAuth');
    Route::get('/switchStatus/{status}/{id}',[UsersTbController::class,'switchStatus'])->middleware('adminAuth');
    Route::get('/Profile',[UsersTbController::class,'userIndex']);
    // color route
    Route::get('/Color',[ColorController::class,'index'])->middleware('adminAuth');
    Route::get('/Add-Color',[ColorController::class,'addColor'])->middleware('adminAuth');
    Route::POST('/addColorSubmit',[ColorController::class,'addColorSubmit'])->middleware('adminAuth');
    Route::get('/deleteColor/{id}',[ColorController::class,'deleteColor'])->middleware('adminAuth');
    Route::get('/Edit-Color/{id}',[ColorController::class,'editColor'])->middleware('adminAuth');
    Route::POST('/editColorSubmit/{id}',[ColorController::class,'editColorSubmit'])->middleware('adminAuth');

});