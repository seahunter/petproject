<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('logout');
    Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

    Route::prefix('admin')->group(function () {
        Route::resource('company', App\Http\Controllers\Admin\CompanyController::class);
        Route::resource('company.product', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('company.menu', App\Http\Controllers\Admin\MenuController::class);
    });
});
