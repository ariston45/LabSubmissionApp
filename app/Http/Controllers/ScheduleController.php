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
use Carbon\CarbonPeriod;

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
	public function dataSchedulePinjam(Request $request)
	{
		// die();
		$lab_id = $request->id;
		$data_lab = Laboratory::where('lab_id', $lab_id)->first();
		return view('contents.content_datalist.data_schedule_pinjam', compact('lab_id', 'data_lab'));
	}
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
		$id_sch_date = genIdDateSch();
		$dtStart = Carbon::parse(date('Y-m-d', strtotime($request->inp_dt_start)))->format('Y-m-d');
		$dtEnd = Carbon::parse(date('Y-m-d', strtotime($request->inp_dt_start)))->format('Y-m-d');
		$period = CarbonPeriod::create($dtStart, $dtEnd);
		foreach ($period as $key => $value) {
			$dateFormated = date('Y-m-d', strtotime($value));
			$datesAr[$key] = $dateFormated;
		}
		$dateStr = implode('#', $datesAr);
		// dd($request->inp_time);
		foreach ($datesAr as $key => $value) {
			$c = lab_schedule::where('lbs_dates_period','like', '%'.$value.'%')
			->where('lbs_type', 'reguler')
			->first();
			if ($c != null) {
				// echo $c ."<br>";
				$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
				->join('laboratory_time_options', 'lab_sch_times.lsct_time_id', '=', 'laboratory_time_options.lti_id')
				->where('lscd_sch', $c->lbs_id)
				->select('lscd_sch','lsct_date_id', 'lsct_time_id','lti_id')
				->get();
				// echo $check_dt->lbs_id;
				foreach ($check_dt as $key => $svalue) {
					echo $svalue.'<br>';
					if (in_array($svalue->lti_id, $request->inp_time)) {
						echo 'ada<br>';
						return redirect()->back()->withErrors(['msg_err' => 'Jadwal yang anda buat konflik, harap cek kembali jadwal anda.']);
					}
				}
			}
		}
		$data_sch = [
			'lbs_id' => $id_lab_sch,
			'lbs_lab' =>  $request->lab_id,
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_tenant_name' => $request->inp_group,
			'lbs_res_person' => $request->inp_res_person,
			'created_by' => $user->id,
			'lbs_date_start' => $request->inp_dt_start,
			'lbs_date_end'=> $request->inp_dt_end,
			'lbs_dates_period' => $dateStr,
		];
		$data_date = [
			'lscd_id' => $id_sch_date,
			'lscd_sch' => $id_lab_sch,
			'lscd_day' => null,
			'lscd_date' => null,
			'lscd_status' => 'active'
		];
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
	}
	public function actionUpdateLabSch(Request $request)
	{
		$user = Auth::user();
		$dtStart = Carbon::parse(date('Y-m-d', strtotime($request->inp_dt_start)))->format('Y-m-d');
		$dtEnd = Carbon::parse(date('Y-m-d', strtotime($request->inp_dt_start)))->format('Y-m-d');
		$period = CarbonPeriod::create($dtStart, $dtEnd);
		foreach ($period as $key => $value) {
			$dateFormated = date('Y-m-d', strtotime($value));
			$datesAr[$key] = $dateFormated;
		}
		$dateStr = implode('#', $datesAr);
		// dd($request->inp_time);
		foreach ($datesAr as $key => $value) {
			$c = lab_schedule::where('lbs_dates_period', 'like', '%' . $value . '%')
				->where('lbs_type', 'reguler')
				->first();
			if ($c != null) {
				// echo $c ."<br>";
				$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
				->join('laboratory_time_options', 'lab_sch_times.lsct_time_id', '=', 'laboratory_time_options.lti_id')
				->where('lscd_sch', $c->lbs_id)
					->select('lscd_sch', 'lsct_date_id', 'lsct_time_id', 'lti_id')
					->get();
				// echo $check_dt->lbs_id;
				foreach ($check_dt as $key => $svalue) {
					echo $svalue . '<br>';
					if (in_array($svalue->lti_id, $request->inp_time ) && $svalue->lscd_sch != $request->lscd_id ) {
						echo 'ada<br>';
						return redirect()->back()->withErrors(['msg_err' => 'Jadwal yang anda buat konflik, harap cek kembali jadwal anda.']);
					}
				}
			}
		}
		$data = [
			'lbs_type' => 'reguler',
			'lbs_matkul' => $request->inp_subject,
			'lbs_tenant_name' => $request->inp_group,
			'lbs_res_person' => $request->inp_res_person,
			'lbs_date_start' => $request->inp_dt_start,
			'lbs_date_end' => $request->inp_dt_end,
			'lbs_dates_period' => $dateStr,
		];
		$times = $request->inp_time;
		$data_times = [];
		if (count($times) > 0) {
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
		Lab_sch_date::where('lscd_id', $request->lscd_id)->update(['lscd_day' => $request->inp_day]);
		Lab_schedule::where('lbs_id', $request->lbs_id)->update($data);
		return redirect()->back();
	}
	/* Tags:... */
	public function dataSchReguler(Request $request)
	{
		$lab = Laboratory::where('lab_id',$request->id)->first();
		// dd($lab);
		return view('contents.content_datalist.data_schedule_reguler', compact('lab'));
	}
	
}
