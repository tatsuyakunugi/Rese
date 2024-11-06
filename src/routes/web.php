<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserContoroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDeleteReviewController;
use App\Http\Controllers\CsvController;

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
Route::get('/sort', [ShopController::class, 'sort'])->name('shop.sort');
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
    Route::get('/review/{shop_id}', [ReviewController::class, 'review']);
    Route::post('/review/store', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/review/update', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/review/delete', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});
Route::get('/review_list/{shop_id}', [ReviewController::class, 'showList']);

Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/login', [AdminLoginController::class, 'getAdminLogin'])->name('admin.showLogin');
    Route::post('/admin/login', [AdminLoginController::class, 'postAdminLogin']);
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/admin/logout', [AdminLoginController::class, 'postAdminLogout']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [AdminUserController::class, 'show']);
    Route::get('/admin/user_list', [AdminUserController::class, 'getUserList']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/review_detail/{user_id}', [AdminDeleteReviewController::class, 'getReviewDetail'])->name('admin.showReviewDetail');
    Route::delete('/admin/review_detail/{review_id}', [AdminDeleteReviewController::class, 'destroy'])->name('admin.reviewDestroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/csv', [CsvController::class, 'getCsv'])->name('csv.show');
    Route::post('/admin/csv/upload', [CsvController::class, 'store'])->name('csv.upload');
});