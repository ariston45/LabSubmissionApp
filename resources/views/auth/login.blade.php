
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<meta name="description" content=""/>
		<meta name="author" content=""/>
		<title>Login || Approving System</title>
		<link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/dist/css/AdminLTE.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/iCheck/square/blue.css') }}">
		<style>
			.img-login{
				margin-left: 7%;
				margin-top: 7%;
				margin-left: auto;
			}
			#image_logo{
				height: 100px;
				margin-bottom: 10px;
			}
			.login-logo{
				font-size: 20px;
			}
		</style>
	</head>
	<body class="bg-primary">
		<div class="login-box" style="">
			<div class="login-box-body">
				<div class="login-logo">
					<a href="{{ url('/') }}">
						<img id="image_logo" src="{{ url('/public/assets/img/logo_unesa.png') }}" alt="Logo Tenant"> 
					</a>
				</div>
				<hr>
				
				<form role="form" method="POST" action="{{ route('login-action') }}">
					{{ csrf_field() }}
					<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="">Email</label>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
						{{-- <label for="">Username (NIM/NIK/No.ID)</label> --}}
						{{-- <input id="username-id" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus> --}}
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						@if ($errors->has('email'))
						<span style="color: red;"><i>{{ $errors->first('email') }}</i></span>
						@endif
					</div>
					<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="">Password</label>
						<input id="password-id" type="password" class="form-control" name="password" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						@if ($errors->has('password'))
						<span style="color: red;"><i>{{ $errors->first('password') }}</i></span>
						@endif
					</div>
					<div class="row">
						<div class="col-xs-8">
							<div class="checkbox icheck">
								<label>
									<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Tampilkan Password
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
			</div>
		</div>
		<script src="{{ url('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
		<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ url('assets/plugins/iCheck/icheck.min.js') }}"></script>
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
				});
			});
		</script>
	</body>
</html>