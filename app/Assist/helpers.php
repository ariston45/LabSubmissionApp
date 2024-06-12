<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
use App\Models\Laboratory_labtest;
use App\Models\Laboratory_labtest_facility;

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

function setDate($val)
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

/* Tags:... */
function funCurrencyRupiah($value)
{
  $number_format= number_format($value,2,',','.');
  $res = "Rp ". $number_format;
  return $res;
}

function getDataStudent($value_id){
  $getjson = Http::acceptJson()->get('https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089')->throw()->json();
  $laravelcollection = collect($getjson)->values();
  $data = $laravelcollection->where('nim', $value_id);
  if ($data == null) {
    return 0;
  }else{
    return $data;
  }
}

function getDataStudents()
{
  $getjson = Http::acceptJson()->get('https://simontasiplus.unesa.ac.id/api_mhs_simontasi/36a169ac-4080-419e-a6c0-3538feb71089')->throw()->json();
  $laravelcollection = collect($getjson)->values();
  return $laravelcollection;
}
function getDataLectures(){
  $getjson = Http::acceptJson()->get('https://i-sdm.unesa.ac.id/api/dosen-ft-email')->throw()->json();
  $laravelcollection = collect($getjson)->values();
  return $laravelcollection;
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
  /* Tags:... */
  
}