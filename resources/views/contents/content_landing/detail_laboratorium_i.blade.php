
@extends('layout.app3')
@section('title')
SIPLAB | Dashboard
@endsection
@section('content')
<main class="main">
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Detail Laboratorium</h1>
            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('page-laboratorium') }}">Laboratorium</a></li>
          <li class="current">Detail Laboratorium</li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses-course-details" class="courses-course-details section" style="background-color: aliceblue;">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          @if ($data_lab->lab_img == null)
          <img src="{{ url('assets/img/img_placeholder.png') }}" class="img-fluid" alt="">
          @else
          <img src="{{ url('public/storage/image_lab/'.$data_lab->lab_img) }}" class="img-fluid" alt="">
          @endif
          <h3 style="color: #0b4d70;">{{ $data_lab->lab_name }}</h3>
          <div style="color: #444444cc;">
            {!! $data_lab->lab_notes !!}
          </div>
        </div>
        <div class="col-lg-4">
          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Kalab</h5>
            <p style="color: #444444cc;">
            @foreach ($user_kalab as $list)
              {{ $list->name }} <br>              
            @endforeach
            </p>
          </div>
          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Kasublab</h5>
            <p style="color: #444444cc;">{{ $data_lab->name }}</p>
          </div>
          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Teknisi</h5>
            <p style="color: #444444cc;">
            @foreach ($data_technicians as $list)
              - {{ $list->name }} <br>              
            @endforeach
            </p>
          </div>
          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Biaya Sewa</h5>
            <p style="color: #444444cc;">{{ funCurrencyRupiah($data_lab->lab_rent_cost) }}</p>
          </div>
          @if (checkUser(['LECTURE','STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER']) == true)
          <div class="align-items-center d-grid gap-2">
            <a href="{{ url('pengajuan/laboratorium/form-pengajuan-pinjam/'.$data_lab->lab_id) }}">
              <button type="button" class="btn btn-success" style="width: 100%;">Ajukan Peminjaman</button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  <span id="init-jadwal"></span>
  <section id="tabs" class="tabs section" style="background-color: aliceblue;">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item pl-2">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-0" style="color: #444444cc; padding-left: 16px;">Jadwal Penggunaan Laboratorium</a>
            </li>
            <li class="nav-item pl-2">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-1" style="color: #444444cc; padding-left: 16px;">Fasilitas dan Alat</a>
            </li>
            <li class="nav-item" >
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2" style="color: #444444cc; padding-left: 16px;">Layanan Uji Lab</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-0">
              <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                  <h3 style="color: #0b4d70;">Jadwal Penggunaan laboratorium</h3>
                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <a href="{{url('page-laboratorium/detail-laboratorium/'.$lab_id.'#init-jadwal')}}">
                        <button id="btn-sch-1" class="btn btn-secondary">Jadwal Pinjam</button>
                      </a>
                      <a href="{{url('page-laboratorium/detail-laboratorium-b/'.$lab_id.'#init-jadwal')}}">
                        <button id="btn-sch-2" class="btn btn-primary">Jadwal Reguler</button>
                      </a>
                    </div>
                  </div>
                  <div id="field-calender-reguler" style="display:block;">
                    <div id="calender_reguler" style="width: 100%;"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-1">
              <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                  <h3 style="color: #0b4d70;">Fasilitas Dan Alat</h3>
                  <table class="table-bordered tabel_custom" style="width: 100%;">
                    <thead>
                      <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th style="width: 65%; text-align: center;">Nama Fasilitas Dan Alat</th>
                        <th style="width: 30%;text-align: center;">Biaya Pinjam/Hari</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data_facility as $list)
                      <tr>
                        <td style="width: 5%; text-align: center; vertical-align: top;">{{ $no }}</td>
                        <td>
                          <b>{{ $list->laf_name }}</b><br>
                          <p>{{ $list->laf_description }}</p>
                        </td>
                        <td style="width: 5%; text-align: center;">{{ funCurrencyRupiah($list->laf_value) }}</td>
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
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                  <h3 style="color: #0b4d70;">Layanan Uji Lab</h3>
                  <table class="table-bordered tabel_custom" style="width: 100%;">
                    <thead>
                      <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th style="width: 65%; text-align: center;">Nama Uji Laboratorium</th>
                        <th style="width: 30%;text-align: center;">Biaya Pinjam</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data_uji_lab as $list)
                      <tr>
                        <td style="width: 5%; text-align: center;">{{ $no }}</td>
                        <td>{{ $list->lsv_name }}</td>
                        <td style="width: 30%;text-align: center;">
                          <a href="{{ url('page-layanan/detail-uji-lab/'.$list->lsv_id) }}">
                            <span class="badge rounded-pill bg-warning  text-dark w-50" >Lihat Detail</span>
                          </a>
                        </td>
                      </tr>
                      @php
                        $no++;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">
<style>
  #inp-rumpun{
    background-color:aliceblue,
  }
  a{
    color: #0b4d70;
  }
  .tabel_custom {
		border-collapse: collapse;
		font-size: 11px;
    border: aliceblue;
	}
	.tabel_custom > thead {
		background-color: #016e72;
		color: #f2f2f2;
	}
	.tabel_custom > thead > tr > th {
		vertical-align: middle;
		padding: 6px 8px;
	}
	.tabel_custom > tbody > tr > td {
    color: #444444cc;
    font-weight: 500;
    font-size: 13px;
		vertical-align: middle;
		padding: 4px 8px;
    background-color: #d9eff5a4;
	}
	.tabel_custom tr:nth-child(even){background-color: #c1f0fd;}
	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
  .fc .fc-toolbar-title{
    color: #016e72;
  }
  .fc-col-header-cell-cushion{
    color: #eaf4fa;
  }
  .fc .fc-col-header-cell{
    background-color: #0b4d70;
  }
  .fc-daygrid-day-number {
    font-size: 11px; /* Sesuaikan ukuran font untuk teks tanggal */
}
.fc-event-time{
  font-size: 10px;
}
  .fc-event-title {
    font-size: 8px; /* Ubah ukuran sesuai kebutuhan */
    text-align: left;
		white-space: normal; /* Membuat teks dalam elemen judul event bisa membungkus */
		word-break: break-word; /* Memecah kata jika terlalu panjang */
		overflow-wrap: anywhere; /* Membungkus teks pada titik-titik yang sesuai */
}
.fc-event-dot {
    display: none; /* Menghilangkan titik warna */
}
.fc-timegrid-slot{
  color : #016e72;
}
.fc-timegrid-axis-cushion{
  color: #016e72;
  }
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
{{-- Variables --}}
<script>
</script>
{{-- Function --}}
<script>
  function changeSchOne() {
    $("#btn-sch-1").removeClass("btn-secondary").addClass("btn-primary");
    $("#btn-sch-2").removeClass("btn-primary").addClass("btn-secondary");
    $("#field-calender-reguler").hide();
    $("#field-calender").fadeIn();
  };
  function changeSchTwo() {
    $("#btn-sch-2").removeClass("btn-secondary").addClass("btn-primary");
    $("#btn-sch-1").removeClass("btn-primary").addClass("btn-secondary");
    $("#field-calender").hide();
    $("#field-calender-reguler").fadeIn();
    $('#calender_reguler').fullCalendar('render');
    $('#calender_reguler').fullCalendar('refetchEvents');
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
			url: '{{ route("source_data_sch_lab_open") }}',
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
  function actSourceScheduleReguler(parStart,parEnd) {
		var id = '{{ $lab_id }}';
		var valData = [];
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: '{{ route("source_data_sch_lab_open_reg") }}',
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
	
</script>
{{-- executed function --}}
<script>
  // actListLaboratorium();
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
		var now = '{{ date("Y-m-d H:i:s") }}';
		var calendar2 = new FullCalendar.Calendar(document.getElementById('calender_reguler'), {
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
			navLinks: false,
			editable: false,
			selectable: false,
			selectMirror: false,
			nowIndicator: true,
      // hiddenDays: [6],
			dateClick: function(info) {
			},
			eventClick: function(info) {
			},
			select: function (fetchInfo, successCallback, failureCallback) {
				var parStart = fetchInfo.startStr;
				var parEnd = fetchInfo.endStr;
			},
			events: function(fetchInfo, successCallback, failureCallback){
				var parStart = fetchInfo.startStr;
				var parEnd = fetchInfo.endStr;
				var eventSource = actSourceScheduleReguler(parStart,parEnd);
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
        return{
          html: '<span class="badge bg-primary fc-event-title">'+evn_time+' : '+evn_title+'</span>'
        }
				
			},
      
		});
		calendar2.render();
	});
</script>
@endpush