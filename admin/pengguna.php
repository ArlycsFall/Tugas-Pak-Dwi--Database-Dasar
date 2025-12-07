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
                        <h3 class="text-center">Data pengguna PSB</h3>
                        <?php
                        if (isset($_GET['sukses'])) { ?>
                            <div class="alert alert-success " role="alert">
                                <?php echo $_GET['sukses']; ?>
                            </div>
                        <?php
                        }
                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Daftar</th>
                                    <th scope="col">ID Pengguna</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">level </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../fungsi/koneksi.php';
                                $sql = "SELECT 
                                        p.id_daftar,
                                        u.NISN,
                                        u.username,
                                        u.level,
                                        p.nama_lengkap,
                                        u.id_pengguna
                                    FROM
                                        pengguna u INNER JOIN pendaftaran  p ON u.id_pengguna = p.id_pengguna
                                ";
 
                                $aksi = $conn->query($sql);
                                $no = 1;
                                while ($row = $aksi->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no;   ?></th>
                                        <th scope="row"><?php echo $row['id_daftar'];   ?></th>
                                        <th scope="row"><?php echo $row['id_pengguna'];   ?></th>
                                        <th scope="row"><?php echo $row['NISN'];   ?></th>
                                        <th scope="row"><?php echo $row['username'];   ?></th>
                                        <th scope="row"><?php echo $row['nama_lengkap'];   ?></th>
                                        <th scope="row"><?php echo $row['level'];   ?></th>

                                    </tr>
                                <?php
                                    $no++;
                                }   
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- akhir bagian konten -->
    </div>

    <!-- footer -->
    <?php include 'partisi/footer.php'; ?>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>