
@extends('auth.auth_layout')
@section('content')
<div style="text-align: center;">
	<strong>Registrasi Berhasil</strong>
</div>
<div style="text-align: center;">
	<p>Selamat registrasi anda berhasil. Jika alamat email anda aktif, anda akan memperoleh email untuk aktivasi akun.</p>
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