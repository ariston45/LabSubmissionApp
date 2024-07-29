@php
  // die('halo');
@endphp
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
      <h3 class="box-title" style="color: #0277bd"><i class="ri-survey-line" style="margin-right: 4px;"></i> Form Pengajuan Sewa Alat {{ $lab_data->lab_name }}</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <form class="form-horizontal" action="{{ route('action_pengajuan_static_by_tool') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <input type="hidden" name="app_level" value="{{ $user_data->level }}">
        {{-- !! --}}
        <input type="hidden" id="inp-lab" name="inp_lab" value="{{ $lab_data->lab_id }}" >
        {{-- !! --}}
        <div class="col-sm-offset-3 col-sm-9">
          <div class="divider">Data Pemohon</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_nama') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Lengkap <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nama" class="form-control" name="inp_nama" value="{{ $user_data->name }}" placeholder="Input nama.." required>
            @if ($errors->has('inp_nama'))
						<span style="color: red;"><i>{{ $errors->first('inp_nama') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_id') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              NIM/No.ID <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if ($user_data->no_id != null)
            <input type="text" id="inp-id" class="form-control" name="inp_id" value="{{ $user_data->no_id }}" placeholder="Input no id..">
            @else
            <input type="text" id="inp-id" class="form-control" name="inp_id" value="{{ old('inp_id') }}" placeholder="Input no id..">
            @endif
            @if ($errors->has('inp_id'))
						<span style="color: red;"><i>{{ $errors->first('inp_id') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_program_studi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Program Studi
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if ($user_data->usd_prodi != null)
            <input type="text" id="inp-program-studi" class="form-control" name="inp_program_studi" value="{{ $user_data->usd_prodi }}" placeholder="Input program studi..">
            @else
            <input type="text" id="inp-program-studi" class="form-control" name="inp_program_studi" value="{{ old('inp_program_studi') }}" placeholder="Input program studi..">
            @endif
            @if ($errors->has('inp_program_studi'))
						<span style="color: red;"><i>{{ $errors->first('inp_program_studi') }}</i></span>
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
            @if ($user_data->usd_fakultas != null)
            <input type="text" id="inp-fakultas" class="form-control" name="inp_fakultas" value="{{ $user_data->usd_fakultas }}" placeholder="Input fakultas">  
            @else
            <input type="text" id="inp-fakultas" class="form-control" name="inp_fakultas" value="{{ old('inp_fakultas') }}" placeholder="Input fakultas">
            @endif
            @if ($errors->has('inp_fakulas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fakultas') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_institusi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Institusi <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if ($user_data->usd_universitas != null)
            <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ $user_data->usd_universitas }}" placeholder="Input institusi.." required>  
            @else
            <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ old('inp_institusi') }}" placeholder="Input institusi.." required>
            @endif
            @if ($errors->has('inp_institusi'))
						<span style="color: red;"><i>{{ $errors->first('inp_institusi') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_nomor_kontak') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Nomor HP/Kontak <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if ($user_data->usd_phone != null)
            <input type="text" id="inp-nomor-kontak" class="form-control" name="inp_nomor_kontak" value="{{ $user_data->usd_phone }}" placeholder="Input no kontak..." required>
            @else
            <input type="text" id="inp-nomor-kontak" class="form-control" name="inp_nomor_kontak" value="{{ old('inp_nomor_kontak') }}" placeholder="Input no kontak..." required>
            @endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_address') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Alamat <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            @if ($user_data->usd_address != null)
            <input type="text" id="inp-nomor-kontak" class="form-control" name="inp_address" value="{{ $user_data->usd_address }}" placeholder="Input alamat..." required>
            @else
            <input type="text" id="inp-nomor-kontak" class="form-control" name="inp_address" value="{{ old('inp_address') }}" placeholder="Input alamat..." required>
            @endif
          </div>
        </div>
        {{-- !! --}}
        <div class="col-md-offset-3 col-md-9">
          <div class="divider">Kegiatan</div>
        </div>
        <div class="form-group {{ $errors->has('inp_kegiatan') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Keperluan Kegiatan <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-kegiatan" class="form-control" name="inp_kegiatan" onchange="actActivitySubs()" required>
              <option value="{{ null }}">Pilih kegiatan..</option>
              <option value="tp_penelitian" @if (old('inp_kegiatan') == 'tp_penelitian') selected @endif >Penelitian</option>
              <option value="tp_pelatihan" @if (old('inp_kegiatan') == 'tp_pelatihan') selected @endif >Pelatihan</option>
              <option value="tp_pengabdian_masyarakat" @if (old('inp_kegiatan') == 'tp_pengabdian_masyarakat') selected @endif >Pengabdian Masyarakat</option>
              <option value="tp_magang" @if (old('inp_kegiatan') == 'tp_magang') selected @endif >Magang</option>
              <option value="tp_lain_lain" @if (old('inp_kegiatan') == 'tp_lain_lain') selected @endif >Lain-lain*</option>
            </select>
            <div id="data-loading" style="display: none;">
              <img src="{{ url('/public/assets/img/loading.gif') }}" class="img-loading" alt="">
            </div>
            @if ($errors->has('inp_kegiatan'))
						<span style="color: red;"><i>{{ $errors->first('inp_kegiatan') }}</i></span>
						@endif
          </div>
        </div>
        {{--  --}}
        @if (rulesUser(['STUDENT']))
        <div id="data-simontasi"></div>
        @endif
        {{--  --}}
        <div class="form-group has-feedback {{ $errors->has('inp_tujuan') ? ' has-error' : '' }}" id="fm-tujuan" >
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Tujuan <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-tujuan" class="form-control" name="inp_tujuan" value="{{ old('inp_tujuan') }}" placeholder="Inputkan tujuan" required>
          </div>
        </div>
        {{-- --- --}}
        <div class="form-group has-feedback {{ $errors->has('inp_judul') ? ' has-error' : '' }}" id="fm-judul" >
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Judul <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-judul-ii" class="form-control" name="inp_judul" value="{{ old('inp_judul') }}" placeholder="Judul kegiatan/ Judul Penelitian/ Judul pelatihan/ ..." required>
            @if ($errors->has('inp_judul'))
						<span style="color: red;"><i>{{ $errors->first('inp_judul') }}</i></span>
						@endif
          </div>
        </div>
        {{-- ~ --}}
        @php
          $idx_tool = 0;
        @endphp
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool">
          <div class="divider">Fasilitas & Alat</div>
        </div>
        <div class="form-group act-tool {{ $errors->has('inp_fasilitas') ? ' has-error' : '' }}" id="fm-inp-tool" style="margin-bottom: 5px;">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Fasilitas/Alat <span style="color: red;">*</span>
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-11">
                <div style="margin-bottom: 5px;">
                  <select id="inp-tool-{{$idx_tool}}" class="form-control init-tool" name="inp_fasilitas[{{$idx_tool}}]" onchange="actGetSatuan(0)">
                    <option value="{{ null }}">Pilih fasilitas/alat..</option>
                    @foreach ( $lab_tool_data as $list)
                    <option value="{{ $list->laf_id }}">{{$list->laf_name}} - <b>[Siap dipinjam: {{$list->lcs_ready}} unit]</b></option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group inp-split-cst date" style="margin-bottom: 6px;">
									<div class="input-group-addon">
                    Jumlah Unit
									</div>
									<input type="text" name="inp_jml_unit[{{$idx_tool}}]" value="" class="form-control init-jml-unit pull-right" placeholder="">
								</div>
              </div>
              <div class="col-sm-1">
                <button type="button" id="btn-add-input-tool" class="btn btn-flat btn-default">
                  <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            @if ($errors->has('inp_fasilitas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fasilitas') }}</i></span>
						@endif
          </div>
          <div class="col-md-offset-3 col-sm-12 col-md-9" id="add-tool">
          </div>
        </div>
        {{--  --}}
        <div class="form-group act-tool {{ $errors->has('inp_fasilitas') ? ' has-error' : '' }}" id="fm-inp-tool" style="margin-bottom: 5px;">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Opsional Fasilitas/Alat lainnya 
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div style="margin-bottom: 5px;">
              <select id="inp-tool-opsional" class="form-control" multiple name="inp_fasilitas_opsional[]">
                <option value="{{ null }}">Pilih fasilitas/alat..</option>
              </select>
            </div>
          </div>
        </div>
        @if ($errors->has('tool_err'))
        <div class="col-md-offset-3 col-md-9 act-datetime" >
          <span style="color: red;"><i>{{ $errors->first('tool_err') }}</i></span>
        </div>
        @endif
        {{--  --}}
        <div class="col-md-offset-3 col-md-9 act-datetime">
          <div class="divider">Jadwal Kegiatan</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_opsi_lainnya') ? ' has-error' : '' }}" style="margin-bottom: 5px;">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Tanggal Mulai Sewa
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group inp-split-cst date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" id="inp-start" name="inp_date_start"  value="{{ old('inp_date') }}" class="form-control inp-date-s pull-right" placeholder="yyyy-mm-dd" readonly>
            </div>
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_opsi_lainnya') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Tanggal Akhir Sewa
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group inp-split-cst date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" id="inp-end" name="inp_date_end"  value="{{ old('inp_date') }}" class="form-control inp-date-s pull-right" placeholder="yyyy-mm-dd" readonly>
            </div>
          </div>
        </div>
        {{-- !!  --}}
        <div id="cost-tables" class="col-md-offset-3 col-md-9">
          <div id="test-id"></div>
        </div>
        {{--  --}}
      </div>
      <div class="box-footer">
        <div class="col-md-3">
          <i> Tanda ( <span style="color: red;">*</span> ) wajib diisi </i>
        </div>
        <div class="col-md-9">
          <button type="button" class="btn btn-default btn-flat" onclick="cekCost()"><i class="ri-file-list-3-line" style="margin-right: 5px;"></i>Cek Estimasi Biaya</button>
          <a href="#">
            <button type="button" class="btn btn-default btn-flat"><i class="ri-calendar-2-line" style="margin-right: 5px;"></i>Cek Jadwal</button>
          </a>
          <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-send-plane-fill" style="margin-right: 5px;"></i>Kirim</button>
          <button type="reset" class="btn btn-default btn-flat pull-right" style="margin-right: 5px;"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Bersih</button>
        </div>
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
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  var select_act = new TomSelect("#inp-kegiatan",{
    create: false,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-kegitan">'+escape(data.title)+'</div>';
			}
		}
  });
  var select_tool = new TomSelect("#inp-tool-opsional",{
    maxItem:20,
    create: true,			
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-opsional">'+escape(data.title)+'</div>';
			}
		}
  });
</script>
{{-- function --}}
<script>
  function callDataStudent() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source_check_skripsi') }}",
      data: {
        "nim":"{{ $user_data->no_id }}",
      },
      async: false,
      success: function(result) {
        $('#data-simontasi').html(result);
      },
      complete: function() {
        $('#data-loading').hide();
      },
    });
  };
  function actActivitySubs() {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    // alert(val_activity);
    if (val_activity == 'tp_penelitian_skripsi') {
      $('#fm-judul').hide();
      $('#fm-opsi').hide();
      $("#fm-judul").hide();
      // $("#inp-judul-ii").prop('disabled', true);
      $('#data-loading').show();
      setTimeout(function() {
        callDataStudent();
      }, 2000);
    }else if(val_activity == 'tp_lain_lain'){
      $('#fm-judul').fadeIn();
      $('#fm-opsi').fadeIn();
    }
  };
  function actViewLabCost(id) {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    if (val_activity == "") {
      alert('harap inputkan activity terlebih dahulu.');
      location.reload();
    }
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
        "activity": val_activity,
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actViewFacilityCost(idf) {
    var val_activity = $('#inp-kegiatan').find(":selected").val();
    if (val_activity == null) {
      alert('harap inputkan activity terlebih dahulu.');
    }
    var lab_selected = select_lab.getValue();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-cost-facility-tables') }}",
      data: {
        "lab_id":lab_selected,
        "lab_facility":idf
      },
      async: false,
      success: function(result) {
        $('#cost-tables').html(result);
      },
    });
  };
  function actGetSatuan(index) {
    var laf_id = $('#inp-tool-'+[index]).find(":selected").val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source_check_tool') }}",
      data: {
        "laf_id":laf_id,
      },
      async: false,
      success: function(result) {
        $('#inp-satuan-'+[index]).html(result.laf_base);
      },
    });
  };
  function cekCost() {
    let id_tooL_selects = document.querySelectorAll('.init-tool');
    let id_unit_selects = document.querySelectorAll('.init-jml-unit');
    let selectedValtool = [];
    let selectedValunit = [];
    /**/
    id_tooL_selects.forEach(select => {
      selectedValtool.push(select.value);
    });
    id_unit_selects.forEach(select => {
      selectedValunit.push(select.value);
    });
    /**/
    let lab_id = "{{$lab_data->lab_id}}";
    let dt_start = $('#inp-start').val();
    let dt_end = $('#inp-end').val();
    /**/
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source_check_cost_tool') }}",
      data: {
        "lab_id":lab_id,
        "tool": selectedValtool,
        "unit":selectedValunit,
        "dts":dt_start,
        "dte":dt_end, 
      },
      async: false,
      success: function(result) {
        $('#test-id').html(result);
      },
    });
  };
</script>
{{-- ready function --}}
<script>
  /**/
  $(document).ready(function(){
    var new_idx_tool = {{$idx_tool}};
    $('#btn-add-input-tool').click(function(){
      new_idx_tool++;
      $('#add-tool').append(
        '<div class="row inp-dt-group" style="margin-bottom: 10px;"><div class="col-sm-11">'
        +'<div style="margin-bottom: 5px;">'
        +'<select id="inp-tool-'+new_idx_tool+'" class="form-control init-tool" name="inp_fasilitas['+new_idx_tool+']" onchange="actGetSatuan('+new_idx_tool+')">'
        +'<option value="{{ null }}">Pilih fasilitas/alat..</option>'
        +'@foreach ( $lab_tool_data as $list)'
        +'<option value="{{ $list->laf_id }}">{{$list->laf_name}}</option>'
        +'@endforeach</select></div>'
        +'<div class="input-group inp-split-cst date" style="margin-bottom: 6px;">'
				+'<div class="input-group-addon">Jumlah Unit</div>'
				+'<input type="text" name="inp_jml_unit['+new_idx_tool+']" value="" class="form-control init-jml-unit pull-right" placeholder="">'
				+'</div></div>'
        +'<div class="col-sm-1"><button type="button" class="btn btn-flat btn-default rm-inp-tool">'
        +'<i class="fa fa-times" aria-hidden="true"></i></button></div></div>'
      );
    });
    $('#add-tool').on('click', '.rm-inp-tool', function(){
      $(this).closest('.inp-dt-group').remove();
    });
  });
</script>
<script>
  $('.inp-date-s').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    todayHighlight: true,
    orientation:'bottom',
  });
</script>
@endpush