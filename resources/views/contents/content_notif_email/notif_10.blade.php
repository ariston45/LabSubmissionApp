<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
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
					Kepala Sub Laboratorium {{ $data_applicant['lab'] }}<br>
					di Tempat<br>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Berikut peminjaman laboratorium;
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;width: 15%;">Nama</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_nama'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">NIM/ID</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_id'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Program studi</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_program_studi'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Fakultas</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_fakultas'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Universitas</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_institusi'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Alamat</td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['inp_address'] }}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">No. HP/CP </td>
				<td style="padding-top: 0px;padding-bottom: 0px;">: {{ $data_applicant['no_contact'] }}</td>
			</tr>
			<tr>
				<td colspan="4">
					Dengan judul: <br>
					<b>{{ $data_applicant['title'] }}</b>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Dilaksanakan pada: <br>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Hari/Tanggal </td>
				<td>
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
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Di Laboratorium</td>
				<td>: {{ $data_applicant['lab'] }}</td>
			</tr>
			<tr>
				<td colspan="4">
					Telah menyelesaikan kegiatan peminjaman laboratorium. Dimohon untuk memvalidasi laporan pemohon.
				</td>
			</tr>
			<tr>
				Salam Hormat, <br>
				<b>Tim SIPLAB</b>
			</tr>
		</tbody>
	</table>
</body>
</html>
