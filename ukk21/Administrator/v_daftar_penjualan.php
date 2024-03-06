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
    <title>Daftar Penjualan</title>
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>DAFTAR PENJUALAN</u></h1>
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
                                    <center>Tanggal</center>
                                </th>
                                <th>
                                    <center>Total</center>
                                </th>
                                <th>
                                    <center>ID Pelanggan</center>
                                </th>
                                <th>
                                    <center>Petugas</center>
                                </th>
                            </thead>

                            <?php
                            //ambil koneksi
                            include('../config.php');
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_penjualan");
                            foreach ($sql as $penjualan) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <center><?= $penjualan['id_penjualan'] ?></center>
                                    </th>
                                    <th>
                                        <center><?= $penjualan['tgl_penjualan'] ?></center>
                                    </th>
                                    <td class="text-warning">
                                        <center><?= $penjualan['total'] ?>
                                    </td>
                                    <td>
                                        <center><?= $penjualan['id_pelanggan'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $penjualan['id_login'] ?></center>
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