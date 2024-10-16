@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Pengajuan</h4>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-home"></i> Pengajuan</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title" style="color: #0277bd"><i class="ri-file-list-3-line" style="margin-right: 4px;"></i> Surat Permohonan</h3>
      <div class="pull-right">
        <a href="{{ url('pengajuan/form-pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Cetak PDF</button>
        </a>
        <a href="{{ url('pengajuan/form-pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Update Pengajuan</button>
        </a>
        <a href="{{ url('pengajuan/form-pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
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
          <tr><td colspan="4"></td></tr>
          <tr>
            <td colspan="4">
              Kepada, <br>
              Yth, Kepala Laboratorium Riset <br>
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
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">NIM</td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Program studi</td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Fakultas</td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Universitas</td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">Alamat</td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;">No. HP/CP </td>
            <td style="padding-top: 0px;padding-bottom: 0px;">:</td>
          </tr>
          <tr>
            <td colspan="4">
              Memohon izin pemakaian laboratorium dan fasilitas untuk keperluan kegitan, <b>Penelitian/Pelatihan/Pengapdian Masyarakat/Magang/Lain-lain* , dengan Judul: </b>
            </td>
          </tr>
          <tr>
            <td colspan="4">
              text judul
            </td>
          </tr>
          <tr>
            <td colspan="4">
              Rencana kegiatan tersebut akan dilaksanakan pada : <br>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Hari/Tanggal </td>
            <td>: </td>
          </tr>
          <tr>
            <td colspan="2" style="padding-left: 40px;padding-top: 0px;padding-bottom: 0px;"> Di Laboratorium</td>
            <td>: </td>
          </tr>
          <tr>
            <td colspan="4">
              Fasilitas laboratorium yang digunakan terlampir. <br>
              Demikian permohonan ini saya buat dan saya menyatakan akan bertanggungjawab sepenuhnya apabila terjadi kerusakan atau kehilangan atas alat terlampir selama saya pakai/pinjam. 
              Atas perhatian dan bantuannya saya sampaikan terimaksih.
            </td>
          </tr>
        </tbody>
      </table>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 50%; text-align: center;">
              Mengetahui,
              Dosen Pembimbing,
              <br>
              NIP
            </td>
            <td style="width: 50%; text-align: center;">
              Pemohon,
              <br>
              NIM
            </td>
          </tr>
        </tbody>
        
      </table>
    </div>
  </div>
</div>
@endsection
@push('css')
  
@endpush
@push('script')
  
@endpush