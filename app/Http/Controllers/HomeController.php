<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Lab_submission;
use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\User;

class HomeController extends Controller
{
	
	public function viewLanding(Request $request)
	{
		return view('contents.content_pageview.view_landing');
	}
	public function HomeSystem(Request $request)
	{
		$user = DataAuth();
		if (rulesUser(['LAB_HEAD','LAB_SUBHEAD', 'ADMIN_SYSTEM', 'ADMIN_MASTER','ADMIN_PRODI', 'LAB_TECHNICIAN'])) {
			$user_count = User::whereIn('level', ['LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 'LAB_TECHNICIAN', 'ADMIN_PRODI'])->count();
			$subDate = Carbon::now()->subMonths(3);
			$addDate = Carbon::now()->addMonths(3);
			$period = CarbonPeriod::create($subDate, '1 month', $addDate);
			# ==
			if (rulesUser(['LAB_HEAD', 'ADMIN_SYSTEM', 'ADMIN_MASTER', 'ADMIN_PRODI'])) {
				$sub_count_entry= Lab_submission::whereIn('lsb_status', ['menunggu'])
				->count();
				$sub_count_acc = Lab_submission::whereIn('lsb_status', ['disetujui','selesai'])
				->count();
				$lab_count = Laboratory::count();
				foreach ($period as $key => $value) {
					$month_item = date('m', strtotime($value));
					$sub_count['all'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->count();
					$sub_count['tp_penelitian'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->where('lsb_activity', 'tp_penelitian')
					->count();
					$sub_count['tp_pelatihan'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->where('lsb_activity', 'tp_pelatihan')
					->count();
					$sub_count['tp_pengabdian_masyarakat'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->where('lsb_activity', 'tp_pengabdian_masyarakat')
					->count();
					$sub_count['tp_magang'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->where('lsb_activity', 'tp_magang')
					->count();
					$sub_count['tp_lain_lain'][$key] = Lab_submission::whereMonth('lsb_date_start', $month_item)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->where('lsb_activity', 'tp_lain_lain')
					->count();
				}
			}else{
				if (rulesUser(['LAB_SUBHEAD'])){
					$lab_count = Laboratory::where('lab_head', $user->id)->count();
					$sub_count_entry = Lab_submission::where('lsb_user_subhead', $user->id)
					->whereIn('lsb_status', ['menunggu'])
					->count();
					$sub_count_acc = Lab_submission::where('lsb_user_subhead', $user->id)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->count();
					foreach ($period as $key => $value) {
						$month_item = date('m', strtotime($value));
						$sub_count['all'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->count();
						$sub_count['tp_penelitian'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_penelitian')
						->count();
						$sub_count['tp_pelatihan'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_pelatihan')
						->count();
						$sub_count['tp_pengabdian_masyarakat'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_pengabdian_masyarakat')
						->count();
						$sub_count['tp_magang'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_magang')
						->count();
						$sub_count['tp_lain_lain'][$key] = Lab_submission::where('lsb_user_subhead', $user->id)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_lain_lain')
						->count();
					}
				}elseif(rulesUser(['LAB_TECHNICIAN'])){
					$lab_ar = Laboratory_technician::where('lat_tech_id', $user->id)->get();
					$lab_ids = [];
					foreach ($lab_ar as $key => $value) {
						$lab_ids[$key] = $value->lat_laboratory;
					}
					$lab_count = Laboratory::whereIn('lab_id',$lab_ids)->count();
					$sub_count_entry = Lab_submission::where('lsb_user_tech', $user->id)
					->whereIn('lsb_status', ['menunggu'])
					->count();
					$sub_count_acc = Lab_submission::where('lsb_user_tech', $user->id)
					->whereIn('lsb_status', ['disetujui', 'selesai'])
					->count();
					foreach ($period as $key => $value) {
						$month_item = date('m', strtotime($value));
						$sub_count['all'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->count();
						$sub_count['tp_penelitian'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_penelitian')
						->count();
						$sub_count['tp_pelatihan'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_pelatihan')
						->count();
						$sub_count['tp_pengabdian_masyarakat'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_pengabdian_masyarakat')
						->count();
						$sub_count['tp_magang'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_magang')
						->count();
						$sub_count['tp_lain_lain'][$key] = Lab_submission::whereIn('lab_id', $lab_ids)
						->whereMonth('lsb_date_start', $month_item)
						->whereIn('lsb_status', ['disetujui', 'selesai'])
						->where('lsb_activity', 'tp_lain_lain')
						->count();
					}
				}
			}
			$sum_all = array_sum($sub_count['all']);
			if ($sum_all == 0) {
				# code...
				$counting_submission = [
					"all" => 0,
					"tp_penelitian" => [
						0 => 0,1 => 0,
					],
					"tp_pelatihan" => [
						0 => 0,1 => 0,
					],
					"tp_pengabdian_masyarakat" => [
						0 => 0,1 => 0,
					],
					"tp_magang" => [
						0 => 0,1 => 0,
					],
					"tp_lain_lain" => [
						0 => 0,1=> 0,
					],
				];
			}else{
				$counting_submission = [
					"all" => array_sum($sub_count['all']),
					"tp_penelitian" => [
						0 => array_sum($sub_count['tp_penelitian']),
						1 => round(100 * (array_sum($sub_count['tp_penelitian']) / array_sum($sub_count['all'])), 2) 
					],
					"tp_pelatihan" => [
						0 => array_sum($sub_count['tp_pelatihan']),
						1 => round(100 * (array_sum($sub_count['tp_pelatihan']) / array_sum($sub_count['all'])), 2)
					],
					"tp_pengabdian_masyarakat" => [
						0 => array_sum($sub_count['tp_pengabdian_masyarakat']),
						1 => round(100 * (array_sum($sub_count['tp_pengabdian_masyarakat']) / array_sum($sub_count['all'])), 2)
					],
					"tp_magang" => [
						0 => array_sum($sub_count['tp_magang']),
						1 => round(100 * (array_sum($sub_count['tp_magang']) / array_sum($sub_count['all'])), 2)
					],
					"tp_lain_lain" => [
						0 => array_sum($sub_count['tp_lain_lain']),
						1 => round(100 * (array_sum($sub_count['tp_lain_lain']) / array_sum($sub_count['all'])), 2)
					],
				];
			}
			
			return view('contents.content_start.home_app_manager',compact('counting_submission', 'sub_count_entry', 'sub_count_acc', 'lab_count', 'user_count'));
			// die('test');
		}elseif(rulesUser(['STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER','LECTURE'])){
			return view('contents.content_start.home_tenant');
		}
	}
	public function HomeRecipient(Request $request)
	{
		return view('contents.content_i.home');
	}
}
