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
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>TAMBAH PELANGGAN</u></h1>
        <form action="m_tambah_pelanggan.php" method="post">
            <input type="hidden" name="id_login" value="<?= $_SESSION['id_login'] ?>">
            <div class="row">
                <div class="col-md-8">
                    <div class="shadow-lg p-3 mb-5 bg-body rounded">
                        <div class="card p-3 mb-2 ">
                            <form action="m_ubah_barang.php" method="post">
                                <input type="hidden" name="id_barang" value="<?= $barang['id_barang'] ?>">
                                <br>
                                <table>
                                    <tr>
                                        <td><span class="input-text" id="addon-wrapping">ID Pelanggan</span></td>
                                        <td><span class="input-text" id="addon-wrapping">:</span></td>
                                        <td class="input-group" style="width:550px;">
                                            <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                                            <input type="text" class="form-control" name="id_pelanggan" id="" value="<?= date('mis') ?>" readonly style="background-color: grey;" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-text" id="addon-wrapping">Nama Pelanggan</span></td>
                                        <td><span class="input-text" id="addon-wrapping">:</span></td>
                                        <td class="input-group" style="width:550px;">
                                            <span class="input-group-text"><i class="bi bi-person-fill-add"></i></span>
                                            <input type="text" class="form-control" name="nama_pelanggan" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Pelanggan</td>
                                        <td>:</td>
                                        <td class="input-group" style="width:550px;">
                                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                                            <input type="text" class="form-control" name="alamat_pelanggan" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Telepon Pelanggan</td>
                                        <td>:</td>
                                        <td class="input-group" style="width:550px;">
                                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                            <input type="text" class="form-control" name="telepon_pelanggan" aria-describedby="addon-wrapping">
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