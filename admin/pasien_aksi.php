<?php 
include '../koneksi.php';

//menangkap data yang dikirim dari form
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$keluhan = $_POST['keluhan'];

// input data ke table pasien
mysqli_query($koneksi, "insert into pasien values ('','$nama', '$umur', '$alamat', '$keluhan')");

	header("location:pasien.php");

 ?>