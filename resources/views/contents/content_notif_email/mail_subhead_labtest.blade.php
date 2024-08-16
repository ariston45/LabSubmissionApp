<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
	</style>
</head>
<body>
	<table class="table" style="width:100%">
		<tbody>
			<tr>
				<td colspan="4">
					Kepada, <br>
					Yth, Kepala Sub Laboratorium<br>
					Fakultas Teknik UNESA <br>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Dengan hormat, <br>
					Saya yang bertanda tangan di bawah ini: <br>
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
					Mengajukan permohonan untuk pengujian di laboratorium  <b>{{ $data_applicant['lab'] }}</b>, dengan Judul: 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<b>{{ $data_applicant['title'] }}</b>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Adapun pengujian ini untuk keperluan  <b>{{ $data_applicant['act'] }}</b> dengan tujuan <b>{{ $data_applicant['tujuan'] }}</b>.
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Hasil pengujian ini diharapkan sudah bisa keluar pada,<br>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Hari/Tanggal :</td>
				<td>{!! $data_applicant['datetimes'] !!}</td>
			</tr>
			<tr>
				<td colspan="4">
					Demikian permohonan pengujian sampel di laboratorium ini saya sampaikan. Atas perhatian dan kerjasamanya, saya ucapkan terima kasish.
				</td>
			</tr>
		</tbody>
	</table>
	<hr>
	<a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">
		<button type="button" class="btn bg-olive btn-flat margin">Detail Pengajuan</button>
	</a>
	<a href="{{ url('download-surat-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">
		<button type="button" class="btn bg-olive btn-flat margin">Download Surat</button>
	</a>
</body>
</html>
