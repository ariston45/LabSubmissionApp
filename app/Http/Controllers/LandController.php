<?php

namespace App\Http\Controllers;

use App\Models\Lab_labtest;
use App\Models\Lab_submission;
use Illuminate\Http\Request;

use App\Models\Ft_group;
use App\Models\Laboratory;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_labtest_facility;
use App\Models\User;
use App\Models\Laboratory_technician;
use App\Models\Laboratory_working_time;
use DB;


class LandController extends Controller
{
	/* Tags:... */
	public function viewFirstPage(Request $request)
	{
		$count_lab = Laboratory::count();
		$count_labtest = Laboratory_labtest::count();
		$count_facility = Laboratory_facility::count();
		$count_technician = User::where('level', 'LAB_TECHNICIAN')->count();
		$count_submission = Lab_submission::select('lsb_lab_id as id', DB::raw('count(*) as count'))->groupBy('lsb_lab_id')->limit(5)->get();
		$data_lab = [];
		foreach ($count_submission->sortByDesc('id') as $key => $value) {
			$lab = Laboratory::where('lab_id',$value->id)->where('lab_status', 'tersedia')->first();
			$data_lab[$key] = [
				'id' => $value->id,
				'lab_name' => $lab->lab_name,
				'notes_short' => $lab->lab_note_short,
				'notes' => $lab->lab_notes,
				'img' => $lab->lab_img
			]; 
		}
		$data_labtest = Lab_labtest::join('laboratory_labtests','lab_labtests.ltd_labtest','=', 'laboratory_labtests.lsv_id')
		->join('lab_submissions', 'lab_labtests.ltd_submission','=', 'lab_submissions.lsb_id')
		->groupBy('ltd_labtest')
		->select('ltd_labtest', DB::raw('count(ltd_submission) as count_submission'), 'laboratory_labtests.*')
		->orderByDesc('count_submission')
		->get();
		// dd($count_labtest);
		return view('contents.content_landing.first_landing',compact('count_lab', 'count_labtest', 'count_facility', 'count_technician', 'data_lab', 'data_labtest'));
	}
	/* Tags:... */
	public function viewLaboratoriumPage(Request $request)
	{
		$group = Ft_group::get();
		return view('contents.content_landing.page_laboratorium',compact('group'));
	}
	/* Tags:... */
	public function viewLayananPage(Request $request)
	{
		$data = Laboratory::join('ft_groups', 'laboratories.lab_group', '=', 'ft_groups.lag_id')
		->get();
		$group = Ft_group::get();
		return view('contents.content_landing.page_layanan',compact('group','data'));
	}
	/* Tags:... */
	public function viewKontakPage(Request $request)
	{
		return view('contents.content_landing.page_kontak');
	}
	/* Tags:... */
	public function viewpanduanPage(Request $request)
	{
		return view('contents.content_landing.page_panduan');	
	}
	/* Tags:... */
	public function viewpanduanPageRule(Request $request)
	{
		if (DataAuth()) {
			if (DataAuth()->level == 'LAB_HEAD') {
				return view('contents.content_landing.page_panduan_kalab');
			}elseif (DataAuth()->level == 'PUBLIC_MEMBER') {
				return view('contents.content_landing.page_panduan_public');
			} elseif (DataAuth()->level == 'STUDENT') {
				return view('contents.content_landing.page_panduan_mahasiswa');
			} elseif (DataAuth()->level == 'PUBLIC_NON_MEMBER') {
				return view('contents.content_landing.page_panduan_publik_non_unesa');
			} elseif (DataAuth()->level == 'LAB_SUBHEAD') {
				return view('contents.content_landing.page_panduan_kasublab');
			} elseif (DataAuth()->level == 'ADMIN_PRODI') {
				return view('contents.content_landing.page_panduan_admin_prodi');
			} elseif (DataAuth()->level == 'ADMIN_MASTER') {
				return view('contents.content_landing.page_panduan_administrator');
			} elseif (DataAuth()->level == 'LECTURE') {
				return view('contents.content_landing.page_panduan_dosen');
			} elseif (DataAuth()->level == 'LAB_TECHNICIAN') {
				return view('contents.content_landing.page_panduan_teknisi');
			}
		} else {
			return view('contents.content_landing.page_panduan');
		}
	}
	/* Tags:... */
	public function viewLaboratoriumDetail(Request $request)
	{
		$lab_id = $request->id;
		$data_lab = Laboratory::leftJoin('users','laboratories.lab_head','=','users.id')
		->where('lab_id',$request->id)
		->first();
		$data_technicians = Laboratory_technician::leftJoin('users', 'laboratory_technicians.lat_tech_id','=','users.id')
		->where('lat_laboratory', $request->id)
		->get();
		$data_time = Laboratory_working_time::join('laboratories', 'laboratory_working_times.ltw_lab_id','=', 'laboratories.lab_id')
		->where('lab_id', $request->id)
		->get();
		$data_uji_lab = Laboratory_labtest::join('laboratories', 'laboratory_labtests.lsv_lab_id', '=', 'laboratories.lab_id')
		->where('lab_id', $request->id)
		->get();
		$data_facility = Laboratory_facility::join('laboratories', 'laboratory_facilities.laf_laboratorium','=','laboratories.lab_id')
		->where('lab_id', $request->id)
		->get();
		$user_kalab = User::where('level', 'LAB_HEAD')->get();
		return view('contents.content_landing.detail_laboratorium',compact('lab_id','user_kalab','data_lab', 'data_technicians', 'data_time', 'data_uji_lab', 'data_facility'));
	}

	public function viewUjiLabDetail(Request $request)
	{
		$id_labtest = $request->id;

		$data_labtest = Laboratory_labtest::Join('laboratories', 'laboratory_labtests.lsv_lab_id', '=', 'laboratories.lab_id')
		->leftjoin('laboratory_options', 'laboratory_labtests.lsv_lab_id', '=', 'laboratory_options.lop_lab_id')
		->leftjoin('users', 'laboratories.lab_head','=', 'users.id')
		->where('lsv_id', $id_labtest)
		->first();

		$user_kalab = User::where('level', 'LAB_HEAD')
		->get();

		$data_technicians = Laboratory_technician::leftJoin('users', 'laboratory_technicians.lat_tech_id', '=', 'users.id')
		->where('lat_laboratory', $data_labtest->lsv_lab_id)
		->get();

		$data_time = Laboratory_working_time::join('laboratories', 'laboratory_working_times.ltw_lab_id', '=', 'laboratories.lab_id')
		->where('lab_id', $data_labtest->lsv_lab_id)
		->get();
		$data_facility = Laboratory_labtest_facility::join('laboratory_facilities', 'laboratory_labtest_facilities.lst_facility', '=', 'laboratory_facilities.laf_id')
		->where('lst_lsv_id', $data_labtest->lsv_id)
		->get();
		// dd($data_labtest);
		$data = Laboratory::join('ft_groups', 'laboratories.lab_group', '=', 'ft_groups.lag_id')
		->where('lab_id', $request->id)
		->first();
		return view('contents.content_landing.detail_ujilab', compact('data_labtest', 'user_kalab', 'data_technicians', 'data_time', 'data_facility'));
	}

	/* Tags:... */
	public function test(Request $request)
	{
		if (request()->is('test*') == true) {
			echo 1;
		}
		// echo 1;
	}

	/* Tags:... */
	public function viewAboutUnesapage(Request $request)
	{
		return view('contents.content_landing.page_about_unesa');
	}
	/* Tags:... */
	public function viewAboutLabTekpage(Request $request)
	{
		return view('contents.content_landing.page_about_lab_fak_teknik');
	}
	/* Tags:... */
	public function viewAboutApp(Request $request)
	{
		return view('contents.content_landing.page_about_app');
	}
}
