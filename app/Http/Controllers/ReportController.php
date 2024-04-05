<?php

namespace App\Http\Controllers;

use App\Models\Lab_submission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ReportController extends Controller
{
	/* Tags:... */
	public function viewReportSubmission(Request $request)
	{
		return view('contents.content_pageview.view_report_submission');
	}
	/* Tags:... */
	public function viewReportLab(Request $request)
	{
		return view('contents.content_pageview.view_report_lab');
	}
	/* Tags:... */
	public function actionReportPengajuan(Request $request)
	{
		$period = CarbonPeriod::create($request->date_start, $request->date_end);
		if ($period == null) {
			return redirect()->back()->withInput()->withErrors('date_error', 'data error');
		}
		$data_subs = [];
		$data_idx = 0;
		foreach ($period as $key => $value) {
			$date_param = date('Y-m-d',strtotime($value));
			$data_submission[$key] = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id','=','users.id')
			->leftjoin('laboratories','lab_submissions.lsb_lab_id','=','laboratories.lab_id')
			->where('lsb_period','like','%'.$date_param.'%')
			->select('lsb_id','id','lab_id','lsb_title','lsb_date_start','lsb_date_end','lab_name','name')
			->get();
			if ($data_submission[$key] != null) {
				foreach ($data_submission[$key] as $skey => $svalue) {
					if ($svalue->lsb_file_2 == null) {
						$btn_download_report = '-';
					} else {
						$btn_download_report = '<a href="' . route('download_bukti_bayar', ['filename' => $svalue->lsb_file_2]) . '"><button class="btn btn-flat btn-xs btn-default">Download</button></a>';
					}
					$dt1 = date('d M Y', strtotime($svalue->lsb_date_start));
					$dt2 = date('d M Y', strtotime($svalue->lsb_date_end));
					$time_str = $dt1 . '  <b>s/d</b>  ' . $dt2;
					$data_subs[$svalue->lsb_id] = [
						'id' => $svalue->lsb_id,
						'user' => $svalue->name,
						'judul' => $svalue->lsb_title,
						'waktu' => $time_str,
						'lab' => $svalue->lab_name,
						'download_laporan' => $btn_download_report,
					];
					$data_idx++;
				}
			}
		}
		return redirect()->back()->with('data_report', $data_subs);
	}
}
