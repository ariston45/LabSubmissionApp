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
        <a href="{{ url('uji_laboratorium/labtest/form-update-ujilab/'.$data->lsv_id) }}">
          <button class="btn btn-flat btn-xs btn-primary"><i class="ri-edit-2-line" style="margin-right: 4px;"></i> Update </button>
        </a>
        <a href="{{ url('uji_laboratorium/labtest/'.$data->lsv_lab_id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 30%;"><b>Nama Uji Laboratorium</b></td>
            <td style="width: 70%;">{{ $data->lsv_name }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Diskripsi</b></td>
            <td style="width: 70%;">{{ $data->lsv_notes }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Alat dan Fasilitas</b></td>
            <td style="width: 70%;">
            @foreach ($tools as $list)
              - {{ $list }} <br>             
            @endforeach
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Biaya</b></td>
            <td style="width: 80%;">{{ funCurrencyRupiah($data->lsv_price) }}</td>
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