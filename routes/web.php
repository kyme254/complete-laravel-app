<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
        Route::get('members',[AdminController::class,'members'])->name('admin.members');
        Route::get('order',[AdminController::class,'order'])->name('admin.order');
        Route::get('support',[AdminController::class,'support'])->name('admin.support');
        Route::get('payment',[AdminController::class,'payment'])->name('admin.payment');
        Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');

        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

        Route::get('edit/{id}',[AdminController::class,'edit'])->name('edit');
        Route::get('delete/{id}',[AdminController::class,'delete'])->name('delete');
        Route::post('update',[AdminController::class,'update'])->name('update');

       
});


Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('order',[UserController::class,'order'])->name('user.order');
    Route::get('support',[UserController::class,'support'])->name('user.support');
    Route::get('payment',[UserController::class,'payment'])->name('user.payment');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');

    
        Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
        Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
        Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
        Route::post('add',[UserController::class,'add'])->name('add');

    
});
