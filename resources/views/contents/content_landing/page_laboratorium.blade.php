
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
            <h1>Laboratorium</h1>
            <p class="mb-0">Laboratorium Fakultas Teknik Universitas Negeri Surabaya merupakan sarana dan prasarana untuk menunjang kegiatan akademisi universitas maupun kegiatan dari pihak umum yang membutuhkan uji lab. </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('page-laboratorium') }}">Laboratorium</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses" class="courses section" style="background-color:aliceblue;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Laboratorium</h2>
      <p style="color:#0b4d70;">Data Laboratorium</p>
    </div><!-- End Section Title -->
    <div class="container">
      <div class="row mb-4">
        <div class="col-sm-12 col-md-6 mb-2">
          <div class="input-group" data-aos="fade-up">
            <span class="input-group-text" id="basic-addon2" style="background-color: rgb(20, 104, 177); color: rgb(207, 233, 255); width: 100px; text-align: center;">Rumpun</span>
            <select id="inp-rumpun" class="form-select" onchange="actFilterLabList()" style="background-color: aliceblue; color: #444444cc;">
              <option value="all" selected>Semua Rumpun</option>
              @foreach ($group as $list)
              <option value="{{ $list->lag_id }}">{{ $list->lag_name }}</option> 
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 mb-2">
          <div class="input-group" data-aos="fade-up">
            <span class="input-group-text" id="basic-addon2" style="background-color: rgb(20, 104, 177); color: rgb(207, 233, 255);width: 100px;">Cari</span>
            <input type="text" name="inp_find" id="inp-find" class="form-control" oninput="actFilterInput()" placeholder="" style="background-color: aliceblue; color: #444444cc;">
          </div>
        </div>
      </div>
      <div id="lab_items" class="row">
      </div>
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
  .courses .course-item{
    border: 1px solid rgb(57 148 167 / 59%);
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