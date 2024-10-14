<?php

namespace App\Http\Controllers;

use App\Models\Laboratory_group;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPostUpdateRequest;
use App\Models\Unesa_data;
use App\Models\User;
use App\Models\User_detail;
use Str;
use Auth;
use Storage;

class PengaturanController extends Controller
{
	/* Tags:... */
	public function viewManagementUser(Request $request)
	{
		return view('contents.content_datalist.data_user');
	}
	/* Tags:... */
	public function formInputUser(Request $request)
	{
		$data_rumpun = Laboratory_group::get();
		return view('contents.content_form.form_input_user',compact('data_rumpun'));
	}
	public function formInputSmtp(Request $request)
	{
		return view('contents.content_form.form_input_smtp');
	}
	/* Tags:... */
	public function actionInputUser(UserPostRequest $request)
	{
		$id = genIdUser();
		$data = [
			'id' => $id,
			'no_id' => $request->inp_no_id,
			'username' => null,
			'status' => 'active',
			'email' => $request->inp_email,
			'nip' => $request->inp_nip,
			'rumpun_id' => $request->rumpun,
			'name' => $request->inp_name,
			'level' => $request->inp_level,
			'email_verified_at' => date('Y-m-d H:i:s'),
			'password' => bcrypt($request->password)
		];
		$data_ii = [
			'usd_user' => $id,
			'usd_phone' => $request->inp_no_contact,
			'usd_address' => $request->inp_address,
			'usd_prodi' => $request->inp_prodi,
			'usd_fakultas' => $request->inp_fakultas,
			'usd_universitas' => $request->inp_institusi,
		];
		$check_email = User::where('email', $request->inp_email)->first();
		if ($check_email != null) {
			return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah didaftarkan.']);
		}
		$storeUser = User::insert($data);
		User_detail::insert($data_ii);
		return redirect()->route('setting_user');
	}
	public function actionUpdateUser(UserPostUpdateRequest $request)
	{
		$id_user = $request->id;
		$id_user_detail = $request->usd_id;
		$cek_user = User::where('id', $id_user)->first();
		if ($cek_user->email == $request->inp_email) {
			$email = $cek_user->email;
		} else {
			$email = $request->inp_email;
			$cek_email = User::where('email', $email)->first();
			if ($cek_email->count() > 0) {
				return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah terdaftar.']);
			}
		}
		if ($request->inp_password == null) {
			# code...
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'status' =>  $request->inp_status,
				'email' => $request->inp_email,
				'name' => $request->inp_name,
				'level' => $request->inp_level,
				'nip' => $request->inp_nip,
				'rumpun_id' => $request->rumpun,
			];
		}else{
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'status' => $request->inp_status,
				'email' => $request->inp_email,
				'name' => $request->inp_name,
				'level' => $request->inp_level,
				'password' => bcrypt($request->inp_password),
				'nip' => $request->nip,
				'rumpun_id' => $request->rumpun,
			];
		}
		
		if ($id_user_detail == null) {
			$data_ii = [
				'usd_user' => $id_user,
				'usd_phone' => $request->inp_no_contact,
				'usd_address' => $request->inp_address,
				'usd_prodi' => $request->inp_prodi,
				'usd_fakultas' => $request->inp_fakultas,
				'usd_universitas' => $request->inp_institusi,
			];
			User_detail::insert($data_ii);
		} else {
			$data_ii = [
				'usd_phone' => $request->inp_no_contact,
				'usd_address' => $request->inp_address,
				'usd_prodi' => $request->inp_prodi,
				'usd_fakultas' => $request->inp_fakultas,
				'usd_universitas' => $request->inp_institusi,
			];
			User_detail::where('usd_id', $id_user_detail)->update($data_ii);
		}
		$storeUser = User::where('id', $id_user)->update($data);
		return redirect()->back();
	}
	public function actionUpdateProfile(UserPostUpdateRequest $request)
	{
		$id_user = $request->id;
		$id_user_detail = $request->usd_id;
		$cek_user = User::where('id',$id_user)->first();
		if ($cek_user->email == $request->inp_email) {
			$email = $cek_user->email;
		}else{
			$email = $request->inp_email;
			$cek_email = User::where('email', $email)->first();
			if ($cek_email->count() > 0) {
				return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah terdaftar.']);
			}
		}
		# cek password
		if ($request->inp_password == null) {
			# code...
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'status' =>  $request->inp_status,
				'email' => $email,
				'name' => $request->inp_name,
				'nip' => $request->inp_nip,
			];
		} else {
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'email' => $email,
				'name' => $request->inp_name,
				'level' => $request->inp_level,
				'password' => bcrypt($request->inp_password),
				'nip' => $request->nip,
			];
		}
		# cek user detail
		if ($id_user_detail == null) {
			$data_ii = [
				'usd_user' => $id_user,
				'usd_phone' => $request->inp_no_contact,
				'usd_address' => $request->inp_address,
				'usd_prodi' => $request->inp_prodi,
				'usd_fakultas' => $request->inp_fakultas,
				'usd_universitas' => $request->inp_institusi,
			];
			User_detail::insert($data_ii);
		} else {
			$data_ii = [
				'usd_phone' => $request->inp_no_contact,
				'usd_address' => $request->inp_address,
				'usd_prodi' => $request->inp_prodi,
				'usd_fakultas' => $request->inp_fakultas,
				'usd_universitas' => $request->inp_institusi,
			];
			User_detail::where('usd_id', $id_user_detail)->update($data_ii);
		}
		$storeUser = User::where('id', $id_user)->update($data);
		return redirect()->back();
	}
	/* Tags:... */
	public function actionToUser(Request $request)
	{
		if ($request->op == 0) {
			return redirect()->back()->withErrors(['check_opsi' => 'Harap pilih opsi terlebih dahulu']);
		} elseif ($request->op == 1) {
			if ($request->idusers == null || $request->idusers =="") {
				return redirect()->back()->withErrors(['check_opsi' => 'Harap pilih data yang akan diupdate']);
			} else {
				User::whereIn('id', $request->idusers)->update(['status'=>'block']);
			}
		} elseif ($request->op == 2) {
			if ($request->idusers == null || $request->idusers == "") {
				return redirect()->back()->withErrors(['check_opsi' => 'Harap pilih data yang akan diupdate']);
			} else {
				User::whereIn('id', $request->idusers)->update(['status' => 'active']);
			}
		}
		return redirect()->back();
	}
	/* Tags:... */
	public function viewDetailUser(Request $request)
	{
		$data_user = User::leftjoin('user_details','users.id','=','user_details.usd_user')
		->where('id',$request->id)
		->first();
		return view('contents.content_pageview.view_detail_user',compact('data_user'));
	}
	/* Tags:... */
	public function viewDetailProfile(Request $request)
	{
		$auth = Auth::user();
		$data_user = User::leftjoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $auth->id)
		->first();
		return view('contents.content_pageview.view_detail_profil', compact('data_user'));
	}
	/* Tags:... */
	public function formUpdateUser(Request $request)
	{
		$data_user = User::leftjoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->leftJoin('laboratory_groups','users.rumpun_id','=', 'laboratory_groups.lag_id')
		->where('id', $request->id)
		->first();
		// dd($data_user);
		$data_rumpun = Laboratory_group::get();
		// dd($data_user);
		return view('contents.content_form.form_update_user',compact('data_user', 'data_rumpun'));
	}
	public function formUpdateProfil(Request $request)
	{
		$data_user = User::leftjoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $request->id)
		->first();
		// dd($data_user);
		return view('contents.content_form.form_update_profile', compact('data_user'));
	}
	public function formPengaturanDatasource(Request $request)
	{
		$dataset_skripsi = Unesa_data::where('api_code_name', 'data_source_skripsi')->first();
		$dataset_mhs = Unesa_data::where('api_code_name', 'data_source_mahasiswa_ft')->first();
		$dataset_dosen = Unesa_data::where('api_code_name', 'data_dosen')->first();
		// dd($data_user);
		return view('contents.content_form.form_pengaturan_datasource', compact('dataset_skripsi', 'dataset_mhs', 'dataset_dosen'));
	}
	/* Tags:... */
	public function actionUpdateDataSource(Request $request)
	{
		# Data file Data Source Skripsi Mahasiswa
		$getFile_a = $request->file('file_data_a');
		if ($getFile_a != null) {
			if ($getFile_a->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file data_source_skripsi tidak mendukung, harap inputkan file berformat json']);
			}
			$name_a =  Str::of($request->name_a)->replace(' ', '_');
			$fileRename_a = $name_a.'.'.$getFile_a->extension();
			if (Storage::exists('public/data_source/' . $fileRename_a)) {
				Storage::delete('public/data_source/' . $fileRename_a);
			}
			$filePath_a = $getFile_a->storeAs('public/data_source/', $fileRename_a);
		} else {
			$dataset_skripsi = Unesa_data::where('api_code_name', 'data_source_skripsi')->first();
			$fileRename_a = $dataset_skripsi->api_file_data;
		}
		# Data file Data Source Mahasiswa FT
		$getFile_b = $request->file('file_data_b');
		if ($getFile_b != null) {
			if ($getFile_b->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file  tidak mendukung, harap inputkan file berformat json']);
			}
			$name_b =  Str::of($request->name_b)->replace(' ', '_');
			$fileRename_b =  $name_b.'.'.$getFile_b->extension();
			if (Storage::exists('public/data_source/' . $fileRename_b)) {
				Storage::delete('public/data_source/' . $fileRename_b);
			}
			$filePath_b = $getFile_b->storeAs('public/data_source/', $fileRename_b);
		}else{
			$dataset_mhs = Unesa_data::where('api_code_name', 'data_source_mahasiswa_ft')->first();
			$fileRename_b = $dataset_mhs->api_file_data;
		}
		# Data file Data Source Dosen
		$getFile_c = $request->file('file_data_c');
		if ($getFile_c != null) {
			if ($getFile_c->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file tidak mendukung, harap inputkan file berformat json']);
			}
			$name_b =  Str::of($request->name_c)->replace(' ', '_');
			$fileRename_c =  $name_b.'.' . $getFile_c->extension();
			if (Storage::exists('public/data_source/' . $fileRename_c)) {
				Storage::delete('public/data_source/' . $fileRename_c);
			}
			$filePath_c = $getFile_c->storeAs('public/data_source/', $fileRename_c);
		} else {
			$dataset_dosen = Unesa_data::where('api_code_name', 'data_dosen')->first();
			$fileRename_c = $dataset_dosen->api_file_data;
		}
		$dataset_skripsi_a = [
			"api_name" => $request->nama_a,
			"api_url_status" => $request->url_status_a,
			"api_url" => $request->url_a,
			"api_file_data" => $fileRename_a
		];
		Unesa_data::where('api_code_name', 'data_source_skripsi')->update($dataset_skripsi_a);
		// dd($dataset_skripsi_a);
		$dataset_skripsi_b = [
			"api_name" => $request->nama_b,
			"api_url_status" => $request->url_status_b,
			"api_url" => $request->url_b,
			"api_file_data" => $fileRename_b
		];
		Unesa_data::where('api_code_name', 'data_source_mahasiswa_ft')->update($dataset_skripsi_b);
		$dataset_skripsi_c = [
			"api_name" => $request->nama_c,
			"api_url_status" => $request->url_status_c,
			"api_url" => $request->url_c,
			"api_file_data" => $fileRename_c
		];
		Unesa_data::where('api_code_name', 'data_dosen')->update($dataset_skripsi_c);
		return redirect()->back();
	}
}
