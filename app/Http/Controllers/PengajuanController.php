<?php

namespace App\Http\Controllers;

use App\Models\Lab_facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PengajuanPostRequest;
use App\Models\Lab_submission;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use DataTables;
use Storage;
// use PDF;

class PengajuanController extends Controller
{
	/* Tags:... */
	public function dataPengajuan(Request $request)
	{
		return view('contents.content_datalist.data_pengajuan');
	}
	/* Tags:... */
	public function formPengajuan(Request $request)
	{
		$user = Auth::user();
		$user_data = User::leftJoin('user_details','users.id','=','user_details.usd_user')
		->where('id',$user->id)
		->first();
		// dd($user_data);
		return view('contents.content_form.form_pengajuan',compact('user_data'));
	}
	/* Tags:... */
	public function actionPengajuan(PengajuanPostRequest $request)
	{
		$user = DataAuth();
		$id = genIdPengajuan();
		$datetime_start = date('Y-m-d H:i:s', strtotime($request->date_start.' '. $request->time_start));
		$datetime_end = date('Y-m-d H:i:s', strtotime($request->date_end . ' ' . $request->time_end));
		$getFile = $request->file('bukti_pembayaran');
		if ($getFile == true) {
			$file_name = $fileRename = date('Ymd').'_'.date('His').'_'.$user->email.'.'. $getFile->extension();
			$filePath = $getFile->storeAs('public/bukti_bayar', $fileRename);
		}else{
			$file_name = null;
		}
		$dt_pengajuan = [
			'lsb_id' => $id,
			'lsb_title' => $request->inp_judul,
			'lsb_activity' => $request->inp_kegiatan,
			'lsb_user_id' => $user->id,
			'lsb_lab_id' => null,
			'lsb_date_start' => $datetime_start,
			'lsb_date_end' => $datetime_end,
			'lsb_file_1' => $file_name,
		];
		$actionStorePengajuan = Lab_submission::insert($dt_pengajuan);
		if ($user->level == 'STUDENT') {
			# code...
		}else{

		}
		return redirect()->route('viewpage_pengajuan', ['id' => $id]);
	}
	/* Tags:... */
	public function viewDetailPengajuan(Request $request)
	{
		$data_pengajuan = Lab_submission::join('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
		->leftJoin('user_details', 'users.id','=', 'user_details.usd_user')
		->leftJoin('laboratories', 'lab_submissions.lsb_lab_id','=', 'laboratories.lab_id')
		->where('lsb_id', $request->id)
		->select('name', 'no_id', 'usd_prodi', 'usd_fakultas', 'usd_universitas', 'usd_address', 'usd_phone', 'lsb_activity', 'lsb_title', 'lsb_date_start', 'lsb_date_end', 'lsb_date_end')
		->first();
		$data_facility = Lab_facility::join('laboratory_facilities', 'lab_facilities.lsf_facility_id','=','laboratory_facilities.laf_id')
		->where('lab_facilities.lsf_submission', $request->id)
		->select('laf_name', 'laf_id', 'lsf_id')
		->get();
		return view('contents.content_pageview.view_detail_pengajuan', compact('data_pengajuan', 'data_facility'));
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
	public function convertPDFPengajuan(Request $request)
	{
		// return view('contents.content_pageview.view_pengajuan_pdf'); die();
		$pdf = Pdf::loadview('contents.content_pageview.view_pengajuan_pdf');
		return $pdf->download('laporan-pegawai-pdf.pdf');
	}
	/* Tags:... */
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
					<li><a href="'.url('pengajuan/detail-pengajuan').'/'.$data->lsb_id. '"><i class="ri-eye-2-line" aria-hidden="true" style="margin-right:12px;"></i>Lihat Detail</a></li>
					<li role="separator" class="divider" style="margin-top: 0px;margin-bottom: 0px;"></li>
					<li><a href="' . url('pengajuan/pembatalan-pengajuan') . '/' . $data->lsb_id . '" class="del-siswa" id="'.$data->lsb. '"><i class="ri-close-circle-line" aria-hidden="true" style="margin-right:12px;"></i>Batal</a></li>
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
			}else{
				$res = 'Lain-lain.';
			}
			return $res;
		})
		->addColumn('judul', function ($data) {
			return $data->lsb_title;
		})
		->addColumn('waktu', function ($data) {
			$dt1 = date('d M Y',strtotime($data->lsb_date_start));
			$dt2 = date('d M Y', strtotime($data->lsb_date_end));
			$res = $dt1 .'  s/d  '. $dt2;
			return $res;
		})
		->addColumn('status', function ($data) {
			return '<div style="text-align:center;"><span class="badge bg-blue">Disetujui Kalab</span><span class="badge bg-blue">Disetujui Kalab</span></div>';
		})
		->rawColumns(['opsi', 'kegiatan', 'judul','status','waktu'])
		->make(true);
	}
}