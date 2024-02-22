<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class LaboratoryController extends Controller
{
	/* Tags:... */
	public function dataLaboratory(Request $request)
	{
		return view('contents.content_datalist.data_laboratory');
	}
	/* Tags:... */
	public function formLaboratory(Request $request)
	{
		$users = User::get();
		return view('contents.content_form.form_input_lab',compact('users'));
	}
	/* Tags:... */
	public function actionInputLaboratory(Request $request)
	{
		#code...
	}
}
