<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PengajuanPostRequest;
use App\Http\Requests\TechReportPostRequest;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DataTables;
use Storage;

use App\Http\Controllers\SendingController;

use App\Models\Lab_facility;
use App\Models\Lab_submission;
use App\Models\Laboratory;
use App\Models\User;
use App\Models\Lab_schedule;
use App\Models\Lab_submission_acc;
use App\Models\Lab_submission_adviser;
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Storage as FacadesStorage;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMail;
use App\Mail\NotifMailForApplicant;
use App\Mail\NotifMailForSubhead;
use App\Mail\NotifMailForApplicantReject;
use App\Mail\NotifMailForApplicantValidation;
use App\Mail\NotifMailForHeadValidation;
use App\Mail\NotifMailForTechnical;
use App\Models\Cost_reduction;
use App\Models\Laboratory_working_time;
use App\Models\Lab_sch_date;
use App\Models\Lab_sch_time;
use App\Models\Lab_sub_date;
use App\Models\Lab_sub_time;
use App\Models\Lab_sub_order;
use App\Models\Lab_sub_order_detail;
use App\Models\Lab_submission_result;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;
use App\Models\Laboratory_time_option;
use App\Models\User_detail;
use Str;

// use PDF;

class PengajuanController extends Controller
{
	/* Tags:... */
	public function dataPengajuan(Request $request)
	{
		return view('contents.content_datalist.data_pengajuan');
	}
	public function dataLabPengajuan(Request $request)
	{
		return view('contents.content_datalist.data_lab_sub');
	}
	public function dataPengajuanArchice(Request $request)
	{
		return view('contents.content_datalist.data_pengajuan_archieve');
	}
	/* Tags:... */
	public function dataPengajuanAdditional(Request $request)
	{
		return view('contents.content_datalist.data_pengajuan_additional');
	}
	/* Tags:... */
	public function formPengajuan(Request $request)
	{
		$user = Auth::user();
		$lab_data = Laboratory::where('lab_status','tersedia')
		->where('lab_id',$request->id)
		->first();
		$lab_tool_data = Laboratory_facility::where('laf_laboratorium', $request->id)
		->get();
		$user_data = User::leftJoin('user_details','users.id','=','user_details.usd_user')
		->where('id',$user->id)
		->first();
		$times = Laboratory_time_option::get();
		// 
		if ($lab_data->lab_costbase == 'by_day') {
			# code...
			if ($user->level == 'STUDENT') {
				return view('contents.content_form.form_pengajuan_student_static_by_day',compact('user_data', 'lab_data','times', 'lab_tool_data'));
			}elseif ($user->level == 'LECTURE') {
				return view('contents.content_form.form_pengajuan_lecture', compact('user_data', 'lab_data', 'times'));	
			}else{
				return view('contents.content_form.form_pengajuan_common', compact('user_data', 'lab_data','times'));
			}
		}elseif ($lab_data->lab_costbase == 'by_tool') {
			# code...
			if ($user->level == 'STUDENT') {
				return view('contents.content_form.form_pengajuan_student', compact('user_data', 'lab_data', 'times'));
			} elseif ($user->level == 'LECTURE') {
				return view('contents.content_form.form_pengajuan_lecture', compact('user_data', 'lab_data', 'times'));
			} else {
				return view('contents.content_form.form_pengajuan_common', compact('user_data', 'lab_data', 'times'));
			}
		}elseif ($lab_data->lab_costbase == 'by_sample') {
			# code...
			if ($user->level == 'STUDENT') {
				return view('contents.content_form.form_pengajuan_student', compact('user_data', 'lab_data', 'times'));
			} elseif ($user->level == 'LECTURE') {
				return view('contents.content_form.form_pengajuan_lecture', compact('user_data', 'lab_data', 'times'));
			} else {
				return view('contents.content_form.form_pengajuan_common', compact('user_data', 'lab_data', 'times'));
			}
		}else{
			return redirect()->back();
		}
	}
	/* Tags:... */
	public function formPengajuanLabTest(Request $request)
	{
		$user = Auth::user();
		$user_data = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $user->id)
		->first();
		$lab_data = Laboratory::where('lab_status', 'tersedia')
		->get();
		$times = Laboratory_time_option::get();
		return view('contents.content_form.form_pengajuan_labtest', compact('user_data', 'lab_data','times'));
	}
	public function formLaporan(Request $request)
	{
		// die();
		$data_submission = Lab_submission::leftjoin('users','lab_submissions.lsb_user_id','=','users.id')
		->where('lsb_id',$request->id)
		->first();
		return view('contents.content_form.form_laporan', compact('data_submission'));
	}
	/* Tags:... */
	public function actionPengajuan(Request $request)
	{
		$user = DataAuth();
		$id = genIdPengajuan();
		$id_date = genIdDate();
		$datetimes = [];
		if (count($request->inp_time) == 0) {
			return redirect()->back()->withErrors(['sch_err' => 'Harap inputkan tanggal']);
		} else {
				try {
				$nx = 0;
				$p_dates = [];
				foreach($request->inp_date as $key => $list_date){
					$p_dates[$key] = $list_date;
					$data_date[$key] = [
						"lsd_id" => $id_date,
						"lsd_lsb_id" => $id,
						"lsd_date" => $list_date,
						"lsd_lab" =>  $request->inp_lab
					];
					$cv = 0;
					$times_text[$list_date] = [];
					foreach($request->inp_time[$key] as $sk => $list_time){
						$times = Laboratory_time_option::where('lti_id',$list_time)->first();
						$times_text[$list_date][$sk] = date('H:i',strtotime($times->lti_start)).' - '. date('H:i', strtotime($times->lti_end));
						$mktime[$cv] = $list_time;
						$data_time[$nx] = [
							"lstt_date_subs_id" => $id_date,
							"lstt_time_id" => $list_time,
						];
						$cv++;
						$nx++;
					}
					$mkdate[$list_date] = $mktime;
					$datetimes[$list_date] = $times_text;
					$id_date++;
				}
			} catch (\Throwable $th) {
				return redirect()->back()->withErrors(['sch_err' => 'Harap inputkan tanggal dan jam peminjaman dengan benar.']);
			}
		}
		$b = 0;
		foreach ($mkdate as $key => $value) {
			$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id','=', 'lab_sch_times.lsct_date_id')
			->join('lab_schedules', 'lab_sch_dates.lscd_id','=', 'lab_schedules.lbs_id')
			->where('lbs_type', 'non_reguler')
			->where('lbs_lab', $request->inp_lab)
			->where('lscd_date', $key)
			->select('lsct_date_id', 'lsct_time_id')
			->get();
			$id_time = [];
			foreach ($check_dt as $skey => $svalue) {
				$id_time[$b] = $svalue->lsct_time_id;
				$b++;
			}
			$commonValues[$key] = array_intersect($value, $id_time);
		}
		foreach ($mkdate as $key => $value) {
			$day = date('l',strtotime($key));
			$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
			->join('lab_schedules', 'lab_sch_dates.lscd_id', '=', 'lab_schedules.lbs_id')
			->where('lbs_type','reguler')
			->where('lbs_lab', $request->inp_lab)
			->where('lscd_day', $day)
			->select('lsct_date_id', 'lsct_time_id')
			->get();
			$id_time = [];
			foreach ($check_dt as $skey => $svalue) {
				$id_time[$b] = $svalue->lsct_time_id;
				$b++;
			}
			$commonValues[$key] = array_intersect($value, $id_time);
		}
		$web_err_time = '';
		foreach ($commonValues as $key => $value) {
			foreach ($value as $skey => $svalue) {
				$dtime = Laboratory_time_option::where('lti_id',$svalue)->first();
				$day = date('d-M-Y',strtotime($key));
				$web_err_time.='Jadwal konflik pada '.$day.' jam '. $dtime->lti_start.' - '. $dtime->lti_end.'<br>';
			}
		}
		if ($web_err_time != '') {
			return redirect()->back()->withErrors(['sch_konflik_err' => $web_err_time]);
		}
		// die();
		$data_pembimbing_filter = [];
		if (rulesUser(['STUDENT'])) {
			$data_pembimbing = [
				'pembimbing' => [
					'las_user_no_id' => $request->inp_pembimbing_no_id,
					'las_nip' => $request->inp_pembimbing_nip,
					'las_fullname' => $request->inp_pembimbing,
				],
				'promotor' => [
					'las_user_no_id' => $request->inp_promotor_no_id,
					'las_nip' => $request->inp_promotor,
					'las_fullname' => $request->inp_promotor_nip,
				],
				'kopromotor' => [
					'las_user_no_id' => $request->inp_kopromotor_no_id,
					'las_nip' => $request->inp_kopromotor,
					'las_fullname' => $request->inp_kopromotor_nip,
				],
			];
			foreach ($data_pembimbing as $key => $value) {
				if ($value['las_nip'] != null) {
					$data_pembimbing_filter[$key] = [
						'las_lbs_id' => $id,
						'las_byname' => Str::title($key),
						'las_user_no_id' => $value['las_user_no_id'],
						'las_nip' => $value['las_nip'],
						'las_fullname' => $value['las_fullname'],
					];
				}
			}
		}
		#upload file
		$getFile = $request->file('bukti_pembayaran');
		if ($getFile == true) {
			$file_name = $fileRename = date('Ymd').'_'.date('His').'_'.$user->email.'.'. $getFile->extension();
			$filePath = $getFile->storeAs('public/bukti_bayar', $fileRename);
		}else{
			$file_name = null;
		}
		#data facility
		$data_fcl = [];
		$data_fcl_ids = [];	
		// if ($request->inp_fasilitas != null) {
		// 	foreach ($request->inp_fasilitas as $key => $value) {
		// 		$data_fcl[$key] = [
		// 			"lsf_submission" => $id,
		// 			"lsf_facility_id" => $value
		// 		];
		// 		$data_fcl_ids[$key] = $value;
		// 	}
		// } else {
		// 	return redirect()->back()->withErrors(['tool_err' => 'Anda belum menginputkan alat atau fasilitas lab, harap inputkan kembali.']);
		// };
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head','=', 'users.id')
		->where('lab_id', $request->inp_lab)
		->select('lab_id','lab_name', 'lab_head','id','lab_costbase', 'lab_rent_cost as cost')
		->first();
		if ($request->app_level == 'STUDENT') {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium';
		} else {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium';
		}
		if ($request->inp_kegiatan == 'tp_penelitian') {
			$act = 'Penelitian';
		}else if($request->inp_kegiatan == 'tp_pelatihan'){
			$act = 'Pelatihan';
		}else if($request->inp_kegiatan == 'tp_pengabdian_masyarakat'){
			$act = 'Pengapdian Masyarakat';
		}else if($request->inp_kegiatan == 'tp_magang'){
			$act = 'Magang';
		}else if ($request->inp_kegiatan == 'tp_lain_lain') {
			$act = 'Lain-lain*';
		}else{
			$act = null;
		}
		#data input
		$dt_pengajuan = [
			'lsb_id' => $id,
			'lsb_title' => $request->inp_judul,
			'lsb_activity' => $request->inp_kegiatan,
			'lsb_user_id' => $user->id,
			'lsb_user_head' => 3,
			'lsb_user_subhead' => $data_lab->id,
			'lsb_user_tech' => null,
			'lsb_lab_id' => $request->inp_lab,
			'lsb_date_start' => null,
			'lsb_date_end' => null,
			'lsb_period' =>null,
			'lsb_file_1' => $file_name,
			'lsb_type' => $request->inp_type_sub,
		];
		$data_applicant = [
			'lsb_id' => $id,
			'inp_nama' => $request->inp_nama,
			'inp_id' => $request->inp_id,
			'inp_program_studi' => $request->inp_program_studi,
			'inp_fakultas' => $request->inp_fakultas,
			'inp_institusi' => $request->inp_institusi,
			'inp_address' => $request->inp_address,
			'no_contact' => $request->inp_nomor_kontak,
			'title' => $request->inp_judul,
			'time' => null,
			'lab' => $data_lab->lab_name,
			'lecture' => $lecture,
			'lecture_id' => $lecture_id,
			'act' => $act,
			'send_to' => $send_to,
			'dates' => implode(', ', $p_dates),
			'datetimes' => $times_text,
		];
		// dd($data_applicant);
		#order
		$data_facility = Lab_facility::join('laboratory_facilities', 'lab_facilities.lsf_facility_id', '=', 'laboratory_facilities.laf_id')
		->where('lsf_submission', $request->lsb_id)
		->get();
		$data_tools = Laboratory_facility::whereIn('laf_id',$data_fcl_ids)->get();
		$id_order = getIdOrder();
		if ($dt_pengajuan['lsb_type'] == 'uji_lab') {
			$data_ujilab = Laboratory_labtest::leftJoin('laboratories', 'laboratory_labtests.lsv_lab_id', '=', 'laboratories.lab_id')
			->where('lsv_lab_id', $request->inp_lab)
			->first();
			$order_detail[0] = [
				'lod_los_id' => $id_order,
				'lod_item_id' =>  $data_lab->id,
				'lod_item_type' => 'lab',
				'lod_item_name' => $data_lab->lab_name,
				'lod_cost' => null,
			];
			$index_item = 1;
			foreach ($data_tools as $key => $value) {
				$order_detail[$index_item] = [
					'lod_los_id' => $id_order,
					'lod_item_id' => $value->laf_id,
					'lod_item_type' => 'tool',
					'lod_item_name' => $value->laf_name,
					'lod_cost' =>  null,
				];
				$index_item++;
			}
			if (in_array($user->level,['LECTURE'])) {
				$reduction = Cost_reduction::where('reduction_type', 'LECTURE')->first();
				$cost_total = $data_ujilab->lsv_price;
				if ($reduction->reduction_val == 0) {
					$cost_reduction = 0;
				}else{
					$cost_reduction =  number_format(($data_ujilab->lsv_price * $reduction->reduction_val) / 100 , 2, '.', '');
				}
				$cost_after = number_format($data_ujilab->lsv_price - $cost_reduction, 2, '.', '') ;
			}else{
				$cost_total = $data_ujilab->lsv_price;
				$cost_reduction = 0;
				$cost_after = $data_ujilab->lsv_price - $cost_reduction;
			}
			$data_order = [
				'los_id' => $id_order,
				'los_lsb_id' => $id,
				'los_invoice_code' => null,
				'los_date_order' => date('Y-m-d H:i:s'),
				'los_cost_total'=> $cost_total,
				'los_cost_reduction'=> $cost_reduction,
				'los_cost_after' => $cost_after,
			];
		} else if ($dt_pengajuan['lsb_type'] == 'pinjam_lab') {
			if ($data_lab->lab_costbase == 'by_day') {
				# code...
				$index_item = 1;
				$lod_cost_ar = [];
				foreach ($data_tools as $key => $value) {
					$order_detail[$index_item] = [
						'lod_los_id' => $id_order,
						'lod_item_id' => $value->laf_id,
						'lod_item_type' => 'tool',
						'lod_item_name' => $value->laf_name,
						'lod_cost' =>  $value->laf_value,
					];
					$lod_cost_ar[$key] = $value->laf_value;
					$index_item++;
				}
			}
			// $order_detail[0] = [
			// 	'lod_los_id' => $id_order,
			// 	'lod_item_id' =>  $data_lab->id,
			// 	'lod_item_type' => 'lab',
			// 	'lod_item_name' => $data_lab->lab_name,
			// 	'lod_cost' =>  $data_lab->cost,
			// ];
			if (rulesUser(['STUDENT'])) {
				$reduction = Cost_reduction::where('reduction_type', 'STUDENT')->first();
				$cost_total = number_format($data_lab->cost + array_sum($lod_cost_ar),2,'.','');
				if ($reduction->reduction_val == 0) {
					$cost_reduction = 0;
				} else {
					$cost_reduction =  number_format(($cost_total * $reduction->reduction_val) / 100, 2, '.', '');
				}
				$cost_after = number_format($cost_total - $cost_reduction, 2, '.', '');
			}else if(rulesUser(['LECTURE'])){
				$reduction = Cost_reduction::where('reduction_type', 'LECTURE')->first();
				$cost_total = number_format($data_lab->cost + array_sum($lod_cost_ar), 2, '.', '');
				if ($reduction->reduction_val == 0) {
					$cost_reduction = 0;
				} else {
					$cost_reduction =  number_format(($cost_total * $reduction->reduction_val) / 100, 2, '.', '');
				}
				$cost_after = number_format($cost_total - $cost_reduction, 2, '.', '');
			}else{
				$cost_reduction = 0;
				$cost_total = number_format($data_lab->cost + array_sum($lod_cost_ar), 2, '.', '');
				$cost_after = number_format($cost_total - $cost_reduction, 2, '.', '');
			}
			$data_order = [
				'los_id' => $id_order,
				'los_lsb_id' => $id,
				'los_invoice_code' => null,
				'los_date_order' => date('Y-m-d H:i:s'),
				'los_cost_total' => $cost_total,
				'los_cost_reduction' => $cost_reduction,
				'los_cost_after' => $cost_after,
			];
		}
		#storing
		Lab_sub_date::insert($data_date);
		Lab_sub_time::insert($data_time);
		Lab_sub_order::insert($data_order);
		Lab_sub_order_detail::insert($order_detail);
		$storeFacility = Lab_facility::insert($data_fcl);
		$actionStorePengajuan = Lab_submission::insert($dt_pengajuan);
		$storeAdviser = Lab_submission_adviser::insert($data_pembimbing_filter);
		# Check user
		$usd = User_detail::where('usd_user', $user->id)->first();
		if ($usd == null) {
			$data_user_det = [
				"usd_user" => $user->id,
				"usd_phone" => $request->inp_nomor_kontak,
				"usd_address" => $request->inp_address,
				"usd_prodi" => $request->inp_program_studi,
				"usd_fakultas" => $request->inp_fakultas,
				"usd_universitas" => $request->inp_institusi,
			];
			$storeUserDetail = User_detail::insert($data_user_det);
		}else{
			$data_user_det = [
				"usd_phone" => $request->inp_nomor_kontak,
				"usd_address" => $request->inp_address,
				"usd_prodi" => $request->inp_program_studi,
				"usd_fakultas" => $request->inp_fakultas,
				"usd_universitas" => $request->inp_institusi,
			];
			$updateUserDetail = User_detail::where('usd_user', $user->id)->update($data_user_det);
		}
		#sending mail
		$data_head = User::where('level', 'LAB_HEAD')->first();
		if ($request->app_level == 'STUDENT') {
			Mail::to($data_head->email)->send(new NotifMail($data_applicant));
		} else {
			Mail::to($data_head->email)->send(new NotifMail($data_applicant));
		}
		return redirect()->route('detail_pengajuan', ['id' => $id]);
	}
	/* Tags:... */
	public function actionPengajuanStaticDay(Request $request)
	{
		$user = DataAuth();
		$id = genIdPengajuan();
		$id_date = genIdDate();
		$datetimes = [];
		if (count($request->inp_time) == 0) {
			return redirect()->back()->withErrors(['sch_err' => 'Harap inputkan tanggal']);
		} else {
			try {
				$nx = 0;
				$p_dates = [];
				foreach ($request->inp_date as $key => $list_date) {
					$p_dates[$key] = $list_date;
					$data_date[$key] = [
						"lsd_id" => $id_date,
						"lsd_lsb_id" => $id,
						"lsd_date" => $list_date,
						"lsd_lab" =>  $request->inp_lab
					];
					$cv = 0;
					$times_text[$list_date] = [];
					foreach ($request->inp_time[$key] as $sk => $list_time) {
						$times = Laboratory_time_option::where('lti_id', $list_time)->first();
						$times_text[$list_date][$sk] = date('H:i', strtotime($times->lti_start)) . ' - ' . date('H:i', strtotime($times->lti_end));
						$mktime[$cv] = $list_time;
						$data_time[$nx] = [
							"lstt_date_subs_id" => $id_date,
							"lstt_time_id" => $list_time,
						];
						$cv++;
						$nx++;
					}
					$mkdate[$list_date] = $mktime;
					$datetimes[$list_date] = $times_text;
					$id_date++;
				}
			} catch (\Throwable $th) {
				return redirect()->back()->withErrors(['sch_err' => 'Harap inputkan tanggal dan jam peminjaman dengan benar.']);
			}
		}
		$b = 0;
		foreach ($mkdate as $key => $value) {
			$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
			->join('lab_schedules', 'lab_sch_dates.lscd_id', '=', 'lab_schedules.lbs_id')
			->where('lbs_type', 'non_reguler')
			->where('lbs_lab', $request->inp_lab)
				->where('lscd_date', $key)
				->select('lsct_date_id', 'lsct_time_id')
				->get();
			$id_time = [];
			foreach ($check_dt as $skey => $svalue) {
				$id_time[$b] = $svalue->lsct_time_id;
				$b++;
			}
			$commonValues[$key] = array_intersect($value, $id_time);
		}
		foreach ($mkdate as $key => $value) {
			$day = date('l', strtotime($key));
			$check_dt = Lab_sch_date::join('lab_sch_times', 'lab_sch_dates.lscd_id', '=', 'lab_sch_times.lsct_date_id')
			->join('lab_schedules', 'lab_sch_dates.lscd_id', '=', 'lab_schedules.lbs_id')
			->where('lbs_type', 'reguler')
			->where('lbs_lab', $request->inp_lab)
				->where('lscd_day', $day)
				->select('lsct_date_id', 'lsct_time_id')
				->get();
			$id_time = [];
			foreach ($check_dt as $skey => $svalue) {
				$id_time[$b] = $svalue->lsct_time_id;
				$b++;
			}
			$commonValues[$key] = array_intersect($value, $id_time);
		}
		$web_err_time = '';
		foreach ($commonValues as $key => $value) {
			foreach ($value as $skey => $svalue) {
				$dtime = Laboratory_time_option::where('lti_id', $svalue)->first();
				$day = date('d-M-Y', strtotime($key));
				$web_err_time .= 'Jadwal konflik pada ' . $day . ' jam ' . $dtime->lti_start . ' - ' . $dtime->lti_end . '<br>';
			}
		}
		if ($web_err_time != '') {
			return redirect()->back()->withErrors(['sch_konflik_err' => $web_err_time]);
		}
		$data_pembimbing_filter = [];
		if (rulesUser(['STUDENT'])) {
			$data_pembimbing = [
				'pembimbing' => [
					'las_user_no_id' => $request->inp_pembimbing_no_id,
					'las_nip' => $request->inp_pembimbing_nip,
					'las_fullname' => $request->inp_pembimbing,
				],
				'promotor' => [
					'las_user_no_id' => $request->inp_promotor_no_id,
					'las_nip' => $request->inp_promotor,
					'las_fullname' => $request->inp_promotor_nip,
				],
				'kopromotor' => [
					'las_user_no_id' => $request->inp_kopromotor_no_id,
					'las_nip' => $request->inp_kopromotor,
					'las_fullname' => $request->inp_kopromotor_nip,
				],
			];
			foreach ($data_pembimbing as $key => $value) {
				if ($value['las_nip'] != null) {
					$data_pembimbing_filter[$key] = [
						'las_lbs_id' => $id,
						'las_byname' => Str::title($key),
						'las_user_no_id' => $value['las_user_no_id'],
						'las_nip' => $value['las_nip'],
						'las_fullname' => $value['las_fullname'],
					];
				}
			}
		}
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head', '=', 'users.id')
		->where('lab_id', $request->inp_lab)
		->select('lab_id', 'lab_name', 'lab_head', 'id', 'lab_costbase', 'lab_rent_cost as cost')
		->first();
		if ($request->app_level == 'STUDENT') {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium';
		} else {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium';
		}
		if ($request->inp_kegiatan == 'tp_penelitian') {
			$act = 'Penelitian';
		} else if ($request->inp_kegiatan == 'tp_pelatihan') {
			$act = 'Pelatihan';
		} else if ($request->inp_kegiatan == 'tp_pengabdian_masyarakat') {
			$act = 'Pengapdian Masyarakat';
		} else if ($request->inp_kegiatan == 'tp_magang') {
			$act = 'Magang';
		} else if ($request->inp_kegiatan == 'tp_lain_lain') {
			$act = 'Lain-lain*';
		} else {
			$act = null;
		}
		#data input
		$dt_pengajuan = [
			'lsb_id' => $id,
			'lsb_title' => $request->inp_judul,
			'lsb_activity' => $request->inp_kegiatan,
			'lsb_purpose' => $request->inp_tujuan,
			'lsb_user_id' => $user->id,
			'lsb_user_head' => 3,
			'lsb_user_subhead' => $data_lab->id,
			'lsb_user_tech' => null,
			'lsb_lab_id' => $request->inp_lab,
			'lsb_date_start' => null,
			'lsb_date_end' => null,
			'lsb_period' => null,
			'lsb_file_1' => null,
			'lsb_type' => $request->inp_type_sub,
		];
		$data_applicant = [
			'lsb_id' => $id,
			'inp_nama' => $request->inp_nama,
			'inp_id' => $request->inp_id,
			'inp_program_studi' => $request->inp_program_studi,
			'inp_fakultas' => $request->inp_fakultas,
			'inp_institusi' => $request->inp_institusi,
			'inp_address' => $request->inp_address,
			'no_contact' => $request->inp_nomor_kontak,
			'title' => $request->inp_judul,
			'time' => null,
			'lab' => $data_lab->lab_name,
			'lecture' => $lecture,
			'lecture_id' => $lecture_id,
			'act' => $act,
			'tujuan' => $request->inp_tujuan, 
			'send_to' => $send_to,
			'dates' => implode(', ', $p_dates),
			'datetimes' => $times_text,
		];
		#data order by date
		$id_order = getIdOrder();
		$no_deatil_order = 0;
		foreach ($times_text as $key => $value) {
			$order_detail[$no_deatil_order] = [
				'lod_los_id' => $id_order,
				'lod_item_id' => $no_deatil_order,
				'lod_item_type' => 'day',
				'lod_item_name' => 'Peminjaman tanggal '.$key,
				'lod_cost' =>  $data_lab->cost,
			];
			$cost_ar[$no_deatil_order] = $data_lab->cost;
			$no_deatil_order++;
		}
		#discount skripsi
		$c_coast = array_sum($cost_ar);
		if ($request->inp_kegiatan == 'tp_penelitian_skripsi') {
			$reduction = 100;
			$reduction_val = ($reduction / 100) * $c_coast;
			$cost_after = $c_coast - $reduction_val;
		} else {
			$reduction = 0; 
			$reduction_val = 0;
			$cost_after = $c_coast;
		}
		
		$data_order = [
			'los_id' => $id_order,
			'los_lsb_id' => $id,
			'los_invoice_code' => null,
			'los_date_order' => date('Y-m-d H:i:s'),
			'los_cost_total' => $c_coast,
			'los_cost_reduction_percent' => $reduction,
			'los_cost_reduction' => $reduction_val,
			'los_cost_after' => $cost_after,
		];
		// dd($data_time);
		#storing
		Lab_sub_date::insert($data_date);
		Lab_sub_time::insert($data_time);
		Lab_sub_order::insert($data_order);
		Lab_sub_order_detail::insert($order_detail);
		Lab_submission::insert($dt_pengajuan);
		Lab_submission_adviser::insert($data_pembimbing_filter);

		$data_head = User::where('level', 'LAB_HEAD')->first(); 
		Mail::to($data_head->email)->send(new NotifMail($data_applicant));
		return redirect()->route('detail_pengajuan', ['id' => $id]);
	}
	/* Tags:... */
	public function actionPengajuanStaticTool(Request $request)
	{
		#code...
	}
	public function actionPengajuanStaticSample(Request $request)
	{
		#code...
	}
	/* Tags:... */
	public function viewDetailPengajuan(Request $request)
	{
		$user = Auth::user();
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftJoin('user_details', 'users.id','=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id','=', 'laboratories.lab_id')
		->where('lsb_id', $request->id)
		->first();
		// dd($data_pengajuan);
		$data_date = Lab_sub_date::where('lsd_lsb_id', $request->id)->get();
		$web_date = '';
		foreach($data_date as $key => $list){
			$web_date.= 'Tanggal: '. strDateStart($list->lsd_date).'<br>';
			$data_time = Lab_sub_time::join('laboratory_time_options', 'lab_sub_times.lstt_time_id','=', 'laboratory_time_options.lti_id')
			->where('lstt_date_subs_id',$list->lsd_id)->get();
			if ($data_time->count() > 0){
				foreach ($data_time as $key => $value) {
					$web_date.= '<li>'.setTime($value->lti_start).' - '. setTime($value->lti_end).'</li>';
				}
			} else {
				$web_date.= '<li>-</li>';
			}
		}
		if ($data_pengajuan == null) {
			return view('error.404');
		}
		$user_kasublab = User::leftJoin('user_details','users.id','=','user_details.usd_user')
		->where('id',$data_pengajuan->lsb_user_subhead)
		->select('id','name','usd_phone','email')
		->first();

		$user_technical_lab = User::join('laboratory_technicians','users.id','=', 'laboratory_technicians.lat_tech_id')
		->where('lat_laboratory',$data_pengajuan->lsb_lab_id)
		->select('id','name')
		->get();

		$user_technical = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_tech)
		->select('id', 'name', 'usd_phone', 'email')
		->first();

		// dd($user_technical);

		$data_adviser = Lab_submission_adviser::where('las_lbs_id', $request->id)->get();

		$data_result = Lab_submission_result::leftjoin('users', 'lab_submission_results.lsr_user_validator','=','users.id')
		->where('lsr_lsb_id', $request->id)->first();
		// dd($data_result);

		$acc_data_head = Lab_submission_acc::where('lsa_submission', $request->id)
		->where('lsa_user_id', $data_pengajuan->lsb_user_head)
		->first();
		// dd($acc_data_head);
		$acc_data_lecture = Lab_submission_acc::where('lsa_submission', $request->id)
		->where('lsa_user_id', $data_pengajuan->lsb_user_lecture)
		->first();
		if (isset($acc_data_head->las_note)) {
			$head_notes = $acc_data_head->las_note;
		} else {
			$head_notes = 'Tidak ada catatan';
		}
		if (isset($acc_data_lecture->las_note)) {
			$lecture_notes = $acc_data_lecture->las_note;
		} else {
			$lecture_notes = 'Tidak ada catatan';
		}

		$data_facility = Lab_facility::join('laboratory_facilities', 'lab_facilities.lsf_facility_id','=','laboratory_facilities.laf_id')
		->where('lab_facilities.lsf_submission', $request->id)
		->select('laf_name', 'laf_id', 'lsf_id')
		->get();
		$data_order = Lab_sub_order::where('los_lsb_id', $request->id)
		->first();
		$data_detail_order = Lab_sub_order_detail::where('lod_los_id',$data_order->los_id)
		->get();
		// dd($data_detail_order);
		$cost_order = [];
		$cost_reduction = null;
		foreach ($data_detail_order as $key => $value) {
			if ($value->lod_item_type == 'reduction') {
				$cost_reduction = $value->lod_cost;
			}else{
				$cost_order[$key] = $value->lod_cost;
			}
		}
		if (in_array($user->level,['STUDENT'])) {
			$reduction = Cost_reduction::where('reduction_usr_level', 'STUDENT')->first();
			$data_name_reduction = 'Potongan ('.$reduction->reduction_val.'%)';
		}else if(in_array($user->level, ['LECTURE'])){
			$reduction = Cost_reduction::where('reduction_usr_level', 'LECTURE')->first();
			$data_name_reduction = 'Potongan (' . $reduction->reduction_val . '%)';
		}else{
			$data_name_reduction = 'Potongan';
		}
		$data_detail_order_reduction = $data_order->los_cost_reduction;
		$data_detail_order_total = $data_order->los_cost_after;
		
		if ($data_pengajuan->lsb_status == 'menunggu') {
			$acc_head = 'Proses persetujuan';
		}elseif ($data_pengajuan->lsb_status == 'disetujui') {
			$acc_head = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
			$acc_head.= '<br><i>Catatan : ' . $acc_data_head->las_note .'</i>';
		}elseif ($data_pengajuan->lsb_status == 'ditolak') {
			$acc_head = 'Pengajuan ditolak pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
			$acc_head.= '<br><i>Catatan : '. $acc_data_head->las_note.'</i>';
		}elseif ($data_pengajuan->lsb_status == 'selesai') {
			$acc_head = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
			$acc_head .= '<br><i>Catatan : ' . $acc_data_head->las_note . '</i>';
		}
		$str_acc ='';
		if (rulesUser(['LAB_HEAD', 'ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_SUBHEAD', 'LAB_TECHNICIAN'])) {
			$str_acc .='<tr>
			<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
			<td style="width: 80%;">' . $acc_head . '</td></tr>';
		}elseif (rulesUser(['STUDENT'])) {
			$str_acc .= '<tr>
			<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
			<td style="width: 80%;">' . $acc_head . '</td></tr>';
		}else{
			$str_acc .= '<tr>
			<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
			<td style="width: 80%;">' . $acc_head . '</td>
			</tr>';
		}
		return view('contents.content_pageview.view_detail_pengajuan', compact('data_pengajuan', 'data_facility', 'str_acc', 'acc_data_head', 'acc_data_lecture','data_name_reduction',
		'user_kasublab', 'user_technical', 'data_adviser','data_result','data_detail_order','data_detail_order_reduction','data_detail_order_total','user_technical_lab','web_date',
			'data_order'));

	}
	/* Tags:... */
	public function viewPengajuan(Request $request)
	{
		$data_pengajuan = Lab_submission::join('users', 'lab_submissions.lsb_user_id','=','users.id')
		->where('lsb_id',$request->id)
		->get();
		// echo $data_pengajuan;
		// echo $request->id; die();
		return view('contents.content_pageview.view_pengajuan_a',compact('data_pengajuan'));
		#code...
	}
	/* Tags:... */
	public function convertPDFPengajuan(request $request)
	{
		// return view('contents.content_pageview.view_pengajuan_pdf'); die();
		$data = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id', '=', 'laboratories.lab_id')
		->where('lsb_id', $request->id)
		->first();
		if ($data->level == 'STUDENT') {
			$acc_data_lecture = Lab_submission_adviser::where('las_lbs_id', $request->id)
			->first();
		}else{
			$acc_data_lecture = null;
		}
		$data_facility = Lab_facility::join('laboratory_facilities', 'lab_facilities.lsf_facility_id', '=', 'laboratory_facilities.laf_id')
		->where('lab_facilities.lsf_submission', $request->id)
		->select('laf_name', 'laf_id', 'lsf_id')
		->get();
		// return view('contents.content_pageview.view_pengajuan_pdf', compact('data', 'acc_data_lecture', 'data_facility'));
		// die();
		$pdf = Pdf::loadview('contents.content_pageview.view_pengajuan_pdf', compact('data', 'acc_data_lecture', 'data_facility'));
		return $pdf->download('surat_pengajuan_peminjaman_lab.pdf');
	}
	/* Tags:... */
	/* Tags:... */
	public function actionAccA(Request $request)
	{
		$user = Auth::user();
		$id_lab_sch = genIdLaSch();
		$id_sch_date = genIdDateSch();
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id','=','users.id')
		->leftjoin('user_details', 'lab_submissions.lsb_user_id','=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id','=', 'laboratories.lab_id')
		->where('lsb_id',$request->lsb_id)
		->first();
		$data_tanggal = Lab_sub_date::where('lsd_lsb_id',$request->lsb_id)->get();
		$idx_time = 0;
		$p_dates = [];
		foreach ($data_tanggal as $key => $value) {
			$p_dates[$key] = $value->lsd_date;
			$inp_date[$key] = [
				"lscd_id" => $id_sch_date,
				"lscd_sch" => $id_lab_sch,
				"lscd_day" => date('l',strtotime($value->lsd_date)),
				"lscd_date" => $value->lsd_date,
				"lscd_status" => 'active',
			];
			$data_tanggal= Lab_sub_time::where('lstt_date_subs_id',$value->lsd_id)->get();
			if ($data_tanggal != null) {
				foreach ($data_tanggal as $skey => $value) {
					$inp_time[$idx_time] = [
						"lsct_date_id" => $value->lstt_date_subs_id,
						"lsct_time_id" => $value->lstt_time_id,
						"lsct_status" => 'active'
					];
					$idx_time++;
				}
			}
			$id_sch_date++;
		}
		$data_kasublab = User::leftJoin('user_details','users.id','=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_subhead)
		->select('name', 'usd_phone')
		->first();
		$data_adviser = Lab_submission_adviser::where('las_lbs_id', $request->lsb_id)->get();
		$data_acc[0] = [
			'lsa_submission' => $request->lsb_id,
			'lsa_rule' => $user->level,
			'lsa_user_id' => $user->id,
			'las_username' => $user->name,
			'las_note' => $request->inp_catatan,
			'las_date_acc' => date('Y-m-d H:i:s')
		];
		$i = 1;
		foreach ($data_adviser as $key => $value) {
			$no_ids_adviser[$key] = $value->lsa_user_no_id;
			$data_acc[$i] = [
				'lsa_submission' => $request->lsb_id,
				'lsa_rule' => 'LECTURE',
				'lsa_user_no_id' => $value->lsa_user_no_id,
				'las_username' => $value->las_fullname,
				'las_note' => null,
				'las_date_acc' => date('Y-m-d H:i:s')
			];
			$i++;
		}
		#
		$data_a = [
			'lbs_id' => $id_lab_sch,
			'lbs_lab' => $data_pengajuan->lsb_lab_id,
			'lbs_day' => null,
			'lbs_date_start' => null,
			'lbs_date_end' => null,
			'lbs_time_start' => null,
			'lbs_time_end' =>null,
			'lbs_dates_period' => null,
			'lbs_type' => 'non_reguler',
			'lbs_matkul' => $data_pengajuan->lsb_title,
			'lbs_tenant_init' => $data_pengajuan->id,
			'lbs_tenant_name' => $data_pengajuan->name,
			'lbs_res_person' => null,
			'lbs_submission' => $data_pengajuan->lsb_id,                                                                                                                                                                                                                                            
		];
		if ($data_pengajuan->lsb_activity == 'tp_penelitian'|| $data_pengajuan->lsb_activity == 'tp_penelitian_skripsi') {
			$act = 'Penelitian';
		} else if ($data_pengajuan->lsb_activity == 'tp_pelatihan') {
			$act = 'Pelatihan';
		} else if ($data_pengajuan->lsb_activity == 'tp_pengabdian_masyarakat') {
			$act = 'Pengabdian Masyarakat';
		} else if ($data_pengajuan->lsb_activity == 'tp_magang') {
			$act = 'Magang';
		} else if ($data_pengajuan->lsb_activity == 'tp_lain_lain') {
			$act = 'Lain-lain*';
		} else {
			$act = null;
		}
		$data_applicant = [
			'lsb_id' => $data_pengajuan->lsb_id,
			'inp_nama' => $data_pengajuan->name,
			'inp_id' => $data_pengajuan->no_id,
			'inp_program_studi' => $data_pengajuan->usd_prodi,
			'inp_fakultas' => $data_pengajuan->usd_fakultas,
			'inp_institusi' => $data_pengajuan->usd_universitas,
			'inp_address' => $data_pengajuan->usd_address,
			'no_contact' => $data_pengajuan->usd_phone,
			'name_subhead' => $data_kasublab->name,
			'no_contact_subhead' => $data_kasublab->usd_phone,
			'title' => $data_pengajuan->lsb_title,
			'time' => strDateStart($data_pengajuan->lbs_date_start) . ' <b>s/d</b> ' . strDateEnd($data_pengajuan->lbs_date_end),
			'lab' => $data_pengajuan->lab_name,
			'act' => $act,
			'dates' => implode(', ', $p_dates), 
		];
		// die();
		Lab_submission_acc::insert($data_acc);
		$data_user_head = User::where('id', $data_pengajuan->lsb_user_head)->select('name')->first();
		if ($data_pengajuan->level == 'STUDENT') {
			$data_user_lecture = User::whereIn('no_id', $no_ids_adviser)->get();
			if ($request->inp_acc == 'disetujui') {
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'disetujui']);
				$storeSchedule = Lab_schedule::insert($data_a);
				$storeSchDate = Lab_sch_date::insert($inp_date);
				$storeSctTime = Lab_sch_time::insert($inp_time);
				$data_accepting = [
					'head_acc' => $data_user_head->name . ', pada ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->select('email')->first();
				$data_applicant = array_merge($data_applicant, $data_accepting);
				#Mail to subhead
				if ($data_user_subhead->email != null) {
					Mail::to($data_user_subhead->email)->send(new NotifMailForSubHead($data_applicant));
				}
				#Mail to adviser
				#Mail to student
				// if ($data_pengajuan->email != null) {
				// 	Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
				// }
			}elseif($request->inp_acc == 'ditolak'){
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'ditolak']);
				$data_rejecting = [
					'head_acc' => $data_user_head->name . ', pada ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_applicant = array_merge($data_applicant, $data_rejecting);
				#Mail to adviser
				#Mail to student
				if ($data_pengajuan->email != null) {
					Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantReject($data_applicant));
				}
			}
		}else{
			if ($request->inp_acc == 'disetujui') {
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'disetujui']);
				$storeSchedule = Lab_schedule::insert($data_a);
				$storeSchDate = Lab_sch_date::insert($inp_date);
				$storeSctTime = Lab_sch_time::insert($inp_time);
				$data_user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->select('email')->first();
				$data_accepting = [
					'head_acc' => $data_user_head->name . ', pada ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_applicant = array_merge($data_applicant, $data_accepting);
				#Mail to subhead
				if ($data_user_subhead->email != null) {
					Mail::to($data_user_subhead->email)->send(new NotifMailForSubHead($data_applicant));
				}
				#Mail to tenant
				// if ($data_pengajuan->email != null) {
				// 	Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
				// }
			} elseif ($request->inp_acc == 'ditolak') {
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'ditolak']);
				$data_rejecting = [
					'head_acc' => $data_user_head->name . ', pada ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_applicant = array_merge($data_applicant, $data_rejecting);
				#mail to applicant
				if ($data_pengajuan->email != null) {
					Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantReject($data_applicant));
				}
			}
		}
		return redirect()->back();
	}
	/* Tags:... */
	public function actionSettechnical(Request $request)
	{
		// dd($request->inp_teknisi);
		if ($request->inp_teknisi == null) {
			return redirect()->back()->withErrors(['tech_err' => 'Teknisi lab belum di-set']);
		} else {
			Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_user_tech' => $request->inp_teknisi]);
		}
		
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftjoin('user_details', 'lab_submissions.lsb_user_id', '=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id', '=', 'laboratories.lab_id')
		->where('lsb_id', $request->lsb_id)
		->first();
		$data_tanggal = Lab_sub_date::where('lsd_lsb_id', $request->lsb_id)
		->get();
		$data_kasublab = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_subhead)
		->select('name', 'usd_phone')
		->first();
		$data_tech = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_tech)
		->select('name', 'usd_phone')
		->first();
		$data_head = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_head)
		->select('name', 'usd_phone')
		->first();
		$date_acc = Lab_submission_acc::where('lsa_submission', $data_pengajuan->lsb_id)->where('lsa_rule', 'LAB_HEAD')->select('created_at as created')->first();
		if ($data_pengajuan->lsb_activity == 'tp_penelitian' || $data_pengajuan->lsb_activity == 'tp_penelitian_skripsi') {
			$act = 'Penelitian';
		} else if ($data_pengajuan->lsb_activity == 'tp_pelatihan') {
			$act = 'Pelatihan';
		} else if ($data_pengajuan->lsb_activity == 'tp_pengabdian_masyarakat') {
			$act = 'Pengabdian Masyarakat';
		} else if ($data_pengajuan->lsb_activity == 'tp_magang') {
			$act = 'Magang';
		} else if ($data_pengajuan->lsb_activity == 'tp_lain_lain') {
			$act = 'Lain-lain*';
		} else {
			$act = null;
		}
		$data_applicant = [
			'lsb_id' => $data_pengajuan->lsb_id,
			'inp_nama' => $data_pengajuan->name,
			'inp_id' => $data_pengajuan->no_id,
			'inp_program_studi' => $data_pengajuan->usd_prodi,
			'inp_fakultas' => $data_pengajuan->usd_fakultas,
			'inp_institusi' => $data_pengajuan->usd_universitas,
			'inp_address' => $data_pengajuan->usd_address,
			'no_contact' => $data_pengajuan->usd_phone,
			'title' => $data_pengajuan->lsb_title,
			'lab_name' => $data_pengajuan->lab_name,
			'name_subhead' => $data_kasublab->name,
			'no_contact_subhead' => $data_kasublab->usd_phone,
			'name_tech' => $data_tech->name,
			'no_contact_tech' => $data_tech->usd_phone,
			'head_acc' => $data_head->name.' pada ' . strDateStart($date_acc->created),
			'time' => strDateStart($data_pengajuan->lbs_date_start) . ' <b>s/d</b> ' . strDateEnd($data_pengajuan->lbs_date_end),
			'lab' => $data_pengajuan->lab_name,
			'act' => $act,
			'dates' => $data_tanggal->implode('lsd_date',', '),
		];
		$data_user = User::where('id', $request->inp_teknisi)->first();
		if ($data_user->email != null) {
			Mail::to($data_user->email)->send(new NotifMailForTechnical($data_applicant));
		}
		if ($data_pengajuan->email != null) {
			Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
		}
		return redirect()->back();
	}
	/* Tags:... */
	public function actionTechReport(TechReportPostRequest $request)
	{
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->where('lsb_id', $request->lsb_id)
		->select('email')
		->first();

		$getFile = $request->file('laporan_kegiatan');
		if ($getFile == true) {
			$file_name = $fileRename = date('Ymd') . '_' . date('His') . '_' . $data_pengajuan->email . '.' . $getFile->extension();
			$filePath = $getFile->storeAs('public/repo_report', $fileRename);
		} else {
			$file_name = null;
		}
		Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_file_2' => $file_name]);
		return redirect()->back();
	}
	/* Tags:... */
	public function actionUploadLaporan(Request $request)
	{
		$date = date('d_m_Y_His');
		$no_id = $request->no_id;
		$name = Str::slug($request->name, '_');
		$getFile = $request->file('dok_laporan');
		$file_size = number_format(filesize($getFile) / 1024, 2);
		if ($getFile->extension() != 'pdf') {
			return redirect()->back()->withErrors(['file_err' => 'Tipe file tidak mendukung, harap konversi dokumen anda menjadi file tipe PDF.']);
		}
		if ($file_size > 1024 ) {
			return redirect()->back()->withErrors(['file_err_filesize' => 'Ukuran file tidak boleh lebih dari 1024 kilobytes.']);
		}
		if ($getFile == true) {
			$fileRename =  $no_id.'_'.$name.'_'.$date.'.'.$getFile->extension();
			$filePath = $getFile->storeAs('public/data_laporan', $fileRename);
			$data = [
				'lsr_lsb_id' => $request->lsb_id,
				'lsr_filename' => $fileRename,
				'lsr_user_validator' => null,
				'lsr_status' => 'false',
				'lsr_notes' => null,
			];
			$updateLabSubmission = Lab_submission_result::insert($data);
		} else {
			$file_name = null;
		}
		return redirect()->route('detail_pengajuan', ['id' => $request->lsb_id]);
	}
	/* Tags:... */
	public function actionUpdateValidation(Request $request)
	{
		$data_subs = [
			'lsb_status' => $request->inp_status,
		];
		$data_validate = [
			'lsr_user_validator' => DataAuth()->id,
			'lsr_notes' => $request->inp_catatan,
			'lsr_status' => 'true',
		];

		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftjoin('user_details', 'lab_submissions.lsb_user_id', '=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id', '=', 'laboratories.lab_id')
		->where('lsb_id', $request->lsb_id)
		->first();
		$data_kasublab = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_subhead)
		->select('name', 'usd_phone','email')
		->first();
		$data_tech = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_tech)
		->select('name', 'usd_phone')
		->first();
		$data_head = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_head)
		->select('name', 'usd_phone','email')
		->first();
		$data_user = User::where('id', $request->inp_teknisi)->first();
		$date_acc = Lab_submission_acc::where('lsa_submission', $data_pengajuan->lsb_id)->where('lsa_rule', 'LAB_HEAD')->select('created_at as created')->first();
		if ($data_pengajuan->lsb_activity == 'tp_penelitian' || $data_pengajuan->lsb_activity == 'tp_penelitian_skripsi') {
			$act = 'Penelitian';
		} else if ($data_pengajuan->lsb_activity == 'tp_pelatihan') {
			$act = 'Pelatihan';
		} else if ($data_pengajuan->lsb_activity == 'tp_pengabdian_masyarakat') {
			$act = 'Pengabdian Masyarakat';
		} else if ($data_pengajuan->lsb_activity == 'tp_magang') {
			$act = 'Magang';
		} else if ($data_pengajuan->lsb_activity == 'tp_lain_lain') {
			$act = 'Lain-lain*';
		} else {
			$act = null;
		}
		$data_applicant = [
			'lsb_id' => $data_pengajuan->lsb_id,
			'inp_nama' => $data_pengajuan->name,
			'inp_id' => $data_pengajuan->no_id,
			'inp_program_studi' => $data_pengajuan->usd_prodi,
			'inp_fakultas' => $data_pengajuan->usd_fakultas,
			'inp_institusi' => $data_pengajuan->usd_universitas,
			'inp_address' => $data_pengajuan->usd_address,
			'no_contact' => $data_pengajuan->usd_phone,
			'title' => $data_pengajuan->lsb_title,
			'lab_name' => $data_pengajuan->lab_name,
			'name_subhead' => $data_kasublab->name,
			'no_contact_subhead' => $data_kasublab->usd_phone,
			'name_tech' => $data_tech->name,
			'no_contact_tech' => $data_tech->usd_phone,
			'head_acc' => $data_head->name . ' pada ' . strDateStart($date_acc->created),
			'time' => strDateStart($data_pengajuan->lbs_date_start) . ' <b>s/d</b> ' . strDateEnd($data_pengajuan->lbs_date_end),
			'lab' => $data_pengajuan->lab_name,
			'act' => $act,
			'result_date_validation' => date('d-m-Y H:i'),
		];
		if ($data_pengajuan->email != null) {
			Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantValidation($data_applicant));
		}
		if ($data_head->email != null) {
			Mail::to($data_head->email)->send(new NotifMailForHeadValidation($data_applicant));
		}
		Lab_submission::where('lsb_id',$request->lsb_id)->update($data_subs);
		Lab_submission_result::where('lsr_id',$request->lsr_id)->update($data_validate);
		return redirect()->back();
	}
}