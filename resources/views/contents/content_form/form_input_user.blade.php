
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
        <a href="{{ url('pengaturan/user') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('input-data-user') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        {{-- <input type="hidden" name="lab_id" value="{{ $lab_id }}"> --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-name" class="form-control" name="inp_name" value="{{ old('inp_name') }}" placeholder="Input nama.." autocomplete="new-password">
            @if ($errors->has('inp_name'))
						<span style="color: red;"><i>{{ $errors->first('inp_name') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_no_id') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nomor ID
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-no-id" class="form-control" name="inp_no_id" value="{{ old('inp_no_id') }}" placeholder="Input nomor id.." autocomplete="new-password">
            @if ($errors->has('inp_no_id'))
						<span style="color: red;"><i>{{ $errors->first('inp_no_id') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_email') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Email
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-email" class="form-control" name="inp_email" value="{{ old('inp_email') }}" placeholder="Input email.." autocomplete="new-password">
            @if ($errors->has('inp_email'))
						<span style="color: red;"><i>{{ $errors->first('inp_email') }}</i></span>
						@endif
            @if ($errors->has('check_email'))
						<span style="color: red;"><i>{{ $errors->first('check_email') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_no_contact') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              No Kontak (HP)
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-no-contact" class="form-control" name="inp_no_contact" value="{{ old('inp_no_contact') }}" placeholder="Input email.." autocomplete="new-password">
            @if ($errors->has('inp_no_contact'))
						<span style="color: red;"><i>{{ $errors->first('inp_no_contact') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_prodi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Program Studi
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-prodi" class="form-control" name="inp_prodi" value="{{ old('inp_prodi') }}" placeholder="Input prodi.." autocomplete="new-password">
            @if ($errors->has('inp_prodi'))
						<span style="color: red;"><i>{{ $errors->first('inp_prodi') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_fakultas') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Fakultas
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-fakultas" class="form-control" name="inp_fakultas" value="{{ old('inp_fakultas') }}" placeholder="Input fakultas.." autocomplete="new-password">
            @if ($errors->has('inp_fakultas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fakultas') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_institusi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Universitas/Institusi
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ old('inp_institusi') }}" placeholder="Input Universitas / Institusi.." autocomplete="new-password">
            @if ($errors->has('inp_institusi'))
						<span style="color: red;"><i>{{ $errors->first('inp_institusi') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_address') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Alamat
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-address" class="form-control" name="inp_address" value="{{ old('inp_address') }}" placeholder="Input alamat .. " autocomplete="new-password">
            @if ($errors->has('inp_address'))
						<span style="color: red;"><i>{{ $errors->first('inp_address') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_level') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Level Akses
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_level" id="inp-level" value="" placeholder="Pilih level.." autocomplete="new-password">
              <option value=""></option>
              <option value="LECTURE" @if (old('inp_level') == 'LECTURE') selected @endif >LECTURE</option>
              <option value="STUDENT" @if (old('inp_level') == 'STUDENT') selected @endif >STUDENT</option>
              <option value="PUBLIC_MEMBER" @if (old('inp_level') == 'PUBLIC_MEMBER') selected @endif >PUBLIC_MEMBER</option>
              <option value="PUBLIC_NON_MEMBER" @if (old('inp_level') == 'PUBLIC_NON_MEMBER') selected @endif >PUBLIC_NON_MEMBER</option>
              <option value="LAB_HEAD" @if (old('inp_level') == 'LAB_HEAD') selected @endif >LAB_HEAD</option>
              <option value="LAB_SUBHEAD" @if (old('inp_level') == 'LAB_SUBHEAD') selected @endif >LAB_SUBHEAD</option>
              <option value="LAB_TECHNICIAN" @if (old('inp_level') == 'LAB_TECHNICIAN') selected @endif >LAB_TECHNICIAN</option>
              <option value="ADMIN_PRODI" @if (old('inp_level') == 'ADMIN_PRODI') selected @endif >ADMIN_PRODI</option>
              <option value="ADMIN_MASTER" @if (old('inp_level') == 'ADMIN_MASTER') selected @endif >ADMIN_PRODI</option>
            </select>
            {{-- <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ old('inp_institusi') }}" placeholder="Input Universitas / Institusi.."> --}}
            @if ($errors->has('inp_level'))
						<span style="color: red;"><i>{{ $errors->first('inp_level') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_password') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Password
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="password" id="inp-password" class="form-control" name="inp_password" value="{{ old('inp_password') }}" placeholder="Input Universitas / Institusi.." autocomplete="new-password">
            @if ($errors->has('inp_password'))
						<span style="color: red;"><i>{{ $errors->first('inp_password') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_password_confirm') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Konfirmasi Password
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="password" id="inp-password-confirm" class="form-control" name="inp_password_confirm" value="{{ old('inp_password_confirm') }}" placeholder="Input Universitas / Institusi.." autocomplete="new-password">
            @if ($errors->has('inp_password_confirm'))
						<span style="color: red;"><i>{{ $errors->first('inp_password_confirm') }}</i></span>
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
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
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
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
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
  var select_akses = new TomSelect("#inp-level",{
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
  });
  $('#time-pick-end').timepicker({
    showInputs: false,
    showMeridian: false,
    defaultTime:false,
    format: 'HH:mm',
  });
</script>
@endpush