
@extends('layout.app')
@section('title')
Lab management | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
  <li class="active"><a href="#">Form Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Update Laboratorium</h3>
      <div class="pull-right">
        <a href="{{ url('laboratorium') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('update_laboratorium') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="lab_id" value="{{ $data_lab->lab_id }}">
      <div class="box-body">
        {{-- !! --}}
        <div class="form-group">
          <div class="col-md-offset-3 col-md-9">
            @if ($data_lab->lab_img == null)
            <img src="{{ url('public/assets/img/noimage.jpg') }}" id="wrap-img" class="img img-thumbnail" style="width: 30%"><br>
            <input type="file" class="upload_url_img" id="upload_url_img" name="upload_url_img" />
            <label for="upload_url_img">
              Tambah Foto
            </label>
            @else
            <img src="{{ url('storage/image_lab/'.$data_lab->lab_img) }}" id="wrap-img" class="img img-thumbnail" style="width: 30%">
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
        <div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-laboratorium" class="form-control" name="inp_laboratorium" value="{{ $data_lab->lab_name }}" placeholder="Input nama laboratorium.." required>
            @if ($errors->has('inp_laboratorium'))
						<span style="color: red;"><i>{{ $errors->first('inp_laboratorium') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_runpun') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Rumpun
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-rumpun" class="form-control" name="inp_rumpun" placeholder="Input Rumpun.." required>
              @foreach ($data_rumpun as $list)
              <option value="{{ $list->lag_id }}" @if ($data_lab->lab_group == $list->lag_id) selected @endif >{{ $list->lag_name }}</option>  
              @endforeach
            </select>
            @if ($errors->has('inp_rumpun'))
						<span style="color: red;"><i>{{ $errors->first('inp_rumpun') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_kalab') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Kepala Sub Lab
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_kalab" id="inp-kalab" value="" placeholder="Pilih user.." required>
              <option value=""></option>
              @foreach ($data_kasublab as $list)
              <option value="{{ $list->id }}" @if ( $list->id == $data_lab->lab_head) selected @endif>{{ $list->name }}</option>
              @endforeach
            </select>
            @if ($errors->has('inp_kalab'))
						<span style="color: red;"><i>{{ $errors->first('inp_kalab') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_teknisi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Teknisi Lab
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select type="text" class="form-control" name="inp_teknisi[]" id="inp-teknisi" multiple value="" placeholder="Pilih user.." required>
              <option value=""></option>
              @foreach ($data_all_tech as $list)
                @if (in_array($list->id,$data_tech)  )
                  <option value="{{ $list->id }}" selected>{{ $list->name }}</option>
                @else
                  <option value="{{ $list->id }}">{{ $list->name }}</option>
                @endif
              @endforeach
            </select>
            @if ($errors->has('inp_teknisi'))
						<span style="color: red;"><i>{{ $errors->first('inp_teknisi') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_notes_short') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi Singkat Lab.
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <textarea id="edt-notes-short" class="form-control" name="inp_notes_short" placeholder="Tuliskan diskripsi disini" style="padding-left: 12px;">
              {{ $data_lab->lab_note_short }}
            </textarea>
            @if ($errors->has('inp_notes_short'))
						<span style="color: red;"><i>{{ $errors->first('inp_notes_short') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_notes') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Diskripsi Lab.
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <textarea id="edt-notes" class="form-control" name="inp_notes" placeholder="Tuliskan diskripsi disini" style="">
            {{ $data_lab->lab_notes }}
            </textarea>
            @if ($errors->has('inp_notes'))
						<span style="color: red;"><i>{{ $errors->first('inp_notes') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_lokasi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Lokasi Lab
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-lokasi" class="form-control" name="inp_lokasi" value="{{ $data_lab->lab_location }}" placeholder="Input lokasi lab..">
            @if ($errors->has('inp_lokasi'))
						<span style="color: red;"><i>{{ $errors->first('inp_lokasi') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_cost') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Biaya Pinjam Per Hari
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-cost" class="form-control" name="inp_cost"  value="{{ funCurrencyRupiah($data_lab->lab_rent_cost) }}" oninput="fcurrencyInput('inp-cost')" placeholder="biaya..">
            @if ($errors->has('inp_cost'))
						<span style="color: red;"><i>{{ $errors->first('inp_cost') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group {{ $errors->has('inp_status') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Status Ketersediaan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-status" class="form-control" name="inp_status" placeholder="Input lokasi lab.." required>
              <option value="{{ null }}"></option>
              <option value="tersedia" @if ($data_lab->lab_status == 'tersedia') selected @endif >Tersedia</option>
              <option value="tidak_tersedia" @if ($data_lab->lab_status == 'tidak_tersedia') selected @endif >Tidak Tersedia</option>
            </select>
            @if ($errors->has('inp_status'))
						<span style="color: red;"><i>{{ $errors->first('inp_status') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group {{ $errors->has('inp_lap_option') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Opsi Layanan Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="inp_check_borrow" @if ($data_lab->lop_pinjam_lab == 'true') checked @endif value="true" >
                    Peminjaman Laboratorium
                  </label>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="inp_check_rental" @if ($data_lab->lop_sewa_alat_lab == 'true') checked @endif value="true">
                    Sewa Alat Laboratorium
                  </label>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="inp_check_ujilab" @if ($data_lab->lop_uji_lab == 'true') checked @endif value="true">
                    Pegujian Sampel di Laboratorium
                  </label>
                </div>
              </div>
            </div>
            @if ($errors->has('inp_lap_option'))
						<span style="color: red;"><i>{{ $errors->first('inp_lap_option') }}</i></span>
						@endif
          </div>
        </div>
        {{-- <div class="form-group {{ $errors->has('inp_status') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Dasar Biaya Peminjaman
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-base" class="form-control" name="inp_base" placeholder="Input lokasi lab.." required>
              <option value="{{ null }}"></option>
              <option value="by_day" @if ($data_lab->lab_costbase == 'by_day') selected @endif >Berdasarkan Hari</option>
              <option value="by_sample" @if ($data_lab->lab_costbase == 'by_sample') selected @endif >Berdasrkan Jumlah Sampel</option>
              <option value="by_tool" @if ($data_lab->lab_costbase == 'by_tool') selected @endif >Berdasarkan Alat</option>
            </select>
            @if ($errors->has('inp_status'))
						<span style="color: red;"><i>{{ $errors->first('inp_base') }}</i></span>
						@endif
          </div>
        </div> --}}
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Simpan</button>
        <button type="reset" onclick="actResetForm()" class="btn btn-default btn-flat pull-right" style="margin-right: 5px;"><i class="ri-refresh-line" style="margin-right: 5px;"></i>Muat Ulang</button>
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
  var select_kasublab = new TomSelect("#inp-kalab",{
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
  var select_technicians = new TomSelect("#inp-teknisi",{
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
  function actGetUser_labSubhead() {
		var par_a = 'LAB_SUBHEAD';
		var dataOption_users = [];
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
				var dataOpt_users = JSON.parse(result);
				for (let index = 0; index < dataOpt_users.length; index++) {
          dataOption_users.push({
            id:dataOpt_users[index].id,
            title:dataOpt_users[index].title,
          });
        }
			},
		});
		return dataOption_users;
	};
  function actGetUser_labTechnicians() {
		var par_a = 'LAB_TECHNICIAN';
		var dataOption_users = [];
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
				var dataOpt_users = JSON.parse(result);
				for (let index = 0; index < dataOpt_users.length; index++) {
          dataOption_users.push({
            id:dataOpt_users[index].id,
            title:dataOpt_users[index].title,
          });
        }
			},
		});
		return dataOption_users;
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
  function actRemoveImage() {
    $('#param-upload-url-img').val('delete');
    $('#wrap-img').hide();
    $('#wrap-img-new').show();
    $('#btn-delete-picture').hide();
  };
  function actResetForm() {
    location.reload();
  };
</script>
{{-- ready function --}}
<script>
  $(document).ready(function () {
    var user_subhead_lab = actGetUser_labSubhead();
    var user_technicians = actGetUser_labTechnicians();
    select_kasublab.addOptions(user_subhead_lab);
    select_technicians.addOptions(user_technicians);
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