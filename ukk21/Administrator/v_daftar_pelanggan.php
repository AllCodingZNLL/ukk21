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
    <title>Daftar Pelanggan</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>DAFTAR PELANGGAN</u></h1>
        <br>
        <div class="row">
            <div class="col-md-15">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <table class="table">
                            <thead class="table-primary">
                                <th>
                                    <center>ID</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>Alamat</center>
                                </th>
                                <th>
                                    <center>Telepon</center>
                                </th>
                            </thead>

                            <?php
                            //ambil koneksi
                            include('../config.php');
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
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
                                </tr>
                            <?php
                            } ?>

                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>