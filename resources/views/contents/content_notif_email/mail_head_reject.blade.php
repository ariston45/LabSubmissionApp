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
				<td colspan="4">
					Salam Hangat, <br>
					{{ $data_applicant['inp_nama'] }}<br>
					di Tempat<br>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Pengajuan peminjaman {{ $data_applicant['lab'] }}, dengan jadwal peminjaman tanggal <br> 
					{!! $data_applicant['datetimes'] !!}
					Telah ditolak oleh
					@if (isset($data_applicant['head_acc']))
						{{ $data_applicant['head_acc'] }}.
						<br>
					@endif
					Untuk informasi lebih lanjut silakan klik tautan <a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}"> Detail Pengajuan </a>.
				</td>
			</tr>
			<tr> <td></td></tr>
			<tr>
				Salam Hormat, <br>
				<b>Tim SIPLAB</b>
			</tr>
		</tbody>
	</table>
</body>
</html>
