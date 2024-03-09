<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\Lab_submission;
use App\Models\Laboratory_facility;
use App\Models\Lab_schedule;

class DatatablesController extends Controller
{
	/* Tags:... */
	public function sourceDataLaboratorium(Request $request)
	{
		$data = Laboratory::join('users', 'laboratories.lab_head', '=', 'users.id')
		->get();
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
		<div class="btn-group">
			<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Menu <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/jadwal') . '"><i class="ri-calendar-2-line" aria-hidden="true" style="margin-right:12px;"></i>Jadwal Lab</a></li>
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/teknisi') . '"><i class="ri-user-settings-line" aria-hidden="true" style="margin-right:12px;"></i>Teknisi Lab</a></li>
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/fasilitas') . '"><i class="ri-computer-line" aria-hidden="true" style="margin-right:12px;"></i>Fasilitas Lab</a></li>
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/update-lab') . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update Data</a></li>
			</ul>
		</div></div>';
		})
		->addColumn('name', function ($data) {
			$res = $data->lab_name;
			return $res;
		})
		->addColumn('head', function ($data) {
			$res = $data->name;
			return $res;
		})
		->addColumn('status', function ($data) {
			if ($data->lab_status == 'tersedia') {
				$res = '<div style="text-align:left;"><span class="badge bg-green">' . strLabStatus($data->lab_status) . '</span>';
			} elseif ($data->lab_status == 'tidak_tersedia') {
				$res = '<div style="text-align:left;"><span class="badge bg-yellow">' . strLabStatus($data->lab_status) . '</span>';
			} else {
				$res = '<div style="text-align:left;"><span class="badge bg-default">Not Set</span>';
			}
			return $res;
		})
		->addColumn('location', function ($data) {
			$res = $data->lab_location;
			return $res;
		})
		->rawColumns(['opsi', 'name', 'head', 'status', 'location'])
		->make(true);
	}
	/* Tags:... */
	public function sourceDataTeknisiLab(Request $request)
	{
		$data = Laboratory_technician::join('users', 'laboratory_technicians.lat_tech_id', '=', 'users.id')
		->leftJoin('user_details', 'laboratory_technicians.lat_tech_id', '=', 'user_details.usd_user')
		->where('lat_laboratory', $request->lab_id)
		->select('id', 'name', 'lat_id', 'usd_phone', 'email', 'lat_laboratory')
		->get();
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
			<div class="btn-group">
				<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Menu <span class="caret"></span>
				</button>
				<ul class="dropdown-menu pull-right">
					<li><a href="' . url('setting/user/') . '/' . $data->id . '"><i class="ri-user-search-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat User</a></li>
					<li><a href="#" onclick="actDelTech(' . $data->lat_id . ')"><i class="ri-close-circle-line" aria-hidden="true" style="margin-right:12px;"></i>Hapus</a></li>
				</ul>
			</div></div>';
		})
		->addColumn('name', function ($data) {
			if ($data->name == null) {
				$res = '-';
			} else {
				$res = $data->name;
			}
			return $res;
		})
		->addColumn('email', function ($data) {
			if ($data->email == null) {
				$res = '-';
			} else {
				$res = $data->email;
			}
			return $res;
		})
		->addColumn('contact', function ($data) {
			if ($data->usd_phone == null) {
				$res = '-';
			} else {
				$res = $data->usd_phone;
			}
			return $res;
		})
		->rawColumns(['opsi', 'name', 'email', 'contact'])
		->make(true);
	}
	public function sourceDataPengajuan(Request $request)
	{
		$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->get();
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
		<div class="btn-group">
			<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Menu <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
				<li><a href="' . url('pengajuan/detail-pengajuan') . '/' . $data->lsb_id . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat Detail</a></li>
				<li role="separator" class="divider" style="margin-top: 0px;margin-bottom: 0px;"></li>
				<li><a href="' . url('pengajuan/pembatalan-pengajuan') . '/' . $data->lsb_id . '" class="del-siswa" id="' . $data->lsb . '"><i class="ri-close-circle-line" aria-hidden="true" style="margin-right:12px;"></i>Batal</a></li>
			</ul>
		</div></div>';
		})
		->addColumn('kegiatan', function ($data) {
			if ($data->lsb_activity == 'tp_penelitian') {
				$res = 'Penelitian';
			} elseif ($data->lsb_activity == 'tp_pelatihan') {
				$res = 'Pelatihan';
			} elseif ($data->lsb_activity == 'tp_pengabdian_masyarakat') {
				$res = 'Pengadian Masyarakat';
			} elseif ($data->lsb_activity == 'tp_magang') {
				$res = 'Magan';
			} else {
				$res = 'Lain-lain.';
			}
			return $res;
		})
		->addColumn('judul', function ($data) {
			return $data->lsb_title;
		})
		->addColumn('waktu', function ($data) {
			$dt1 = date('d M Y', strtotime($data->lsb_date_start));
			$dt2 = date('d M Y', strtotime($data->lsb_date_end));
			$res = $dt1 . '  s/d  ' . $dt2;
			return $res;
		})
		->addColumn('status', function ($data) {
			return '<div style="text-align:center;"><span class="badge bg-blue">Disetujui Kalab</span><span class="badge bg-blue">Disetujui Kalab</span></div>';
		})
		->rawColumns(['opsi', 'kegiatan', 'judul', 'status', 'waktu'])
		->make(true);
	}
	public function sourceDataFasilitasLab(Request $request)
	{
		$data = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->where('laf_laboratorium',$request->lab_id)
		->get();
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
		<div class="btn-group">
			<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Menu <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
				<li><a href="' . url('laboratorium/detail-fasilitas/' . $data->laf_id) . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Detail Alat/Fasilitas</a></li>
				<li><a href="' . url('laboratorium/update-fasilitas/' . $data->laf_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="' . url('laboratorium/hapus-fasilitas/' . $data->laf_id) . '"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Hapus</a></li>
			</ul>
		</div></div>';
		})
		->addColumn('name', function ($data) {
			$res = $data->laf_name;
			return $res;
		})
		->addColumn('brand', function ($data) {
			$res = $data->laf_brand;
			return $res;
		})
		->addColumn('utility', function ($data) {
			$res = $data->laf_utility;
			return $res;
		})
		->rawColumns(['opsi', 'name', 'brand', 'utility'])
		->make(true);
	}
	/* Tags:... */
	public function sourceDataScheduleLab(Request $request)
	{
		$dtStart =Carbon::parse(date('Y-m-d', strtotime($request->dtStart)))->format('Y-m-d');
		$dtEnd = Carbon::parse(date('Y-m-d', strtotime($request->dtEnd)))->format('Y-m-d');
		
		$idx_date_range = 0;
		$dataDays = [];
		while ($dtStart <= date("Y-m-d", strtotime("-1 day", strtotime($dtEnd)))) {
			// $dataDays[$idx_date_range] = [
			// 	'day' => date('l', strtotime($dtStart)),
			// 	'date' => date('Y-m-d', strtotime($dtStart)),
			// ];
			$days[$idx_date_range]  = date('l', strtotime($dtStart));
			$dtStart = date("Y-m-d", strtotime("+1 day", strtotime($dtStart)));
			$idx_date_range++;
		}
		$uniq_days = array_unique($days);
		#
		// $collect_sch_reguler = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		// ->where('lbs_lab', $request->lab_id)
		// ->where('lbs_type', 'reguler')
		// ->get();
		// $collect_sch_non_reguler = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		// ->where('lbs_lab', $request->lab_id)
		// ->where('lbs_type', 'non_reguler')
		// ->whereBetween('lbs_date_start', [date('Y-m-d', strtotime($request->dtStart)), date('Y-m-d', strtotime($request->dtEnd))])
		// ->get();
		$collect_sch_reguler = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		->where('lbs_lab', $request->lab_id)
		->where('lbs_type', 'reguler')
		->whereIn('lbs_day', $uniq_days)
		->get();
		$collect_sch_nonreguler = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		->where('lbs_lab', $request->lab_id)
		->where('lbs_type', 'non_reguler')
		// ->whereBetween('lbs_date_start', [date('Y-m-d', strtotime($request->dtStart)), date('Y-m-d', strtotime($request->dtEnd))])
		->get();
		#
		foreach ($collect_sch_nonreguler as $key => $value) {
			$date_idx = 1;
			// while ($value->lbs_date_start <= date("Y-m-d", strtotime("-1 day", strtotime($value->lbs_date_end)))) {
			// 	$dates_range[$date_idx] = $value->lbs_date_start;
			// 	$dates_range[$date_idx] = date("Y-m-d", strtotime("+1 day", strtotime($value->lbs_date_start)));
			// 	$date_idx++;
			// }
			echo $date_idx;
			$date_idx++;
		}
		$period = CarbonPeriod::create('2018-06-14', '2018-06-20');

		// Iterate over the period
		foreach ($period as $key => $date) {
			$fd [$key]= $date->format('Y-m-d');
		}

		$dates = $period->toArray();
		print_r($fd);
		// Convert the period to an array of dates
		// print_r($dates_range);
		die();

		// foreach ($dataDays as $key => $value) {
		// 	$dts[$key] = $collect_sch_reguler->where('lbs_day', strtolower($value['day']));
		// 	foreach ($dts[$key] as $skey => $svalue) {
		// 		$date_exclude = explode('$', $svalue->lbs_sch_dates_canceled);
		// 		$time_start = Carbon::parse($svalue->lbs_time_start)->isoFormat('HH:mm');
		// 		$time_end = Carbon::parse($svalue->lbs_time_end)->isoFormat('HH:mm');
		// 		if ($svalue->lbs_type == 'reguler') {
		// 			$lbs_type = 'Reguler';
		// 		} else {
		// 			$lbs_type = 'Non Reguler';
		// 		}
		// 		if (!in_array($value['date'], $date_exclude)) {
		// 			$dataSch[$sch_index] = [
		// 				'lab_id' => $svalue->lbs_lab,
		// 				'lbs_id' => $svalue->lbs_id,
		// 				'day' => Carbon::parse($svalue->lbs_day)->isoFormat('dddd'),
		// 				'time' => $time_start . ' - ' . $time_end,
		// 				'subject' => $svalue->lbs_matkul,
		// 				'group' =>  $svalue->lbs_tenant_name,
		// 				'person' => $svalue->name,
		// 				'type' => $lbs_type,
		// 			];
		// 		} else {
		// 			$dataSch[$sch_index] = [
		// 				'lab_id' => $svalue->lbs_lab,
		// 				'lbs_id' => $svalue->lbs_id,
		// 				'day' => Carbon::parse($svalue->lbs_day)->isoFormat('dddd'),
		// 				'time' => $time_start . ' - ' . $time_end,
		// 				'subject' => $svalue->lbs_matkul,
		// 				'group' =>  $svalue->lbs_tenant_name,
		// 				'person' => $svalue->name,
		// 				'type' => $lbs_type,
		// 			];
		// 		}
		// 		$sch_index++;
		// 	}
		// }
		$dataSch = [];
		$sch_index = 0;
		# processing sch data with parameter reguler
		foreach ($collect_sch_reguler as $key => $value) {
			$lbs_type = 'Reguler';
			$time_start = Carbon::parse($value->lbs_time_start)->isoFormat('HH:mm');
			$time_end = Carbon::parse($value->lbs_time_end)->isoFormat('HH:mm');
			$times = 'Setiap '. Carbon::parse($value->lbs_day)->isoFormat('dddd'). ' pukul ' . $time_start . ' - ' . $time_end;
			$dataSch[$sch_index] = [
				'day' => null,
				'lab_id' => $value->lbs_lab,
				'lbs_id' => $value->lbs_id,
				'time' => 	$times,
				'subject' => $value->lbs_matkul,
				'group' =>  $value->lbs_tenant_name,
				'person' => $value->name,
				'type' => $lbs_type,
			];
			$sch_index++;
		}
		# processing sch data with parameter reguler
		foreach ($collect_sch_nonreguler as $key => $value) {
			$range_date_x = date('d-m-Y', strtotime($value->lbs_date_start)) . ' s/d ' . date('d-m-Y', strtotime($value->lbs_date_end));
			$lbs_type = 'Non Reguler';
			$times = $range_date_x;
			$dataSch[$sch_index] = [
				'day' => null,
				'lab_id' => $value->lbs_lab,
				'lbs_id' => $value->lbs_id,
				'time' => 	$times,
				'subject' => $value->lbs_matkul,
				'group' =>  $value->lbs_tenant_name,
				'person' => $value->name,
				'type' => $lbs_type,
			];
			$sch_index++;
		}
		// die();
		#
		// print_r($dataSch);
		// $data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		// ->whereBetween('lbs_date_start', [date('Y-m-d', strtotime($request->dtStart)), date('Y-m-d', strtotime($request->dtEnd))])
		// ->where('lbs_lab', $request->lab_id)
		// ->get();
		// die();
		#
		return DataTables::of($dataSch)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($dataSch) {
			return ' <div style="text-align:center;">
		<div class="btn-group">
			<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Menu <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
				<li><a href="' . url('laboratorium/update-jadwal-lab/'. $dataSch['lab_id'].'/'. $dataSch['lbs_id']) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="#" onclick="actDeleteSchLab('. $dataSch['lbs_id'].')"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Delete</a></li>
			</ul>
		</div></div>';
		})
		->addColumn('day', function ($dataSch) {
			$res = $dataSch['day'];
			return $res;
		})
		->addColumn('time', function ($dataSch) {
			$res = $dataSch['time'];
			return $res;
		})
		->addColumn('type', function ($dataSch) {
			$res = $dataSch['type'];
			return $res;
		})
		->addColumn('subject', function ($dataSch) {
			$res = $dataSch['subject'];
			return $res;
		})
		->addColumn('group', function ($dataSch) {
			$res = $dataSch['group'];
			return $res;
		})
		->addColumn('person', function ($dataSch) {
			$res = $dataSch['group'];
			return $res;
		})
		->rawColumns(['opsi','day' ,'time', 'type', 'subject', 'group','person'])
		->make(true);
	}
	public function sourceDataScheduleLab_Backup(Request $request)
	{
		if ($request->filter_type == 'all' && $request->filter_day == 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
			->get();
		} elseif ($request->filter_type != 'all' && $request->filter_day == 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
			->Where('lbs_type', $request->filter_type)
			->get();
		} elseif ($request->filter_type == 'all' && $request->filter_day != 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
				->where('lbs_day', $request->filter_day)
				->get();
		} else {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
			->where('lbs_day', $request->filter_day)
			->Where('lbs_type', $request->filter_type)
			->get();
		}
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
			<div class="btn-group">
			<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Menu <span class="caret"></span>
			</button>
			<ul class="dropdown-menu pull-right">
			<li><a href="' . url('laboratorium/update-jadwal-lab/' . $data->lbs_lab . '/' . $data->lbs_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
			<li><a href="#" onclick="actDeleteSchLab(' . $data->lbs_id . ')"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Delete</a></li>
			</ul>
			</div></div>';
		})
		->addColumn('day', function ($data) {
			$res = Carbon::parse($data->lbs_day)->isoFormat('dddd');
			return $res;
		})
		->addColumn('time', function ($data) {
			$time_start = Carbon::parse($data->lbs_time_start)->isoFormat('HH:mm');
			$time_end = Carbon::parse($data->lbs_time_end)->isoFormat('HH:mm');
			$res = $time_start . ' - ' . $time_end;
			return $res;
		})
		->addColumn('type', function ($data) {
			if ($data->lbs_type == 'reguler') {
				$res = 'Reguler';
			} else {
				$res = 'Non Reguler';
			}
			return $res;
		})
		->addColumn('subject', function ($data) {
			$res = $data->lbs_matkul;
			return $res;
		})
		->addColumn('group', function ($data) {
			$res = $data->lbs_group_study;
			return $res;
		})
		->addColumn('person', function ($data) {
			$res = $data->name;
			return $res;
		})
		->rawColumns(['opsi', 'day', 'time', 'type', 'subject', 'group', 'person'])
		->make(true);
	}
}
