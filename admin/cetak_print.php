<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Informasi PWD</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
	<?php 
	session_start();
	if ($_SESSION['status']!="login") {
		header("location:../index.php?pesan=belum_login");
		// code...
	}
	?>

	<?php 
	include'../koneksi.php';
	?>
	<div class="container">
		<center><h2>Laundry</h2></center>
		<br></br>
		<?php
		if(isset($_GET['dari'])&& isset($_GET['sampai'])){
			$dari=$_GET['dari'];
			$sampai=$_GET['sampai'];
			?>

			<h4>Data Laporan Laundry dari<b><?php echo $dari; ?></b>sampai<b><?php echo $sampai;?></b></h4>
			<table class="table table-bordered table-striped">
				<tr>
					<th width="1%">No</th>
					<th>Invoice</th>
					<th>Tanggal</th>
					<th>Pelanggan</th>
					<th>Berat (Kg)</th>
					<th>Tgl. Selesai</th>
					<th>Harga</th>
					<th>Status</th>
				</tr>

				<?php
					// mengambil data pelanggan dari database
				$data = mysqli_query($koneksi,"select * from pasien, transaksi where transaksi_pasien=idPasien and date(transaksi_tgl) > '$dari' and date(transaksi_tgl) < '$sampai' order by idTransaksi desc");
				$no = 1;
					//mengubah data ke array dan menampilkannya dengan perulangan while
				while($d=mysqli_fetch_array($data)){
					?>
					
						<tr>
						<td><?php echo $no++; ?></td>
						<td>INVOICE-<?php echo $d['idTransaksi']; ?></td>
						<td><?php echo$d['transaksi_tgl'] ?></td>
						<td><?php echo$d['namaPasien'] ?></td>
						<td><?php echo$d['transaksi_berat'] ?></td>
						<td><?php echo$d['transaksi_selesai'] ?></td>
						<td><?php echo "Rp. ".number_format($d['transaksi_harga']).",-"; ?></td>
						<td>
							<?php 
							if($d['transaksi_status']=="0"){
                                echo "<div class='label label-warning'>Belum Lunas</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='label label-info'>Lunas</div>";
                            }
							 ?>
							</td>
						</tr>
						<?php } ?>
						</table>
						 <?php
            }
            ?>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
		
</body>
</html>