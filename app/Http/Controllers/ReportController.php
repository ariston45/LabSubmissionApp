<?php

namespace App\Http\Controllers;

use App\Models\Lab_sub_order;

use App\Models\Lab_submission;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

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
		if ($request->inp_lab == 'all') {
			$lab_ids = Laboratory::select('lab_id')->get();
		} else {
			$lab_ids = Laboratory::select('lab_id')->where('lab_id', $request->inp_lab)->get();
		}
		$ids = [];
		foreach ($lab_ids as $key => $value) {
			$ids[$key] = $value->lab_id;
		}
		$data_subs = [];
		$data_subs_value = [];
		$data_idx = 0;
		foreach ($period as $key => $value) {
			$date_param = date('Y-m-d',strtotime($value));
			$data_submission[$key] = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id','=','users.id')
			->leftjoin('laboratories','lab_submissions.lsb_lab_id','=','laboratories.lab_id')
			->leftJoin('lab_sub_orders', 'lab_submissions.lsb_id','=', 'lab_sub_orders.los_lsb_id')
			->leftJoin('lab_submission_results', 'lab_submissions.lsb_id', '=', 'lab_submission_results.lsr_lsb_id')
			->whereIn('lsb_lab_id', $ids)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_period','like','%'.$date_param.'%')
			->select('lsb_id','id','lab_id','lsb_title','lsb_date_start','lsb_date_end','lab_name','name', 'los_cost_total', 'lsr_status', 'lsr_filename','lsb_file_1')
			->get();

			if ($data_submission[$key] != null) {
				foreach ($data_submission[$key] as $skey => $svalue) {
					if ($svalue->lsr_status == 'true') {
						$btn_download_report = '<a href="' . route('download_result_report', ['filename' => $svalue->lsr_filename]) . '"><button class="btn btn-flat btn-xs btn-default">Download</button></a>';
					} else {
						$btn_download_report = '-';
					}
					if ($svalue->lsb_file_1 == null) {
						$btn_download_letter = '-';
					} else {
						$btn_download_letter = '<a href="' . route('download_bukti_bayar', ['filename' => $svalue->lsb_file_1]) . '"><button class="btn btn-flat btn-xs btn-default">Download</button></a>';
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
						'cost' => funCurrencyRupiah($svalue->los_cost_total),
						'download_laporan' => $btn_download_report,
						'download_letter' => $btn_download_letter,
					];
					$data_idx++;
				}
			}
		}
		// dd($data_subs);
		return redirect()->back()->with('data_report', $data_subs);
	}
	public function actionReportOrder(Request $request)
	{
		$period = CarbonPeriod::create($request->date_start, $request->date_end);
		if ($period == null) {
			return redirect()->back()->withInput()->withErrors('date_error', 'data error');
		}
		if ($request->inp_lab == 'all') {
			$lab_ids = Laboratory::select('lab_id')->get();
		} else {
			$lab_ids = Laboratory::select('lab_id')->where('lab_id', $request->inp_lab)->get();
		}
		$ids = [];
		foreach ($lab_ids as $key => $value) {
			$ids[$key] = $value->lab_id;
		}
		$data_subs = [];
		$data_subs_value = [];
		$data_idx = 0;
		foreach ($period as $key => $value) {
			$date_param = date('Y-m-d', strtotime($value));
			$data_submission[$key] = Lab_submission::leftjoin('users', 'lab_submissions.lsb_user_id', '=', 'users.id')
			->leftjoin('laboratories', 'lab_submissions.lsb_lab_id', '=', 'laboratories.lab_id')
			->leftJoin('lab_sub_orders', 'lab_submissions.lsb_id', '=', 'lab_sub_orders.los_lsb_id')
			->whereIn('lsb_lab_id', $ids)
			->whereIn('lsb_status', ['disetujui', 'selesai'])
			->where('lsb_period', 'like', '%' . $date_param . '%')
			->select('lsb_id', 'id', 'lab_id', 'lsb_title', 'lsb_date_start', 'lsb_date_end', 'lab_name', 'name', 'los_cost_total','no_id', 'lab_submissions.created_at as date_order')
			->get();
			if ($data_submission[$key] != null) {
				foreach ($data_submission[$key] as $skey => $svalue) {
					$data_subs_value[$svalue->lsb_id] = $svalue->los_cost_total;
					$data_order = Lab_sub_order::join('lab_sub_order_details', 'lab_sub_order_details.lod_los_id','=', 'lab_sub_orders.los_id')
					->where('los_lsb_id', $svalue->lsb_id)
					->get();
					$web = '';
					$pot = 0;
					$ch=0;
					foreach ($data_order as $key => $value) {
						if ($value->lod_item_type == 'reduction') {
							$pot = $value->lod_cost;
						} else {
							$web.= $value->lod_item_name.' ('. funCurrencyRupiah($value->lod_cost).'), ';
							$ch = $ch + $value->lod_cost;
						}
					}
					$title = 'Data Report Order Periode '.date('d-M-Y',strtotime($request->date_start)).' Sampai '. date('d-M-Y', strtotime($request->date_end));
					$data_subs[$svalue->lsb_id] = [
						'id' => $svalue->lsb_id,
						'title' => $title,
						'date_order' => $svalue->date_order,
						'no_id' => $svalue->no_id,
						'user' => $svalue->name,
						'lab' => $svalue->lab_name,
						'fasilitas' => $web,
						'potongan' => funCurrencyRupiah($pot),
						'total' => funCurrencyRupiah($svalue->los_cost_total),
					];
					$data_push[$svalue->lsb_id] = [
						'id' => $svalue->lsb_id,
						'title' => $title,
						'date_order' => $svalue->date_order,
						'no_id' => $svalue->no_id,
						'user' => $svalue->name,
						'lab' => $svalue->lab_name,
						'fasilitas' => $web,
						'biaya_fasilitas' => funCurrencyRupiah($ch),
						'potongan' => funCurrencyRupiah($pot),
						'total' => funCurrencyRupiah($svalue->los_cost_total),
					];
					$data_idx++;
				}
			}
		}
		$new_index = $data_idx +1;
		$all_total = array_sum($data_subs_value);
		$data_push[$new_index] = [
			'id' => null,
			'title' => null,
			'date_order' => null,
			'no_id' => null,
			'user' => null,
			'lab' => null,
			'fasilitas' => null,
			'potongan' => null,
			'total' => funCurrencyRupiah($all_total),
		];
		$data_subs[$new_index] = [
			'id' => null,
			'title' => null,
			'date_order' => null,
			'no_id' => null,
			'user' => null,
			'lab' => json_encode($data_push),
			'fasilitas' => null,
			'potongan' => null,
			'total' => funCurrencyRupiah($all_total),
		];
		return redirect()->back()->with('data_report', $data_subs);
	}
	public function actionExcelIncome(Request $request)
	{
		$data_report = json_decode($request->income_json_data);
		// dd($data_report);
		$i = 0;
		$cn = 0;
		foreach ($data_report as $key => $value) {
			if ($value->id != null) {
				$title = $value->title;
				$data[$i] = [
					0 => $i+1,
					1 => $value->no_id,
					2 => $value->user,
					3 => $value->lab,
					4 => $value->date_order,
					5 => $value->fasilitas,
					6 => $value->biaya_fasilitas,
					7 => $value->potongan,
					8 => $value->total 
				];
				$i++;
			}else{
				$cn = $value->total;
			}
		}
		// dd($data);
		#
		// Membuat objek spreadsheet baru
		$spreadsheet = new Spreadsheet();
		#Get Set Active
		$sheet = $spreadsheet->getActiveSheet();
		#Set Header
		$headers = ['No', 'No.Id', 'Nama', 'Laboratorium','Tanggal Order','Alat & Fasilitas','Biaya Sebelum Dipotong','Potongan','Total Biaya'];
		$columnIndex = 'A';
		foreach ($headers as $header) {
			$sheet->setCellValue($columnIndex . '2', $header);
			$columnIndex++;
		}
		$sheet->mergeCells('A1:I1');
		$sheet->setCellValue('A1', $title);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A1')->getFont()->setBold(true);
		#Header Option
		$headerRange = 'A2:I2';
		$sheet->getStyle($headerRange)->getFont()->setBold(true);
		$sheet->getStyle($headerRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle($headerRange)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFE599');
		$sheet->getStyle($headerRange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
		foreach (range('A','I') as $columnID) {
			$sheet->getColumnDimension($columnID)->setAutoSize(true);
		}
		#Set Data
		$rowNumber = 3;
		foreach ($data as $row) {
			$columnIndex = 'A';
			foreach ($row as $cell) {
				$sheet->setCellValue($columnIndex . $rowNumber, $cell);
				$columnIndex++;
			}
			$rowNumber++;
		}
		$bodyrange = 'A3:I'.$rowNumber;
		$sheet->mergeCells('A'. $rowNumber.':H'.$rowNumber);
		$sheet->setCellValue('A'. $rowNumber, 'Total');
		$sheet->getStyle('A' . $rowNumber)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('A' . $rowNumber . ':I' . $rowNumber)->getFont()->setBold(true);
		$sheet->getStyle($bodyrange)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
		$sheet->setCellValue('I'. $rowNumber, $cn);
		$date = date('d_m_y_H_i_s'); 
		// Menyimpan file Excel ke dalam sistem file
		$writer = new Xlsx($spreadsheet);
		$filePath = public_path('Data_laporan_order_'.$date.'.xlsx');
		$writer->save($filePath);
		return response()->download($filePath);
		
	}
}
