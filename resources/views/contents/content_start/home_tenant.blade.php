@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Beranda</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12" style="margin-bottom: 20px;">
  <img id="img-homec" class="img-responsive" src="{{ url('/public/assets/img/beranda.png') }}" alt="">
  {{-- <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Informasi</h3>
    </div>
    <div class="box-body">
      hello world
    </div>
  </div> --}}
</div>
<div class="col-md-12">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('pengajuan/form-pengajuan') }}">
        <div class="small-box bg-aqua">
          <div class="inner">
            <span id="font-title">Buat Pengajuan</span>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('pengajuan') }}">
        <div class="small-box bg-green">
          <div class="inner">
            <span id="font-title">Data Pengajuan</span>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('jadwal_lab') }}">
        <div class="small-box bg-yellow">
          <div class="inner">
            <span id="font-title">Jadwal Laboraroium</span>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('pengaturan/profil') }}">
        <div class="small-box bg-red">
          <div class="inner">
            <span id="font-title">Pengaturan User</span>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
@push('css')
  <style>
    #font-title{
      font-size: 39px;
    }
    #img-home{
      max-width: 100%;
      height: auto;
      max-width: 80vw;
    }
  </style>
@endpush
@push('script')
  
@endpush