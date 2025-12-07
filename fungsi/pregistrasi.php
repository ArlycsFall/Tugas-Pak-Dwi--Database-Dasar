<?php
session_start();
include('koneksi.php');

$nama = $_POST['nama'];
$kelamin = $_POST['kelamin'];
$tanggal = $_POST['tanggal'];
$tempat = $_POST['tempat'];
$alamat = $_POST['alamat'];

//$foto=$_POST['foto']; tidak bisam langsung mengambil data sperti ini
$lokasi_foto = $_FILES['foto']['tmp_name']; //filenya dipindahkan ke foolder foto
$nama_foto = $_FILES['foto']['name'];
$folder = "../foto/" . $nama_foto;

// pastikan user sudah login dan id_pengguna ada di session
if (!isset($_SESSION['id_pengguna'])) {
        header('Location: ../login.php');
        exit;
}

$id = intval($_SESSION['id_pengguna']); // intval berfungsi untuk mengeonversi apapun (srting, null, dll) menjadi einteger, misalkan ada input "abc" maka nilainya akan menjadi nol.
$cek = "SELECT * FROM pendaftaran WHERE id_pengguna = $id";
$proses = $conn->query($cek);
if ($proses === false) { //misalkan seorang petugas mencoba membuka buku tamu, bila bukunya robek atau rusak, maka petugas akan berhenti dan melaporkan kerusakan tersebut (error)
        // jika query gagal, hentikan dan tampilkan error singkat
        die('Query error: ' . $conn->error);
}

$banyak = $proses->num_rows;
if ($banyak >= 1) { //jika data sudah pernah dikirim, maka tidak bisa mengirim data lagi, lalu muncul pesan seperti dibawah
        header('location:../registrasi.php?gagal=Data anda sudah Tersimpan, silahkan tunggu...');
        exit;
} else {

        move_uploaded_file($lokasi_foto, $folder);
        $sql = "INSERT INTO pendaftaran (id_pengguna, nama_lengkap, kelamin, tgl_lahir, tempat_lahir, alamat, foto, status) VALUES (" . $_SESSION['id_pengguna'] . ", '$nama', '$kelamin', '$tanggal', '$tempat', '$alamat', '$nama_foto', 'Pending')"; //menggunakan pending agar si data tidak langusng diterima oleh sistem,tetapi harus menunggi persetujuan dari admin agar bisa diterima.

        $aksi = $conn->query($sql);
        header('location:../registrasi.php?sukses=Data REgistrasi Telah Dikirim... Silahkan tunggu untuk proses');
}
