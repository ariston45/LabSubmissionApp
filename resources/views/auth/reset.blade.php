
@extends('auth.auth_layout')
@section('title')
	Reset Password
@endsection
@section('content')
<div style="text-align: center;">
	<strong>Reset Password</strong>
	</div>
	<div>
	<p>Masukkan alamat email terdaftar Anda. Kami akan mengirimkan email dengan tautan reset password ke alamat email tersebut. 
		Pastikan untuk memeriksa folder spam atau surel sampah jika Anda tidak menerima email dalam beberapa menit.
	Klik tautan yang diberikan dalam email untuk mengatur kata sandi baru Anda.</p>
	</div>
	<form role="form" method="POST" action="{{ route('reset_action') }}" autocomplete="off">
	{{ csrf_field() }}
	<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
		<label>Email</label>
		<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email"  autocomplete="new-password" required>
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback">
		<label>Captcha</label>
		<div class="row" style="margin-bottom: 5px;">
			<div class="col-sm-4">
				<span id="captcha-img">{!! captcha_img() !!}</span>
			</div>
			<div class="col-sm-8">
				<button type="button" class="btn btn-sm btn-default btn-flat " onclick="actReload()" style="margin-left: 8px;"><i class="fa fa-refresh" aria-hidden="true" ></i></button>
			</div>
		</div>
		<input id="captcha" type="text" class="form-control" name="captcha" placeholder="Masukkan captcha" autocomplete="new-password" captcha>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<button type="submit" class="btn btn-sm btn-primary btn-block btn-flat" style="margin-bottom: 10px;margin-top: 10px;">Kirim</button>
		</div>
	</div>
	</form>
	<div>
	@if (\Session::has('msg'))
	<div class="alert alert-success">
		{!! \Session::get('msg') !!}
	</div>
	@endif
	</div>
	<hr class="mt-1">
	<div style="text-align: center;">
	<span style="text-align: center;">
		<a href="{{ url('login') }}"><b>Kembali ke login</b></a>
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
			function actReload() {
				$.ajax({
					type: 'GET',
					url: '{{ route("reload_captcha") }}',
					success: function (data) {
						$("#captcha-img").html(data.captcha);
					}
				});
			}
		</script>
@endpush