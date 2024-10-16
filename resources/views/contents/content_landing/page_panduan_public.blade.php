
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
            <h1>Panduan Pengguna Publik Anggota Unesa</h1>
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
      <div class="row gy-4">
        <div class="col-md-12 order-1 order-lg-2" style="color: aliceblue">
          {{-- <div class="pb-4" style="text-align: center;">
            <img src="{{ url("/public/assets/img/Panduan_ft.jpg") }}" style="max-width: 900px;" alt="">
          </div> --}}
          <b>Panduan Registrasi</b> <br>
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
          </ol>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
@push('css')
@endpush
@push('scripts')

@endpush