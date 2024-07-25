
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
            <h1>Universitas Negeri Surabaya</h1>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('page-about-unesa') }}">Unesa</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses" class="courses section" style="background-color:aliceblue;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>About</h2>
      <p style="color:#0b4d70;">Universitas Negeri Surabaya</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up">
      <p style="color:#0b4d70;">
        Fakultas Teknik Universitas Negeri Surabaya (Unesa) merupakan salah satu fakultas yang berada di bawah naungan Unesa, sebuah perguruan tinggi negeri di Surabaya, Jawa Timur. 
        Fakultas ini didirikan pada tahun 1962 dan telah berkembang menjadi salah satu fakultas teknik terkemuka di Indonesia.
      </p>
      <p style="color:#0b4d70;">
        <b>Visi Fakultas Teknik Universitas Negeri Surabaya</b> <br>
        Fakultas Yang Tangguh, Adaptif, dan Inovatif Dalam Keilmuan Bidang Teknologi dan Pendidikan Kejuruan Berorientasi Kewirausahaan.
      </p>
      <p style="color:#0b4d70;">
        <b>Misi Fakultas Teknik Universitas Negeri Surabaya </b> <br>
        <ul style="color:#0b4d70;">
          <li>Menyelenggarakan kualitas pendidikan di bidang teknologi dan pendidikan kejuruan yang berkarakter tangguh, adaptif, dan inovatif.</li>
          <li>Mengembangkan penelitian di bidang teknologi dan pendidikan kejuruan menuju hilirisasi produk inovasi dan berorientasi kewirausahaan.</li>
          <li>Mengembangkan pengabdian kepada masyarakat dengan menyebarluaskan inovasi di bidang teknologi dan pendidikan kejuruan berorientasi kewirausahaan bagi kesejahteraan masyarakat.</li>
          <li>Meningkatkan kegiatan tridharma perguruan tinggi melalui sistem multikampus secara sinergi, terintegrasi, harmonis, dan berkelanjutan dengan memperhatikan keunggulan UNESA dan Fakultas.</li>
          <li>Meningkatkan tata kelola yang efektif, efisien, transparan, dan akuntabel yang menjamin mutu secara berkelanjutan</li>
          <li>Meningkatkan kerja sama nasional dan internasional yang produktif dalam bidang teknologi dan pendidikan kejuruan untuk meningkatkan rekognisi kegiatan tridharma.</li>
        </ul>
      </p>
      <p style="color:#0b4d70;">
        <b>Tujuan Fakultas Teknik Universitas Negeri Surabaya</b> <br>
        <ul style="color:#0b4d70;">
          <li>Menghasilkan lulusan di bidang teknologi dan pendidikan kejuruan yang cerdas, religius, berakhlak mulia, mandiri, professional, dan memiliki keunggulan.</li>
          <li>Menghasilkan karya ilmiah dan karya kreatif, baik di bidang teknologi maupun pendidikan kejuruan yang unggul serta menjadi rujukan dalam penerapan ilmu pengetahuan dan/atau teknologi.</li>
          <li>Menghasilkan karya pengabdian kepada masyarakat melalui penerapan ilmu pengetahuan dan/atau teknologi untuk mewujudkan masyarakat yang mandiri, produktif, dan sejahtera.</li>
          <li>Mewujudkan Fakultas Teknik Unesa sebagai pusat keilmuan, riset, teknologi, dan yang didasarkan pada nilai-nilai luhur kebudayaan nasional.</li>
          <li>Menghasilkan kinerja institusi yang efektif dan efisien dengan mewujudkan iklim akademik yang humanis, manajamen kelembagaan yang transparan, akuntabel, responsif, dan berkeadilan untuk menjamin kualitas pelaksanaan tridarma perguruan tinggi secara berkelanjutan.</li>
        </ul>
      </p>
      <p style="color:#0b4d70;">
        <b>Tujuan Fakultas Teknik Universitas Negeri Surabaya</b> <br>
        <ul style="color:#0b4d70;">
          <li>Meningkatkan akreditasi program studi berdasarkan standar nasional maupun internasional.</li>
          <li>Meningkatnya relevansi dan produktivitas riset dan pengembangan.</li>
          <li>Meningkatkan kualitas lulusan yang tersertifikasi.</li>
          <li>Meningkatkan kualitas Dosen.</li>
          <li>Inovasi kurikulum pendidikan berbasis Outcome Based Education (OBE).</li>
          <li>Inovasi kurikulum merdeka belajar kampus merdeka (MBKM).</li>
          <li>Meningkatkan penjaminan mutu internal melalui Gugus Penjaminan Mutu (GPM) dan Unit Penjaminan Mutu (UPM).</li>
          <li>Pembukaan program studi (prodi) baru.</li>
          <li>Peningkatan kerjasama luar negeri.</li>
          <li>Meningkatnya tata kelola yang efektif, efisien, transparan, dan akuntabel.</li>
        </ul>
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