
@extends('layout.app3')
@section('title')
Lab management | Dashboard
@endsection
@section('content')
<main class="main">
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Panduan Registrasi</h1>
            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('page-laboratorium') }}">Panduan</a></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->
  <section id="about" class="about section">
    <div class="container">
      <div class="row">
        <div class="col-12" style="text-align: center;margin-bottom: 20px;">
          <h3>Panduan Untuk Mahasiswa</h3>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player1" playsinline controls>
              <source src="{{ url('/public/assets/video/panduan_1_umum.mp4') }}" type="video/mp4" />
              <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default />
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Web Development</p>
                <p class="price">$169</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player2" playsinline controls>
              <source src="{{ url('/public/assets/video/panduan_2_student.mp4') }}" type="video/mp4" />
              <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default />
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Web Development</p>
                <p class="price">$169</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row gy-4">
        <div class="col-md-12 order-1 order-lg-2" style="color: aliceblue">
          <div class="mb-3">
          </div>
          <ol type="A">
            <li style="margin-bottom: 30px;"> <b>Panduan Pengguna User Umum</b> <br>
             
            </li>
            <li style="margin-bottom: 30px;">
              <b>Panduan Pengguna User Mahasiswa FT</b> <br>
              
            </li>
            <li>
              Download Panduan PDF. <a href="{{ url('/public/assets/img/panduan.pdf') }}"> <label class="label label-default">Panduan.pdf</label></a>
            </li>
          </ol>
          {{-- <div class="pb-4" style="text-align: center;">
            <img src="{{ url("/public/assets/img/Panduan_ft.jpg") }}" style="max-width: 900px;" alt="">
          </div> --}}
          {{-- <b>Panduan Registrasi</b> <br>
          <ol>
            <li>Klik tombol login pada pojok kanan atas</li>
            <li>
              Pilih menu link Daftar disini <br>
              <img src="{{ url("/public/assets/img/reg_menu.PNG") }}" style="max-width: 300px;" alt=""> <br> <br>
            </li>
            <li>
              Isi Form registrasi yang tersedia, harap isikan sesuai dengan status anda. <br>
              <img src="{{ url("/public/assets/img/reg_menu_2.PNG") }}" style="max-width: 300px;" alt=""> <br> <br>
            </li>
            <li>
              Selanjutnya klik simpan, dan registrasi selesai.
            </li>
          </ol> --}}
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('css')
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
  <style>
    .plyr__video-wrapper,
    .plyr__audio-wrapper {
      width: 100%; /* Atur lebar sesuai kebutuhan, misalnya 100% */
      height: 300px; /* Atur tinggi sesuai kebutuhan */
      max-width: 600px; /* Atur batas lebar maksimal */
      margin: 0 auto; /* Untuk memposisikan player di tengah */
    }
  </style>
@endpush
@push('scripts')
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script>
    const player1 = new Plyr('#player1');
    const player2 = new Plyr('#player2');
  </script>
@endpush