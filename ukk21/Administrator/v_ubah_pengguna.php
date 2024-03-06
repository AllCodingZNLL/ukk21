<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container">
        <?php
        //ambil koneksi 
        include "../config.php";

        //ambil id_login dari url 
        $id_login = $_GET['id_login'];

        //cari id_login di tb_login
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_login='$id_login'");
        //ambil datanya 
        $pengguna = mysqli_fetch_assoc($sql);
        ?>
        <br>
        <div class="card text-center">
            <div class="card-header" data-bs-theme="dark">
                <h3 class="text-primary"><u>Ubah Pengguna</u></h3>
            </div>
            <br>
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <form action="m_ubah_pengguna.php" method="post">
                            <input type="hidden" name="id_login" id="" value="<?= $pengguna['id_login'] ?>">
                            <table>
                                <div class="input-group flex-nowrap">
                                    <div class="col-3">
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Nama</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                <input type="text" class="form-control" name="nama_pengguna" value="<?= $pengguna['nama_pengguna'] ?>" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Username</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                                <input type="text" class="form-control" name="username_pengguna" value="<?= $pengguna['username_pengguna'] ?>" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Password</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                                <input type="text" class="form-control" name="password_pengguna" value="<?= $pengguna['password_pengguna'] ?>" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                <div class="col-8">
                                                    <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                                                        <?php
                                                        if ($pengguna['status'] == "Administrator") {
                                                            echo "<option value='Administrator' selected >Administrator</option>";
                                                        } else {
                                                            echo "<option value='Administrator' >Administrator</option>";
                                                        }

                                                        if ($pengguna['status'] == "Petugas") {
                                                            echo "<option value='Petugas' selected >Petugas</option>";
                                                        } else {
                                                            echo "<option value='Petugas' >Petugas</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <br>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><input type="submit" class="btn btn-outline-warning" value="Simpan"></td>
                                        </tr>
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