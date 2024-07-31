<?php

use App\Http\Controllers\ApiUnesaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\TestController;

// use Artisan;
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

Route::get('/', [LandController::class, 'viewFirstPage'])->name('landing');
Route::get('page-laboratorium', [LandController::class, 'viewLaboratoriumPage']);
Route::get('page-laboratorium/detail-laboratorium/{id}', [LandController::class, 'viewLaboratoriumDetail']);
Route::get('page-layanan', [LandController::class, 'viewLayananPage']);
Route::get('page-layanan/detail-uji-lab/{id}', [LandController::class, 'viewUjiLabDetail']);
Route::get('page-kontak', [LandController::class, 'viewKontakPage']);
Route::get('page-about-unesa', [LandController::class, 'viewAboutUnesapage']);
Route::get('page-about-lab-teknik', [LandController::class, 'viewAboutLabTekpage']);
Route::get('page-about-app', [LandController::class, 'viewAboutApp']);
# Panduan
Route::get('page-panduan', [LandController::class, 'viewpanduanPage']);
Route::get('page-panduan/{rule}', [LandController::class, 'viewpanduanPageRule']);
# Data Source
Route::post('source-data-labs', [DataController::class, 'sourceDataLabs'])->name('source-data-labs');
Route::post('source-data-labs-find', [DataController::class, 'sourceDataLabsFind'])->name('source-data-labs-find');
Route::post('source-data-lab-test', [DataController::class, 'sourceDataLabTest'])->name('source-data-lab-test');
Route::post('source-data-filter-lab', [DataController::class, 'sourceDataFilterLab'])->name('source-data-filter-lab');
Route::post('source-data-sch-lab-open', [LaboratoryController::class, 'sourceDataScheduleLabJson'])->name('source_data_sch_lab_open');
#eksternal data
Route::prefix('unesa_api')->group(function () {
  Route::get('skripsi_mahasiswa',[ApiUnesaController::class, 'DataSkripsiMahasiswa'])->name('data_api_skripsi_mahasiswa');
  Route::get('skripsi_mahasiswa/{id}', [ApiUnesaController::class, 'DataSkripsiMahasiswaInit'])->name('data_api_skripsi_mahasiswa_init');
  #
  Route::get('datasource_mhs_skripsi', [ApiUnesaController::class, 'datasourceMhsSkripsi'])->name('datasource_skripsi_mahasiswa');
});

Route::prefix('data_api_student')->group(function () {
  Route::get('/', [DataController::class, 'sourceDataStudent']);
});
Route::prefix('data_api_lecture')->group(function () {
  Route::get('/', [DataController::class, 'sourceDataLecture']);
});
Route::prefix('data_api_lecture/migration')->group(function () {
  Route::get('/', [DataController::class, 'sourceDataLectureMig']);
});
Route::prefix('cek_data')->group(function () {
  Route::get('/', [DataController::class, 'cek_data']);
});
# Auth
Route::get('login', [AuthController::class,'viewLogin'])->name('login');
Route::post('login-action',[AuthController::class, 'actionLogin'])->name('login-action');
Route::get('register', [AuthController::class, 'viewRegister'])->name('view-register');
Route::post('register-action', [AuthController::class, 'actionRegister'])->name('register-action');
Route::get('logout', [AuthController::class, 'actionLogout'])->name('logout');
Route::get('init-user', [ProfileController::class,'IdenUser'])->name('init-user');
Route::get('reset', [AuthController::class, 'viewFormCheck'])->name('reset');
Route::post('reset-action', [AuthController::class, 'actReset'])->name('reset_action');
Route::get('reset_password/{token}', [AuthController::class, 'viewSetPassword'])->name('set_pessword');
Route::post('set_new_pass_action', [AuthController::class, 'actSetPassword'])->name('set_new_pass_action');
Route::get('reset-success', [AuthController::class, 'viewResetSuccess'])->name('reset_success');
# Captcha
Route::get('reload-captcha', [AuthController::class, 'reloadCaptcha'])->name('reload_captcha');
# Test
Route::get('test', [TestController::class, 'UnitTest'])->name('test');
Route::get('/foo', function () {
  echo 'test';
  Artisan::call('storage:link');
});