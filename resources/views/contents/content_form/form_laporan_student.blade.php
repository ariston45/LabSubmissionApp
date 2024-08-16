
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
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Pengajuan</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan/detail-pengajuan/'.$data_submission->lsb_id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('upload_laporan_student') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="{{ $data_submission->id }}" name="id_user" readonly>
      <input type="hidden" value="{{ $data_submission->no_id }}" name="no_id" readonly>
      <input type="hidden" value="{{ $data_submission->name }}" name="name" readonly>
      <input type="hidden" value="{{ $data_submission->lsb_id }}" name="lsb_id" readonly>
      <div class="box-body">
        <div class="form-group has-feedback">
          <div class="col-md-offset-3 col-sm-12 col-md-9">
            <label>Pedoman File Upload</label>
            <ol style="list-style-type:square;">
              <li>Upload hasil uji lab anda.</li>
              <li>Upload skripsi atau jurnal laporan, untuk skripsi pilih bab bagian hasil.</li>
              <li>Tipe file yang didukung hanya berformat (ekstensi) PDF.</li>
              <li>Ukuran file tidak boleh lebih dari 1024 bytes.</li>
            </ol>
          </div>
        </div>
        {{-- <div class="form-group has-feedback {{ $errors->has('dok_laporan') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Upload Laporan Hasil
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload" name="dok_laporan" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="name_dok_laporan">
						</div>
            @if ($errors->has('file_err'))
						<span style="color: red;"><i>{{ $errors->first('file_err_a') }}</i></span>
						@endif
            @if ($errors->has('file_err_filesize'))
						<span style="color: red;"><i>{{ $errors->first('file_err_filesize_a') }}</i></span>
						@endif
          </div>
        </div> --}}
        <div class="form-group has-feedback {{ $errors->has('dok_laporan_test_bending') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Upload Skripsi/Jurnal
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-1" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload-ii" name="dok_skripsi_jurnal" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="name_dok_skripsi_jurnal">
						</div>
            @if ($errors->has('file_err'))
						<span style="color: red;"><i>{{ $errors->first('file_err_b') }}</i></span>
						@endif
            @if ($errors->has('file_err_filesize'))
						<span style="color: red;"><i>{{ $errors->first('file_err_filesize_b') }}</i></span>
						@endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-send-plane-fill" style="margin-right: 5px;"></i>Unggah</button>
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
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
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
</script>
{{-- function --}}
<script>
</script>
{{-- ready function --}}
<script>
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),log = label;
      input.val(log);
    });
  });
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
    defaultTime:false,
    showMeridian: false,
    format: 'HH:mm',
  });
</script>
@endpush