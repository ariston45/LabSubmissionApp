
@extends('auth.auth_layout')
@section('content')
<div style="text-align: center; margin-bottom: 30px;">
	<h3>Registrasi Berhasil</h3>
</div>
<div style="text-align: center; margin-bottom: 30px;">
	@if ($data['param'] == true)
		<img src="{{ url('/public/assets/img/success.png') }}" alt="" style="max-width: 60px;">
	@else
		<img src="{{ url('/public/assets/img/cancel.png') }}" alt="" style="max-width: 60px;">
	@endif
</div>
<div style="text-align: center;">
	<p>{{ $data['msg'] }}</p>
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