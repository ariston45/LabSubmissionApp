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
					Telah disetujui oleh {{ $data_applicant['kalab'] }}.
					Untuk mengecek detail pembayaran, klik link <a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}"><b>Detail Peminjaman</b></a>. <br>
					Silakan lakukan pembayaran dengan tranfer ke virtual accout berikut; <br>
					<b>
						VA Name : Unesa Laboratorium FT <br>
						VA Number : 9422-023-066-05-0001 <br>
					</b>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Pembayaran dengan menggunakan nomor VA yang tertera melalui channel BTN maupun Bank lain menggunkan menu 'transfer ke bank lain'.
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Apabila sudah melakukan pembayaran silakan segera upload bukti bayar anda.
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
