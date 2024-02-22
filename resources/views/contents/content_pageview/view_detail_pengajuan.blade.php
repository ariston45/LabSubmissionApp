@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Pengajuan</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Pengajuan</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-file-list-3-line" style="margin-right: 4px;"></i> Detail Permohonan</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan/form-pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-mail-download-fill" style="margin-right: 4px;"></i> Download Surat</button>
        </a>
        <a href="{{ url('pengajuan/form-pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Update Pengajuan</button>
        </a>
        <a href="{{ url('pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      {{ $data_pengajuan }}
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 20%;"><b>Nama</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->name }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>NIM/No.ID/ID Lainnya</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->no_id }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Studi</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->usd_prodi }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Fakultas</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->usd_fakultas }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Universitas</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->usd_universitas }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Alamat</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->usd_address }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>No. HP/CP</b></td>
            <td style="width: 80%;">{{ $data_pengajuan->usd_phone }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Keperluan Kegiatan</b></td>
            <td style="width: 80%;">{{ strActivity($data_pengajuan->lsb_activity) }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Judul</b></td>
            <td style="width: 80%;">{{ strJudul($data_pengajuan->lsb_title) }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Hari/Tanggal Pelaksanaan</b></td>
            <td style="width: 80%;">{{ strDateStart($data_pengajuan->lsb_date_start) }} <b>s/d</b> {{ strDateEnd($data_pengajuan->lsb_date_end) }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Laboratorium</b></td>
            <td style="width: 80%;">{{ strJudul($data_pengajuan->lab_name) }}</td>
          </tr>
          <tr>
            <td style="width: 20%;"><b>Fasiltas Laboratorium</b></td>
            <td style="width: 80%;">
            @foreach ($data_facility as $list)
              - {{ $list->laf_name }}<br>              
            @endforeach
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('css')
  
@endpush
@push('script')
  
@endpush