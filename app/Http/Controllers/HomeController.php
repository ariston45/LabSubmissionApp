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
		return view('contents.content_start.home_system');
	}
	public function HomeRecipient(Request $request)
	{
		return view('contents.content_i.home');
	}
}
