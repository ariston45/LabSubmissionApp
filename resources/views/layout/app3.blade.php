
@php
  actionEliminateSubmission();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SIPLAB | Landing</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link rel="icon" type="image/x-icon" href="{{ url('/public/assets/img/logo.png') }}">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('/public/assets/bootstrap5/vendor/bootstrap/css/bootstrap-grid.min.css') }}" rel="stylesheet">
  <link href="{{ url('/public/assets/bootstrap5/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('/public/assets/bootstrap5/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('/public/assets/bootstrap5/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('/public/assets/bootstrap5/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('/public/assets/bootstrap5/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="{{ url('/public/assets/bootstrap5/css/main.css') }}" rel="stylesheet">
  @stack('css')
</head>
<body>

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
        <h1 class="">SIPLAB</h1>
        {{-- <img src="{{ url('/public/assets/img/logo_unesa.png') }}"> --}}
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" @if (request()->is('/') == true) class="active" @endif >Beranda</a></li>
          <li><a href="{{ url('page-panduan') }}" @if (request()->is('page-panduan*') == true) class="active" @endif>Panduan</a></li>
          <li><a href="{{ url('page-laboratorium') }}" @if (request()->is('page-laboratorium*') == true) class="active" @endif >Laboratorium</a></li>
          <li><a href="{{ url('page-layanan') }}" @if (request()->is('page-layanan*') == true) class="active" @endif>Uji Lab</a></li>
          {{-- <li><a href="{{ url('page-kontak') }}" @if (request()->is('page-kontak*') == true) class="active" @endif>Kontak</a></li> --}}
          @if (authCheck()==true)
            <li><a href="{{ url('beranda') }}" @if (request()->is('beranda*') == true) class="active" @endif>Pengajuan</a></li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      @if (authCheck()==true)
      {{-- <a class="btn-getstarted" href="{{ url('logout') }}">Logout</a> --}}
      <a class="btn-getstarted" href="{{ url('logout') }}">logout</a>
      @else
      <a class="btn-getstarted" href="{{ url('login') }}">Login</a>
      @endif
    </div>
  </header>

  @yield('content')

  <footer id="footer" class="footer position-relative">
    <div class="container footer-top">
      <div class="row gy-4">

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1">SIPLAB</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ url('/public/assets/bootstrap5/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/public/assets/bootstrap5/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ url('/public/assets/bootstrap5/vendor/aos/aos.js') }}"></script>
  <script src="{{ url('/public/assets/bootstrap5/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('/public/assets/bootstrap5/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ url('/public/assets/bootstrap5/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ url('js/jquery-ui.min.js') }}"></script>
  <!-- Main JS File -->
  <script src="{{ url('/public/assets/bootstrap5/js/main.js') }}"></script>
  @stack('scripts')
</body>

</html>