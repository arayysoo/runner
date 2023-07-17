<?php include 'header.php'; ?>
<?php
include '../koneksi.php';
?>
<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>

                <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi,"select * from transaksi where idTransaksi='$id'");
                while($t=mysqli_fetch_array($transaksi)){
                    ?>
                    <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['idTransaksi']; ?>">

                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <select class="form-control" name="pasien" required="required">
                                <option value="">- Pilih Pasien</option>
                                <?php
                                $data = mysqli_query($koneksi,"select * from pasien");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <option <?php if($d['idPasien']==$t['transaksi_pasien']){echo "selected='selected'";} ?> value="<?php echo $d['idPasien']; ?>"><?php echo $d['namaPasien']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Obat</label>
                            <input type="number" class="form-control" name="total" placeholder="Masukkan jumlah obat .." value="<?php echo $t['transaksi_berat']; ?>" required="required">
                        </div>

                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $t['transaksi_selesai']; ?>">
                        </div>

                        <br/>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Jenis Obat</th>
                                <th width="20%">Jumlah</th>
                            </tr>

                            <?php
                            $id_transaksi = $t['idTransaksi'];
                            $obat = mysqli_query($koneksi,"select * from obat where idObat='$id_transaksi'");

                            while($o=mysqli_fetch_array($obat)){
                                ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenisObat[]" value="<?php echo $o['jenis_obat']; ?>"></td>
                                    <td><input type="number" class="form-control" name="jumlahObat[]" value="<?php echo $o['jumlah_obat']; ?>"></td>
                                </tr>
                                <?php } ?>
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

                            <div class="form-group alert alert-info">
                                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">Belum Lunas</option>
                                    <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">Lunas</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </form>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>