<?php
include('koneksi.php');
$status=$_POST['status'];
$kode=$_POST['kode'];

$sql="UPDATE pendaftaran SET status='$status' WHERE id_daftar=$kode";
$aksi=$conn->query($sql);
if ($aksi == true) {
    header('location:../admin/pendaftar.php?sukses=Status Berhasil Diubah');
}
    