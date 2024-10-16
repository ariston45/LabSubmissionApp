
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
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i>Form Input Alat/Fasilitas Laboratorium</h3>
      <div class="pull-right">
        <a href="{{ url('fasilitas_lab/'.$data_lab->lab_id) }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('input_fasilitas_laboratorium') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        {{-- nama laboratorium --}}
        <div class="form-group">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Laboratorium 
            </span>
          </label>
          <div class="col-sm-12 col-md-8 control-label" style="text-align: left;">
            <b>{{ $data_lab->lab_name }}</b>
            <input type="hidden" name="lab_id" value="{{ $data_lab->lab_id }}" required>
          </div>
        </div>
        {{-- upload gambar --}}
        <div class="form-group">
          <div class="col-md-offset-4 col-md-8">
            <img src="{{ url('assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 30%"><br>
            <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
            <label for="upload_url_img">
              <i class="fas fa-cloud-upload-alt"></i>
              Tambah Foto
            </label>
            @if ($errors->has('upload_url_img'))
						<span style="color: red;"><i>{{ $errors->first('upload_url_img') }}</i></span>
						@endif
          </div>
        </div>
        {{-- nama fasilitas --}}
        <div class="form-group has-feedback {{ $errors->has('inp_fasilitas') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Nama Alat/Fasilitas <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-fasilitas" class="form-control" name="inp_fasilitas" value="{{ old('inp_fasilitas') }}" placeholder="Input nama alat/fasilitas.." required>
            @if ($errors->has('inp_fasilitas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fasilitas') }}</i></span>
						@endif
          </div>
        </div>
        {{-- keguanaan alat --}}
        <div class="form-group has-feedback {{ $errors->has('inp_utility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Kegunaan Alat/Fasilitas <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-utility" class="form-control" name="inp_utility" value="{{ old('inp_utility') }}" placeholder="Input kegunaan alat/fasilitas.." required>
            @if ($errors->has('inp_utility'))
						<span style="color: red;"><i>{{ $errors->first('inp_utility') }}</i></span>
						@endif
          </div>
        </div>
        {{-- merek atau spesifikasi --}}
        <div class="form-group has-feedback {{ $errors->has('inp_brand') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Merk/Spesifikasi/Tipe <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-brand" class="form-control" name="inp_brand" value="{{ old('inp_brand') }}" placeholder="Input merk/spesifikasi/tipe.." required>
            @if ($errors->has('inp_brand'))
						<span style="color: red;"><i>{{ $errors->first('inp_brand') }}</i></span>
						@endif
          </div>
        </div>
        {{-- diskripsi produk --}}
        <div class="form-group has-feedback {{ $errors->has('inp_diskripsi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi alat/fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-diskripsi" class="form-control" name="inp_diskripsi" value="{{ old('inp_diskripsi') }}" placeholder="Input diskripsi produk">
            @if ($errors->has('inp_diskripsi'))
						<span style="color: red;"><i>{{ $errors->first('inp_diskripsi') }}</i></span>
						@endif
          </div>
        </div>
        {{-- dasar peminjaman --}}
        {{-- <div class="form-group has-feedback {{ $errors->has('inp_brand') ? ' has-error' : '' }}" >
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Dasar peminjaman <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <select name="inp_base" class="form-control" id="inp-base" required>
              <option value="{{ null }}">Pilih dasar peminjaman</option>
              <option value="Hari">Harian</option>
              <option value="Minggu">Mingguan</option>
              <option value="Bulan">Bulanan</option>
            </select>
            @if ($errors->has('inp_base'))
						<span style="color: red;"><i>{{ $errors->first('inp_base') }}</i></span>
						@endif
          </div>
        </div> --}}
        {{-- biaya peminjaman --}}
        <div class="form-group has-feedback {{ $errors->has('inp_brand') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Biaya Pinjam (/hari) <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cost" class="form-control" name="inp_cost" value="{{ old('inp_cost') }}" oninput="fcurrencyInput('inp-cost')" placeholder="Rp 0.00" required>
            @if ($errors->has('inp_brand'))
						<span style="color: red;"><i>{{ $errors->first('inp_brand') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_facility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat / fasilitas <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-facility" class="form-control" name="inp_cn_facility" value="{{ old('inp_cn_facility') }}" oninput="actCntTool()" placeholder="Input jumlah alat/fasilitas.." required>
            @if ($errors->has('inp_cn_facility'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_facility') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat yang siap dipinjamkan --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_ready') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat / Fasilitas siap dipinjamkan <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-ready" class="form-control" name="inp_cn_ready" value="{{ old('inp_cn_ready') }}" oninput="actCntToolReady()" placeholder="Input jumlah alat/fasilitas yang tersedia untuk dipakai.." required readonly>
            @if ($errors->has('inp_cn_ready'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_ready') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat yang dipinjamkan --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_used') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Dipakai / Dipinjamkan <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-used" class="form-control" name="inp_cn_used" value="{{ old('inp_cn_used') }}" placeholder="Input jumlah alat/fasilitas yang dipakai atau dipinjam.." readonly>
            @if ($errors->has('inp_cn_used'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_used') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah lat yang rusak atau tidak dapt dipakai --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_unwearable') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Rusak/Tidak Bisa Dipakai <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-unwearable" class="form-control" name="inp_cn_unwearable" value="{{ old('inp_cn_unwearable') }}" oninput="actCntToolUnwear()"
            placeholder="Input jumlah alat/fasilitas yang kondisi rusak/tidak bisa dipakai.." required readonly>
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
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  var select_basecost = new TomSelect("#inp-base",{
    create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-base">'+escape(data.title)+'</div>';
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
  function actCntTool() {
    var cnt_tool = $('#inp-cn-facility').val();
    /* change atribut*/
    $('#inp-cn-ready').removeAttr('readonly');
    $('#inp-cn-unwearable').removeAttr('readonly');
    /* set value */
    $('#inp-cn-ready').val(cnt_tool);
    $('#inp-cn-used').val(0);
    $('#inp-cn-unwearable').val(0);
  };
  function actCntToolReady() {
    var cnt_tool = $('#inp-cn-facility').val();
    var cnt_used = $('#inp-cn-used').val();
    var cnt_unwear = $('#inp-cn-unwearable').val();
    var cnt_ready = $('#inp-cn-ready').val();
    var total_tool = cnt_tool - (cnt_used+cnt_unwear);
    if (total_tool < cnt_ready) {
      $('#inp-cn-ready').val(total_tool);
    }
  };
  function actCntToolUnwear() {
    var cnt_tool = $('#inp-cn-facility').val();
    var cnt_used = $('#inp-cn-used').val();
    var cnt_unwear = $('#inp-cn-unwearable').val();
    var cnt_ready = $('#inp-cn-ready').val();
    var total_tool = cnt_tool - (cnt_used+cnt_ready);
    if (total_tool < cnt_unwear) {
      $('#inp-cn-unwearable').val(total_tool);
    }
  };
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
      var input = $(this).parents('.input-group').find(':text'),
      log = label;
      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }
    });
  });
  $(document).ready(function (){
    $('#upload_url_img').change(function(){
      var input = this;
      var url = $(this).val();
      var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#wrap-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
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