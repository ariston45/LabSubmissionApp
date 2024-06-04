<?php

use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RuleSystem;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DatatablesController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LandController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMail;
use App\Mail\EmailAction;


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
Route::prefix('landing')->group(function () {
	Route::get('/', [LandController::class, 'viewFirstPage']);
});
#
Route::group(['middleware' => ['auth']], function () {
	Route::prefix('datasource')->group(function () {
		# Source datatables
		Route::post('source-datatables-laboratorium', [DatatablesController::class, 'sourceDataLaboratorium'])->name('source-datatables-laboratorium');
		Route::post('source-datatables-teknisi-lab', [DatatablesController::class, 'sourceDataTeknisiLab'])->name('source-datatables-teknisi-lab');
		Route::post('source-datatables-fasilitas-lab', [DatatablesController::class, 'sourceDataFasilitasLab'])->name('source-datatables-fasilitas-lab');
		Route::post('source-datatables-test-lab', [DatatablesController::class, 'sourceDataTestLab'])->name('source-datatables-test-lab');
		Route::post('source-datatables-schedule-lab', [DatatablesController::class, 'sourceDataScheduleLab'])->name('source-datatables-schedule-lab');
		Route::post('source-datatables-lab-byshcedule', [DatatablesController::class, 'sourceDataLabSchedule'])->name('source_datatables_lab_byshcedule');
		Route::post('source-datatables-lab-byfacility', [DatatablesController::class, 'sourceDataLabFacility'])->name('source_datatables_lab_byfacility');
		Route::post('source-datatables-fasilitas', [DatatablesController::class, 'sourceDataFasilitas'])->name('source-datatables-fasilitas');
		Route::post('source-datatables-user', [DatatablesController::class, 'sourceDataUsers'])->name('source-datatables-user');
		Route::post('source-datatables-pengajuan', [DatatablesController::class, 'sourceDataPengajuan'])->name('source-datatables-pengajuan');
		Route::post('source-datatables-pengajuan-archieve', [DatatablesController::class, 'sourceDataPengajuanArchive'])->name('source-datatables-pengajuan-archieve');
		Route::post('source-datatables-pengajuan-additional', [DatatablesController::class, 'sourceDataPengajuanAdditional'])->name('source-datatables-pengajuan-additional');
		#Other
		Route::post('source-data-sch-lab', [LaboratoryController::class, 'sourceDataScheduleLabJson'])->name('source_data_sch_lab');
		Route::post('users', [DataController::class, 'sourceDataUser'])->name('source-data-users');
		Route::post('all-lab', [DataController::class, 'sourceDataLab'])->name('source-data-all-lab');
		Route::post('facilities', [DataController::class, 'sourceDataFacilities'])->name('source-data-facilities');
		Route::post('search-users', [DataController::class, 'serchingDataUser'])->name('source-data-search-users');
		Route::post('data-times-sch', [DataController::class, 'sourceTimeData'])->name('data-times-sch');
		Route::match(['get', 'post'], 'source-data-month-ondashboard', [DataController::class, 'sourceMonthOnDashboard'])->name('source-data-month-ondashboard');
		Route::match(['get', 'post'], 'source-check-skripsi', [DataController::class, 'checkDataStudent'])->name('source-check-skripsi');
		Route::match(['get', 'post'], 'source-data-cost-lab-tables', [DataController::class, 'viewLabCostTables'])->name('source-data-cost-lab-tables');
		Route::match(['get', 'post'], 'source-data-cost-facility-tables', [DataController::class, 'viewFacilityCostTables'])->name('source-data-cost-facility-tables');
		Route::match(['get', 'post'], 'source-data-check-sch', [DataController::class, 'viewCheckDataSch'])->name('source-data-check-sch');
		Route::match(['get', 'post'], 'source-data-testlab', [DataController::class, 'sourceDataTestLab'])->name('source_data_testlab');
		Route::match(['get', 'post'], 'source-data-cost-labtest-tables', [DataController::class, 'viewLabtestCostTables'])->name('source_data_cost_labtest_tables');
		
	});
	
	/*************************************************************************************************************************************************/
	Route::prefix('download')->group(function () {
		Route::get('bukti-bayar/{filename}', [DataController::class, 'downloadBuktiBayar'])->name('download_bukti_bayar');
		Route::get('laporan/{filename}', [DataController::class, 'downloadLaporanKegiatan'])->name('download_result_report');
	});
	/*************************************************************************************************************************************************/
	Route::get('beranda', [HomeController::class, 'HomeSystem']);
	/*************************************************************************************************************************************************/
	Route::prefix('pengajuan')->group(function () {
		# first
		Route::get('/', [PengajuanController::class, 'dataPengajuan']);
		Route::get('additional', [PengajuanController::class, 'dataPengajuanAdditional']);
		Route::get('data-arsip', [PengajuanController::class, 'dataPengajuanArchice']);
		# form
		Route::get('form-pengajuan', [PengajuanController::class, 'formPengajuan']);
		Route::get('form-pengajuan-labtest', [PengajuanController::class, 'formPengajuanLabTest']);
		Route::get('form-laporan/{id}', [PengajuanController::class, 'formLaporan']);
		#action
		Route::post('action-send-pengajuan', [PengajuanController::class, 'actionPengajuan'])->name('kirim_pengajuan');
		Route::get('action-acc-kalab/{id}', [PengajuanController::class, 'actionAccA'])->name('act-pengajuan-a');
		Route::post('update-acceptable-submission', [PengajuanController::class, 'actionAccA'])->name('update_acceptable_submission');
		Route::post('update-technical-submission', [PengajuanController::class, 'actionSettechnical'])->name('update_technical_submission');
		Route::post('update-technical-report-submission', [PengajuanController::class, 'actionTechReport'])->name('update_technical_report_submission');
		Route::post('action-upload-laporan', [PengajuanController::class, 'actionUploadLaporan'])->name('upload_laporan');
		Route::post('update-validation-report', [PengajuanController::class, 'actionUpdateValidation'])->name('update_validation_report');
		# viewpage
		Route::get('viewpage-pengajuan/{id}', [PengajuanController::class, 'viewPengajuan'])->name('viewpage_pengajuan');
		Route::get('detail-pengajuan/{id}', [PengajuanController::class, 'viewDetailPengajuan'])->name('detail_pengajuan');
		Route::get('viewpage-pengajuan-pdf/{id}', [PengajuanController::class, 'convertPDFPengajuan'])->name('convertpdf_pengajuan');
		# Source datatables
	});
	/*************************************************************************************************************************************************/
	Route::prefix('laboratorium')->group(function () {
		# first
		Route::get('/', [LaboratoryController::class, 'dataLaboratory']);
		# viewpage
		Route::get('{id}/teknisi', [LaboratoryController::class, 'viewLabTechnicians']);
		Route::get('{id}/fasilitas', [LaboratoryController::class, 'viewLabFacility'])->name('laboratorium_fasilitas');
		Route::get('{id}/ujilab', [LaboratoryController::class, 'viewUjiLab'])->name('laboratorium_uji_lab');
		Route::get('{id}/jadwal', [LaboratoryController::class, 'viewLabSchedule'])->name('laboratorium_schedule');
		Route::get('detail-fasilitas/{id}', [LaboratoryController::class, 'viewLabFacilityDetail']);
		Route::get('detail-ujilab/{id}', [LaboratoryController::class, 'viewLabTestDetail']);
		# form
		Route::get('{id}/update-lab', [LaboratoryController::class, 'formUpdateLab'])->name('update_lab');
		Route::get('form-input-lab', [LaboratoryController::class, 'formLaboratory']);
		Route::get('{id}/form-tambah-fasilitas', [LaboratoryController::class, 'formAddLaboratoryFacility']);
		Route::get('{id}/form-tambah-ujilab', [LaboratoryController::class, 'formAddLaboratoryTest']);
		Route::get('form-update-fasilitas/{id}', [LaboratoryController::class, 'formUpdateLaboratoryFacility']);
		Route::get('form-update-ujilab/{id}', [LaboratoryController::class, 'formUpdateLaboratoryUji']);
		Route::get('form-input-jadwal/{id}', [LaboratoryController::class, 'formInputLaboratorySch']);
		Route::get('form-exclude-jadwal/{id}', [LaboratoryController::class, 'formExcludeLaboratorySch']);
		Route::get('update-jadwal-lab/{id_lab}/{id_sch_lab}', [LaboratoryController::class, 'formUpdateLaboratorySch']);
		# action
		Route::post('input-laboratorium', [LaboratoryController::class, 'actionInputLaboratory'])->name('input_laboratorium');
		Route::post('update-laboratorium', [LaboratoryController::class, 'actionUpdateLaboratory'])->name('update_laboratorium');
		Route::post('input-user-tech', [LaboratoryController::class, 'actionInputUserTech'])->name('input_user_tech');
		Route::get('delete-teknisi/{id}', [LaboratoryController::class, 'actionDeleteTechnician']);
		Route::post('input-fasilitas-laboratorium', [LaboratoryController::class, 'actionInputLabFacilities'])->name('input_fasilitas_laboratorium');
		Route::post('update-fasilitas-laboratorium', [LaboratoryController::class, 'actionUpdateLabFacilities'])->name('update_fasilitas_laboratorium');
		Route::get('delete-facility-laboratorium/{id}', [LaboratoryController::class, 'actionDeleteLabFacilities']);
		Route::post('input-sch-laboratorium', [LaboratoryController::class, 'actionInputLabSch'])->name('input_sch_laboratorium');
		Route::post('update-sch-laboratorium', [LaboratoryController::class, 'actionUpdateLabSch'])->name('update_sch_laboratorium');
		Route::get('delete-sch-laboratorium/{id_sch_lab}', [LaboratoryController::class, 'actionDelLabSch'])->name('delete_sch_laboratorium');
		Route::post('input-exclude-sch', [LaboratoryController::class, 'actionInputExcludeSch'])->name('input_exclude_sch');
		Route::post('input-ujilab', [LaboratoryController::class, 'actionInputUjiLab'])->name('input_ujilab');
		Route::post('update-ujilab', [LaboratoryController::class, 'actionUpdateUjiLab'])->name('update_ujilab');
		#Source data
	});
	/*************************************************************************************************************************************************/
	Route::prefix('jadwal_lab')->group(function () {
		# first
		Route::get('/', [ScheduleController::class, 'dataLabSchedule']);
		Route::get('/{id}', [ScheduleController::class, 'dataSchedule'])->name('schedule_lab');
		Route::get('form-exclude-jadwal/{id}', [ScheduleController::class, 'formExcludeLaboratorySch']);
		Route::get('form-input-jadwal/{id}', [ScheduleController::class, 'formInputLaboratorySch']);
		Route::post('input-sch-laboratorium', [ScheduleController::class, 'actionInputLabSch'])->name('input_schedule_laboratorium');
	});
	/*************************************************************************************************************************************************/
	Route::prefix('fasilitas_lab')->group(function () {
		# first
		Route::get('/', [FacilityController::class, 'dataLabFacility']);
		Route::get('/{id}', [FacilityController::class, 'dataFacility'])->name('data_fasilitas_lab');
		Route::get('/{id}/form-add-fasilitas', [FacilityController::class, 'formAddFacilities']);
		Route::post('input-fasilitas-laboratorium', [FacilityController::class, 'actionInputLabFacilities'])->name('input_fasilitas');
		Route::post('update-fasilitas-laboratorium', [FacilityController::class, 'actionUpdateLabFacilities'])->name('update_fasilitas');
		Route::get('detail-fasilitas/{id}', [FacilityController::class, 'viewLabFacilityDetail']);
		Route::get('form-update-fasilitas/{id}', [FacilityController::class, 'formUpdateLaboratoryFacility']);
		Route::post('update-fasilitas-laboratorium', [FacilityController::class, 'actionUpdateLabFacilities'])->name('update_fasilitas_laboratorium');
	});
	Route::prefix('laporan')->group(function () {
		Route::get('/', [ReportController::class, 'viewReportSubmission']);
		Route::get('laboratorium', [ReportController::class, 'viewReportLab']);
		Route::post('report-pengajuan', [ReportController::class, 'actionReportPengajuan'])->name('report_pengajuan');
		Route::post('report-order', [ReportController::class, 'actionReportOrder'])->name('report_order');
		Route::post('download-income-excel', [ReportController::class, 'actionExcelIncome'])->name('download_income_excel');
	});
	Route::prefix('pengaturan')->group(function () {
		# view
		Route::get('profil', [PengaturanController::class, 'viewDetailProfile']);
		Route::get('user', [PengaturanController::class, 'viewManagementUser'])->name('setting_user');
		Route::get('user-detail/{id}', [PengaturanController::class, 'viewDetailUser']);
		# form
		Route::get('email', [PengaturanController::class, 'formInputSmtp']);
		Route::get('form-input-user', [PengaturanController::class, 'formInputUser']);
		Route::get('profil/form-update-profil/{id}', [PengaturanController::class, 'formUpdateProfil']);
		Route::get('user-detail/form-update-user/{id}', [PengaturanController::class, 'formUpdateUser']);
		# action
		Route::post('input-data-user', [PengaturanController::class, 'actionInputUser'])->name('input-data-user');
		Route::post('update-data-user', [PengaturanController::class, 'actionUpdateUser'])->name('update-data-user');
	});
	Route::prefix('notif')->group(function () {
		Route::get('send_email',function(){
			$data = [
				'name' => 'Tester',
				'body' => 'Testing Kirim Email'
			];
			Mail::to('arizluck@gmail.com')->send(new EmailAction($data));
		});
	});
	Route::get('download-surat-pengajuan/{id}', [PengajuanController::class, 'convertPDFPengajuan'])->name('convertpdf_pengajuan');
	#
});

