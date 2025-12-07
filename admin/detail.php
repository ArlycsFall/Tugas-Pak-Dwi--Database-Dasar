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
        <div class="row mb-3">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center"> Detail data pendaftar baru</h4>
                        <?php 
                        include '../fungsi/koneksi.php'; 
                        // $id=$_GET['id']; CTT: Tidak ada validasi di nilai $id, membuatnya rawan terkena SQL Injection
                        // $cek = "SELECT * FROM daftar WHWERE id_daftar=$id";//typo wkwk
                        // $aksi = $conn->query($cek);
                        // $row = $aksi->fetch_assoc();    

                        //PARAMETER adalah tempat untuk menampung/menyimpan nilai yang diterima dari luar, sedangkan ARGUMEN adalah nilai yang dikirimkan ke dalam parameter saat memanggil sebuah fungsi.
                         $id = isset($_GET['id']) ? intval($_GET['id']) : 0; // mengecek aoakah parameter id ada? jika ada maka  nilainya akan diubah menggunakan intval untuk mengubah nilai tersebut menjadi integer.
                        if ($id > 0) {//untuk memastikan id bernilai positif dan bukannnya negatif, bila nilai lebih besar dari nol maka akan dijalankan.
                            $stmt = $conn->prepare("SELECT * FROM pendaftaran WHERE id_daftar = ?");
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $aksi = $stmt->get_result();
                            $row = $aksi->fetch_assoc();
                        } else {
                            echo "ID tidak valid.";
                            exit;
                        }
                        ?>
                        <!-- Kartu -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Nama Lengkap
                            </div>
                            <div class="col-md-8">
                                : <?php echo $row['nama_lengkap']; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Jenis Kelamin
                            </div>
                            <div class="col-md-8">
                                : <?php echo $row['kelamin']; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Tempat & Tanggal Lahir
                            </div>
                            <div class="col-md-8">
                                <!-- : <//?php echo $row['nama_lengkap']; ?> -->
                                : <?php echo $row['tempat_lahir'] . ', ' . $row['tgl_lahir']; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Alamat
                            </div>
                            <div class="col-md-8">
                                : <?php echo $row['alamat']; ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Foto
                            </div>
                            <div class="col-md-8">
                                : <?php echo $row['foto']; ?>
                            </div>
                        </div>
                        
                        <!-- <div class="row mb-3">
                            <div class="col-md-4">
                                Foto
                            </div>
                            <div class="col-md-8">
                                : <?php echo $row['foto']; ?>
                            </div>
                        </div> -->

                        <img src="../foto/<?php echo isset($row['foto']) && !empty($row['foto']) ? $row['foto'] : 'img_not_found.png'; ?>"
                            style="width: 200px; height:200px;" class="img-thumbnail mx-auto d-block" alt="Foto">

                            <form action="../fungsi/proses_detail.php" method="POST">
                                <input type="hidden" name="kode" value="<?php echo $_GET['id']; ?>">
                                <div class="mb-3">
                                    <label for="status"></label>
                                    <select name="status" id="form-select">
                                        <option disablevalue="">pilih</option>
                                        <option value="DITERIMA">DITERIMA</option>
                                        <option value="CADANGAN">CADANGAN</option>
                                        <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
            
                        <!-- akhir kartu -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'partisi/footer.php'; ?>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>
