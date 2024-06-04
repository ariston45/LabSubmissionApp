<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\User_detail;
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

	/* Tags:... */
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
		// $request->user()->currentAccessToken()->delete();
		$request->session()->flush();
		Auth::logout();
		return Redirect('/');
	}

	public function logout(Request $request)
	{
		Auth::user()->tokens()->delete();

		// auth()->user()->tokens()->delete();
		$request->session()->flush();
		Auth::user()->tokens()->delete();
		Auth::logout();
		return Redirect('login');
	}

	



	/* Tags:... */
	public function test(Request $request)
	{
		
	}
}
