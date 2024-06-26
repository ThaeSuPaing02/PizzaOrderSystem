<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AlrelreadyAuthenticatedMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





//login , register
Route::redirect('/','loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage')->middleware(AlrelreadyAuthenticatedMiddleware::class);
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage')->middleware(AlrelreadyAuthenticatedMiddleware::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //dashboard 
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    //admin
    //category
    Route::group(['prefix'=>'category','middleware'=>'admin_auth'],function(){
        Route::get('list',[CategoryController::class,'list'])->name('category#list');
        Route::get('createPage',[CategoryController::class,'createPage'])->name('category#createPage');
        Route::post('create',[CategoryController::class,'create'])->name('category#create');
        Route::get('editPage/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
        Route::post('edit',[CategoryController::class,'edit'])->name('category#edit');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    });

    Route::group(['prefix'=>'product','middleware'=>'admin_auth'],function(){
        Route::get('createPage',[ProductController::class,'createPage'])->name('product#createPage');
        Route::post('create',[ProductController::class,'create'])->name('product#create');
        Route::get('list',[ProductController::class,'list'])->name('product#list');
    });
    //admin
    //change password
    //profile 
    Route::group(['prefix'=>'admin','middleware'=>'admin_auth'],function(){
        Route::get('password/changePage',[AuthController::class,'changePasswordPage'])->name('admin#changePasswordPage');
        Route::post('password/change',[AuthController::class,'changePassword'])->name('admin#changePassword');
        Route::get('profilePage',[AuthController::class,'profilePage'])->name('admin#profilePage');
        Route::get('profile/EditPage',[AuthController::class,'profileEditPage'])->name('admin#profileEditPage');
        Route::post('profile/update/{id}',[AuthController::class,'profileUpdate'])->name('admin#updateProfile');
        });
    //user
    //home
    Route::group(['prefix'=>'user','middleware'=>'user_auth'],function(){
        Route::get('home',function(){
           // return "User Home Page";
            return view('user.home');
        })->name('user#home');
    });
});


