
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
		<title>Registrasi | Approving System</title>
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
      .login-box{
        margin-top: 35px;
      }
		</style>
	</head>
	<body class="bg-primary">
		<div class="login-box" >
			<div class="login-box-body">
				{{-- <div class="login-logo">
					<a href="{{ url('/') }}">
						<img id="image_logo" src="{{ url('/public/assets/img/logo_unesa.png') }}" alt="Logo Tenant"> 
					</a>
				</div> --}}
        <div style="text-align: center;">
          <strong>REGISTRASI</strong>
        </div>
				<hr>
				<form role="form" method="POST" action="{{ route('register-action') }}" autocomplete="off">
					{{ csrf_field() }}
					<div class="form-group has-feedback {{ $errors->has('no_id') ? ' has-error' : '' }}">
						<label>Nomor Identitas (NIK/NIM/ID)</label>
						<input id="nomor-id" type="text" class="form-control" name="no_id" value="{{ old('no_id') }}" autocomplete="new-password">
						@if ($errors->has('no_id'))
						<span style="color: red;"><i>{{ $errors->first('no_id') }}</i></span>
						@endif
					</div>
          <div class="form-group has-feedback {{ $errors->has('level') ? ' has-error' : '' }}">
						<label>Pilih Status</label>
            <select class="form-control" name="level">
							<option value="{{ null }}"></option>
              <option value="STUDENT" @if (old('level') == 'STUDENT') selected @endif >Mahasiswa Fakultas Teknik</option>
              <option value="PUBLIC_MEMBER" @if (old('level') == 'PUBLIC_MEMBER') selected @endif>Umum Anggota Universitas</option>
              <option value="PUBLIC_NON_MEMBER" @if (old('level') == 'PUBLIC_NON_MEMBER') selected @endif>Umum Non-Anggota Universitas</option>
            </select>
						@if ($errors->has('level'))
						<span style="color: red;"><i>{{ $errors->first('level') }}</i></span>
						@endif
					</div>
          <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Nama Lengkap</label>
						<input id="name-id" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="new-password">
						@if ($errors->has('name'))
						<span style="color: red;"><i>{{ $errors->first('name') }}</i></span>
						@endif
					</div>
					<div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
						<label>Email</label>
						<input id="email-id" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="new-password">
						@if ($errors->has('email'))
						<span style="color: red;"><i>{{ $errors->first('email') }}</i></span>
						@endif
					</div>
					<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="">Password</label>
						<input id="password-id" type="password" class="form-control" name="password" autocomplete="new-password">
						@if ($errors->has('password'))
						<span style="color: red;"><i>{{ $errors->first('password') }}</i></span>
						@endif
					</div>
          <div class="form-group has-feedback {{ $errors->has('password_confirm') ? ' has-error' : '' }}" autocomplete="new-password">
						<label for="">Konfirmasi Password</label>
						<input id="retype-password-id" type="password" class="form-control" name="password_confirm" >
						@if ($errors->has('password_confirm'))
						<span style="color: red;"><i>{{ $errors->first('password_confirm') }}</i></span>
						@endif
					</div>
					<div class="row">
						<div class="col-md-5">
							<div class="checkbox">
								<label>
									<input id="check-password" type="checkbox" name="showpass" onclick="actionShowPass()" {{ old('showpass') ? 'checked' : '' }}> Show Password
								</label>
							</div>
						</div>
            <div class="col-md-7" style="text-align: right;">
              <div class="alert alert-danger" id="notif" style="display: none; margin: 0 auto 10px"></div>
              <div id="wrap-btn">
                <button type="reset" class="btn btn-flat btn-sm btn-default" id="batal">Bersihkan</button>
                <button type="submit" class="btn btn-flat btn-sm btn-primary" id="save">Simpan</button>
              </div>
            </div>
            {{-- <div class="col-lg-6 col-sm-0">
            </div>
            <div class="col-lg-3 col-sm-6">
              <button type="submit" class="btn btn-block btn-sm btn-primary btn-block btn-flat" style="margin-bottom: 10px;margin-top: 10px;">Batal</button>
            </div>
						<div class="col-lg-3 col-sm-6">
              <button type="submit" class="btn btn-block btn-sm btn-primary btn-block btn-flat pull-right" style="margin-bottom: 10px;margin-top: 10px;">Simpan</button>
						</div> --}}
					</div>
				</form>
				<hr>
				<div style="text-align: center;">
					<span style="text-align: center;">
						<a href="{{ url('login') }}"><b>Kembali Ke Login</b></a>
					</span>
				</div>
			</div>
		</div>
		<script src="{{ url('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
		<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
		{{-- <script src="{{ url('assets/plugins/iCheck/icheck.min.js') }}"></script> --}}
		<script>
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
				});
			});
		</script>
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
		</script>
	</body>
</html>