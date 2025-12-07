 <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#">latihan-PSB</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   <?php
// Fungsi untuk mengecek halaman saat ini dan mengembalikan 'active' jika sesuai
function isActive($pageName) {
    // basename($_SERVER['PHP_SELF']) mengembalikan nama file dari URL saat ini (misalnya "registrasi.php")
    if (basename($_SERVER['PHP_SELF']) == $pageName) {
        return 'active" aria-current="page';
    }
    return '';
}
?>

<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <!-- Terapkan fungsi isActive() ke setiap tautan -->
        <a class="nav-link <?php echo isActive('index.php'); ?>" href="index.php">Home</a>
        <a class="nav-link <?php echo isActive('registrasi.php'); ?>" href="registrasi.php">Registrasi</a>
        <a class="nav-link <?php echo isActive('status.php'); ?>" href="status.php">Cek Status</a>
        <a class="nav-link" href="fungsi/keluar.php">Keluar</a> 
    </div>
</div>
    </div>
  </div>
</nav>
<!-- end od navbar -->