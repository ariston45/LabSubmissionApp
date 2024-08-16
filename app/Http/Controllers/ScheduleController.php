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
use App\Models\Lab_sch_date;
use App\Models\Lab_sch_time;
use App\Models\User;
use App\Models\Laboratory_facility_count_status;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_time_option;

class ScheduleController extends Controller
{
	/* Tags:... */
	public function dataLabSchedule(Request $request)
	{
		return view('contents.content_datalist.data_schedule_lab');
	}
	/* Tags:... */
	public function dataSchedule(Request $request)
	{
		// die();
		$lab_id = $request->id;
		$data_lab = Laboratory::where('lab_id', $lab_id)->first();
		return view('contents.content_datalist.data_schedule', compact('lab_id', 'data_lab'));
	}
	public function formExcludeLaboratorySch(Request $request)
	{
		$lab_id = $request->id;
		return view('contents.content_form.form_exclude_sch', compact('lab_id'));
	}
	public function formInputLaboratorySch(Request $request)
	{
		$lab_id = $request->id;
		$data_lab = Laboratory::where('lab_id', $lab_id)->first();
		$times = Laboratory_time_option::get();
		return view('contents.content_form.form_input_sch', compact('lab_id', 'data_lab', 'times'));
	}
	public function actionInputLabSch(Request $request)
	{
		$user = Auth::user();
		$err = array();
		$id_lab_sch = genIdLaSch();
		$day = date('l', strtotime($request->inp_day));
		$id_sch_date = genIdDateSch();
		$check_sch = Lab_sch_date::join('lab_schedules', 'lab_sch_dates.lscd_sch','=','lab_schedules.lbs_id')
		->join('lab_sch_times', 'lab_sch_dates.lscd_id','=', 'lab_sch_times.lsct_date_id')
		->join('laboratory_time_options', 'lab_sch_times.lsct_time_id','=', 'laboratory_time_options.lti_id')
		->where('lbs_lab', $request->lab_id)
		->where('lscd_day', $day)
		->where('lbs_type', 'reguler')
		->select('lbs_id', 'lbs_lab', 'lbs_matkul', 'lbs_submission', 'lbs_tenant_init', 'lbs_tenant_name', 'lbs_type',
			'lscd_date','lscd_day','lscd_status','lscd_id','lscd_sch','lscd_status','lsct_date_id','lsct_status','lti_id','lti_start','lti_end')
		->get();
		$ck_id = $check_sch->whereIn('lti_id',[$request->inp_time]);
		$ids_str = implode('.', $request->inp_res_person);
		if ($ck_id->count() == 0) {
			$data_sch = [
				'lbs_id' => $id_lab_sch,
				'lbs_lab' =>  $request->lab_id,
				'lbs_type' => 'reguler',
				'lbs_matkul' => $request->inp_subject,
				'lbs_tenant_name' => $request->inp_group,
				'lbs_res_person' => $ids_str,
				'created_by' => $user->id
			];

			$data_date = [
				'lscd_id' => $id_sch_date,
				'lscd_sch' => $id_lab_sch,
				'lscd_day' => $day,
				'lscd_date' => null,
				'lscd_status' => 'active'
			];
			// dd($request->inp_time);
			foreach ($request->inp_time as $key => $value) {
				$data_time[$key] = [
					'lsct_date_id' => $id_sch_date,
					'lsct_time_id' => $value,
					'lsct_status' => 'active'
				];
			}
			$storeLabSch = Lab_schedule::insert($data_sch);
			$storeLabSchdate = Lab_sch_date::insert($data_date);
			$storeLabSchTime = Lab_sch_time::insert($data_time);
			return redirect()->route('schedule_lab', ['id' => $request->lab_id]);
		} else {
			return redirect()->back();
		}
	}
	/* Tags:... */
	public function dataSchReguler(Request $request)
	{
		$lab = Laboratory::where('lab_id',$request->id)->first();
		// dd($lab);
		return view('contents.content_datalist.data_schedule_reguler', compact('lab'));
	}
	
}
