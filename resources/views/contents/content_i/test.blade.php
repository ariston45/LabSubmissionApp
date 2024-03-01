<div class="container">
	<h2 align="center" style="margin: 30px;">Filter &amp; Search pada PHP ke Semua Kolom</h2>
	<?php 
		$s_jurusan="";
		$s_keyword="";
		if (isset($_POST['search'])) {
			$s_jurusan = $_POST['s_jurusan'];
			$s_keyword = $_POST['s_keyword'];
		}
	?>
	<form method="POST" action="">
		<div class="row mb-3">
			<div class="col-sm-12"><h4>Cari</h4></div>
			<div class="col-sm-3">
				<div class="form-group">
					<select name="s_jurusan" id="s_jurusan" class="form-control">
						<option value="">Filter Jurusan</option>
						<option value="Sistem Informasi" <?php if ($s_jurusan=="Sistem Informasi"){ echo "selected"; } ?>>Sistem Informasi</option>
						<option value="Teknik Informatika" <?php if ($s_jurusan=="Teknik Informatika"){ echo "selected"; } ?>>Teknik Informatika</option>
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<input type="text" placeholder="Keyword" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
				</div>
			</div>
			<div class="col-sm-4" >
				<button id="search" name="search" class="btn btn-warning">Cari</button>
			</div>
		</div>
	</form>

	<table class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<td>No</td>
				<td>Nama Mahasiswa</td>
				<td>Alamat</td>
				<td>Jurusan</td>
				<td>Jenis Kelamin</td>
				<td>Tanggal Masuk</td>
			</tr>
		</thead>
		<tbody>
			<?php
					include 'koneksi.php';
				$search_jurusan = '%'. $s_jurusan .'%';
				$search_keyword = '%'. $s_keyword .'%';
				$no = 1;
				$query = "SELECT * FROM tbl_mahasiswa_search WHERE jurusan LIKE ? AND (nama_mahasiswa LIKE ? OR alamat LIKE ? OR jurusan LIKE ? OR jenis_kelamin LIKE ? OR tgl_masuk LIKE ?) ORDER BY id DESC";
				$dewan1 = $db1->prepare($query);
				$dewan1->bind_param('ssssss', $search_jurusan, $search_keyword, $search_keyword, $search_keyword, $search_keyword, $search_keyword);
				$dewan1->execute();
				$res1 = $dewan1->get_result();

				if ($res1->num_rows > 0) {
					while ($row = $res1->fetch_assoc()) {
						$id = $row['id'];
						$nama_mahasiswa = $row['nama_mahasiswa'];
						$alamat = $row['alamat'];
						$jurusan = $row['jurusan'];
						$jenis_kelamin = $row['jenis_kelamin'];
						$tgl_masuk = $row['tgl_masuk'];
			?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $nama_mahasiswa; ?></td>
					<td><?php echo $alamat; ?></td>
					<td><?php echo $jurusan; ?></td>
					<td><?php echo $jenis_kelamin; ?></td>
					<td><?php echo $tgl_masuk; ?></td>
				</tr>
			<?php } } else { ?> 
				<tr>
					<td colspan='7'>Tidak ada data ditemukan</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</div>