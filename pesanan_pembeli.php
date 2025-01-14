<?php 
    include 'functions.php';
    //cek login
    if ($_SESSION['login'] == 0) {
        header("Location: login_form.php");
    }

    $sql_shift = "SELECT * FROM tb_shift_andre WHERE Status = 'Buka'";
    $eksekus_shift = mysqli_query($koneksi, $sql_shift);
    $data_shift = mysqli_fetch_assoc($eksekus_shift);
    $ID_Shift = $data_shift['ID_Shift'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/Icon/logo-desa-dangdang.png">
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="bootstrap/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header">
                            <h1 class="mt-1">PESANAN ANDA</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Nama Barang</th>
                                      <th scope="col">Harga Satuan</th>
                                      <th scope="col">Jumlah</th>
                                      <th scope="col">Sub Total</th>
                                      <th scope="col">Opsi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <?php $nomor=1; ?>
                                      <?php $Total = 0; ?>
                                      <?php foreach ($_SESSION["pesanan"] as $ID_Barang => $Kuantitas) : ?>

                                      <?php 
                                        $ambil = mysqli_query($koneksi, "SELECT * FROM tb_barang_andre WHERE ID_Barang='$ID_Barang'");
                                        $pecah = $ambil -> fetch_assoc();
                                        $Sub_total = $pecah["HargaSatuan"]*$Kuantitas;
                                      ?>
                                    <tr>
                                      <td><?= $nomor; ?></td>
                                      <td><?= $pecah["NamaBarang"]; ?></td>
                                      <td>Rp. <?= number_format($pecah["HargaSatuan"]); ?></td>
                                      <td><?= $Kuantitas; ?></td>
                                      <td>Rp. <?= number_format($Sub_total); ?></td>
                                      <td>
                                        <a href="hapus_pesanan.php?ID_Barang=<?= $ID_Barang; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                      </td>
                                    </tr>
                                      <?php $nomor++; ?>
                                      <?php $Total+=$Sub_total; ?>
                                      <?php endforeach ?>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <th colspan="4">Total Belanja</th>
                                      <th colspan="2">Rp. <?= number_format($Total) ?></th>
                                    </tr>
                                  </tfoot>
                                </table><br>
                                <form method="POST">
                                  <a href="penjualan_tambah.php" class="btn btn-primary btn-sm">Lihat Menu</a>
                                  <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Belanja</button>
                                </form>        

                                <?php 
                                if(isset($_POST['konfirm'])) {
                                    $WaktuTransaksi=date('Y-m-d\TH:i:s');

                                    // Menyimpan data ke tabel pemesanan
                                    $insert = mysqli_query($koneksi, "INSERT INTO tb_penjualan_andre VALUES ('', '$WaktuTransaksi', '$Total','$ID_Shift')");

                                    // Mendapatkan ID barusan
                                    $id_terbaru = $koneksi->insert_id;

                                    // Menyimpan data ke tabel pemesanan barang
                                    foreach ($_SESSION["pesanan"] as $ID_Barang => $Kuantitas)
                                    {
                                      $insert = mysqli_query($koneksi, "INSERT INTO tb_detail_penjualan_andre VALUES ('$id_terbaru', '$ID_Barang', '$Kuantitas', '$Sub_total') ");
                                    }          

                                    // Mengosongkan pesanan
                                    unset($_SESSION["pesanan"]);

                                    // Dialihkan ke halaman nota
                                    echo "<script>location= 'penjualan_tampil.php'</script>";
                                    
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="bootstrap/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="bootstrap/js/datatables-simple-demo.js"></script>

</body>
</html>