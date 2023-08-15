<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group( function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/add-product', [ProductController::class, 'create'])->name('add-product');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/add-category', [CategoryController::class, 'create'])->name('add-category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
});
