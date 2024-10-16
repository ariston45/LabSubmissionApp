@extends('layout.app')
@section('title')
SIPLAB | Dashboard
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
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Jadwal Reguler {{ $lab->lab_name }}</h3>
			<div class="pull-right">
				<a href="{{ url('jadwal_lab/reguler') }}/{{ $lab->lab_id }}">
					<button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="clearfix"></div>
			<table id="tabel-jadwal-reguler" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 15%">Tanggal</th>
						<th style="width: 10%;">Jam</th>
						<th style="width: 20%;">Grup Belajar</th>
						<th style="width: 20%;">Subyek Belajar</th>
						<th style="width: 20%;">Penanggung Jawab</th>
						<th style="width: 10%;text-align:center;">Opsi</th>
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
<link rel="stylesheet" href="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">
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
<script src="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script>
	$(document).ready(function (){
		$('#tabel-jadwal-reguler').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ordering:false,
			ajax: {
				"url" : "{!! route('source-datatables-reguler-schedule-lab') !!}",
				"type" : "POST",
				"data" : {
					"lab_id":"{{ $lab->lab_id }}"
				},
			},
			columnDefs: [
				{ orderable: false, targets: 1 }
			],
			columns: [
				{
					data: 'DT_RowIndex',
					name: 'DT_RowIndex'
				},
				{
					data: 'date_start',
					name: 'date_start',
					orderable: true,
					searchable: true
				},
				{
					data: 'time',
					name: 'time',
					orderable: true,
					searchable: true
				},
				{
					data: 'group',
					name: 'group',
					orderable: true,
					searchable: true
				},
				{
					data: 'subject',
					name: 'subject',
					orderable: true,
					searchable: true
				},
				{
					data: 'person',
					name: 'person',
					orderable: true,
					searchable: true
				},
				{
					data: 'opsi',
					name: 'opsi',
					orderable: true,
					searchable: true
				},
			]
		});
	});
</script>
<script>
	function actDeleteSchLab(id) {
		var del_url = '{{ url("jadwal_lab/delete-sch-lab-reguler/") }}/' + id;
		$.confirm({
			title: 'Konfirmasi Hapus !',
			content: 'Apakah anda yakin akan menghapus jadwal dari laboratorium ?',
			type: 'red',
			animateFromElement: false,
			animation: 'opacity',
			closeAnimation: 'opacity',
			buttons: {
				confirm: {
					text: 'Iya Hapus',
					btnClass: 'btn-danger',
					action: function() {
						location.replace(del_url);
					}
				},
				batal: function() {},
			}
		});
	};
</script>
@endpush