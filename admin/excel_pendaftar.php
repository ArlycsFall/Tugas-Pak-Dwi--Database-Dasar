<?php
// header("Content-type: application/vnd.ms-excel"); //tipe konten lama

header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=laporan pendaftar.xls");
?>

<!doctype html>
<html lang="en">

<head>
    <title>latihanpsb</title>
</head>

<body">
    <h4>Data Pendaftar</h4>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Lengkap</th>
                <th>Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Tempat Lahir</th>
                <th>Alamat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php include '../fungsi/koneksi.php';
            $sql = "SELECT * FROM pendaftaran";
            $aksi = $conn->query($sql);
            $no = 1;
            while ($row = $aksi->fetch_assoc()) {
            ?>
                <tr>
                    <th><?php echo $no;   ?></th>
                    <th><?php echo $row['nama_lengkap'];   ?></th>
                    <th><?php echo $row['kelamin'];   ?></th>
                    <th><?php echo $row['tgl_lahir'];   ?></th>
                    <th><?php echo $row['tempat_lahir'];   ?></th>
                    <th><?php echo $row['alamat'];   ?></th>
                    </th>
                    <th scope="row"><?php echo $row['status'];   ?></th>


                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    </body>

</html>