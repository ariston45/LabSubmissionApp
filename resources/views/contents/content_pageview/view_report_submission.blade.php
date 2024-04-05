@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laporan</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Laporan</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-survey-fill" style="margin-right: 4px;"></i> Laporan</h3>
			<div class="pull-right">
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-2">
					<a href="{{ url('laporan') }}">
						<button class="btn btn-block btn-flat btn-sm btn-primary" style="margin-bottom: 10px;">Lap. Pengajuan</button>
					</a>
					<a href="{{ url('laporan/laboratorium') }}">
						<button class="btn btn-block btn-flat btn-sm btn-default" style="margin-bottom: 10px;">Lap. Laboratorium</button>
					</a>
				</div>
				<div class="col-md-10">
					<form class="form-horizontal" action="{{ route('report_pengajuan') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group has-feedback {{ $errors->has('date_start') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
							<label class="col-sm-12 col-md-3 control-label">
								<span style="padding-right: 30px;">
									Tanggal Awal
								</span>
							</label>
							<div class="col-sm-12 col-md-9">
								<div class="input-group inp-split-cst date " id="date-pick-start">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-start" name="date_start"  value="{{ old('date_start') }}" class="form-control pull-right" placeholder="yyyy-mm-dd" readonly>
								</div>
								@if ($errors->has('date_start'))
								<span style="color: red;"><i>{{ $errors->first('date_start') }}</i></span>
								@endif
							</div>
						</div>
						<div class="form-group has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
							<label class="col-sm-12 col-md-3 control-label">
								<span style="padding-right: 30px;">
									Tanggal Akhir
								</span>
							</label>
							<div class="divcol-sm-12 col-md-9">
								<div class="input-group inp-split-cst date has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }}" id="date-pick-end">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-end" class="form-control pull-right" name="date_end" value="{{ old('date_end') }}" placeholder="yyyy-mm-dd" readonly>
								</div>
								@if ($errors->has('date_end'))
								<span style="color: red;"><i>{{ $errors->first('date_end') }}</i></span>
								@endif
							</div>
						</div>
						<div class="form-group has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
							<label class="col-sm-12 col-md-3 control-label">
								<span style="padding-right: 30px;">
									Laboratorium
								</span>
							</label>
							<div class="divcol-sm-12 col-md-9">
								<select id="inp-lab" class="form-control" name="inp_lab" >
									<option value="all">Semua Lab</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="pull-right">
									<button class="btn btn-block btn-flat btn-sm btn-success" style="margin-bottom: 10px;">Submit</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@if (session('data_report'))
<div class="col-md-12">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i>Data Report</h3>
			<div class="pull-right">
				<a href="{{ url('laboratorium/form-input-lab') }}">
					<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tambah Laboratorium</button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="clearfix"></div>
			<table id="tabel_laboratorium" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 20%">Nama</th>
						<th style="width: 35%">Judul</th>
						<th style="width: 10%">Lab.</th>
						<th style="width: 20%">Waktu Peminjaman</th>
						<th style="width: 10%;text-align:center;">Download Laporan</th>
					</tr>
				</thead>
				<tbody>
					@php
						$no = 1;
					@endphp
					@foreach (session('data_report') as $list)
					<tr>
						<td style="width: 5%">{{ $no }}</td>
						<td style="width: 20%">{{ $list['user'] }}</td>
						<td style="width: 35%">{{ $list['judul'] }}</td>
						<td style="width: 10%">{{ $list['lab'] }}</td>
						<td style="width: 20%">{!! $list['waktu'] !!}</td>
						<td style="width: 10%;text-align:center;">{{ $list['download_laporan'] }}</td>
					</tr>
					@php
						$no++;
					@endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endif
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
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
	.ts-control {
		border-radius: 0px;
    padding: 6px 12px;
	}
  /* .has-items .ts-control>input{
    margin: 4px 4px !important;
  } */
	.form-select {
		border-radius: 0px;
	}
  .focus .ts-control {
    border-color: #0277bd;
    box-shadow: 0 0 0 0rem rgba(254, 255, 255, 0.25);
    outline: 0;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>

{{-- Varibles --}}
<script>
	var select_lab = new TomSelect("#inp-lab",{
		create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-signed-user">'+escape(data.title)+'</div>';
			}
		}
	});
</script>
{{-- Functions --}}
<script>
	function actionGetLab() {
		var data_lab = [];
		var par_a;
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: "{{ route('source-data-all-lab') }}",
			data: {
				"param":par_a,
			},
			async: false,
			success: function(result) {
				if (result != null) {
					var dataOption = JSON.parse(result);
					for (let index = 0; index < dataOption.length; index++) {
						data_lab.push({
							id:dataOption[index].id,
							title:dataOption[index].title,
						});
					}
				}
			},
		});
		return data_lab;
	};
</script>
{{-- Ready Function --}}
<script>
	$(document).ready(function() {
		var dataOptLab = actionGetLab();
		// select_lab.clear();
		// select_lab.clearOptions();
		select_lab.addOptions(dataOptLab);
	});
</script>
{{-- Other Script --}}
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
</script>
@endpush