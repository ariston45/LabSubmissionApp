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
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Pengajuan</h3>
			<div class="pull-right">
				@if (rulesUser(['STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LECTURE']))
				<a href="{{ url('pengajuan/form-pengajuan') }}">
					<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Buat Pengajuan</button>
				</a>
				@endif
			</div>
		</div>
		<div class="box-body">
			@if (rulesuser(['LECTURE']))
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-12">
					<a href="{{ url('pengajuan') }}">
						<button class="btn btn-flat btn-xs btn-default">Data Pengajuan Mahasiswa</button>
					</a>
					<a href="{{ url('pengajuan-additional') }}">
						<button class="btn btn-flat btn-xs btn-primary">Data Pengajuan</button>
					</a>
				</div>
			</div>				
			@endif
			<div class="clearfix"></div>
			<table id="tabel_pengajuan" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 15%">Pemohon</th>
						<th style="width: 30%">Judul</th>
						<th style="width: 30%">Waktu Pelaksanaan</th>
						<th style="width: 11%;text-align:center;">Persetujuan</th>
						<th style="width: 11%;text-align:center;">Status</th>
						<th style="width: 8%;text-align:center;">Opsi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<style>
	.tabel_custom {
		border-collapse: collapse;
		font-size: 11px;
	}
	.tabel_custom > thead {
		background-color: #0079BA;
		color: #f2f2f2;
	}
	.tabel_custom > thead > tr > th {
		vertical-align: middle;
		padding: 6px 8px;
	}
	.tabel_custom > tbody > tr > td {
		vertical-align: middle;
		padding: 2px 8px;
	}
	.tabel_custom tr:nth-child(even){background-color: #f2f2f2;}
	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script>
	$(document).ready(function (){
		tabel_siswa = $('#tabel_pengajuan').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ajax: {
				"url" : "{!! route('source-datatables-pengajuan-additional') !!}",
				"type" : "POST",
			},
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'pemohon', name: 'pemohon', orderable: true, searchable: true },
				{data: 'judul', name: 'judul', orderable: true, searchable: true },
				{data: 'waktu', name: 'waktu', orderable: false, searchable: true },
				{data: 'acc', name: 'acc', orderable: false, searchable: true },
				{data: 'status', name: 'status', orderable: false, searchable: true },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	});
</script>
@endpush