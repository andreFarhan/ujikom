<?php 
    include 'functions.php';
    
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
    <title>Riwayat Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4 mt-2">
                        <div class="card-header">
                            <h1 class="mt-1">DATA PESANAN ANDA</h1>
                        </div>
                        <div class="card-body align-items-center">
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                  <thead class="thead-light">
                                    <tr>
                                      <th scope="col">No.</th>
                                      <th scope="col">ID Pemesanan</th>
                                      <th scope="col">Tanggal Pesan</th>
                                      <th scope="col">Total Bayar</th>
                                      <th scope="col">Opsi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $nomor=1; ?>
                                    <?php 
                                      $id_user = $_SESSION['id_user'];
                                      $ambil = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_user = '$id_user' ORDER BY id_pemesanan DESC");
                                      $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
                                    ?>
                                    <?php foreach($result as $result) : ?>

                                    <tr>
                                      <th scope="row"><?php echo $nomor; ?></th>
                                      <td><?php echo $result["id_pemesanan"]; ?></td>
                                      <td><?php echo $result["tanggal_pemesanan"]; ?></td>
                                      <td>Rp. <?php echo number_format($result["total_belanja"]); ?></td>
                                      <td>
                                        <a href="detail_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>" class="btn btn-primary btn-sm">Detail</a>
                                        <a onclick="return confirm('Apakah Anda ingin menghapus data ini?');" href="clear_pesanan.php?id=<?php echo $result['id_pemesanan'] ?>" class="btn btn-danger btn-sm">Hapus Data</a>
                                      </td>
                                    </tr>
                                    <?php $nomor++; ?>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
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
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</body>
</html>