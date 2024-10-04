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
	@if (rulesUser(['STUDENT','LECTURE','PUBLIC_MEMBER','PUBLIC_NON_MEMBER']))
	<div class="box box-solid">
		<div class="box-body" style="padding-bottom: 0px;padding-left: 0px;background-color: #01070a;">
			<div class="row">
				<div class="col-sm-12">
					@if (rulesUser(['STUDENT','LECTURE','PUBLIC_MEMBER','PUBLIC_NON_MEMBER']))
					<a href="{{ url('pengajuan/laboratorium') }}" class="btn btn-app bg-blue" style="min-width: 120px;">
						<i class="fa fa-building"></i> Pengajuan Lab
					</a>
					<a href="{{ url('pengajuan/uji_laboratorium') }}" class="btn btn-app bg-blue" style="min-width: 120px;">
						<i class="fa fa-flask"></i> Uji Lab
					</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Pengajuan</h3>
			<div class="pull-right">
				<button class="btn btn-flat btn-xs btn-default" onclick="showFilterField()"><i class="ri-filter-line" style="margin-right: 4px;"></i> Sembunyikan Filter</button>
			</div>
		</div>
		<div class="box-body">
			@if (rulesUser(['UNSET']))
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-12">
					<a href="{{ url('pengajuan') }}">
						<button class="btn btn-flat btn-xs btn-primary">Data Pengajuan Mahasiswa</button>
					</a>
					<a href="{{ url('pengajuan/additional') }}">
						<button class="btn btn-flat btn-xs btn-default">Data Pengajuan</button>
					</a>
				</div>
			</div>
			@elseif (rulesUser(['LAB_SUBHEAD']))
			@endif
			<div id="filter-field" style="margin-bottom: 20px; display: true;" >
				<form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
					<div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}">
						<label class="col-sm-12 col-md-3 control-label">
							<span style="padding-right: 30px;">
								Tanggal Pelaksanaan
							</span>
						</label>
						<div class="col-sm-12 col-md-9">
							<div class="row">
								<div class="col-sm-6">
									<div class="input-group inp-split-cst date" id="date-pick-start">
										<div class="input-group-addon bg-gray-active">
											<b>
												Tanggal Awal
											</b>
										</div>
										<input type="text" id="date-start" name="date_start" class="form-control pull-right input-sm" placeholder="yyyy-mm-dd" readonly>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group inp-split-cst date" id="date-pick-end">
										<div class="input-group-addon bg-gray-active">
											<b>
												Tanggal Akhir
											</b>
										</div>
										<input type="text" id="date-end" class="form-control pull-right input-sm" name="date_end" value="{{ old('date_end') }}" placeholder="yyyy-mm-dd" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}">
						<label class="col-sm-12 col-md-3 control-label" >
							<span style="padding-right: 30px;">
								Tanggal Kirim Pengajuan
							</span>
						</label>
						<div class="col-sm-12 col-md-9">
							<div class="row">
								<div class="col-sm-6">
									<div class="input-group inp-split-cst date" id="date-pick-start-crt">
										<div class="input-group-addon bg-gray-active">
											<b>
												Tanggal Awal
											</b>
										</div>
										<input type="text" id="date-start-crt" name="date_start_crt" class="form-control pull-right input-sm" placeholder="yyyy-mm-dd" readonly>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group inp-split-cst date" id="date-pick-end-crt">
										<div class="input-group-addon bg-gray-active">
											<b>
												Tanggal Akhir
											</b>
										</div>
										<input type="text" id="date-end-crt" class="form-control pull-right input-sm" name="date_end_crt" value="{{ old('date_end') }}" placeholder="yyyy-mm-dd" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}">
						<label class="col-sm-12 col-md-3 control-label" >
							<span style="padding-right: 30px;">
								Status Pengajuan
							</span>
						</label>
						<div class="col-sm-12 col-md-9">
							<select id="inp-status" class="form-control input-sm" name="inp_status">
								<option value="{{ null }}">Pilih status..</option>
								<option value="menunggu">Menunggu</option>
								<option value="disetujui">Disetujui</option>
							</select>
						</div>
					</div>
					<div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}">
						<div class="col-md-offset-3 col-sm-12 col-md-9">
							<div style="padding: 0px; ">
								<button type="button" class="btn btn-sm btn-success btn-flat" onclick="actionFilter()"><i class="ri-filter-2-line" style="margin-right: 5px;"></i>Filter Data</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<table id="tabel_pengajuan" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 3%">No</th>
						<th style="width: 15%">Pemohon</th>
						<th style="width: 25%">Judul</th>
						<th style="width: 10%">Waktu Pelaksanaan</th>
						<th style="width: 10%;text-align:center;">Persetujuan</th>
						<th style="width: 10%;text-align:center;">Teknisi</th>
						<th style="width: 10%;text-align:center;">Status</th>
						<th style="width: 10%;text-align:center;">Diajukan</th>
						<th style="width: 5%;text-align:center;">Opsi</th>
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
<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
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
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
{{-- Function --}}
<script>
	function mainData(par_a,par_b,par_c,par_d,par_e) {
		tabel_siswa = $('#tabel_pengajuan').DataTable({
			ordering: false,
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ajax: {
				"url" : "{!! route('source-datatables-pengajuan') !!}",
				"type" : "POST",
				"data":{
					"dt_start":par_a,
					"dt_end":par_b,
					"status":par_c,
					"crt_start":par_d,
					"crt_end":par_e,
				},
				error: function(jqXHR, textStatus, errorThrown){
					if (jqXHR.status != 0){
						// var del_url = '{{ url("laboratorium/delete-sch-laboratorium/") }}/' + id;
						$.confirm({
							title: 'Filter Gagal.',
							content: 'Tips:<br>*Jika menggunakan filter tanggal, inputan tanggal mulai dan tanggal akhir wajib diisi.'
							+'<br>*Apabila tidak menggunakan filter tanggal, inputan tanggal mulai dan tanggal akhir dikosongkan saja.',
							type: 'red',
							animateFromElement: false,
							animation: 'opacity',
							closeAnimation: 'opacity',
							buttons: {
								confirm: {
									text: 'OKE',
									btnClass: 'btn-default',
									action: function() {
										location.reload();
									}
								},
							}
						});
					}
				}
			},
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'pemohon', name: 'pemohon', orderable: true, searchable: true },
				{data: 'judul', name: 'judul', orderable: true, searchable: true },
				{data: 'waktu', name: 'waktu', orderable: false, searchable: true },
				{data: 'acc', name: 'acc', orderable: false, searchable: true },
				{data: 'tech', name: 'tech', orderable: false, searchable: true },
				{data: 'status', name: 'status', orderable: false, searchable: true },
				{data: 'waktu_pengajuan', name: 'waktu_pengajuan', orderable: false, searchable: true },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	};
	function showFilterField() {
		$('#filter-field').toggle(300);
	};
	function actionFilter() {  
		var inp_dt_start = $('#date-start').val();
		var inp_dt_end = $('#date-end').val();
		var inp_dt_start_crt = $('#date-start-crt').val();
		var inp_dt_end_crt = $('#date-end-crt').val();
		var inp_status = $('#inp-status').val();
		$('#tabel_pengajuan').DataTable().clear().destroy();
		mainData(inp_dt_start,inp_dt_end,inp_status,inp_dt_start_crt,inp_dt_end_crt);
	};
</script>
<script>
	$(document).ready(function (){
		var par_a = null;
		var par_b = null;
		var par_c = null;
		var par_d = null;
		var par_e = null;
		mainData(par_a,par_b,par_c,par_d,par_e);
	});
</script>
{{-- Call ids --}}
<script>
	$('#date-pick-start').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
	$('#date-pick-end').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
	$('#date-pick-start-crt').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
	$('#date-pick-end-crt').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
</script>
@endpush