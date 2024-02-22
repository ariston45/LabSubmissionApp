<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Lab_submission;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

