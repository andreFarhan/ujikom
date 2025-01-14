<?php 
	include 'functions.php';

	//cek login
	if ($_SESSION['login'] == 0) {
		header("Location: login_form.php");
	}

	$ID_Penjualan = $_GET['ID_Penjualan'];

	if (isset($ID_Penjualan)) {
		if (hapusPenjualan($ID_Penjualan) > 0) {
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