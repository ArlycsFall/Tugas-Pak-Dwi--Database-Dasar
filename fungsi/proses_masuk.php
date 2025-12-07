<?php
session_start();
include('koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
$aksi = $conn->query($sql); //perintah unutk menjalankan query
$banyakda_data = $aksi->num_rows; //menghitung jumlah data dari hasil query 
if ($banyakda_data >= 1) {
    $isi = $aksi->fetch_assoc();
    $_SESSION['id_pengguna'] = $isi['id_pengguna'];
    $_SESSION['username'] = $isi['username'];
    $_SESSION['level'] = $isi['level'];

if ($isi['level'] == "ADMIN") {
    header("location:../admin/index.php");
} else {
    header("Location:../index.php");
}
} else {
    header('location:../login.php?gagal=Username atau Password SALAH');
}
