<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Laboratory;
use App\Models\User;
use App\Http\Requests\LabPostRequest;
use App\Http\Requests\LabFacilityPostRequest;
use App\Http\Requests\LabSchPostRequest;
use App\Models\Lab_schedule;
use Auth;
use Str;
use Storage;
use Carbon\Carbon;
use App\Models\Laboratory_technician;
use App\Models\Laboratory_facility_count_status;
use App\Models\Laboratory_facility;

class FacilityController extends Controller
{
	/* Tags:... */
	public function dataLabFacility(Request $request)
	{
		return view('contents.content_datalist.data_facility_lab');
	}
	/* Tags:... */
	public function dataFacility(Request $request)
	{
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		// die();
		return view('contents.content_datalist.data_facilities', compact('data_lab'));
	}
	/* Tags:... */
	public function formAddFacilities(Request $request)
	{
		$users = User::get();
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->id)
		->select('lab_name', 'name', 'lab_id')
		->first();
		return view('contents.content_form.form_add_facilities', compact('users', 'data_lab'));
	}
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
			'laf_base' => $request->inp_base,
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
		return redirect()->route('data_fasilitas_lab', ['id' => $request->lab_id]);
	}
	public function viewLabFacilityDetail(Request $request)
	{
		$data_fasilitas = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->where('laf_id', $request->id)
		->first();
		// dd($data_fasilitas);
		return view('contents.content_pageview.view_detail_fasilitas_i', compact('data_fasilitas'));
	}
	public function formUpdateLaboratoryFacility(Request $request)
	{
		$users = User::get();
		$data_facility = Laboratory_facility::leftjoin('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->leftJoin('laboratories', 'laboratory_facilities.laf_laboratorium', '=', 'laboratories.lab_id')
		->where('laf_id', $request->id)
		->first();
		// dd($data_facility);
		return view('contents.content_form.form_update_facilities_i', compact('users', 'data_facility'));
	}
	public function actionUpdateLabFacilities(Request $request)
	{
		$user = Auth::user();
		$lab_facility_id = $request->laf_id;
		$lab_fa_conunt_id = $request->lcs_id;
		$laf_data = Laboratory_facility::where('laf_id',$request->laf_id)->first();
		#
		$laf_name = Str::slug($request->inp_fasilitas, '_');
		$getFile = $request->file('upload_url_img');
		if ($getFile == null) {
			if ($request->param_upload_url_img == 'delete') {
				$file_name = null;
				$file_remove = Storage::delete('public/image_facility/' . $laf_data->laf_image);
			} else {
				$file_name = $laf_data->laf_image;
			}
		} else {
			$file_remove = Storage::delete('public/image_facility/' . $laf_data->laf_image);
			$file_name = date('Ymd') . '_' . date('His') . '_' . $laf_name . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/image_facility', $file_name);
		}
		$data_lab = [
			'laf_laboratorium' => $request->lab_id,
			'laf_name' => $request->inp_fasilitas,
			'laf_utility' => $request->inp_utility,
			'laf_brand' => $request->inp_brand,
			// 'laf_base' => $request->inp_base,
			'laf_value' => funFormatCurToDecimal($request->inp_cost),
			'laf_description' => $request->inp_diskripsi,
			'laf_image' => $file_name,
			'created_by' => $user->id,
		];
		$data_lab_count_detail = [
			'lcs_facility' => $lab_facility_id,
			'lcs_count' => $request->inp_cn_facility,
			'lcs_ready' => $request->inp_cn_ready,
			'lcs_used' => $request->inp_cn_used,
			'lcs_unwearable' => $request->inp_cn_unwearable,
		];
		#
		$storeFacility = Laboratory_facility::where('laf_id', $lab_facility_id)->update($data_lab);
		$storeFacilityCnt = Laboratory_facility_count_status::where('lcs_id', $lab_fa_conunt_id)->update($data_lab_count_detail);
		return redirect()->route('data_fasilitas_lab', ['id' => $request->lab_id]);
	}
}
