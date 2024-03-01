<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LabPostRequest;
use App\Http\Requests\LabFacilityPostRequest;
use App\Http\Requests\LabSchPostRequest;
use App\Models\Lab_schedule;
use Auth;

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
		$users = User::get();
		return view('contents.content_form.form_input_lab',compact('users'));
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
	public function sourceDataUser(Request $request)
	{
		if ($request->level == null) {
			$users = User::get();
		} else {
			$users = User::where('level',$request->level)->get();
		}
		$data = [];
		foreach ($users as $key => $value) {
			$data[$key] = [
				'id' => $value->id,
				'title' => $value->name,
				'level' => $value->level
			];
		}
		$data_json = json_encode($data);
		return $data_json;
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
	public function viewLabSchedule(Request $request)
	{
		$lab_id = $request->id;
		return view('contents.content_datalist.data_laboratory_sch',compact('lab_id'));
	}
	/* Tags:... */
	public function formInputLaboratorySch(Request $request)
	{
		$lab_id = $request->id;
		return view('contents.content_form.form_input_schedule', compact('lab_id'));
	}
	/* Tags:... */
	public function actionInputLabSch(LabSchPostRequest $request)
	{
		$user = Auth::user();
		$id_lab_sch = genIdLaSch();
		$day = date('l',strtotime($request->inp_day));
		$tm_start = date('H:i',strtotime($request->inp_time_start));
		$tm_end = date('H:i', strtotime($request->inp_time_end));
		$ids_str = implode('.',$request->inp_res_person);
		$data = [
			'lbs_id' => $id_lab_sch,
			'lbs_lab' => $request->lab_id,
			'lbs_day' => $day,
			'lbs_time_start' => $tm_start,
			'lbs_time_end' => $tm_end,
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_group_study' => $request->inp_group,
			'lbs_res_person' => $ids_str,
			'created' => $user->id
		];
		$storeLabSch = Lab_schedule::insert($data);
		return redirect()->route('laboratorium_schedule', ['id' => $request->lab_id]);;
	}
}
