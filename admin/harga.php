<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Harga</title>
</head>

<body>
	<?php include 'header.php'; ?>

	<div class="container-fluid">
		<div class="col-md-5 col-md-offset-3">
			<div class="panel">
				<div class="panel-heading">
					<h1>Pengaturan Harga Rawat</h1>
				</div>
				<div class="panel-body">
					<?php 
					include '../koneksi.php'; 

					//mengambil data harga rawat dari table harga
					$data = mysqli_query($koneksi, "select harga_rawat from harga");
					while($d = mysqli_fetch_array($data)){
						?>
						<form method="POST" action="harga_update.php">
							<div class="form-group">
								<label>Harga Rawat</label>
								<input type="number" class="form-control" name="harga" value="<?php echo $d['harga_rawat']; ?>">
							</div>
							<input type="submit" class="btn btn-primary" value="Ubah Harga">
						</form>
					<?php  } ?>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>