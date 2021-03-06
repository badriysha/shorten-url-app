<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UrlController;
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

Auth::routes();

Route::get('/', [UrlController::class, 'create'])->name('url.create');
Route::post('/store', [UrlController::class, 'store'])->name('url.store');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/links', [AdminController::class, 'index'])->middleware('admin');
Route::get('/links/{id}', [UrlController::class, 'show'])->middleware('auth');
Route::get('/users', [AdminController::class, 'user'])->middleware('admin');

Route::get('/{code}', [UrlController::class, 'process'])->name('url.code');
