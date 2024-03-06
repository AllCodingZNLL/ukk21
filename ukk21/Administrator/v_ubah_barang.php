<?php
session_start();
//cek session 
if ($_SESSION['login'] != 'admin') {
    //kembali ke halaman login
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
    <?php include "navbar.php" ?>
    <div class="container">
        <br>
        <?php
        //ambil koneksi 
        include "../config.php";

        //ambil id_barang dari url 
        $id_barang = $_GET['id_barang'];

        //cari id_login di tb_login
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
        //ambil datanya 
        $barang = mysqli_fetch_assoc($sql);
        ?>
        <form action="m_ubah_barang.php" method="post">
            <input type="hidden" name="id_barang" id="" value="<?= $barang['id_barang'] ?>">

            <div class="card text-center">
                <div class="card-header" data-bs-theme="dark">
                    <h3 class="text-primary"><u>Ubah Barang</u></h3>
                </div>
                <br>
                <div class="card-body">
                    <h5 class="card-title">
                        <center>
                            <form action="m_ubah_barang.php" method="post">
                                <table>
                                    <tr>
                                        <td><span class="input-text" id="addon-wrapping">Nama Barang</span></td>
                                        <td><span class="input-text" id="addon-wrapping">:</span></td>
                                        <td class="input-group">
                                            <span class="input-group-text"><i class="bi bi-file-break-fill"></i></span>
                                            <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-text" id="addon-wrapping">Stok Barang</span></td>
                                        <td><span class="input-text" id="addon-wrapping">:</span></td>
                                        <td class="input-group">
                                            <span class="input-group-text"><i class="bi bi-bag-fill"></i></i></span>
                                            <input type="text" class="form-control" name="stok_barang" value="<?= $barang['stok_barang'] ?>" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="input-text" id="addon-wrapping">Harga</span></td>
                                        <td><span class="input-text" id="addon-wrapping">:</span></td>
                                        <td class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="text" class="form-control" name="harga_barang" value="<?= $barang['harga_barang'] ?>" aria-describedby="addon-wrapping">
                                        </td>
                                    </tr>
                    </h5>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" class="btn btn-outline-warning" value="Simpan"></td>
                    </tr>
                    </a>
                </div>
            </div>
            </table>
        </form>
        </center>
    </div>
    </div>
    </div>
</body>

</html>