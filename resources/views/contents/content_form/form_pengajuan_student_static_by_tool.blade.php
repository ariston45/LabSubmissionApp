
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
        <input type="hidden" id="inp-nama" name="inp_nama" value="{{ $user_data->name }}" >
        <input type="hidden" id="inp-id" name="inp_id" value="{{ $user_data->no_id }}" >
        <input type="hidden" id="inp-program-studi" name="inp_program_studi" value="{{ $user_data->usd_prodi }}">
        <input type="hidden" id="inp-fakultas" name="inp_fakultas" value="{{ $user_data->usd_fakultas }}">
        <input type="hidden" id="inp-institusi" name="inp_institusi" value="{{ $user_data->usd_universitas }}">
        <input type="hidden" id="inp-nomor-kontak" name="inp_nomor_kontak" value="{{ $user_data->usd_phone }}">
        <input type="hidden" id="inp-nomor-kontak" name="inp_address" value="{{ $user_data->usd_address }}">
        <input type="hidden" name="inp_type_sub" value="pinjam_lab">
        {{-- !! --}}
        <div class="col-md-offset-3 col-md-9">
          <div class="divider">Kegiatan</div>
        </div>
        <div class="form-group {{ $errors->has('inp_kegiatan') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Keperluan Kegiatan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-kegiatan" class="form-control" name="inp_kegiatan" onchange="actActivitySubs()">
              <option value="{{ null }}">Pilih kegiatan..</option>
              <option value="tp_penelitian_skripsi" @if (old('inp_kegiatan') == 'tp_penelitian_skripsi') selected @endif >Penelitian Skripsi</option>
              <option value="tp_lain_lain" @if (old('inp_kegiatan') == 'tp_lainnya') selected @endif >Lainnya</option>
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
        {{-- Opsi untuk pilihan lain-lain --}}
        <div class="form-group has-feedback {{ $errors->has('inp_opsi_lainnya') ? ' has-error' : '' }}" id="fm-opsi" style="display: none;">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Tujuan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-tujuan" class="form-control" name="inp_tujuan" value="{{ old('inp_tujuan') }}" placeholder="Inputkan tujuan">
          </div>
        </div>
        {{-- --- --}}
        <div class="form-group has-feedback {{ $errors->has('inp_judul') ? ' has-error' : '' }}" id="fm-judul" style="display: none;">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Judul
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-judul-ii" class="form-control" name="inp_judul" value="{{ old('inp_judul') }}" placeholder="Judul kegiatan/ Judul Penelitian/ Judul pelatihan/ ...">
            @if ($errors->has('inp_judul'))
						<span style="color: red;"><i>{{ $errors->first('inp_judul') }}</i></span>
						@endif
          </div>
        </div>
        {{-- ~ --}}
        {{-- ~ --}}
        @php
          $idx_tool = 0;
        @endphp
        <div class="col-md-offset-3 col-md-9 act-datetime act-tool">
          <div class="divider">Fasilitas & Alat</div>
        </div>
        <div class="form-group act-tool {{ $errors->has('inp_fasilitas') ? ' has-error' : '' }}" id="fm-inp-tool">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Fasilitas/Alat
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-sm-11">
                <div style="margin-bottom: 5px;">
                  <select id="inp-tool-{{$idx_tool}}" class="form-control" name="inp_fasilitas[{{$idx_tool}}]" onchange="actGetSatuan(0)">
                    <option value="{{ null }}">Pilih fasilitas/alat..</option>
                    @foreach ( $lab_tool_data as $list)
                    <option value="{{ $list->laf_id }}">{{$list->laf_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group inp-split-cst date" style="margin-bottom: 6px;">
									<div class="input-group-addon">
										Satuan
									</div>
									<input type="text" name="inp_satuan[{{$idx_tool}}]" value="" class="form-control pull-right" placeholder="">
                  <div class="input-group-addon">
										<div id="inp-satuan-{{$idx_tool}}">...</div>
									</div>
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
            @if ($errors->has('tool_err'))
						<span style="color: red;"><i>{{ $errors->first('tool_err') }}</i></span>
						@endif
          </div>
          <div class="col-md-offset-3 col-sm-12 col-md-9" id="add-tool">
          </div>
        </div>
        {{-- !!  --}}
        {{-- ~ --}}
        {{-- !!  --}}
        {{-- <div class="col-md-offset-3 col-md-9">
          <div class="divider">Pembayaran</div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('bukti_pembayaran') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Upload Bukti Pembayaran
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload" name="bukti_pembayaran" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2">
						</div>
            <p><i>Pembayaran dapat dilakukan transfer via Bank, apabila pemohon sudah melakukan pembayaran silahkan bukti transaksi bisa di upload form diatas dalam format jpeg atau pdf. </i></p>
            @if ($errors->has('bukti_pembayaran'))
						<span style="color: red;"><i>{{ $errors->first('bukti_pembayaran') }}</i></span>
						@endif
          </div>
        </div> --}}
        <div id="cost-tables" class="col-md-offset-3 col-md-9">
        </div>
      </div>
      <div class="box-footer">
        <div class="col-md-offset-3 col-md-9">
          <button type="button" class="btn btn-default btn-flat"><i class="ri-file-list-3-line" style="margin-right: 5px;"></i>Cek Estimasi Biaya</button>
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
        +'<select id="inp-tool-'+new_idx_tool+'" class="form-control" name="inp_fasilitas['+new_idx_tool+']" onchange="actGetSatuan('+new_idx_tool+')">'
        +'<option value="{{ null }}">Pilih fasilitas/alat..</option>'
        +'@foreach ( $lab_tool_data as $list)'
        +'<option value="{{ $list->laf_id }}">{{$list->laf_name}}</option>'
        +'@endforeach</select></div>'
        +'<div class="input-group inp-split-cst date" style="margin-bottom: 6px;">'
        +'<div class="input-group-addon">Satuan</div>'
        +'<input type="text" name="inp_satuan['+new_idx_tool+']" class="form-control pull-right" placeholder="">'
        +'<div class="input-group-addon"><div id="inp-satuan-'+new_idx_tool+'">...</div></div></div></div>'
        +'<div class="col-sm-1"><button type="button" class="btn btn-flat btn-default rm-inp-tool">'
        +'<i class="fa fa-times" aria-hidden="true"></i></button></div></div>'
      );
    });
    $('#add-tool').on('click', '.rm-inp-tool', function(){
      $(this).closest('.inp-dt-group').remove();
    });
  });
</script>
@endpush