<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

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

# API Helper
# ================================================================================================================================================================================== #
# Data all students skripsi
function getDataStudents()
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
  } else {
    dd($data);
    $path = Storage::url('data_source/' . $data->api_file_data);
    $url = url($path);
    $client = new Client();
    $response = $client->request('GET', $url, [
      'headers' => [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
        'Accept' => 'application/json',
      ],
    ]);
    $data = json_decode($response->getBody(), true);
    $dataCollection = collect($data)->values();
  }
  return $dataCollection;
}
# data initial students skripsic
function getDataStudent($value_id)
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
  } else {
    $path = Storage::url('data_source/' . $data->api_file_data);
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
  return $dataCollection->where('nim', $value_id);
}
# ================================================================================================================================================================================== #
function genIdUser(){
  $max_id_user = User::max('id');
  $new_id = $max_id_user + 1 ;
  return $new_id;
}

function genIdPengajuan(){
  $max_id_pengajuan = Lab_submission::max('lsb_id');
  $new_id = $max_id_pengajuan  + 1;
  return $new_id;
}

function DataAuth(){
  $auth = Auth::user();
  return $auth;
}

function strActivity($strings){
  $mutTitle = Str::of($strings)->replace('_', ' ');
  $mutReplace = Str::of($mutTitle)->replaceFirst('tp','');
  $mutSetTitle = Str::of($mutReplace)->title();
  return $mutSetTitle;
}

function strJudul($strings){
  $mutSetTitle = Str::of($strings)->title();
  return $mutSetTitle;
}

function strDateStart($val){
  $date_start = Carbon::parse($val)->isoFormat('dddd, D MMMM Y');
  return $date_start;
}
function strDateEnd($val)
{
  $date_end = Carbon::parse($val)->isoFormat('dddd, D MMMM Y, HH:mm');
  return $date_end;
}

function strDate($val)
{
  $date_start = Carbon::parse($val)->isoFormat('dddd, D MMMM Y');
  return $date_start;
}
function strDatetimes($val)
{
  $date_end = Carbon::parse($val)->isoFormat('dddd, D MMMM Y, HH:mm');
  return $date_end;
}

function genIdLab() {
  $max_id_lab = Laboratory::max('lab_id');
  $new_id = $max_id_lab + 1;
  return $new_id;
}

function genIdDate() {
  $max_id_lab = Lab_sub_date::max('lsd_id');
  $new_id = $max_id_lab + 1;
  return $new_id;
}

function genIdDateSch()
{
  $max_id_date_sch = Lab_sch_date::max('lscd_id');
  $new_id = $max_id_date_sch + 1;
  return $new_id;
}

function genIdTechnician(){
  $max_id_tech = Laboratory_technician::max('lat_id');
  $new_id = $max_id_tech + 1;
  return $new_id;
}

function strLabStatus($strings)
{
  $mutTitle = Str::of($strings)->replace('_', ' ');
  $mutSetTitle = Str::of($mutTitle)->title();
  return $mutSetTitle;
}

/* Tags:... */
function genIdLabF()
{
  $max_id = Laboratory_facility::max('laf_id');
  $new_id = $max_id + 1;
  return $new_id;
}

function genIdLabFC()
{
  $max_id = Laboratory_facility_count_status::max('lcs_id');
  $new_id = $max_id + 1;
  return $new_id;
}

function genIdLaSch()
{
  $max_id = Lab_schedule::max('lbs_id');
  $new_id = $max_id + 1;
  return $new_id;
}

/* Tags:... */
function rulesUser($datas)
{
  $authUser = Auth::user();
  $user = User::where('id',$authUser->id)->first();
  if (in_array($user->level,$datas)) {
    return true;
  }else{
    return false;
  }
}

function checkUser($datas)
{
  $authUser = Auth::user();
  if (isset($authUser)) {
    $user = User::where('id', $authUser->id)->first();
    if (in_array($user->level, $datas)) {
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}

/* Tags:... */
function authUser()
{
  $authUser = Auth::user();
  $user = User::leftjoin('user_details','users.id','=','user_details.usd_user')
  ->where('id', $authUser->id)
  ->first();
  return $user;
}
function authCheck()
{
  $authUser = Auth::user();
  if ($authUser == null) {
    return false;
  }else{
    return true;
  }
}
/* Tags:... */
function downloadBuktiPembayan($str)
{
  return Storage::download($str);
};

/* Tags:... */
function checkAcceptable()
{
  return true;
}

function genIdLabTest() {
  $maxId = Laboratory_labtest::max('lsv_id');
  $newid = $maxId + 1;
  return $newid;
}

function genIdLabTestFacility() {
  $maxId = Laboratory_labtest_facility::max('lst_id');
  $newid = $maxId + 1;
  return $newid;
}

function funFormatCurToDecimal($value){
  $val_clear = preg_replace('/\s+/', '', $value);
  $val_clear_cur =  Str::remove('Rp', $val_clear);
  $val_clear_point =  Str::remove('.', $val_clear_cur);
  $val_replace_point = Str::replace(',','.', $val_clear_point);
  return $val_replace_point;
}

function stringActivity($value){
  $text = Str::replace('_', ' ', $value);
  $text2 = Str::replace('tp','', $text);
  if ($text2 == 'lain lain') {
    $text2 = 'Lain-lain';
  }
  // die($text2);
  $string = Str::of($text2)->title();
  return $string;
}
/* Tags:... */
function funCurrencyRupiah($value)
{
  $number_format= number_format($value,2,',','.');
  $res = "Rp ". $number_format;
  return $res;
}




function getDataLectures(){
  // $getjson = Http::acceptJson()->get('https://i-sdm.unesa.ac.id/api/dosen-ft-email')->throw()->json();
  // $laravelcollection = collect($getjson)->values();
  // return $laravelcollection;
  $url = 'https://i-sdm.unesa.ac.id/api/dosen-ft-email';
  $client = new Client();
  $response = $client->request('GET', $url, [
    'headers' => [
      'Accept' => 'application/json',
    ],
  ]);
  dd($response);
  $data = json_decode($response->getBody(), true);
  $laravelcollection = collect($data)->values();
  if ($laravelcollection == null) {
    return 0;
  } else {
    return $laravelcollection;
  }
}
/* Tags:... */
function getIdOrder()
{
  $max_id = Lab_sub_order::max('los_id');
  $new_id = $max_id + 1;
  return $new_id;
}
/**/
function checkDataEmail($value)
{
  $data = User::where('email',$value)->select('email')->first();
  if ($data == null) {
    return true;
  } else {
    return false;
  }
}
function setTime($value)
{
  $time = date('H:i', strtotime($value));
  return $time;
}
/** */
function storingData($value){
  $getjson = Http::acceptJson()->get('https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089')->throw()->json();
  $laravelcollection = collect($getjson)->values();
  $data = $laravelcollection->where('email', $value);
  if($data->count() > 0){
    $id = genIdUser();
    foreach ($data as $key => $value) {
      $usr = [
        'id' => $id,
        'no_id' => $value['nim'],
        'name' => $value['nama_mhs'],
        'username' => null,
        'status' => 'active',
        'level' => 'STUDENT',
        'password' => bcrypt($value['nim']),
        'email' => $value['email']
      ];
    }
    foreach ($data as $key => $value) {
      $usd = [
        'usd_user' => $id,
        'usd_phone' => $value['no_hp'],
        'usd_address' => $value['alamat'],
        'usd_prodi' => $value['prodi'],
        'usd_fakultas' => 'Fakultas Teknik',
        'usd_universitas' => 'Universitas Negeri Surabaya'
      ];
    }
    User::insert($usr);
    User_detail::insert($usd);
    return true;
  }else{
    return false;
  }
}
function dataGetDatetime($id){
  $data = [];
  $data_date = Lab_sub_date::where('lsd_lsb_id',$id)->select('lsd_id', 'lsd_date')->get();
  // dd($data_date);
  foreach ($data_date as $key => $value) {
    $date_key = Carbon::parse($value->lsd_date)->isoFormat('dddd, D MMMM Y');
    // die($date_key);
    $data_time = Lab_sub_time::join('laboratory_time_options', 'lab_sub_times.lstt_time_id','=', 'laboratory_time_options.lti_id')
    ->where('lstt_date_subs_id', $value->lsd_id)
    ->select('lti_start', 'lti_end')
    ->get();
    $i = 0;
    foreach ($data_time as $key => $value) {
      $data_time[$i] = $value->lti_start.' - '. $value->lti_end;
      $i++;
    }
    $data[$date_key] = $data_time;
  }
  return $data;
}
/* Tags:... */
function cekLabData($id)
{
  $data = Laboratory::where('lab_id',$id)->first();
  return $data;
}
function actionEliminateSubmission(){
  $now = date('Y-m-d');
  $cek_lab = Lab_submission::join('lab_sub_dates', 'lab_submissions.lsb_id','=', 'lab_sub_dates.lsd_lsb_id')
  ->where('lsb_status', 'menunggu')
  ->where('lsd_date','<',$now)
  ->select('lsb_id')
  ->groupBy('lsb_id')
  ->get();
  foreach ($cek_lab as $key => $value) {
    Lab_submission::where('lsb_id',$value->lsb_id)->update(['lsb_status'=>'tidak_terpakai']);
  }
}