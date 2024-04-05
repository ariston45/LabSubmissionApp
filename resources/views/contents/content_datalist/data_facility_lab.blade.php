@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Jadwal Laboratorium</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Jadwal Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Jadwal Laboratorium</h3>
			<div class="pull-right">
				{{-- <a href="{{ url('laboratorium/form-input-lab') }}">
					<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tambah Jadwal</button>
				</a> --}}
			</div>
		</div>
		<div class="box-body">
			<div class="clearfix"></div>
			<table id="tabel-jadwal-laboratorium" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 60%">Nama Laboratorium</th>
						<th style="width: 10%;text-align:center;">Status</th>
						<th style="width: 25%;text-align:center;">Opsi</th>
						{{-- <th style="width: 20%">Kepala Lab</th>
						<th style="width: 15%">Status</th>
            <th style="width: 30%">Lokasi</th> --}}
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
		padding: 6px 8px;
	}
	.tabel_custom > tbody > tr > td {
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
		tabel_siswa = $('#tabel-jadwal-laboratorium').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ajax: {
				"url" : "{!! route('source_datatables_lab_byfacility') !!}",
				"type" : "POST",
			},
			columnDefs: [
				{ orderable: false, targets: 1 }
			],
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'name', name: 'name', orderable: true, searchable: true },
				// {data: 'head', name: 'head', orderable: true, searchable: true },
				{data: 'status', name: 'status', orderable: false, searchable: true },
				// {data: 'location', name: 'location', orderable: true, searchable: true },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	});
</script>
@endpush