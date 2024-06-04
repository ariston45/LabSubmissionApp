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
		return view('contents.content_form.form_input_sch', compact('lab_id'));
	}
	public function actionInputLabSch(LabSchPostRequest $request)
	{
		$user = Auth::user();
		$err = array();
		$id_lab_sch = genIdLaSch();
		$day = date('l', strtotime($request->inp_day));
		$tm_start = date('H:i', strtotime($request->inp_time_start));
		$tm_end = date('H:i', strtotime($request->inp_time_end));
		$ids_str = implode('.', $request->inp_res_person);
		$data_sch = Lab_schedule::where('lbs_lab', $request->lab_id)
			->where('lbs_day', $day)
			->where('lbs_type', 'reguler')
			->orderBy('lbs_time_start', 'asc')
			->get();
		$time_set_start = Carbon::parse($request->inp_time_start)->format('H:i');
		// echo $time_set_start;
		$idx = 0;
		foreach ($data_sch as $key => $value) {
			$check_start[$key] = Carbon::parse($value->lbs_time_start)->format('H:i');
			$check_end[$key] = Carbon::parse($value->lbs_time_end)->format('H:i');

			if (Carbon::parse($request->inp_time_start)->Between($check_start[$key], $check_end[$key], true)) {
				$checkTimeErr[$idx] = 'Input jam mulai [' . $request->inp_time_start . '] tidak tersedia, karena konflik dengan jadwal pukul [' . $check_start[$key] . ' - ' . $check_end[$key] . ']. ';
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
				$strMsg .= $value;
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
		return redirect()->route('schedule_lab', ['id' => $request->lab_id]);
	}
	/* Tags:... */
	
}
