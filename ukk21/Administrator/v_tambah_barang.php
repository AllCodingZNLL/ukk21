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
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
    <?php include "navbar.php"; ?>
    <div class="container">
        <br>
        <div class="card text-center">
            <div class="card-header" data-bs-theme="dark">
                <h3 class="text-primary"><u>Tambah Barang</u></h3>
            </div>
            <br>
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <form action="m_tambah_barang.php" method="post">
                            <table>
                                <tr>
                                    <td><span class="input-text" id="addon-wrapping">Nama Barang</span></td>
                                    <td><span class="input-text" id="addon-wrapping">:</span></td>
                                    <td class="input-group">
                                        <span class="input-group-text"><i class="bi bi-file-plus-fill"></i></span>
                                        <input type="text" class="form-control" name="nama_barang" aria-describedby="addon-wrapping">
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="input-text" id="addon-wrapping">Stok Barang</span></td>
                                    <td><span class="input-text" id="addon-wrapping">:</span></td>
                                    <td class="input-group">
                                        <span class="input-group-text"><i class="bi bi-bag-plus-fill"></i></span>
                                        <input type="text" class="form-control" name="stok_barang" aria-describedby="addon-wrapping">
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="input-text" id="addon-wrapping">Harga</span></td>
                                    <td><span class="input-text" id="addon-wrapping">:</span></td>
                                    <td class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" name="harga_barang" aria-describedby="addon-wrapping">
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
</div>

</html>