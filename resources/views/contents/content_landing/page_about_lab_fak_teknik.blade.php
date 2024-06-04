
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
            <h1>Laboratorium Fakultas Teknik</h1>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('page-about-unesa') }}">Laboratorium Fakultas Teknik</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses" class="courses section" style="background-color:aliceblue;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>About</h2>
      <p style="color:#0b4d70;">Laboratorium Fakultas Teknik</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up">
      <p style="color:#0b4d70;">
        Laboratorium merupakan sarana dan prasarana vital bagi pendidikan teknik dan bidang teknik. Di sinilah teori dan
        praktik bertemu,
        di mana mahasiswa serta kalayak umum dapat mengaplikasikan pengetahuan mereka dan mengembangkan keterampilan teknis
        yang dibutuhkan untuk memecahkan berbagai permasalahan guna menemukan solusi.
      </p>
      <p style="color:#0b4d70;">
        Fakultas Teknik Unesa memiliki berbagai laboratorium yang lengkap dan modern untuk mendukung kegiatan praktikum dan
        penelitian bagi para mahasiswa maupun pihak umum.
        Laboratorium-laboratorium ini tersebar di beberapa jurusan.
      </p>
      <p style="color:#0b4d70;">
        Fasilitas yang lengkap dan modern di laboratorium-laboratorium ini memungkinkan para mahasiswa dan pihak umum untuk
        melakukan praktikum dan penelitian dengan lebih efektif dan efisien.
        Selain itu, laboratorium-laboratorium ini juga dirancang dengan memperhatikan aspek keselamatan dan keamanan.
      </p>
    </div>
  </section>
</main>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  #inp-rumpun{
    background-color:aliceblue,
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- Variables --}}
<script>
</script>
{{-- Function --}}
<script>
  function actListLaboratorium() {  
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-labs') }}",
      data: {
        "group": null,
      },
      async: false,
      success: function(result) {
        $('#lab_items').html(result);
      },
    });
  };
  function actFilterLabList() {
    var id_group = $('#inp-rumpun').find(":selected").val();
    $('#inp-find').val('');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-labs') }}",
      data: {
        "group": id_group,
      },
      async: false,
      success: function(result) {
        $('#lab_items').html(result);
      },
    });
  };
  function actFilterInput() {
    var id_group = $('#inp-rumpun').find(":selected").val();
    var val_input = $('#inp-find').val();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-labs-find') }}",
      data: {
        "group": id_group,
        "find" : val_input,
      },
      async: false,
      success: function(result) {
        $('#lab_items').html(result);
      },
    });
  };
</script>
{{-- executed function --}}
<script>
  actListLaboratorium();
</script>
@endpush