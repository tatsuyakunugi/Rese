<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserContoroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShopUploadController;

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
Route::get('/detail', [ShopController::class, 'detail']);

Route::get('/menu', [UserContoroller::class, 'menu']);
Route::get('/mypage', [UserContoroller::class, 'mypage']);

Route::get('/register', [RegisterController::class, 'getRegister']);
Route::post('/register', [RegisterController::class, 'postRegister']);
Route::get('/thanks', [RegisterController::class, 'thanks']);

Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'getLogout']);

Route::middleware('auth')->group(function () {
    Route::post('/likes/{shop}', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes{shop}', [LikeController::class, 'destroy'])->name('likes.destroy');
});

Route::get('/create', [ShopUploadController::class, 'create'])->name('create');
Route::post('/shop_upload', [ShopUploadController::class, 'store'])->name('shop_upload');