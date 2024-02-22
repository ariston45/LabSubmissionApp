<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'viewLanding'])->name('landing');

Route::get('login', [AuthController::class,'viewLogin'])->name('login');
Route::post('login-action',[AuthController::class, 'actionLogin'])->name('login-action');

Route::get('register', [AuthController::class, 'viewRegister'])->name('view-register');
Route::post('register-action', [AuthController::class, 'actionRegister'])->name('register-action');

Route::get('logout', [AuthController::class, 'actionLogout'])->name('logout');
Route::get('init-user', [ProfileController::class,'IdenUser'])->name('init-user');

Route::get('test', [AuthController::class, 'test'])->name('test');