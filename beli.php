<?php 
session_start();

$ID_Barang = $_GET['ID_Barang'];
$jumlah = $_GET['jumlah'];

if (isset($_SESSION['pesanan'][$ID_Barang]))
{
	$_SESSION['pesanan'][$ID_Barang]+=$jumlah;
}

else 
{
	$_SESSION['pesanan'][$ID_Barang]=$jumlah;
}

echo "<script>location= 'pesanan_pembeli.php'</script>";

 ?>