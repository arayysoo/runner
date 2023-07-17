<?php include 'header.php'; ?>
<?php
include '../koneksi.php';
?>
	<?php 
      $koneksi = mysqli_connect('localhost','root','','rsmika');
      $query = mysqli_query($koneksi, "SELECT max(idTransaksi) as kode FROM transaksi");
      $data = mysqli_fetch_array($query);
      $id = $data['kode'];
      $urutan = (int) substr($id, 0, 50);
      $urutan++;
      $id = $urutan;
      ?>

<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h4>Transaksi Rumah Sakit Mika</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>
                <form method="POST" action="transaksi_aksi.php">
                	<div class="form-group">
						<input type="text" class="form-control" name="noregist" value="<?php echo $id; ?>" readonly>
					</div>

                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <select class="form-control" name="pasien" required="required">
                            <option value="">- Pilih Pasien</option>
                            <?php
                            $data = mysqli_query($koneksi,"select * from pasien");
                            while($d=mysqli_fetch_array($data)){
                                ?>
                                <option value="<?php echo $d['idPasien']; ?>"><?php echo $d['namaPasien']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                     <div class="form-group">
                            <label>Jumlah Obat</label>
                            <input type="number" class="form-control" name="total" placeholder="Masukkan jumlah obat .." required="required">
                        </div>
                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required">
                        </div>
                    <br/>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Jenis Obat</th>
                            <th width="20%">Jumlah</th>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="jenisObat[]"></td>
                            <td><input type="number" class="form-control" name="jumlahObat[]"></td>
                        </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>