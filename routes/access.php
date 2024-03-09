<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RuleSystem;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DatatablesController;
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
		# first
		Route::get('/', [PengajuanController::class, 'dataPengajuan']);
		# form
		Route::get('form-pengajuan', [PengajuanController::class, 'formPengajuan']);
		#action
		Route::post('action-send-pengajuan', [PengajuanController::class, 'actionPengajuan'])->name('kirim_pengajuan');
		# viewpage
		Route::get('viewpage-pengajuan/{id}', [PengajuanController::class, 'viewPengajuan'])->name('viewpage_pengajuan');
		Route::get('detail-pengajuan/{id}', [PengajuanController::class, 'viewDetailPengajuan']);
		Route::get('viewpage-pengajuan-pdf/{id}', [PengajuanController::class, 'convertPDFPengajuan'])->name('convertpdf_pengajuan');
		# Source datatables
		Route::post('source-datatables-pengajuan', [DatatablesController::class, 'sourceDataPengajuan'])->name('source-datatables-pengajuan');
		
	});
	Route::prefix('laboratorium')->group(function () {
		# first
		Route::get('/', [LaboratoryController::class, 'dataLaboratory']);
		# viewpage
		Route::get('{id}/teknisi', [LaboratoryController::class, 'viewLabTechnicians']);
		Route::get('{id}/fasilitas', [LaboratoryController::class, 'viewLabFacility'])->name('laboratorium_fasilitas');
		Route::get('{id}/jadwal', [LaboratoryController::class, 'viewLabSchedule'])->name('laboratorium_schedule');
		Route::get('detail-fasilitas/{id}', [LaboratoryController::class, 'viewLabFacilityDetail']);
		# form
		Route::get('{id}/update-lab', [LaboratoryController::class, 'formUpdateLab'])->name('update_lab');
		Route::get('form-input-lab', [LaboratoryController::class, 'formLaboratory']);
		Route::get('{id}/form-tambah-fasilitas', [LaboratoryController::class, 'formAddLaboratoryFacility']);
		Route::get('form-update-fasilitas/{id}', [LaboratoryController::class, 'formUpdateLaboratoryFacility']);
		Route::get('form-input-jadwal/{id}', [LaboratoryController::class, 'formInputLaboratorySch']);
		Route::get('update-jadwal-lab/{id_lab}/{id_sch_lab}', [LaboratoryController::class, 'formUpdateLaboratorySch']);
		
		# action
		Route::post('input-laboratorium', [LaboratoryController::class, 'actionInputLaboratory'])->name('input_laboratorium');
		Route::post('update-laboratorium', [LaboratoryController::class, 'actionUpdateLaboratory'])->name('update_laboratorium');
		Route::post('input-user-tech', [LaboratoryController::class, 'actionInputUserTech'])->name('input_user_tech');
		Route::get('delete-teknisi/{id}', [LaboratoryController::class, 'actionDeleteTechnician']);
		Route::post('input-fasilitas-laboratorium', [LaboratoryController::class, 'actionInputLabFacilities'])->name('input_fasilitas_laboratorium');
		Route::post('update-fasilitas-laboratorium', [LaboratoryController::class, 'actionUpdateLabFacilities'])->name('update_fasilitas_laboratorium');
		Route::post('input-sch-laboratorium', [LaboratoryController::class, 'actionInputLabSch'])->name('input_sch_laboratorium');
		Route::post('update-sch-laboratorium', [LaboratoryController::class, 'actionUpdateLabSch'])->name('update_sch_laboratorium');
		Route::get('delete-sch-laboratorium/{id_sch_lab}', [LaboratoryController::class, 'actionDelLabSch'])->name('delete_sch_laboratorium');
		
		# Source datatables
		Route::post('source-datatables-laboratorium', [DatatablesController::class, 'sourceDataLaboratorium'])->name('source-datatables-laboratorium');
		Route::post('source-datatables-teknisi-lab', [DatatablesController::class, 'sourceDataTeknisiLab'])->name('source-datatables-teknisi-lab');
		Route::post('source-datatables-fasilitas-lab', [DatatablesController::class, 'sourceDataFasilitasLab'])->name('source-datatables-fasilitas-lab');
		Route::post('source-datatables-schedule-lab', [DatatablesController::class, 'sourceDataScheduleLab'])->name('source-datatables-schedule-lab');

		#Source data
		Route::post('source-data-sch-lab', [LaboratoryController::class, 'sourceDataScheduleLabJson'])->name('source_data_sch_lab');
		
	});
	Route::prefix('datasource')->group(function () {
		Route::post('users', [LaboratoryController::class, 'sourceDataUser'])->name('source-data-users');
	});
});

