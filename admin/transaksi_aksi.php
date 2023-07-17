<?php
include '../koneksi.php';

$id = $_POST['noregist'];
$pasien = $_POST['pasien'];
$jumlah = $_POST['total'];
$selesai= $_POST['tgl_selesai'];
$tgl_hari_ini = date('Y-m-d');
$status = 0;

//mengambil data harga per kilo dari database
    $h = mysqli_query($koneksi,"select harga_rawat from harga");
    $harga_rawat1 = mysqli_fetch_assoc($h);

//menghitung harga laundry, harga perkilo x berat cucian
    $harga = $jumlah * $harga_rawat1['harga_rawat'];

//input data ke table transaksi
    mysqli_query($koneksi, "insert into transaksi values('$id', '$tgl_hari_ini', '$pasien', '$harga', '$jumlah', '$selesai', '$status')");

//menyimpan id dari data yang disimpan pada query insert data sebelumnya
    $id_terakhir = mysqli_insert_id($koneksi);

//menangkap data form input array
    $jenisObat = $_POST['jenisObat'];
    $jumlahObat = $_POST['jumlahObat'];

for($x=0;$x<count($jenisObat);$x++){
    if($jenisObat[$x] != ""){
        mysqli_query($koneksi,"insert into obat values('$id_terakhir', '$id', '$jenisObat[$x]', '$jumlahObat[$x]')");
    }
}
header("location:transaksi.php");
?>