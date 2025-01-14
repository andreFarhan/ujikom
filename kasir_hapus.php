<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Kasir = $_GET['ID_Kasir'];

	if (isset($ID_Kasir)) {
		if (hapusKasir($ID_Kasir) > 0) {
			setAlert('Berhasil!','Data Berhasil Dihapus','success');
			header("Location: kasir_tampil.php");
			die;
		}
		else{
			setAlert('Gagal!','Data Gagal Dihapus','error');
			header("Location: kasir_tampil.php");
			die;
		}
	}
 ?>