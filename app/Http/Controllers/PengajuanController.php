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
use App\Mail\NotifMailForApplicantRejectByLecture;
use App\Mail\NotifMailForTechnical;
use App\Models\Cost_reduction;
use App\Models\Lab_labtest;
use App\Models\Lab_sub_order;
use App\Models\Lab_sub_order_detail;
use App\Models\Lab_submission_result;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;
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
		$user_data = User::leftJoin('user_details','users.id','=','user_details.usd_user')
		->where('id',$user->id)
		->first();
		$lab_data = Laboratory::where('lab_status','tersedia')
		->get();
		if ($user->level == 'STUDENT') {
			return view('contents.content_form.form_pengajuan_student',compact('user_data', 'lab_data'));
		}else{
			return view('contents.content_form.form_pengajuan_common', compact('user_data', 'lab_data'));
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
		return view('contents.content_form.form_pengajuan_labtest', compact('user_data', 'lab_data'));
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
	public function sendByMail($data)
	{
		$data_user = User::leftjoin('user_details','users.id','=', 'user_details.usd_user')
		->where('id',$data['lsb_user_id'])
		->first()->toArray();
		$data_user_lecture = User::where('id', $data['lsb_user_lecture'])
		->select('email')
		->first();
		$data_user_head = User::where('id', $data['lsb_user_head'])
		->select('email')
		->first();
		$data_lab = Laboratory::where('lab_id',$data['lsb_lab_id'])
		->select('lab_name')
		->first();
		if ($data_user['level'] == 'STUDENT') {
			$sentTo = $data_user_lecture->email;
		}else{
			$sentTo = $data_user_head->email;
		}
		$data_lab_ar = [
			"lab_name" => $data_lab->lab_name
		];
		$data = array_merge($data, $data_user);
		$data = array_merge($data, $data_lab_ar);
		return view('contents.content_notif_email.notif_1',compact('data'));
		die();
		// Mail::to($sentTo)->send(new NotifMail($data));
	}
	/* Tags:... */
	public function actionPengajuan(Request $request)
	{
		if ($request->check_sch == 'false') {
			return redirect()->back()->withErrors(['sch_err' => 'Set jadwal anda konflik dengan jadwal lain, harap set jadwal kembali.']);
		}
		$user = DataAuth();
		$id = genIdPengajuan();
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
		if ($request->time_start == '0:00') {
			$custom_time_start = '07:00';
		} else {
			$custom_time_start = $request->time_start;
		}
		if ($request->time_end == '0:00') {
			$custom_time_end = '18:00';
		} else {
			$custom_time_end = $request->time_end;
		}
		$start = $request->date_start.' '.$custom_time_start;
		$datetime_start = Carbon::parse($start)->format('Y-m-d H:i:s');
		// dd($datetime_start);
		$end = $request->date_end . ' ' .$custom_time_end;
		$datetime_end = Carbon::parse($end)->format('Y-m-d H:i:s');
		$periods = CarbonPeriod::create($datetime_start, $datetime_end);
		$dateIn = [];
		foreach ($periods as $key => $value) {
			$dateIn[$key] = date('Y-m-d', strtotime($value));
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
		if ($request->inp_fasilitas != null) {
			foreach ($request->inp_fasilitas as $key => $value) {
				$data_fcl[$key] = [
					"lsf_submission" => $id,
					"lsf_facility_id" => $value
				];
				$data_fcl_ids[$key] = $value;
			}
		} else {
			return redirect()->back()->withErrors(['tool_err' => 'Anda belum menginputkan alat atau fasilitas lab, harap inputkan kembali.']);
		};
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head','=', 'users.id')
		->where('lab_id', $request->inp_lab)
		->select('lab_id','lab_name', 'lab_head','id', 'lab_rent_cost as cost')
		->first();
		if ($request->app_level == 'STUDENT') {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium Riset';
		} else {
			$lecture = null;
			$lecture_id = null;
			$send_to = 'Kepala Laboratorium Riset';
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
			'lsb_date_start' => $datetime_start,
			'lsb_date_end' => $datetime_end,
			'lsb_period' =>implode('$', $dateIn),
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
			'time' => strDateStart($datetime_start).' <b>s/d</b> '. strDateEnd($datetime_end),
			'lab' => $data_lab->lab_name,
			'lecture' => $lecture,
			'lecture_id' => $lecture_id,
			'act' => $act,
			'send_to' => $send_to,
		];
		// dd($data_applicant);
		#order
		$data_facility = Lab_facility::join('laboratory_facilities', 'lab_facilities.lsf_facility_id', '=', 'laboratory_facilities.laf_id')
		->where('lsf_submission', $request->lsb_id)
		->get();
		$id_order = getIdOrder();
		$data_tools = Laboratory_facility::whereIn('laf_id',$data_fcl_ids)->get();
		if ($dt_pengajuan['lsb_type'] == 'uji_lab') {
			$data_ujilab = Laboratory_labtest::leftJoin('laboratories', 'laboratory_labtests.lsv_lab_id', '=', 'laboratories.lab_id')
			->where('lsv_lab_id', $request->inp_lab)
			->first();
			$order_detail[0] = [
				'lod_los_id' => $id_order,
				'lod_item_id' =>  $data_lab->id,
				'lod_item_type' => 'lab',
				'lod_item_name' => $data_lab->lab_name,
				'lod_cost' => $data_lab->cost,
			];
			$index_item = 1;
			foreach ($data_tools as $key => $value) {
				$order_detail[$index_item] = [
					'lod_los_id' => $id_order,
					'lod_item_id' => $value->laf_id,
					'lod_item_type' => 'tool',
					'lod_item_name' => $value->laf_name,
					'lod_cost' =>  $value->laf_value,
				];
				$index_item++;
			}
			// dd($order_detail);
			if (rulesUser(['STUDENT'])) {
				$reduction = Cost_reduction::where('reduction_type', 'STUDENT')->first();
				$cost_total = $data_ujilab->lsv_price;
				if ($reduction->reduction == 0) {
					$rec_val = 0;
				} else {
					$rec_val = $cost_total * ($reduction->reduction / 100);
				}
				$index_item_new = $index_item + 1;
				$order_detail[$index_item_new] = [
					'lod_los_id' => $id_order,
					'lod_item_id' => $reduction->reduction_type,
					'lod_item_type' => 'reduction',
					'lod_item_name' => 'Potongan biaya ' . $reduction->reduction_val . ' %',
					'lod_cost' =>  $rec_val,
				];
				$cost_total_red = number_format($cost_total - $rec_val, 2, '.', '');
			} else {
				$cost_total_red = number_format($data_ujilab->lsv_price, 2, '.', '');
			}
			$data_order = [
				'los_id' => $id_order,
				'los_lsb_id' => $id,
				'los_invoice_code' => null,
				'los_date_order' => date('Y-m-d H:i:s'),
				'los_cost_total' => $cost_total_red,
			];
		} else if ($dt_pengajuan['lsb_type'] == 'pinjam_lab') {
			$order_detail[0] = [
				'lod_los_id' => $id_order,
				'lod_item_id' =>  $data_lab->id,
				'lod_item_type' => 'lab',
				'lod_item_name' => $data_lab->lab_name,
				'lod_cost' =>  $data_lab->cost,
			];
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
			if (rulesUser(['STUDENT'])) {
				$reduction = Cost_reduction::where('reduction_type', 'STUDENT')->first();
				$cost_total = number_format($data_lab->cost + array_sum($lod_cost_ar),2,'.','') ;
				if ($reduction->reduction_val == 0) {
					$rec_val = 0;
				} else {
					$rec_val = ($reduction->reduction_val / 100) * $cost_total ;
				}
				$index_item_new = $index_item+1;
				$order_detail[$index_item_new] = [
					'lod_los_id' => $id_order,
					'lod_item_id' => $reduction->reduction_type,
					'lod_item_type' => 'reduction',
					'lod_item_name' => 'Potongan biaya '.$reduction->reduction_val.' %' ,
					'lod_cost' =>  $rec_val,
				];
				$cost_total_red = number_format($cost_total - $rec_val,2,'.','') ;
			}else{
				$cost_total_red = number_format($data_lab->lab_rent_cost + array_sum($lod_cost_ar),2,'.','');
			}
			$data_order = [
				'los_id' => $id_order,
				'los_lsb_id' => $id,
				'los_invoice_code' => null,
				'los_date_order' => date('Y-m-d H:i:s'),
				'los_cost_total' => $cost_total_red,
			];
		}
		#storing
		Lab_sub_order::insert($data_order);
		Lab_sub_order_detail::insert($order_detail);
		$storeFacility = Lab_facility::insert($data_fcl);
		$actionStorePengajuan = Lab_submission::insert($dt_pengajuan);
		$storeAdviser = Lab_submission_adviser::insert($data_pembimbing_filter);
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
	public function viewDetailPengajuan(Request $request)
	{
		$user = Auth::user();
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftJoin('user_details', 'users.id','=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id','=', 'laboratories.lab_id')
		->where('lsb_id', $request->id)
		->first();

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
		$data_detail_order_reduction = $cost_reduction;
		$data_detail_order_total = array_sum($cost_order) - $cost_reduction;
		
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
		return view('contents.content_pageview.view_detail_pengajuan', compact('data_pengajuan', 'data_facility', 'str_acc', 'acc_data_head', 'acc_data_lecture',
		'user_kasublab', 'user_technical', 'data_adviser','data_result','data_detail_order','data_detail_order_reduction','data_detail_order_total','user_technical_lab'));

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
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id','=','users.id')
		->leftjoin('user_details', 'lab_submissions.lsb_user_id','=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id','=', 'laboratories.lab_id')
		->where('lsb_id',$request->lsb_id)
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
		$id_lab_sch = genIdLaSch();
		$period = CarbonPeriod::create($data_pengajuan->lsb_date_start, $data_pengajuan->lsb_date_end);
		$data_period = [];
		foreach ($period as $key => $value) {
			$data_period[$key] = date('Y-m-d', strtotime($value));
		}
		$period_str = implode('$', $data_period);
		$data_a = [
			'lbs_id' => $id_lab_sch,
			'lbs_lab' => $data_pengajuan->lsb_lab_id,
			'lbs_day' => null,
			'lbs_date_start' => $data_pengajuan->lsb_date_start,
			'lbs_date_end' => $data_pengajuan->lsb_date_end,
			'lbs_time_start' => date('H:i', strtotime($data_pengajuan->lsb_date_start)),
			'lbs_time_end' => date('H:i', strtotime($data_pengajuan->lsb_date_end)),
			'lbs_dates_period' => $period_str,
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
			'title' => $data_pengajuan->lsb_title,
			'time' => strDateStart($data_pengajuan->lbs_date_start) . ' <b>s/d</b> ' . strDateEnd($data_pengajuan->lbs_date_end),
			'lab' => $data_pengajuan->lab_name,
			'act' => $act,
		];
		Lab_submission_acc::insert($data_acc);
		$data_user_head = User::where('id', $data_pengajuan->lsb_user_head)->select('name')->first();
		if ($data_pengajuan->level == 'STUDENT') {
			$data_user_lecture = User::whereIn('no_id', $no_ids_adviser)->get();
			if ($request->inp_acc == 'disetujui') {
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'disetujui']);
				$storeSchedule = Lab_schedule::insert($data_a);
				$data_accepting = [
					'head_acc' => $data_user_head->name . ', pada tanggal ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->select('email')->first();
				$data_applicant = array_merge($data_applicant, $data_accepting);
				#Mail to subhead
				if ($data_user_subhead->email != null) {
					Mail::to($data_user_subhead->email)->send(new NotifMailForSubHead($data_applicant));
				}
				#Mail to adviser

				#Mail to student
				if ($data_pengajuan->email != null) {
					Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
				}
			}elseif($request->inp_acc == 'ditolak'){
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'ditolak']);
				$data_rejecting = [
					'head_acc' => $data_user_head->name . ', pada tanggal ' . setDate(date('Y-m-d H:i:s')),
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
				$data_user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->select('email')->first();
				$data_accepting = [
					'head_acc' => $data_user_head->name . ', pada tanggal ' . setDate(date('Y-m-d H:i:s')),
				];
				$data_applicant = array_merge($data_applicant, $data_accepting);
				#Mail to subhead
				if ($data_user_subhead->email != null) {
					Mail::to($data_user_subhead->email)->send(new NotifMailForSubHead($data_applicant));
				}
				#Mail to tenant
				if ($data_pengajuan->email != null) {
					Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
				}
			} elseif ($request->inp_acc == 'ditolak') {
				$udateStatus = Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_status' => 'ditolak']);
				$data_rejecting = [
					'head_acc' => $data_user_head->name . ', pada tanggal ' . setDate(date('Y-m-d H:i:s')),
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
		$data_pengajuan = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftjoin('user_details', 'lab_submissions.lsb_user_id', '=', 'user_details.usd_user')
		->leftjoin('laboratories', 'lab_submissions.lsb_lab_id', '=', 'laboratories.lab_id')
		->where('lsb_id', $request->lsb_id)
		->first();
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
			'time' => strDateStart($data_pengajuan->lbs_date_start) . ' <b>s/d</b> ' . strDateEnd($data_pengajuan->lbs_date_end),
			'lab' => $data_pengajuan->lab_name,
			'act' => $act,
		];
		Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_user_tech' => $request->inp_teknisi]);
		$data_user = User::where('id', $request->inp_teknisi)->first();
		Mail::to($data_user->email)->send(new NotifMailForTechnical($data_applicant));
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
		Lab_submission::where('lsb_id',$request->lsb_id)->update($data_subs);
		Lab_submission_result::where('lsr_id',$request->lsr_id)->update($data_validate);
		return redirect()->back();
	}
}