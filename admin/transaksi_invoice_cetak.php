<!DOCTYPE html>
<html>
<head>
<title>SISTEM INFORMASI RUMAH SAKIT</title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
</head>
<body>
<!-- cek apakah sudah login -->
<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
}
?>

<?php
include '../koneksi.php';
?>
    <div class="container-fluid">

        <div class="col-md-10 col-md-offset-1">
            <?php
            $id = $_GET['id'];
            $transaksi = mysqli_query($koneksi,"select * from transaksi, pasien where idTransaksi='$id'  and transaksi_pasien=idpasien");
            while($t=mysqli_fetch_array($transaksi)){
                ?>
                <center><h2>RUMAH SAKIT MIKA</h2></center>
                <h3></h3>
                <br/>
                <br/>
                <table class="table">
                    <tr>
                        <th width="20%">No. Invoice</th>
                        <th>:</th>
                        <td>INVOICE-<?php echo $t['idTransaksi']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Tanggal</th>
                        <th>:</th>
                        <td><?php echo $t['transaksi_tgl']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pasien</th>
                        <th>:</th>
                        <td><?php echo $t['namaPasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <th>:</th>
                        <td><?php echo $t['umurPasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td><?php echo $t['alamatPasien']; ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                            <?php
                            if($t['transaksi_status']=="0"){
                                echo "<div class='label label-warning'>Belum Lunas</div>";
                            }else if($t['transaksi_status']=="1"){
                                echo "<div class='label label-info'>Lunas</div>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td><?php echo "Rp. ".number_format($t['transaksi_harga'])." ,-"; ?></td>
                    </tr>
                </table>
                <br/>
                <h4 class="text-center">Daftar Obat</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Obat</th>
                        <th width="20%">Jumlah</th>
                    </tr>
                    <?php
                    $id = $t['transaksi_pasien'];
                    $obat = mysqli_query($koneksi,"select * from obat where transaksi_obat='$id'");

                    while($o=mysqli_fetch_array($obat)){
                        ?>
                        <tr>
                            <td><?php echo $o['jenis_obat']; ?></td>
                            <td width="5%"><?php echo $o['jumlah_obat']; ?></td>
                        </tr>
                        <?php } ?>
                    </table>

                    <br/>
                    <p><center><i>"SALAM SEHAT, SEMOGA CEPAT SEMBUH"</i></center></p>
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