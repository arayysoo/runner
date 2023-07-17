<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Informasi Rumah Sakit Mika</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  
</head>

<body style="background: #f0f0f0">
	 <!-- cek sudah login/belum -->
		<?php
		session_start(); 
		if($_SESSION['status']!="login"){ 
		    header("location:../index.php?pesan=belum_login"); 
		} 
		?> 

	<!-- menu navigasi -->
<nav class="navbar navbar-inverse" style="border-radius: 0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" id="bs-example-navbar-collapse-1">RS MIKA</a>
    </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="indexadmin.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a>
          </li>
          <li><a href="pasien.php"><i class="glyphicon glyphicon-user"></i> Pasien</a>
          </li>
          <li><a href="rekam_medis.php"><i class="glyphicon glyphicon-folder-open"></i> Rekam Medis Pasien</a>
          </li>
          <li><a href="obat.php"><i class="glyphicon glyphicon-plus-sign"></i> Obat</a>
          </li>
          <li><a href="transaksi.php"><i class="glyphicon glyphicon-random"></i>  Transaksi</a>
          </li>
          <li><a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i> Laporan</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-wrench"></i> Pengaturan<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="harga.php"><i class="glyphicon glyphicon-usd"></i> Pengaturan Harga</a></li>
              <li><a href="ganti_password.php"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
            </li>
          </ul>

          <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Halo, <b><?php echo $_SESSION['username'];?></b>!</p></li>
        </ul>
      </div>
    </nav>	

</body>
</html>