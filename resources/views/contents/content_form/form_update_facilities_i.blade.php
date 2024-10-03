
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
        <a href="{{ url('fasilitas_lab/'.$data_facility->laf_laboratorium) }}">
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
        {{-- upload gambar --}}
        <div class="form-group">
          <div class="col-md-offset-4 col-md-8">
            @if ($data_facility->laf_image == null)
              <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 30%"><br>
              <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
              <label for="upload_url_img">
                <i class="fas fa-cloud-upload-alt"></i>
                Tambah Foto
              </label>
              @if ($errors->has('upload_url_img'))
              <span style="color: red;"><i>{{ $errors->first('upload_url_img') }}</i></span>
              @endif
            @else
              <img src="{{ url('storage/image_facility/'.$data_facility->laf_image) }}" id="wrap-img" class="img img-thumbnail" style="width: 30%">
              <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img-new" class="img img-thumbnail" style="width: 30%;display: none;">
              <button type="button" id="btn-delete-picture" class="btn btn-sm btn-default" onclick="actRemoveImage()">
                <i class="ri-delete-bin-5-line"></i>
              </button>
              <input type="hidden" id="param-upload-url-img" name="param_upload_url_img" />
              <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
              <label for="upload_url_img">
                Ganti Foto
              </label>
            @endif
          </div>
        </div>
        {{-- nama alat --}}
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
        {{-- kegunaan alat --}}
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
        {{-- Merk spesifikasi --}}
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
        {{-- diskripsi produk --}}
        <div class="form-group has-feedback {{ $errors->has('inp_diskripsi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi alat/fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-diskripsi" class="form-control" name="inp_diskripsi" value="{{ $data_facility->laf_description }}" placeholder="Input diskripsi produk">
            @if ($errors->has('inp_diskripsi'))
						<span style="color: red;"><i>{{ $errors->first('inp_diskripsi') }}</i></span>
						@endif
          </div>
        </div>
        {{-- dasar peminjaman --}}
        <div class="form-group has-feedback {{ $errors->has('inp_brand') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Dasar peminjaman
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <select name="inp_base" class="form-control" id="inp-base">
              <option value="Hari" @if($data_facility->laf_base == 'Hari') selected @endif >Harian</option>
              <option value="Minggu" @if($data_facility->laf_base == 'Minggu') selected @endif >Mingguan</option>
              <option value="Bulan" @if($data_facility->laf_base == 'Bulan') selected @endif >Bulanan</option>
            </select>
            @if ($errors->has('inp_base'))
						<span style="color: red;"><i>{{ $errors->first('inp_base') }}</i></span>
						@endif
          </div>
        </div>
        {{-- biaya pinjam --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cost') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Biaya Pinjam
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="text" id="inp-cost" class="form-control" name="inp_cost" oninput="fcurrencyInput('inp-cost')" value="{{ funCurrencyRupiah($data_facility->laf_value) }}" placeholder="Rp 0,00">
            @if ($errors->has('inp_cost'))
						<span style="color: red;"><i>{{ $errors->first('inp_cost') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_facility') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat / fasilitas
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-facility" class="form-control" name="inp_cn_facility" value="{{ $data_facility->lcs_count }}" oninput="actCntTool()" placeholder="Input jumlah alat/fasilitas..">
            @if ($errors->has('inp_cn_facility'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_facility') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat yang siap dipinjamkan --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_ready') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat / Fasilitas siap dipinjamkan
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-ready" class="form-control" name="inp_cn_ready" value="{{$data_facility->lcs_ready}}" oninput="actCntToolReady()" placeholder="Input jumlah alat/fasilitas yang tersedia untuk dipakai..">
            @if ($errors->has('inp_cn_ready'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_ready') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah alat yang dipinjamkan --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_used') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Dipakai / Dipinjamkan
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-used" class="form-control" name="inp_cn_used" value="{{$data_facility->lcs_used}}"  placeholder="Input jumlah alat/fasilitas yang dipakai atau dipinjam..">
            @if ($errors->has('inp_cn_used'))
						<span style="color: red;"><i>{{ $errors->first('inp_cn_used') }}</i></span>
						@endif
          </div>
        </div>
        {{-- jumlah lat yang rusak atau tidak dapt dipakai --}}
        <div class="form-group has-feedback {{ $errors->has('inp_cn_unwearable') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-4 control-label" >
            <span style="padding-right: 30px;">
              Jumlah Alat/Fasilitas Rusak/Tidak Bisa Dipakai
            </span>
          </label>
          <div class="col-sm-12 col-md-8">
            <input type="number" id="inp-cn-unwearable" class="form-control" name="inp_cn_unwearable" value="{{$data_facility->lcs_unwearable}}" oninput="actCntToolUnwear()"
            placeholder="Input jumlah alat/fasilitas yang kondisi rusak/tidak bisa dipakai..">
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
{{-- varibles --}}
<script>
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
  function actRemoveImage() {
    $('#param-upload-url-img').val('delete');
    $('#wrap-img').hide();
    $('#wrap-img-new').show();
    $('#btn-delete-picture').hide();
  };
  </script>
  {{-- <script>
  function actCntTool() {
    let cnt_tool_input = $('#inp-cn-facility').val();
    let cnt_used = {{$data_facility->lcs_used}};
    let cnt_unwear = {{$data_facility->lcs_unwearable}};
    let cnt_ready = {{ $data_facility->lcs_ready }};
    let cnt_tool = {{ $data_facility->lcs_count }};
    

    let tmp_cnt_ready = Number(cnt_tool_input) - (Number(cnt_used)+Number(cnt_unwear));
    if (tmp_cnt_ready < 0) {
      $('#inp-cn-facility').val(cnt_tool);
      $('#inp-cn-ready').val(cnt_ready);
    }else{
      $('#inp-cn-facility').val(cnt_tool_input);
      $('#inp-cn-ready').val(tmp_cnt_ready);
      $('#inp-cn-unwearable').val(cnt_unwear);
    }
    /* change atribut*/
    $('#inp-cn-ready').removeAttr('readonly');
    $('#inp-cn-unwearable').removeAttr('readonly');
    /* set value */
    // $('#inp-cn-used').val(0);
    // $('#inp-cn-unwearable').val(0);
  };
  function actCntToolReady() {
    var cnt_tool = $('#inp-cn-facility').val();
    var cnt_used = $('#inp-cn-used').val();
    var cnt_unwear = $('#inp-cn-unwearable').val();
    var cnt_ready = $('#inp-cn-ready').val();

    // var cnt_tmp = ;
    var tmp_cnt_ready = Number(cnt_tool) - (Number(cnt_used)+Number(cnt_unwear));

    if (cnt_ready > tmp_cnt_ready) {
      $('#inp-cn-ready').val(tmp_cnt_ready);
      if (condition) {
        
      }
    }else if (cnt_ready < 0) {
      $('#inp-cn-ready').val(0);
    }else{
      
      var tmp_cnt_unwear = Number(cnt_tool) - (Number(cnt_ready)+Number(cnt_used));
      $('#inp-cn-unwearable').val(tmp_cnt_unwear);
    }
  };
  function actCntToolUnwear() {
    var cnt_tool = $('#inp-cn-facility').val();
    var cnt_used = $('#inp-cn-used').val();
    var cnt_unwear = $('#inp-cn-unwearable').val();
    var cnt_ready = $('#inp-cn-ready').val();
    var total_tool = Number(cnt_tool) - (Number(cnt_used)+Number(cnt_ready));
    var tmp_cnt_ready = Number(cnt_tool) - (Number(cnt_used)+Number(cnt_unwear));
    var tmp_cnt_tool = Number(cnt_used)+Number(cnt_unwear)+Number(cnt_ready);
    if (cnt_unwear <script 0) {
      $('#inp-cn-unwearable').val(0);
    }else if (cnt_unwear > cnt_ready) {
      $('#inp-cn-ready').val(tmp_cnt_ready);
    }
  };
</script> --}}
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
@endpush