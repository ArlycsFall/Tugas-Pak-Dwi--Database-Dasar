<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "latihanpsb";
$conn = mysqli_connect($host, $user, $password, $db);
if (mysqli_connect_error()){
    echo "koneksi Gagal!".mysqli_connect_error();
}
?>