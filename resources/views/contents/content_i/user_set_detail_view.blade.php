@extends('layout.layout')
@section('title')
<title>Syahira CRM | Pengaturan User</title>
@endsection
@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row" >
				<div class="col-sm-6">
					<h1 class="m-0">Pengaturan User</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
						<li class="breadcrumb-item active">User</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<section class="content" style="font-size: 15px;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-default">
						<div class="card-header" >
							<h3 class="card-title" style="padding-top: 3px;">
								<i class="fas fa-list-alt mr-8"></i>
								Detail Data User
							</h3>
							<div class="float-right">
								<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-perbarui-data-user">
									<b> <i class="fas fa-edit" style="margin-right: 3px;"></i> Perbarui</b>
								</a>
								<a href="#" class="btn btn-primary btn-xs" id="btn-delete-data">
									<b> <i class="fas fa-trash-alt" style="margin-right: 3px;"></i> Hapus</b>
								</a>
								<a href="{{ url('setting/user') }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Close">
									<i class="fas fa-times-circle"></i>
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12" id="notif-failed-delete"></div>
								<div class="col-sm-3">
									<div class="text-center">
										@if ($init_user->image == null)
										<img class="custom-profile-user-img img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture">
										@else
										<img class="custom-profile-user-img img-fluid custom-img-circle" src="{{ url('storage/img_profile/'.$init_user->image) }}" alt="User profile picture">
										@endif
									</div>
									<div style="text-align: center;">
									</div>
								</div>
								<div class="col-sm-9">
									<strong>Nama Pengguna</strong>
									<p class="text-muted">
										@if ($init_user->username == null)
										-
										@else
										{{ $init_user->username }}
										@endif
									</p>
									<strong>Nama Lengkap</strong>
									<p class="text-muted">
										@if ($init_user->name == null)
										-
										@else
										{{ $init_user->name }}
										@endif
									</p>
									<strong>Email</strong>
									<p class="text-muted">
										@if ($init_user->email == null)
										-
										@else
										{{ $init_user->email }}
										@endif
									</p>
									<strong>Akses Pengguna</strong>
									<p class="text-muted">
										@if ($init_user->level == null)
										-
										@else
										{{ $init_user->level }}
										@endif
									</p>
									<strong>Phone Number</strong>
									<p class="text-muted">
										@if ($init_user->phone == null)
										-
										@else
										{{ $init_user->phone }}
										@endif
									</p>
									<strong>Address</strong>
									<p class="text-muted">
										@if ($init_user->address == null)
										-
										@else
										{{ $init_user->address }}
										@endif
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="modal-perbarui-data-user" style="padding-right: 17px;" aria-modal="true" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Large Modal</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="form-update-user" enctype="multipart/form-data" action="javascript:void(0)" autocomplete="new-password">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="text-center">
								@if ($init_user->image == null)
								<img id="defaultProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture">
								<img id="uploadProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture" style="display: none;">
								<img id="alreadyProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture" style="display: none;">
								@else
								<img id="defaultProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture" style="display: none;">
								<img id="uploadProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture" style="display: none;">
								<img id="alreadyProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/img_profile/'.$init_user->image) }}" alt="User profile picture">
								@endif
							</div>
							<div style="text-align: center;">
								<div class="custom-file">
									<input type="file" name="profile_photo" class="custom-file-input" id="customInputFile" accept="image/png, image/jpeg">
									<label class="btn btn-xs btn-default" for="customInputFile">Unggah Photo</label>
									<input type="hidden" id="param-profile-img" name="param_profile_img" value="">
									<button type="button" id="trash-profile-img" class="btn btn-xs btn-default" style="margin-bottom: 8px;"><i class="far fa-trash-alt "></i></button>
								</div>
							</div>
						</div>
						<div class="col-sm-9">
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="nama_pengguna">Nama Pengguna</label>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="init" value="{{ $init_user->id }}">
								<input name="username" value="{{ $init_user->username }}" class="form-control form-control-sm rounded-0" type="text"  placeholder="user_name" required>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="nama_lengkap">Nama Lengkap</label>
								<input name="fullname" value="{{ $init_user->name }}" class="form-control form-control-sm rounded-0" type="text"  placeholder="Nama Lengkap">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="akses_pengguna">Akses Pengguna</label>
								<select name="accesslevel" class="custom-select custom-select-i rounded-0" >
									@switch($init_user->level)
										@case('ADM')
										<option value="ADM" style="font-weight: bold;">Admin</option>
											@break
										@case('MGR')
										<option value="MGR" style="font-weight: bold;">Manager</option>
											@break
										@case('MKT')
										<option value="MKT" style="font-weight: bold;">Marketing</option>
											@break
										@case('TCL')
										<option value="TCL" style="font-weight: bold;">Technical</option>
											@break	
										@default
									@endswitch
									<option value="ADM">Admin</option>
									<option value="MGR">Manager</option>
									<option value="MKT">Marketing</option>
									<option value="TCL">Technical</option>
								</select>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Email</label>
								<input name="email" value="{{ $init_user->email }}" class="form-control form-control-sm rounded-0" type="email"  placeholder="xxx@example.com" autocomplete="off">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Nomor Telepon</label>
								<input name="phone" value="{{ $init_user->phone }}" class="form-control form-control-sm rounded-0" type="text"  placeholder="+00 - xxx - xxxx - xxxx" autocomplete="off">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Alamat</label>
								<input name="address" value="{{ $init_user->address }}" class="form-control form-control-sm rounded-0" type="text"  placeholder="Jl. xxx No. n" autocomplete="off">
							</div>
							<hr style="border-top: 2px dashed rgb(229, 229, 236); margin-bottom: 8px;">
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="password">Password</label>
								<div class="input-group">
									<div class="input-group-prepend toggle-password">
										<button type="button" class="btn btn-default btn-sm rounded-0" id="btn-switch-view"><i class="far fa-eye-slash"></i></button>
									</div>
									<input type="password" class="form-control form-control-sm rounded-0" id="password" name="password"  placeholder="password" autocomplete="new-password">
								</div>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="confirm-password">Konfirmasi Password</label>
								<div class="input-group">
									<div class="input-group-prepend toggle-password">
										<button type="button" class="btn btn-default btn-sm rounded-0" id="btn-switch-view"><i class="far fa-eye-slash"></i></button>
									</div>
									<input type="password" class="form-control form-control-sm rounded-0" id="confirm-password" name="confirm_password" placeholder="konfirmasi password" autocomplete="new-password">
								</div>
							</div>
						</div>
						<div class="col-sm-12" id="notif-failed-input"></div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default btn-xs custom-btn-modal" data-dismiss="modal">Tutup</button>
					<div class="float-right">
						<button id="action-reset" type="reset" class="btn btn-default btn-xs"><i class="far fa-trash-alt mr-8"></i>Batal</button>
						<button id="action-store" type="submit" class="btn btn-primary btn-xs"><i class="fas fa-save mr-8"></i>Simpan</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<style>
#customInputFile{
	display: none;
}
.custom-profile-user-img{
	border: 3px solid #dee3e9;
	margin: 0 auto;
	padding: 3px;
	width: 150px;
	margin-bottom: 15px;
}
.custom-profile-user-img-i{
	border: 3px solid #dee3e9;
	margin: 0 auto;
	padding: 0px;
	width: 120px;
	height: 120px;
	margin-bottom: 15px;
}
.custom-img-circle{
	border-radius: 20%;
}
.modal-header{
	padding: 12px;
}
.modal-body{
	padding: 12px;
	font-size: 14px;
}
.custom-btn-modal{
	margin: 0px;
}
.custom-btn-input-grup{
	padding: 1px 10px;
	border-radius: 0px;
}
.custom-select-i{
	height: calc(1.8125rem + 2px);
	padding: 0.25rem 0.5rem;
	font-size: .875rem;
	line-height: 1.5;
	border-radius: 0.2rem;
}
#swal2-title{
	padding-top: 6px;
}
#swal2-html-container{
	margin-top: 6px;
}
.swal2-actions{
	margin: 10px auto 0;
}
.any_test{
	margin-top: 10px;
}
.btn-custom{
	width: 60px;
	margin-right: 4px;
	margin-left: 4px;
}
.swal2-actions {
	margin: 1em auto 0;
}
</style>
@endpush
@push('script')
<script src="{{ url('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
$('#customInputFile').change(function() {
	readImgUrlAndPreview(this);
	function readImgUrlAndPreview(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#defaultProfileImage').hide();
				$('#alreadyProfileImage').hide();
				$('#uploadProfileImage').fadeIn('slow');
				$('#param-profile-img').val('CHANGE');
				$('#uploadProfileImage').attr('src', e.target.result);
			}
		};
		reader.readAsDataURL(input.files[0]);
	}
});
</script>
<script>
	$('.toggle-password').click(function(){
		var ico = $("i", this).attr("class");
		if (ico == "far fa-eye-slash") {
			$("i", this).removeClass("far fa-eye-slash");
			$("i", this).addClass("far fa-eye");
		}else{
			$("i", this).removeClass("far fa-eye");
			$("i", this).addClass("far fa-eye-slash");
		}
		let input = $(this).next();
		input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
	});
</script>
<script>
	$(document).ready(function (){
		$('#form-update-user').submit(function(e) {
			e.preventDefault();
			$.ajaxSetup({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
			});
			var formData = new FormData(this);
			var passwd = $("#password").val();
			var confirm_passwd = $("#confirm-password").val();
			if (passwd === confirm_passwd) {
				$.ajax({
					type: 'POST',
					url: "{{ route('store-update-user') }}",
					data: formData,
					cache:false,
					contentType: false,
					processData: false,
					success: function(data) {
						if (data.param == 1) {
							$('#modal-perbarui-data-user').modal('hide');
							Swal.fire({
								icon:'success',
								title: '<h5 style="margin-bottom:0px;">Berhasil!</h5>',
								html: '<div style="font-size:16px;">Data user berhasil diperbarui.</div>',
								buttonsStyling: false,
								customClass: {
									confirmButton: 'btn btn-primary btn-sm btn-block',
									loader: 'custom-loader',
									icon: 'any_test',
								},
							})
						}else{
							$('#notif-failed-input').html(data.message).fadeIn('slow');
						}
					}
				})
			}else{
				Swal.fire({
					icon:'warning',
					type: 'warning',
					title: '<h5>Oops... Password salah!</h5>',
					html: '<div style="font-size:16px;">Konfirmasi password yang anda inputkan tidak sesuai.<br>Inputkan kembali password dengan benar.</br></div>',
					buttonsStyling: false,
					customClass: {
						confirmButton: 'btn btn-primary btn-sm',
						loader: 'custom-loader'
					},
				})
			}
		});
	});
	$(document).ready(function (){
		var init = {{ $init_user->id }};
		$('#btn-delete-data').click(function(){
			Swal.fire({
				title: '<h5><b>Hapus User !</b></h5>',
				html: '<div style="font-size:16px;">Data yang terhapus tidak dapat dikembalikan, apakah anda yakin ?</div>',
				icon: 'warning',
				confirmButtonText: 'Iya',
				denyButtonText: 'Tidak',
				cancelButtonText: 'Batal',
				showDenyButton: false,
				showCancelButton: true,
				buttonsStyling: false,
				customClass: {
					confirmButton: 'btn bg-gradient-danger btn-sm btn-custom',
					cancelButton: 'btn bg-gradient-secondary btn-sm btn-custom',
					denyButton: 'btn bg-gradient-secondary btn-sm btn-custom',
					actions: 'group-actions',
				}
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "POST",
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: "{{ route('delete-user') }}",
            data: {
							"init": init
            },
						success: function(data) {
							if (data.param == 1) {
								window.location.href = "{{ url('setting/user') }}";
							}else{
								$('#notif-failed-delete').html(data.message).fadeIn('slow');
							}
            }
          })
				}
			})			
		});
	});
	$(document).ready(function (){
		@if ($init_user->image == null)
			$('#action-reset').click(function () {
				$('#uploadProfileImage').hide();
				$('#defaultProfileImage').fadeIn('slow');
				$('#notif-failed-input').fadeOut('slow');
			});
		@else
		$('#action-reset').click(function () {
				$('#uploadProfileImage').hide();
				$('#defaultProfileImage').hide();
				$('#notif-failed-input').fadeOut('slow');
				$('#alreadyProfileImage').fadeIn('slow');
			});	
		@endif
		$('#trash-profile-img').click(function(){
			$('#param-profile-img').val('REMOVE');
			$('#uploadProfileImage').hide();
			$('#alreadyProfileImage').hide();
			$('#defaultProfileImage').fadeIn('slow');
			$('#customInputFile').val(null);
			$('#notif-failed-input').fadeOut('slow');
		});
	});
</script>
@endpush