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
      <div class="col-md-7 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="text-center">Halaman Pendaftaran Siswa Baru</h5>
            <?php
            if (isset($_GET['sukses'])) { ?>
              <div class="alert alert-success" role="alert">
                <?php echo $_GET['sukses']; ?>
              </div>
            <?php

            }
            ?>
            <?php
            if (isset($_GET['gagal'])) { ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_GET['gagal']; ?>
              </div>
            <?php

            }
            ?>
            <!-- Awal form -->
            <form action="fungsi/pregistrasi.php" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="nama">Nama lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="kelamin">Kelamin</label>
                <select name="kelamin" id="kelamin" class="form-select" required>
                  <option value="">--pilih--</option>
                  <option value="Laki-Laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required> <!--//menggunakan require agar wajib di isi oleh USER -->
              </div>
              <div class="mb-3">
                <label for="tempat">Tempat Lahir</label>
                <input type="text" name="tempat" id="tempat" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
              </div>
              <div class="mb-4">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required> <!--file yang diterima cuman fle foto ajaa, sisanya nggak bisa-->
              </div>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            <!-- akhir form -->
          </div>
        </div><abbr title=""></abbr>
      </div>
    </div>
    <!--template-->
    <!-- akhir bagian konten -->
  </div>

  <!-- footer -->
  <?php include 'partisi/footer.php'; ?>
  <!-- end footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>