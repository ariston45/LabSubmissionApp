
@extends('auth.auth_layout')
@section('content')
<div class="mb-4" style="text-align: center;">
	<strong>REGISTRASI SIPLAB</strong>
</div>
<form role="form" method="POST" action="{{ route('register-action') }}" autocomplete="off">
	{{ csrf_field() }}
	<div class="form-group has-feedback {{ $errors->has('level') ? ' has-error' : '' }}">
		<label>Pilih Status</label>
		<select class="form-control" name="level" id="inp_level" onchange="inpLevel()" required>
			<option value="{{ null }}"></option>
			{{-- <option value="STUDENT" @if (old('level') == 'STUDENT') selected @endif >Mahasiswa Fakultas Teknik</option> --}}
			<option value="PUBLIC_MEMBER" @if (old('level') == 'PUBLIC_MEMBER') selected @endif>Umum Anggota Universitas</option>
			<option value="PUBLIC_NON_MEMBER" @if (old('level') == 'PUBLIC_NON_MEMBER') selected @endif>Umum Non-Anggota Universitas</option>
		</select>
		@if ($errors->has('level'))
		<span style="color: red;"><i>{{ $errors->first('level') }}</i></span>
		@endif
	</div>
	<div class="form-group has-feedback {{ $errors->has('no_id') ? ' has-error' : '' }}">
		<label>Nomor Identitas (NIK/NIM/ID)</label>
		<input id="nomor-id" type="text" class="form-control" name="no_id" value="{{ old('no_id') }}" autocomplete="new-password" required>
		@if ($errors->has('no_id'))
		<span style="color: red;"><i>{{ $errors->first('no_id') }}</i></span>
		@endif
	</div>
	<div id="fd_nama" class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
		<label>Nama Lengkap</label>
		<input id="name-id" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="new-password" required>
		@if ($errors->has('name'))
		<span style="color: red;"><i>{{ $errors->first('name') }}</i></span>
		@endif
	</div>
	<div id="fd_email" class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
		<label>Email</label>
		<input id="email-id" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="new-password" required>
		@if ($errors->has('email'))
		<span style="color: red;"><i>{{ $errors->first('email') }}</i></span>
		@endif
	</div>
	<div id="" class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="">Password</label>
		<input id="password-id" type="password" class="form-control" name="password" autocomplete="new-password" required>
		@if ($errors->has('password'))
		<span style="color: red;"><i>{{ $errors->first('password') }}</i></span>
		@endif
	</div>
	<div class="form-group has-feedback {{ $errors->has('password_confirm') ? ' has-error' : '' }}" autocomplete="new-password" required>
		<label for="">Konfirmasi Password</label>
		<input id="retype-password-id" type="password" class="form-control" name="password_confirm" >
		@if ($errors->has('password_confirm'))
		<span style="color: red;"><i>{{ $errors->first('password_confirm') }}</i></span>
		@endif
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning" id="notif" style="display: none; margin: 0 auto 10px"></div>
			@if ($errors->has('msg_err'))
			<div class="alert alert-warning" id="notif" style="margin: 0 auto 10px">
				{{ $errors->first('msg_err') }}
			</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-sm-5">
			<div class="checkbox">
				<label>
					<input id="check-password" type="checkbox" name="showpass" onclick="actionShowPass()" {{ old('showpass') ? 'checked' : '' }}> Show Password
				</label>
			</div>
		</div>
		<div class="col-sm-7" style="text-align: right;">
			<div id="wrap-btn">
				<button type="reset" class="btn btn-flat btn-sm btn-default" id="batal">Bersihkan</button>
				<button type="submit" class="btn btn-flat btn-sm btn-primary" id="save">Simpan</button>
			</div>
		</div>
	</div>
</form>
<hr style="margin-bottom: 5px;margin-top: 5px;">
<div style="text-align: center;">
	<span style="text-align: center;">
		<a href="{{ url('login') }}"><b>Kembali Ke Login</b></a>
	</span>
</div>
@endsection
@push('scripts')
<script>
	function actionShowPass() {  
		var x = document.getElementById("password-id");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		var y = document.getElementById("retype-password-id");
		if (y.type === "password") {
			y.type = "text";
		} else {
			y.type = "password";
		}
	};
	function inpLevel(){
		var inp_selected = $('#inp_level').find(":selected").val();
		if (inp_selected == 'STUDENT') {
			$("#name-id").prop('disabled', true);
			$("#email-id").prop('disabled', true);
			$('#fd_nama').hide();
			$('#fd_email').hide();
		}else{
			$("#name-id").prop('disabled', false);
			$("#email-id").prop('disabled', false);
			$('#fd_nama').show();
			$('#fd_email').show();
		}
	}
</script>
@endpush
