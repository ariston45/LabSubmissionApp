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
use App\Mail\Mail_notif_activation_link;

use App\Http\Requests\UserStoreRequest;
use App\Models\EmailActivation;
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
		#check email domain
		if ($domain == 'mhs.unesa.ac.id') {
			#jika domain menggunakan mhs.unesa.ac.id
			if (checkDataEmail($credit['email']) == true) {
				#jika alamat email sudah terdaftar
				if (Auth::attempt($credit)) {
					$user = Auth::user();
					$auth_level = array('UNSET', 'LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 
					'LAB_TECHNICIAN', 'ADMIN_PRODI', 'ADMIN_MASTER', 'ADMIN_SYSTEM');
					if (in_array($user->level, $auth_level)) {
						return redirect()->intended('beranda');
					}
					return redirect()->intended('/');
				}
				return redirect('login')
				->withInput()
				->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
				#
			} else {
				#jika alamat email belum terdaftar
				$store_param = storingData($credit['email']);
				if ($store_param == true) {
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
			}
		} else {
			# jika email menggunakan domain selain mhs.unesa.ac.id atau domain email lainnya
			# check data user
			$user = User::where('email',$credit['email'])->select('email','status','email_verified_at')->first();
			if ($user == null) {
				return redirect('login')->withInput()
				->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
			}else{
				if ($user->email_verified_at == null) {
					return redirect('login')->withInput()
						->withErrors(['failed_login' => 'Mohon maaf akun anda belum aktif, harap aktifkan akun anda']);
				}
				if ($user->status == 'block') {
					return redirect('login')->withInput()
					->withErrors(['failed_login' => 'Mohon maaf akun anda belum aktif.']);
				}
			}
			# proses kredensial
			if (Auth::attempt($credit)) {
				$user = Auth::user();
				$auth_level = array('UNSET', 'LECTURE', 'STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER', 'LAB_HEAD', 'LAB_SUBHEAD', 'LAB_TECHNICIAN', 'ADMIN_PRODI', 'ADMIN_MASTER', 'ADMIN_SYSTEM');
				if (in_array($user->level, $auth_level)) {
					switch ($user->level) {
						case 'ADMIN_PRODI':
							# code...
							return redirect()->intended('jadwal_lab');
							break;
						
						default:
							return redirect()->intended('beranda');
							break;
					}
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
		$detect_user = User::where('email', $request->email)->first();
		if ($detect_user != null) {
			return redirect()->back()->withErrors(['msg_err' => 'Alamat email anda sudah terdaftar.']);
		}
		if ($request->level == 'PUBLIC_MEMBER') {
			$email = $parts = explode('@', $request->email);
			if (!in_array($email[1],['mhs.unesa.ac.id', 'unesa.ac.id'])) {
				return redirect()->back()->withErrors(['msg_err' => 'Mohon maaf, anda tidak bisa mendaftar dengan alamat email ini.']);
			}
		}
		$generate_id = genIdUser();
		$token = Str::uuid(64);
		$data_post = [
			'id' => $generate_id,
			'no_id' => $request->no_id,
			'username' => null,
			'status' => 'block',
			'email' => $request->email,
			'name' => $request->name,
			'level' => $request->level,
			'password' => bcrypt($request->password)
		];
		$data_filter = [
			"usd_user" => $generate_id,
			"usd_phone" => null,
			"usd_address" => null,
			"usd_prodi" => null,
			"usd_fakultas" => null,
			"usd_universitas" => null,
		];
		$data_activation = [
			"user_id" => $generate_id,
			"token" => $token,
		];
		$data_notif = [
			"url" => url('activation-account/'. $token)
		];
		User::insert($data_post);
		User_detail::insert($data_filter);
		EmailActivation::insert($data_activation);
		Mail::to($request->email)->send(new Mail_notif_activation_link($data_notif));
		return redirect('register-success');
	}
	/* Tags:... */
	public function registerSuccess(Request $request)
	{
		return view('auth.register_congrat');
	}
	/* Tags:... */
	public function actActivation(Request $request)
	{
		$token = $request->token;
		$data_token = EmailActivation::where('token',$token)->where('used_token','false')->first();
		if ($data_token != null) {
			$data_user = User::where('id',$data_token->user_id)->first();
			if ($data_token->used_token == 'false') {
				$date = date('Y-m-d H:i:s');
				User::where('id',$data_user->id)->update(['status'=>'active', 'email_verified_at'=>$date]);
				EmailActivation::where('token',$token)->update(['used_token'=>'true']);
				$data = [
					'param' => true,
					'msg' => 'Akun berhasil diaktivasi.'
				];
			}else{
				$data = [
					'param' => true,
					'msg' => 'Akun berhasil diaktivasi pada '. $data_user->email_verified_at,
				];
			}
		}else {
			return redirect('login');
		}
		return view('auth.activation_success', compact('data'));
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
