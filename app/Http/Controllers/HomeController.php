<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	
	public function viewLanding(Request $request)
	{
		return view('contents.content_pageview.view_landing');
	}
	public function HomeSystem(Request $request)
	{
		if (rulesUser(['LAB_HEAD','LAB_SUBHEAD', 'ADMIN_SYSTEM', 'ADMIN_MASTER'])) {
			return view('contents.content_start.home_admin');
		}elseif (rulesUser(['LECTURE'])) {
			return view('contents.content_start.home_lecture');
		}elseif(rulesUser(['STUDENT', 'PUBLIC_MEMBER', 'PUBLIC_NON_MEMBER'])){
			return view('contents.content_start.home_tenant');
		}
		
	}
	public function HomeRecipient(Request $request)
	{
		return view('contents.content_i.home');
	}
}
