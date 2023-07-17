<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Obat</title>
</head>
<body>
	<?php include 'header.php'; ?>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h2>Data Obat</h2>
			</div>
			<div class="panel-body">
				<a href="pasien_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
				<br/>
				<br/>

				<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Nama Obat</th>
						<th>Jumlah Obat</th>
						<th width="15%">AKSI</th>
					</tr>

					<?php
					include "../koneksi.php";
					$query = mysqli_query($koneksi, "select * from obat order by jenis_obat asc");
					$no = 1;
					while ($t = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $t['jenis_obat']; ?></td>
							<td><?php echo $t['jumlah_obat']; ?></td>
							<td>
								<a href="obat_edit.php?id=<?php echo $d['idObat']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="obat_hapus.php?id=<?php echo $d['idObat']; ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>