<?php 
//menghubungkan koneksi
include '../koneksi.php';

// menagkap data id yang dikirim dari url
$id = $_GET['id'];

//menghapus pelanggan
mysqli_query($koneksi, "delete from transaksi where idTransaksi='$id'");

mysqli_query($koneksi, "delete from obat where transaksi_obat='$id'");


//alihkan halaman ke halaman pelanggan
header("location:transaksi.php")

?>