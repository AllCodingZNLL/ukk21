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
    <title>Daftar Barang</title>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>DAFTAR BARANG</u><a href="v_tambah_barang.php" class="btn btn-primary" style="float: right; margin: 20px; ">Tambah Barang</a></h1>
        <br>
        <br>
        <div class="row">
            <div class="col-md-15">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <table class="table">
                            <thead class="table-primary">
                                <th class="table-primary">
                                    <center>Id Barang</center>
                                </th>
                                <th>
                                    <center>Nama Barang</center>
                                </th>
                                <th>
                                    <center>Stok</center>
                                </th>
                                <th>
                                    <center>Harga</center>
                                </th>
                                <th colspan="2">
                                    <center></center>
                                </th>
                            </thead>
                            <?php
                            //ambil koneksi
                            include "../config.php";
                            //ambil data di tb_barang
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_barang ORDER BY id_barang DESC');
                            foreach ($sql as $barang) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <center><?= $barang['id_barang'] ?></center>
                                    </th scope="row">
                                    <td>
                                        <center><?= $barang['nama_barang'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $barang['stok_barang'] ?></center>
                                    </td>
                                    <td class="text-warning">
                                        <center> Rp. <?= $barang['harga_barang'] ?></center>
                                    </td>
                                    <td>
                                        <a href="v_ubah_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-warning" style="padding: 5px;">
                                            Ubah
                                        </a>
                                    </td>
                                    <td>
                                        <a href="m_hapus_barang.php?id_barang=<?= $barang['id_barang'] ?>" class="btn btn-danger" style="padding: 5px;">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>