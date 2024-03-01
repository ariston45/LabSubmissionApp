<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;


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
		if ($request->filter_type == 'all' && $request->filter_day == 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab',$request->lab_id)
			->get();
		}elseif ($request->filter_type != 'all' && $request->filter_day == 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
			->Where('lbs_type', $request->filter_type)
			->get();
		}elseif ($request->filter_type == 'all' && $request->filter_day != 'all') {
			$data = Lab_schedule::leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lbs_lab', $request->lab_id)
			->where('lbs_day', $request->filter_day)
			->get();
		}else {
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
				<li><a href="' . url('laboratorium/update-jadwal-lab/'.$data->lbs_lab.'/'.$data->lbs_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="#" onclick="actDeleteSchLab('. $data->lbs_id.')"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Delete</a></li>
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
			$res = $time_start.' - '.$time_end;
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
		->rawColumns(['opsi','day' ,'time', 'type', 'subject', 'group','person'])
		->make(true);
	}
}
