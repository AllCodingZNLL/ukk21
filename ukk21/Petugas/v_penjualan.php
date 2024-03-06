<?php

session_start();

if ($_SESSION['login'] != 'petugas') {
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <h2 class="text-primary" style="margin: 20px;"><u>DAFTAR PELANGGAN</u>
            <a href="v_tambah_pelanggan.php" class="btn btn-primary" style="float: right; margin: 20px; ">Tambah Pelanggan</a>
        </h2>
        <br><br>
        <div class="row">
            <div class="col-md-15">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <table class="table">
                            <tr>
                                <th>
                                    <center>ID Pelanggan</center>
                                </th>
                                <th>
                                    <center>Nama Pelanggan</center>
                                </th>
                                <th>
                                    <center>Alamat Pelanggan</center>
                                </th>
                                <th>
                                    <center>Telepon Pelanggan</center>
                                </th>
                                <th colspan="2"></th>
                            </tr>
                            <?php
                            include "../config.php";
                            $sql = mysqli_query($koneksi, "SELECT  * FROM tb_pelanggan");
                            foreach ($sql as $pelanggan) {
                            ?>

                                <tr>
                                    <th scope="row">
                                        <center><?= $pelanggan['id_pelanggan'] ?></center>
                                    </th>
                                    <td>
                                        <center><?= $pelanggan['nama_pelanggan'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $pelanggan['alamat_pelanggan'] ?></center>
                                    </td>
                                    <td class="text-primary">
                                        <center><?= $pelanggan['telepon_pelanggan'] ?></center>
                                    </td>
                                    <td><a href="v_detail_penjualan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>" class="btn btn-warning">Beli</a></td>
                                    <td><a href="m_hapus_pelanggan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>