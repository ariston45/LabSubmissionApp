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
      <div class="row">
        <div class="col-md-3" style="text-align: center;">
          @if ($data->lsv_img == null)
          <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 80%">
          @else
          <img src="{{ url('storage/image_lab_test/'. $data->lsv_img) }}" id="wrap-img" class="img img-thumbnail" style="width: 80%">
          @endif
        </div>
        <div class="col-md-9">
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