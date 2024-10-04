
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
		<title>SIPLAB || @yield('title')</title>
		<link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
		<link rel="stylesheet" href="{{ url('assets/dist/css/AdminLTE.css') }}">
		<link rel="stylesheet" href="{{ url('assets/plugins/iCheck/square/blue.css') }}">
		<link rel="stylesheet" href="{{ url('assets/customs/css/custom_layout.css') }}">
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
			.login-box, .register-box{
				width: 540px;
				margin: 2% auto;
			}
		</style>
	</head>
	<body class="bg-primary">
		<div class="login-box" style="">
			<div class="login-box-body">
				<div class="login-logo">
					<a href="{{ url('/') }}">
						<img id="image_logo" src="{{ url('assets/img/logo_unesa.png') }}" alt="Logo Tenant"> 
					</a>
				</div>
				<hr>
        @yield('content')
			</div>
		</div>
		<div style="margin-top: 10px;">
		</div>
		<script src="{{ url('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
		<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
	</body>
</html>