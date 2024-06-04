
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
            <h1>Uji Laboratorium</h1>
            <p class="mb-0">Uji laboratorium merupakan sebuah metode yang penting dilakukan untuk menentukan mutu dan pengembangan suatu produk, sehingga dapat membantu masyarakat untuk mendapatkan informasi yang akurat tentang kualitas produk yang mereka konsumsi dan gunakan.</p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Uji Laboratorium</a></li>
        </ol>
      </div>
    </nav>
  </div>
  <section id="courses" class="courses section" style="background-color:aliceblue;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Uji Laboratorium</h2>
      <p style="color:#0b4d70;">Layanan Uji Laboratorium</p>
    </div><!-- End Section Title -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="mb-4">
            <label style="color: #0b4d70">Rumpun</label>
            <select id="inp-rumpun" class="form-select" onchange="actFilterLabTestRumpun()" style="background-color: aliceblue; color: #444444cc;">
              <option value="all" selected>Semua Rumpun</option>
              @foreach ($group as $list)
              <option value="{{ $list->lag_id }}">{{ $list->lag_name }}</option> 
              @endforeach
            </select>
          </div>
          <div class="mb-4">
            <label style="color: #0b4d70">Laboratorium</label>
            <select id="inp-lab" class="form-select" onchange="actFilterLabList()" style="background-color: aliceblue; color: #444444cc;">
              <option value="all" selected>Semua Lab</option>
              @foreach ($data as $list)
              <option value="{{ $list->lab_id }}">{{ $list->lab_name }}</option> 
              @endforeach
            </select>
          </div>
          <div class="mb-4">
            <label style="color: #0b4d70">Cari</label>
            <input type="text" class="form-control" id="inp-find" oninput="actFilterFind()" placeholder="Cari.." style="background-color: aliceblue; color: #444444cc;">
          </div>
        </div>
        <div class="col-lg-9 col-md-12">
          <div id="uji_lab_items" class="row">
          </div>
        </div>
      </div>
      
    </div>
  </section>
</main>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('/public/assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  .courses .course-item{
    border: 1px solid rgb(57 148 167 / 59%);
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('/public/assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
  
</script>
{{-- function --}}
<script>
  function actDataLabTest(var_a,var_b,var_c) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-lab-test') }}",
      data: {
        "group": var_a,
        "labs": var_b,
        "find":var_c
      },
      async: false,
      success: function(results) {
        $('#uji_lab_items').html(results);
      },
    });
  };
  function actFilterLabTestRumpun() {
    $('#inp-lab').empty();
    $('#inp-find').val('');
    var id_group = $('#inp-rumpun').find(":selected").val();
    var id_lab = $('#inp-lab').find(":selected").val();
    var val_find = $('#inp-find').val();
    actDataLabTest(id_group,"all",null);
    /*Get*/
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-filter-lab') }}",
      data: {
        "group": id_group,
      },
      async: false,
      success: function(results) {
        $.each(results, function (i, result) {
          $('#inp-lab').append($('<option>', { 
            value: result.id,
            text : result.name 
          }));
        });
      },
    });
  };
  function actFilterLabList() {  
    var id_group = $('#inp-rumpun').find(":selected").val();
    var id_lab = $('#inp-lab').find(":selected").val();
    var val_find = $('#inp-find').val();
    $('#inp-find').val('');
    actDataLabTest(id_group,id_lab,null);
    /*
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: 'POST',
      url: "{{ route('source-data-lab-test') }}",
      data: {
        "group": id_group,
        "lab": id_lab,
        "find":val_find,
      },
      async: false,
      success: function(results) {
        $.each(results, function (i, result) {
          $('#inp-lab').append($('<option>', { 
            value: result.id,
            text : result.name 
          }));
        });
      },
    });
    */
  };

  function actFilterFind() {  
    var id_group = $('#inp-rumpun').find(":selected").val();
    var id_lab = $('#inp-lab').find(":selected").val();
    var val_find = $('#inp-find').val();
    actDataLabTest(id_group,id_lab,val_find);
  };
  
  
</script>
{{-- Executed Function --}}
<script>
  actDataLabTest("all","all",null);
</script>
@endpush