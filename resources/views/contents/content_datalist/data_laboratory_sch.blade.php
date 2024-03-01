@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
	<li class="active"><a href="#">Jadwal Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Jadwal Laboratorium</h3>
			<div class="pull-right">
				<a href="{{ url('laboratorium/form-input-jadwal/'.$lab_id) }}">
					<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tambah Jadwal Laboratorium</button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-12" style="margin: 0px 0px 10px 0px;">
					<button id="act-filter" class="btn btn-flat btn-xs btn-default" onclick="actFilterSch()"><i class="ri-filter-line" style="margin-right: 4px;"></i> Filter Jadwal</button>
					<button id="act-calender" class="btn btn-flat btn-xs btn-default"><i class="ri-calendar-schedule-line" style="margin-right: 4px;"></i> Mode Kalender</button>
					<button id="act-close-filter" class="btn btn-flat btn-xs btn-default pull-right" onclick="actCloseFilter()" style=" display:none;"><i class="ri-close-circle-line" style="margin-right: 4px;"></i> Tutup</button>
				</div>
			</div>
			<div id="field-filter" style="margin: 0px 0px 10px 0px;display:true;">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group" style="margin-bottom: 10px">
							<label class="control-label" >
								Filter Tipe Jadwal
							</label>
							<select name="inp_tipe_jadal" id="inp-tipe-jadwal" class="form-control input-sm" placeholder="">
								<option value="all">Semua</option>
								<option value="reguler">Reguler</option>
								<option value="non_reguler">Non Reguler</option>
							</select>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group" style="margin-bottom: 10px">
							<label class="control-label" >
								Filter Hari
							</label>
							<div class="row">
								<div class="col-md-6">
									{{-- <input type="text" name="inp_start" id="date-pick-start" class="form-control input-sm" placeholder="mulai.."> --}}
									<select type="text" class="form-control input-sm" name="inp_day" id="inp-day" value="" placeholder="Pilih hari..">
										<option value="all">Semua</option>
										<option value="sunday" @if (old('inp_day') == 'sunday') selected @endif >Minggu</option>
										<option value="monday" @if (old('inp_day') == 'monday') selected @endif >Senin</option>
										<option value="tuesday" @if (old('inp_day') == 'tuesday') selected @endif >Selasa</option>
										<option value="wednesday" @if (old('inp_day') == 'wednesday') selected @endif >Rabu</option>
										<option value="thursday" @if (old('inp_day') == 'thursday') selected @endif >Kamis</option>
										<option value="friday" @if (old('inp_day') == 'friday') selected @endif >Jumat</option>
										<option value="saturday" @if (old('inp_day') == 'saturday') selected @endif >Sabtu</option>
									</select>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<button class="btn btn-sm btn-default" onclick="actFilter()">Filter</button>
					</div>
				</div>
			</div>
			<hr class="mt-1" style="margin: 0px 0px 10px 0px;">
			<div class="clearfix"></div>
			<table id="tabel_lab_sch" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 10%">Hari</th>
						<th style="width: 15%">waktu</th>
						<th style="width: 12%">Tipe Jadwal</th>
						<th style="width: 20%">Mata Kuliah</th>
						<th style="width: 15%">Kelompok Belajar</th>
            <th style="width: 15%">Dosen/Penanggung Jawab</th>
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
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
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
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script>
</script>
<script>
	function datatablesLabSchedule(filter_type,filter_day) {
		$('#tabel_lab_sch').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			stateSave: false,
			bServerSide: true,
			pageLength: 15,
			lengthMenu: [ [15, 30, 60, -1], [15, 30, 60, "All"] ],
			language: {
				lengthMenu : "Show  _MENU_",
				search: "Cari "
			},
			ajax: {
				"url" : "{!! route('source-datatables-schedule-lab') !!}",
				"type" : "POST",
				"data" : {
					"lab_id":"{{ $lab_id }}",
					"filter_type":filter_type,
					"filter_day":filter_day,
				},
			},
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'day', name: 'day', orderable: true, searchable: true },
				{data: 'time', name: 'time', orderable: true, searchable: true },
				{data: 'type', name: 'type', orderable: true, searchable: true },
				{data: 'subject', name: 'subject', orderable: true, searchable: true },
				{data: 'group', name: 'group', orderable: true, searchable: true },
				{data: 'person', name: 'person', orderable: true, searchable: true },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	};
	function actFilterSch() {
		$('#field-filter').fadeIn();
		$('#act-close-filter').fadeIn();
		$('#act-filter').removeClass('btn-default').addClass('btn-primary');
	};
	function actCloseFilter() {
		$('#field-filter').hide();
		$('#act-close-filter').hide();
		$('#act-filter').removeClass('btn-primary').addClass('btn-default');
	};
	function actFilter() {
		var valFilterType = $('#inp-tipe-jadwal').find(":selected").val();
		var valFilterDay = $('#inp-day').find(":selected").val();
		$('#tabel_lab_sch').DataTable().clear().destroy();
		datatablesLabSchedule(valFilterType,valFilterDay);
	};
	function actDeleteSchLab() {
	};
</script>
<script>
	$('#date-pick-start').datepicker({
    autoclose: true,
		isRTL: false,
    todayHighlight: true,
		language: 'id',
    format: 'DD, dd-mm-yyyy',
    orientation:'bottom',
  });
  $('#date-pick-end').datepicker({
    autoclose: true,
		isRTL: false,
    todayHighlight: true,
    language: 'id',
    format: 'DD, dd-mm-yyyy',
    orientation:'bottom',
  });
</script>
<script>
	datatablesLabSchedule('all','all');
</script>
@endpush