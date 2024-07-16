<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\Lab_submission;
use App\Models\Laboratory_facility;
use App\Models\Lab_schedule;
use App\Models\User;
use App\Models\Lab_submission_acc;
use App\Models\Lab_submission_adviser;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;
use App\Models\Lab_sub_date;
use App\Models\Lab_sch_time;



class DatatablesController extends Controller
{
	public function sourceDataUser(Request $request)
	{
		$colect_data = User::all();
		return DataTables::of($colect_data)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {
				return '';
			})
			->addColumn('menu', function ($colect_data) {
				return '<div class="btn-group">
			<button type="button" class="btn btn-xs bg-gradient-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</button>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="' . url('setting/user/detail-user/' . $colect_data->id) . '"><button class="dropdown-item btn-sm" type="button"><i class="fas fa-eye cst-mr-5"></i>Lihat Detail</button></a>
			</div></div>';
			})
			->addColumn('name', function ($colect_data) {
				return $colect_data->name;
			})
			->addColumn('username', function ($colect_data) {
				return $colect_data->username;
			})
			->addColumn('email', function ($colect_data) {
				return $colect_data->email;
			})
			->rawColumns(['name', 'username', 'email', 'menu'])
			->make('true');
	}
	/* Tags:... */
	public function sourceDataLaboratorium(Request $request)
	{
		$user = Auth::user();
		if (rulesUser(['ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_HEAD'])) {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->get();
		}elseif(rulesUser(['LAB_SUBHEAD'])){
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('id',$user->id)
			->get();
		}elseif (rulesUser(['LAB_TECHNICIAN'])) {
			$data = Laboratory::join('laboratory_technicians', 'laboratories.lab_id', '=', 'laboratory_technicians.lat_laboratory')
			->leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('lat_tech_id', $user->id)
			->get();
		}else{
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
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
				<li><a href="' . url('jadwal_lab/' . $data->lab_id) . '"><i class="ri-calendar-2-line" aria-hidden="true" style="margin-right:12px;"></i>Jadwal Lab</a></li>
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/teknisi') . '"><i class="ri-user-settings-line" aria-hidden="true" style="margin-right:12px;"></i>Teknisi Lab</a></li>
				<li><a href="' . url('laboratorium/' . $data->lab_id . '/ujilab') . '"><i class="ri-microscope-line" aria-hidden="true" style="margin-right:12px;"></i>Uji Lab</a></li>
				<li><a href="' . url('fasilitas_lab/' . $data->lab_id ) . '"><i class="ri-computer-line" aria-hidden="true" style="margin-right:12px;"></i>Fasilitas Lab</a></li>
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
		->get();;
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
		if ($request->status == null) {
			$status = ['menunggu', 'disetujui','ditolak','selesai'];
		}else{
			$status = [$request->status];
		}
		$user = authUser();
		if (rulesUser(['ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_HEAD'])) {
			if ($request->dt_start == null && $request->dt_end == null) {
				if ($request->status == null) {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}else{
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_status',$request->status)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}
			} elseif($request->dt_start != null && $request->dt_end != null) {
				if ($request->status == null) {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d',strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_period','like','%'. $date_perform.'%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				} else {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				}
			}else{
				// 
			}
		}elseif (rulesUser(['LAB_SUBHEAD'])) {
			if ($request->dt_start == null && $request->dt_end == null) {
				if ($request->status == null) {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_subhead', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				} else {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_subhead', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}
			} elseif ($request->dt_start != null && $request->dt_end != null) {
				if ($request->status == null) {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_subhead', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				} else {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_subhead', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				}
			} else {
				// 
			}
		}elseif (rulesUser(['LAB_TECHNICIAN'])) {
			if ($request->dt_start == null && $request->dt_end == null) {
				if ($request->status == null) {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_tech', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				} else {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_tech', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}
			} elseif ($request->dt_start != null && $request->dt_end != null) {
				if ($request->status == null) {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_tech', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				} else {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_tech', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				}
			} else {
				// 
			}
			// $data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			// ->whereIn('lsb_status',$status)
			// ->where('lsb_user_tech', $user->id)
			// ->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			// ->get();
		}elseif (rulesUser(['LECTURE'])) {
			$set_id = $user->no_id;
			$lsb_ids = Lab_submission_adviser::where('las_user_no_id', $set_id)->select('las_lbs_id')->get();
			$lids = [];
			foreach ($lsb_ids as $key => $value) {
				$lids[$key] = $value->las_lbs_id;
			}
			// print_r('test'); die();
			if ($request->dt_start == null && $request->dt_end == null) {
				if ($request->status == null) {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_id', $lids)
					->whereIn('lsb_status', $status)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				} else {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					// ->where('lsb_user_lecture', $user->id)
					->whereIn('lsb_id', $lids)
					->whereIn('lsb_status', $status)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}
			} elseif ($request->dt_start != null && $request->dt_end != null) {
				if ($request->status == null) {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						// ->where('lsb_user_lecture', $user->id)
						->whereIn('lsb_id', $lids)
						->whereIn('lsb_status', $status)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				} else {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						// ->where('lsb_user_lecture', $user->id)
						->where('lsb_id', $lids)
						->whereIn('lsb_status', $status)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				}
			} else {
				// 
			}
			// $data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			// ->whereIn('lsb_status',$status)
			// ->where('lsb_user_lecture', $user->id)
			// ->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			// ->get();
		}elseif(rulesUser(['STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER'])){
			if ($request->dt_start == null && $request->dt_end == null) {
				if ($request->status == null) {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_id', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				} else {
					$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
					->whereIn('lsb_status', $status)
					->where('lsb_user_id', $user->id)
					->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
					->get();
				}
			} elseif ($request->dt_start != null && $request->dt_end != null) {
				if ($request->status == null) {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_id', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				} else {
					$colData = collect();
					$period = CarbonPeriod::create($request->dt_start, $request->dt_end);
					foreach ($period as $key => $value) {
						$date_perform = date('Y-m-d', strtotime($value));
						$data_colect[$key] = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
						->whereIn('lsb_status', $status)
						->where('lsb_user_id', $user->id)
						->where('lsb_period', 'like', '%' . $date_perform . '%')
						->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
						->get();
						$colData = $colData->merge($data_colect[$key]);
					}
					$data = $colData->unique();
				}
			} else {
				// 
			}
			// $data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			// ->whereIn('lsb_status',$status)
			// ->where('lsb_user_id', $user->id)
			// ->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			// ->get();
		}
		$data = $data->sortBy(function ($item) {
			return array_search($item->lsb_status, ['menunggu','disetujui','selesai','ditolak']);
		});
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return ' <div style="text-align:center;">
			<a href="' . url('pengajuan/detail-pengajuan') . '/' . $data->lsb_id . '" target="_blank">
			<button class="btn btn-flat btn-default btn-xs" type="button"> Detail </button>
			</a></div>';
		})
		->addColumn('pemohon', function ($data) {
			return $data->name;
		})
		->addColumn('waktu_pengajuan', function ($data) {
			$date = date('d/m/Y',strtotime($data->lsb_created));
			return $date;
		})
		->addColumn('kegiatan', function ($data) {
			if ($data->lsb_activity == 'tp_penelitian') {
				$res = 'Penelitian';
			} elseif ($data->lsb_activity == 'tp_pelatihan') {
				$res = 'Pelatihan';
			} elseif ($data->lsb_activity == 'tp_pengabdian_masyarakat') {
				$res = 'Pengadian Masyarakat';
			} elseif ($data->lsb_activity == 'tp_magang') {
				$res = 'Magang';
			} else {
				$res = 'Lain-lain.';
			}
			return $res;
		})
		->addColumn('judul', function ($data) {
			return $data->lsb_title;
		})
		->addColumn('waktu', function ($data) {
			$dt = Lab_sub_date::where('lsd_lsb_id', $data->lsb_id)->get();
			$res = $dt->implode('lsd_date', ', ');
			return $res;
			// return $res;
		})
		->addColumn('acc', function ($data) {
			$data = Lab_submission_acc::where('lsa_submission',$data->lsb_id)->where('lsa_rule','LAB_HEAD')->select('las_username')->get();
			$str = '';
			foreach ($data as $key => $value) {
				$str.= '<span class="badge bg-blue">Acc: '.$value->las_username.'</span>';
			}
			return '<div style="text-align:center;">'.$str.'</div>';
		})
		->addColumn('status',function ($data) {
			if ($data->lsb_status == 'menunggu') {
				$res = '<span class="badge bg-default">' . $data->lsb_status . '</span>';
			}elseif ($data->lsb_status == 'disetujui') {
				$res = '<span class="badge bg-green">' . $data->lsb_status . '</span>';
			}elseif ($data->lsb_status == 'ditolak') {
				$res = '<span class="badge bg-red">' . $data->lsb_status . '</span>';
			}elseif ($data->lsb_status == 'selesai') {
				$res = '<span class="badge bg-navy">' . $data->lsb_status . '</span>';
			}
			return '<div style="text-align:center;">' . $res . '</div>';
		})
		->rawColumns(['opsi', 'kegiatan', 'judul','acc' , 'status', 'waktu', 'pemohon', 'waktu_pengajuan'])
		->make(true);
	}
	public function sourceDataPengajuanArchive(Request $request)
	{
		$status = ['ditolak','selesai'];
		$user = authUser();
		if (rulesUser(['ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_HEAD'])) {
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->whereIn('lsb_status',$status)
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			->get();
		} elseif (rulesUser(['LAB_SUBHEAD'])) {
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			->whereIn('lsb_status', $status)
			->where('lsb_user_subhead', $user->id)
			->get();
		} elseif (rulesUser(['LAB_TECHNICIAN'])) {
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->where('lsb_user_tech', $user->id)
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			->whereIn('lsb_status', $status)
			->get();
		} elseif (rulesUser(['LECTURE'])) {
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->where('lsb_user_lecture', $user->id)
			->whereIn('lsb_status', $status)
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			->get();
		} elseif (rulesUser(['STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER'])) {
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->where('lsb_user_id', $user->id)
			->whereIn('lsb_status', $status)
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
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
					<li><a href="' . url('pengajuan/detail-pengajuan') . '/' . $data->lsb_id . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat Detail</a></li>
				</ul>
			</div></div>';
			})
			->addColumn('pemohon', function ($data) {
				return $data->name;
			})
			->addColumn('waktu_pengajuan', function ($data) {
				$date = date('d/m/Y', strtotime($data->lsb_created));
				return $date;
			})
			->addColumn('kegiatan', function ($data) {
				if ($data->lsb_activity == 'tp_penelitian') {
					$res = 'Penelitian';
				} elseif ($data->lsb_activity == 'tp_pelatihan') {
					$res = 'Pelatihan';
				} elseif ($data->lsb_activity == 'tp_pengabdian_masyarakat') {
					$res = 'Pengadian Masyarakat';
				} elseif ($data->lsb_activity == 'tp_magang') {
					$res = 'Magang';
				} else {
					$res = 'Lain-lain.';
				}
				return $res;
			})
			->addColumn('judul', function ($data) {
				return $data->lsb_title;
			})
			->addColumn('waktu', function ($data) {
				$dt = Lab_sub_date::where('lsd_lsb_id',$data->lsb_id)->get();
				$res = $dt->implode('lsd_date',', ');
				return $res;
			})
			->addColumn('acc', function ($data) {
				$data = Lab_submission_acc::where('lsa_submission', $data->lsb_id)->select('las_username')->get();
				$str = '';
				foreach ($data as $key => $value) {
					$str .= '<span class="badge bg-blue">Acc: ' . $value->las_username . '</span>';
				}
				return '<div style="text-align:center;">' . $str . '</div>';
			})
			->addColumn('status', function ($data) {
				if ($data->lsb_status == 'menunggu') {
					$res = '<span class="badge bg-default">' . $data->lsb_status . '</span>';
				} elseif ($data->lsb_status == 'disetujui') {
					$res = '<span class="badge bg-green">' . $data->lsb_status . '</span>';
				} elseif ($data->lsb_status == 'ditolak') {
					$res = '<span class="badge bg-red">' . $data->lsb_status . '</span>';
				} elseif ($data->lsb_status == 'selesai') {
					$res = '<span class="badge bg-navy">' . $data->lsb_status . '</span>';
				}
				return '<div style="text-align:center;">' . $res . '</div>';
			})
			->rawColumns(['opsi', 'kegiatan', 'judul', 'acc', 'status', 'waktu', 'pemohon', 'waktu_pengajuan'])
			->make(true);
	}
	public function sourceDataPengajuanAdditional(Request $request)
	{
		$user = Auth::user();
		if (rulesUser(['LECTURE'])) {
			# code...
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
			->where('lsb_user_id',$user->id)
			->get();
		} else {
			# code...
			$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->select('lsb_id', 'name', 'lab_submissions.created_at as lsb_created', 'lsb_activity', 'lsb_title', 'lsb_status', 'lsb_date_start', 'lsb_date_end')
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
					<li><a href="' . url('pengajuan/detail-pengajuan') . '/' . $data->lsb_id . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat Detail</a></li>
				</ul>
			</div></div>';
		})
		->addColumn('pemohon', function ($data) {
			return $data->name;
		})
		->addColumn('waktu_pengajuan', function ($data) {
			$date = date('d/m/Y', strtotime($data->lsb_created));
			return $date;
		})
		->addColumn('kegiatan', function ($data) {
			if ($data->lsb_activity == 'tp_penelitian') {
				$res = 'Penelitian';
			} elseif ($data->lsb_activity == 'tp_pelatihan') {
				$res = 'Pelatihan';
			} elseif ($data->lsb_activity == 'tp_pengabdian_masyarakat') {
				$res = 'Pengadian Masyarakat';
			} elseif ($data->lsb_activity == 'tp_magang') {
				$res = 'Magang';
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
			$res = $dt1 . '  <b>s/d</b>  ' . $dt2;
			return $res;
		})
		->addColumn('acc', function ($data) {
			$data = Lab_submission_acc::where('lsa_submission', $data->lsb_id)->select('las_username')->get();
			$str = '';
			foreach ($data as $key => $value) {
				$str .= '<span class="badge bg-blue">Acc: ' . $value->las_username . '</span>';
			}
			return '<div style="text-align:center;">' . $str . '</div>';
		})
		->addColumn('status', function ($data) {
			if ($data->lsb_status == 'menunggu') {
				$res = '<span class="badge bg-default">' . $data->lsb_status . '</span>';
			} elseif ($data->lsb_status == 'disetujui') {
				$res = '<span class="badge bg-green">' . $data->lsb_status . '</span>';
			} elseif ($data->lsb_status == 'ditolak') {
				$res = '<span class="badge bg-red">' . $data->lsb_status . '</span>';
			} elseif ($data->lsb_status == 'selesai') {
				$res = '<span class="badge bg-navy">' . $data->lsb_status . '</span>';
			}
			return '<div style="text-align:center;">' . $res . '</div>';
		})
		->rawColumns(['opsi', 'kegiatan', 'judul', 'acc', 'status', 'waktu', 'pemohon', 'waktu_pengajuan'])
		->make(true);
	}
	public function sourceDataFasilitasLab(Request $request)
	{
		// $data = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		// ->where('laf_laboratorium',$request->lab_id)
		// ->get();
		$data = Laboratory_facility::where('laf_laboratorium',$request->lab_id)
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
				<li><a href="' . url('laboratorium/form-update-fasilitas/' . $data->laf_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="#" onclick="actDeleteFacility('. $data->laf_id.')" ><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Hapus</a></li>
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
	public function sourceDataTestLab(Request $request)
	{
		// $data = Laboratory_facility::join('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		// ->where('laf_laboratorium', $request->lab_id)
		// ->get();
		$data = Laboratory_labtest::where('lsv_lab_id',$request->lab_id)->get();
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
				<li><a href="' . url('laboratorium/detail-ujilab/' . $data->lsv_id) . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Detail Uji Lab</a></li>
				<li><a href="' . url('laboratorium/form-update-ujilab/' . $data->lsv_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="#" onclick="actDeleteFacility(' . $data->lvs_id . ')"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Hapus</a></li>
			</ul>
		</div></div>';
		})
		->addColumn('name', function ($data) {
			$res = $data->lsv_name;
			return $res;
		})
		->addColumn('notes', function ($data) {
			$res = $data->lsv_notes;
			return $res;
		})
		->addColumn('utility', function ($data) {
			$data_utlity = Laboratory_labtest_facility::join('laboratory_facilities', 'laboratory_labtest_facilities.lst_facility','=', 'laboratory_facilities.laf_id')
			->where('lst_lsv_id',$data->lsv_id)->select('laf_name')->get();
			$res ='';
			foreach ($data_utlity as $key => $value) {
				$res.='- '.$value->laf_name.'<br>';
			}
			return $res;
		})
		->addColumn('price', function ($data) {
			$res = $data->lsv_price;
			return $res;
		})
		->rawColumns(['opsi', 'name', 'notes', 'utility','price'])
		->make(true);
	}
	/* Tags:... */
	public function sourceDataScheduleLab(Request $request)
	{
		$s = $request->dtStart;
		$e = $request->dtEnd;
		$lab_id = $request->lab_id;
		// $s = date('Y-m-d',strtotime('2024-05-29'));
		// $e = date('Y-m-d', strtotime('2024-07-05'));
		// $lab_id = 58;
		$dtStart =Carbon::parse(date('Y-m-d', strtotime($s)))->format('Y-m-d');
		$dtEnd = Carbon::parse(date('Y-m-d', strtotime($e)))->format('Y-m-d');
		$period = CarbonPeriod::create($dtStart, $dtEnd);
		foreach ($period as $key => $value) {
			$dateFormated = date('Y-m-d',strtotime($value));
			$dayFormated = date('l', strtotime($value));
			$datesAr[$key] = $dateFormated;
		}
		$data_non_reguler = Lab_schedule::join('lab_sch_dates', 'lab_schedules.lbs_id','=', 'lab_sch_dates.lscd_sch')
		->leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		->whereIn('lscd_date', $datesAr)
		->where('lbs_lab', $lab_id)
		->where('lbs_type', 'non_reguler')
		->get();
		$sch_index = 0;
		$dataSch = [];
		foreach ($datesAr as $key => $value) {
			$day = date('l',strtotime($value));
			$data_reguler = Lab_schedule::join('lab_sch_dates', 'lab_schedules.lbs_id', '=', 'lab_sch_dates.lscd_sch')
			->leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
			->where('lscd_day', $day)
			->where('lbs_lab', $lab_id)
			->where('lbs_type', 'reguler')
			->get();
			foreach ($data_reguler as $skey => $svalue) {
				$ddate = date('l, d-m-Y',strtotime($value));
				$dataSch[$sch_index] = [
					'date_index' => $value,
					'date' => $ddate,
					'date_id' => $svalue->lscd_id,
					'lab_id' => $svalue->lbs_lab,
					'lbs_id' => $svalue->lbs_id,
					'lbs_submission' =>	$svalue->lbs_submission,
					'subject' => $svalue->lbs_matkul,
					'group' =>  $svalue->lbs_tenant_name,
					'person' => $svalue->name,
					'type' => 'Reguler',
					'type_par' => $svalue->lbs_type,
				];
				$sch_index++;
			}
		}
		foreach ($data_non_reguler as $key => $value) {
			$ddate = date('l, d-m-Y', strtotime($value->lscd_date));
			$dataSch[$sch_index] = [
				'date_index' => $value->lscd_date,
				'date' => $ddate,
				'date_id' => $value->lscd_id,
				'lab_id' => $value->lbs_lab,
				'lbs_id' => $value->lbs_id,
				'lbs_submission' =>	$value->lbs_submission,
				'subject' => $value->lbs_matkul,
				'group' =>  $value->lbs_tenant_name,
				'person' => $value->name,
				'type' => 'Non Reguler',
				'type_par' => $value->lbs_type,
			];
			$sch_index++;
		}
		if (count($dataSch) == 0) {
			return DataTables::of($dataSch)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {})
			->addColumn('opsi', function ($dataSch) {})
			->addColumn('day', function ($dataSch) {})
			->addColumn('time', function ($dataSch) {})
			->addColumn('type', function ($dataSch) {})
			->addColumn('subject', function ($dataSch) {})
			->addColumn('group', function ($dataSch) {})
			->addColumn('person', function ($dataSch) {})
			->rawColumns(['opsi', 'day', 'time', 'type', 'subject', 'group', 'person'])
			->make(true);
		}else{
			usort($dataSch, function ($a, $b) {
				return strtotime($a['date_index']) - strtotime($b['date_index']);
			});
			return DataTables::of($dataSch)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {
				return '';
			})
			->addColumn('opsi', function ($dataSch) {
				if ($dataSch['type_par'] == 'reguler') {
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
				} else {
					return ' <div style="text-align:center;">
				<div class="btn-group">
					<button class="btn btn-flat btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Menu <span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">
						<li><a href="' . url('pengajuan/detail-pengajuan/' . $dataSch['lbs_submission']) . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat Detail</a></li>
					</ul>
				</div></div>';
				}
			})
			->addColumn('day', function ($dataSch) {
				$res = $dataSch['date'];
				return $res;
			})
			->addColumn('time', function ($dataSch) {
				if ($dataSch['date_id'] == null) {
					$res = null;
				}else{
					$data = Lab_sch_time::join('laboratory_time_options', 'lab_sch_times.lsct_time_id','=', 'laboratory_time_options.lti_id')
					->where('lsct_date_id',$dataSch['date_id'])
					->get();
					$res='';
					foreach ($data as $key => $value) {
						$res.= '<b>-</b> '.date('H:i',strtotime($value->lti_start)). '-' . date('H:i', strtotime($value->lti_end)) . '<br>';
					}
				}
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
				$res = $dataSch['person'];
				return $res;
			})
			->addColumn('date', function ($dataSch) {
				$res = $dataSch['date'];
				return $res;
			})
			->rawColumns(['opsi','day' ,'time', 'type', 'subject', 'group','person','date'])
			->make(true);
		}
	}
	public function sourceDataScheduleLabReguler(Request $request)
	{
		$lab_id = $request->lab_id;
		// $lab_id = 58;
		$dataSch = [];
		$data_reguler = Lab_schedule::join('lab_sch_dates', 'lab_schedules.lbs_id', '=', 'lab_sch_dates.lscd_sch')
		->leftjoin('users', 'lab_schedules.lbs_res_person', '=', 'users.id')
		->where('lbs_lab', $lab_id)
		->where('lbs_type', 'reguler')
		->get();
		foreach ($data_reguler as $skey => $svalue) {
			$dataSch[$skey] = [
				'date_id' => $svalue->lscd_id,
				'day' => $svalue->lscd_day,
				'lab_id' => $svalue->lbs_lab,
				'lbs_id' => $svalue->lbs_id,
				'subject' => $svalue->lbs_matkul,
				'group' =>  $svalue->lbs_tenant_name,
				'person' => $svalue->name,
				'type' => 'Reguler',
				'type_par' => $svalue->lbs_type,
			];
		};
		if (count($dataSch) == 0) {
			return DataTables::of($dataSch)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {})
			->addColumn('opsi', function ($dataSch) {})
			->addColumn('day', function ($dataSch) {})
			->addColumn('time', function ($dataSch) {})
			->addColumn('type', function ($dataSch) {})
			->addColumn('subject', function ($dataSch) {})
			->addColumn('group', function ($dataSch) {})
			->addColumn('person', function ($dataSch) {})
			->rawColumns(['opsi', 'day', 'time', 'type', 'subject', 'group', 'person'])
			->make(true);
		}else{
			usort($dataSch, function ($a, $b) {
				return strtotime($a['date_index']) - strtotime($b['date_index']);
			});
			// dd($dataSch);
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
					<li><a href="' . url('jadwal_lab/update-jadwal-lab/'. $dataSch['lab_id'].'/'. $dataSch['lbs_id']) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
					<li><a href="#" onclick="actDeleteSchLab('. $dataSch['lbs_id'].')"><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Delete</a></li>
				</ul>
			</div></div>';
			})
			->addColumn('day', function ($dataSch) {
				$res = $dataSch['day'];
				return $res;
			})
			->addColumn('time', function ($dataSch) {
				if ($dataSch['date_id'] == null) {
					$res = null;
				}else{
					$data = Lab_sch_time::join('laboratory_time_options', 'lab_sch_times.lsct_time_id','=', 'laboratory_time_options.lti_id')
					->where('lsct_date_id',$dataSch['date_id'])
					->get();
					$res='';
					foreach ($data as $key => $value) {
						$res.= '<b>-</b> '.date('H:i',strtotime($value->lti_start)). '-' . date('H:i', strtotime($value->lti_end)) . '<br>';
					}
				}
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
				$res = $dataSch['person'];
				return $res;
			})
			->rawColumns(['opsi','day' ,'time', 'type', 'subject', 'group','person'])
			->make(true);
		}
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
	public function sourceDataLabSchedule(Request $request)
	{
		$user = Auth::user();
		if (rulesUser(['ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_HEAD'])) {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->get();
		} elseif (rulesUser(['LAB_SUBHEAD'])) {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('id', $user->id)
				->get();
		} elseif (rulesUser(['LAB_TECHNICIAN'])) {
			$data = Laboratory::join('laboratory_technicians', 'laboratories.lab_id', '=', 'laboratory_technicians.lat_laboratory')
			->leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('lat_tech_id', $user->id)
			->get();
		} else {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->get();
		}
		return DataTables::of($data)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {
				return '';
			})
			->addColumn('opsi', function ($data) {
				return '<a href="'.url('jadwal_lab/'. $data->lab_id).'">
				<button class="btn btn-block btn-flat btn-default btn-xs " type="button" > <b>Lihat Jadwal</b></button></a>';
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
					$res = '<div style="text-align:center;"><span class="badge bg-green">' . strLabStatus($data->lab_status) . '</span>';
				} elseif ($data->lab_status == 'tidak_tersedia') {
					$res = '<div style="text-align:center;"><span class="badge bg-yellow">' . strLabStatus($data->lab_status) . '</span>';
				} else {
					$res = '<div style="text-align:center;"><span class="badge bg-default">Not Set</span>';
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
	public function sourceDataLabSub(Request $request)
	{
		$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->get();
		return DataTables::of($data)
			->addIndexColumn()
			->addColumn('empty_str', function ($k) {
				return '';
			})
			->addColumn('opsi', function ($data) {
				if ($data->lab_status == 'tersedia') {
					return '<a href="' . url('pengajuan/laboratorium/form-pengajuan-pinjam/' . $data->lab_id) . '">
					<button class="btn btn-block btn-flat btn-default btn-xs " type="button" > <b>Pinjam Laboratorium</b></button></a>';
				}else{
					return '<a href="#">
					<button class="btn btn-block btn-flat btn-default btn-xs " type="button" disabled> <b>Pinjam Laboratorium</b></button></a>';
				}
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
					$res = '<div style="text-align:center;"><span class="badge bg-green">' . strLabStatus($data->lab_status) . '</span>';
				} elseif ($data->lab_status == 'tidak_tersedia') {
					$res = '<div style="text-align:center;"><span class="badge bg-yellow">' . strLabStatus($data->lab_status) . '</span>';
				} else {
					$res = '<div style="text-align:center;"><span class="badge bg-default">Not Set</span>';
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
	/* Tags:... */public function sourceDataLabFacility(Request $request)
	{
		$user = Auth::user();
		if (rulesUser(['ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_HEAD'])) {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->get();
		} elseif (rulesUser(['LAB_SUBHEAD'])) {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('id', $user->id)
				->get();
		} elseif (rulesUser(['LAB_TECHNICIAN'])) {
			$data = Laboratory::join('laboratory_technicians', 'laboratories.lab_id', '=', 'laboratory_technicians.lat_laboratory')
			->leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->where('lat_tech_id', $user->id)
				->get();
		} else {
			$data = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
			->get();
		}
		return DataTables::of($data)
		->addIndexColumn()
		->addColumn('empty_str', function ($k) {
			return '';
		})
		->addColumn('opsi', function ($data) {
			return '<a href="' . url('fasilitas_lab/' . $data->lab_id) . '">
				<button class="btn btn-block btn-flat btn-default btn-xs " type="button" > <b>Lihat Fasilitas Laboratorium</b></button></a>';
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
				$res = '<div style="text-align:center;"><span class="badge bg-green">' . strLabStatus($data->lab_status) . '</span>';
			} elseif ($data->lab_status == 'tidak_tersedia') {
				$res = '<div style="text-align:center;"><span class="badge bg-yellow">' . strLabStatus($data->lab_status) . '</span>';
			} else {
				$res = '<div style="text-align:center;"><span class="badge bg-default">Not Set</span>';
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
	public function sourceDataFasilitas(Request $request)
	{
		$data = Laboratory_facility::leftjoin('laboratory_facility_count_statuses', 'laboratory_facilities.laf_id', '=', 'laboratory_facility_count_statuses.lcs_facility')
		->where('laf_laboratorium', $request->lab_id)
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
				<li><a href="' . url('fasilitas_lab/detail-fasilitas/' . $data->laf_id) . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Detail Alat/Fasilitas</a></li>
				<li><a href="' . url('fasilitas_lab/form-update-fasilitas/' . $data->laf_id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update</a></li>
				<li><a href="#" onclick="actDeleteFacility(' . $data->laf_id . ')" ><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Hapus</a></li>
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
	public function sourceDataUsers(Request $request)
	{
		$data = User::leftjoin('user_details','users.id','=', 'user_details.usd_user')
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
				<li><a href="' . url('pengaturan/user-detail/' . $data->id) . '"><i class="ri-edit-2-line" aria-hidden="true" style="margin-right:12px;"></i>Detail User</a></li>
					<li><a href="' . url('pengaturan/user-detail/form-update-user/' . $data->id) . '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Update User</a></li>
					<li><a href="#" onclick="actBlockUser(' . $data->id . ')" ><i class="ri-delete-bin-line" aria-hidden="true" style="margin-right:12px;"></i>Block</a></li>
				</ul>
			</div></div>';
		})
		->addColumn('name', function ($data) {
			$res = $data->name;
			return $res;
		})
		->addColumn('no_id', function ($data) {
			$res = $data->no_id;
			return $res;
		})
		->addColumn('email', function ($data) {
			$res = $data->email;
			return $res;
		})
		->addColumn('level', function ($data) {
			$res = $data->level;
			return $res;
		})
		->rawColumns(['opsi', 'name', 'no_id', 'email','level'])
		->make(true);
	}
}
