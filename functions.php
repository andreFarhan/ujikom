<?php 
	
	session_start();

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "ujikom_08092024_andre";

	$koneksi = mysqli_connect($host,$user,$password,$database);

	date_default_timezone_set('asia/jakarta');

	function tambahBarang($data){
		global $koneksi;
		$NamaBarang = $data['NamaBarang'];
		$Satuan = $data['Satuan'];
		$HargaSatuan = $data['HargaSatuan'];

		$sql = "INSERT INTO tb_barang_andre VALUES('','$NamaBarang', '$Satuan', '$HargaSatuan')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function tambahKasir($data){
		global $koneksi;
		$Username = $data['Username'];
		$NamaKasir = ucwords(strtolower($data['NamaKasir']));
		$Alamat = $data['Alamat'];
		$NomorHP = $data['NomorHP'];
		$NomorKTP = $data['NomorKTP'];
		$Password = $data['Password'];
		$Password2 = $data['Password2'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_kasir_andre WHERE Username = '$Username'");

		if (mysqli_fetch_assoc($result)) {
			setAlert('Gagal!','Username Telah Digunakan','error');
			header("Location: kasir_tambah.php");
			die;
		}
		if ($Password !== $Password2) {
			setAlert('Gagal!','Konfirmasi Password Salah','error');
			header("Location: kasir_tambah.php");
			die;
		}

		$Password = Password_hash($Password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO tb_kasir_andre VALUES('','$Username','$NamaKasir','$Alamat','$NomorHP','$NomorKTP','$Password')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);

	}

	function tambahShift($data){
		global $koneksi;
		$ID_Kasir = $data['ID_Kasir'];
		$WaktuBuka = $data['WaktuBuka'];
		$SaldoAwal = $data['SaldoAwal'];
		$SaldoAkhir = $data['SaldoAwal'];

		$sql = "INSERT INTO tb_shift_andre VALUES('','$ID_Kasir','$WaktuBuka','$SaldoAwal','0','$SaldoAkhir',NULL,'Buka')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_insert_id($koneksi);
	}

	function tambahPenjualan($data){
		global $koneksi;
		$WaktuTransaksi = $data['WaktuTransaksi'];
		$Total = $data['Total'];
		$ID_Shift = $data['ID_Shift'];

		$sql = "INSERT INTO tb_penjualan_andre VALUES('','$ID_Penjualan','$WaktuTransaksi','$Total','$ID_Shift')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_insert_id($koneksi);
	}

	function tambahDetailPenjualan($data){
		global $koneksi;
		$ID_Penjualan = $data['ID_Penjualan'];
		$ID_Barang = $data['ID_Barang'];
		$Kuantitas = $data['Kuantitas'];
		$HargaSatuan = $data['HargaSatuan'];
		$Sub_total = $data['Sub_total'];

		$sql = "INSERT INTO tb_penjualan_andre VALUES('','$ID_Penjualan','$ID_Barang','$Kuantitas','$HargaSatuan','$Sub_total')";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_insert_id($koneksi);
	}

	function ubahBarang($data){
		global $koneksi;
		$ID_Barang = $data['ID_Barang'];
		$NamaBarang = $data['NamaBarang'];
		$Satuan = $data['Satuan'];
		$HargaSatuan = $data['HargaSatuan'];

		$sql = "UPDATE tb_barang_andre SET NamaBarang = '$NamaBarang', Satuan = '$Satuan', HargaSatuan = '$HargaSatuan' WHERE ID_Barang = '$ID_Barang'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahKasir($data){
		global $koneksi;
		$ID_Kasir = $data['ID_Kasir'];
		$Username = $data['Username'];
		$NamaKasir = ucwords(strtolower($data['NamaKasir']));
		$Alamat = $data['Alamat'];
		$NomorHP = $data['NomorHP'];
		$NomorKTP = $data['NomorKTP'];
		$Password = $data['Password'];
		$Password_hash = Password_hash($Password, PASSWORD_DEFAULT);
		$Password2 = $data['Password2'];
		$Password_lama = $data['Password_lama'];

		$result = mysqli_query($koneksi, "SELECT * FROM tb_kasir_andre WHERE Username = '$Username'");
		$fetch = mysqli_fetch_assoc($result);
		$Password_lama_verify = Password_verify($Password_lama, $fetch['Password']);

		if ($Password !== $Password2) {
			echo "
			<script>
			alert('Konfirmasi Password tidak sama!')
			</script>
			";
			return false;
		}

		if ($Password_lama_verify) {
			$sql = "UPDATE tb_kasir_andre SET NamaKasir = '$NamaKasir', Alamat = '$Alamat', NomorHP = '$NomorHP', NomorKTP = '$NomorKTP', Password = '$Password_hash' WHERE ID_Kasir = '$ID_Kasir'";
			$eksekusi = mysqli_query($koneksi, $sql);

			return mysqli_affected_rows($koneksi);
		}else{
			echo "
			<script>
			alert('Password Lama tidak benar!')
			</script>
			";
			return false;
		}

	}

	function ubahShift($data){
		global $koneksi;
		$ID_Shift = $data['ID_Shift'];
		$JumlahPenjualan = $data['JumlahPenjualan'];
		$SaldoAkhir = $data['SaldoAkhir'];
		$WaktuTutup = $data['WaktuTutup'];

		$sql = "UPDATE tb_shift_andre SET JumlahPenjualan = '$JumlahPenjualan', SaldoAkhir = '$SaldoAkhir', WaktuTutup = '$WaktuTutup', Status = 'Tutup' WHERE ID_Shift = '$ID_Shift'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahPenjualan($data){
		global $koneksi;
		$ID_Penjualan = $data['ID_Penjualan'];
		$WaktuTransaksi = $data['WaktuTransaksi'];
		$Total = $data['Total'];
		$ID_Shift = $data['ID_Shift'];

		$sql = "UPDATE tb_penjualan_andre SET WaktuTransaksi = '$WaktuTransaksi', Total = '$Total', ID_Shift = '$ID_Shift' WHERE ID_Penjualan = '$ID_Penjualan'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function ubahDetailPenjualan($data){
		global $koneksi;
		$ID_Penjualan = $data['ID_Penjualan'];
		$ID_Barang = $data['ID_Barang'];
		$Kuantitas = $data['Kuantitas'];
		$HargaSatuan = $data['HargaSatuan'];
		$Sub_total = $data['Sub_total'];

		$sql = "UPDATE tb_penjualan_andre SET ID_Barang = '$ID_Barang', Kuantitas = '$Kuantitas', HargaSatuan = '$HargaSatuan', Sub_total = '$Sub_total' WHERE ID_Penjualan = '$ID_Penjualan'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function dibayar($id){
		global $koneksi;
		$sql = "UPDATE tb_penjualan_andre SET status = 'dibayar' WHERE id_transaksi = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusBarang($id){
		global $koneksi;
		$sql = "DELETE FROM tb_barang_andre WHERE ID_Barang = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}
	
	function hapusKasir($id){
		global $koneksi;
		$sql = "DELETE FROM tb_kasir_andre WHERE ID_Kasir = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusShift($id){
		global $koneksi;
		$sql = "DELETE FROM tb_shift_andre WHERE ID_Shift = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusPenjualan($id){
		global $koneksi;
		$sql = "DELETE FROM tb_penjualan_andre WHERE ID_Penjualan = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function hapusDetailPenjualan($id){
		global $koneksi;
		$sql = "DELETE FROM tb_detail_penjualan_andre WHERE ID_Penjualan = '$id'";
		$eksekusi = mysqli_query($koneksi, $sql);

		return mysqli_affected_rows($koneksi);
	}

	function setAlert($title='',$text='',$type='',$buttons=''){

		$_SESSION["alert"]["title"]		= $title;
		$_SESSION["alert"]["text"] 		= $text;
		$_SESSION["alert"]["type"] 		= $type;
		$_SESSION["alert"]["buttons"]	= $buttons; 

	}

	if (isset($_SESSION['alert'])) {

		function alert(){
			$title 		= $_SESSION["alert"]["title"];
			$text 		= $_SESSION["alert"]["text"];
			$type 		= $_SESSION["alert"]["type"];
			$buttons	= $_SESSION["alert"]["buttons"];

			echo"
			<div id='msg' data-title='".$title."' data-type='".$type."' data-text='".$text."' data-buttons='".$buttons."'></div>
			<script>
				let title 		= $('#msg').data('title');
				let type 		= $('#msg').data('type');
				let text 		= $('#msg').data('text');
				let buttons		= $('#msg').data('buttons');

				if(text != '' && type != '' && title != ''){
					Swal.fire({
						title: title,
						text: text,
						icon: type,
					});
				}
			</script>
			";
			unset($_SESSION["alert"]);
		}
	}
 ?>