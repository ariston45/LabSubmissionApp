@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
{{-- <h4>Beranda</h4> --}}
{{-- <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
</ol> --}}
@endsection
@section('content')
<div class="col-md-12" style="margin-bottom: 20px;">
  <img id="img-homec" class="img-responsive" src="{{ url('assets/img/beranda_2.png') }}" alt="">
  {{-- <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: darkorange"><i class="fa fa-info-circle"></i> Informasi</h3>
    </div>
    <div class="box-body">
      hello world
    </div>
  </div> --}}
</div>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="ri-inbox-2-line"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Pengajuan Baru</span>
          <span class="info-box-number">
            {{--  --}}
            {{ $sub_count_entry }}
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="ri-archive-2-line"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Pengajuan Diproses</span>
          <span class="info-box-number">
            {{--  --}}
            {{ $sub_count_acc }}
          </span>
        </div>
      </div>
    </div>
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="ri-building-4-line"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Laboratorium</span>
          <span class="info-box-number">
            {{--  --}}
            {{ $lab_count }}
          </span>
        </div>
      </div>
    </div>
    @if (rulesUser(['ADMIN_SYSTEM','ADMIN_MASTER','LAB_HEAD']))
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-orange"><i class="ri-building-4-line"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Data User</span>
            <span class="info-box-number">
              {{--  --}}
              {{ $user_count }}
            </span>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
<div class="col-md-12">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pengajuan Bulanan</h3>
          {{-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div> --}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
              <p class="text-center">
                <strong>Data Pengajuan: <span id="chartMountTitle"></span></strong>
              </p>
              <div class="chart">
                <canvas id="submissionChart" width="523" height="190"></canvas>
              </div>
            </div>
            <div class="col-md-4">
              <p class="text-center">
                <strong>Jenis Pengajuan</strong>
              </p>
              <div class="progress-group">
                <span class="progress-text">Penelitian</span>
                <span class="progress-number"><b>{{ $counting_submission['tp_penelitian'][0] }}</b>/{{ $counting_submission['all'] }}</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-red" style="width: {{ $counting_submission['tp_penelitian'][1] }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Pelatihan</span>
                <span class="progress-number"><b>{{ $counting_submission['tp_pelatihan'][0] }}</b>/{{ $counting_submission['all'] }}</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-green" style="width:{{ $counting_submission['tp_pelatihan'][1] }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Pengabdian Masyarakat</span>
                <span class="progress-number"><b>{{ $counting_submission['tp_pengabdian_masyarakat'][0] }}</b>/{{ $counting_submission['all'] }}</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-blue" style="width: {{ $counting_submission['tp_pengabdian_masyarakat'][1] }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Magang</span>
                <span class="progress-number"><b>{{ $counting_submission['tp_magang'][0] }}</b>/{{ $counting_submission['all'] }}</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-yellow" style="width: {{ $counting_submission['tp_magang'][1] }}%"></div>
                </div>
              </div>
              <div class="progress-group">
                <span class="progress-text">Lain-lain*</span>
                <span class="progress-number"><b>{{ $counting_submission['tp_lain_lain'][0] }}</b>/{{ $counting_submission['all'] }}</span>
                <div class="progress sm">
                  <div class="progress-bar progress-bar-info" style="width: {{ $counting_submission['tp_lain_lain'][1] }}%"></div>
                </div>
              </div>
              <!-- /.progress-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        <!-- /.box-footer -->
      </div>
    </div>
  </div>
</div>
@endsection
@push('css')
  <style>
    #font-title{
      font-size: 39px;
    }
    #img-home{
      max-width: 100%;
      height: auto;
      max-width: 80vw;
    }
    .img-responsive{
      max-width: 100%;
    }
  </style>
@endpush
@push('scripts')
  <script src="{{ url('assets/plugins/fastclick/fastclick.js') }}"></script>
  <script src="{{ url('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>
  <script src="{{ url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ url('assets/plugins/chart.js/chart.js') }}"></script>
  {{-- <script src="{{ url('/public/js/pages/dashboard2.js') }}"></script> --}}
  {{-- ================================================================================================================================================= --}}
  <script>
    function getMonthPengajuan() {
      var month_var_data = [];
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'GET',
        url: "{{ route('source-data-month-ondashboard') }}",
        async: false,
        success: function(result) {
          month_var_data = result;
          $('#chartMountTitle').text(result.title);
        },
      });
      return month_var_data;
    };
    function chartPengajuan(){
      var month_data = getMonthPengajuan();
      var submissionChartCanvas = $('#submissionChart').get(0).getContext('2d');
      var submissionChart= new Chart(submissionChartCanvas);
    
      var submissionChartData = {
        labels  : month_data.label,
        datasets: [
          {
            label: 'Penelitian',
            fillColor: 'rgba(221,75,57,0.2)',
            strokeColor: 'rgba(221,75,57,1)',
            pointColor: 'rgba(221,75,57,1)',
            pointStrokeColor: '#fff',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(221,75,57,1)',
            data: month_data.data.tp_penelitian,
          },
          {
            label: 'Pelatihan',
            fillColor: "rgba(0,166,90,0.2)",
            strokeColor: "rgba(0,166,90,1)",
            pointColor: "rgba(0,166,90,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(0,166,90,1)",
            data: month_data.data.tp_pelatihan,
          },
          {
            label: 'Pengabdian Masyarakat',
            fillColor: "rgba(51,122,183,0.2)",
            strokeColor: "rgba(51,122,183,1)",
            pointColor: "rgba(51,122,183,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(51,122,183,1)",
            data: month_data.data.tp_pengabdian_masyarakat,
          },
          {
            label: 'Magang',
            fillColor: "rgba(243,156,18,0.2)",
            strokeColor: "rgba(243,156,18,1)",
            pointColor: "rgba(243,156,18,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(243,156,18,1)",
            data: month_data.data.tp_magang,
          },
          {
            label: 'Lain-lain',
            fillColor: "rgba(0,192,239,0.2)",
            strokeColor: "rgba(0,192,239,1)",
            pointColor: "rgba(0,192,239,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(0,192,239,1)",
            data:  month_data.data.tp_lain_lain,
          },
          
        ]
      };
    
      var submissionChartOptions = {
        // Boolean - If we should show the scale at all
        showScale               : true,
        // Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : false,
        // String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        // Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        // Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        // Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        // Boolean - Whether the line is curved between points
        bezierCurve             : true,
        // Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.3,
        // Boolean - Whether to show a dot for each point
        pointDot                : true,
        // Number - Radius of each point dot in pixels
        pointDotRadius          : 4,
        // Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 1,
        // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,
        // Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        // Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        // Boolean - Whether to fill the dataset with a color
        datasetFill             : true,
        // String - A legend template
        legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : true,
        // Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      };
    
      // Create the line chart
      submissionChart.Line(submissionChartData, submissionChartOptions);
  // This will get the first returned node in the jQuery collection.
    }
  </script>
  <script>
    chartPengajuan();
  </script>
@endpush