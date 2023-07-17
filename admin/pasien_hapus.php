<?php 
//menghubungkan koneksi
include '../koneksi.php';

// menagkap data id yang dikirim dari url
$id = $_GET['id'];

//menghapus pasien
mysqli_query($koneksi, "delete from pasien where idPasien='$id'");

//alihkan halaman ke halaman pasien
header("location:pasien.php")

 ?>