<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
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
		if (Auth::attempt($credit)) {
			$user = Auth::user();
			// dd($user);
			$auth_level = array('UNSET','LECTURE','STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LAB_HEAD','LAB_SUBHEAD','LAB_TECHNICIAN','ADMIN_PRODI','ADMIN_MASTER','ADMIN_SYSTEM');
			if (in_array($user->level,$auth_level)) {
				return redirect()->intended('beranda');
			}
			return redirect()->intended('/');
		}
		return redirect('login')
		->withInput()
		->withErrors(['failed_login' => 'Username atau Password yang anda inputkan tidak sesuai.']);
	}

	public function viewRegister(Request $request)
	{
		return view('auth.register');
	}

	/* Tags:... */
	public function actionRegister(UserStoreRequest $request)
	{
		$data_post = [
			'id' => genIdUser(),
			'no_id' => $request->no_id,
			'username' => null,
			'email' => $request->email,
			'name' => $request->name,
			'level' => $request->level,
			'password' => bcrypt($request->password)
		];
		// dd($data_post);
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
		return Redirect('login');
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
