<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
Route::group(['middleware' => ['auth:api']],function () {
    Route::post('comment/add', [CommentController::class,'add'])->middleware('TwoComment');
    Route::get('product',[ProductController::class,'get']);
});


