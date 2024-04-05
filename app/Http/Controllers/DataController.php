<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Models\Lab_schedule;
use App\Models\Laboratory;
use App\Models\Laboratory_facility;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use DataTables;

class DataController extends Controller
{
	# <===========================================================================================================================================================>
	#user #data_user
	/* Tags:... */
	public function sourceDataUser(Request $request)
	{
		if ($request->level == null) {
			$users = User::get();
		} else {
			$users = User::where('level', $request->level)->get();
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
	public function serchingDataUser(Request $request)
	{
		if ($request->level == null) {
			$users = User::get();
		} else {
			$users = User::where('level', $request->level)
			->where('name','like','%'.$request->par.'%')
			->get();
		}
		$data = [];
		foreach ($users as $key => $value) {
			$data[$key] = [
				'id' => $value->id,
				'title' => $value->name,
			];
		}
		$data_json = json_encode($data);
		return $data_json;
	}
	/* Tags:... */
	public function sourceTimeData(Request $request)
	{
		$lab_id = $request->lab_id;
		$day = date('l', strtotime($request->date_sch));
		$data = Lab_schedule::where('lbs_lab',$lab_id)->where('lbs_day',$day)->get();
		$times[0] = [
			'id' => 'all',
			'title' => 'Semua Waktu'
		];
		$idx = 1;
		foreach ($data as $key => $value) {
			$times[$idx] = [
				'id' => $value->lbs_id,
				'title' => Carbon::parse($value->lbs_time_start)->isoFormat('HH:mm').' - '. Carbon::parse($value->lbs_time_end)->isoFormat('HH:mm'),
			];
			$idx++;
		}
		$data_json = json_encode($times);
		return $data_json;
	}
	public function sourceDataScheduleLabJson(Request $request)
	{
		$dtStart = Carbon::parse($request->start);
		$dtEnd = Carbon::parse($request->end);
		$collect_sch_reguler = Lab_schedule::where('lbs_lab', $request->lab_id)
			->where('lbs_type', 'reguler')
			->get();
		$collect_sch_non_reguler = Lab_schedule::where('lbs_lab', $request->lab_id)
			->where('lbs_type', 'non_reguler')
			->whereBetween('lbs_date_start', [$dtStart, $dtEnd])
			->get();

		$dataSch = [];
		$sch_index = 0;
		# processing sch data with parameter reguler
		$idx_date_range = 0;
		$dataDays = [];
		while ($dtStart <= date("Y-m-d", strtotime("-1 day", strtotime($dtEnd)))) {
			$dataDays[$idx_date_range] = [
				'day' => date('l', strtotime($dtStart)),
				'date' => date('Y-m-d', strtotime($dtStart)),
			];
			$dtStart = date("Y-m-d", strtotime("+1 day", strtotime($dtStart)));
			$idx_date_range++;
		}
		foreach ($dataDays as $key => $value) {
			$dts[$key] = $collect_sch_reguler->where('lbs_day', strtolower($value['day']));
			foreach ($dts[$key] as $skey => $svalue) {
				$date_exclude[$sch_index] = explode('$', $svalue->lbs_sch_dates_excluded);
				$str_start = $value['date'] . ' ' . $svalue->lbs_time_start;
				$datetime_start = date('Y-m-d H:i:s', strtotime($str_start));
				$str_end = $value['date'] . ' ' . $svalue->lbs_time_end;
				$datetime_end = date('Y-m-d H:i:s', strtotime($str_end));
				if (!in_array($value['date'], $date_exclude[$sch_index])) {
					$dataSch[$sch_index] = [
						'title' => $svalue->lbs_matkul,
						'start' => $datetime_start,
						'end' => $datetime_end,
						'color' => '#0955c7'
					];
				} else {
					$dataSch[$sch_index] = [
						'title' => '(Batal)' . $svalue->lbs_matkul,
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
	public function sourceDataFacilities(Request $request)
	{
		$data = Laboratory_facility::where('laf_laboratorium',$request->lab_id)->get();
		$res[0] = [ 'id' => null, 'title' => null];
		foreach ($data as $key => $value) {
			$res[$key] = [
				'id' => $value->laf_id,
				'title' => $value->laf_name
			];
		}
		$data_json = json_encode($res);
		return $data_json;
	}
	/* Tags:... */
	public function downloadBuktiBayar(Request $request)
	{
		try {
			return Storage::download('public/bukti_bayar/' . $request->filename);
		} catch (\Throwable $th) {
			return redirect()->back()->withErrors(['file_err' => 'File tidak tersedia.']);
		}
	}
	/* Tags:... */
	public function downloadLaporanKegiatan(Request $request)
	{
		try {
			return Storage::download('public/repo_report/' . $request->filename);
		} catch (\Throwable $th) {
			return redirect()->back()->withErrors(['file_laporan_err' => 'File tidak tersedia.']);
		}
	}
	/* Tags:... */
	public function sourceDataAllLab(Request $request)
	{
		$data = Laboratory::get();
		$res[0] = ['id' => null, 'title' => null];
		foreach ($data as $key => $value) {
			$res[$key] = [
				'id' => $value->lab_id,
				'title' => $value->lab_name
			];
		}
		$data_json = json_encode($res);
		return $data_json;
	}
}
