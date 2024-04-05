<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPostUpdateRequest;

use App\Models\User;
use App\Models\User_detail;
use Auth;

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
		if ($request->password == null) {
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
				'password' => bcrypt($request->password)
			];
		}
		$data_ii = [
			'usd_phone' => $request->inp_no_contact,
			'usd_address' => $request->inp_address,
			'usd_prodi' => $request->inp_prodi,
			'usd_fakultas' => $request->inp_fakultas,
			'usd_universitas' => $request->inp_institusi,
		];
		$storeUser = User::where('id',$id_user)->update($data);
		if (!$storeUser) {
			return redirect()->back()->withInput($request->input())->withErrors(['check_email' => 'Alamat email sudah didaftarkan.']);
		}
		User_detail::where('usd_id',$id_user_detail)->update($data_ii);
		// return redirect()->route('setting_user');
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
		return view('contents.content_pageview.view_detail_user', compact('data_user'));
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
}
