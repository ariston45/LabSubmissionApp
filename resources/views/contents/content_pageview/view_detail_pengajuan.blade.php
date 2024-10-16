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
      <h3 class="box-title" style="color: #0277bd"><i class="ri-file-list-3-line" style="margin-right: 4px;"></i> Detail Permohonan </h3>
      <div class="pull-right">
        {{-- ========================================================================================================================================================================== --}}
        @switch($data_pengajuan->lsb_status)
          {{-- Status --}}
          @case('menunggu')
            {{-- User session --}}
            @if (rulesUser(['LAB_HEAD']))
              {{-- submission type --}}
              @if ($data_pengajuan->lsb_type == 'borrowing')
                {{-- user applicant --}}
                @if ($data_pengajuan->level == 'STUDENT')
                  @if ($data_pengajuan->lsb_activity == 'tp_penelitian_skripsi')
                    <a href="{{ url('pengajuan/action-reload-data-skripsi/'.$data_pengajuan->lsb_id) }}">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-restart-line" style="margin-right: 4px;"></i> Reload Data Skripsi</button>
                    </a>
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#" onclick="actionConfirmPayment();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-percent-line" style="margin-right: 4px;"></i> Set Diskon</button>
                    </a>
                    @if ($data_order->los_confirm_payment == 'true')
                      <a href="#" onclick="actionAccept();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @else
                      <a href="#">
                        <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @endif
                  @endif
                @elseif ($data_pengajuan->level == 'LECTURE')
                  <a href="#" onclick="actionConfirmPayment();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                  </a>
                  @if ($data_order->los_confirm_payment == 'true')
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#">
                      <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  <a href="#" onclick="actionConfirmPayment();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                  </a>
                  @if ($data_order->los_confirm_payment == 'true')
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#">
                      <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @endif
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                {{-- user applicant --}}
                @if ($data_pengajuan->level == 'STUDENT')
                  @if ($data_pengajuan->lsb_activity == 'tp_penelitian_skripsi')
                    <a href="{{ url('pengajuan/action-reload-data-skripsi/'.$data_pengajuan->lsb_id) }}">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-restart-line" style="margin-right: 4px;"></i> Reload Data Skripsi</button>
                    </a>
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#" onclick="actionConfirmPayment();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                    </a>
                    @if ($data_order->los_confirm_payment == 'true')
                      <a href="#" onclick="actionAccept();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @else
                      <a href="#">
                        <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @endif
                  @endif
                @elseif ($data_pengajuan->level == 'LECTURE')
                  <a href="#" onclick="actionConfirmPayment();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                  </a>
                  @if ($data_order->los_confirm_payment == 'true')
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#">
                      <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  <a href="#" onclick="actionConfirmPayment();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                  </a>
                  @if ($data_order->los_confirm_payment == 'true')
                    <a href="#" onclick="actionAccept();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @else
                    <a href="#">
                      <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                    </a>
                  @endif
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == true)
                  {{-- user applicant --}}
                  @if ($data_pengajuan->level == 'STUDENT')
                    @if ($data_pengajuan->lsb_activity == 'tp_penelitian_skripsi')
                      <a href="{{ url('pengajuan/action-reload-data-skripsi/'.$data_pengajuan->lsb_id) }}">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-restart-line" style="margin-right: 4px;"></i> Reload Data Skripsi</button>
                      </a>
                      <a href="#" onclick="actionAccept();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @else
                      <a href="#" onclick="actionConfirmPayment();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                      </a>
                      @if ($data_order->los_confirm_payment == 'true')
                        <a href="#" onclick="actionAccept();">
                          <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                        </a>
                      @else
                        <a href="#">
                          <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                        </a>
                      @endif
                    @endif
                  @elseif ($data_pengajuan->level == 'LECTURE')
                    <a href="#" onclick="actionConfirmPayment();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                    </a>
                    @if ($data_order->los_confirm_payment == 'true')
                      <a href="#" onclick="actionAccept();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @else
                      <a href="#">
                        <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @endif
                  @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                    <a href="#" onclick="actionConfirmPayment();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-wallet-3-line" style="margin-right: 4px;"></i> Set Diskon</button>
                    </a>
                    @if ($data_order->los_confirm_payment == 'true')
                      <a href="#" onclick="actionAccept();">
                        <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @else
                      <a href="#">
                        <button class="btn btn-flat btn-xs btn-default" disabled><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                      </a>
                    @endif
                  @endif
                @endif
              @endif
            @elseif (rulesUser(['LAB_SUBHEAD']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                {{-- user applicant --}}
              @elseif ($data_pengajuan->lsb_type == 'rental')

              @elseif ($data_pengajuan->lsb_type == 'testing')
                @if ($data_pengajuan->level == 'STUDENT')
                  <a href="{{ url('pengajuan/action-reload-data-skripsi/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-restart-line" style="margin-right: 4px;"></i> Reload Data Skripsi</button>
                  </a>
                @endif
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == false)
                  <a href="#" onclick="actionResponKasublab();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                  </a>
                @endif
              @endif
            @elseif (rulesUser(['LAB_TECHNICIAN']))
            @elseif (rulesUser(['STUDENT']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                @if ($data_pengajuan->lsb_activity == 'tp_lain_lain')
                  @if ($data_order->los_confirm_payment == 'true')
                    <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                  @endif
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($data_pengajuan->lsb_activity == 'tp_lain_lain')
                  @if ($data_order->los_confirm_payment == 'true')
                    <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                  @endif
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == true)
                  @if ($data_pengajuan->lsb_activity == 'tp_lain_lain')
                    @if ($data_order->los_confirm_payment == 'true')
                      <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                    @endif
                  @endif
                @endif
              @endif
            @elseif (rulesUser(['LECTURE']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                @if ($data_order->los_confirm_payment == 'true')
                  <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($data_order->los_confirm_payment == 'true')
                  <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == true)
                  @if ($data_order->los_confirm_payment == 'true')
                    <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                  @endif
                @endif
              @endif
            @elseif (rulesUser(['PUBLIC_MEMBER','PUBLIC_NON_MEMBER']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                @if ($data_order->los_confirm_payment == 'true')
                  <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($data_order->los_confirm_payment == 'true')
                  <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == true)
                  @if ($data_order->los_confirm_payment == 'true')
                    <button class="btn btn-flat btn-xs btn-default" onclick="actionUploadBukti()"><i class="ri-upload-2-line" style="margin-right: 4px;"></i> Upload Bukti Bayar</button>
                  @endif
                @endif
              @endif
            @endif
          @break
          @case('disetujui')
            @if (rulesUser(['LAB_HEAD']))
              {{-- submission type --}}
              @if ($data_pengajuan->lsb_type == 'borrowing')
              @elseif ($data_pengajuan->lsb_type == 'rental')
              @elseif ($data_pengajuan->lsb_type == 'testing')
              @endif
            @elseif (rulesUser(['LAB_SUBHEAD']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                {{-- user applicant --}}
                @if ($data_pengajuan->level == 'STUDENT')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal Pendamping</button>
                    </a>
                  @endif
                  @if ($data_result != null)
                    <a href="#" onclick="actValidationReport()">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Validasi Laporan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'LECTURE')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal Pendamping</button>
                    </a>
                  @endif
                  @if ($data_result != null)
                    <a href="#" onclick="actValidationReport()">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Validasi Laporan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal Pendamping</button>
                    </a>
                  @endif
                  {{-- <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a> --}}
                  <a href="#" onclick="actEndRentalReport()">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Peminjaman Selesai</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                {{-- user applicant --}}
                @if ($data_pengajuan->level == 'STUDENT')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal</button>
                    </a>
                  @endif
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == null)
                      <button class="btn btn-flat btn-xs btn-primary" onclick="actRentTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Pinjamkan Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == 'loaned')
                      <button class="btn btn-flat btn-xs btn-warning" onclick="actReturnTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Konfirmasi Pengembalian Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @if ($data_result != null)
                    <a href="#" onclick="actValidationReport()">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Validasi Laporan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'LECTURE')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal</button>
                    </a>
                  @endif
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == null)
                      <button class="btn btn-flat btn-xs btn-primary" onclick="actRentTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Pinjamkan Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == 'loaned')
                      <button class="btn btn-flat btn-xs btn-warning" onclick="actReturnTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Konfirmasi Pengembalian Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @if ($data_result != null)
                    <a href="#" onclick="actValidationReport()">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Validasi Laporan</button>
                    </a>
                  @endif
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal</button>
                    </a>
                  @endif
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == null)
                      <button class="btn btn-flat btn-xs btn-primary" onclick="actRentTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Pinjamkan Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == 'loaned')
                      <button class="btn btn-flat btn-xs btn-warning" onclick="actReturnTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Konfirmasi Pengembalian Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  <a href="#" onclick="actEndRentalReport()">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-pass-valid-line" style="margin-right: 4px;"></i> Sewa Alat Selesai</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
                {{-- cek acc kasublab --}}
                @if ($param_acc_subhead == false)
                  <a href="#" onclick="actionResponKasublab();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Respon Pengajuan</button>
                  </a>
                @endif
                @if ($data_pengajuan->level == 'STUDENT')
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @elseif ($data_pengajuan->level == 'LECTURE')
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @endif
              @endif
            @elseif (rulesUser(['LAB_TECHNICIAN']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                @if ($data_pengajuan->level == 'STUDENT')
                  <a href="#" onclick="actionSetTechConfirm();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Konfirmasi Validasi</button>
                  </a>
                @elseif ($data_pengajuan->level == 'LECTURE')
                  <a href="#" onclick="actionSetTechConfirm();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Konfirmasi Validasi</button>
                  </a>
                @elseif ($data_pengajuan->level == 'PUBLIC_MEMBER' || $data_pengajuan->level == 'PUBLIC_NON_MEMBER')
                  <a href="#" onclick="actionSetTechConfirm();">
                    <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Konfirmasi Validasi</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($user_technical == null)
                    <a href="#" onclick="actionSetTech();">
                      <button class="btn btn-flat btn-xs btn-default"><i class="ri-flag-line" style="margin-right: 4px;"></i> Set Teknikal</button>
                    </a>
                  @endif
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == null)
                      <button class="btn btn-flat btn-xs btn-primary" onclick="actRentTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Pinjamkan Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
                  @foreach ($data_facility_listed as $list)
                    @if ($list->lsf_loan_status == 'loaned')
                      <button class="btn btn-flat btn-xs btn-warning" onclick="actReturnTool()"><i class="ri-tools-line" style="margin-right: 4px;"></i>Konfirmasi Pengembalian Alat/Fasilitas</button>
                      @break
                    @endif
                  @endforeach
              @elseif ($data_pengajuan->lsb_type == 'testing')
              @endif
            @elseif (rulesUser(['STUDENT']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                {{-- user applicant --}}
                @if ($data_result == null)
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($data_result == null)
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
              @endif
            @elseif (rulesUser(['LECTURE']))
              @if ($data_pengajuan->lsb_type == 'borrowing')
                {{-- user applicant --}}
                @if ($data_result == null)
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'rental')
                @if ($data_result == null)
                  <a href="{{ url('pengajuan/form-laporan/'.$data_pengajuan->lsb_id) }}">
                    <button class="btn btn-flat btn-xs btn-success"><i class="ri-draft-line" style="margin-right: 4px;"></i> Upload Laporan</button>
                  </a>
                @endif
              @elseif ($data_pengajuan->lsb_type == 'testing')
              @endif
            @elseif (rulesUser(['PUBLIC_MEMBER','PUBLIC_NON_MEMBER']))
            @endif
          @break
          @case('ditolak')
          @break
          @default
        @endswitch
        <a href="{{ url('pengajuan/viewpage-pengajuan-pdf/'.$data_pengajuan->lsb_id) }}">
          <button class="btn btn-flat btn-xs btn-default"><i class="ri-mail-download-fill" style="margin-right: 4px;"></i> Download Surat</button>
        </a>
        <a href="{{ url('pengajuan') }}">
          <button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup</button>
        </a>
      </div>
    </div>
    <div class="box-body">
      @if ($data_pengajuan->lsb_status == 'menunggu')
        @if ($data_pengajuan->no_id == DataAuth()->no_id)
        <div class="callout bg-purple-active">
          Harap cek email secara berkala untuk mendapatkan informasi mengenai pembayaran.
        </div>
        @endif
      @endif
      @if (session('error_bukti_bayar'))
        <div class="alert alert-danger">
          {{ session('error_bukti_bayar') }}
        </div>
      @endif
      {{-- {{ $data_pengajuan }} --}}
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td style="width: 30%;"><b>Nama</b></td>
            <td style="width: 70%;">
              {{ $data_pengajuan->name }}
              <div>
                @switch($data_pengajuan->level)
                  @case('STUDENT')
                  <i>Kategori pengguna: Mahasiswa FT</i>
                  @break
                  @case('LECTURE')
                  <i>Kategori pengguna: Dosen FT</i>  
                  @break
                  @case('PUBLIC_MEMBER')
                  <i>Kategori pengguna: Umum Anggota UNESA</i>  
                  @break
                  @case('PUBLIC_NON_MEMBER')
                  <i>Kategori pengguna: Umum Non Anggota UNESA</i>  
                  @break
                  @default
                    
                @endswitch
                <i></i>
              </div>
              {{-- <div class="pull-right">Test</div> --}}
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>NIM / No.ID</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->no_id }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Program Studi</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->usd_prodi }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Fakultas</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->usd_fakultas }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Universitas/Instansi</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->usd_universitas }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Alamat</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->usd_address }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>No. HP/CP</b></td>
            <td style="width: 70%;">{{ $data_pengajuan->usd_phone }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Keperluan Kegiatan</b></td>
            <td style="width: 70%;">{{ strActivity($data_pengajuan->lsb_activity) }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Tujuan</b></td>
            <td style="width: 70%;">
              @if ($data_pengajuan->lsb_purpose == null || $data_pengajuan->lsb_purpose == "")
                --
              @else
                {{$data_pengajuan->lsb_purpose}}
              @endif
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Judul</b></td>
            <td style="width: 70%;">{{ strJudul($data_pengajuan->lsb_title) }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Kategori Pengajuan</b></td>
            <td style="width: 70%;">
              @if ($data_pengajuan->lsb_type == 'borrowing')
              <b>Peminjaman Laboratorium</b>
              @elseif ($data_pengajuan->lsb_type == 'rental')
              <b>Sewa Alat Laboratorium</b>
              @else
              <b>Pengujian Sampel</b>
              @endif
            </td>
          </tr>
          @foreach ( $data_adviser as $value)
            <tr>
              <td style="width: 30%;"><b>{{ strJudul($value->las_byname) }}</b></td>
              <td style="width: 70%;">
                <div class="row">
                  <div class="col-sm-12">
                    NIP <span style="margin-right: 5px;margin-left: 5px;">:</span> {{ strJudul($value->las_nip) }}
                  </div>
                  <div class="col-sm-12">
                    Nama <span style="margin-right: 5px;margin-left: 5px;">:</span> {{ strJudul($value->las_fullname) }}
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          <tr>
            <td>
              <b>Diajukan pada </b>
            </td>
            <td>
              {{ date('Y-m-d H:i:s', strtotime($data_pengajuan->dt_ajukan)) }}
            </td>
          </tr>
          <tr>
            <td style="width: 30%;">
              <b>Hari/Tanggal </b>
              @if ($data_pengajuan->lsb_type == 'testing')
                <b>Rilis Hasil</b>
              @elseif ($data_pengajuan->lsb_type == 'rental')
                <b>Peminjaman</b>
              @else
                <b>Pelaksanaan</b>
              @endif
            </td>
            <td style="width: 70%;">{!! $web_date !!}</td>
          </tr>
          @if ($data_pengajuan->lsb_type == 'rental')
          <tr>
            <td style="width: 30%;"><b>Serah/Terima Alat</b></td>
            <td style="width: 70%;">
              Tanggal alat dipinjamkan : 
              @foreach ( $data_facility_listed as $list)
                @if ($list != null)
                {{ $list->lsf_out_time }} <br>
                <img src="{{ url('storage/data_img/'.$list->lsf_out_img) }}" alt="" style="max-width: 300px;">
                @break
                @endif
              @endforeach
              <hr style="margin-bottom: 3px;margin-top: 3px;">
              Tanggal alat dikembalikan : 
              @foreach ( $data_facility_listed as $list)
                @if ($list != null)
                {{ $list->lsf_in_time }} <br>
                <img src="{{ url('storage/data_img/'.$list->lsf_in_img) }}" alt="" style="max-width: 300px;">
                @break
                @endif
              @endforeach
              {{-- Tanggal alat Dikembalikan : {{ $data_facility_listed->lsf_in_img }} <br> --}}
            </td>
          </tr>
          @endif
          <tr>
            <td style="width: 30%;"><b>Laboratorium</b></td>
            <td style="width: 70%;">{{ strJudul($data_pengajuan->lab_name) }}</td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Fasilitas Laboratorium</b></td>
            <td style="width: 70%;">
              <table>
                <tr>
                  <th>Daftar fasilitas terdaftar</th>
                </tr>
                @if ($data_facility_listed->count() == 0)
                <tr><td>--</td></tr>
                @else
                @foreach ($data_facility_listed as $list)
                    <tr>
                      <td>
                        <b>-</b> {{ $list->laf_name }} <i>[Jumlah Unit : {{ $list->lsf_cnt_unit }}]</i> 
                      </td>
                    </tr>
                    @endforeach
                @endif
                <tr>
                  <th>Daftar fasilitas tidak terdaftar</th>
                </tr>
                @if ($data_facility_unlisted->count() == 0)
                <tr><td>--</td></tr>
                @else
                  @foreach ($data_facility_unlisted as $list)
                    <tr>
                      <td>
                        <b>-</b> {{ $list->lsf_facility_name }} 
                      </td>
                    </tr>
                  @endforeach
                @endif
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Laporan</b></td>
            <td style="width: 70%;">
              @if ($data_result == null)
                --
              @else
                @if ($data_result->lsr_file_result == null)
                  --
                @else
                  <a href="{{ route('download_result_report',['filename'=> $data_result->lsr_file_result]) }}">{{ $data_result->lsr_file_result }}</a> 
                  @if ($errors->has('file_laporan_err'))
                  <br> <span style="color: red;"><i>{{ $errors->first('file_laporan_err') }}</i></span>
                  @endif
                @endif
              @endif
            </td>
          </tr>
          {{-- <tr>
            <td style="width: 30%;"><b>Lampiran Jurnal/Skripsi</b></td>
            <td style="width: 70%;">
              @if ($data_result == null)
              --
              @else
                @if ($data_result->lsr_file_attachment == null)
                --
                @else
                  <a href="{{ route('download_attachment_student',['filename'=> $data_result->lsr_file_attachment]) }}">{{ $data_result->lsr_file_attachment }}</a> 
                  @if ($errors->has('file_laporan_err'))
                  <br> <span style="color: red;"><i>{{ $errors->first('file_laporan_err') }}</i></span>
                  @endif
                @endif
              @endif
            </td>
          </tr> --}}
          {{-- <tr>
            <td style="width: 30%;"><b>Laporan Legalitas</b></td>
            <td style="width: 70%;">
              @if ($data_result == null)
                --
              @else
                @if ($data_result->lsr_file_legalization == null)
                  --
                @else
                <a href="{{ route('download_legalization_report',['filename'=> $data_result->lsr_file_legalization]) }}">{{ $data_result->lsr_file_legalization }}</a> 
                @if ($errors->has('file_laporan_err'))
                  <br> <span style="color: red;"><i>{{ $errors->first('file_laporan_err') }}</i></span>
                  @endif
                @endif
              @endif
            </td>
          </tr> --}}
          <tr>
            <td style="width: 30%;"><b>Validasi Laporan</b></td>
            <td style="width: 70%;">
              @if ($data_result  == null)
                --
              @else
                @if ($data_result->lsr_status_validation == 'false')
                  Laporan belum divalidasi.
                @else
                  Laporan sudah di validasi oleh {{ $data_result->name }} <br>
                  <i>Catatan Kasublab : {{ $data_result->lsr_notes }}</i>
                @endif
              @endif
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Bukti Pembayaran</b></td>
            <td style="width: 70%;">
              @if ($data_pengajuan->lsb_file_1 == null)
                --
              @else
                <a href="{{ route('download_bukti_bayar',['filename'=> $data_pengajuan->lsb_file_1]) }}">{{ $data_pengajuan->lsb_file_1 }}</a> 
                @if ($errors->has('file_err'))
                <br> <span style="color: red;"><i>{{ $errors->first('file_err') }}</i></span>
                @endif
              @endif
            </td>
          </tr>
          <tr>
            <td> <b>Detail Order</b></td>
            <td>
              <table>
                <tr>
                  @if ($data_pengajuan->lab_costbase == 'by_day')
                  <td colspan="2"><b>Daftar Hari :</b></td>
                  @elseif ($data_pengajuan->lab_costbase == 'by_tool')
                    <td colspan="2"><b>Daftar Alat dan Fasilitas :</b></td>
                  @elseif ($data_pengajuan->lab_costbase == 'by_sample')
                    <td colspan="2"><b>Jumlah sample : </b></td>
                    @endif
                </tr>
                @foreach ($data_detail_order as $value)
                <tr>
                    <td style="padding: 2px 10px 2px 2px;">{{ $value->lod_item_name }}</td>
                    <td style="padding: 2px 2px 2px 2px;">: {{ funCurrencyRupiah($value->lod_cost) }}</td>
                  </tr>
                  @if ($value->lod_note_order != null)
                  <tr>
                    <td colspan="2" style="padding: 2px 10px 2px 2px;"><i>Catatan: {{ $value->lod_note_order }}</i></td>
                  </tr> 
                  @endif
                  @endforeach
                <tr>
                  <td style="padding: 2px 10px 2px 2px;">Jumlah Biaya</td>
                  <td style="padding: 2px 2px 2px 2px;">: ({{ funCurrencyRupiah($data_order->los_cost_total) }})</td>
                </tr>
                <tr>
                  <td colspan="2"><b>Potongan biaya</b></td>
                </tr>
                <tr>
                  <td style="padding: 2px 10px 2px 2px;">
                    Potongan @if($data_order->los_cost_reduction_percent == null) [0%] @else [{{ $data_order->los_cost_reduction_percent }}%] @endif
                  </td>
                  <td style="padding: 2px 2px 2px 2px;">: - {{funCurrencyRupiah($data_order->los_cost_reduction)}}</td>
                </tr>
                <tr>
                  <td colspan="2"><b>Total Biaya</b></td>
                </tr>
                <tr>
                  <td style="padding: 2px 10px 2px 2px;">Total</td>
                  <td style="padding: 2px 2px 2px 2px;">: {{ funCurrencyRupiah($data_order->los_cost_after) }}</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Kepala Laboratorium</b></td>
            <td style="width: 70%;">
              {!! $web_head_acc !!}
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Kepala Sub Lab</b></td>
            <td style="width: 70%;">
              {!! $web_subhead_acc !!}
            </td>
          </tr>
          <tr>
            <td style="width: 30%;"><b>Teknisi Lab</b></td>
            <td style="width: 70%;">
            @if ($user_technical == null)
            --
            @else
            {{ strJudul($user_technical->name) }} 
            <br> <i>No. Kontak: {{ $user_technical->usd_phone }}</i>
            {{-- @dd("test") --}}
            @endif
            
          </td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</div>
<div class="modal" id="modalRentConfirm" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi Peminjaman Alat/Fasilitas</h4>
			</div>
      <form action="{{ route('action_rent_tool') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
            Anda akan meminjamkan alat atau fasilitas sesuai dengan pengajuan. Sebelum alat dipinjamkan silakan upload foto/gambar pada form dibawah ini.
					</div>
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-pinjam" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-alat-pinjam" name="foto_alat_dipinjam" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Oke</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal" id="modalReturnConfirm" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Konfirmasi Pengembalian Alat/Fasilitas</h4>
			</div>
      <form action="{{ route('action_return_tool') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
            Alat atau fasiltas yang telah dipinjam oleh pemohon sudah dikembalikan.
          </div>
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto-kembali" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-alat-kembali" name="foto_alat_kembali" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Oke</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal" id="modalTechConfirm" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Mengonfirmasi Kasublab Untuk Memvalidasi Laporan</h4>
			</div>
      <form action="{{ route('action_konfirmasi_tech') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
					Pemohon telah menyelesaikan peminjaman lab dan sudah mengupload laporan.
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal" id="err_acc_modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Respon Pengajuan Gagal</h4>
			</div>
      <div class="modal-body">
        @if ($errors->has('file_acc_arr'))
        <span style="color: red;"><i>{{ $errors->first('file_acc_arr') }}</i></span>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
      </div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalUploadBukti" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Bukti Pembayaran</h4>
			</div>
			<form action="{{ route('upload_bukti_pembayaran') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
            <div class="form-group has-feedback" style="margin-bottom: 12px;">
              Silakan capture/screenshot bukti bayar anda, kemudaian upload form berikut dalam format png, jpg, jpeg.
            </div>
						<div class="input-group">
							<span class="input-group-btn">
								<span id="btn-file-foto" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload" name="bukti_pembayaran" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalPayment" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Diskon Pembayaran </h4>
			</div>
			<form action="{{ route('confirm_payment') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Set Diskon
						</label>
						<input id="inp-reduction" type="number" class="form-control" name="reduction" oninput="actInputReduction()">
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAcceptable" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Respon Pengajuan</h4>
			</div>
			<form action="{{ route('update_acceptable_submission') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
					<div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Respon
						</label>
						<select name="inp_acc" id="inp-persetujuan" class="form-control" placeholder="">
							<option value="{{ null }}">Pilih Respon</option>
              <option value="disetujui">Disetujui</option>
              <option value="ditolak">Ditolak</option>
						</select>
					</div>
          <div class="form-group has-feedback" style="margin-bottom: 0px;">
						<label>
							Catatan
						</label>
						<textarea name="inp_catatan" class="form-control" id="" cols="30" rows="10"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalSetTech" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Teknikal Pendamping</h4>
			</div>
			<form action="{{ route('update_technical_submission') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
					<div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Teknikal Pendamping
						</label>
						<select type="text" class="form-control" name="inp_teknisi" id="inp-teknisi-i" value="" placeholder="Pilih user..">
              <option value="{{ null }}">Pilih teknikal pendamping</option>
              @foreach ( $user_technical_lab as $list)
              <option value="{{ $list->id }}" >{{ $list->name }}</option>
              @endforeach
            </select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalResponPengajuanLabtest" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Respon Pengajuan</h4>
			</div>
			<form action="{{ route('update_acceptable_submission_kasublab') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
					<div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Respon
						</label>
						<select type="text" class="form-control" name="inp_acc" id="inp-acc" value="">
              <option value="{{ null }}">Pilih Respon</option>
              <option value="disetujui">Disetujui</option>
              <option value="disetujui_rejadwal">Disetujui dengan penjadwalan ulang publikasi hasil</option>
            </select>
					</div>
          <div class="form-group has-feedback" style="margin-bottom: 0px;">
						<label>
							Penjadwalan Ulang Publikasi
						</label>
						<input type="date" class="form-control" name="date_rejadwal">
					</div>
          <div class="form-group has-feedback" style="margin-bottom: 0px;">
						<label>
							Catatan
						</label>
						<textarea name="inp_catatan" class="form-control" id="" cols="30" rows="5"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalSetTechReport" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Laporan Kegiatan</h4>
			</div>
			<form action="{{ route('update_technical_report_submission') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          <input type="hidden" name="lab_subhead" value="{{ $data_pengajuan->lab_head }}">
          <input type="hidden" name="inp_status" value="selesai">
					{{-- <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Status Kegiatan
						</label>
						<select type="text" class="form-control" name="inp_status" id="inp-status" value="" placeholder="Pilih status..">
              <option value=""></option>
              <option value="selesai">Kegiatan Selesai</option>
              <option value="tunda">Periksa Laporan</option>
            </select>
					</div> --}}
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Laporan Kegiatan
						</label>
						<div class="input-group">

							<span class="input-group-btn">
								<span id="btn-file-foto" class="btn btn-default btn-file btn-flat">
									Buka Berkas <input type="file" id="id-upload" name="laporan_kegiatan" >
								</span>
							</span>
              <input type="text" class="form-control" readonly="" name="image2">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalValidationReport" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Validasi Laporan</h4>
			</div>
			<form action="{{ route('update_validation_report') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          @if ($data_result == null)
            <input type="hidden" name="lsr_id" value="">
          @else
            <input type="hidden" name="lsr_id" value="{{ $data_result->lsr_id }}">
          @endif
          <input type="hidden" value="selesai" name="inp_status">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Tulis Catatan
						</label>
            <textarea class="form-control" rows="3" name="inp_catatan" placeholder="Enter ..." style="width: 100%;"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Kirim</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalEndRental" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Laporan Selesai</h4>
			</div>
			<form action="{{ route('update_pengajuan_selesai') }}" method="POST" enctype="multipart/form-data" autocomplete="new-password">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lsb_id" value="{{ $data_pengajuan->lsb_id }}">
          @if ($data_result == null)
            <input type="hidden" name="lsr_id" value="">
          @else
            <input type="hidden" name="lsr_id" value="{{ $data_result->lsr_id }}">
          @endif
          <input type="hidden" value="selesai" name="inp_status">
          <div class="form-group has-feedback" style="margin-bottom: 12px;">
						<label>
							Tulis Catatan
						</label>
            <textarea class="form-control" rows="3" name="inp_catatan" placeholder="Enter ..." style="width: 100%;"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary btn-flat"><i class="ri-save-3-line" style="margin-right: 5px;"></i>Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="modalMssg" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Persetujuan Pengajuan</h4>
			</div>
      <div class="modal-body">
        {{ $errors->first('inp_error_a') }}.
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-sm btn-default btn-flat" data-dismiss="modal"><i class="ri-eraser-fill" style="margin-right: 5px;"></i>Tutup</button>
      </div>
		</div>
	</div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
  /* .ts-wrapper.multi .ts-control>div{

  } */
  .ts-control {
		border-radius: 0px;
    padding: 6px 12px;
	}
  /* .has-items .ts-control>input{
    margin: 4px 4px !important;
  } */
	.form-select {
		border-radius: 0px;
	}
  .focus .ts-control {
    border-color: #0277bd;
    box-shadow: 0 0 0 0rem rgba(254, 255, 255, 0.25);
    outline: 0;
  }
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- varibles --}}
<script>
</script>
@if ($errors->has('inp_error_a'))
{{-- <span style="color: red;"><i>{{ $errors->first('inp_lab') }}</i></span> --}}
<script>
  $('#modalMssg').modal('show');
</script>
@endif
{{-- function --}}
<script>
  function actRentTool() {
    $('#modalRentConfirm').modal('show');
  };
  function actReturnTool() {
    $('#modalReturnConfirm').modal('show');
  };
  function actionUploadBukti() {
    $('#modalUploadBukti').modal('show');
  };
  function actionConfirmPayment() {
    $('#modalPayment').modal('show');
  };
  function actionAccept() {
    $('#modalAcceptable').modal('show');
  };
  function actionSetTech() {  
    $('#modalSetTech').modal('show');
    var par_a = 'LAB_TECHNICIAN';
		var dataOption_users = [];
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: 'POST',
			url: "{{ route('source-data-users') }}",
			data: {
				"level":par_a
			},
			async: false,
			success: function(result) {
				var dataOpt_users = JSON.parse(result);
				for (let index = 0; index < dataOpt_users.length; index++) {
          dataOption_users.push({
            id:dataOpt_users[index].id,
            title:dataOpt_users[index].title,
          });
        }
			},
		});
    select_technician.addOptions(dataOption_users);
  };
  function actionSetTechReport() {
    $('#modalSetTechReport').modal('show');
  };
  function actValidationReport(params) {
    $('#modalValidationReport').modal('show');
  };
  function actEndRentalReport(params) {
    $('#modalEndRental').modal('show');
  };
  function actionSetTechConfirm() {
    $('#modalTechConfirm').modal('show');
  };
  function actionResponKasublab() {
    $('#modalResponPengajuanLabtest').modal('show');
  };
  function actInputReduction() {
    var val_reduction = $('#inp-reduction').val();
    if (val_reduction > 100) {
      $('#inp-reduction').val(100);
    }else if(val_reduction < 0){
      $('#inp-reduction').val(0);
    }
  };
</script>
{{-- call by id or class --}}
<script>
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),
      log = label;
      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }
    });
  });
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto-pinjam :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto-pinjam :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),
      log = label;
      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }
    });
  });
  $(document).ready( function() {
    $(document).on('change', '#btn-file-foto-kembali :file', function() {
      var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [label]);
    });
    $('#btn-file-foto-kembali :file').on('fileselect', function(event, label) {
      var input = $(this).parents('.input-group').find(':text'),
      log = label;
      if( input.length ) {
        input.val(log);
      } else {
        if( log ) alert(log);
      }
    });
  });
</script>
@if ($errors->has('file_acc_arr'))
<script>
  $(document).ready(function() {
    $('#err_acc_modal').modal('show');
  });
</script>
@endif
@endpush