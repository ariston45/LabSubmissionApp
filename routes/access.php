<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RuleSystem;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\SettingController;
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

// Route::group(['middleware' => ['rulesystem:ADMIN_SYSTEM']], function () {
// 	# Admin
// 	Route::get('beranda', [HomeController::class, 'HomeSystem']);
// });

Route::group(['middleware' => ['auth']], function () {
	# Admin
	Route::get('beranda', [HomeController::class, 'HomeSystem']);
	Route::prefix('pengajuan')->group(function () {
		// first
		Route::get('/', [PengajuanController::class, 'dataPengajuan']);
		// form
		Route::get('form-pengajuan', [PengajuanController::class, 'formPengajuan']);
		Route::post('action-send-pengajuan', [PengajuanController::class, 'actionPengajuan'])->name('kirim_pengajuan');
		// viewpage
		Route::get('viewpage-pengajuan/{id}', [PengajuanController::class, 'viewPengajuan'])->name('viewpage_pengajuan');
		Route::get('detail-pengajuan/{id}', [PengajuanController::class, 'viewDetailPengajuan']);
		Route::get('viewpage-pengajuan-pdf/{id}', [PengajuanController::class, 'convertPDFPengajuan'])->name('convertpdf_pengajuan');
		// Source datatables
		Route::post('source-datatables-pengajuan', [PengajuanController::class, 'sourceDataPengajuan'])->name('source-datatables-pengajuan');
		
	});
	Route::prefix('laboratorium')->group(function () {
		Route::get('/', [LaboratoryController::class, 'dataLaboratory']);
		Route::get('form-input-lab', [LaboratoryController::class, 'formLaboratory']);
		Route::post('input-laboratorium', [LaboratoryController::class, 'actionInputLaboratory'])->name('input_laboratorium');
	});
});

