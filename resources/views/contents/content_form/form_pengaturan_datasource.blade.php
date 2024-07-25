
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
        <a href="{{ url('pengaturan/profil') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('update_datasource') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
      @csrf
      <div class="box-body">
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool" >
          <div class="divider">Data Source Mahasiswa Skripsi</div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_a') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Data
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nama-data-a" class="form-control" name="nama_a" value="{{$dataset_skripsi->api_name}}" placeholder="Input nama.." autocomplete="new-password">
            <input type="hidden" id="inp-code-nama-a" class="form-control" name="code_a" value="data_source_skripsi" placeholder="Input nama.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_a') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-api-data-a" class="form-control" name="url_a" value="{{$dataset_skripsi->api_url}}" placeholder="Input url.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_a') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL Status
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="url-status" class="form-control" name="url_status_a" required>
              <option value="{{ null }}">Pilih status url</option>
              <option value="aktif" @if ($dataset_skripsi->api_url_status == 'aktif') selected @endif >Aktif</option>
              <option value="nonaktif" @if ($dataset_skripsi->api_url_status == 'nonaktif') selected @endif >Non Aktif</option>
            </select>
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_a') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              File Data Source
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-1" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload-i" name="file_data_a" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image1" value="{{$dataset_skripsi->api_file_data}}">
						</div>
          </div>
        </div>
        {{-- =========================================================================================================== --}}
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool" >
          <div class="divider">Data Source Mahasiswa FT</div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Data
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nama-data-a" class="form-control" name="nama_b" value="{{$dataset_mhs->api_name}}" placeholder="Input nama.." autocomplete="new-password">
            <input type="hidden" id="inp-code-nama-a" class="form-control" name="code_b" value="data_source_mhs_ft" placeholder="Input nama.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-api-data-a" class="form-control" name="url_b" value="{{$dataset_mhs->api_url}}" placeholder="Input url.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL Status
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="url-status" class="form-control" name="url_status_b" required>
              <option value="{{ null }}">Pilih status url</option>
              <option value="aktif" @if ($dataset_mhs->api_url_status == 'aktif') selected @endif >Aktif</option>
              <option value="nonaktif" @if ($dataset_mhs->api_url_status == 'nonaktif') selected @endif >Non Aktif</option>
            </select>
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              File Data Source
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-2" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload-ii" name="file_data_b" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2" value="{{$dataset_mhs->api_file_data}}">
						</div>
          </div>
        </div>
        {{-- =========================================================================================================== --}}
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool" >
          <div class="divider">Data Source Dosen FT</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_name_c') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Data
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nama-data-a" class="form-control" name="nama_c" value="{{$dataset_dosen->api_name}}" placeholder="Input nama.." autocomplete="new-password">
            <input type="hidden" id="inp-code-nama-a" class="form-control" name="code_c" value="data_source_dosen" placeholder="Input nama.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_c') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-api-data-a" class="form-control" name="url_c" value="{{$dataset_dosen->api_url}}" placeholder="Input url.." autocomplete="new-password">
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_c') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Api URL Status
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="url-status" class="form-control" name="url_status_c" required>
              <option value="{{ null }}">Pilih status url</option>
              <option value="aktif" @if ($dataset_dosen->api_url_status == 'aktif') selected @endif >Aktif</option>
              <option value="nonaktif" @if ($dataset_dosen->api_url_status == 'nonaktif') selected @endif >Non Aktif</option>
            </select>
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_name_a') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              File Data Source
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-3" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload-iii" name="file_data_c" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image3" value="{{$dataset_dosen->api_file_data}}">
						</div>
          </div>
        </div>
        {{-- =========================================================================================================== --}}
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
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto-1 :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto-1 :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),log = label;
      input.val(log);
    });
  });
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto-2 :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto-2 :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),log = label;
      input.val(log);
    });
  });
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto-3 :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto-3 :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),log = label;
      input.val(log);
    });
  });
</script>
@endpush