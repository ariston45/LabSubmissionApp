
@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
  <li><a href="{{ url('laboratorium') }}"><i class="fa fa-home"></i> Laboratorium</a></li>
  <li><a href="{{ url('laboratorium/'.$data_lab->lab_id.'/ujilab') }}">Uji Laboratorium</a></li>
  <li class="active"><a href="#">Form Update Uji Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i>Form Update Uji Laboratorium</h3>
      <div class="pull-right">
        <a href="{{ url('uji_laboratorium/detail-ujilab/'.$data_lab->lsv_id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('update_ujilab') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <div class="form-group">
          <div class="col-md-offset-4 col-md-8">
            @if ($data_lab->lsv_img == null)
            <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 30%"><br>
            <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
            <label for="upload_url_img">
              Tambah Foto
            </label>
            @else
            <img src="{{ url('storage/image_lab_test/'.$data_lab->lsv_img) }}" id="wrap-img" class="img img-thumbnail" style="width: 30%">
            <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img-new" class="img img-thumbnail" style="width: 30%;display: none;">
            <button type="button" id="btn-delete-picture" class="btn btn-sm btn-default" onclick="actRemoveImage()">
              <i class="ri-delete-bin-5-line"></i>
            </button>
            <br>
            <input type="hidden" id="param-upload-url-img" name="param_upload_url_img" />
            <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
            <label for="upload_url_img">
              Ganti Foto
            </label>
            @endif
            @if ($errors->has('upload_url_img'))
						<span style="color: red;"><i>{{ $errors->first('upload_url_img') }}</i></span>
						@endif
          </div>
        </div>
        {{-- !! --}}
        <div class="form-group">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-8 control-label" style="text-align: left;">
            <b>{{ $data_lab->lab_name }}</b>
            <input type="hidden" name="lab_id" value="{{ $data_lab->lab_id }}">
            <input type="hidden" name="lsv_id" value="{{ $data_lab->lsv_id }}">
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_name') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Uji laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-name" class="form-control" name="inp_name" value="{{ $data_lab->lsv_name }}" placeholder="Input nama uji laboratorium..">
            @if ($errors->has('inp_name'))
						<span style="color: red;"><i>{{ $errors->first('inp_name') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_description') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi Singkat Uji Lab.
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            {{-- <input type="text" id="inp-description" class="form-control" name="inp_description" value="{{ old('inp_description') }}" placeholder="Input kegunaan alat/fasilitas.."> --}}
            <textarea id="edt-notes-short" class="form-control" name="inp_notes_short" placeholder="Tuliskan diskripsi disini" >{{ $data_lab->lsv_notes_short }}</textarea>
            @if ($errors->has('inp_description'))
						<span style="color: red;"><i>{{ $errors->first('inp_description') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_notes') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi Uji Lab.
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <textarea id="edt-notes" class="form-control" name="inp_notes" placeholder="Tuliskan diskripsi disini" style="">{{ $data_lab->lsv_notes }}</textarea>
            @if ($errors->has('inp_notes'))
						<span style="color: red;"><i>{{ $errors->first('inp_notes') }}</i></span>
						@endif
          </div>
        </div>
        {{-- <div class="form-group has-feedback {{ $errors->has('inp_description') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-description" class="form-control" name="inp_description" value="{{ $data_lab->lsv_notes }}" placeholder="Input kegunaan alat/fasilitas..">
            @if ($errors->has('inp_description'))
						<span style="color: red;"><i>{{ $errors->first('inp_description') }}</i></span>
						@endif
          </div>
        </div> --}}
        <div class="form-group has-feedback {{ $errors->has('inp_utility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Alat/fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            {{-- <input type="text" id="inp-brand" class="form-control" name="inp_brand" value="{{ old('inp_utility') }}" placeholder="Input merk/spesifikasi/tipe.."> --}}
            <select class="form-control"  multiple="multiple" name="inp_utility[]" id="inp-utility">
              <option value="">Input alat/fasilitas</option>
              
              @foreach ($data_utility as $list)
                @if (in_array($list->laf_id, $tools))
                <option value="{{ $list->laf_id }}" selected>{{ $list->laf_name }}</option>
                @else
                <option value="{{ $list->laf_id }}">{{ $list->laf_name }}</option>
                @endif
              @endforeach
            </select>
            @if ($errors->has('inp_utility'))
						<span style="color: red;"><i>{{ $errors->first('inp_utility') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cost') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Biaya(value)
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cost" class="form-control" name="inp_cost" value="{{ funCurrencyRupiah($data_lab->lsv_price) }}" oninput="fcurrencyInput('inp-cost')" placeholder="Input jumlah alat/fasilitas..">
            @if ($errors->has('inp_cost'))
						<span style="color: red;"><i>{{ $errors->first('inp_cost') }}</i></span>
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
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
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
  .img-thumbnail{
    border-radius: 0px;
    border-color: #8a8a8a;
  }
  .upload_url_img, .upload_url_bg {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }

  .upload_url_img + label, .upload_url_bg + label {
    margin-top: 5px;
    font-size: 11pt;
    font-weight: 700;
    color: white;
    background-color: #333;
    display: inline-block;
    padding: 5px 10px;
    text-align: center;
    border-radius: 0px;
    cursor: pointer;
    width: 30%;
  }

  .upload_url_img:focus + label,
  .upload_url_img + label:hover,
  .upload_url_bg:focus + label,
  .upload_url_bg + label:hover {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 0px;
  }
  .notes-input{
    width: 100%; 
    height: 360px; 
    font-size: 14px;
    line-height: 14px;
    padding: 6px;
  }
  #btn-delete-picture{
    position: absolute;
    margin-left: 5px;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
<script src="{{ url('/public/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
{{-- varibles --}}
<script>
  var select_utility = new TomSelect("#inp-utility",{
    create: false,
    maxItems: 20,
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
  function actRemoveImage() {
    $('#param-upload-url-img').val('delete');
    $('#wrap-img').hide();
    $('#wrap-img-new').show();
    $('#btn-delete-picture').hide();
  };
  function actResetForm() {
    location.reload();
  };
  function fcurrencyInput(elem) {
    var inputElement = document.getElementById(elem);
    inputElement.value = formatRupiah(inputElement.value, 'Rp ');
  }
  function formatRupiah(number, prefix) {
    var number_string = number.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);  
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
  };
</script>
{{-- Ready function --}}
<script>
  $(document).ready(function (){
    $('#upload_url_img').change(function(){
      $('#wrap-img').show();
      $('#wrap-img-new').hide();
      var input = this;
      var url = $(this).val();
      console.log(url);
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#wrap-img').attr('src', e.target.result);
          // $('#wrap-img-new').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    });
  });
  $(document).ready(function (){
    $('#edt-notes-short').wysihtml5({
      toolbar: {
        "font-styles": true,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": false,
        "image": false,
        "color": false,  
        "blockquote": true,
        "useLineBreaks":true,
        "size": 'sm',
        "stylesheets": ["{{ url('/public/assets/plugins/bootstrap-wysihtml5/custom.css') }}"],
      }
    });
    $('#edt-notes').wysihtml5({
      toolbar: {
        "font-styles": true,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": false,
        "image": false,
        "color": false,  
        "blockquote": true,
        "size": 'sm', 
      }
    });
  });
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