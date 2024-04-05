<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LabPostRequest;
use App\Http\Requests\LabFacilityPostRequest;
use App\Http\Requests\LabSchPostRequest;
use App\Models\Lab_facility;
use App\Models\Lab_schedule;
use Auth;
use Carbon\Carbon;

use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\User;
use App\Models\Laboratory_facility_count_status;
use App\Models\Laboratory_facility;
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
		return view('contents.content_form.form_input_lab');
	}
	/* Tags:... */
	public function formUpdateLab(Request $request)
	{
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head','=','users.id')
		->where('lab_id',$request->id)
		->select('lab_id', 'lab_name','id','name', 'lab_location','lab_status')
		->first();
		$data_technicians = Laboratory_technician::leftjoin('users','laboratory_technicians.lat_tech_id','=','users.id')
		->select('lat_id', 'lat_tech_id','id','name')
		->where('lat_laboratory',$request->id)
		->get();
		return view('contents.content_form.form_update_lab',compact('data_lab', 'data_technicians'));
	}
	/* Tags:... */
	public function actionUpdateLaboratory(LabPostRequest $request)
	{
		$lab_id = $request->lab_id;
		$data_laboratorium = [
			"lab_id" => $lab_id,
			"lab_name" => $request->inp_laboratorium,
			"lab_code" => null,
			"lab_head" => $request->inp_kalab,
			"lab_location" => $request->inp_lokasi,
			"lab_status" => $request->inp_status,
		];
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
		return redirect('laboratorium');
	}
	/* Tags:... */

	public function actionInputLaboratory(LabPostRequest $request)
	{
		$lab_id = genIdLab();
		$data_laboratorium = [
			"lab_id" => $lab_id,
			"lab_name" => $request->inp_laboratorium,
			"lab_code" => null,
			"lab_head" => $request->inp_kalab,
			"lab_location"=> $request->inp_lokasi,
			"lab_status" => $request->inp_status,
		];
		$insLabData = Laboratory::insert($data_laboratorium);
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
	public function actionInputLabFacilities(LabFacilityPostRequest $request)
	{
		$lab_facility_id = genIdLabF();
		$lab_fa_conunt_id = genIdLabFC();
		#
		$data_lab = [
			'laf_id' => $lab_facility_id,
			'laf_laboratorium' => $request->lab_id,
			'laf_name' => $request->inp_fasilitas,
			'laf_utility' => $request->inp_utility,
			'laf_brand' => $request->inp_brand,
			'created_by' => null,
		];
		$data_lab_count_detail = [
			'lcs_id' => $lab_fa_conunt_id,
			'lcs_facility' => $lab_facility_id,
			'lcs_count' => $request->inp_cn_facility,
			'lcs_ready' => $request->inp_cn_ready,
			'lcs_used' => $request->inp_cn_used,
			'lcs_condition_good' => $request->inp_cn_good,
			'lcs_condition_poor' => $request->inp_cn_poor,
			'lcs_condition_unwearable' => $request->inp_cn_unwearable,
		];
		#
		$storeFacility = Laboratory_facility::insert($data_lab);
		$storeFacilityCnt = Laboratory_facility_count_status::insert($data_lab_count_detail);
		return redirect()->route('laboratorium_fasilitas',['id'=> $request->lab_id]);
	}
	public function viewLabFacilityDetail(Request $request)
	{
		$data_fasilitas = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->where('laf_id', $request->id)
		->first();
		return view('contents.content_pageview.view_detail_fasilitas',compact('data_fasilitas'));
	}
	/* Tags:... */
	public function formUpdateLaboratoryFacility(Request $request)
	{
		$users = User::get();
		$data_facility = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->leftJoin('laboratories', 'Laboratory_facilities.laf_laboratorium','=', 'laboratories.lab_id')
		->where('laf_id', $request->id)
		->first();
		// dd($data_facility);
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
		return view('contents.content_form.form_input_schedule', compact('lab_id'));
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
		$data_sch_lab = Lab_schedule::leftjoin('users','lab_schedules.lbs_res_person','=','users.id')
		->where('lbs_id',$lbs_id)
		->first();
		return view('contents.content_form.form_update_schedule', compact('lab_id', 'data_sch_lab'));
	}
	/* Tags:... */
	public function actionUpdateLabSch(Request $request)
	{
		$user = Auth::user();
		$day = date('l', strtotime($request->inp_day));
		$tm_start = date('H:i', strtotime($request->inp_time_start));
		$tm_end = date('H:i', strtotime($request->inp_time_end));
		$ids_str = implode('.', $request->inp_res_person);
		$data = [
			'lbs_day' => $day,
			'lbs_time_start' => $tm_start,
			'lbs_time_end' => $tm_end,
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_tenant_name' => $request->inp_group,
			'lbs_res_person' => $ids_str,
		];
		$updateLabSch = Lab_schedule::where('lbs_id',$request->lbs_id)->update($data);
		return redirect()->route('laboratorium_schedule', ['id' => $request->lab_id]);
	}
	public function actionDelLabSch(Request $request)
	{
		$lbs_id = $request->id_sch_lab;
		$updateLabSch = Lab_schedule::where('lbs_id', $lbs_id)->delete();
		return redirect()->back();		
	}
	/* Tags:... */
	public function sourceDataScheduleLabJson(Request $request)
	{
		$dtStart = Carbon::parse($request->start);
		$dtEnd = Carbon::parse($request->end);
		$collect_sch_reguler = Lab_schedule::where('lbs_lab',$request->lab_id)
		->where('lbs_type','reguler')
		->get();
		$collect_sch_non_reguler = Lab_schedule::where('lbs_lab', $request->lab_id)
		->where('lbs_type', 'non_reguler')
		->whereBetween('lbs_date_start', [$dtStart, $dtEnd])
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
			$dts[$key] = $collect_sch_reguler->where('lbs_day',strtolower($value['day']));
			foreach ($dts[$key] as $skey => $svalue) {
				$date_exclude[$sch_index] = explode('$',$svalue->lbs_sch_dates_excluded);
				$str_start = $value['date'].' '.$svalue->lbs_time_start;
				$datetime_start = date('Y-m-d H:i:s',strtotime($str_start));
				$str_end = $value['date'] . ' ' . $svalue->lbs_time_end;
				$datetime_end = date('Y-m-d H:i:s', strtotime($str_end));
				if (!in_array($value['date'], $date_exclude[$sch_index])) {
					$dataSch[$sch_index] = [
						'title' => $svalue->lbs_matkul,
						'start' => $datetime_start,
						'end' => $datetime_end,
						'color' => '#0955c7'
					];
				}else{
					$dataSch[$sch_index] = [
						'title' => '(Batal)'.$svalue->lbs_matkul,
						'start' => $datetime_start,
						'end' => $datetime_end,
						'color' => '#e31497'
					];
				}
				$sch_index++;
			}
		}
		# processing sch data with parameter non_reguler
		foreach ($collect_sch_non_reguler as $key => $value) {
			$str_start = $value->lbs_date_start . ' ' . $value->lbs_time_start;
			$datetime_start = date('Y-m-d H:i:s', strtotime($str_start));

			$str_end = $value->lbs_date_end . ' ' . $value->lbs_time_end;
			$datetime_end = date('Y-m-d H:i:s', strtotime($str_end));

			$dataSch[$sch_index] = [
				'title' => $value->lbs_matkul,
				'start' => $datetime_start,
				'end' => $datetime_end,
				'color' => '#09c755'
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
}
