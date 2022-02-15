<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EBookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'getWelcomePage']);


Auth::routes();


Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/ebooks/{id}', [EBookController::class, 'getDetails'])->middleware('auth');

Route::get('/profile', [AccountController::class, 'getProfile'])->middleware('auth');
Route::post('/update-profile', [AccountController::class, 'updateProfile'])->middleware('auth');
Route::get('/updated', [PageController::class, 'getUpdated'])->middleware('auth');

Route::get('/account_maintenance', [PageController::class, 'getAccPage'])->middleware('auth')->middleware('adminOnly');
Route::get('/update-role/{id}', [PageController::class, 'getUpdateRolePage'])->middleware('auth')->middleware('adminOnly');
Route::post('/update-role/{id}', [AccountController::class, 'updateRole'])->middleware('auth')->middleware('adminOnly');
Route::get('/delete-acc/{id}', [AccountController::class, 'deleteAcc'])->middleware('auth')->middleware('adminOnly');

Route::get('/cart', [PageController::class, 'getCartPage'])->middleware('auth');
Route::get('/insert-cart/{id}', [CartController::class, 'insertCart'])->middleware('auth');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->middleware('auth');
Route::get('/order', [CartController::class, 'getOrder'])->middleware('auth');

