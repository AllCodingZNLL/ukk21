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
    <title>Ubah Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>UBAH BARANG</u></h1>
        <?php
        include "../config.php";
        $id_barang = $_GET['id_barang'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
        $barang = mysqli_fetch_assoc($sql);
        ?>
        <div class="row">
            <div class="col-md-7">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <form action="m_ubah_barang.php" method="post">
                            <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
                            <br>
                            <table>
                                <tr>
                                    <td><span class="input-text" id="addon-wrapping">Nama Barang</span></td>
                                    <td><span class="input-text" id="addon-wrapping">:</span></td>
                                    <td class="input-group" style="width:550px;">
                                        <span class="input-group-text"><i class="bi bi-file-plus-fill"></i></span>
                                        <input type="text" class="form-control" name="nama_barang" id="" value="<?= $barang['nama_barang'] ?>" readonly style="background-color: grey;" aria-describedby="addon-wrapping">
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="input-text" id="addon-wrapping">Stok Barang</span></td>
                                    <td><span class="input-text" id="addon-wrapping">:</span></td>
                                    <td class="input-group">
                                        <span class="input-group-text"><i class="bi bi-bag-plus-fill"></i></i></span>
                                        <input type="text" class="form-control" name="stok_barang" value="<?= $barang['stok_barang'] ?>" aria-describedby="addon-wrapping">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Barang</td>
                                    <td>:</td>
                                    <td class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" name="harga_barang" id="" value="<?= $barang['harga_barang'] ?>" readonly style="background-color: grey;" aria-describedby="addon-wrapping">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <br>
                                        <input type="submit" class="btn btn-outline-warning" style="height:40px;width:150px" value="Simpan">
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>