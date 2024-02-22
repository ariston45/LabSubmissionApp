@extends('layout.layout')
@section('title')
<title>Syahira CRM | Pengaturan User</title>

@endsection
@section('content')
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
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
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-default">
						<div class="card-header">
							<h3 class="card-title" style="margin-top: 4px;"> <i class="fas fa-table mr-8"></i> Data User</h3>
							<div class="float-right">
								<a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-perbarui-data-user">
									<b> <i class="fas fa-plus cst-mr-5" ></i> User Baru</b>
								</a>
							</div>
						</div>
						<div class="card-body">
							<table id="tabel_user" class="table table-bordered table-my-customs" style="width: 100%">
								<thead>
									<tr>
										<th style="width: 10px">No</th>
										<th>Full Name</th>
										<th>Username</th>
										<th>Email</th>
										<th style="width: 40px">Menu</th>
									</tr>
								</thead>
							</table>
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
				<h6 class="modal-title">Form User Baru</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form id="form-update-user" enctype="multipart/form-data" action="javascript:void(0)" autocomplete="new-password">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="text-center">
								<img id="defaultProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture">
								<img id="uploadProfileImage" class="custom-profile-user-img-i img-fluid custom-img-circle" src="{{ url('storage/user_default.png') }}" alt="User profile picture" style="display: none;">
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
								<input name="username" value="" class="form-control form-control-sm rounded-0" type="text"  placeholder="Nama Pengguna" required>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="nama_lengkap">Nama Lengkap</label>
								<input name="fullname" value="" class="form-control form-control-sm rounded-0" type="text"  placeholder="Nama Lengkap" required>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="akses_pengguna">Akses Pengguna</label>
								<select name="accesslevel" class="custom-select custom-select-i rounded-0" >
									<option value="ADM">Admin</option>
									<option value="MGR">Manager</option>
									<option value="MKT">Marketing</option>
									<option value="TCL">Technical</option>
								</select>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Email</label>
								<input name="email" value="" class="form-control form-control-sm rounded-0" type="email"  placeholder="xxx@example.com" autocomplete="new_password">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Nomor Telepon</label>
								<input name="phone" value="" class="form-control form-control-sm rounded-0" type="text"  placeholder="+00 - xxx - xxxx - xxxx" autocomplete="new_password">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="email">Alamat</label>
								<input name="address" value="" class="form-control form-control-sm rounded-0" type="text"  placeholder="Jl. xxx No. n" autocomplete="new_password">
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="password">Password</label>
								<div class="input-group">
									<div class="input-group-prepend toggle-password">
										<button type="button" class="btn btn-default btn-sm rounded-0 btn-switch-view" id=""><i class="far fa-eye-slash"></i></button>
									</div>
									<input type="password" class="form-control form-control-sm rounded-0" id="password" name="password"  placeholder="password" autocomplete="new-password" required>
								</div>
							</div>
							<div class="form-group form-group-custom">
								<label class="label-form-control" for="confirm-password">Konfirmasi Password</label>
								<div class="input-group">
									<div class="input-group-prepend toggle-password">
										<button type="button" class="btn btn-default btn-sm rounded-0 btn-switch-view" id=""><i class="far fa-eye-slash"></i></button>
									</div>
									<input type="password" class="form-control form-control-sm rounded-0" id="confirm-password" name="confirm_password" placeholder="konfirmasi password" autocomplete="new-password" required>
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
<link rel="stylesheet" href="{{ url('plugins/datatables-builds/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-builds/resposive/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-builds/datatables/css/rowReorder.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ url('customs/css/custom-datatables.css') }}">
<link rel="stylesheet" href="{{ url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<style>
	.dropdown-menu{
		padding-top: 6px;
		padding-bottom: 6px;
	}
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
</style>
@endpush
@push('script')
<script src="{{ url('plugins/datatables-builds/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-builds/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-builds/resposive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-builds/resposive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
$(document).ready(function (){
	var id;
	tabel_user = $('#tabel_user').DataTable({
		processing: true,serverSide: true,responsive: true,lengthChange: true,
		ajax: {
			'url': '{!! route("source-data-user") !!}',
			'type': 'POST',
			'data': {
				'_token': '{{ csrf_token() }}',
				'id' : id
			} 
		},
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable:false},
			{data: 'name', name: 'name', orderable: true, searchable: true },
			{data: 'username', name: 'username', orderable: false, searchable: true },
			{data: 'email', name: 'email', orderable: true, searchable: true },
			{data: 'menu', name: 'menu', orderable: true, searchable: false },
		]
	}),
	$('#save').click(function() {
		$('#notif').hide();
		var formData = $('#form-tambah-siswa').serialize();
		$.ajax({
			type: 'POST',
			url: "{{ url('crud/create-grup-anggota') }}",
			data: formData,
			success: function(data) {
				if (data == 1) {
					swal(
						'Berhasil!',
						'Data guru berhasil disimpan.',
						'success'
					)
					tabel_user.ajax.reload();
				}else{
					$('#notif').html(data).show();
					$('#frame-notif').show();
				}
			}
		})
	});
});
</script>
<script>
	$('#customInputFile').change(function() {
		readImgUrlAndPreview(this);
		function readImgUrlAndPreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#defaultProfileImage').hide();
					$('#uploadProfileImage').fadeIn('slow');
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
				url: "{{ route('store-user') }}",
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
$('#action-reset').click(function () {
	$('#uploadProfileImage').hide();
	$('#defaultProfileImage').fadeIn('slow');
	$('#notif-failed-input').fadeOut('slow');
});
$('#trash-profile-img').click(function(){
	$('#uploadProfileImage').hide();
	$('#defaultProfileImage').fadeIn('slow');
	$('#customInputFile').val(null);
	$('#notif-failed-input').fadeOut('slow');
	});
});
</script>
@endpush