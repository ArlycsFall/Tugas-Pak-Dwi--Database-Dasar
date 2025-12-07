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
      <div class="col-md-12">
        <h1 class="text-center"> Selamat datang</h1>
      </div>
    </div>

    <!-- bagian konten -->
    <div class="row my-5 mb-52">
      <div class="col-mx-auto my-auto ">
        <!-- kartu -->
        <div class="card">
          <div class="card-body">
            <h2 class="text-center mb-4">Petunjuk Penggunan</h1>
              <ol>

                <li>
                  <h5>Update!!! Halaman Status hanya akan bisa dibuka setelah mengisi data di halaman registrasi</h5>
                </li>

                <li>
                  <h5 class=""> <!-- Query (kueri) adalah perintah atau instruksi yang digunakan untuk mengakses, meminta, mengambil, menambah, mengubah, atau menghapus data yang tersimpan dalam sistem basis data (database). -->Silahkan pergi ke halaman registrasi untuk mengisi data diri </h5>
                </li>
                <li>
                  <h5>Masukan data dengan teliti</h5>
                </li>
                <li>
                  <h5>Format gambar 1:1, atau Kotak</h5>
                </li>
                <li>
                  <h5>Anda hanya bisa mendaftar sebanyak satu kali, belum ada fitur pengeditan data</h5>
                </li>
                <li>
                  <h5>Bila sudah maka silahkan pergi ke halaman cek status, untuk memastikan bahwa data anda sudah terkirim</h5>
                </li>
                <li>
                  <h5>Bila sudah mengisi anda boleh keluar dari web</h5>
                </li>
                <li>
                  <h5>Cek status anda secara berkala</h5>
                </li>
                <li>
                  <h5>Tekan tombol keluar untuk logout</h5>
                </li>
              </ol>
          </div>
        </div>
        <!-- akhir kartu -->

        <!-- kartu CTT-->
          <div class="card mt-4">
            <div class="card-body">
              <h2 class="text-center mb-4">Catatan developer</h2>
                <ul>
  
                  <li>
                    <h5 class="text-warning">Update!!! Halaman Status hanya akan bisa dibuka setelah mengisi data di halaman registrasi (Minggu, 23 November 2025 ) </h5>
                  </li>
                  <li>
                    <h5 class="text-warning">Update!!! Halaman Status bisa mengedit data (Minggu, 23 November 2025 ) </h5>
                  </li>
                  
                </ul>
            </div>
          </div>
          <!-- akhir kartu CTT   -->
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