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
        <a href="{{ url('laboratorium/form-update-fasilitas/'.$data_fasilitas->laf_id) }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-edit-2-line" style="margin-right: 4px;"></i> Update </button>
        </a>
        <a href="{{ url('laboratorium/'.$data_fasilitas->laf_laboratorium.'/fasilitas') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 30%;"><b>Nama Alat/Fasilitas</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->laf_name }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Kegunaan Alat/Fasilitas</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->laf_brand }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Merk/Spesifikasi/Tipe</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->laf_brand }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/fasilitas</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->lcs_count }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Tersedia</b></td>
            <td style="width: 80%;">{{ $data_fasilitas->lcs_ready }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Dipakai/Dipinjam</b></td>
            <td style="width: 80%;">{{ $data_fasilitas->lcs_used }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Kondisi Baik</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->lcs_condition_good }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Kondisi Kurang Baik</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->lcs_condition_poor }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Rusak/Tidak Bisa Dipakai</b></td>
            <td style="width: 70%;">{{ $data_fasilitas->lcs_condition_unwearable }}</td>
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