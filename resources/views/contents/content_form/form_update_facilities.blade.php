
@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
  <li><a href="#">Fasilitas Laboratorium</a></li>
  <li class="active"><a href="#">Form Input Alat/Fasilitas Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i>Form Update Alat/Fasilitas Laboratorium</h3>
      <div class="pull-right">
        <a href="{{ url('laboratorium') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('update_fasilitas_laboratorium') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <div class="form-group">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-8 control-label" style="text-align: left;">
            <b>{{ $data_facility->lab_name }}</b>
            <input type="hidden" name="lab_id" value="{{ $data_facility->laf_laboratorium }}">
            <input type="hidden" name="laf_id" value="{{ $data_facility->laf_id }}">
            <input type="hidden" name="lcs_id" value="{{ $data_facility->lcs_id }}">
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_fasilitas') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Alat/Fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-fasilitas" class="form-control" name="inp_fasilitas" value="{{ $data_facility->laf_name }}" placeholder="Input nama alat/fasilitas..">
            @if ($errors->has('inp_fasilitas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fasilitas') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_utility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Kegunaan Alat/Fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-utility" class="form-control" name="inp_utility" value="{{ $data_facility->laf_utility }}" placeholder="Input kegunaan alat/fasilitas..">
            @if ($errors->has('inp_utility'))
						<span style="color: red;"><i>{{ $errors->first('inp_utility') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_brand') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Merk/Spesifikasi/Tipe
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-brand" class="form-control" name="inp_brand" value="{{ $data_facility->laf_brand }}" placeholder="Input merk/spesifikasi/tipe..">
            @if ($errors->has('inp_brand'))
						<span style="color: red;"><i>{{ $errors->first('inp_brand') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_facility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-facility" class="form-control" name="inp_cn_facility" value="{{ $data_facility->lcs_count }}" placeholder="Input jumlah alat/fasilitas..">
            @if ($errors->has('inp_cn_facility'))ld('i
						<span style="color: red;"><i>{{ $errors->first('inp_cn_facility') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_ready') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Tersedia
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-ready" class="form-control" name="inp_cn_ready" value="{{ $data_facility->lcs_ready }}" placeholder="Input jumlah alat/fasilitas yang tersedia untuk dipakai..">
            @if ($errors->has('inp_cn_ready'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_ready') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_used') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Dipakai/Dipinjam
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-used" class="form-control" name="inp_cn_used" value="{{ $data_facility->lcs_used }}" placeholder="Input jumlah alat/fasilitas yang dipakai atau dipinjam..">
            @if ($errors->has('inp_cn_used'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_used') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_good') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Kondisi Baik
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-used" class="form-control" name="inp_cn_good" value="{{ $data_facility->lcs_condition_good }}" placeholder="Input jumlah alat/fasilitas yang kondisi baik..">
            @if ($errors->has('inp_cn_good'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_good') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_poor') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Kondisi Kurang Baik
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-poor" class="form-control" name="inp_cn_poor" value="{{ $data_facility->lcs_condition_poor }}" placeholder="Input jumlah alat/fasilitas yang kondisi kurang baik..">
            @if ($errors->has('inp_cn_poor'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_poor') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cn_unwearable') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Rusak/Tidak Bisa Dipakai
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cn-unwearable" class="form-control" name="inp_cn_unwearable" value="{{ $data_facility->lcs_condition_unwearable }}" placeholder="Input jumlah alat/fasilitas yang kondisi rusak/tidak bisa dipakai..">
            @if ($errors->has('inp_cn_unwearable'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_unwearable') }}</i></span>
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
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  var select_kalab = new TomSelect("#inp-kalab",{
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
  var select_technician = new TomSelect("#inp-teknisi",{
    create: false,
    maxItems: 10,
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
  var select_status = new TomSelect("#inp-status",{
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
  $('#date-pick-end').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
  $('#time-pick-start').timepicker({
    showInputs: false,
    format: 'hh:mm',
    showMeridian: false,
  });
  $('#time-pick-end').timepicker({
    showInputs: false,
    format: 'hh:mm',
    showMeridian: false,
  });
</script>
@endpush