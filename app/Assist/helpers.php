<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Lab_submission;
use App\Models\Laboratory;
use App\Models\Laboratory_technician;
use App\Models\Laboratory_facility;
use App\Models\Laboratory_facility_count_status;
use App\Models\Lab_schedule;

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
  $date_start = Carbon::parse($val)->isoFormat('dddd, D MMMM Y, HH:mm');
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

/* Tags:... */
function authUser()
{
  $authUser = Auth::user();
  $user = User::leftjoin('user_details','users.id','=','user_details.usd_user')
  ->where('id', $authUser->id)
  ->first();
  return $user;
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

