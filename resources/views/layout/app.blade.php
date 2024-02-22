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
          <a href="#" class="time-sidebar" role="button">
          <span style="font-size: 10px">Waktu Server</span><br> <b><span id="digital-time"></span></b>
          </a>
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
            <text id="logo_name" class="logo-name logo-lg" >UNESA</text>
          </span>
          <ul class="sidebar-menu">
            <li class="header">Daftar Menu</li>
            @foreach ($menus as $menu)
            <li class="@if (count($menu->children)) treeview @endif @if (request()->is($menu->mn_slug . '*') == true) active @endif" >
              <a @if (count($menu->children)) href="#" @else href="{{ url($menu->mn_slug)}}" @endif>
                <i class="fa fa-institution"></i> 
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
        <section class="content-header">
          @yield('breadcrumb')
        </section>
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
    <script>
      var x = waktu();
      function waktu() {
        const days = ['Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
        const months = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        const nowTime = new Date();
        const clockTime = nowTime.toLocaleTimeString('en-GB', {timeZone: 'Asia/Jakarta'});
        const dayIndex = nowTime.getDay();
        const dayName = days[dayIndex];
        const date = nowTime.getDate();
        const monthIndex = nowTime.getMonth();
        const monthName = months[monthIndex];
        const year = nowTime.getFullYear();
        document.getElementById("digital-time").innerHTML = dayName+', '+date+' '+monthName+'/'+year+', '+clockTime+"s WIB";
        setTimeout("waktu()", 1000);
      }
    </script>
    @stack('scripts')
  </body>
</html>
