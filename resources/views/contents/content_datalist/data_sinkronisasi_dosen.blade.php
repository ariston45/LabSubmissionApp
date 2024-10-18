@extends('layout.app')
@section('title')
SIPLAB | Pengaturan
@endsection
@section('breadcrumb')
<h4>Pengaturan</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Rumpun</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Sinkron Dosen</h3>
			<div class="pull-right">
				<a href="{{ url('pengaturan/user') }}">
					<button class="btn btn-flat btn-xs btn-danger"><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tutup </button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="clearfix"></div>
				<div class="callout bg-purple-active">
          Perhatian, data yang sudah tersinkron masih menggunakan password default <b>"open@123"</b>, harap segera melakaukan penggantian password. 
					Apabila user dosen sudah registrasi sebelumnya silakan menggunkan password yang tersimpan.
        </div>
			<div class="row">
				<div class="col-md-10">
					<table id="tabel_dosen" class="table tabel_custom table-condensed">
						<thead>
							<tr>
								<th style="width: 3%">No</th>
								<th style="width: 30%">Nama</th>
								<th style="width: 30%">Email</th>
								<th style="width: 30%">Prodi</th>
							</tr>
						</thead>
						<tbody>
							@if (count($data_tabel) > 0)
								@php
									$no = 1;
								@endphp
								@foreach ($data_tabel as $list)
								<tr>
									<td>{{$no}}</td>
									<td>{{$list['nama']}}</td>
									<td>{{$list['email']}}</td>
									<td>{{$list['prodi']}}</td>
								</tr>
								@php
									$no++;
								@endphp
								@endforeach
							@else
								<tr>
									<td colspan="4" style="text-align: center;">Data tidak tersedia.</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<style>
	.tabel_custom {
		border-collapse: collapse;
		font-size: 11px;
	}
	.tabel_custom > thead {
		background-color: #0079BA;
		color: #f2f2f2;
	}
	.tabel_custom > thead > tr > th {
		padding: 6px 8px;
	}
	.tabel_custom > tbody > tr > td {
		padding: 2px 8px;
	}
	.tabel_custom tr:nth-child(even){background-color: #f2f2f2;}
	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script>
	$('#check_all').click(function() {
    $('.check_in_data').prop('checked', this.checked);
  });
</script>
<script>
	$(document).ready(function (){
		tabel_siswa = $('#tabel_rumpun').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			lengthChange: true,
			ajax: {
				"url" : "{!! route('source-datatables-rumpun') !!}",
				"type" : "POST",
			},
			columns: [
				{data: 'DT_RowIndex', name: 'DT_RowIndex'},
				{data: 'nama_rumpun', name: 'nama_rumpun', orderable: false, searchable: false },
				{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
			]
		});
	});
</script>
@endpush