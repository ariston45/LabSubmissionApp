
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
    <form class="form-horizontal" action="{{ route('kirim_pengajuan') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
        {{-- !! --}}
        <div class="form-group has-feedback {{ $errors->has('inp_nama') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Nama Lengkap
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nama" class="form-control" name="inp_nama" value="{{ $user_data->name}}" placeholder="Input nama..">
            @if ($errors->has('inp_nama'))
						<span style="color: red;"><i>{{ $errors->first('inp_nama') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_id') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              NIM/No.ID
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-id" class="form-control" name="inp_id" value="{{ old('inp_id') }}" placeholder="Input no id..">
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
            <input type="text" id="inp-program-studi" class="form-control" name="inp_program_studi" value="{{ old('inp_program_studi') }}" placeholder="Input program studi..">
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
            <input type="text" id="inp-fakultas" class="form-control" name="inp_fakultas" value="{{ old('inp_fakultas') }}" placeholder="Input fakultas">
            @if ($errors->has('inp_fakulas'))
						<span style="color: red;"><i>{{ $errors->first('inp_fakultas') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_institusi') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Universitas/Institusi
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-institusi" class="form-control" name="inp_institusi" value="{{ old('inp_institusi') }}" placeholder="Input universitas/institusi..">
            @if ($errors->has('inp_institusi'))
						<span style="color: red;"><i>{{ $errors->first('inp_nama') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_nomor_kontak') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Nomor HP/Kontak
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-nomor-kontak" class="form-control" name="inp_nomor_kontak" value="{{ old('inp_nomor_kontak') }}" placeholder="Input no kontak...">
          </div>
        </div>
        {{-- !! --}}
        <div class="form-group {{ $errors->has('inp_kegiatan') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Keperluan Kegiatan
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-kegiatan" class="form-control" name="inp_kegiatan">
              <option value="{{ null }}">Pilih kegiatan..</option>
              <option value="tp_penelitian" @if (old('inp_kegiatan') == 'tp_penelitian') selected @endif >Penelitian</option>
              <option value="tp_pelatihan" @if (old('inp_kegiatan') == 'tp_pelatihan') selected @endif >Pelatihan</option>
              <option value="tp_pengabdian_masyarakat" @if (old('inp_kegiatan') == 'tp_pengabdian_masyarakat') selected @endif >Pengabdian Masyarakat</option>
              <option value="tp_magang" @if (old('inp_kegiatan') == 'tp_magang') selected @endif >Magang</option>
              <option value="tp_lain_lain" @if (old('inp_kegiatan') == 'tp_lain_lain') selected @endif >Lain-lain*</option>
            </select>
            @if ($errors->has('inp_kegiatan'))
						<span style="color: red;"><i>{{ $errors->first('inp_kegiatan') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_judul') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Judul
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <input type="text" id="inp-judul" class="form-control" name="inp_judul" value="{{ old('inp_judul') }}" placeholder="Judul kegiatan/ Judul Penelitian/ Judul pelatihan/ ...">
            @if ($errors->has('inp_judul'))
						<span style="color: red;"><i>{{ $errors->first('inp_judul') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('date_start') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Mulai
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-6 col-md-7">
                <div class="input-group inp-split-cst date " id="date-pick-start">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-start" name="date_start"  value="{{ old('date_start') }}" class="form-control pull-right" placeholder="yyyy-mm-dd" readonly>
								</div>
              </div>
              <div class="col-sm-6 col-md-5">
                <div class="input-group has-feedback {{ $errors->has('time_start') ? ' has-error' : '' }}">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control" id="time-pick-start" name="time_start" value="0:00" placeholder="hh:ii" readonly>
                </div>
              </div>
            </div>
            @if ($errors->has('date_start'))
						<span style="color: red;"><i>{{ $errors->first('date_start') }}</i></span>
						@endif
            @if ($errors->has('time_start'))
						<span style="color: red;"><i>{{ $errors->first('time_start') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label">
            <span style="padding-right: 30px;">
              Jadwal Selesai
            </span>
          </label>
          <div class="divcol-sm-12 col-md-9">
            <div class="row">
              <div class="col-sm-6 col-md-7">
                <div class="input-group inp-split-cst date has-feedback {{ $errors->has('date_end') ? ' has-error' : '' }}" id="date-pick-end">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" id="date-pick-end" class="form-control pull-right" name="date_end" value="{{ old('date_end') }}" placeholder="yyyy-mm-dd" readonly>
								</div>
              </div>
              <div class="col-sm-6 col-md-5">
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" id="time-pick-end" class="form-control has-feedback {{ $errors->has('time_end') ? ' has-error' : '' }}" name="time_end"  value="00:00" readonly>
                </div>
              </div>
            </div>
            @if ($errors->has('date_end'))
						<span style="color: red;"><i>{{ $errors->first('date_end') }}</i></span>
						@endif
            @if ($errors->has('time_end'))
						<span style="color: red;"><i>{{ $errors->first('time_end') }}</i></span>
						@endif
          </div>
        </div>
        <div class="form-group has-feedback {{ $errors->has('inp_lab') ? ' has-error' : '' }}">
          <label class="col-sm-12 col-md-3 control-label" >
            <span style="padding-right: 30px;">
              Laboratorium
            </span>
          </label>
          <div class="col-sm-12 col-md-9">
            <select id="inp-lab" class="form-control" name="inp_lab" >
              <option value="{{ null }}">Pilih laboratorium..</option>
              <option value="tes">test</option>
            </select>
            @if ($errors->has('inp_lab'))
						<span style="color: red;"><i>{{ $errors->first('inp_lab') }}</i></span>
						@endif
          </div>
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
            @if ($errors->has('bukti_pembayaran'))
						<span style="color: red;"><i>{{ $errors->first('bukti_pembayaran') }}</i></span>
						@endif
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="ri-send-plane-fill" style="margin-right: 5px;"></i>Kirim</button>
        <button type="reset" class="btn btn-default btn-flat pull-right" style="margin-right: 5px;"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Bersih</button>
      </div>
    </form>
  </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('/public/assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
{{-- varibles --}}
<script></script>
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