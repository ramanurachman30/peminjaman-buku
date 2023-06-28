<?php

use App\Http\Controllers\BookPeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserPeminjamController;
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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('/dashboard', DashboardController::class);

Route::resource('/user-peminjam', UserPeminjamController::class);
Route::resource('/book-peminjam', BookPeminjamController::class);
Route::resource('/peminjaman', PeminjamanController::class);
