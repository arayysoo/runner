<?php
$koneksi = mysqli_connect("localhost", "root", "", "rsmika");

	if (mysqli_connect_error()) {
		// memeriksa koneksi
		echo "Gagal Koneksi Database: ".mysqli_connect_error();
	}
?>