<?php 
	include 'functions.php';

	if (isset($_POST['login'])) {
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];

		$eksekusi = mysqli_query($koneksi, "SELECT * FROM tb_kasir_andre WHERE Username = '$Username'");
		$data 		= mysqli_fetch_array($eksekusi);

		if ($data) {
			if (Password_verify($Password, $data['Password'])) {

				$ID_Kasir 	= $data['ID_Kasir'];
				$Username 	= $data['Username'];
				$NamaKasir	= $data['NamaKasir'];
				$Alamat		= $data['Alamat'];
				$NomorHP	= $data['NomorHP'];
				$NomorKTP	= $data['NomorKTP'];

				$_SESSION['ID_Kasir'] 		= $ID_Kasir;
				$_SESSION['Username'] 	= $Username;
				$_SESSION['NamaKasir'] 	= $NamaKasir;
				$_SESSION['Alamat'] 	= $Alamat;
				$_SESSION['NomorHP'] 	= $NomorHP;
				$_SESSION['NomorKTP'] 	= $NomorKTP;
				$_SESSION['login'] 			= 1;
			}else{
				echo "<script>alert('Username atau Password Salah!')</script>";
			}
		}
	}
	if (isset($_SESSION['login'])) {
		header("Location: dashboard.php");
		exit;
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="icon" href="img/logo-kasir.png">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body style="background-image: url(img/form-login.jpg); background-size: cover;" class="img-fluid">
	<div class="container mt-5 text-white">
		<div class="row justify-content-center">
			<div class="col-md-4 rounded mt-5" style="background-color: skyblue;">
				<form method="POST">
					<h3 class="font-weight-bold mt-3"><img src="img/logo-kasir.png" alt="Responsive image" width="100px"> LOGIN KASIR</h3>
					<div class="form-group">
						<label class="font-weight-bold" for="Username">USERNAME</label>
						<input type="text" class="form-control" name="Username" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bold" for="Password">PASSWORD</label>
						<input type="Password" class="form-control" name="Password" required>
					</div>
					<div class="form-group">
						<button type="submit" name="login" class="btn btn-primary">LOGIN <i class="fa fa-sign-in-alt"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

<footer class="page-footer text-center text-md-left">
	<div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        &#xA9; 2024 Copyright: Andre Farhan Saputra</a>
      </div>
    </div>
</footer>

<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="font-awesome/js/all.min.js"></script>

</html>