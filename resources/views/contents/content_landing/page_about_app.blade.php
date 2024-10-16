
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
            <h1>Sistem Informasi Peminjaman Laboratorium Fakultas teknik</h1>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('page-about-app') }}">Sistem Informasi Peminjaman Laboratorium Fakultas teknik</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses" class="courses section" style="background-color:aliceblue;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>About</h2>
      <p style="color:#0b4d70;">Sistem Informasi Peminjaman Laboratorium Fakultas teknik</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up">
      <p style="color:#0b4d70;">
        Di tengah dinamika perkembangan teknologi informasi, Fakultas Teknik Universitas Negeri Surabaya (Unesa) memperkenalkan sebuah sistem informasi peminjaman laboratorium yang bertujuan untuk meningkatkan efisiensi 
        dan efektivitas pengelolaan laboratorium serta layanan kepada pengguna. 
        Sistem ini tidak hanya mempermudah proses peminjaman, tetapi juga mengoptimalkan penggunaan sumber daya dan fasilitas yang tersedia.
      </p>
      <p style="color:#0b4d70;">
        <b>Konsep dan Tujuan</b> <br>
        Sistem Informasi Peminjaman Laboratorium Fakultas Teknik Unesa dirancang dengan memperhatikan kebutuhan dan tantangan dalam pengelolaan laboratorium yang efisien dan efektif. 
        Beberapa tujuan utama dari sistem ini antara lain:
      </p>
      <ul>
        <li style="color:#0b4d70;">Mempermudah Proses Peminjaman <br> Mahasiswa, dosen, staf administrasi maupun pihak umum dapat dengan mudah melakukan 
          pemesanan laboratorium melalui platform online tanpa harus melakukan proses manual yang memakan waktu.
        </li>
        <li style="color:#0b4d70;">Mengoptimalkan Penggunaan Sumber Daya <br> Sistem ini memungkinkan pengguna untuk melihat ketersediaan laboratorium secara real-time, 
          sehingga mereka dapat memilih waktu yang tepat untuk melakukan peminjaman sesuai dengan jadwal yang tersedia.
        </li>
        <li style="color:#0b4d70;">Meningkatkan Transparansi dan Akuntabilitas <br> Semua transaksi peminjaman laboratorium akan tercatat secara otomatis dalam sistem, 
          sehingga memudahkan dalam pelacakan dan pemantauan penggunaan laboratorium.
        </li>
        <li style="color:#0b4d70;">Memperkuat Layanan Pelanggan <br> Dengan menyediakan sistem yang mudah digunakan dan responsif, Fakultas Teknik Unesa dapat meningkatkan kepuasan pengguna dalam hal layanan dan penggunaan laboratorium.
        </li>
      </ul>
      <p style="color:#0b4d70;">
        <b>Fitur Utama</b><br>
        Sistem Informasi Peminjaman Laboratorium Fakultas Teknik Unesa dilengkapi dengan sejumlah fitur yang mendukung berbagai kegiatan peminjaman dan pengelolaan laboratorium, antara lain:
      </p>
      <ul style="color:#0b4d70;">
        <li>
          Pemesanan Online <br> Pengguna dapat melakukan pemesanan laboratorium secara online melalui platform yang telah disediakan dengan mengakses jadwal dan ketersediaan laboratorium.
        </li>
        <li>
          Verifikasi dan Persetujuan <br> Setelah melakukan pemesanan, permintaan akan diverifikasi dan disetujui oleh pihak yang berwenang sebelum dapat dikonfirmasi.
        </li>
        <li>
          Notifikasi dan Pengingat <br> Sistem akan mengirimkan notifikasi dan pengingat kepada pengguna terkait status peminjaman laboratorium, termasuk pengingat jadwal dan batas waktu pengembalian.
        </li>
        <li>
          Pelacakan dan Pelaporan <br> Data mengenai peminjaman laboratorium akan tersimpan secara terpusat dalam sistem, memungkinkan untuk dilakukan pelacakan dan pembuatan laporan penggunaan laboratorium secara berkala.
        </li>
      </ul>
      <p style="color:#0b4d70;">
        <b>Manfaat dan Dampak</b> <br>
        Dengan adopsi Sistem Informasi Peminjaman Laboratorium Fakultas Teknik Unesa, diharapkan akan tercipta sejumlah manfaat dan dampak positif, antara lain:
      </p>
      <ul style="color:#0b4d70;">
        <li>
          Pengelolaan yang Lebih Efisien <br> Penggunaan sistem informasi akan mengurangi beban kerja administratif dalam pengelolaan laboratorium, sehingga staf dapat fokus pada kegiatan yang lebih strategis.
        </li>
        <li>
          Penggunaan Sumber Daya yang Lebih Optimal <br> Dengan adanya informasi ketersediaan laboratorium secara real-time, pengguna dapat mengoptimalkan penggunaan sumber daya yang ada tanpa adanya tumpang tindih dalam jadwal peminjaman.
        </li>
        <li>
          Peningkatan Layanan dan Kepuasan Pengguna <br> Sistem ini akan meningkatkan pengalaman pengguna dalam hal peminjaman laboratorium, sehingga dapat meningkatkan kepuasan dan loyalitas pengguna terhadap layanan yang disediakan.
        </li>
      </ul>
    </div>
  </section>
</main>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  #inp-rumpun{
    background-color:aliceblue,
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
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