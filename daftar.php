<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Latihan PSB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

  <div class="d-flex align-items-center min-vh-100 bg-info">
    <!-- isi konten webiste -->
    <div class="container w-100">
      <div class="col-md-4 mx-auto">
        <div class="card">
          <div class="card-body">
            <h3 claass="text-center">halaman daftar akun</h3>
            <form action="fungsi/proses_daftar.php" method="post">

              <div class="mb-3">
                <label>NISN</label>
                <!-- Tambahkan oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" dan ubah maxlength menjadi 13 -->
                <input type="number" name="NISN" class="form-control" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                <!-- translasi dari kode Js diatas = Bila nilai input dan panjang input melebihi maxlength, maka nilai input akan dipotong, hingga akan sesuai dengan maxlength -->
              </div>

              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" requeired
              </div>
              <div class="mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Daftarkan</button>
            </form>
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