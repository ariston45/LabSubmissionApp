<?php

namespace App\Http\Controllers;

use App\Models\Cost_reduction;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use App\Models\Lab_schedule;
use App\Models\Lab_submission;
use App\Models\Laboratory;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_detail;
use Auth;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Str;
use Http;
use PhpParser\Node\Expr\Isset_;
use PhpParser\Node\Expr\New_;

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
	public function sourceDataUserLectures(Request $request)
	{
		$users = User::whereIn('level',['LECTURE','LAB_HEAD','LAB_SUBHEAD', 'LAB_TECHNICIAN'])->get();
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
			return Storage::download('public/data_laporan/' . $request->filename);
		} catch (\Throwable $th) {
			return redirect()->back()->withErrors(['file_laporan_err' => 'File tidak tersedia.']);
		}
	}
	/* Tags:... */
	public function sourceDataAllLab(Request $request)
	{
		$data = Laboratory::get();
		$res[0] = ['id' => 'all', 'title' => 'Semua Lab'];
		$i = 1;
		foreach ($data as $key => $value) {
			$res[$i] = [
				'id' => $value->lab_id,
				'title' => $value->lab_name
			];
			$i++;
		}
		$data_json = json_encode($res);
		return $data_json;
	}
	public function sourceDataLab(Request $request)
	{
		$user = Auth::user();
		if ($user->level == 'LAB_HEAD') {
			# code...
			$data = Laboratory::get();
		} elseif($user->level == 'LAB_SUBHEAD') {
			# code...
			$data = Laboratory::where('lab_head',$user->id)->get();
		}
		
		$res[0] = ['id' => 'all', 'title' => 'Semua Lab'];
		$i = 1;
		foreach ($data as $key => $value) {
			$res[$i] = [
				'id' => $value->lab_id,
				'title' => $value->lab_name
			];
			$i++;
		}
		$data_json = json_encode($res);
		return $data_json;
	}
	/* Tags:... */
	public function sourceMonthOnDashboard(Request $request)
	{
		$subDate = Carbon::now()->subMonths(3);
		$addDate = Carbon::now()->addMonths(3);
		$period = CarbonPeriod::create($subDate, '1 month', $addDate);
		$months = [];
		foreach ($period as $key_a => $date) {
			$months[$key_a] = date('F',strtotime($date));
			$month_item = date('m',strtotime($date));
			$data_submission['tp_penelitian'][$key_a] = Lab_submission::whereMonth('lsb_date_start',$month_item)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_activity', 'tp_penelitian')
			->count();
			$data_submission['tp_pelatihan'][$key_a] = Lab_submission::whereMonth('lsb_date_start', $month_item)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_activity', 'tp_pelatihan')
			->count();
			$data_submission['tp_pengabdian_masyarakat'][$key_a] = Lab_submission::whereMonth('lsb_date_start', $month_item)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_activity', 'tp_pengabdian_masyarakat')
			->count();
			$data_submission['tp_magang'][$key_a] = Lab_submission::whereMonth('lsb_date_start', $month_item)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_activity', 'tp_magang')
			->count();
			$data_submission['tp_lain_lain'][$key_a] = Lab_submission::whereMonth('lsb_date_start', $month_item)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_activity', 'tp_lain_lain')
			->count();
		}
		$start_date = $subDate->startOfMonth();
		$end_date = $addDate->endOfMonth();
		$str_title = $start_date->format('d M, Y').' - '. $end_date->format('d M, Y');
		$res = [
			"title" => $str_title,
			"label" => $months,
			"data" => $data_submission
		];
		return $res;
	}
	/* Tags:... */
	public function sourceDataLabs(Request $request)
	{
		if ($request->group == 'all' || $request->group == null) {
			# code...
			$data = Laboratory::join('laboratory_groups','laboratories.lab_group','=', 'laboratory_groups.lag_id')
			->get();
		}else{
			$data = Laboratory::join('laboratory_groups', 'laboratories.lab_group', '=', 'laboratory_groups.lag_id')
			->where('lag_id',$request->group)
			->get();
		}
		$res[0] = ['id' => null, 'title' => null];
		$web_data ='';
		if ($data->count() == 0) {
			$web_data .= '<div class="col-sm-12 p-4" style="margin-bottom:20px; color:#0b4d70;text-align: center;">Data Tidak Ditemukan</div>';
		} else {
			# code...
			foreach ($data as $key => $value) {
				$web_data.= '
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px;">
				<div class="course-item">';
				if($value->lab_img == null){
					$web_data.= '<img src="' . url('public/assets/img/img_placeholder.png') . '" class="img-fluid" alt="...">';
				}else{
					$web_data .= '<img src="' . url('/storage/image_lab/'. $value->lab_img ) . '" class="img-fluid" alt="...">';
				}
				$web_data .= '<div class="course-content" style="color: #495057;">
				<p style="color:#0b4d70;">'.$value->lab_name. '</p>
				<div class="description">'.$value->lab_note_short.'</div>
				<div class="d-flex justify-content-between align-items-center mb-3">
				<a href="'.url('page-laboratorium/detail-laboratorium/'. $value->lab_id).'">
				<p class="category">Detail</p>
				</a></div></div></div></div><br>';
			}
		}
		
		return $web_data;
	}
	public function sourceDataLabsFind(Request $request)
	{
		if ($request->group == 'all' || $request->group == null) {
			# code...
			$data = Laboratory::join('laboratory_groups', 'laboratories.lab_group', '=', 'laboratory_groups.lag_id')
			->where('lab_name','like','%'.$request->find.'%')
			->get();
		} else {
			$data = Laboratory::join('laboratory_groups', 'laboratories.lab_group', '=', 'laboratory_groups.lag_id')
			->where('lag_id', $request->group)
			->where('lab_name', 'like', '%' . $request->find . '%')
			->get();
		}
		$res[0] = ['id' => null, 'title' => null];
		$web_data = '';
		if ($data->count() == 0) {
			$web_data .= '<div class="col-sm-12 p-4" style="margin-bottom:20px; color:#0b4d70;text-align: center;">Data Tidak Ditemukan</div>';
		} else {
			# code...
			foreach ($data as $key => $value) {
				$web_data .= '
				<div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px;">
				<div class="course-item">';
				if ($value->lab_img == null) {
					$web_data .= '<img src="' . url('public/assets/img/img_placeholder.png') . '" class="img-fluid" alt="...">';
				} else {
					$web_data .= '<img src="' . url('/storage/image_lab/' . $value->lab_img) . '" class="img-fluid" alt="...">';
				}
				$web_data .= '<div class="course-content" style="color: #495057;">
				<p style="color:#0b4d70;">' . $value->lab_name . '</p>
				<p class="description">' . $value->lab_note_short . '</p>
				<div class="d-flex justify-content-between align-items-center mb-3">
				<a href="' . url('page-laboratorium/detail-laboratorium/' . $value->lab_id) . '">
				<p class="category">Detail</p>
				</a></div></div></div></div><br>';
			}
		}
		
		return $web_data;
	}
	/* Tags:... */
	public function sourceDataLabTest(Request $request)
	{
		$data = null;
		if ($request->group == 'all' && $request->labs == 'all') {
			$data = Laboratory::join('laboratory_labtests', 'laboratories.lab_id', '=', 'laboratory_labtests.lsv_lab_id')
			->get();
		} elseif ($request->group != 'all' && $request->labs == 'all') {
			$data = Laboratory::join('laboratory_labtests', 'laboratories.lab_id', '=', 'laboratory_labtests.lsv_lab_id')
			->where('lab_group', $request->group)
			->get();
		} elseif ($request->group == 'all' && $request->labs != 'all') {
			$data = Laboratory::join('laboratory_labtests', 'laboratories.lab_id', '=', 'laboratory_labtests.lsv_lab_id')
			->where('lab_id', $request->labs)
			->get();
		} else {
			$data = Laboratory::join('laboratory_labtests', 'laboratories.lab_id', '=', 'laboratory_labtests.lsv_lab_id')
			->where('lab_group', $request->group)
			->where('lab_id', $request->labs)
			->get();
		}
		if ($request->find == null) {
			$data_filter = $data;
		} else {
			$str = $request->find;
			$data_filter = $data->filter(function ($item) use ($str) {
				return stripos($item->lsv_name, $str) !== false;
			});
		}
		$web_data = null;
		if ($data_filter->count() == 0) {
			$web_data .= '<div class="col-sm-12 p-4" style="margin-bottom:20px; color:#0b4d70;text-align: center;">Data Tidak Ditemukan</div>';
		} else {
			# code...
			foreach ($data_filter as $key => $value) {
				$web_data .= '
				<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px;">
				<div class="course-item">';
				if ($value->lsv_img == null) {
					$web_data .= '<img src="' . url('public/assets/img/img_placeholder.png') . '" class="img-fluid" alt="...">';
				} else {
					$web_data .= '<img src="' . url('/storage/image_lab/' . $value->lsv_img) . '" class="img-fluid" alt="...">';
				}
				$web_data .= '<div class="course-content" style="color: #495057;">
				<p style="color:#0b4d70;">' . $value->lsv_name . '</p>
				<p class="description">' . $value->lsv_notes_short . '</p>
				<div class="d-flex justify-content-between align-items-center mb-3">
				<a href="' . url('page-layanan/detail-uji-lab/' . $value->lsv_id) . '">
				<p class="category">Detail</p>
				</a></div></div></div></div><br>';
			}
		}
		echo $web_data;
		// return $web_data;
	}
	/* Tags:... */
	public function sourceDataFilterLab(Request $request)
	{
		if ($request->group == 'all') {
			$data_lab = Laboratory::get();
		} else {
			$data_lab = Laboratory::where('lab_group',$request->group)->get();
		}
		$res = array();
		$res[0] =[
			'id' => 'all',
			'name' => 'Semua Lab'
		];
		$i = 1;
		foreach ($data_lab as $key => $value) {
			$res[$i] = [
				'id' => $value->lab_id,
				'name' => $value->lab_name
			];
			$i++;
		}
		return $res;
	}

	/* Tags:... */
	public function sourceDataStudent(Request $request)
	{
		$getjson = Http::acceptJson()->get('https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089')->throw()->json();
		$laravelcollection = collect($getjson)->values();
		return $laravelcollection;
	}
	public function sourceDataLecture(Request $request)
	{
		$getjson = Http::acceptJson()->get('https://i-sdm.unesa.ac.id/api/dosen-ft-email')->throw()->json();
		$laravelcollection = collect($getjson)->values();
		return $laravelcollection;
	}
	/* Tags:... */
	public function sourceDataLectureMig(Request $request)
	{
		$getjson = Http::acceptJson()->get('https://i-sdm.unesa.ac.id/api/dosen-ft-email')->throw()->json();
		$laravelcollection = collect($getjson)->values();
		$id = genIdUser();
		foreach ($laravelcollection as $key => $value) {
			$usr[$key] = [
				"id" => $id,
				"no_id" => $value['nidn'],
				"name" =>$value['nama'],
				"email" => $value['email'],
				"password" => bcrypt("open@123")
			];
			$usd[$key] = [
				"usd_user" => $id,
				"usd_prodi" => $value['prodi'],
				"usd_fakultas" => "Fakultas Teknik",
				"usd_universitas" => 'Universitas Negeri Surabaya'
			];
			$id++;
		}
		User::insert($usr);
		User_detail::insert($usd);
	}
	/* Tags:... */
	public function checkDataStudent(Request $request)
	{
		$id = $request->nim;
		$data = getDataStudent($id);
		$data_lecture = getDataLectures();
		$n1 = $data_lecture->where('nama', 'Octaverina Kecvara Pritasari, S.Pd., M.Farm.');
		// foreach ($n1 as $key => $value) {
		// 	$nidn1 = $value['nidn'].'<br>';
		// }
		$web=null;
		if (count($data) == 0) {
			$web.= '<div class="col-md-offset-3 col-md-9 col-sm-12 dinamic-data-inp-1" style="color:red;"> Data simontasi belum tersedia.</div>';
			return $web;
		}
		foreach ($data as $key => $value) {
			$web .= '
				<div id="input-promotor" class="form-group dinamic-data-inp-1" >
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Judul
            </span>
          </label>
					<div class="col-sm-12 col-md-9 control-label" style="text-align: left;">
            <b>' . $value['judul'] . '</b>
            <input type="hidden" name="inp_judul" value="' . $value['judul']. '">
          </div>
        </div>';
				// 
			if(Isset($value['pembimbing'])){
				$n1 = $data_lecture->where('nama', $value['pembimbing']['nama'])->first();
				$web .= '
				<div id="input-promotor" class="form-group dinamic-data-inp-1" >
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Pembimbing
            </span>
          </label>
					<div class="col-sm-12 col-md-9 control-label" style="text-align: left;">
            <b>'. $value['pembimbing']['nama'].'</b>
            <input type="hidden" name="inp_pembimbing" value="' . $value['pembimbing']['nama'] . '">
						<input type="hidden" name="inp_pembimbing_nip" value="' . $value['pembimbing']['nip'] . '">
						<input type="hidden" name="inp_pembimbing_no_id" value="' . $n1['nidn'] . '">
          </div>
        </div>';
			}else{
				$web.=null;
			}
			// 
			if (isset($value['promotor'])) {
				$n2 = $data_lecture->where('nama', $value['pembimbing']['nama'])->first();
				$web.= '
				<div id="input-promotor" class="form-group dinamic-data-inp-1" >
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Promotor
            </span>
          </label>
          <div class="col-sm-12 col-md-9 control-label" style="text-align: left;">
						<b>'.$value['promotor']['nama'].'</b>
            <input type="hidden" name="inp_promotor" value="'. $value['promotor']['nama']. '">
						<input type="hidden" name="inp_promotor_nip" value="' . $value['promotor']['nip'] . '">
						<input type="hidden" name="inp_promotor_no_id" value="' . $n2['nidn'] . '">
          </div>
        </div>';
			} else {
				$web .= null;
			}
			// 
			if (isset($value['kopromotor'])) {
				$n3 = $data_lecture->where('nama', $value['pembimbing']['nama'])->first();
				$web .= '
				<div id="input-kopromotor" class="form-group dinamic-data-inp-1" >
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Kopromotor
            </span>
          </label>
          <div class="col-sm-12 col-md-9 control-label" style="text-align: left;">
						<b>'.$value['kopromotor']['nama'].'</b>
            <input type="hidden" name="inp_kopromotor" value="' . $value['kopromotor']['nama'] . '">
						<input type="hidden" name="inp_kopromotor_nip" value="' . $value['kopromotor']['nip'] . '">
						<input type="hidden" name="inp_kopromotor_no_id" value="' . $n3['nama'] . '">
          </div>
        </div>';
			} else {
				$web .= null;
			}
			// 
		}
		return $web;
	}
	/* Tags:... */
	public function viewLabCostTables(Request $request)
	{
		$activity = $request->activity;
		$user = DataAuth();
		$data_lab = Laboratory::where('lab_id',$request->lab_id)->first();
		$web=null;
		if ($user->level == 'STUDENT') {
			$data_reduce = Cost_reduction::where('reduction_usr_level', 'STUDENT')
			->where('reduction_act_cat', $activity)
			->first();
			if ($activity == 'tp_penelitian_skripsi') {
			}else{
				$data_reduce = null;
			}
			$web.='<table class="table-bordered tabel_custom" style="width: 100%;">
				<thead>
					<tr>
						<th style="width: 5%; text-align: center;">No</th>
						<th style="width: 65%; text-align: center;">Nama Laboratorium/Fasilitas/Alat</th>
						<th style="width: 30%;text-align: center;">Biaya Pinjam</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td colspan="2"><b>Laboratorium</b></td>
					</tr>
					<tr>
						<td style="width: 5%; text-align: center;">1</td>
						<td>'.$data_lab->lab_name.'</td>
						<td style="width: 5%; text-align: center;">'. funCurrencyRupiah($data_lab->lab_rent_cost). '</td>
					</tr>
					<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td colspan="2"><b>Fasilitas Dan Alat</b></td>
					</tr>
					<tr>
						<td style="width: 5%; text-align: center;">-</td>
						<td>-</td>
						<td style="width: 5%; text-align: center;">-</td>
					</tr>
					<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td colspan="2"><b>Potongan Biaya</b></td>
					</tr>';
					if ($activity == 'tp_penelitian_skripsi') {
						$web='<tr>
							<td style="width: 5%; text-align: center;">1</td>
							<td>'.$data_reduce->reduction_name.'</td>
							<td style="width: 5%; text-align: center;">'. $data_reduce->reduction_val.'</td>
						</tr>';
					}else{
					$web='<tr>
							<td style="width: 5%; text-align: center;">-</td>
							<td>-</td>
							<td style="width: 5%; text-align: center;">-</td>
						</tr>';
					}
					$web ='<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td> <b>Total Biaya</b> </td>
						<td style="width: 5%; text-align: center;">' . funCurrencyRupiah($data_lab->lab_rent_cost) . '</td>
					</tr>
				</tbody>
			</table>';
		}
		return $web;
	}
	public function viewFacilityCostTables(Request $request)
	{
		$user = Auth::user();
		$ids_facility = $request->lab_facility;
		$activity = $request->activity;
		$data_lab = Laboratory::where('lab_id', $request->lab_id)->first();
		if ($ids_facility == null) {
			$data_facility = [];
		} else {
			$data_facility = Laboratory_facility::whereIn('laf_id',$ids_facility)->get();
		}
		
		$web = null;
		$web .= '
		<table class="table-bordered tabel_custom" style="width: 100%;">
			<thead>
				<tr>
					<th style="width: 5%; text-align: center;">No</th>
					<th style="width: 65%; text-align: center;">Nama Laboratorium/Fasilitas/Alat</th>
					<th style="width: 30%;text-align: center;">Biaya Pinjam</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td colspan="2"><b>Laboratorium</b></td>
				</tr>
				<tr>
					<td style="width: 5%; text-align: center;">1</td>
					<td>' . $data_lab->lab_name . '</td>
					<td style="width: 5%; text-align: center;">' . funCurrencyRupiah($data_lab->lab_rent_cost) . '</td>
				</tr>
				<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td colspan="2"><b>Fasilitas Dan Alat</b></td>
				</tr>';
				$no = 1;
				$facility_cost_total=[];
				if ($data_facility != null) {
					foreach ($data_facility as $key => $value) {
						$facility_cost_total[$key] = $value->laf_value;
						$web.= '
						<tr>
							<td style="width: 5%; text-align: center;">'.$no.'</td>
							<td>' . $value->laf_name . '</td>
							<td style="width: 5%; text-align: center;">'. funCurrencyRupiah($value->laf_value).'</td>
						</tr>';
						$no++;
					}
				}
				if ($user->level == 'STUDENT') {
					if ($activity == 'tp_lainnya') {
						echo "test";
					}else{
						$reduction = Cost_reduction::where('reduction_type', 'STUDENT')->first();
						$data_cost_total = $data_lab->lab_rent_cost + array_sum($facility_cost_total);
						if ($reduction->reduction_val == 0) {
							$data_reduction = $data_cost_total;
						} else {
							$data_reduction = ($reduction->reduction_val/100)* $data_cost_total;
						}
						
						$data_cost_total_reduction = $data_cost_total - $data_reduction;
						$web.='<tr>
							<td style="width: 5%; text-align: center;"></td>
							<td> <b>Potongan ('.$reduction->reduction_val.'%)</b> </td>
							<td style="width: 5%; text-align: center;"><b>'. funCurrencyRupiah($data_reduction). '</b></td>
						</tr>';
					}
				}elseif($user->level == 'LECTURE'){
					$reduction = Cost_reduction::where('reduction_type', 'LECTURE')->first();
					$data_cost_total = $data_lab->lab_rent_cost + array_sum($facility_cost_total);
					if ($reduction->reduction_val == 0) {
						$data_reduction = $data_cost_total;
					} else {
						$data_reduction = ($reduction->reduction_val / 100) * $data_cost_total;
					}
					$data_reduction = ($reduction->reduction_val/100)* $data_cost_total;
					$data_cost_total_reduction = $data_cost_total - $data_reduction;
					$web.='<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td> <b>Potongan ('.$reduction->reduction_val.'%)</b> </td>
						<td style="width: 5%; text-align: center;"><b>'. funCurrencyRupiah($data_reduction). '</b></td>
					</tr>';
				}else{
					$data_cost_total_reduction = $data_lab->lab_rent_cost + array_sum($facility_cost_total);
				}
				$web.='<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td> <b>Total Biaya</b> </td>
					<td style="width: 5%; text-align: center;"><b>'. funCurrencyRupiah($data_cost_total_reduction). '</b></td>
				</tr>
			</tbody>
		</table>';
		return $web;
	}
	/* Tags:... */
	public function viewCheckDataSch (Request $request)
	{
		// var
		$lab = $request->lab_id;
		$start = $request->par_a;
		$end = $request->par_b;
		$web = null;
		if ($lab == null) {
			$web .= '<b>Perhatian!</b><br>';
			$web .= 'Laboratorium belum di pilih, silahtan pilih laboratorium terlebih dahulu.';
			return $web;
		}
		if ($start != null && $end == null) {
			$start = $request->par_a;
			$end = $request->par_b;
		} elseif($start == null && $end != null) {
			$start = $request->par_b;
			$end = $request->par_b;
		}else{
			$start = $request->par_a;
			$end = $request->par_b;
		}		
		// $lab = 1;
		// $start = '2024-03-6';
		// $end = '2024-03-9';
		$datetime_start = Carbon::parse($start)->format('Y-m-d');
		$datetime_end = Carbon::parse($end)->format('Y-m-d');
		// proc
		$period = CarbonPeriod::create($datetime_start, $datetime_end);
		// get data non reguler
		$index_dt = 0;
		$sch_rent_data=[];
		foreach ($period as $key => $value) {
			$date[$key] = date('Y-m-d',strtotime($value));
			$days[$key] = date('l', strtotime($value));
			$data_sch_non_reg = Lab_schedule::where('lbs_lab', $lab)
			->where('lbs_dates_period', 'like', '%' . $date[$key] . '%')
			->orderBy('lbs_time_start', 'asc')
			->get();
			foreach ($data_sch_non_reg as $key => $value) {
				# code...
				$sch_rent_data[$value->lbs_id] = [
					'lbs_id' => $value->lbs_id,
					'lbs_type' => $value->lbs_type,
					'lbs_date' => $date[$key],
					'lbs_time' => date('H:i',strtotime($value->lbs_time_start)).' - '. date('H:i', strtotime($value->lbs_time_end))
				];
				$index_dt++;
			}
		}
		// get data reguler
		$data_sch_reg = Lab_schedule::where('lbs_lab', $lab)
		->where('lbs_type', 'reguler')
		->whereIn('lbs_day', $days)
		->orderBy('lbs_time_start', 'asc')
		->get();
		foreach ($data_sch_reg as $key_a => $value) {
			$exc = explode('$', $value->lbs_sch_dates_excluded);
			$check_data[$key_a] = array_intersect($date,$exc);
			if(count($check_data[$key_a]) == 0){
				$sch_rent_data[$value->lbs_id] = [
					'lbs_id' => $value->lbs_id,
					'lbs_type' => $value->lbs_type,
					'lbs_date' => $date[$key],
					'lbs_time' => date('H:i',strtotime($value->lbs_time_start)).' - '. date('H:i', strtotime($value->lbs_time_end))
				];
			}
		}
		if(count($sch_rent_data) > 0){
			$web.='<b>Perhatian!</b>';
			$web.='<ol type="1">';
			foreach ($sch_rent_data as $key => $value) {
				$web.='<li>Set jadwal sudah dipakai pada jadwal '.(Str::replace('_', ' ', $value['lbs_type'])).' 
				pada tanggal <b>'.$value['lbs_date']. '</b> waktu <b>' . $value['lbs_time'] . '</b></li>';
			}
			$web .= '</ol>';
			$web .= '<input type="hidden" value="false" name="check_sch">';
		}else{
			$web .= '<b>Cek Data Jadwal</b><br>';
			$web .= 'Jadwal tersedia silahkan lanjutkan.';
			$web .= '<input type="hidden" value="true" name="check_sch">';
		}
		return $web;
	}
	/* Tags:... */
	public function sourceDataTestLab(Request $request)
	{
		$data = Laboratory::join('laboratory_labtests', 'laboratories.lab_id', '=', 'laboratory_labtests.lsv_lab_id')
		->where('lab_id', $request->lab_id)
		->get();
		$data_ar[0] = [
			'id' => null,
			'title' => null
		];
		$i = 1;
		foreach ($data as $key => $value) {
			$data_ar[$i] = [
				'id' => $value->lsv_id,
				'title' => $value->lsv_name
			];
			$i++;
		}
		return json_encode($data_ar);
	}
	/* Tags:... */
	public function viewLabtestCostTables(Request $request)
	{
		$user = Auth::user();
		$data_labtest = Laboratory_labtest::leftjoin('laboratories', 'laboratory_labtests.lsv_lab_id','=', 'laboratories.lab_id')
		->where('lsv_id', $request->lab_labtest)
		->first();
		$data_facility = Laboratory_labtest_facility::join('laboratory_facilities', 'laboratory_labtest_facilities.lst_facility','=', 'laboratory_facilities.laf_id')
		->where('lst_lsv_id', $request->lab_labtest)
		->get();
		$web = null;
		
		$web .= '
		<table class="table-bordered tabel_custom" style="width: 100%;">
			<thead>
				<tr>
					<th style="width: 5%; text-align: center;">No</th>
					<th style="width: 65%; text-align: center;">Nama Laboratorium/Fasilitas/Alat</th>
					<th style="width: 30%;text-align: center;">Biaya Pinjam</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td colspan="2"><b>Laboratorium</b></td>
				</tr>
				<tr>
					<td style="width: 5%; text-align: center;">1</td>
					<td text-align: center;">'. $data_labtest->lab_name.'</td>
					<td style="width: 5%; text-align: center;">-</td>
				</tr>
				<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td colspan="2"><b>Fasilitas Dan Alat</b></td>
				</tr>';
		$no = 1;
		if ($data_facility != null) {
			foreach ($data_facility as $key => $value) {
				$web .= '
					<tr>
						<td style="width: 5%; text-align: center;">' . $no . '</td>
						<td>' . $value->laf_name . '<input type="hidden" name="inp_fasilitas[]" value="'. $value->laf_id.'"></td>
						<td style="width: 5%; text-align: center;">-</td>
					</tr>';
				$no++;
			}
		}
		
		if ($data_labtest == null) {
			# code...
			$web .= '<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td> <b>Total Biaya</b> </td>
						<td style="width: 5%; text-align: center;"><b>-</b></td>
					</tr>
				</tbody>
			</table>';
		} else {
			if ($user->level == 'LECTURE') {
				$reduction = Cost_reduction::where('reduction_type', 'LECTURE')->first();
				$reduction_val = ($data_labtest->lsv_price * $reduction->reduction_val)/100;
				$cost_after = $data_labtest->lsv_price - $reduction_val;
				$web .= '<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td> <b>Biaya</b> </td>
					<td style="width: 5%; text-align: center;"><b> - ' . funCurrencyRupiah($data_labtest->lsv_price) . '</b></td>
				</tr>';
				$web .= '<tr>
					<td style="width: 5%; text-align: center;"></td>
					<td text-align: center;">Potongan</td>
					<td style="width: 5%; text-align: center;">'. funCurrencyRupiah($reduction_val).'</td>
				</tr>';
			}else{
				$cost_after = $data_labtest->lsv_price;
			}
			$web .= '<tr>
						<td style="width: 5%; text-align: center;"></td>
						<td> <b>Total Biaya</b> </td>
						<td style="width: 5%; text-align: center;"><b>' . funCurrencyRupiah($cost_after) . '</b></td>
					</tr>
				</tbody>
			</table>';
		}	
		return $web;
	}
	/* Tags:... */
	public function cek_data(Request $request)
	{
		$user = User::whereIn('level',['LAB_HEAD','LAB_SUBHEAD', 'LAB_TECHNICIAN'])->whereNotNull('email')->get();
		foreach ($user as $key => $value) {
			$user_email[$key] = $value->email;
		}
		$data_lecture = getDataLectures();
		$data_student = getDataStudents();
		foreach ($data_student as $key => $value) {
			$ar_student[$key] = [
				'nim' => $value['nim'],
				'email' => $value['email'],
				'judul' => $value['judul']
			];
		}
		dd($ar_student);
		// dd($data_student);
		foreach ($data_lecture as $key => $value) {
			if (in_array($value['email'], $user_email)) {
				$data_user_inputed[$key] = $value;
			} else {
				$data_user_not_inputed[$key] = $value;
			}
		}
		die('lock');

		foreach ($data_user_inputed as $key => $value) {
			$user_inputed = User::where('email',$value['email'])->first();
			$usd_user_inputed[$key] = [
				"usd_user" => $user_inputed->id,
				"usd_prodi" => $value['prodi'],
				"usd_fakultas" => "Fakultas Teknik",
				"usd_universitas" => 'Universitas Negeri Surabaya'
			];
		}
		User_detail::insert($usd_user_inputed);
		// die();
		$id = genIdUser();
		foreach ($data_user_not_inputed as $key => $value) {
			$usr_not_inputed[$key] = [
				"id" => $id,
				"no_id" => $value['nidn'],
				"name" => $value['nama'],
				"email" => $value['email'],
				"password" => bcrypt("open@123")
			];
			$usd_not_inputed[$key] = [
				"usd_user" => $id,
				"usd_prodi" => $value['prodi'],
				"usd_fakultas" => "Fakultas Teknik",
				"usd_universitas" => 'Universitas Negeri Surabaya'
			];
			$id++;
		}
		User::insert($usr_not_inputed);
		User_detail::insert($usd_not_inputed);
	}
	/* Tags:... */
	public function checkLabDetail(Request $request)
	{
		$data_lab = Laboratory::where('lab_id',$request->lab_id)->first();
		return $data_lab->lab_costbase;
	}
}
