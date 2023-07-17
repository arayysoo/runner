<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Transaksi</title>
</head>
<body>

	<?php include 'header.php' ?>

	<div class="container-fluid">
		<div class="panel">
			<div class="panel-heading">
				<h2>Data Transaksi</h2>
			</div>
			<div class="panel-body">
				<a href="transaksi_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
				<br/>
				<br/>

				<table class="table table-bordered table-striped">
					<tr>
						<th width="1%">No</th>
						<th>Tanggal Transaksi</th>
						<th>Nama Pasien</th>
						<th>Jumlah Obat</th>
						<th>Tanggal Selesai</th>
						<th>Harga Total</th>
						<th>Status Transaksi</th>
						<th width="15%">AKSI</th>
					</tr>

					<?php 
					include '../koneksi.php'; 
					$data = mysqli_query($koneksi, "select * from pasien, transaksi where transaksi_pasien = idPasien order by transaksi_tgl desc");
					$no = 1;
					while ($d=mysqli_fetch_array($data)) {?>
					<tr>
						<td>INVOICE-<?php echo $no++; ?></td>
						<td><?php echo$d['transaksi_tgl'] ?></td>
						<td><?php echo$d['namaPasien'] ?></td>
						<td><?php echo$d['transaksi_berat'] ?></td>
						<td><?php echo$d['transaksi_selesai'] ?></td>
						<td><?php echo "Rp. ".number_format($d['transaksi_harga']).",-"; ?></td>
						<td>
							<?php 
							if($d['transaksi_status']=="0"){
								echo "<div class='label label-warning'>Belum Lunas</div>";

								}else if ($d['transaksi_status']=="1"){ 
									echo "<div class='label label-info'>Lunas</div>";

								}
							 ?>
						</td>
						<td>
							<a href="transaksi_invoice.php?id=<?php echo $d['idTransaksi']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a> 
							<a href="transaksi_edit.php?id=<?php echo $d['idTransaksi']; ?>" class="btn btn-sm btn-info">Edit</a> 
							<a href="transaksi_hapus.php?id=<?php echo $d['idTransaksi']; ?>" class="btn btn-sm btn-danger">Hapus</a>
						</td>
					</tr>
				<?php } ?>
				
			</table>
		</div>
		
	</div>
	
</div>
<?php include 'footer.php'; ?>

</body>
</html>