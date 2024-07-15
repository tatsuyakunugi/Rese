<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserContoroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ImageUploadController;
//use App\Http\Controllers\ShopUploadController;

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

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail']);

Route::get('/menu', [UserContoroller::class, 'menu']);
Route::middleware('auth')->group(function () {
    Route::get('/mypage', [UserContoroller::class, 'mypage']);
});

Route::get('/register', [RegisterController::class, 'getRegister']);
Route::post('/register', [RegisterController::class, 'postRegister']);
Route::get('register/verify/{token}', [RegisterController::class, 'verify']);
Route::get('/thanks', [RegisterController::class, 'thanks']);

Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::post('/logout', [LoginController::class, 'postLogout']);

Route::middleware('auth')->group(function () {
    Route::post('/like/{shop}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/unlike{shop}', [LikeController::class, 'destroy'])->name('likes.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('/done', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/edit/{reservation_id}', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('done', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/done', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/review/{reservation_id}', [ReviewController::class, 'review']);
    Route::post('/completion', [ReviewController::class, 'store'])->name('reviews.store');
});
Route::get('/review_list/{shop_id}', [ReviewController::class, 'showList']);

Route::get('/image', [ImageUploadController::class, 'image']);
Route::post('/image_upload', [ImageUploadController::class, 'store'])->name('image_upload');

//Route::get('/create', [ShopUploadController::class, 'create'])->name('create');
//Route::post('/image_upload', [ShopUploadController::class, 'store'])->name('shop_upload');