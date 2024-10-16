@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Beranda</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12" style="margin-bottom: 20px;">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
      <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{ url('assets/img/Berandaii.png') }}" alt="First slide">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ url('assets/img/b1.png') }}" alt="Second slide">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ url('assets/img/lab_irigasi_dan_keairan.png') }}" alt="Third slide">
        <div class="carousel-caption">
        </div>
      </div>
      <div class="item">
        <img src="{{ url('assets/img/lab_pendidikan_teknik_mesin.png') }}" alt="forth slide">
        <div class="carousel-caption">
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
      <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
      <span class="fa fa-angle-right"></span>
    </a>
  </div>
  {{-- <img id="img-homec" class="img-responsive" src="{{ url('assets/img/beranda.png') }}" alt=""> --}}
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
      <a href="{{ url('pengajuan/laboratorium') }}">
        {{-- <div class="small-box bg-aqua">
          <div class="inner">
            <span id="font-title">Buat Pengajuan</span>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
        </div> --}}
        <img id="img-homec" class="img-responsive" src="{{ url('assets/img/tmb_buat_pengajuan.png') }}" alt="">
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('pengajuan') }}">
        {{-- <div class="small-box bg-green">
          <div class="inner">
            <span id="font-title">Data Pengajuan</span>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div> --}}
        <img id="img-homec" class="img-responsive" src="{{ url('assets/img/tmb_data_pengajuan.png') }}" alt="">
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('jadwal_lab') }}">
        <img id="img-homec" class="img-responsive" src="{{ url('assets/img/tmb_jadwal_lab.png') }}" alt="">
      </a>
    </div>
    <div class="col-lg-3 col-xs-6">
      <a href="{{ url('pengaturan/profil') }}">
        <img id="img-homec" class="img-responsive" src="{{ url('assets/img/tmb_profile.png') }}" alt="">
      </a>
    </div>
  </div>
</div>
@endsection
@push('css')
  <style>
    #font-title{
      font-size: 20px;
      margin-left: 15px;
      margin-top: 10px;
      margin-bottom: 10px;
      vertical-align: middle;
    }
    #img-home{
      max-width: 100%;
      height: auto;
      max-width: 80vw;
    }
    .img-responsive{
      max-width: 100%;
    }
    .inner-text{
      padding-left: 10px;
      display: flex;
      flex-direction: row;
      align-items: center;
    }
  </style>
@endpush
@push('script')
  
@endpush