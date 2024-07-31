
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
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Pengajuan {{$lab_test_data->lsv_name}}</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan/uji_laboratorium') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('action_pengajuan_static_labtest') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <input type="hidden" name="app_level" value="{{ $user_data->level }}">
        {{-- !! --}}
        <input type="hidden" id="inp-lsv" name="inp_lsv" value="{{ $lsv_id }}" >
        <input type="hidden" id="inp-lab" name="inp_lab" value="{{ $lab_test_data->lab_id }}" >
        <input type="hidden" id="inp-nama" name="inp_nama" value="{{ $user_data->name }}" >
        <input type="hidden" id="inp-id" name="inp_id" value="{{ $user_data->no_id }}" >
        <input type="hidden" id="inp-program-studi" name="inp_program_studi" value="{{ $user_data->usd_prodi }}">
        <input type="hidden" id="inp-fakultas" name="inp_fakultas" value="{{ $user_data->usd_fakultas }}">
        <input type="hidden" id="inp-institusi" name="inp_institusi" value="{{ $user_data->usd_universitas }}">
        <input type="hidden" id="inp-nomor-kontak" name="inp_nomor_kontak" value="{{ $user_data->usd_phone }}">
        <input type="hidden" id="inp-nomor-kontak" name="inp_address" value="{{ $user_data->usd_address }}">
        <input type="hidden" name="inp_type_sub" value="pinjam_lab">
        {{-- !! --}}
        <div class="col-md-offset-3 col-md-9">
          <div class="divider">Kegiatan</div>
        </div>
        <div class="form-group {{ $errors->has('inp_kegiatan') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Keperluan Kegiatan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-kegiatan" class="form-control" name="inp_kegiatan" onchange="actActivitySubs()">
              <option value="{{ null }}">Pilih kegiatan..</option>
              <option value="tp_penelitian_skripsi" @if (old('inp_kegiatan') == 'tp_penelitian_skripsi') selected @endif >Penelitian Skripsi</option>
              <option value="tp_lain_lain" @if (old('inp_kegiatan') == 'tp_lainnya') selected @endif >Lainnya</option>
            </select>
            <div id="data-loading" style="display: none;">
              <img src="{{ url('/public/assets/img/loading.gif') }}" class="img-loading" alt="">
            </div>
            @if ($errors->has('inp_kegiatan'))
						<span style="color: red;"><i>{{ $errors->first('inp_kegiatan') }}</i></span>
						@endif
          </div>
        </div>
        {{-- !! --}}
        @if (rulesUser(['STUDENT']))
        <div id="data-simontasi"></div>
        @endif
        {{-- Opsi untuk pilihan lain-lain --}}
        <div class="form-group has-feedback {{ $errors->has('inp_opsi_lainnya') ? ' has-error' : '' }}" id="fm-opsi" style="display: none;">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Tujuan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-tujuan" class="form-control" name="inp_tujuan" value="{{ old('inp_tujuan') }}" placeholder="Inputkan tujuan">
          </div>
        </div>
        {{-- --- --}}
        <div class="form-group has-feedback {{ $errors->has('inp_judul') ? ' has-error' : '' }}" id="fm-judul" style="display: none;">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Judul
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-judul-ii" class="form-control" name="inp_judul" value="{{ old('inp_judul') }}" placeholder="Judul kegiatan/ Judul Penelitian/ Judul pelatihan/ ...">
            @if ($errors->has('inp_judul'))
						<span style="color: red;"><i>{{ $errors->first('inp_judul') }}</i></span>
						@endif
          </div>
        </div>
        {{-- !! --}}
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool">
          <div class="divider">Jumlah Sampel</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_sample') ? ' has-error' : '' }}" id="fm-inp-sample">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Sampel
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="number" id="inp-sample" class="form-control" name="inp_sampel" value="{{ old('inp_sampel') }}" placeholder="Inputkan jumlah sampel...">
            @if ($errors->has('inp_sampel'))
						<span style="color: red;"><i>{{ $errors->first('inp_sampel') }}</i></span>
						@endif
          </div>
        </div>
        {{-- !! --}}
        <div class="col-md-offset-3 col-md-9 act-datetime">
          <div class="divider">Jadwal Kegiatan</div>
        </div>
        <div class="form-group has-feedback act-datetime {{ $errors->has('date_start') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Pengamnilan Hasil
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group inp-split-cst date" style="margin-bottom: 6px;">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="inp_date"  value="{{ old('inp_date') }}" class="form-control inp-date-s pull-right" placeholder="yyyy-mm-dd" readonly>
            </div>
            {{-- <div class="row" style="margin-bottom: 10px;">
              <div class="col-sm-11">
                <select name="inp_time[{{ $idx_time }}][]" id="inp-time" class="form-control inp-time-cls" multiple>
                  @foreach ($times as $item)
                    <option value="{{ $item->lti_id }}">{{ setTime($item->lti_start) }} - {{ setTime($item->lti_end) }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-1">
                <button type="button" id="btn-add-input-datetime" class="btn btn-flat btn-default">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </div>
            </div> --}}
            <div id="input-dt-container">
            </div>
            @if ($errors->has('sch_konflik_err'))
						<span style="color: red;"><i>{!! $errors->first('sch_konflik_err') !!}</i></span>
						@endif
          </div> 
        </div>
        {{-- ~ --}}
        <div id="cost-tables" class="col-md-offset-3 col-md-9" style="padding: 0px;">
          <div id="test-id"></div>
        </div>
      </div>
      <div class="box-footer">
        <div class="col-md-offset-3 col-md-9">
          <button type="button" class="btn btn-default btn-flat" onclick="actPrePayment();"><i class="ri-file-list-3-line" style="margin-right: 5px;"></i>Cek Estimasi Biaya</button>
          {{-- <a href="{{ url('jadwal_lab/'.$lab_data->lab_id) }}" target="_blank">
            <button type="button" class="btn btn-default btn-flat"><i class="ri-calendar-schedule-line" style="margin-right: 5px;"></i>Cek Jadwal</button>
          </a> --}}
          <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-send-plane-fill" style="margin-right: 5px;"></i>Kirim</button>
          <button type="reset" class="btn btn-default btn-flat pull-right" style="margin-right: 5px;"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Bersih</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
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
  .divider {
    font-size: 14px;
    display: flex;
    align-items: center;
    font-style:italic;
    padding:  5px 0px 10px 0px;
  }
  .divider::before, .divider::after {
    flex: 1;
    content: '';
    padding: 0.3px;
    background-color: #ccc;
    margin: 5px;
  }
  .img-loading{
    width: 30px;
  }
  .spinner {
    position: fixed;
    top: 50%;
    left: 50%;
    width: 50px;
    height: 50px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    z-index: 9999;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  var select_act = new TomSelect("#inp-kegiatan",{
    create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-kegitan">'+escape(data.title)+'</div>';
			}
		}
  });
  /*
  var select_time = new TomSelect(".inp-time-cls",{
    create: false,
    maxItem: 20,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-time">'+escape(data.title)+'</div>';
			}
		}
  });
  var select_tool = new TomSelect("#inp-fasilitas",{
    create: false,
    maxItem: 20,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-time">'+escape(data.title)+'</div>';
			}
		}
  });
  */
</script>
{{-- function --}}
<script>
  function callDataStudent() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source_check_skripsi') }}",
      data: {
        "nim":"{{ $user_data->no_id }}",
      },
      async: false,
      success: function(result) {
        $('#data-simontasi').html(result);
      },
      complete: function() {
        $('#data-loading').hide();
      },
    });
  };
  function actActivitySubs() {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    // alert(val_activity);
    if (val_activity == 'tp_penelitian_skripsi') {
      $('#fm-judul').hide();
      $('#fm-opsi').hide();
      $("#fm-judul").hide();
      // $("#inp-judul-ii").prop('disabled', true);
      $('#data-loading').show();
      setTimeout(function() {
        callDataStudent();
      }, 2000);
    }else if(val_activity == 'tp_lain_lain'){
      $('#fm-judul').fadeIn();
      $('#fm-opsi').fadeIn();
    }
  };
  function actViewLabCost(id) {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    if (val_activity == "") {
      alert('harap inputkan activity terlebih dahulu.');
      location.reload();
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-cost-lab-tables') }}",
      data: {
        "lab_id":id,
        "activity": val_activity,
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actViewFacilityCost(idf) {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    if (val_activity == null) {
      alert('harap inputkan activity terlebih dahulu.');
    }
    var lab_selected = select_lab.getValue();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-cost-facility-tables') }}",
      data: {
        "lab_id":lab_selected,
        "lab_facility":idf
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actViewCheckSch(par_a, par_b) {
    var lab_indent = select_lab.getValue();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-check-sch') }}",
      data: {
        "lab_id":lab_indent,
        "par_a":par_a,
        "par_b":par_b
      },
      async: false,
      success: function(result) {
        $('#check-sch').html(result);
      },
    });
  };
  function actPrePayment() {
    var lab_id = "{{ $lab_test_data->lab_id }}";
    var count_sample = $('#inp-sample').val();
    var activity = $('#inp-kegiatan').find(":selected").val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-cost-lab-tables') }}",
      data: {
        "lab_id":lab_id,
        "activity": activity,
        "count":count_sample,
      },
      async: false,
      success: function(result) {
        $('#test-id').html(result);
      },
    });
  };
</script>
{{-- ready function --}}
<script>
</script>
{{-- call by id or class --}}
<script>
  $('.inp-date-s').datepicker({
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
  $('#time-pick-start').timepicker({
    showInputs: false,
    defaultTime:false,
    showMeridian: false,
    format: 'HH:mm',
  });
  $('#time-pick-end').timepicker({
    showInputs: false,
    defaultTime:false,
    showMeridian: false,
    format: 'HH:mm',
  });
</script>
@endpush