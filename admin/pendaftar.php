<?php
session_start();
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: login.php");
    // exit();  
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>latihanpsb</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <!-- nav -->
    <?php include 'partisi/navigasi.php'; ?>
    <!-- nav end -->

    <div class="container py-4">
        <!-- isi konten webiste -->
        <div class="row mb-5">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Data Pendaftar</h4>
                        <?php
                        if (isset($_GET['sukses'])) { ?>
                            <div class="alert alert-success " role="alert">
                                <?php echo $_GET['sukses']; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Kelamin</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Tempat Lahir</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">foto</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">aksi </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include '../fungsi/koneksi.php';
                                    $sql = "SELECT * FROM pendaftaran";
                                    $aksi = $conn->query($sql);
                                    $no = 1;
                                    while ($row = $aksi->fetch_assoc()) {   
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no;   ?></th>
                                            <th scope="row"><?php echo $row['nama_lengkap'];   ?></th>
                                            <th scope="row"><?php echo $row['kelamin'];   ?></th>
                                            <th scope="row"><?php echo $row['tgl_lahir'];   ?></th>
                                            <th scope="row"><?php echo $row['tempat_lahir'];   ?></th>
                                            <th scope="row"><?php echo $row['alamat'];   ?></th>
                                            <th>
                                                <img src="../foto/<?php echo $row['foto']; ?>" class="img-thumbnail rounded-circle" style="width: 150px; height: const 150px;" alt="Foto Pendaftar">
                                            </th>
                                            <th scope="row"><?php echo $row['status'];   ?></th>
                                            <th>
                                                <a href="detail.php?id=<?php echo $row['id_daftar'] ?>" class="btn btn-sm btn-warning text-white">Detail</a>
                                            </th>

                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>


                                </tbody>
                            </table>
                            <a href="cetak_pendaftar.php" class="btn btn-danger">Cetak PDF</a>
                            <a href="excel_pendaftar.php" class="btn btn-success">Cetak Excel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="text-center">Jikalau anda ingin memprint data, pastikan print dengan layout landscape</h5>
        <!-- akhir bagian konten -->
    </div>

    <!-- footer -->
    <?php include 'partisi/footer.php'; ?>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>