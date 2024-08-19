<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LabTestPostRequest;
use App\Http\Requests\LabPostRequest;
use App\Http\Requests\LabFacilityPostRequest;
use App\Http\Requests\LabSchPostRequest;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Auth;
use Str;
use Storage;


use App\Models\Lab_facility;
use App\Models\Lab_sch_date;
use App\Models\Lab_sch_time;
use App\Models\Lab_schedule;
use App\Models\Laboratory;
use App\Models\Laboratory_group;
use App\Models\Laboratory_technician;
use App\Models\User;
use App\Models\Laboratory_facility_count_status;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;
use App\Models\Laboratory_option;
use App\Models\Laboratory_time_option;

class LaboratoryController extends Controller
{
	/* Tags:... */
	public function dataLaboratory(Request $request)
	{
		return view('contents.content_datalist.data_laboratory');
	}
	/* Tags:... */
	public function formLaboratory(Request $request)
	{
		$data_rumpun = Laboratory_group::get();
		return view('contents.content_form.form_input_lab',compact('data_rumpun'));
	}
	/* Tags:... */
	public function formUpdateLab(Request $request)
	{
		$data_lab = Laboratory::join('laboratory_options','laboratories.lab_id','=', 'laboratory_options.lop_lab_id')
		->leftjoin('users', 'laboratories.lab_head','=','users.id')
		->where('lab_id',$request->id)
		->select('*')
		->first();
		// dd($data_lab);
		$data_kasublab = User::where('level','LAB_SUBHEAD')->get();
		$data_all_tech = Laboratory_technician::leftjoin('users', 'laboratory_technicians.lat_tech_id', '=', 'users.id')
		->select('lat_id', 'lat_tech_id', 'id', 'name')
		->get();
		$data_technicians = Laboratory_technician::leftjoin('users','laboratory_technicians.lat_tech_id','=','users.id')
		->select('lat_id', 'lat_tech_id','id','name')
		->where('lat_laboratory',$request->id)
		->get();
		$data_tech =[];
		foreach($data_technicians as $key => $value){
			$data_tech[$key] = $value->id;
		}
		$data_rumpun = Laboratory_group::get();
		return view('contents.content_form.form_update_lab',compact('data_all_tech','data_lab', 'data_technicians', 'data_rumpun', 'data_tech', 'data_kasublab'));
	}
	/* Tags:... */
	public function actionInputLaboratory(LabPostRequest $request)
	{
		// 
		$lab_name = Str::slug($request->inp_laboratorium, '_');
		$getFile = $request->file('upload_url_img');
		if ($getFile == true
		) {
			$file_name = date('Ymd') . '_' . date('His') . '_' . $lab_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_lab', $file_name);
		} else {
			$file_name = null;
		}
		// 
		$lab_id = genIdLab();
		$data_laboratorium = [
			"lab_id" => $lab_id,
			"lab_name" => $request->inp_laboratorium,
			"lab_group" => $request->inp_rumpun,
			"lab_code" => null,
			"lab_head" => $request->inp_kalab,
			"lab_location" => $request->inp_lokasi,
			"lab_status" => $request->inp_status,
			"lab_note_short" => $request->inp_notes_short,
			"lab_notes" => $request->inp_notes,
			"lab_img" => $file_name,
			"lab_rent_cost" => funFormatCurToDecimal($request->inp_cost),
			"lab_costbase" => $request->inp_base,
		];
		if ($request->inp_check_borrow == null) {
			$inp_check_borrow = 'false';
		} else {
			$inp_check_borrow = 'true';
		}
		if ($request->inp_check_rental == null) {
			$inp_check_rental = 'false';
		} else {
			$inp_check_rental = 'true';
		}
		if ($request->inp_check_ujilab == null) {
			$inp_check_ujilab = 'false';
		} else {
			$inp_check_ujilab = 'true';
		}
		$data_opsi_layanan = [
			"lop_lab_id" => $lab_id, 
			"lop_pinjam_lab" => $inp_check_borrow,
			"lop_sewa_alat_lab" => $inp_check_rental,
			"lop_uji_lab" => $inp_check_ujilab,
		];
		$insLabOps = Laboratory_option::insert($data_opsi_layanan);
		$insLabData = Laboratory::insert($data_laboratorium);
		// 
		foreach ($request->inp_teknisi as $key => $list) {
			$data_technicians[$key] = [
				"lat_id" => genIdTechnician(),
				"lat_laboratory" => $lab_id,
				"lat_tech_id" => $list
			];
			$insTechLabData = Laboratory_technician::insert($data_technicians[$key]);
		}
		return redirect('laboratorium');
	}
	/* Tags:... */
	public function actionUpdateLaboratory(LabPostRequest $request)
	{
		
		$lab_id = $request->lab_id;
		$lab_data = Laboratory::where('lab_id', $lab_id)->first();

		$lab_name = Str::slug($request->inp_laboratorium, '_');
		$getFile = $request->file('upload_url_img');
		if ($getFile == null) {
			if ($request->param_upload_url_img == 'delete') {
				$file_name = null;
				$file_remove = Storage::delete('public/image_lab/' . $lab_data->lab_img);
			} else {
				$file_name = $lab_data->lab_img;
			}
		} else {
			echo $lab_data->lab_img;
			// die($lab_data->lab_img);
			$file_remove = Storage::delete('public/image_lab/'.$lab_data->lab_img);
			$file_name = date('Ymd') . '_' . date('His') . '_' . $lab_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_lab', $file_name);
		}
		$data_laboratorium = [
			"lab_id" => $lab_id,
			"lab_name" => $request->inp_laboratorium,
			"lab_code" => null,
			"lab_head" => $request->inp_kalab,
			"lab_location" => $request->inp_lokasi,
			"lab_status" => $request->inp_status,
			"lab_note_short" => $request->inp_notes_short,
			"lab_notes" => $request->inp_notes,
			"lab_img" => $file_name,
			"lab_rent_cost" => funFormatCurToDecimal($request->inp_cost),
			"lab_costbase" => $request->inp_base,
		];
		if ($request->inp_check_borrow == null) {
			$inp_check_borrow = 'false';
		} else {
			$inp_check_borrow = 'true';
		}
		if ($request->inp_check_rental == null) {
			$inp_check_rental = 'false';
		} else {
			$inp_check_rental = 'true';
		}
		if ($request->inp_check_ujilab == null) {
			$inp_check_ujilab = 'false';
		} else {
			$inp_check_ujilab = 'true';
		}
		$data_opsi_layanan = [
			"lop_pinjam_lab" => $inp_check_borrow,
			"lop_sewa_alat_lab" => $inp_check_rental,
			"lop_uji_lab" => $inp_check_ujilab,
		];
		$insLabOps = Laboratory_option::where('lop_lab_id',$lab_id)->update($data_opsi_layanan);
		$insLabData = Laboratory::where('lab_id',$lab_id)->update($data_laboratorium);
		$delTechLap = Laboratory_technician::where('lat_laboratory',$lab_id)->delete();
		foreach ($request->inp_teknisi as $key => $list) {
			$data_technicians[$key] = [
				"lat_id" => genIdTechnician(),
				"lat_laboratory" => $lab_id,
				"lat_tech_id" => $list
			];
			$insTechLabData = Laboratory_technician::insert($data_technicians[$key]);
		}
		return redirect()->back();
	}
	/* Tags:... */
	public function viewLabTechnicians(Request $request)
	{
		$data_lab = Laboratory::leftjoin('users','laboratories.lab_head','=','users.id')
		->where('lab_id',$request->id)
		->select('lab_name','name','lab_id')
		->first();
		return view('contents.content_datalist.data_lab_technicians', compact('data_lab'));
	}
	/* Tags:... */
	public function actionDeleteTechnician(Request $request)
	{
		$delLabTech = Laboratory_technician::where('lat_id',$request->id)->delete();
		return redirect()->back();
	}
	/* Tags:... */
	public function actionInputUserTech(Request $request)
	{
		$id = genIdTechnician();
		foreach ($request->inp_teknisi as $key => $value) {
			$data = [
				'lat_id' => $id,
				'lat_laboratory' => $request->lab_id,
				'lat_tech_id' => $value,
			];
			$id++;
		}
		$storeLabTech = Laboratory_technician::insert($data);
		return redirect()->back();
	}
	/* Tags:... */
	public function viewLabFacility(Request $request)
	{
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		return view('contents.content_datalist.data_lab_facilities', compact('data_lab'));
	}
	/* Tags:... */
	public function dataViewLabtest(Request $request)
	{
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		return view('contents.content_datalist.data_labtest', compact('data_lab'));
	}
	/* Tags:... */
	public function formAddLaboratoryFacility(Request $request)
	{
		$users = User::get();
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		return view('contents.content_form.form_input_facilities', compact('users', 'data_lab'));
	}
	/* Tags:... */
	public function formInsertLabtest(Request $request)
	{
		$data_utility = Laboratory_facility::where('laf_laboratorium',$request->id)->get();
		$users = User::get();
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		return view('contents.content_form.form_add_labtest', compact('users', 'data_lab', 'data_utility'));
	}
	/* Tags:... */
	public function actionInputLabFacilities(LabFacilityPostRequest $request)
	{
		$user = Auth::user();
		$lab_facility_id = genIdLabF();
		$lab_fa_conunt_id = genIdLabFC();
		#
		$laf_name = Str::slug($request->inp_fasilitas, '_');
		$getFile = $request->file('upload_url_img');
		if ($getFile == true) {
			$file_name = date('Ymd') . '_' . date('His') . '_' . $laf_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_facility', $file_name);
		} else {
			$file_name = null;
		}
		#
		$data_lab = [
			'laf_id' => $lab_facility_id,
			'laf_laboratorium' => $request->lab_id,
			'laf_name' => $request->inp_fasilitas,
			'laf_utility' => $request->inp_utility,
			'laf_brand' => $request->inp_brand,
			'laf_base' => 'Hari',
			'laf_value' => funFormatCurToDecimal($request->inp_cost),
			'laf_description' => $request->inp_diskripsi,
			'laf_image' => $file_name,
			'created_by' => $user->id,
		];
		$data_lab_count_detail = [
			'lcs_id' => $lab_fa_conunt_id,
			'lcs_facility' => $lab_facility_id,
			'lcs_count' => $request->inp_cn_facility,
			'lcs_ready' => $request->inp_cn_ready,
			'lcs_used' => $request->inp_cn_used,
			'lcs_unwearable' => $request->inp_cn_unwearable,
		];
		#
		$storeFacility = Laboratory_facility::insert($data_lab);
		$storeFacilityCnt = Laboratory_facility_count_status::insert($data_lab_count_detail);
		return redirect()->route('data_fasilitas_lab',['id'=> $request->lab_id]);
	}
	public function viewLabFacilityDetail(Request $request)
	{
		$data_fasilitas = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->where('laf_id', $request->id)
		->first();
		return view('contents.content_pageview.view_detail_fasilitas',compact('data_fasilitas'));
	}
	/* Tags:... */
	public function viewLabTestDetail(Request $request)
	{
		$id= $request->id;
		$data = Laboratory_labtest::join('laboratories', 'laboratory_labtests.lsv_lab_id','=', 'laboratories.lab_id')
		->where('lsv_id',$id)
		->first();
		$data_alat = Laboratory_labtest_facility::join('laboratory_facilities', 'laboratory_labtest_facilities.lst_facility', '=', 'laboratory_facilities.laf_id')
		->where('lst_lsv_id', $id)
		->get();
		$tools = array();
		foreach ($data_alat as $key => $value) {
			$tools[$key] = $value->laf_name;
		}
		return view('contents.content_pageview.view_detail_ujilab', compact('data', 'tools'));
	}
	/* Tags:... */
	public function formUpdateLaboratoryFacility(Request $request)
	{
		$users = User::get();
		$data_facility = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->leftJoin('laboratories', 'Laboratory_facilities.laf_laboratorium','=', 'laboratories.lab_id')
		->where('laf_id', $request->id)
		->first();
		return view('contents.content_form.form_update_facilities', compact('users', 'data_facility'));
	}
	/* Tags:... */
	public function actionUpdateLabFacilities(Request $request)
	{
		$lab_facility_id = $request->laf_id;
		$lab_fa_conunt_id = $request->lcs_id;
		#
		$data_lab = [
			'laf_laboratorium' => $request->lab_id,
			'laf_name' => $request->inp_fasilitas,
			'laf_utility' => $request->inp_utility,
			'laf_brand' => $request->inp_brand,
			'laf_value' => funFormatCurToDecimal($request->inp_cost),
			'created_by' => null,
		];
		$data_lab_count_detail = [
			'lcs_facility' => $lab_facility_id,
			'lcs_count' => $request->inp_cn_facility,
			'lcs_ready' => $request->inp_cn_ready,
			'lcs_used' => $request->inp_cn_used,
			'lcs_condition_good' => $request->inp_cn_good,
			'lcs_condition_poor' => $request->inp_cn_poor,
			'lcs_condition_unwearable' => $request->inp_cn_unwearable,
		];
		#
		$storeFacility = Laboratory_facility::where('laf_id',$lab_facility_id)->update($data_lab);
		$storeFacilityCnt = Laboratory_facility_count_status::where('lcs_id', $lab_fa_conunt_id)->update($data_lab_count_detail);
		return redirect()->route('laboratorium_fasilitas', ['id' => $request->lab_id]);
	}
	/* Tags:... */
	public function actionDeleteLabFacilities(Request $request)
	{
		$action = Laboratory_facility::where('laf_id',$request->id)->delete();
		return redirect()->back();
	}
	/* Tags:... */
	public function viewLabSchedule(Request $request)
	{
		$lab_id = $request->id;
		$data_lab = Laboratory::where('lab_id',$lab_id)->first();
		return view('contents.content_datalist.data_laboratory_sch',compact('lab_id', 'data_lab'));
	}
	
	/* Tags:... */
	public function formInputLaboratorySch(Request $request)
	{
		$lab_id = $request->id;
		$times = Laboratory_time_option::get();
		return view('contents.content_form.form_input_schedule', compact('lab_id', 'times'));
	}
	/* Tags:... */
	public function formExcludeLaboratorySch(Request $request)
	{
			$lab_id = $request->id;
		return view('contents.content_form.form_exclude_schedule', compact('lab_id'));
	}
	/* Tags:... */
	public function actionInputLabSch(LabSchPostRequest $request)
	{
		$user = Auth::user();
		$err = array();
		$id_lab_sch = genIdLaSch();
		$day = date('l',strtotime($request->inp_day));
		$tm_start = date('H:i',strtotime($request->inp_time_start));
		$tm_end = date('H:i', strtotime($request->inp_time_end));
		$ids_str = implode('.',$request->inp_res_person);
		
		$data_sch = Lab_schedule::where('lbs_lab', $request->lab_id)
		->where('lbs_day',$day)
		->where('lbs_type', 'reguler')
		->orderBy('lbs_time_start','asc')
		->get();
		$time_set_start = Carbon::parse($request->inp_time_start)->format('H:i');

		$idx = 0;
		foreach ($data_sch as $key => $value) {
			$check_start[$key] = Carbon::parse($value->lbs_time_start)->format('H:i');
			$check_end[$key] = Carbon::parse($value->lbs_time_end)->format('H:i');

			if (Carbon::parse($request->inp_time_start)->Between($check_start[$key], $check_end[$key],true)) {
				$checkTimeErr[$idx] = 'Input jam mulai ['. $request->inp_time_start.'] tidak tersedia, karena konflik dengan jadwal pukul ['.$check_start[$key].' - '.$check_end[$key].']. ';
			}
			$idx++;
			if (Carbon::parse($request->inp_time_end)->Between($check_start[$key], $check_end[$key], true)) {
				$checkTimeErr[$idx] = 'Input jam berakhir [' . $request->inp_time_end . '] tidak tersedia, karena konflik dengan jadwal pukul [' . $check_start[$key] . ' - ' . $check_end[$key] . ']. ';
			}
			$idx++;
		}
		if (isset($checkTimeErr)) {
			$strMsg = '';
			foreach ($checkTimeErr as $key => $value) {
				$strMsg.= $value;
			}
			return redirect()->back()->withInput($request->input())->withErrors(['check_time' => $strMsg]);
		}
		$data = [
			'lbs_id' => $id_lab_sch,
			'lbs_lab' => $request->lab_id,
			'lbs_day' => $day,
			'lbs_time_start' => $tm_start,
			'lbs_time_end' => $tm_end,
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_tenant_name' => $request->inp_group,
			'lbs_res_person' => $ids_str,
			'created_by' => $user->id
		];
		$storeLabSch = Lab_schedule::insert($data);
		return redirect()->route('laboratorium_schedule', ['id' => $request->lab_id]);
	}
	/* Tags:... */
	public function formUpdateLaboratorySch(Request $request)
	{
		$lab_id = $request->id_lab;
		$lbs_id = $request->id_sch_lab;
		$data_sch_lab = Lab_schedule::join('lab_sch_dates', 'lab_schedules.lbs_id','=', 'lab_sch_dates.lscd_sch')
		->leftjoin('users','lab_schedules.lbs_res_person','=','users.id')
		->where('lbs_id',$lbs_id)
		->first();
		$times = Laboratory_time_option::get();
		$data_sch_times = Lab_sch_time::where('lsct_date_id',$data_sch_lab->lscd_id)->get();
		$time_ids = [];
		foreach ($data_sch_times as $key => $value) {
			$time_ids[$key] = $value->lsct_time_id;
		}
		return view('contents.content_form.form_update_schedule', compact('lab_id','lbs_id','data_sch_lab', 'times', 'time_ids'));
	}
	/* Tags:... */
	public function actionUpdateLabSch(Request $request)
	{
		$user = Auth::user();
		$data = [
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_tenant_name' => $request->inp_group,
			'lbs_res_person' => $request->inp_res_person,
		];
		$times = $request->inp_time;
		$data_times =[];
		if (count($times)>0) {
			foreach ($times as $key => $value) {
				$data_times[$key] = [
					'lsct_date_id' => $request->lscd_id,
					'lsct_time_id' => $value,
					'lsct_status' => 'active'
				];
			}
		}
		Lab_sch_time::where('lsct_date_id', $request->lscd_id)->delete();
		Lab_sch_time::insert($data_times);
		Lab_sch_date::where('lscd_id', $request->lscd_id)->update(['lscd_day'=>$request->inp_day]);
		Lab_schedule::where('lbs_id', $request->lbs_id)->update($data);
		return redirect()->back();
	}
	public function actionDelLabSch(Request $request)
	{
		$lbs_id = $request->id_sch_lab;
		$sch_date = Lab_sch_date::where('lscd_sch', $lbs_id)->first();
		Lab_sch_time::where('lsct_date_id',$sch_date->lscd_id)->delete();
		Lab_sch_date::where('lscd_sch', $lbs_id)->delete();
		Lab_schedule::where('lbs_id', $lbs_id)->delete();
		return redirect()->back();
	}
	/* Tags:... */
	public function sourceDataScheduleLabJson(Request $request)
	{
		$dtStart = Carbon::parse($request->start);
		$dtEnd = Carbon::parse($request->end);
		$collect_sch_reguler = Lab_sch_date::join('lab_schedules', 'lab_sch_dates.lscd_sch', '=', 'lab_schedules.lbs_id')
		->join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
		->join('laboratory_time_options', 'lab_sch_times.lsct_time_id', '=', 'laboratory_time_options.lti_id')
		->where('lbs_lab', $request->lab_id)
		->where('lbs_type', 'reguler')
		->select('lbs_id', 'lbs_lab', 'lbs_matkul', 'lbs_submission', 'lbs_tenant_init', 'lbs_tenant_name', 'lbs_type',
			'lscd_date','lscd_day','lscd_status','lscd_id','lscd_sch','lscd_status','lsct_date_id','lsct_status','lti_start','lti_end')
		->get();

		$collect_sch_non_reguler = Lab_sch_date::join('lab_schedules', 'lab_sch_dates.lscd_sch','=','lab_schedules.lbs_id')
		->join('lab_sch_times', 'lab_sch_dates.lscd_id','=', 'lab_sch_times.lsct_date_id')
		->join('laboratory_time_options', 'lab_sch_times.lsct_time_id','=', 'laboratory_time_options.lti_id')
		->where('lbs_lab', $request->lab_id)
		->where('lbs_type', 'non_reguler')
		->whereBetween('lscd_date', [$dtStart, $dtEnd])
		->select('lbs_id', 'lbs_lab', 'lbs_matkul', 'lbs_submission', 'lbs_tenant_init', 'lbs_tenant_name', 'lbs_type',
			'lscd_date','lscd_day','lscd_status','lscd_id','lscd_sch','lscd_status','lsct_date_id','lsct_status','lti_start','lti_end')
		->get();
		$dataSch=[];
		$sch_index=0;
		# processing sch data with parameter reguler
		$idx_date_range=0;
		$dataDays=[];
		while ($dtStart <= date("Y-m-d", strtotime("-1 day", strtotime($dtEnd)))) {
			$dataDays[$idx_date_range] = [
				'day' => date('l', strtotime($dtStart)),
				'date' => date('Y-m-d', strtotime($dtStart)),
			];
			$dtStart = date("Y-m-d", strtotime("+1 day", strtotime($dtStart)));
			$idx_date_range++;
		}
		foreach ($dataDays as $key => $value) {
			$dts[$key] = $collect_sch_reguler->where('lscd_day',$value['day']);
			foreach ($dts[$key] as $skey => $svalue) {
				// $date_exclude[$sch_index] = explode('$',$svalue->lbs_sch_dates_excluded);
				$str_start = $value['date'].' '.$svalue->lti_start;
				$datetime_start = date('Y-m-d H:i:s',strtotime($str_start));
				$str_end = $value['date'] . ' ' . $svalue->lti_end;
				$datetime_end = date('Y-m-d H:i:s', strtotime($str_end));
				if ($svalue->lsct_status == 'active') {
					$dataSch[$sch_index] = [
						'url' => url('jadwal_lab/'. $svalue->lbs_lab.'#'),
						'title' => $svalue->lbs_matkul,
						'start' => $datetime_start,
						'end' => $datetime_end,
						'color' => '#0955c7',
						'className' => 'sch_reguler'
					];
				}else{
					$dataSch[$sch_index] = [
						'url' => url('jadwal_lab/' . $svalue->lbs_lab . '#'),
						'title' => '(Batal)'.$svalue->lbs_matkul,
						'start' => $datetime_start,
						'end' => $datetime_end,
						'color' => '#e31497',
						'className' => 'sch_exclude'
					];
				}
				$sch_index++;
			}
		}
		# processing sch data with parameter non_reguler
		foreach ($collect_sch_non_reguler as $key => $value) {
			$str_start = $value->lscd_date . ' ' . $value->lti_start;
			$datetime_start = date('Y-m-d H:i:s', strtotime($str_start));

			$str_end = $value->lscd_date . ' ' . $value->lti_end;
			$datetime_end = date('Y-m-d H:i:s', strtotime($str_end));

			$dataSch[$sch_index] = [
				'url' => url('pengajuan/detail-pengajuan/' . $value->lbs_submission),
				'title' => $value->lbs_tenant_name,
				'start' => $datetime_start,
				'end' => $datetime_end,
				'color' => '#09c755',
				'className' => 'sch_non_reguler'
			];
			$sch_index++;
		}
		
		$res = json_encode($dataSch);
		return $res;
	}
	/* Tags:... */
	public function actionInputExcludeSch(Request $request)
	{
		$day = date('l',strtotime($request->date_exclude));
		// print_r($dates);
		if ($request->inp_times == 'all') {
			// die($request->inp_times);
			$data_sch = Lab_schedule::where('lbs_lab',$request->lab_id)
			->where('lbs_day',$day)
			->get();
			foreach ($data_sch as $key => $value) {
				$dates_excluded[$value->lbs_id] = explode('$', $value->lbs_sch_dates_excluded);
				array_push($dates_excluded[$value->lbs_id], $request->date_exclude);
				$data_exclude_str[$value->lbs_id] = implode('$', $dates_excluded[$value->lbs_id]);
			}
			foreach ($dates_excluded as $key => $value) {
				Lab_schedule::where('lbs_id',$key)->update(['lbs_sch_dates_excluded' => $data_exclude_str[$key]]);
			}
		}else {
			// echo 'test';
			$data_sch = Lab_schedule::where('lbs_lab', $request->lab_id)
			->where('lbs_id', $request->inp_times)
			->first();
			$dates_excluded = explode('$', $data_sch->lbs_sch_dates_excluded);
			array_push($dates_excluded, $request->date_exclude);
			$data_exclude_str = implode('$', $dates_excluded);
			Lab_schedule::where('lbs_id', $request->inp_times)->update(['lbs_sch_dates_excluded' => $data_exclude_str]);
		}
		return redirect()->back();
	}
	/* Tags:... */
	public function actionInsertLabtest(LabTestPostRequest $request)
	{
		// data
		$id_testlab = genIdLabTest();
		// image
		$getFile = $request->file('upload_url_img');
		$labtest_name = Str::slug($request->inp_name, '_');
		if ($getFile == true) {
			$file_name = date('Ymd') . '_' . date('His') . '_' . $labtest_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_lab_test', $file_name);
		} else {
			$file_name = null;
		}
		$data = [
			"lsv_id" => $id_testlab,
			"lsv_lab_id" => $request->lab_id,
			"lsv_name" => $request->inp_name,
			"lsv_price" => funFormatCurToDecimal($request->inp_cost),
			"lsv_notes" => $request->inp_notes_short,
			"lsv_notes_short" => $request->inp_notes,
			"lsv_img" => $file_name,
		];
		$index = genIdLabTestFacility();
		foreach ($request->inp_utility as $key => $value) {
			$data_utility[$key] = [
				"lst_id" => $index,
				"lst_lsv_id" => $id_testlab,
				"lst_facility" => $value
			];
			$index++;
		}
		Laboratory_labtest::insert($data);
		Laboratory_labtest_facility::insert($data_utility);
		return redirect()->route('labtest',['id' => $request->lab_id]);
	}
	/* Tags:... */
	public function actionUpdateLabtest(Request $request)
	{
		$lsv_id = $request->lsv_id;
		$lab_id = $request->lab_id;
		$lab_data = Laboratory_labtest::where('lsv_id', $lsv_id)->first();
		$labtest_name = Str::slug($request->inp_name, '_');
		$getFile = $request->file('upload_url_img');
		if ($getFile == null) {
			if ($request->param_upload_url_img == 'delete') {
				$file_name = null;
				$file_remove = Storage::delete('public/image_lab_test/' . $lab_data->lsv_img);
			} else {
				$file_name = $lab_data->lab_img;
			}
		} else {
			echo $lab_data->lab_img;
			$file_remove = Storage::delete('public/image_lab_test/' . $lab_data->lsv_img);
			$file_name = date('Ymd') . '_' . date('His') . '_' . $labtest_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_lab_test', $file_name);
		}
		$id_testlab = $request->lsv_id;
		$data = [
			"lsv_lab_id" => $request->lab_id,
			"lsv_name" => $request->inp_name,
			"lsv_price" => funFormatCurToDecimal($request->inp_cost),
			"lsv_notes" => $request->inp_notes,
			"lsv_notes_short" => $request->inp_notes_short,
			"lsv_img" => $file_name,
		];
		$index = genIdLabTestFacility();
		foreach ($request->inp_utility as $key => $value) {
			$data_utility[$key] = [
				"lst_id" => $index,
				"lst_lsv_id" => $id_testlab,
				"lst_facility" => $value
			];
			$index++;
		}
		Laboratory_labtest::where('lsv_id', $id_testlab)->update($data);
		Laboratory_labtest_facility::where('lst_lsv_id', $id_testlab)->delete();
		Laboratory_labtest_facility::insert($data_utility);
		return redirect()->route('detail_labtest', ['id' => $lsv_id]);
	}
	/* Tags:... */
	public function formUpdateLabtest(Request $request)
	{
		$users = User::get();
		$id = $request->id;
		$data_lab = Laboratory_labtest::join('laboratories', 'laboratory_labtests.lsv_lab_id', '=', 'laboratories.lab_id')
		->where('lsv_id', $id)
		->first();
		$data_utility = Laboratory_facility::where('laf_laboratorium', $data_lab->lsv_lab_id)->get();
		$data_alat = Laboratory_labtest_facility::join('laboratory_facilities','laboratory_labtest_facilities.lst_facility','=', 'laboratory_facilities.laf_id')
		->where('lst_lsv_id',$id)
		->get();
		// dd($data_alat); die();
		$tools = array();
		foreach ($data_alat as $key => $value) {
			$tools[$key] = $value->laf_id;
		}
		return view('contents.content_form.form_update_labtest', compact('users', 'data_lab', 'data_utility', 'tools'));
	}
	/* Tags:... */
	public function dataViewLaboratoriumUji(Request $request)
	{
		return view('contents.content_datalist.data_lab_uji');
	}
	/* Tags:... */
	public function dataLabForLabtest(Request $request)
	{
		#code...
	}
}
