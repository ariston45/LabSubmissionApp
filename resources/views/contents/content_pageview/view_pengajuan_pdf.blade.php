<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/dist/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ url('assets/customs/css/custom_layout.css') }}">
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
        <td class="" colspan="4"> <span class="pull-right">Blanko Mahasiswa Unesa/Letter Unesa</span> </td>
      </tr>
      <tr>
        <td style="padding-top: 0px;padding-bottom: 0px;width: 4%;">Lampiran</td>
        <td colspan="3" style="padding-top: 2px;padding-bottom: 2px;">: Alat & Bahan Laboratorium </td>
      </tr>
      <tr>
        <td style="padding-top: 0px;padding-bottom: 0px;width: 4%;">Hal</td>
        <td colspan="3" style="padding-top: 2px;padding-bottom: 2px;">: Permohonan Izin Penelitian di Laboratorium </td>
      </tr>
      <tr>
        <td colspan="4"></td>
      </tr>
      <tr>
        <td colspan="4">
          <div class="cst-paragraf">
            Kepada, <br>
            Yth, Kepala Laboratorium Riset <br>
            Fakultas Teknik UNESA <br>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <div class="cst-paragraf">
            Dengan hormat, <br>
            Saya yang bertanda tangan di bawah ini: <br>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table" style="width:100%">
    <tbody>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;width:25%;">Nama<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->name }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">NIM<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->no_id }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">Program studi<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->usd_prodi }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">Fakultas<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->usd_fakultas }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">Universitas<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->usd_universitas }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">Alamat<span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->usd_address }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;">No. HP/CP <span class="pull-right">:</span></td>
        <td style="padding-top: 0px;padding-bottom: 0px;">{{ $data->usd_phone }}</td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="cst-paragraf">
            Memohon izin pemakaian laboratorium dan fasilitas untuk keperluan kegitan, <b>Penelitian/Pelatihan/Pengapdian
            Masyarakat/Magang/Lain-lain* , dengan Judul: </b>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          {{ $data->lsb_title }}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Rencana kegiatan tersebut akan dilaksanakan pada : <br>
        </td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;"> Hari/Tanggal<span class="pull-right">:</span></td>
        <td style="padding-top: 2px;padding-bottom: 2px;">{{ strDateStart($data->lsb_date_start) }} <b>s/d</b> {{ strDateEnd($data->lsb_date_end) }}</td>
      </tr>
      <tr>
        <td style="padding-left: 40px;padding-top: 2px;padding-bottom: 2px;"> Di Laboratorium<span class="pull-right">:</span></td>
        <td style="padding-top: 2px;padding-bottom: 2px;">{{ strJudul($data->lab_name) }}</td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="cst-paragraf">
            Fasilitas laboratorium yang digunakan terlampir. 
            <br>
            Demikian permohonan ini saya buat dan saya menyatakan akan bertanggungjawab sepenuhnya apabila terjadi kerusakan
            atau kehilangan atas alat terlampir selama saya pakai/pinjam.
            Atas perhatian dan bantuannya saya sampaikan terimaksih.
          </div>
        </td>
      </tr>
    </tbody>
  </table>
  <table class="table" style="width: 100%;">
    <tbody>
      <tr>
        @if ($data->level == 'STUDENT')
        <td style="width: 50%; text-align: center;">
          Mengetahui,
          Dosen Pembimbing,
          <br><br><br><br>
          ( {{ $acc_data_lecture->name }} )
          <br>
          NIP: {{ $acc_data_lecture->no_id }}
        </td>
        <td style="width: 50%; text-align: center;">
          Pemohon,
          <br><br><br><br>
          ( {{ $data->name }} )
          <br>
          NIM: {{ $data->no_id }}
        </td>
        @else
        <td style="width: 50%; text-align: center;">
          Pemohon,
          <br><br><br><br>
          ( {{ $data->name }} )
          <br>
          No.ID: {{ $data->no_id }}
        </td>
        @endif
      </tr>
    </tbody>
  </table>
</body>
</html>



