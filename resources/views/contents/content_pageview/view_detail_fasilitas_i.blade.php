@extends('layout.app')
@section('title')
SIPLAB | Dashboard
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
        <a href="{{ url('fasilitas_lab/form-update-fasilitas/'.$data_fasilitas->laf_id) }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-edit-2-line" style="margin-right: 4px;"></i> Update </button>
        </a>
        <a href="{{ url('fasilitas_lab/'.$data_fasilitas->laf_laboratorium) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-3" style="text-align: center;">
          @if ($data_fasilitas->laf_image == null)
          <img src="{{ url('assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 80%">
          @else
          <img src="{{ url('storage/image_facility/'. $data_fasilitas->laf_image) }}" id="wrap-img" class="img img-thumbnail" style="width: 80%">
          @endif
        </div>
        <div class="col-md-9">
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
                <td style="width: 30%;"><b>Diskripsi Alat/fasilitas</b></td>
                <td style="width: 70%;">{{ $data_fasilitas->laf_description }}</td>
              </tr>
              <tr>
                <td style="width: 30%;"><b>Biaya peminjaman</b></td>
                <td style="width: 70%;">{{ funCurrencyRupiah($data_fasilitas->laf_value) }} / {{$data_fasilitas->laf_base}}</td>
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
                <td style="width: 30%;"><b>Jumlah Alat/Fasilitas Rusak/Tidak Bisa Dipakai</b></td>
                <td style="width: 70%;">{{ $data_fasilitas->lcs_unwearable }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('css')
<style>
  .img-thumbnail{
    border-radius: 0px;
    border-color: #8a8a8a;
  }
  .upload_url_img, .upload_url_bg {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }

  .upload_url_img + label, .upload_url_bg + label {
    margin-top: 5px;
    font-size: 11pt;
    font-weight: 700;
    color: white;
    background-color: #333;
    display: inline-block;
    padding: 5px 10px;
    text-align: center;
    border-radius: 0px;
    cursor: pointer;
    width: 30%;
  }

  .upload_url_img:focus + label,
  .upload_url_img + label:hover,
  .upload_url_bg:focus + label,
  .upload_url_bg + label:hover {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 0px;
  }
</style>
  
@endpush
@push('script')
  
@endpush