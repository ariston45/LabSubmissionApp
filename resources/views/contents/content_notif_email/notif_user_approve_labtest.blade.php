<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	{{-- <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/dist/css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ url('assets/customs/css/custom_layout.css') }}"> --}}
	<style>
		.table {
      margin-bottom: 0px;
    }
    .table > tbody > tr > td{
      border-top: none;
      font-family: "Times New Roman", Times, serif;
      font-size: 12pt;
    }
    .cst-paragraf{
      line-height: 180%;
    }
		
	</style>
</head>
<body>
	<table class="table" style="width:100%">
		<tbody>
			<tr>
				<td>
					Salam Hangat, <br>
					{{ $data_applicant['inp_nama'] }}
					di Tempat<br>
				</td>
			</tr>
			<tr>
				<td>
					Pengajuan pengujian sampel di {{ $data_applicant['lab'] }}, dengan jadwal rilis hasil uji lab tanggal <b>{{$data_applicant['dates']}}</b>,<br>
					telah disetujui oleh;
				</td>
			<tr>
				<td>
					{{$data_applicant['name_subhead']}} pada {{$data_applicant['dates_now']}}.
				</td>
			</tr>
			<tr>
				<td>
					Untuk informasi lebih lanjut silakan klik  <a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}"><b>Detail Pengajuan</b></a>, atau menghubungi nomor kontak berikut:
				</td>
			</tr>
			<tr>
				<td>
					Kepala Sub Laboratorium: {{ $data_applicant['name_subhead'] }} - {{ $data_applicant['no_contact_subhead'] }}
				</td>
			</tr>
		</tbody>
	</table>
	<hr>
	<a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">
		<button type="button" class="btn bg-olive btn-flat margin">Detail Pengajuan</button>
	</a>
</body>
</html>
