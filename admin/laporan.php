<?php include 'header.php'; ?>

<div class="container">
	<div class="panel">
		<div class="panel-heading">
			<h4>Filter Laporan</h4>
		</div>
		<div class="panel-body">
			
			<form action="laporan.php" method="get">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Dari Tanggal</th>
						<th>Sampai Tanggal</th>
						<th width="1%"></th>
					</tr>
					<tr>
						<td>
							<br/>
							<input type="date" name="tgl_dari" class="form-control">
						</td>
						<td>
							<br/>
							<input type="date" name="tgl_sampai" class="form-control">
							<br/>
						</td>
						<td>
							<br/>
							<input type="submit" class="btn btn-primary" value="Filter">
						</td>
					</tr>

				</table>
			</form>

		</div>
	</div>
	<br/>
	<?php
	if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
		$dari = $_GET['tgl_dari'];
		$sampai = $_GET['tgl_sampai'];
		?>
		<div class="panel">
			<div class="panel-heading">
				<h4>Data Laporan Laundry PWD dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
			</div>
			<div class="panel-body">
				
				<a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-print"></i> CETAK</a>
				<br/>
				<br/>
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
					include '../koneksi.php';

					$data = mysqli_query($koneksi, "select * from pasien, transaksi where transaksi_pasien=idPasien and date(transaksi_tgl) > '$dari' and date(transaksi_tgl) < '$sampai' order by idTransaksi desc");
					$no = 1;

					while ($d=mysqli_fetch_array($data)) {
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td>INVOICE-<?php echo $d['idTransaksi']; ?></td>
							<td><?php echo $d['transaksi_tgl']; ?></td>
							<td><?php echo $d['namaPasien']; ?></td>
							<td><?php echo $d['transaksi_berat']; ?></td>
							<td><?php echo $d['transaksi_selesai']; ?></td>
							<td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
							<td>
								<?php
								if($d['transaksi_status']=="0"){
                                echo "<div class='label label-warning'>Belum Lunas</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='label label-info'>Lunas</div>";
                            }?>
							</td>
							
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	<?php } ?>
</div>
<?php include 'footer.php'; ?>