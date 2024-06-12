@extends('auth.auth_layout')
@section('content')
<form role="form" method="POST" action="{{ route('login-action') }}" autocomplete="off">
	{{ csrf_field() }}
	<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
		<label>Email</label>
		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autocomplete="new-password" required>
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		@if ($errors->has('email'))
		<span style="color: red;"><i>{{ $errors->first('email') }}</i></span>
		@endif
	</div>
	<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}"  >
		<label>Password</label>
		<input id="password-id" type="password" class="form-control" name="password" autocomplete="new-password" required>
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		@if ($errors->has('password'))
		<span style="color: red;"><i>{{ $errors->first('password') }}</i></span>
		@endif
		<a href="{{ url('reset') }}"><b>Lupa Password</b></a>
	</div>
	<div class="row">
		<div class="col-xs-8">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="remember" onclick="actionShowPass();" {{ old('remember') ? 'checked' : '' }}> Tampilkan Password
				</label>
			</div>
		</div>
		<div class="col-xs-4">
			<button type="submit" class="btn btn-sm btn-primary btn-block btn-flat" style="margin-bottom: 10px;margin-top: 10px;">Login</button>
		</div>
	</div>
</form>
@if ($errors->has('failed_login'))
<span class="help-block">
	<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
		{{ $errors->first('failed_login') }}
	</div>
</span>
@endif
<hr class="mt-1">
<div style="text-align: center;">
	<span style="text-align: center;">
		Belum punya akun? Registrasi 
		<a href="{{ url('register') }}"><b>DISINI</b></a>
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
	};
</script>
@endpush