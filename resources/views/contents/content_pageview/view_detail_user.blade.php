@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Pengaturan</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Pengaturan</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-file-list-3-line" style="margin-right: 4px;"></i> Detail User</h3>
      <div class="pull-right">
        <a href="{{ url('pengaturan/user-detail/form-update-user/'.$data_user->id) }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-edit-2-line" style="margin-right: 4px;"></i> Update </button>
        </a>
        <a href="{{ url('pengaturan/user') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 30%;"><b>Nama</b></td>
            <td style="width: 70%;">{{ $data_user->name }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>No ID</b></td>
            <td style="width: 70%;">{{ $data_user->no_id }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>NIP</b></td>
            <td style="width: 70%;">{{ $data_user->nip }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Prodi</b></td>
            <td style="width: 70%;">{{ $data_user->usd_prodi }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Fakultas</b></td>
            <td style="width: 70%;">{{ $data_user->usd_fakultas }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Universitas/Instansi</b></td>
            <td style="width: 80%;">{{ $data_user->usd_universitas }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Alamat</b></td>
            <td style="width: 80%;">{{ $data_user->usd_address }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>No Kontak / HP</b></td>
            <td style="width: 70%;">{{ $data_user->usd_phone }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Email</b></td>
            <td style="width: 70%;">{{ $data_user->email }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Status</b></td>
            <td style="width: 70%;">{{ $data_user->status }}</td>
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