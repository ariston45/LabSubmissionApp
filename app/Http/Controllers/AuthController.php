<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\User_detail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use App\Http\Requests\ActEmailReset;
use Str;

use App\Http\Requests\UserStoreRequest;
use App\Models\Password_reset;
use Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Sanctum\HasApiTokens;
use Validator;

class AuthController extends Controller
{
	public function viewLogin()
	{
		if ($user = Auth::user()) {
			return redirect()->intended('beranda');
		}
		return view('auth.login');
	}
	public function actionLogin(Request $request)
	{
		request()->validate([
			'email' => 'required',
			'password' => 'required',
		]);
		$credit = $request->only('email', 'password');
		list($username, $domain) = explode('@', $credit['email']);
		if ($domain == 'mhs.unesa.ac.id') {
			if (checkDataEmail($credit['email']) == true) {
				$store_param = storingData($credit['email']);
				if ($store_param == true
				) {
					if (Auth::attempt($credit)) {
						$user = Auth::user();
						$auth_level = array('UNSET', 'LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 'LAB_TECHNICIAN', 'ADMIN_PRODI', 'ADMIN_MASTER', 'ADMIN_SYSTEM');
						if (in_array($user->level, $auth_level)) {
							return redirect()->intended('beranda');
						}
						return redirect()->intended('/');
					}
					return redirect('login')
					->withInput()
					->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
				} else {
					return redirect('login')
					->withInput()
					->withErrors(['failed_login' => 'Mohon maaf untuk saat ini anda tidak bisa login langsung, silakan registrasi terlebih dahulu.']);
				}
			} else {
				if (Auth::attempt($credit)) {
					$user = Auth::user();
					$auth_level = array('UNSET', 'LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 'LAB_TECHNICIAN', 'ADMIN_PRODI', 'ADMIN_MASTER', 'ADMIN_SYSTEM');
					if (in_array($user->level, $auth_level)) {
						return redirect()->intended('beranda');
					}
					return redirect()->intended('/');
				}
				return redirect('login')
				->withInput()
				->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
			}
		} else {
			if (Auth::attempt($credit)) {
				$user = Auth::user();
				$auth_level = array('UNSET', 'LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 'LAB_TECHNICIAN', 'ADMIN_PRODI', 'ADMIN_MASTER', 'ADMIN_SYSTEM');
				if (in_array($user->level, $auth_level)) {
					return redirect()->intended('beranda');
				}
				return redirect()->intended('/');
			}
			return redirect('login')->withInput()
			->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
		}
	}

	public function viewRegister(Request $request)
	{
		return view('auth.register');
	}

	/* Tags:... */
	public function actionRegister(Request $request)
	{
		$generate_id = genIdUser();
		if ($request->level == 'STUDENT') {
			$data_detail = getDataStudent($request->no_id);
			if ($data_detail->count() === 0) {
				return redirect()->back()->withError(['msg_err' => 'Data mahasiswa di SIMONTASI belum tersedia.']);
			}
			foreach ($data_detail as $key => $value) {
				$data_filter = [
					"usd_user" => $generate_id,
					"usd_phone" => $value['no_hp'],
					"usd_address" => $value['alamat'],
					"usd_prodi" => $value['prodi'],
					"usd_fakultas" => "Fakultas Teknik",
					"usd_universitas" => "Universitas Negeri Surabaya"
				];
				$name = $value['nama_mhs'];
				$email = $value['email'];
			}
			$data_post = [
				'id' => $generate_id,
				'no_id' => $request->no_id,
				'username' => null,
				'status' => 'active',
				'email' => $email,
				'name' => $name,
				'level' => $request->level,
				'password' => bcrypt($request->password)
			];
			// dd($data_post);
			$storeStudentDetail = User_detail::insert($data_filter);
		}else{
			$data_post = [
				'id' => $generate_id,
				'no_id' => $request->no_id,
				'username' => null,
				'status' => 'active',
				'email' => $request->email,
				'name' => $request->name,
				'level' => $request->level,
				'password' => bcrypt($request->password)
			];
		}
		$detect_user = User::where('email', $request->email)->first();
		if ($detect_user != null) {
			return redirect()->back()->withError(['msg_err' => 'Alamat email anda sudah terdaftar.']);
		}
		$storeUser = User::insert($data_post);
		$data_login = [
			'email' => $request->email,
			'password' => Hash::make($request->password),
		];
		Auth::loginUsingId($data_post['id']);
		return redirect()->intended('beranda');
	}
	/* Tags:... */
	public function actionLogout(Request $request)
	{
		$request->session()->flush();
		Auth::logout();
		return Redirect('/');
	}

	public function logout(Request $request)
	{
		Auth::user()->tokens()->delete();
		$request->session()->flush();
		Auth::user()->tokens()->delete();
		Auth::logout();
		return Redirect('login');
	}
	/* Tags:... */
	public function viewFormCheck(Request $request)
	{
		return view('auth.reset');
	}
	/* Tags:... */
	public function actReset(ActEmailReset $request)
	{
		
		$email = $request->email;
		$data_user = User::where('email',$email)->first();
		if ($data_user == null) {
			return redirect()->back()->with('msg','Permintaan reset password telah dikirim jika email terdaftar maka anda akan mendapatkan email.');
		}else {
			$gen_uuid =  Str::uuid();
			$data = [
				'email' => $email,
				'token' => $gen_uuid
			];
			Password_reset::insert($data);
			$gen_link = url('reset_password').'/'.$gen_uuid;
			if ($email != null) {
				Mail::to($email)->send(new ResetPassword($gen_link));
			}
			return redirect()->back()->with('msg', 'Permintaan reset password telah dikirim jika email terdaftar maka anda akan mendapatkan email.');
		}
	}
	/* Tags:... */
	public function viewSetPassword(Request $request)
	{
		$token = $request->token;
		$check_token = Password_reset::where('token',$token)->first();
		if ($check_token == null) {
			return view('auth.set_new_password_err');
		} else {
			$time_rule =  date('Y-m-d H:i:s',strtotime ( '+1 hour' , strtotime ($check_token->created_at)));
			$time_now = date('Y-m-d H:i:s');
			if ($time_now < $time_rule) {
				return view('auth.set_new_password',compact('token'));
			}else {
				return view('auth.set_new_password_err_exp');
			}
		}
	}
	/* Tags:... */
	public function actSetPassword(Request $request)
	{
		$token = $request->reset_token;
		$check_token = Password_reset::where('token', $token)->first();
		if ($check_token == null) {
			return view('auth.set_new_password_err');
		}else {
			$pass = bcrypt($request->pass);
			User::where('email',$check_token->email)->update(['password'=>$pass]);
			return redirect()->route('reset_success');
		}
	}
	/* Tags:... */
	public function viewResetSuccess(Request $request)
	{
		return view('auth.set_new_password_scs');
	}
	/* Tags:... */
	public function reloadCaptcha(Request $request)
	{
		return response()->json(['captcha' => captcha_img()]);
	}
}
