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
use FontLib\Table\Type\post;
use Illuminate\Support\Facades\Storage as FacadesStorage;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMail;
use App\Mail\NotifMailForApplicant;
use App\Mail\NotifMailForApplicantReject;
use App\Mail\NotifMailForApplicantRejectByLecture;

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
		// dd($user_data);
		return view('contents.content_form.form_pengajuan',compact('user_data', 'lab_data'));
	}
	public function formLaporan(Request $request)
	{
		$user = Auth::user();
		$user_data = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $user->id)
			->first();
		$lab_data = Laboratory::where('lab_status', 'tersedia')
		->get();
		// dd($user_data);
		return view('contents.content_form.form_laporan', compact('user_data', 'lab_data'));
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
	public function actionPengajuan(PengajuanPostRequest $request)
	{
		$user = DataAuth();
		$id = genIdPengajuan();
		// $datetime_start = date('Y-m-d H:i:s', strtotime($request->date_start.' '. $request->time_start));
		// $datetime_end = date('Y-m-d H:i:s', strtotime($request->date_end . ' ' . $request->time_end));
		if (rulesUser(['STUDENT'])) {
			if ($request->inp_pembimbing == null) {
				return redirect()->back()->withInput($request->input())->withErrors(['inp_pembimbing' => 'Dosen pembimbing belum dipilih, harap pilih dahulu.']);
			}else{
				$dosen_pembimbing = $request->inp_pembimbing;
			}
		}else{
			$dosen_pembimbing = null;
		}
		$start = $request->date_start.' '.$request->time_start;
		$datetime_start = Carbon::parse($start)->format('Y-m-d H:i:s');
		$end = $request->date_end . ' ' . $request->time_end;
		$datetime_end = Carbon::parse($end)->format('Y-m-d H:i:s');
		$idx_date_range = 0;
		$days = [];
		$data_sch = [];
		$idx_sch = 0;
		$id_sch = [];
		while ($datetime_start <= $datetime_end) {
			$days[$idx_date_range] = date('l', strtotime($datetime_start));
			$dateIn[$idx_date_range] = date('Y-m-d', strtotime($datetime_start));
			#non reguler
			$data_sch_non_reg = Lab_schedule::where('lbs_lab', $request->inp_lab)
			->where('lbs_dates_period','like', '%'. $datetime_start.'%')
			->orderBy('lbs_time_start', 'asc')
			->get();
			foreach ($data_sch_non_reg as $key => $value) {
				if ($value != null) {
					$id_sch[$idx_sch] = $value->lbs_id;
				}
				$idx_sch++;
			}
			$datetime_start = date("Y-m-d", strtotime("+1 day", strtotime($datetime_start)));
			$idx_date_range++;
		}
		#reguler
		$data_sch_reg = Lab_schedule::where('lbs_lab', $request->inp_lab)
		->whereIn('lbs_day', $days)
		->orderBy('lbs_time_start', 'asc')
		->get();
		foreach ($data_sch_reg as $key => $value) {
			$id_sch[$idx_sch] = $value->lbs_id;
		}
		if (count($id_sch) != null) {
			return redirect()->back()->withInput($request->input())
			->withErrors([
				'check_time' => 'Jadwal yang anda ajukan konflik dengan jadwal lain, mohon cek jadwal lab yang tersedia. <a href="'.url('jadwal_lab/'. $request->inp_lab).'"><span class="badge bg-blue">Lihat Jadwal</span></a>'
			]);
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
		foreach ($request->inp_fasiltas as $key => $value) {
			$data_fcl[$key] = [
				"lsf_submission" => $id,
				"lsf_facility_id" => $value
			];
		}
		$data_lab = Laboratory::leftjoin('users', 'laboratories.lab_head','=', 'users.id')
		->where('lab_id', $request->inp_lab)
		->select('lab_id','lab_name', 'lab_head','id')
		->first();
		if ($request->app_level == 'STUDENT') {
			$data_lecture = User::where('id',$request->inp_pembimbing)->first();
			$lecture = $data_lecture->name;
			$lecture_id = $data_lecture->no_id;
			$send_to = 'Dosen Pembimbing';
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
		#sting periods
		
		#data input
		$dt_pengajuan = [
			'lsb_id' => $id,
			'lsb_title' => $request->inp_judul,
			'lsb_activity' => $request->inp_kegiatan,
			'lsb_user_id' => $user->id,
			'lsb_user_head' => 3,
			'lsb_user_lecture' => $dosen_pembimbing,
			'lsb_user_subhead' => $data_lab->id,
			'lsb_user_tech' => null,
			'lsb_lab_id' => $request->inp_lab,
			'lsb_date_start' => $datetime_start,
			'lsb_date_end' => $datetime_end,
			'lsb_period' =>implode('$', $dateIn),
			'lsb_file_1' => $file_name,
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

		#storing
		$storeFacility = Lab_facility::insert($data_fcl);
		$actionStorePengajuan = Lab_submission::insert($dt_pengajuan);
		#sending mail
		if ($request->app_level == 'STUDENT') {
			Mail::to($data_lecture->email)->send(new NotifMail($data_applicant));
		} else {
			$data_head = User::where('level', 'LAB_HEAD')->first();
			Mail::to($data_head->email)->send(new NotifMail($data_applicant));
		}
		// return view('contents.content_notif_email.notif_1', compact('data_applicant'));
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
		$user_technical = User::leftJoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $data_pengajuan->lsb_user_tech)
		->select('id', 'name', 'usd_phone', 'email')
		->first();

		$acc_data_head = Lab_submission_acc::where('lsa_submission', $request->id)
		->where('lsa_user_id', $data_pengajuan->lsb_user_head)
		->first();
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

		if ($data_pengajuan->lsb_status == 'menunggu') {
			if ($data_pengajuan->level == 'STUDENT') {
				if ($acc_data_lecture == null) {
					if ($user->level == 'LAB_HEAD') {
						$acc_head = 'Menunggu persetujuan dari dosen pembimbing.';
						$acc_lecture = 'Proses persetujuan';
					}elseif($user->level == 'LECTURE'){
						$acc_head = 'Menunggu persetujuan';
						$acc_lecture = 'Proses persetujuan';
					}else{
						$acc_head = 'Menunggu persetujuan dari dosen pembimbing.';
						$acc_lecture = 'Proses persetujuan';
					}
				}else{
					$acc_head = 'Proses persetujuan';
					$acc_lecture = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_lecture->las_date_acc . '</b> oleh <b>' . $acc_data_lecture->las_username.'</b>';
					$acc_lecture .= '<br> <i>Catatan: ' . $lecture_notes . '</i>';
				}
			} else {
				$acc_head = 'Proses persetujuan';
			}
		}elseif ($data_pengajuan->lsb_status == 'disetujui') {
			if ($data_pengajuan->level == 'STUDENT') {
				$acc_head = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
				$acc_head.='<br> <i>Catatan: '. $head_notes.'</i>';
				$acc_lecture = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_lecture->las_date_acc . '</b> oleh <b>' . $acc_data_lecture->las_username . '</b>';
				$acc_lecture.= '<br> <i>Catatan: ' . $lecture_notes . '</i>';
			} else {
				$acc_head = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
			}
		}elseif ($data_pengajuan->lsb_status == 'ditolak' || $data_pengajuan->lsb_status == 'selesai') {
			if ($data_pengajuan->level == 'STUDENT') {
				if ($acc_data_head == null) {
					if ($user->level == 'LAB_HEAD') {
						$acc_head = 'Menunggu persetujuan';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						$acc_lecture = 'Pengajuan ditolak';
						$acc_lecture .= '<br> <i>Catatan: ' . $lecture_notes . '</i>';
					} elseif ($user->level == 'LECTURE') {
						$acc_head = 'Menunggu persetujuan';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						$acc_lecture = 'Pengajuan ditolak';
						$acc_lecture .= '<br> <i>Catatan: ' . $lecture_notes . '</i>';
					} else {
						$acc_head = 'Menunggu persetujuan';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						$acc_lecture = 'Pengajuan ditolak';
						$acc_lecture .= '<br> <i>Catatan: ' . $lecture_notes . '</i>';
					}
				}else{
					if ($user->level == 'LAB_HEAD') {
						$acc_head = 'Pengajuan ditolak';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						// $acc_lecture = 'Pengajuan ditolak';
					} elseif ($user->level == 'LECTURE') {
						$acc_head = 'Pengajuan ditolak';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						// $acc_lecture = 'Pengajuan ditolak | <button class="btn btn-flat btn-sm btn-default">Lihat Catatan</button>';
					} else {
						$acc_head = 'Pengajuan ditolak';
						$acc_head .= '<br> <i>Catatan: ' . $head_notes . '</i>';
						// $acc_lecture = 'Pengajuan ditolak | <button class="btn btn-flat btn-sm btn-default">Lihat Catatan</button>';
					}
				}
				// $acc_lecture = 'Pengajuan ditolak pada tanggal <b>' . $acc_data_lecture->las_date_acc . '</b> oleh <b>' . $acc_data_lecture->las_username . '</b>';
			} else {
				$acc_head = 'Pengajuan disetujui pada tanggal <b>' . $acc_data_head->las_date_acc . '</b> oleh <b>' . $acc_data_head->las_username . '</b>';
			}
		}
		$str_acc ='';
		if (rulesUser(['LECTURE'])) {
			if ($data_pengajuan->lsb_user_id == $data_pengajuan->lsb_user_lecture) {
				$str_acc.= '<tr>
				<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
				<td style="width: 80%;">' . $acc_head .'</td>
				</tr>';
			}else{
				if($data_pengajuan->level == 'STUDENT'){
					$str_acc .= '<tr>
					<td style="width: 20%;"><b>Persetujuan Dosen Pembimbing</b></td>
					<td style="width: 80%;">' . $acc_lecture . '</td></tr>';
					$str_acc .= '<tr>
					<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
					<td style="width: 80%;">'. $acc_head.'</td></tr>';
					
				}else{
					$str_acc .= '<tr>
					<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
					<td style="width: 80%;">' . $acc_head . '</td></tr>';
				}
			}
		}elseif (rulesUser(['LAB_HEAD', 'ADMIN_SYSTEM', 'ADMIN_MASTER', 'LAB_SUBHEAD', 'LAB_TECHNICIAN'])) {
			if ($data_pengajuan->level == 'STUDENT') {
				$str_acc .=	'<tr>
				<td style="width: 20%;"><b>Persetujuan Dosen Pembimbing</b></td>
				<td style="width: 80%;">' . $acc_lecture . '</td></tr>';
				$str_acc .='<tr>
				<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
				<td style="width: 80%;">' . $acc_head . '</td></tr>';
				
			} else {
				$str_acc .= '<tr>
				<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
				<td style="width: 80%;">' . $acc_head . '</td></tr>';
			}
		}elseif (rulesUser(['STUDENT'])) {
			$str_acc .=	'<tr>
			<td style="width: 20%;"><b>Persetujuan Dosen Pembimbing</b></td>
			<td style="width: 80%;">' . $acc_lecture . '</td></tr>';
			$str_acc .= '<tr>
			<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
			<td style="width: 80%;">' . $acc_head . '</td></tr>';
		}else{
			$str_acc .= '<tr>
			<td style="width: 20%;"><b>Persetujuan Kepala Lab</b></td>
			<td style="width: 80%;">' . $acc_head . '</td>
			</tr>';
		}
		// echo $data_pengajuan;
		// die($str_acc);
		return view('contents.content_pageview.view_detail_pengajuan', compact('data_pengajuan', 'data_facility', 'str_acc', 'acc_data_head', 'acc_data_lecture', 'user_kasublab', 'user_technical'));
		#code...
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
			$acc_data_lecture = Lab_submission_acc::join('users','lab_submission_accs.lsa_user_id','=','users.id')
			->where('lsa_submission', $request->id)
			->where('lsa_user_id', $data->lsb_user_lecture)
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
		// dd($data_pengajuan);
		$data = [
			'lsa_submission' => $request->lsb_id,
			'lsa_rule' => $user->level,
			'lsa_user_id' => $user->id,
			'las_username' => $user->name,
			'las_note' => $request->inp_catatan,
			'las_date_acc' => date('Y-m-d H:i:s')
		];
		Lab_submission_acc::insert($data);
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
		if ($data_pengajuan->lsb_activity == 'tp_penelitian') {
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
			// 'lecture_acc' => $acc_data_lecture->las_username.' disetujui pada tanggal '. setDate($acc_data_lecture->las_date_acc),
			// 'send_to' => 'Kepala Laboratorium Riset'
		];
		if ($data_pengajuan->level == 'STUDENT') {
			#Student Applicant
			if (rulesUser(['LAB_HEAD'])) {
				#Acceptable by head
				$acc_user = Lab_submission_acc::where('lsa_submission', $data_pengajuan->lsb_id)->get();
				$acc_lecture = $acc_user->where('lsa_rule', 'LECTURE')->count();
				if ($acc_lecture == null) {
					# if 
					return redirect()->back()->withErrors(['inp_error_a' => 'Pengajuan harus disetujui dosen pembimbing terlebish dahulu']);
				}else{
					
					$acc_data_head = Lab_submission_acc::where('lsa_submission', $request->lsb_id)
					->where('lsa_user_id', $data_pengajuan->lsb_user_head)
					->first();
					$acc_data_lecture = Lab_submission_acc::where('lsa_submission', $request->lsb_id)
					->where('lsa_user_id', $data_pengajuan->lsb_user_lecture)
					->first();
					if ($request->inp_acc == 'disetujui') {
						// Lab_schedule::insert($data_a);
						// Lab_submission::where('lsb_id', $data_pengajuan->lsb_id)->update(['lsb_status' => $request->inp_acc]);
						#
						// mail to student
						$data_subhead_ar = [
							'head_acc' => $acc_data_head->las_username . ', pada tanggal ' . setDate($acc_data_head->las_date_acc),
							'lecture_acc' => $acc_data_lecture->las_username . ', pada tanggal ' . setDate($acc_data_lecture->las_date_acc),
							'send_to' => 'Kepala Laboratorium Unesa',
						];
						// dd($data_subhead_ar);
						$data_applicant = array_merge($data_applicant, $data_subhead_ar);
						Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
						#
						$user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->first();
						Mail::to($user_subhead->email)->send(new NotifMail($data_applicant));
					}else{
						// mail to student
						$data_subhead_ar = [
							'head_acc' => $acc_data_head->las_username . ', pada tanggal ' . setDate($acc_data_head->las_date_acc),
						];
						$data_applicant = array_merge($data_applicant, $data_subhead_ar);
						Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantReject($data_applicant));
					}
					
				}
			}elseif(rulesUser(['LECTURE'])){
				$acc_data_lecture = Lab_submission_acc::where('lsa_submission', $request->lsb_id)
				->where('lsa_user_id', $data_pengajuan->lsb_user_lecture)
				->first();
				if ($request->inp_acc == 'disetujui') {
					#Acceptable by lecture
					// mail to head
					$data_lecture_ar = [
						'lecture_acc' => $acc_data_lecture->las_username . ', pada tanggal ' . setDate($acc_data_lecture->las_date_acc),
						'send_to' => 'Kepala Laboratorium Unesa',
					];
					$data_applicant = array_merge($data_applicant, $data_lecture_ar);
					$user_head = User::where('id', $data_pengajuan->lsb_user_head)->first();
					Mail::to($user_head->email)->send(new NotifMail($data_applicant));
				}else {
					$data_lecture_ar = [
						'lecture_acc' => $acc_data_lecture->las_username . ', pada tanggal ' . setDate($acc_data_lecture->las_date_acc),
					];
					$data_applicant = array_merge($data_applicant, $data_lecture_ar);
					Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantRejectByLecture($data_applicant));
				}
			}
		}else{
			#Other Student Applicant
			$user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->first();
			$acc_data_head = Lab_submission_acc::where('lsa_submission', $request->lsb_id)
			->where('lsa_user_id', $data_pengajuan->lsb_user_head)
			->first();
			if ($request->inp_acc == 'disetujui') {
				// Lab_schedule::insert($data_a);
				// Lab_submission::where('lsb_id', $data_pengajuan->lsb_id)->update(['lsb_status' => $request->inp_acc]);
				# mail to applicant
				$data_head_ar = [
					'head_acc' => $acc_data_head->las_username . ', pada tanggal ' . setDate($acc_data_head->las_date_acc),
				];
				$data_applicant = array_merge($data_applicant, $data_head_ar);
				Mail::to($data_pengajuan->email)->send(new NotifMailForApplicant($data_applicant));
				#
				$user_subhead = User::where('id', $data_pengajuan->lsb_user_subhead)->first();
				Mail::to($user_subhead->email)->send(new NotifMail($data_applicant));
			}else{
				// Lab_submission::where('lsb_id', $data_pengajuan->lsb_id)->update(['lsb_status' => $request->inp_acc]);
				// mail to applicant
				$data_head_ar = [
					'head_acc' => $acc_data_head->las_username . ', pada tanggal ' . setDate($acc_data_head->las_date_acc),
				];
				$data_applicant = array_merge($data_applicant, $data_head_ar);
				Mail::to($data_pengajuan->email)->send(new NotifMailForApplicantReject($data_applicant));
			}
		}
		// return redirect()->back();
	}
	/* Tags:... */
	public function actionSettechnical(Request $request)
	{
		$data = [
			'lsb_user_tech' => $request->inp_teknisi,
		];
		Lab_submission::where('lsb_id', $request->lsb_id)->update(['lsb_user_tech' => $request->inp_teknisi]);
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
}