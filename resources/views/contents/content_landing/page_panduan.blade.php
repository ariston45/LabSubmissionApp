
@extends('layout.app3')
@section('title')
SIPLAB | Dashboard
@endsection
@section('content')
<main class="main">
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Panduan Penggunaan</h1>
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
              <source src="{{ url('assets/video/mahasiswa_pinjam_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Peminjaman Lab. Untuk Mahasiswa</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player2" playsinline controls>
              <source src="{{ url('assets/video/mahasiswa_sewa_alat.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Penyewaan Alat Lab. Untuk Mahasiswa</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player3" playsinline controls>
              <source src="{{ url('assets/video/mahasiswa_uji_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Uji Laboratorium Untuk Mahasiswa</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12" style="text-align: center;margin-bottom: 20px;">
          <h3>Panduan Untuk Dosen</h3>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player4" playsinline controls>
              <source src="{{ url('assets/video/dosen_pinjam_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Pengajuan Peminjaman Lab. Untuk Dosen</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player5" playsinline controls>
              <source src="{{ url('assets/video/dosen_sewa_alat.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Penyewaan Alat Lab. Untuk Dosen</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player6" playsinline controls>
              <source src="{{ url('assets/video/dosen_uji_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Uji Laboratorium Untuk Dosen</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12" style="text-align: center;margin-bottom: 20px;">
          <h3>Panduan Untuk Pengguna Umum</h3>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player7" playsinline controls>
              <source src="{{ url('assets/video/umum_pinjam_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Peminjaman Lab. Untuk Pengguna Umum</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player8" playsinline controls>
              <source src="{{ url('assets/video/umum_sewa_alat.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Penyewaan Alat Lab. Untuk Umum</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="course-item">
            {{-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> --}}
            <video id="player9" playsinline controls>
              <source src="{{ url('assets/video/umum_uji_lab.mp4') }}" type="video/mp4" />
              {{-- <track kind="captions" label="English captions" src="MY_CAPTIONS.vtt" srclang="en" default /> --}}
            </video>
            <div class="course-content mt-3" style="width: 100%">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <p class="category">Panduan Uji Laboratorium Untuk Umum</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12" style="text-align: center;margin-bottom: 20px;">
          <h3>Panduan Modul PDF Untuk Pengguna</h3>
          Download Panduan PDF. <a href="{{ url('assets/docs/Panduan_SIPLAB.pdf') }}"> <label class="label label-default">Panduan.pdf</label></a>
          
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('css')
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css">
  {{-- <style>
    .plyr__video-wrapper,
    .plyr__audio-wrapper {
      width: 100%; /* Atur lebar sesuai kebutuhan, misalnya 100% */
      height: 300px; /* Atur tinggi sesuai kebutuhan */
      max-width: 600px; /* Atur batas lebar maksimal */
      margin: 0 auto; /* Untuk memposisikan player di tengah */
    }
  </style> --}}
@endpush
@push('scripts')
  <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
  <script>
    const player1 = new Plyr('#player1');
    const player2 = new Plyr('#player2');
    const player3 = new Plyr('#player3');
    const player4 = new Plyr('#player4');
    const player5 = new Plyr('#player5');
    const player6 = new Plyr('#player6');
    const player7 = new Plyr('#player7');
    const player8 = new Plyr('#player8');
    const player9 = new Plyr('#player9');
  </script>
@endpush