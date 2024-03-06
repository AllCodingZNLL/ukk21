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
    <title>Daftar Pengguna</title>
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>DAFTAR PENGGUNA</u>
            <a href="v_tambah_pengguna_baru.php" class="btn btn-primary" style="float: right; margin: 20px; ">Tambah Pengguna</a>
        </h1>

        <br><br>
        <div class="row">
            <div class="col-md-15">
                <div class="shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card p-3 mb-2 ">
                        <table class="table">
                            <thead class="table-primary">
                                <th>
                                    <center>Id Login</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>Username</center>
                                </th>
                                <th>
                                    <center>Password</center>
                                </th>
                                <th>
                                    <center>Status</center>
                                </th>
                                <th></th>
                            </thead>
                            <?php
                            //ambil koneksi
                            include "../config.php";
                            //ambil data di tb_login
                            $sql = mysqli_query($koneksi, 'SELECT * FROM tb_login ORDER BY id_login DESC');
                            foreach ($sql as $pengguna) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <center><?= $pengguna['id_login'] ?></center>
                                    </th scope="row">
                                    <td>
                                        <center><?= $pengguna['nama_pengguna'] ?></center>
                                    </td>
                                    <td>
                                        <center><i><?= $pengguna['username_pengguna'] ?></center></i>
                                    </td>
                                    <td class="text-danger">
                                        <center><?= $pengguna['password_pengguna'] ?></center>
                                    </td>
                                    <td>
                                        <center><?= $pengguna['status'] ?></center>
                                    </td>
                                    <td><a href="v_ubah_pengguna.php?id_login=<?= $pengguna['id_login'] ?>" class="btn btn-warning" style="padding: 5px;">Ubah</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>