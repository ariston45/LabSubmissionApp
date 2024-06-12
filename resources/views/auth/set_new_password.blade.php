
@extends('auth.auth_layout')
@section('content')
<div style="text-align: center;">
	<strong>Setel Password Baru</strong>
</div>
<div>
	<p>Masukkan password baru anda.</p>
</div>
<form role="form" method="POST" action="{{ route('set_new_pass_action') }}" autocomplete="off">
	{{ csrf_field() }}
	<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
		<label>Password Baru</label>
		<input id="password" type="password" class="form-control" name="pass" autocomplete="new-password" required>
		<input type="hidden" value="{{ $token }}" name="reset_token">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	</div>
	<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
		<label>Konfirmasi Password Baru</label>
		<input id="password" type="password" class="form-control" name="confirm_pass" autocomplete="new-password" required>
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
@endpush