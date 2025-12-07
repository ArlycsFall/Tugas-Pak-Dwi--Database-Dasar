<?php
session_start();
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: login.php");
    exit();
}

include('fungsi/koneksi.php'); // Pastikan koneksi.php sudah di-include

$id_pengguna_saat_ini = $_SESSION['id_pengguna'];

// 1. QUERY DATABASE: Cek apakah ada data di tabel 'pendaftaran' untuk user ini
$sql_cek_data = "SELECT id_daftar FROM pendaftaran WHERE id_pengguna = '$id_pengguna_saat_ini'";
$aksi_cek_data = $conn->query($sql_cek_data);

// 2. LOGIKA PENJAGA GERBANG (GATEKEEPER)
if ($aksi_cek_data->num_rows == 0) {
    // Jika jumlah baris yang ditemukan adalah 0 (Data BELUM ADA)
    header("Location: registrasi.php"); // Alihkan ke form pengisian
    exit();
}

// 3. Jika data ditemukan, lanjutkan untuk mengambil data lengkap dan menampilkan halaman.
$sql = "SELECT * FROM pendaftaran WHERE id_pengguna = '$id_pengguna_saat_ini'";
$aksi = $conn->query($sql);
$row = $aksi->fetch_assoc();

include('fungsi/koneksi.php');

// status.php (Di Bagian Paling Atas, setelah include koneksi.php)
// ...

if (isset($_POST['update_data'])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    
    // //mengambil data dari form yang sebelumnya diisi dan mengamankan data dengan kenggunakan mysqli_real_escape_string
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $kelamin = mysqli_real_escape_string($conn, $_POST['kelamin']);
    $tempat_lahir = mysqli_real_escape_string($conn, $_POST['tempat_lahir']);
    $tgl_lahir = mysqli_real_escape_string($conn, $_POST['tgl_lahir']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);


// ... (Kode pengambilan data teks di sini)

// Mulai string query UPDATE
$sql_update = "UPDATE pendaftaran SET 
    nama_lengkap = '$nama_lengkap',
    kelamin = '$kelamin',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    alamat = '$alamat'";
    
// --- LOGIKA UPLOAD FOTO BARU ---
$file_update_query = ""; 

// 1. Definisikan batas ukuran file (misalnya: 2 MB)
$max_size = 2097152; // 2 MB dalam bytes

// Cek apakah ada file foto baru yang diunggah
if (isset($_FILES['foto_baru']) && $_FILES['foto_baru']['error'] === 0) {
    
    // --- PENGECEKAN UKURAN FILE BARU ---
    if ($_FILES['foto_baru']['size'] > $max_size) {
        // Jika ukuran file melebihi batas
        die("Gagal: Ukuran file foto terlalu besar. Maksimal " . ($max_size / 1048576) . " MB.");
    }
    // ------------------------------------

    $file_name = $_FILES['foto_baru']['name'];
    $file_tmp = $_FILES['foto_baru']['tmp_name'];
    
    // Buat nama file yang unik (misalnya: ID_TIMESTAMP.ext)
    $ekstensi = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // OPTIONAL: Pengecekan tipe file (hanya izinkan jpg, jpeg, png)
    $ekstensi_valid = ['jpg', 'jpeg', 'png'];
    if (!in_array(strtolower($ekstensi), $ekstensi_valid)) {
         die("Gagal: Format file tidak didukung. Hanya izinkan JPG, JPEG, atau PNG.");
    }

    $nama_file_baru = $id_pengguna . '_' . time() . '.' . $ekstensi;
    $tujuan_upload = 'foto/' . $nama_file_baru; 
    
    // Pindahkan file 
    if (move_uploaded_file($file_tmp, $tujuan_upload)) {
        // ... (Logika update database dan hapus foto lama) ...
        $file_update_query = ", foto = '$nama_file_baru'";
        
        // ... (Bagian hapus foto lama) ...
        $sql_old_foto = "SELECT foto FROM pendaftaran WHERE id_pengguna = $id_pengguna";
        $res_old_foto = $conn->query($sql_old_foto)->fetch_assoc();
        $old_foto_name = $res_old_foto['foto'];
        
        if (!empty($old_foto_name) && file_exists('foto/' . $old_foto_name)) {
            unlink('foto/' . $old_foto_name);
        }
    } else {
        die("Gagal mengunggah file foto.");
    }
}
// ... (Sisa query update dan redirect) ...
    // --- AKHIR LOGIKA UPLOAD FOTO BARU ---

    // Gabungkan query utama dengan query foto (jika ada) dan tambahkan WHERE
    $sql_update .= $file_update_query;
    $sql_update .= " WHERE id_pengguna = $id_pengguna";

    $query_update = $conn->query($sql_update); 

    if ($query_update) {
        header('Location: status.php?sukses=update_sukses');
        exit;
    } else {
        die("Gagal menyimpan perubahan: " . $conn->error);
    }
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
                        <!-- awal kartu status pendaftaram -->
                        <h5 class="text-center mb-4">Status Pendaftaran</h5>
                        <?php
                        include('fungsi/koneksi.php');

                        $is_editing = isset($_GET['edit']) && $_GET['edit'] == 'true';

                        $sql = "SELECT * FROM pendaftaran WHERE id_pengguna = '$_SESSION[id_pengguna]'";
                        $aksi = $conn->query($sql);
                        $row = $aksi->fetch_assoc();
                        if (!$row) { //mengecek apa query mengembalikan data, jika tidak maka akan muncul pesan dibawah
                            echo "Data pendaftaran belum diisi";
                        } else { //bila data ditemukan maka proses pengecekan akan dilanjutkan. Proses ini akan mengecek dengan dua kondisi, yang pertama apakah status berisi string kosong, dan ynag kedau apakah status bernilai null. Bila salah satu ni;ao terpenuhi maka  $row akan disis pesan "Dalam proses"
                            if ($row['status'] == "" || $row['status'] == null) {
                                $status = "Dalam proses";
                            } else {
                                $status = $row['status']; //Jika status tidak bernilai kosong atau null, maka akan diisis dengan nilai dari database
                            }
                        }

                        ?>

                        <!-- awal dari form edit data -->
                        <?php if ($is_editing) { ?>
                            <form action="status.php" method="POST" enctype="multipart/form-data">
                            <?php } ?>

                            <div class="row mb-3">
                                <div class="col-md-4">Nama Lengkap</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $row['nama_lengkap']; ?>" required>
                                    <?php } else {
                                                // MODE BACA: Tampilkan Teks Biasa
                                                echo $row['nama_lengkap'];
                                            }
                                        } else {
                                            echo "Data belum tersedia";
                                        } ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">Kelamin</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <select type="text" name="kelamin" class="form-select" value="<?php echo $row['kelamin']; ?>" required>
                                                <option value="Laki-Laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                    <?php } else {
                                                // MODE BACA: Tampilkan Teks Biasa
                                                echo $row['kelamin'];
                                            }
                                        } else {
                                            echo "Data belum tersedia";
                                        } ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">Tempat Lahir</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $row['tempat_lahir']; ?>" required>
                                    <?php } else {
                                                // MODE BACA: Tampilkan Teks Biasa
                                                echo $row['tempat_lahir'];
                                            }
                                        } else {
                                            echo "Data belum tersedia";
                                        } ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">Tanggal Lahir</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir']; ?>" required>
                                    <?php } else {
                                                // MODE BACA: Tampilkan Teks Biasa
                                                echo $row['tgl_lahir'];
                                            }
                                        } else {
                                            echo "Data belum tersedia";
                                        } ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">Alamat</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
                                    <?php } else {
                                                // MODE BACA: Tampilkan Teks Biasa
                                                echo $row['alamat'];
                                            }
                                        } else {
                                            echo "Data belum tersedia";
                                        } ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">Foto</div>
                                <div class="col-md-8">
                                    : <?php if (isset($row) && !is_null($row)) {
                                            if ($is_editing) { ?>
                                            <input type="file" name="foto_baru" id="foto" class="form-control" accept="image/*"> <?php } else {
                                                                                                                                    // MODE BACA: Tampilkan Teks Biasa
                                                                                                                                    echo $row['foto'];
                                                                                                                                }
                                                                                                                            } else {
                                                                                                                                echo "Data belum tersedia";
                                                                                                                            } ?>
                                </div>
                            </div>


                             <!-- <img src="foto/<//?php echo $row['foto']; ?>" -->
                        <img src="foto/<?php echo isset($row['foto']) && !empty($row['foto']) ? $row['foto'] : 'img_not_found.png'; ?>"
                            style="width: 200px; height:200px;" class="img-thumbnail mx-auto d-block" alt="Foto">


                            <div class="row mb-3 mt-4">
                                <div class="col-md-12 text-center">
                                    <?php if (!$row) { ?>
                                        <a href="registrasi.php" class="btn btn-primary">Isi Data Pendaftaran</a>
                                        <?php } else {
                                        if ($is_editing) { ?>
                                            <button type="submit" name="update_data" class="btn btn-success me-2">Simpan Perubahan</button>
                                            <a href="status.php" class="btn btn-secondary">Batal</a>
                                        <?php } else { ?>
                                            <a href="status.php?edit=true" class="btn btn-primary">Edit Data</a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>

                            <?php if ($is_editing) { ?>
                            </form>
                            <!-- akhir dari form edit data -->


                        <?php } ?>
                                

                        <div class="row mb-3 fw-bold text-success">
                            <div class="col-md-4">
                                Status Pendaftaran
                            </div>
                            <div class="col-md-8">
                                : <?php
                                    if (!$row) { //mengecek apakah ada data di variabel $row
                                        echo "Data pendaftaran belum ada"; // bila tidak ada maka akan muncul ini.
                                    } else {
                                        echo $status; //jika ada maka statusnya akan ditampilkan
                                    }
                                    ?>
                            </div>
                        </div>
                        <!-- AKhir dari kartu Status Pendaftaran -->
                    </div>
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