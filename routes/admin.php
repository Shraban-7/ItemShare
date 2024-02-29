<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

Route::get('admin/login',[AdminLoginController::class,'adminLoginView'])->middleware('guest')->name('admin.login.view');
Route::post('admin/login',[AdminLoginController::class,'adminLogin'])->middleware('guest')->name('admin.login');
Route::get('admin/logout',[AdminLoginController::class,'adminLogout'])->name('admin.logout');

Route::group(['prefix'=>'admin','middleware'=>['auth', 'admin']],function (){
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
});




