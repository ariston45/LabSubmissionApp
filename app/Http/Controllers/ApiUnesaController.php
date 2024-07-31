<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;
use Http;
use File;

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
use App\Models\Unesa_data;

class ApiUnesaController extends Controller
{
  /* Tags:... */
  public function DataSkripsiMahasiswaInit(Request $request)
  {
    $data = Unesa_data::where('api_code_name', 'data_source_skripsi')->first();
    if ($data->api_url_status == 'aktif') {
      $url = 'https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089';
      $client = new Client();
      $response = $client->request('GET', $url, [
        'headers' => [
          'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
          'Accept' => 'application/json',
        ],
      ]);
      $data = json_decode($response->getBody(), true);
      $dataCollection = collect($data);
    }else {
      $path = Storage::url('data_source/'. $data->api_file_data);
      $url = url($path);
      $client = new Client();
      $response = $client->request('GET', $url, [
        'headers' => [
          'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
          'Accept' => 'application/json',
        ],
      ]);
      $data = json_decode($response->getBody(), true);
      $dataCollection = collect($data);
    }
    return $dataCollection->where('nim',$request->id);
  }
  public function DataSkripsiMahasiswa(Request $request)
  {
    $data = Unesa_data::where('api_code_name', 'data_source_skripsi')->first();
    $skripsi_mhs = getDataStudents();
  }
  /* Tags:... */
  public function datasourceMhsSkripsi_i()
  { 
    $url = url('public/assets/data_source/data_simontasi_skripsi.json');
    $client = new Client();
    $response = $client->request('GET', $url, [
      'headers' => [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
        'Accept' => 'application/json',
      ],
    ]);
    $data = json_decode($response->getBody(), true);
    $dataCollection = collect($data);
    return $dataCollection;
  }
  public function datasourceMhsSkripsi_ii($value)
  {
    $url = url('public/assets/data_source/data_simontasi_skripsi.json');
    $client = new Client();
    $response = $client->request('GET', $url, [
      'headers' => [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
        'Accept' => 'application/json',
      ],
    ]);
    $data = json_decode($response->getBody(), true);
    $dataCollection = collect($data);
    return $dataCollection->where('nim', $value);
  }
}
