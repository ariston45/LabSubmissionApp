@php
  use App\Http\Controllers\ProfileController;
	$user = ProfileController::IdenUser();
	$menus = ProfileController::IdenMenu();
@endphp
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPLAB | Aplikasi</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/public/assets/img/logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/remixicon4/remixicon.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/ionicons-2.0.1/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/iCheck/flat/blue.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/sweetalert-master/themes/facebook/facebook.css') }}">
    <link rel="stylesheet" href="{{ url('assets/plugins/sweetalert2-1.0.5/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/customs/css/custom_layout.css') }}">
    <style>
      .navbar-custom-menu-left{
        float: left;
      }
      .nav-custom {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #0d0f10;
      }
      .nav-custom>li {
        float: left;
      }
      .nav-custom>li>a {
        display: block;
        color: white;
        text-align: center;
        padding: 15px;
        text-decoration: none;
      }
    </style>
    @stack('css')
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        @yield('logo-mobile')
        <nav class="navbar navbar-static-top">
          <a href="#" onclick="hide_logo_func()" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          {{-- <a href="#" class="time-sidebar" role="button">
            <span style="font-size: 10px">Waktu Server</span><br> <b><span id="digital-time"></span></b>
          </a> --}}
          <div class="navbar-custom-menu-left">

            <ul class="nav-custom navbar-nav-custom">
              <li><a href="{{ url('page-panduan')}}" @if (request()->is('page-panduan*') == true) class="active" @endif>Panduan</a></li>
              {{-- <li><a href="{{ url('page-panduan/'.$user->level) }}" @if (request()->is('page-panduan*') == true) class="active" @endif>Panduan</a></li> --}}
              <li class="active"><a href="{{ url('page-laboratorium') }}">Laboratorium <span class="sr-only">(current)</span></a></li>
              <li><a href="{{ url('page-layanan') }}">Uji Lab</a></li>
            </ul>
          </div>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(DataAuth()->image != "")
                    <img src="" class="user-image" alt="User Image">
                  @else
                    <img src="{{ url('/public/assets/img/userimg_i.png') }}" class="user-image" alt="User Image">
                  @endif
                  <span class="hidden-xs">{{ DataAuth()->name }}</span>
                </a>
              </li>
              <li class="dropdown user user-menu">
                <a href="{{ route('logout') }}" class="dropdown-toggle" data-toggle="">
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
                  <span class="hidden-xs">Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <span id="display-logo" class="display-logo">
            <div class="logo-panel">
              <div class="image custom-logo" style="text-align: center;">
                <img src="{{ url('/public/assets/img/logo_unesa.png') }}">
              </div>
            </div>
            <text id="logo_name" class="logo-name logo-lg" >FAKULTAS TEKNIK</text>
          </span>
          <ul class="sidebar-menu">
            <li class="header">Daftar Menu</li>
            @foreach ($menus as $menu)
            <li class="@if (count($menu->children)) treeview @endif @if (request()->is($menu->mn_slug . '*') == true) active @endif" >
              <a @if (count($menu->children)) href="#" @else href="{{ url($menu->mn_slug)}}" @endif>
                {{-- <i class="fa fa-institution"></i>  --}}
                <i class="{{ $menu->mn_icon_code }}" style="margin-right: 4px"></i>
                <span>{{ $menu->mn_title }} </span>
                @if (count($menu->children)) <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> @endif
              </a>
              @if (count($menu->children))
              <ul class="treeview-menu">
                @include('layout.submenu', ['childs' => $menu->children])
              </ul>
              @endif
            </li>
            @endforeach      
          </ul>
        </section>
      </aside>
      <div class="content-wrapper">
        @if (request()->is('beranda') == false)
        <section class="content-header">
          @yield('breadcrumb')
        </section>
        @endif
        <section class="content">
          <div class="row">
            @yield('content')
          </div>
        </section>
      </div>
      <footer class="main-footer">
        {{-- <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2016-{{ date('Y') }} <a href="#" target="_blank">Trust Train</a>.</strong> All rights
        reserved. --}}
      </footer>
    </div>
    <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('js/jquery-ui.min.js') }}"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/dist/js/moment.min.js') }}"></script>
    <script src="{{ url('assets/dist/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ url('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('assets/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ url('assets/dist/js/app.js') }}"></script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $(".numOnly").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
          (e.keyCode >= 35 && e.keyCode <= 40)) {
            return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    </script>
    <script>
      function hide_logo_func() {
        var x = document.getElementById("logo_name");
        var y = document.getElementById("display-logo");
        var width = screen.width;
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
        if (y.style.display === "none") {
          y.style.display = "block";
        } else {
          y.style.display = "none";
        }
      }
    </script>
    @stack('scripts')
  </body>
</html>
