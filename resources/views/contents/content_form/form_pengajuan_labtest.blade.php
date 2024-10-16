
@extends('layout.app')
@section('title')
SIPLAB | Dashboard
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
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Pengajuan</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('kirim_pengajuan') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <input type="hidden" name="app_level" value="{{ $user_data->level }}">
        <input type="hidden" name="inp_nama" value="{{ $user_data->name }}" >
        <input type="hidden" name="inp_id" value="{{ $user_data->no_id }}" >
        <input type="hidden" name="inp_program_studi" value="{{ $user_data->usd_prodi }}">
        <input type="hidden" name="inp_fakultas" value="{{ $user_data->usd_fakultas }}">
        <input type="hidden" name="inp_institusi" value="{{ $user_data->usd_universitas }}">
        <input type="hidden" name="inp_nomor_kontak" value="{{ $user_data->usd_phone }}">
        <input type="hidden" name="inp_address" value="{{ $user_data->usd_address }}">
        <input type="hidden" name="inp_type_sub" value="uji_lab">
        {{-- !! --}}
        <div class="col-sm-offset-3 col-sm-9">
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
              <option value="tp_penelitian" @if (old('inp_kegiatan') == 'tp_penelitian') selected @endif >Penelitian</option>
              <option value="tp_pelatihan" @if (old('inp_kegiatan') == 'tp_pelatihan') selected @endif >Pelatihan</option>
              <option value="tp_pengabdian_masyarakat" @if (old('inp_kegiatan') == 'tp_pengabdian_masyarakat') selected @endif >Pengabdian Masyarakat</option>
              <option value="tp_magang" @if (old('inp_kegiatan') == 'tp_magang') selected @endif >Magang</option>
              <option value="tp_lain_lain" @if (old('inp_kegiatan') == 'tp_lain_lain') selected @endif >Lain-lain*</option>
            </select>
            <div id="data-loading" style="display: none;">
              <img src="{{ url('assets/img/loading.gif') }}" class="img-loading" alt="">
            </div>
            @if ($errors->has('inp_kegiatan'))
						<span style="color: red;"><i>{{ $errors->first('inp_kegiatan') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_judul') ? ' has-error' : '' }}" id="fm-judul">
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
        {{--  --}}
        @if (rulesUser(['STUDENT']))
        <div id="data-simontasi"></div>
        @endif
        {{--  --}}
        <div class="col-sm-offset-3 col-sm-9">
          <div class="divider">Fasilitas Dan Alat</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_lab') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-lab" class="form-control" name="inp_lab" >
              <option value="{{ null }}">Pilih laboratorium..</option>
              @foreach ($lab_data as $list)
              <option value="{{ $list->lab_id }}">{{ $list->lab_name }}</option>
              @endforeach
            </select>
            @if ($errors->has('inp_lab'))
						<span style="color: red;"><i>{{ $errors->first('inp_lab') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group {{ $errors->has('inp_testlab') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Uji Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-testlab" class="form-control" name="inp_testlab[]">
              <option value="{{ null }}">Pilih uji laboratorium .. </option>
            </select>
            @if ($errors->has('inp_fasilitas'))
						<span style="color: red;"><i>{{ $errors->first('inp_testlab') }}</i></span>
						@endif
          </div>
        </div>
        <div id="cost-tables" class="col-sm-offset-3 col-sm-9">
        </div>
        {{--  --}}
        @php
          $idx_time = 0;
        @endphp
        <div class="col-sm-offset-3 col-sm-9">
          <div class="divider">Jadwal Kegiatan</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('date_start') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Mulai
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-sm-11">
                <div class="input-group inp-split-cst date" style="margin-bottom: 6px;">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="inp_date[{{ $idx_time }}]"  value="{{ old('inp_date') }}" class="form-control inp-date-s pull-right" placeholder="yyyy-mm-dd" readonly>
								</div>
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
            </div>
            <div id="input-dt-container">
            </div>
          </div>
        </div>
        {{-- <div class="col-sm-offset-3 col-sm-9">
          <div class="divider">Jadwal Kegiatan</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('date_start') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Mulai
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-6 col-md-7">
                <div class="input-group inp-split-cst date " id="date-pick-start">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-start" name="date_start"  value="{{ old('date_start') }}" class="form-control pull-right" placeholder="yyyy-mm-dd" readonly>
								</div>
              </div>
              <div class="col-sm-6 col-md-5">
                <div class="input-group has-feedback {{ $errors->has('time_start') ? ' has-error' : '' }}">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control" id="time-pick-start" name="time_start" value="0:00" placeholder="hh:ii" readonly>
                </div>
              </div>
            </div>
            @if ($errors->has('date_start'))
						<span style="color: red;"><i>{{ $errors->first('date_start') }}</i></span>
						@endif
            @if ($errors->has('time_start'))
						<span style="color: red;"><i>{{ $errors->first('time_start') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }} {{ $errors->has('check_time') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Selesai
            </span>
          </label>
          <div class="divcol-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-6 col-md-7">
                <div class="input-group inp-split-cst date has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }}" id="date-pick-end">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-end" class="form-control pull-right" name="date_end" value="{{ old('date_end') }}" placeholder="yyyy-mm-dd" readonly>
								</div>
              </div>
              <div class="col-sm-6 col-md-5">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" id="time-pick-end" class="form-control has-feedback {{ $errors->has('time_end') ? ' has-error' : '' }}" name="time_end"  value="00:00" readonly>
                </div>
              </div>
            </div>
            @if ($errors->has('date_end'))
						<span style="color: red;"><i>{{ $errors->first('date_end') }}</i></span>
						@endif
            @if ($errors->has('time_end'))
						<span style="color: red;"><i>{{ $errors->first('time_end') }}</i></span>
						@endif
          </div>
        </div>
        @if ($errors->has('check_time'))
        <div class="form-group has-feedback">
          <label class="col-sm-12 col-md-3 control-label"></label>
          <div class="divcol-sm-12 col-md-9">
            <span style="color: red;"><i>{!! $errors->first('check_time') !!}</i></span>
          </div>
        </div>
        @endif
        <div id="check-sch" class="col-sm-offset-3 col-sm-9">
        </div> --}}
        {{--  --}}
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-send-plane-fill" style="margin-right: 5px;"></i>Kirim</button>
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
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
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
  var select_testlab = new TomSelect("#inp-testlab",{
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
				return '<div id="select-signed-user">'+escape(data.title)+'</div>';
			}
		}
  });
</script>
@if (rulesUser(['STUDENT']))
<script>
</script>
@endif
{{-- function --}}
<script>
  
  function actViewLabCost(id) {
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
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actViewLabTestCost(idt) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source_data_cost_labtest_tables') }}",
      data: {
        "lab_labtest":idt
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actViewCheckSch(par_a, par_b) {
    console.log(par_a);
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
</script>
{{-- ready function --}}
<script>
  $(document).ready(function(){
    var Idx_number = {{ $idx_time }};
    $('#btn-add-input-datetime').click(function(){
      Idx_number++;
      $('#input-dt-container').append(
        '<div class="row inp-dt-group" style="margin-bottom: 10px;"><div class="col-sm-11">'
        +'<div class="input-group inp-split-cst date" style="margin-bottom: 6px;">'
        +'<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'
        +'<input type="text" name="inp_date['+Idx_number+']"  value="{{ old('date_start') }}" class="form-control inp-date-s-'+Idx_number+' pull-right" placeholder="yyyy-mm-dd" readonly>'
        +'</div>'
        +'<select name="inp_time['+Idx_number+'][]" id="inp-time-idx-'+Idx_number+'" class="form-control inp-time-cls" multiple>'
        +'@foreach ($times as $item)<option value="{{ $item->lti_id }}">{{ setTime($item->lti_start) }} - {{ setTime($item->lti_end) }}</option> @endforeach'
        +'</select>'
        +'</div>'
        +'<div class="col-sm-1">'
        +'<button type="button" id="btn-add-input-datetime" class="btn btn-flat btn-default rm-inp-dt"><i class="fa fa-times" aria-hidden="true"></i></button>'
        +'</div></div>'
      );
      /**/
      var dateScriptContent = '$(".inp-date-s-'+Idx_number+'").datepicker({autoclose: true,format: "yyyy-mm-dd",todayHighlight: true, orientation:"bottom"});';
      var newDateScript = document.createElement('script');
      newDateScript.textContent = dateScriptContent;
      document.body.appendChild(newDateScript);
      /**/
      var newScriptContent = 'new TomSelect("#inp-time-idx-'+Idx_number+'",{create: false,maxItem: 20,valueField: "id",labelField: "title",searchField: "title"});';
      var newScript = document.createElement('script');
      newScript.textContent = newScriptContent;
      document.body.appendChild(newScript);
    });
    $('#input-dt-container').on('click', '.rm-inp-dt', function(){
      $(this).closest('.inp-dt-group').remove();
    });
  });
  /**/
  $(document).ready( function() {
    $('#date-pick-start').on('change',function () {
      var par_a = $('input[name=date_start]').val();
      var par_b = $('input[name=date_end]').val();
      actViewCheckSch(par_a,par_b);
    });
    $('#date-pick-end').on('change',function () {
      var par_a = $('input[name=date_start]').val();
      var par_b = $('input[name=date_end]').val();
      actViewCheckSch(par_a,par_b);
    });
    $('#inp-lab').on('change',function () {
      var par_a = $('input[name=date_start]').val();
      var par_b = $('input[name=date_end]').val();
      if (par_a == "" && par_b == "") {
        $('#check-sch').html("");
      } else {
        actViewCheckSch(par_a,par_b);
      }
    });
    

  });
  /**/
  $(document).ready( function() {
    /**/
    select_lab.on('change', function () {  
      var data_labtest = [];
      var item_lab = select_lab.getValue();
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'POST',
        url: "{{ route('source_data_testlab') }}",
        data: {
          "lab_id":item_lab,
        },
        async: false,
        success: function(result) {
          select_testlab.clear();
          select_testlab.clearOptions();
          var dataLabOption = JSON.parse(result);
          for (let index = 0; index < dataLabOption.length; index++) {
            data_labtest.push({
              id:dataLabOption[index].id,
              title:dataLabOption[index].title,
            });
          }
          select_testlab.addOptions(data_labtest);
        },
      });
      $('#cost-tables').html('');
    });
    /**/
    select_testlab.on('change',function () {
      var id_test = select_testlab.getValue();
      actViewLabTestCost(id_test)
    });
  });
  /**/
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto :file', function() {
      var input = $(this),
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),
      log = label;
      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }
    });
  });
</script>
{{-- call by id or class --}}
<script>
  $('#date-pick-start').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
  $('.inp-date-s').datepicker({
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