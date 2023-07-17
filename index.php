<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Informasi Rumah Sakit Mika</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>

</head>
<body style="background: #f0f0f0;">
	<br/>
		<br/>
			<br/>
				<br/>
				<center>
					<h1><b>SISTEM INFORMASI RUMAH SAKIT MIKA</b></h1>
				</center>
				<br/>
			<br/>
		<br/>
	<br/>
	
	<div class="container">
		<div class="col-md-4 col-md-offset-4">
			<!--sebuah kondisi menampilkan alert gagal atau salah-->
        <?php 
			if(isset($_GET['pesan'])){
				if($_GET['pesan'] == "gagal"){
					echo "<div class='alert alert-danger'>Login gagal! username dan password salah!</div>";
				}else if($_GET['pesan'] == "logout"){
					echo "<div class='alert alert-info'>Anda telah berhasil logout</div>";
				}else if($_GET['pesan'] == "belum_login"){
					echo "<div class='alert alert-danger'>Anda harus login untuk mengakses halaman admin</div>";
				}
			}
			?>			
			
			<form action="login.php" method="post">
				<div class="panel">
					<br/>
					<div class="panel-body">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username">
                            
						</div>
                        
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>	

						<input type="submit" class="btn btn-primary" value="Log In">				
					</div>
					<br/>
				</div>
			</form>
		</div>
	</div>
</body>
</html>