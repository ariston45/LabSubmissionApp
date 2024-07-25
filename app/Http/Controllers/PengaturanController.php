<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPostUpdateRequest;
use App\Models\Unesa_data;
use App\Models\User;
use App\Models\User_detail;
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
		return view('contents.content_form.form_input_user');
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
			'name' => $request->inp_name,
			'level' => $request->inp_level,
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
		$storeUser = User::insert($data);
		if (!$storeUser) {
			return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah didaftarkan.']);
		}
		User_detail::insert($data_ii);
		return redirect()->route('setting_user');
	}
	public function actionUpdateUser(UserPostUpdateRequest $request)
	{
		$id_user = $request->id;
		$id_user_detail = $request->usd_id;
		if ($request->inp_password == null) {
			# code...
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'status' => 'active',
				'email' => $request->inp_email,
				'name' => $request->inp_name,
				'level' => $request->inp_level,
			];
		}else{
			$data = [
				'no_id' => $request->inp_no_id,
				'username' => null,
				'status' => 'active',
				'email' => $request->inp_email,
				'name' => $request->inp_name,
				'level' => $request->inp_level,
				'password' => bcrypt($request->inp_password)
			];
		}
		$storeUser = User::where('id',$id_user)->update($data);
		if (!$storeUser) {
			return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah didaftarkan.']);
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
		->where('id', $request->id)
		->first();
		// dd($data_user);
		return view('contents.content_form.form_update_user',compact('data_user'));
	}
	public function formUpdateProfil(Request $request)
	{
		$data_user = User::leftjoin('user_details', 'users.id', '=', 'user_details.usd_user')
		->where('id', $request->id)
		->first();
		// dd($data_user);
		return view('contents.content_form.form_update_user', compact('data_user'));
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
		$getFile_a = $request->file('file_data_a');
		// dd($getFile_a->extension());
		if ($getFile_a != null) {
			if ($getFile_a->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file data_source_skripsi tidak mendukung, harap inputkan file berformat json']);
			}
			$fileRename_a =  'data_source_skripsi.' . $getFile_a->extension();
			if (Storage::exists('public/data_source/' . $fileRename_a)) {
				Storage::delete('public/data_source/' . $fileRename_a);
			}
			$filePath_a = $getFile_a->storeAs('public/data_source/', $fileRename_a);
		} else {
			$dataset_skripsi = Unesa_data::where('api_code_name', 'data_source_skripsi')->first();
			$fileRename_a = $dataset_skripsi->api_code_name;
		}
		$getFile_b = $request->file('file_data_b');
		// dd($getFile_b->extension());
		if ($getFile_b != null) {
			if ($getFile_b->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file  tidak mendukung, harap inputkan file berformat json']);
			}
			$fileRename_b =  'data_source_mhs_ft.' . $getFile_b->extension();
			if (Storage::exists('public/data_source/' . $fileRename_b)) {
				Storage::delete('public/data_source/' . $fileRename_b);
			}
			$filePath_b = $getFile_b->storeAs('public/data_source/', $fileRename_b);
		}else{
			$dataset_mhs = Unesa_data::where('api_code_name', 'data_source_mahasiswa_ft')->first();
			$fileRename_b = $dataset_mhs->api_code_name;
		}

		$getFile_c = $request->file('file_data_c');
		if ($getFile_c != null) {
			if ($getFile_c->extension() != 'json') {
				return redirect()->back()->withErrors(['file_err' => 'Format file tidak mendukung, harap inputkan file berformat json']);
			}
			$fileRename_c =  'data_source_skripsi.' . $getFile_c->extension();
			if (Storage::exists('public/data_source/' . $fileRename_c)) {
				Storage::delete('public/data_source/' . $fileRename_c);
			}
			$filePath_c = $getFile_c->storeAs('public/data_source/', $fileRename_c);
		} else {
			$dataset_dosen = Unesa_data::where('api_code_name', 'data_dosen')->first();
			$fileRename_c = $dataset_dosen->api_code_name;
		}
		$dataset_skripsi_a = [
			"api_name" => $request->nama_a,
			"api_url_status" => $request->url_status_a,
			"api_url" => $request->url_a,
			"api_file_data" => $fileRename_a
		];
		Unesa_data::where('api_code_name', 'data_source_dosen')->update($dataset_skripsi_a);
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
