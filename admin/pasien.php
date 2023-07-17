<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Pasien</title>
</head>
<body>

	<?php include 'header.php' ?>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h2>Data Pasien</h2>
			</div>
			<div class="panel-body">
				<a href="pasien_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
				<br/>
				<br/>

				<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Nama</th>
						<th>Umur</th>
						<th>Alamat</th>
						<th>Keluhan</th>
						<th width="15%">AKSI</th>
					</tr>

					<?php 
						include "../koneksi.php";
						$no = 1;
						$query = mysqli_query($koneksi, "SELECT * FROM pasien order by namaPasien asc");
						while ($d = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $d['namaPasien'] ?></td>
								<td><?php echo $d['umurPasien'] ?></td>
								<td><?php echo $d['alamatPasien'] ?></td>
								<td><?php echo $d['keluhanPasien'] ?></td>
								<td>
									<a href="pasien_edit.php?id=<?php echo $d['idPasien']; ?>" class="btn btn-sm btn-warning">Edit</a>
									<a href="pasien_hapus.php?id=<?php echo $d['idPasien']; ?>" class="btn btn-sm btn-danger">Hapus</a>
								</td>
							</tr>
							<?php 
						}
					 ?>
					
				</table>
			</div>
		</div>
	</div>

<?php include 'footer.php'; ?>
</body>
</html>