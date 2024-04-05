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
		/* .table {
      margin-bottom: 0px;
    }
    .table > tbody > tr > td{
      border-top: none;
      font-family: "Times New Roman", Times, serif;
      font-size: 12pt;
    }
    .cst-paragraf{
      line-height: 180%;
    } */
		
	</style>
</head>
<body>
	<table class="table" style="width:100%">
		<tbody>
			{{-- <tr>
				<td class="" colspan="4"> <span class="pull-right">Blanko Mahasiswa Unesa/Letter Unesa</span> </td>
			</tr>
			<tr>
				<td style="width: 4%;">Lampiran</td>
				<td colspan="3">Alat & Bahan Laboratorium </td>
			</tr>
			<tr>
				<td style="width: 4%;">Hal</td>
				<td colspan="3">Permohonan Izin Penelitian di Laboratorium </td>
			</tr> 
			<tr><td colspan="4"></td></tr> --}}
			<tr>
				<td colspan="4">
					Kepada, <br>
					Yth, {{ $data_applicant['send_to'] }} <br>
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
					Memohon izin pemakaian laboratorium dan fasilitas untuk keperluan kegiatan <b>{{ $data_applicant['act'] }}</b>, dengan Judul: 
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<b>{{ $data_applicant['title'] }}</b>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					Rencana kegiatan tersebut akan dilaksanakan pada : <br>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Hari/Tanggal </td>
				<td>: {!! $data_applicant['time'] !!}</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Di Laboratorium</td>
				<td>: {{ $data_applicant['lab'] }}</td>
			</tr>
			<tr>
				<td colspan="4">
					Fasilitas laboratorium yang digunakan terlampir. <br>
					Demikian permohonan ini saya buat dan saya menyatakan akan bertanggungjawab sepenuhnya apabila terjadi kerusakan atau kehilangan atas alat terlampir selama saya pakai/pinjam. <br>
					Atas perhatian dan bantuannya saya sampaikan terimaksih.
				</td>
			</tr>
		</tbody>
	</table>
	@if (isset($data_applicant['lecture_acc']))
	<br>
		Disetujui {{ $data_applicant['lecture_acc'] }}
	@endif
	@if (isset($data_applicant['head_acc']))
	<br>
		Disetujui {{ $data_applicant['head_acc'] }}
	@endif
	<br><hr>
	<a href="{{ url('pengajuan/detail-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">
		<button type="button" class="btn bg-olive btn-flat margin">Detail Pengajuan</button>
	</a>
	<a href="{{ url('download-surat-pengajuan') }}/{{ $data_applicant['lsb_id'] }}">
		<button type="button" class="btn bg-olive btn-flat margin">Download Surat</button>
	</a>
	{{-- Mengetahui,
	Dosen Pembimbing,
	<br>
	{{ $data_applicant['lecture'] }}
	<br>
	NIP: {{ $data_applicant['lecture_id'] }}
	<br><br><br>
	Pemohon,
	<br><br>
	{{ $data_applicant['inp_nama'] }}
	<br>
	ID: {{ $data_applicant['inp_id'] }}
	<br> --}}
</body>
</html>
