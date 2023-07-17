<?php
include '../koneksi.php';

$id = $_POST['id'];
$pasien = $_POST['pasien'];
$jumlah = $_POST['total'];
$selesai= $_POST['tgl_selesai'];
$status = $_POST['status'];

$h = mysqli_query($koneksi,"select harga_rawat from harga");
$harga_rawat = mysqli_fetch_assoc($h);
$harga = $jumlah * $harga_rawat['harga_rawat'];
mysqli_query($koneksi,"update transaksi set transaksi_tgl='$selesai', transaksi_pasien='$pasien', transaksi_harga='$harga', transaksi_berat='$jumlah', transaksi_status='$status' where idTransaksi='$id'");


$jenisObat = $_POST['jenisObat'];
$jumlahObat = $_POST['jumlahObat'];
mysqli_query($koneksi,"delete from obat where transaksi_obat='$id'");
for($x=0;$x<count($jenisObat);$x++){
    if($jenisObat[$x] != ""){
         mysqli_query($koneksi,"insert into obat values('', '$id', '$jenisObat[$x]', '$jumlahObat[$x]')");

    }
}
header("location:transaksi.php");
?>
