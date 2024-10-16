@extends('layout.app')
@section('title')
SIPLAB | Dashboard
@endsection
@section('breadcrumb')
<h4>Laboratorium</h4>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-home"></i> Laboratorium</a></li>
	<li class="active">Teknisi Laboratorium</a></li>
</ol>
@endsection
@section('content')
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title" style="color: #0277bd"><i class="ri-database-line" style="margin-right: 4px;"></i> Data Teknisi Laboratorium</h3>
			<div class="pull-right">
				<button class="btn btn-flat btn-xs btn-primary" onclick="actionFormInputTech()" ><i class="ri-add-circle-line" style="margin-right: 4px;"></i> Tambah Teknisi</button>
				{{-- <a href="{{ url('laboratorium/form-input-lab') }}">
				</a> --}}
				<a href="{{ url('laboratorium') }}">
					<button class="btn btn-flat btn-xs btn-danger"><i class="ri-close-circle-line" style="margin-right: 4px;"></i> Tutup</button>
				</a>
			</div>
		</div>
		<div class="box-body">
			<table id="tabel-lab-name" class="table">
				<tbody>
					<tr>
						<td style="width: 20%;"><b>Nama Laboratorium</b></td>
						<td style="width: 1%;">:</td>
						<td style="width: 79%;">{{ $data_lab->lab_name }}</td>
					</tr>
					<tr>
						<td style="width: 20%;"><b>Kepala Laboratorium</b></td>
						<td style="width: 1%;">:</td>
						<td style="width: 79%;">{{ $data_lab->name }}</td>
					</tr>
				</tbody>
			</table>
			<div class="clearfix"></div>
			<table id="tabel-teknisi" class="table tabel-custom table-condensed">
				<thead>
					<tr>
						<th style="width: 5%">No</th>
						<th style="width: 40%">Nama Teknisi</th>
						<th style="width: 20%">No. Kontak</th>
						<th style="width: 20%">Email</th>
						<th style="width: 15%;text-align:center;">Opsi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="modalInputTeechnicians" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Panduan Ujian</h4>
			</div>
			<form action="{{ route('input_user_tech') }}" method="POST">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="lab_id" value="{{ $data_lab->lab_id }}">
					<div class="form-group has-feedback {{ $errors->has('inp_laboratorium') ? ' has-error' : '' }}" style="margin-bottom: 0px;">
						<label>
							Teknisi
						</label>
						<select name="inp_teknisi[]" id="inp-teknisi" class="form-control" placeholder="Input nama user..">
							<option value=""></option>
						</select>
						@if ($errors->has('inp_laboratorium'))
						<span style="color: red;"><i>{{ $errors->first('inp_laboratorium') }}</i></span>
						@endif
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
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/datatables/extensions/FixedHeader/css/fixedHeader.bootstrap.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/plugins/tom-select/dist/css/tom-select.bootstrap4.min.css') }}">
<style>
	/* Select 2 styling */
	.ts-control {
		border-radius: 0px;
    padding: 6px 12px;
	}
	.form-select {
		border-radius: 0px;
	}
  .focus .ts-control {
    border-color: #0277bd;
    box-shadow: 0 0 0 0rem rgba(254, 255, 255, 0.25);
    outline: 0;
  }
	/* Modal styling */
	.modal-header{
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.modal-footer{
		padding-top: 10px;
		padding-bottom: 10px;
	}
	/* Page Table custom */
	#tabel-lab-name{
		margin-bottom: 10px;
		border: 0px;
	}
	#tabel-lab-name > tbody > tr > td {
		border-top: none;
		padding: 0px 2px 2px 2px;
	}
	/* Base Table Custom*/
	.tabel-custom {
		border-collapse: collapse;
		font-size: 11px;
	}
	.tabel-custom > thead {
		background-color: #0079BA;
		color: #f2f2f2;
	}
	.tabel-custom > thead > tr > th {
		padding: 6px 8px;
	}
	.tabel-custom > tbody > tr > td {
		padding: 2px 8px;
	}
	.tabel-custom tr:nth-child(even){background-color: #f2f2f2;}
	/* .tabel_custom td:hover {background-color: #f2f2f2;} */
</style>
@endpush
@push('scripts')
<script src="{{ url('assets/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}"></script>
<script src="{{ url('assets/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ url('assets/plugins/tom-select/dist/js/tom-select.base.js') }}"></script>
{{-- js to variables --}}
<script>
	var tabel_technician = $('#tabel-teknisi').DataTable({
		processing: true,
		serverSide: true,
		responsive: true,
		lengthChange: true,
		columnDefs: [{ orderable: false, targets: 0 }],
		ajax: {
			"url" : "{!! route('source-datatables-teknisi-lab') !!}",
			"type" : "POST",
			"data" :{
				"lab_id" : "{{ $data_lab->lab_id }}"
			}
			,
		},
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'name', name: 'name', orderable: true, searchable: true },
			{data: 'contact', name: 'contact', orderable: true, searchable: true },
			{data: 'email', name: 'email', orderable: true, searchable: true },
			{data: 'opsi', name: 'opsi', orderable: false, searchable: false},
		]
	});
	var select_technician = new TomSelect("#inp-teknisi",{
    create: false,
    maxItems: 10,
		valueField: 'id',
		labelField: 'title',
		searchField: 'title',
		render: {
			option: function(data, escape) {
				return '<div><span class="title">'+escape(data.title)+'</span></div>';
			},
			item: function(data, escape) {
				return '<div id="select-signed-user">'+escape(data.title)+'</div>';
			}
		}
  });
</script>
{{-- Functions Js --}}
<script>
	function actGetUser() {
		var par_a = 'LAB_TECHNICIAN';
		var data_a = [];
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
				data_a = result;
			},
		});
		return data_a;
	};
	function actDelTech(id) {
		var del_url = '{{ url("laboratorium/delete-teknisi/") }}/'+id;
		$.confirm({
			title: 'Konfirmasi Hapus !',
			content: 'Apakah anda yakin akan menghapus teknisi dari laboratorium <b>{{ $data_lab->lab_name }}</b> ?',
			type: 'red',
			animateFromElement: false,
			animation: 'opacity',
			closeAnimation: 'opacity',
			buttons: {
				confirm: {
					text: 'Iya Hapus',
					btnClass: 'btn-danger',
					action: function(){
						location.replace(del_url);
					}
				},
				batal: function () {
				},
			}
		});
	};
	function actionFormInputTech(){
		$('#modalInputTeechnicians').modal('toggle');
		var opt_1 = [];
		select_technician.clear();
		select_technician.clearOptions();
		if (actGetUser() != null) {
			var dataOption = JSON.parse(actGetUser());
			for (let index = 0; index < dataOption.length; index++) {
				opt_1.push({
					id:dataOption[index].id,
					title:dataOption[index].title,
				});
			}
			select_technician.addOptions(opt_1);
		}
	};
</script>
{{-- Running Functions Js --}}
@endpush