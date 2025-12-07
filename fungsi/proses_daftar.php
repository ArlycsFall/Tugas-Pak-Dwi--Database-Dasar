<?php
include ('koneksi.php');

$nama=$_POST['NISN'];
$username=$_POST['username'];
$password=$_POST['password'];
$level='PENDAFTAR';

$sql = "INSERT INTO pengguna(NISN, username, password, level) VALUES ('$NISN', '$username', '$password', '$level')";
$aksi = $conn->query($sql);
if($aksi == true) {
    header('location:../login.php?sukses=Akun Berhasil Didaftarkan');
}
?>