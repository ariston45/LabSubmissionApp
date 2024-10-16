
@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="ri-calendar-schedule-fill"></i> Jadwal Lab</a></li>
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
        <a href="{{ url('laboratorium/'.$lab_id.'/jadwal') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('input_sch_laboratorium') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <input type="hidden" name="lab_id" value="{{ $lab_id }}">
        <div class="form-group has-feedback {{ $errors->has('inp_day') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Hari
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_day" id="inp-day" value="" placeholder="Pilih hari..">
              <option value=""></option>
              <option value="sunday" @if (old('inp_day') == 'sunday') selected @endif >Minggu</option>
              <option value="monday" @if (old('inp_day') == 'monday') selected @endif >Senin</option>
              <option value="tuesday" @if (old('inp_day') == 'tuesday') selected @endif >Selasa</option>
              <option value="wednesday" @if (old('inp_day') == 'wednesday') selected @endif >Rabu</option>
              <option value="thursday" @if (old('inp_day') == 'thursday') selected @endif >Kamis</option>
              <option value="friday" @if (old('inp_day') == 'friday') selected @endif >Jumat</option>
              <option value="saturday" @if (old('inp_day') == 'saturday') selected @endif >Sabtu</option>
            </select>
            @if ($errors->has('inp_day'))
						<span style="color: red;"><i>{{ $errors->first('inp_day') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_time_start') ? ' has-error' : '' }} {{ $errors->has('inp_time_end') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Waktu
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_time[]" id="inp-time" multiple placeholder="Pilih jam..">
              <option value=""></option>
              @foreach ($times as $list)
              <option value="{{ $list->lti_id }}">{{ setTime($list->lti_start) }} - {{ setTime($list->lti_end) }}</option>  
              @endforeach
            </select>
            @if ($errors->has('inp_time'))
						<span style="color: red;"><i>{{ $errors->first('inp_time') }}</i></span>
						@endif
          </div>
          {{-- <div class="col-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-6">
                <input type="text" id="time-pick-start" class="form-control cst-mb-input-a" name="inp_time_start" value="{{ old('inp_time_start') }}" placeholder="Input waktu mulai..">
              </div>
              <div class="col-sm-6">
                <input type="text" id="time-pick-end" class="form-control" name="inp_time_end" value="{{ old('inp_time_end') }}" placeholder="Input waktu selesai..">
              </div>
              <div class="col-lg-12">
                @if ($errors->has('inp_time_start'))
                <span style="color: red;"><i>{{ $errors->first('inp_time_start') }}</i></span>
                @endif
                @if ($errors->has('inp_time_end'))
                <span style="color: red;"><i>{{ $errors->first('inp_time_end') }}</i></span>
                @endif
                @if ($errors->has('check_time'))
                <span style="color: red;"><i>{{ $errors->first('check_time') }}</i></span>
                @endif
              </div>
            </div>
          </div> --}}
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_subject') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Mata Kuliah
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-subject" class="form-control" name="inp_subject" value="{{ old('inp_subject') }}" placeholder="Input mata kuliah..">
            {{-- <select type="text" class="form-control" name="inp_teknisi[]" id="inp-teknisi" value="" placeholder="Pilih user..">
              <option value=""></option>
            </select> --}}
            @if ($errors->has('inp_subject'))
						<span style="color: red;"><i>{{ $errors->first('inp_subject') }}</i></span>
						@endif
          </div>
        </div>

        <div class="form-group has-feedback {{ $errors->has('inp_group') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Kelas/Grup Belajar
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-group" class="form-control" name="inp_group" value="{{ old('inp_group') }}" placeholder="Input lokasi lab..">
            @if ($errors->has('inp_group'))
						<span style="color: red;"><i>{{ $errors->first('inp_group') }}</i></span>
						@endif
          </div>
        </div>

        <div class="form-group {{ $errors->has('inp_res_person') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Dosen / Penanggung Jawab
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-res-person" class="form-control" name="inp_res_person[]" placeholder="Input dosen atau penanggung jawab..">>
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
  var dataOption_users = [];
  new function () {  
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: "{{ route('source-data-users') }}",
			data: {
				"level": null,
			},
			async: false,
			success: function(result) {
        var dataOpt_users = JSON.parse(result);
				for (let index = 0; index < dataOpt_users.length; index++) {
          dataOption_users.push({
            id:dataOpt_users[index].id,
            title:dataOpt_users[index].title,
          });
        }
			},
		});
  };
  var select_hari = new TomSelect("#inp-day",{
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
  var select_jam = new TomSelect("#inp-time",{
    create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="inp-time">'+escape(data.title)+'</div>';
			}
		}
  });
  var select_user = new TomSelect("#inp-res-person",{
    create: false,
    maxItems: 1,
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
    options: dataOption_users,
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
    orientation:'bottom',
  });
  $('#time-pick-end').timepicker({
    showInputs: false,
    showMeridian: false,
    defaultTime:false,
    format: 'HH:mm',
  });
</script>
@endpush