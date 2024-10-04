@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
{{-- <h4>Pengajuan</h4> --}}
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Data tidak ditemukan</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="error-page">
    <h2 class="headline text-yellow"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-yellow"></i> Oops! Data tidak ditemukan.</h3>
      <p>
        We could not find the page you were looking for.
        Kami tidak dapat menekan data yang anda cari.
        <a href="{{ url('dashboard') }}">Klik di sini</a> untuk kembali ke halaman awal.
      </p>
    </div>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">

@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>

@endpush