
@extends('layout.app3')
@section('title')
Lab management | Dashboard
@endsection
@section('content')
<main class="main">
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Detail Uji Laboratorium</h1>
            {{-- <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p> --}}
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('page-layanan') }}">Uji Laboratorium</a></li>
          <li class="current">Detail Uji Laboratorium</li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses-course-details" class="courses-course-details section" style="background-color: aliceblue;">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8">
          @if ($data_labtest->lsv_img == null)
          <img src="{{ url('public/assets/img/img_placeholder.png') }}" class="img-fluid" alt="">
          @else
          <img src="{{ url('public/storage/image_lab_test/'.$data_labtest->lsv_img) }}" class="img-fluid" alt="">
          @endif
          <h3 style="color: #0b4d70;">{{ $data_labtest->lsv_img }}</h3>
          <p style="color: #444444cc;">
            {{ $data_labtest->lsv_notes }}
          </p>
        </div>
        <div class="col-lg-4">

          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Laboratorium</h5>
            <p style="color: #444444cc;">{{ $data_labtest->lab_name }}</p>
          </div>

          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Kalab</h5>
            <p style="color: #444444cc;">
              @foreach ( $user_kalab as $list)
              {{ $list->name }} <br>
              @endforeach  
            </p>
          </div>

          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Kasublab</h5>
            <p style="color: #444444cc;">{{ $data_labtest->name  }}</p>
          </div>

          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Teknisi</h5>
            <p style="color: #444444cc;">
              @foreach ($data_technicians as $list)
              - {{ $list->name }} <br>              
              @endforeach
            </p>
          </div>
          
          {{-- <div class="course-info  justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Jam Kerja</h5>
            <p style="color: #444444cc;">
              @foreach ($data_time as $list)
              - {{ $list->ltw_title }} &nbsp;&nbsp; {{ $list->ltw_time_start }}
              @endforeach
            </p>
          </div> --}}

          <div class="course-info justify-content-between align-items-center">
            <h5 style="color: #0b4d70;">Biaya</h5>
            <p style="color: #444444cc;">{{ funCurrencyRupiah($data_labtest->lsv_price )}}</p>
          </div>
          @if (checkUser(['LECTURE','STUDENT','PUBLIC_MEMBER','PUBLIC_NON_MEMBER']) == true)
          <div class="align-items-center d-grid gap-2">
            <a href="{{ url('pengajuan/form-pengajuan') }}">
              <button type="button" class="btn btn-success" style="width: 100%;">Ajukan Peminjaman</button>
            </a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  <section id="tabs" class="tabs section" style="background-color: aliceblue;">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1" style="color: #444444cc; padding-left: 16px;">Fasilitas dan Alat</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3" style="color: #444444cc; padding-left: 16px;">Ketentuan Peminjaman</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                  <h3 style="color: #0b4d70;">Fasilitas Dan Alat</h3>
                  <table class="table-bordered tabel_custom" style="width: 100%;">
                    <thead>
                      <tr>
                        <th style="width: 5%; text-align: center;">No</th>
                        <th style="width: 65%; text-align: center;">Nama Fasilitas Dan Alat</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($data_facility as $list)
                      <tr>
                        <td style="width: 5%; text-align: center;">{{ $no }}</td>
                        <td>{{ $list->laf_name }}</td>
                      </tr>
                      @php
                        $no++;
                      @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-12 details order-2 order-lg-1">
                  <h3 style="color: #0b4d70;">Ketentuan Peminjaman</h3>
                  
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section><!-- /Tabs Section -->
</main>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  #inp-rumpun{
    background-color:aliceblue,
  }
  .tabel_custom {
		border-collapse: collapse;
		font-size: 11px;
    border: aliceblue;
	}
	.tabel_custom > thead {
		background-color: #016e72;
		color: #f2f2f2;
	}
	.tabel_custom > thead > tr > th {
		vertical-align: middle;
		padding: 6px 8px;
	}
	.tabel_custom > tbody > tr > td {
    color: #444444cc;
    font-weight: 500;
    font-size: 13px;
		vertical-align: middle;
		padding: 4px 8px;
    background-color: #d9eff5a4;
	}
	.tabel_custom tr:nth-child(even){background-color: #c1f0fd;}
	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- Variables --}}
<script>
</script>
{{-- Function --}}
<script>
</script>
{{-- executed function --}}
<script>
  actListLaboratorium();
</script>
@endpush