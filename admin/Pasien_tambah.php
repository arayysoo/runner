<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Data Pasien</title>
</head>
<body>

	<?php include 'header.php' ?>

	<div class="container-fluid">
		<br/><br/><br/>
		<div class="col-md-5 col-md-offset-3">
			<div class="panel">
				<div class="panel-heading">
					<h2>Tambah Data Pasien Baru</h2>
				</div>
				<div class="panel-body">
					<form method="POST" action="pasien_aksi.php">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama ..">
						</div>
						<div style="margin-top: 3%">
							<label>Umur</label>
							<input type="text" class="form-control" name="umur" placeholder="Masukkan Umur ..">
						</div>
						<div style="margin-top: 3%">
							<label>Alamat</label>
							<input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat ..">
						</div>
						<div style="margin-top: 3%">
							<label>Keluhan</label>
							<input type="text" class="form-control" name="keluhan" placeholder="Masukkan Keluhan ..">
						</div>
						<br/>
						<input type="submit" class="btn btn-primary" value="Simpan">
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php';?>
</body>
</html>