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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php
    include('navbar.php')
    ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>STOK BARANG</u></h1>
        <div class="row">
            <div class="col-md-15">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <table class="table">
                            <tr>
                                <th scope="col">
                                    <center>Id Barang</center>
                                </th>
                                <th scope="col">
                                    <center>Nama Barang</center>
                                </th>
                                <th scope="col">
                                    <center>Stok Barang</center>
                                </th>
                                <th scope="col">
                                    <center>Harga Barang</center>
                                </th>
                                <th colspan="2">
                                    <!-- <center>Aksi</center> -->
                                </th>
                            </tr>
                            <?php

                            include "../config.php";
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_barang');
                            foreach ($sql as $barang) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <center><?= $barang['id_barang'] ?></center>
                                    </th>
                                    <td>
                                        <center><?= $barang['nama_barang'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $barang['stok_barang'] ?></center>
                                    </td>
                                    <td class="text-warning">
                                        <center><?= $barang['harga_barang'] ?></center>
                                    </td>
                                    <td><a href="v_ubah_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-warning">Ubah</a></td>
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