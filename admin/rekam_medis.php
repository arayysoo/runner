<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rekam Medis</title>
</head>
<body>
	<?php include 'header.php'; ?>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h2>Data Rekam Medis</h2>
			</div>
			<div class="panel-body">
				<a href="pasien_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
				<br/>
				<br/>

				<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Tanggal Tindakan</th>
						<th>Hasil Anamnesis</th>
						<th>Hasil Pemeriksaan</th>
						<th>Dignosis</th>
						<th width="15%">AKSI</th>
					</tr>

					<?php
					include "../koneksi.php";
					$no = 1;
					$query = mysqli_query($koneksi, "select * from rekam_medis order by tanggal_tindakan asc");
					while ($t = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $t['tanggal_tindakan']; ?></td>
							<td><?php echo $t['hasil_anamnesis']; ?></td>
							<td><?php echo $t['hasil_pemeriksaan']; ?></td>
							<td><?php echo $t['diagnosis']; ?></td>
							<td>
								<a href="pasien_edit.php?id=<?php echo $d['idPasien']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="pasien_hapus.php?id=<?php echo $d['idPasien']; ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>

</body>
</html>