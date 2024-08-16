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
				<td>
					Salam Hangat, <br>
					Pengguna SIPLAB<br>
					di Tempat<br>
				</td>
			</tr>
			<tr>
				<td>
					Selamat datang di SIPLAB, aplikasi sistem informasi peminjaman laboratorium Fakultas Teknik UNESA. 
				</td>
			</tr>
			<tr>
				<td>
					Terimakasih telah registrasi, untuk mengaktivas akun anda silakan klik tautan di bawah ini : 
				</td>
			</tr>
			<tr>
				<td>
					<b>{{ $data['url'] }}</b>
				</td>
			</tr>
			<tr>
				<td>
					Jika Anda tidak membuat akun di SIPLAB, abaikan email ini.
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
