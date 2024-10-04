
@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Pengaturan</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Pengaturan</a></li>
  <li class=""><a href="#">Profil</a></li>
  <li class="active"><a href="#">Form Update Profil</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Update User</h3>
      <div class="pull-right">
        <a href="{{ url('pengaturan/user-detail/'.$data_user->id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('update_data_profile') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        {{-- <input type="hidden" name="lab_id" value="{{ $lab_id }}"> --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama <span style="color:red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="hidden" id="inp-id" class="form-control" name="id" value="{{ $data_user->id }}" placeholder="Input nama.." autocomplete="new-password" required>
            <input type="hidden" id="inp-id" class="form-control" name="usd_id" value="{{ $data_user->usd_id }}" placeholder="Input nama.." autocomplete="new-password">
            <input type="text" id="inp-name" class="form-control" name="inp_name" value="{{ $data_user->name }}" placeholder="Input nama.." autocomplete="new-password">
            @if ($errors->has('inp_name'))
						<span style="color: red;"><i>{{ $errors->first('inp_name') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_no_id') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nomor ID <span style="color:red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if (authUser()->level == "LAB_HEAD")
            <input type="text" id="inp-no-id" class="form-control" name="inp_no_id" value="{{ $data_user->no_id }}" placeholder="Input nomor id.." autocomplete="new-password" required readonly>  
            @else
            <input type="text" id="inp-no-id" class="form-control" name="inp_no_id" value="{{ $data_user->no_id }}" placeholder="Input nomor id.." autocomplete="new-password" required>
            @endif
            @if ($errors->has('inp_no_id'))
						<span style="color: red;"><i>{{ $errors->first('inp_no_id') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_nip') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              NIP
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="number" id="inp-no-id" class="form-control" name="inp_nip" value="{{ $data_user->nip }}" placeholder="Input nip .." autocomplete="new-password" >
            @if ($errors->has('inp_nip'))
						<span style="color: red;"><i>{{ $errors->first('inp_nip') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_email') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Email <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="email" id="inp-email" class="form-control" name="inp_email" value="{{ $data_user->email }}" placeholder="Input email.." autocomplete="new-password" required>
            @if ($errors->has('inp_email'))
						<span style="color: red;"><i>{{ $errors->first('inp_email') }}</i></span>
						@endif
            @if ($errors->has('check_email'))
						<span style="color: red;"><i>{{ $errors->first('check_email') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_no_contact') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              No Kontak (HP)
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-no-contact" class="form-control" name="inp_no_contact" value="{{ $data_user->usd_phone }}" placeholder="Input no kontak/HP.." autocomplete="new-password">
            @if ($errors->has('inp_no_contact'))
						<span style="color: red;"><i>{{ $errors->first('inp_no_contact') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        {{-- <div class="form-group has-feedback {{ $errors->has('inp_rumpun') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Pilih Rumpun
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_rumpun" id="inp-rumpun" value="" placeholder="Pilih rumpun.." autocomplete="new-password">
              <option value="{{ null }}">Pilih rumpun</option>
              @foreach ($data_rumpun as $list)
                <option value="{{ $list->lag_id }}" @if ($list->lag_id == $data_user->rumpun_id) selected @endif>{{ $list->lag_name }}</option>                    
              @endforeach
            </select>
            @if ($errors->has('inp_rumpun'))
						<span style="color: red;"><i>{{ $errors->first('inp_rumpun') }}</i></span>
						@endif
          </div>
        </div> --}}
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_institusi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Universitas/Institusi <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ $data_user->usd_universitas }}" placeholder="Input Universitas / Institusi.." autocomplete="new-password" required>
            @if ($errors->has('inp_institusi'))
            <span style="color: red;"><i>{{ $errors->first('inp_institusi') }}</i></span>
            @endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_fakultas') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Fakultas 
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-fakultas" class="form-control" name="inp_fakultas" value="{{ $data_user->usd_fakultas }}" placeholder="Input fakultas.." autocomplete="new-password">
            @if ($errors->has('inp_fakultas'))
            <span style="color: red;"><i>{{ $errors->first('inp_fakultas') }}</i></span>
            @endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_prodi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Program Studi
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-prodi" class="form-control" name="inp_prodi" value="{{ $data_user->usd_prodi }}" placeholder="Input prodi.." autocomplete="new-password">
            @if ($errors->has('inp_prodi'))
						<span style="color: red;"><i>{{ $errors->first('inp_prodi') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_address') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Alamat
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-address" class="form-control" name="inp_address" value="{{ $data_user->usd_address }}" placeholder="Input alamat .. " autocomplete="new-password">
            @if ($errors->has('inp_address'))
						<span style="color: red;"><i>{{ $errors->first('inp_address') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        @if ( rulesUser(['ADMIN_SYSTEM','ADMIN_MASTER','LAB_HEAD']))
        <div class="form-group has-feedback {{ $errors->has('inp_level') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Level Akses <span style="color: red">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_level" id="inp-level" value="" placeholder="Pilih level.." autocomplete="new-password" required>
              <option value=""></option>
              <option value="LECTURE" @if ($data_user->level == 'LECTURE') selected @endif >LECTURE</option>
              <option value="STUDENT" @if ($data_user->level == 'STUDENT') selected @endif >STUDENT</option>
              <option value="PUBLIC_MEMBER" @if ($data_user->level == 'PUBLIC_MEMBER') selected @endif >PUBLIC_MEMBER</option>
              <option value="PUBLIC_NON_MEMBER" @if ($data_user->level == 'PUBLIC_NON_MEMBER') selected @endif >PUBLIC_NON_MEMBER</option>
              <option value="LAB_HEAD" @if ($data_user->level == 'LAB_HEAD') selected @endif >LAB_HEAD</option>
              <option value="LAB_SUBHEAD" @if ($data_user->level == 'LAB_SUBHEAD') selected @endif >LAB_SUBHEAD</option>
              <option value="LAB_TECHNICIAN" @if ($data_user->level == 'LAB_TECHNICIAN') selected @endif >LAB_TECHNICIAN</option>
              <option value="ADMIN_PRODI" @if ($data_user->level == 'ADMIN_PRODI') selected @endif >ADMIN_PRODI</option>
              <option value="ADMIN_MASTER" @if ($data_user->level == 'ADMIN_MASTER') selected @endif >ADMIN_MASTER</option>
            </select>
            {{-- <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ old('inp_institusi') }}" placeholder="Input Universitas / Institusi.."> --}}
            @if ($errors->has('inp_level'))
						<span style="color: red;"><i>{{ $errors->first('inp_level') }}</i></span>
						@endif
          </div>
        </div>
        @else
          <input type="hidden" name="inp_level" value="{{ $data_user->level }}">
        @endif
        {{--  --}}
        {{-- <div class="form-group has-feedback {{ $errors->has('inp_status') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Update Status <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_status" id="inp-level" value="" placeholder="Pilih level.." autocomplete="new-password" required>
              <option value=""></option>
              <option value="active" @if ($data_user->status == 'active') selected @endif >Active</option>
              <option value="block" @if ($data_user->status == 'block') selected @endif >Nonactive</option>
            </select>
            @if ($errors->has('inp_fakultas'))
            <span style="color: red;"><i>{{ $errors->first('inp_status') }}</i></span>
            @endif
          </div>
        </div> --}}
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_password') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Password <span style="color: red">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="password" id="inp-password" class="form-control" name="inp_password" value="" placeholder="****" autocomplete="new-password">
            @if ($errors->has('inp_password'))
						<span style="color: red;"><i>{{ $errors->first('inp_password') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_password_confirm') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Konfirmasi Password <span style="color: red">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="password" id="inp-password-confirm" class="form-control" name="inp_password_confirm" value="" placeholder="****" autocomplete="new-password">
            @if ($errors->has('inp_password_confirm'))
						<span style="color: red;"><i>{{ $errors->first('inp_password_confirm') }}</i></span>
						@endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <i>Tanda ( <span style="color: red;">*</span> ) wajib diisi.</i>
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