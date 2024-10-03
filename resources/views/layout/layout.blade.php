@php
	use App\Http\Controllers\ProfileController;
	$user = ProfileController::IdenUser();
	$menus = ProfileController::IdenMenu();
@endphp
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@yield('title')
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('plugins/bootstrap4/css/bootstrap.min.css') }}"> --}}
	<link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
	<link rel="stylesheet" href="{{ url('plugins/jqvmap/jqvmap.min.css') }}">
	<link rel="stylesheet" href="{{ url('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<link rel="stylesheet" href="{{ url('plugins/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" href="{{ url('plugins/summernote/summernote-bs4.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('customs/css/custom1.css') }}"> --}}
	<link rel="stylesheet" href="{{ url('customs/css/custom_layout.css') }}">
	@stack('css')
</head>
<body class="sidebar-mini control-sidebar-slide-open layout-navbar-fixed layout-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand border-bottom-0 text-sm bg-primary navbar-light bg-navy">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: whitesmoke;"></i></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" style="color: whitesmoke;">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					@if ($user->image == null)
						<img id="img-user-profile" src="{{ url('storage/user_default.png') }}" alt="User Image">
					@else
						<img id="img-user-profile" src="{{ url('storage/img_profile/' . $user->image) }}"
							alt="User Image">
					@endif
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#" role="button" style="color: whitesmoke;">
						<b>{{ $user->username }}</b>
					</a>
				</li>
				<li class="nav-item">
					<a type="button" class="nav-link" href="{{ route('logout') }}" role="button"
						data-toggle="tooltip" data-placement="bottom" title="Sign Out" style="color: whitesmoke;">
						<i class="fas fa-sign-out-alt"></i>
					</a>
				</li>
			</ul>
		</nav>
		<aside class="main-sidebar sidebar-dark-warning elevation-4 nav-compact nav-child-indent">
			<span class="display-logo">
				<div class="logo-panel">
					<div class="image custom-logo" style="text-align: center">
						<img src="">
					</div>
				</div>
				<text id="logo_name" class="logo-name logo-lg" >UNESA</text>
			</span>
			<div class="sidebar">
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						@foreach ($menus as $menu)
							<li
								@if (request()->is($menu->mn_slug . '*') == true) class="nav-item menu-open" @else  class="nav-item " @endif>
								<a @if (count($menu->children)) href="#" @else href="{{ url($menu->mn_slug) }}" @endif
									@if (request()->is($menu->mn_slug . '*') == true) class="nav-link active" @else class="nav-link" @endif>
									{{-- <i class="{{ $menu->mn_icon_code }} nav-icon"></i> --}}
									<img src="{{ url('image/' . $menu->mn_icon_code) }}" class="nav-icon" alt="nav-icon">
									<p>{{ $menu->mn_title }} @if (count($menu->children))
											<i class="right fas fa-angle-left"></i>
										@endif
									</p>
								</a>
								@if (count($menu->children))
									<ul class="nav nav-treeview">
										@include('layout.submenu', ['childs' => $menu->children])
									</ul>
								@endif
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</aside>
		@yield('content')
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer>
	</div>
	{{-- <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script> --}}
	<script src="{{ url('plugins/jquery/jquery-3.6.0.min.js') }}"></script>
	{{-- <script src="{{ url('plugins/jquery/jquery-3.6.0.slim.min.js') }}"></script> --}}
	<script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ url('plugins/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ url('plugins/moment/moment.min.js') }}"></script>
	<script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
	<script src="{{ url('dist/js/adminlte.js') }}"></script>
	{{-- <script>
  $.widget.bridge('uibutton', $.ui.button)
</script> --}}
	@stack('script')
</body>
</html>
