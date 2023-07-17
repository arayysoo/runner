<?php 
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$keluhan = $_POST['keluhan'];

mysqli_query($koneksi, "update pasien set namaPasien='$nama', umurPasien='$umur', alamatPasien='$alamat', keluhanPasien='$keluhan' where idPasien='$id'");

header("location:pasien.php")

 ?>