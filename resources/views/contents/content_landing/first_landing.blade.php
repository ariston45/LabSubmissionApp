
@extends('layout.app3')
@section('title')
SIPLAB | Dashboard
@endsection
@section('content')
<main class="main">
  <section id="welcome-img" class="hero section">
    <img src="{{ url('assets/img/ft_unesa.png') }}" alt="" data-aos="fade-in">
    <div class="container">
      <h2 data-aos="fade-up" data-aos-delay="100" class="">Selamat Datang,<br>di Sistem Informasi Peminjaman Laboratorium</h2>
      <p data-aos="fade-up" data-aos-delay="200">Fakultas Teknik Universitas Negeri Surabaya</p>
      <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
        <a href="#about-app-title" class="btn-get-started">Get Started</a>
      </div>
    </div>
  </section>
  <div id="about-app-title"></div>
  <section id="about-institution" class="about section" style="background-color: aliceblue; color: black;">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-12 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-12 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3 style="color: #0b4d70;">Fakultas Teknik Universitas Negeri Surabaya</h3>
          <p>Fakultas Teknik Universitas Negeri Surabaya (Unesa) merupakan salah satu fakultas yang berada di bawah naungan Unesa, sebuah perguruan tinggi negeri di Surabaya, Jawa Timur. 
            Fakultas ini didirikan pada tahun 1962 dan telah berkembang menjadi salah satu fakultas teknik terkemuka di Indonesia.</p>
            <a href="{{ url('page-about-unesa') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3 style="color: #0b4d70;">Laboratorium Fakultas Teknik</h3>
          <p>
            Laboratorium merupakan sarana dan prasarana penting bagi pendidikan teknik dan bidang teknik. Di sinilah teori dan praktik bertemu, 
            di mana mahasiswa serta masyarakat umum dapat mengaplikasikan pengetahuan mereka dan mengembangkan keterampilan teknis yang dibutuhkan untuk memecahkan berbagai permasalahan guna menemukan solusi.
          </p>
          <p>Fakultas Teknik Unesa memiliki berbagai laboratorium yang lengkap dan modern untuk mendukung kegiatan praktikum dan penelitian bagi para mahasiswa maupun pihak umum. Laboratorium-laboratorium ini tersebar di beberapa jurusan.</p>
        </div>
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/lab_fak_teknik_unesa.jpeg" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>
  <section id="about-app" class="about section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-12 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
          <h3>Sistem Informasi Peminjaman Laboratorium Fakultas teknik</h3>
          <p class="fst-italic">
            Di tengah dinamika perkembangan teknologi informasi, Fakultas Teknik Universitas Negeri Surabaya (Unesa) memperkenalkan
            sebuah sistem informasi peminjaman laboratorium yang bertujuan untuk meningkatkan efisiensi dan efektivitas pengelolaan
            laboratorium serta layanan kepada pengguna.
            Sistem ini tidak hanya mempermudah proses peminjaman, tetapi juga mengoptimalkan penggunaan sumber daya dan fasilitas
            yang tersedia.
          </p>
          <a href="{{ url('page-about-app') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </section>
  <section id="counts" class="section counts">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6 m-0">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{ $count_lab }}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="titlecounter">Laboratorium</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 m-0">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{ $count_labtest }}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="titlecounter">Layanan Uji Lab</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 m-0">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{ $count_facility }}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="titlecounter">Fasilitas dan Alat</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 m-0">
          <div class="stats-item text-center w-100 h-100">
            <span data-purecounter-start="0" data-purecounter-end="{{ $count_technician }}" data-purecounter-duration="1" class="purecounter"></span>
            <p class="titlecounter">Teknisi Lab</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="course-section-groups">
    <section id="courses" class="courses section section-item-cst">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 style="color: aliceblue;">Laboratorium</h2>
        <p class="">Laboratorium Populer</p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row">
          @foreach ($data_lab as $list)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px;">
            <div class="course-item">
              @if ($list['img'] == null)
              <img src="{{ url('assets/img/img_placeholder.png') }}" class="img-fluid" alt="...">  
              @else
              <img src="{{ url('/storage/image_lab/'. $list['img'] ) }}" class="img-fluid" alt="...">
              @endif
              <div class="course-content" style="color:#0b4d70;">
                <p> <b>{{ $list['lab_name'] }}</b></p>
                <p class="description">{!! $list['notes_short'] !!}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <a href="{{ url('page-laboratorium/detail-laboratorium/'. $list['id']) }}">
                    <p class="category">Detail</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <section id="courses" class="courses section section-item-cst">
      <div class="container section-title" data-aos="fade-up">
        <h2 style="color: aliceblue;">Uji lab</h2>
        <p class="">Uji Laboratorium Populer</p>
      </div>
      <div class="container">
        <div class="row">
          @foreach ($data_labtest as $list)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom:20px;">
            <div class="course-item">
              @if ($list['img'] == null)
              <img src="{{ url('assets/img/img_placeholder.png') }}" class="img-fluid" alt="...">  
              @else
              <img src="{{ url('/storage/image_lab/'. $list->lsv_img ) }}" class="img-fluid" alt="...">
              @endif
              <div class="course-content" style="color:#0b4d70;">
                <p> <b>{{ $list->lsv_name }}</b></p>
                <p class="description">{!! $list->lsv_notes_short !!}</p>
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <a href="{{ url('page-layanan/detail-uji-lab/'. $list->lsv_id) }}">
                    <p class="category">Detail</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
  </div>
</main>
@endsection
@push('css')
<style>
  .course-section-groups{
    padding-bottom: 60px;
  }
  .section-item-cst{
    padding-bottom: 0px;
  }
</style>
@endpush
@push('scripts')

@endpush