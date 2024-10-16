@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Jadwal Laboratorium</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
	<li class="active"><a href="#">Jadwal Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Jadwal Pinjam Laboratorium</h3>
			<div class="pull-right">
				@if (rulesUser(['ADMIN_SYSTEM','ADMIN_MASTER','LAB_HEAD','ADMIN_PRODI']))
				@endif
				<a href="{{ url('jadwal_lab') }}">
					<button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-lg-12" style="margin: 0px 0px 0px 0px;">
					<h4>
						<b>
							Laboratorium : {{ $data_lab->lab_name }}
						</b>
					</h4>
					@if (rulesUser(['STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LECTURE']))
					<p><i>Untuk membuat pengajuan baru silakan klik tombol <b>Buat Pengajuan</b> di bawah tabel kalendder.</i></p>
					@endif
				</div>
			</div>
			<div id="field-calender" style="margin: 0px 0px 10px 0px;display:block;">
				<div id="calender" style="width: 100%;"></div>
				<div class="row">
					<div class="col-sm-12">
						<i>Catatan : </i>
						{{-- <small class="label bg-navy">Label warna untuk jadwal reguler</small> --}}
						<small class="label bg-purple">Label warna untuk jadwal pinjam</small>
					</div>
				</div>
			</div>
			<hr class="mt-1" style="margin: 0px 0px 10px 0px;">
			<div class="clearfix"></div>
			@if (rulesUser(['STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER','LECTURE']))
			<a href="{{ url('pengajuan/laboratorium/form-pengajuan-pinjam/'.$data_lab->lab_id) }}" target="_BLANK">
				<button class="btn btn-flat btn-xs btn-primary"><i class="ri-add-circle-line" style="margin-bottom: 10px;"></i> Buat Pengajuan</button>
			</a>
			@endif
			<table id="tabel_lab_sch" class="table tabel_custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 15%">Tanggal</th>
						<th style="width: 10%">waktu</th>
						<th style="width: 10%">Tipe Jadwal</th>
						<th style="width: 20%">Mata Kuliah</th>
						<th style="width: 20%">Perorangan/Kelompok</th>
						<th style="width: 20%">Dosen/Penanggung Jawab</th>
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
<link rel="stylesheet" href="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">
<style>
	.btn {
		outline: none;
	}

	.tabel_custom {
		border-collapse: collapse;
		font-size: 11px;
	}

	.tabel_custom>thead {
		background-color: #0079BA;
		color: #f2f2f2;
	}

	.tabel_custom>thead>tr>th {
		padding: 6px 8px;
	}

	.tabel_custom>tbody>tr>td {
		padding: 2px 8px;
	}

	.tabel_custom tr:nth-child(even) {
		background-color: #f2f2f2;
	}
	.fc-event-title {
		text-align: left;
		white-space: normal; /* Membuat teks dalam elemen judul event bisa membungkus */
		word-break: break-word; /* Memecah kata jika terlalu panjang */
		overflow-wrap: anywhere; /* Membungkus teks pada titik-titik yang sesuai */
	}
	.fc-daygrid-day-number {
		color: #010414; /* Ganti dengan warna yang diinginkan */
	}
	.fc-col-header-cell{
		color: #000;
	}

	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>

<script src="{{ url('assets/plugins/fullcalender-scheduler/dist/index.global.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>

<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script>
</script>
<script>
	function datatablesLabSchedule(filter_type, filter_day) {
		$('#tabel_lab_sch').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			stateSave: false,
			bServerSide: true,
			pageLength: 15,
			lengthMenu: [
				[15, 30, 60, -1],
				[15, 30, 60, "All"]
			],
			language: {
				lengthMenu: "Show  _MENU_",
				search: "Cari "
			},
			ajax: {
				"url": "{!! route('source-datatables-schedule-lab-pinjam') !!}",
				"type": "POST",
				"data": {
					"lab_id": "{{ $lab_id }}",
					"filter_type": filter_type,
					"filter_day": filter_day,
				},
			},
			columns: [{
					data: 'DT_RowIndex',
					name: 'DT_RowIndex'
				},
				{
					data: 'day',
					name: 'day',
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
					data: 'type',
					name: 'type',
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
					data: 'group',
					name: 'group',
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
					orderable: false,
					searchable: false
				},
			]
		});
	};
	function datatablesLabSchedule_I(dayStart,dayEnd) {
		$('#tabel_lab_sch').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			stateSave: false,
			bServerSide: true,
			ordering: false,
			pageLength: 15,
			lengthMenu: [
				[15, 30, 60, -1],
				[15, 30, 60, "All"]
			],
			language: {
				lengthMenu: "Show  _MENU_",
				search: "Cari "
			},
			ajax: {
				"url": "{!! route('source-datatables-schedule-lab-pinjam') !!}",
				"type": "POST",
				"data": {
					"lab_id": "{{ $lab_id }}",
					"dtStart": dayStart,
					"dtEnd": dayEnd,
				},
			},
			columns: [{
					data: 'DT_RowIndex',
					name: 'DT_RowIndex'
				},
				{
					data: 'date',
					name: 'date',
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
					data: 'type',
					name: 'type',
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
					data: 'group',
					name: 'group',
					orderable: true,
					searchable: true
				},
				{
					data: 'person',
					name: 'person',
					orderable: true,
					searchable: true
				},
			]
		});
	};
	function actFilterSch() {
		$('#field-filter').fadeIn();
		$('#act-close-button').show();
		$('#act-filter').removeClass('btn-default').addClass('btn-primary');
		$('#act-calender').removeClass('btn-primary').removeClass('btn-default').addClass('btn-default');
	};
	function actCalenderSch() {
		$('#act-close-button').show();
		$('#field-filter').hide();
		$('#field-calender').fadeIn();
		$('#act-filter').removeClass('btn-primary').removeClass('btn-default').addClass('btn-default');
		$('#act-calender').removeClass('btn-default').addClass('btn-primary');
	};
	function actCloseButton() {
		$('#act-close-button').hide();
		$('#field-filter').hide();
		$('#act-filter').removeClass('btn-primary').addClass('btn-default');
	};
	function actFilter() {
		var valFilterType = $('#inp-tipe-jadwal').find(":selected").val();
		var valFilterDay = $('#inp-day').find(":selected").val();
		$('#tabel_lab_sch').DataTable().clear().destroy();
		datatablesLabSchedule(valFilterType, valFilterDay);
	};
	function actDeleteSchLab(id) {
		var del_url = '{{ url("laboratorium/delete-sch-laboratorium/") }}/' + id;
		$.confirm({
			title: 'Konfirmasi Hapus !',
			content: 'Apakah anda yakin akan menghapus jadwal dari laboratorium <b>{{ $data_lab->lab_name }}</b> ?',
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
	function actSourceSchedule(parStart,parEnd) {
		var id = '{{ $lab_id }}';
		var valData = [];
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: '{{ route("source_data_sch_lab_pinjam") }}',
			data: {
				'lab_id':id,
				'start':parStart,
				'end':parEnd				
			},
			async: false,
			success: function(result) {
				var dataJsonPhr = JSON.parse(result);
				for (let index = 0; index < dataJsonPhr.length; index++) {
          valData.push({
						'url':dataJsonPhr[index].url,
            'title':dataJsonPhr[index].title,
            'start':dataJsonPhr[index].start,
						'end':dataJsonPhr[index].end,
						'color':dataJsonPhr[index].color,
						'classNames':dataJsonPhr[index].className,
          });
        }
			},
		});
		return valData;
	};
	function actCalenderFilterByDay(parStart,parEnd) {
		// datatablesLabSchedule('all', 'all');
		var s = moment(parStart).format('YYYYMMDD');
		var e = moment(parEnd).format('YYYYMMDD');
		// $('#tabel_lab_sch').DataTable().clear().destroy();
		datatablesLabSchedule_I(s,e);
	};
</script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var now = '{{ date("Y-m-d H:i:s") }}';
		var calendar = new FullCalendar.Calendar(document.getElementById('calender'), {
			schedulerLicenseKey: 'GPL-My-Project-Is-Open-Source',
			themeSystem: 'standard',
			locale: 'id',
			scrollTime: '23:59',
			initialDate: now,
			initialView: 'dayGridMonth',
			headerToolbar: {
				left: 'prev,next',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},
			eventTimeFormat: {
				hour: '2-digit',
				minute: '2-digit',
				hour12: false
			},
			height: 'auto',
			navLinks: true,
			editable: true,
			selectable: true,
			selectMirror: true,
			nowIndicator: true,
			dateClick: function(info) {
				// alert('test');
			},
			eventClick: function(info) {
				if (info.event.url) {
					info.jsEvent.preventDefault();
					window.open(info.event.url, "_blank");
				}
			},
			select: function (fetchInfo, successCallback, failureCallback) {
				var parStart = fetchInfo.startStr;
				var parEnd = fetchInfo.endStr;
				$('#tabel_lab_sch').DataTable().clear().destroy();
				actCalenderFilterByDay(parStart,parEnd);
			},
			events: function(fetchInfo, successCallback, failureCallback){
				var parStart = fetchInfo.startStr;
				var parEnd = fetchInfo.endStr;
				var eventSource = actSourceSchedule(parStart,parEnd);
				$('#tabel_lab_sch').DataTable().clear().destroy();
				actCalenderFilterByDay(parStart,parEnd);
				successCallback(eventSource);
			},
			eventContent: function(arg) {
				var init_class = arg.event.classNames;
				var evn_title = arg.event.title;
				var set_time = arg.event.start;
				var evn_time = set_time.toLocaleTimeString('id-ID',{
					hour: '2-digit',
					minute: '2-digit',
					hour12: false,
				});
				if (init_class == 'sch_reguler') {
					return{
						html: '<div class="label bg-navy fc-event-title">'+evn_time+' : '+evn_title+'</div>'
					}
				}else if (init_class == 'sch_non_reguler') {
					return{
						html: '<div class="label bg-purple fc-event-title">'+evn_time+' : '+evn_title+'</div>'
					}
				}
			},
		});
		calendar.render();
	});
</script>

@endpush