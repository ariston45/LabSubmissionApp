
@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
  <li class=""><a href="#">Jadwal Laboratorium</a></li>
  <li class="active"><a href="#">Form Jadwal Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Input Jadwal Laboratorium</h3>
      <div class="pull-right">
        <a href="{{ url('jadwal_lab/'.$lab_id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('input_exclude_sch') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <input type="hidden" name="lab_id" value="{{ $lab_id }}">
        <div class="form-group has-feedback {{ $errors->has('inp_day') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Pilih tanggal
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="date-pick-start" name="date_exclude" onchange="actionGetTime()"  value="{{ old('date_start') }}" class="form-control pull-right" placeholder="yyyy-mm-dd" readonly>
            @if ($errors->has('inp_day'))
						<span style="color: red;"><i>{{ $errors->first('inp_day') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_time_start') ? ' has-error' : '' }} {{ $errors->has('inp_time_end') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Pilih Jam
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-times" class="form-control" name="inp_times" placeholder="Input jam..">
              <option value="{{ null }}"></option>
            </select>
            @if ($errors->has('inp_res_person'))
						<span style="color: red;"><i>{{ $errors->first('inp_res_person') }}</i></span>
						@endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Simpan</button>
        <button type="reset" class="btn btn-default btn-flat pull-right" style="margin-right: 5px;"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Bersih</button>
      </div>
    </form>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  /* .ts-wrapper.multi .ts-control>div{

  } */
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
  @media only screen and (max-width: 767px) {
    .cst-mb-input-a {
      margin-bottom: 5px;
    }
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  var dataOption_times = [];
  var select_time = new TomSelect("#inp-times",{
    create: false,
    maxItems: 1,
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
{{-- function --}}
<script>
  function actGetUser() {
		var par_a = null;
		var data_a = [];
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: "{{ route('source-data-users') }}",
			data: {
				"level":par_a
			},
			async: false,
			success: function(result) {
				data_a = result;
			},
		});
		return data_a;
	};
  function actionGetTime() {
    var get_date =  $('#date-pick-start').val();
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: "{{ route('data-times-sch') }}",
			data: {
        "date_sch":get_date,
				"lab_id": "{{ $lab_id }}",
			},
			async: false,
			success: function(result) {
        var dataOpt_users = JSON.parse(result);
				for (let index = 0; index < dataOpt_users.length; index++) {
          dataOption_times.push({
            id:dataOpt_users[index].id,
            title:dataOpt_users[index].title,
          });
        }
			},
		});
    select_time.addOptions(dataOption_times);
  };
</script>
{{-- call by id or class --}}
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
  $('#time-pick-start').timepicker({
    showInputs: false,
    defaultTime:false,
    showMeridian: false,
    format: 'HH:mm',
  });
  $('#time-pick-end').timepicker({
    showInputs: false,
    showMeridian: false,
    defaultTime:false,
    format: 'HH:mm',
  });
</script>
@endpush