
@extends('auth.auth_layout')
@section('content')
<div style="text-align: center;">
	<strong>Setel Password Baru</strong>
</div>
<div style="text-align: center;">
	<p>Mohon maaf, sesi reset password telah habis. <br> Silahkan ulangi kembali.</p>
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
