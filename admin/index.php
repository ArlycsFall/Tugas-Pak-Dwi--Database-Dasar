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
        <h1 class="text-center"> ini adalah halaman ADMIN</h1>
      </div>
    </div>
    <!-- bagian konten -->
    <div class="row my-5 mb-52">
      <div class="col-mx-auto my-auto ">
        <!-- kartu -->
        <div class="card">
          <div class="card-body">
            <h2 class="text-center mb-4">Petunjuk Penggunan</h2>
              <ol>
                <li>
                  <h5 class=""> Pergi ke halaman Pendaftar untuk melihat data lengkap para pendaftar</h5>
                </li>
                <li>
                  <h5>DI pendaftar anda bisa mencetak data pendaftar untuk menjadi file PDF dan Excel</h5>
                </li>
                <li>
                  <h5>Khusus untuk file PDF, pastikan anda memilih layout landscape agar tidak ada data yang terpotong</h5>
                </li>
                <li>
                  <h5>Di halamaan pendaftar tekan tombol detail untuk melihat detail informasi dan mengubah status pendaftar</h5>
                </li>
                <li>
                  <h5>Jika anda tidak memilih status pendaftar, maka nilai dari statusnya akan null</h5>
                </li>
                <li>
                  <h5>Di halaman pengguna anda bisa melihat seluruh user yang telah melakukan pendaftaran akun</h5>
                </li>
                <li>
                  <h5>Di halaman pengguna anda juga bisa melihat level dari setiap USER</h5>
                </li>
                <li>
                  <h5>Tekan tombol logout untuk keluar</h5>
                </li>
              </ol>
          </div>
        </div>
        <!-- akhir kartu -->
         <!-- kartu ctt -->
          <!-- <div class="card mt-4">
            <div class="card-body">
              <h3 class="text-center">Catatan Dev</h3>
              <ul>
                <li class="text-danger">
                  <h1>
                  Tambahkan tabel nama lengkap dari tabel pendaftar di halaman Pengguna, saya bingung soalnyua(sabil) 23.11.25
                  </h1>
                </li>
                <li class="text-danger">
                  <h1>
                  Buat fungsi agar admin bisa menghapus user yang sudah terdaftar (sabil) 23.11.25
                  </h1>
                </li>
                <li class="text-danger">
                  <h1>
                  Buat fungsi agar tidak ada duplikasi username dan NISN 23.11.25
                  </h1>
                </li>
              </ul>
            </div>
          </div> -->
          <!-- akhir ctt -->
      </div>
    </div>
    <!-- akhir bagian konten -->

    <!-- akhir bagian konten -->
  </div>

  <!-- footer -->
  <?php include 'partisi/footer.php'; ?>
  <!-- end footer -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>