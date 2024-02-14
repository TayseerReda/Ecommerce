<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    #category routes

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}','update');


    });
    Route::get('/brands',App\Http\Livewire\Admin\Brand\Index::class);
    Route::controller(App\Http\Controllers\Admin\ProductControlle::class)->group(function () {
        Route::get('/products','index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/product/{product}/edit', 'edit');
        Route::get('/product_image/{image}/delete','destroy_image');
        Route::put('/product/{product}','update');
        Route::get('/product/{product}/delete', 'destroy');



    });
   
});