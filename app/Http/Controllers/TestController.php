<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Http;

use App\Models\User;
use App\Models\User_detail;
use App\Models\Lab_submission;
use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_facility_count_status;
use App\Models\Lab_schedule;
use App\Models\Lab_sub_date;
use App\Models\Lab_sch_date;
use App\Models\Lab_sub_order;
use App\Models\Lab_sub_time;
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;

class TestController extends Controller
{
	/* Tags:... */
	public function UnitTest(Request $request)
	{
		$url = 'https://simontasiplus.unesa.ac.id/api_mhs_unesa/36a169ac-4080-419e-a6c0-3538feb71089';
		$client = new Client();
		$response = $client->request('GET', $url, [
			'headers' => [
				'Accept' => 'application/json',
			],
		]);
		$data = json_decode($response->getBody(), true);
		
		dd($data);
		// return view('data_view', compact('data'));
	}
}
