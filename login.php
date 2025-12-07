<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan PSB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body class="d-flex align-items-center min-vh-100 bg-danger">
  <!-- d-flex: dogunakna untuk mengubah tampilan "display" menjadi flex -->
   <!-- align-items-center: untuk mengatur konten agar berada di tengah secara VERTIKAL -->
    <!-- min-vh-100: Memberikan tinggi minimum 100% dari viewport height (tinggi layar), sehingga konten bisa bergerak secara vertikal. -->
     <!-- bg-info: memberikan warna latar belakang biru muda -->
  <div class="container w-100">
  <!-- w-100: Agar container mengambil lebar 100% dari body yang sudah di-flex. -->

    <!-- isi konten webiste -->
    <div class="row mb-auto">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 claass="text-center">LOGIN</h3>
            <form action="fungsi/proses_masuk.php" method="post">
              
              
                <?php
                if (isset($_GET['gagal'])) { ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['gagal']; ?>
                    </div>
                <?php
                }
                ?>
                
                <?php
                if (isset($_GET['sukses'])) { ?>
                    <div class="alert alert-success " role="alert">
                    <?php echo $_GET['sukses']; ?>
                    </div>
                <?php

                }
                ?>

              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Masuk</button>
            </form>

            <div class="d-flex align-items-center mt-3">
                <span class="me-2">Belum punya akun? nih pencet👉</span>
                <a href="daftar.php" class="btn btn-success">Daftar akun</a>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <!-- akhir bagian konten -->
  </div>
    <!-- akhir bagian konten -->
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  </body>
</html>   