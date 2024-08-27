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
					Kepala Laboratorium Fakultas Teknik Unesa <br>
					di Tempat<br>
				</td>
			</tr>
			<tr><td></td></tr>
			<tr>
				<td>
					Pengajuan pengujian sampel di {{ $data_applicant['lab'] }}, yang diajukan dengan rilis hasil uji lab pada <b>{{$data_applicant['dates']}}</b>,<br>
					telah disetujui dengan pengunduran rilis hasil uji lab pada {{$data_applicant['dates_reschedule']}}.
				</td>
			<tr>
				<td>
					Pengajuan disetujui pada {{$data_applicant['dates_now']}} oleh {{$data_applicant['name_subhead']}}.
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
			<tr><td></td></tr>
			<tr><td></td></tr>
			<tr>
				<td>Hormat Kami,</td>
			</tr>
			<tr>
				<td><b>Tim SIPLAB</b></td>
			</tr>
		</tbody>
	</table>
</body>
</html>
