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
					Kepala Laboratoitum Fakultas Teknik<br>
					di Tempat<br>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Pengajuan peminjaman {{ $data_applicant['lab'] }}, atas nama  <b>{{ $data_applicant['inp_nama'] }}</b> dengan jadwal peminjaman tanggal <br> 
					@php
						$data = dataGetDatetime($data_applicant['lsb_id']);
					@endphp
					<table>
						@foreach ($data as $key => $value)
							<tr>
								- {{ $key }}
								@if (count($value) > 0)
									<table>
										@foreach ($value as $li)
											<tr>&nbsp;&nbsp;{{$li}}</tr>
										@endforeach
									</table>
								@endif
							</tr>
						@endforeach
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Sudah dilakukan pembayaran, untuk cek bukti pembayaran bisa klik link <b><a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">Detail Peminjaman</a></b>.
				</td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td>
					Hormat Kami, <br>
					<b>Tim SIPLAB</b>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>
