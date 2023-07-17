<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Data Pasien</title>
</head>
<body>

	<?php include 'header.php' ?>

	<div class="container-fluid">
		<br/><br/><br/>
		<div class="col-md-5 col-md-offset-3">
			<div class="panel">
				<div class="panel-heading">
					<h1>Edit Data Pasien</h1>
				</div>
				<div class="panel-body">
					<?php 
						include '../koneksi.php';

						$id = $_GET['id'];
						$data = mysqli_query($koneksi, "select * from pasien where idPasien='$id'");
						while ($d=mysqli_fetch_array($data)) {?>

							<form method="POST" action="pasien_update.php">
								<div class="form-group">
									<label>Nama</label>
									<input type="hidden" name="id" value="<?php echo $d['idPasien'] ?>">
									<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama .." value="<?php echo $d['namaPasien'] ?>">
								</div>
								<div class="form-group">
									<label>Umur</label>
									<input type="text" class="form-control" name="umur" placeholder="Masukkan Umur .." value="<?php echo $d['umurPasien'] ?>">
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat .." value="<?php echo $d['alamatPasien'] ?>">
								</div>
								<div class="form-group">
									<label>Keluhan</label>
									<input type="text" class="form-control" name="keluhan" placeholder="Masukkan Keluhan .." value="<?php echo $d['keluhanPasien'] ?>">
								</div>
								<input type="submit" class="btn btn-primary" value="simpan">
							</form>
						<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>

</body>
</html>