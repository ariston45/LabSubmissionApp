@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Pengaturan</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Users</h3>
			<div class="pull-right">
				<a href="{{ url('pengaturan/user/form-input-user') }}">
					<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tambah </button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="clearfix"></div>
			<form action="{{ route('actio_to_users') }}" method="POST">
				@csrf
				<div class="row" style="margin-bottom: 20px;">
					<div class="col-md-12">
						<div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}" >
							<div class="col-sm-6 col-md-5">
								<div class="input-group">
									<span class="input-group-addon"><b>Pilih Opsi</b></span>
									<select name="op" id="op" class="form-control input-sm">
										<option value="0">--Pilih Opsi--</option>
										<option value="1">Update Status Nonaktif</option>
										<option value="2">Update Status Aktif</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6 col-md-5">
								<button class="btn btn-sm btn-flat btn-default" type="submit">Submit</button>
							</div>
						</div>
					</div>
					@if ($errors->has('check_opsi'))
						<div class="col-md-12" style="margin-top: 8px;margin-left: 5px;">
							<span style="color: red;"><i>{{ $errors->first('check_opsi') }}</i></span>
						</div>
					@endif
				</div>
				<table id="tabel_laboratorium" class="table tabel_custom table-condensed">
					<thead>
						<tr>
							<th style="width: 5%"><input type="checkbox" class="check_in_data" id="check_all" value=""></th>
							<th style="width: 30%">Nama</th>
							<th style="width: 20%">ID</th>
							<th style="width: 15%">Email</th>
							<th style="width: 15%">Level</th>
							<th style="width: 15%">Status</th>
							<th style="width: 10%;text-align:center;">Opsi</th>
						</tr>
					</thead>
				</table>
			</form>
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
	$('#check_all').click(function() {
    $('.check_in_data').prop('checked', this.checked);
  });
</script>
<script>
	$(document).ready(function (){
		tabel_siswa = $('#tabel_laboratorium').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ajax: {
				"url" : "{!! route('source-datatables-user') !!}",
				"type" : "POST",
			},
			columns: [
				// {data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'check', name: 'check', orderable: false, searchable: false },
				{data: 'name', name: 'name', orderable: true, searchable: true },
				{data: 'no_id', name: 'no_id', orderable: true, searchable: true },
				{data: 'email', name: 'email', orderable: true, searchable: true },
				{data: 'level', name: 'level', orderable: true, searchable: true },
				{data: 'status', name: 'status', orderable: true, searchable: true },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	});
</script>
@endpush