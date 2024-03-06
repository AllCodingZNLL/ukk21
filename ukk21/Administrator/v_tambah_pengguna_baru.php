<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container">
        <br>
        <div class="card text-center">
            <div class="card-header" data-bs-theme="dark">
                <h3 class="text-primary"><u>Tambah Pengguna</u></h3>
            </div>
            <br>
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <form action="m_tambah_pengguna_baru.php" method="post">
                            <table>
                                <div class="input-group flex-nowrap">
                                    <div class="col-3">
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Nama</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                <input type="text" class="form-control" name="nama_pengguna" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Username</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                                <input type="text" class="form-control" name="username_pengguna" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="input-text" id="addon-wrapping">Password</span></td>
                                            <td><span class="input-text" id="addon-wrapping">:</span></td>
                                            <td class="input-group">
                                                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                                <input type="text" class="form-control" name="password_pengguna" aria-describedby="addon-wrapping">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>
                                                <div class="col-8">
                                                    <select class="form-select form-select-sm" name="status" aria-label="Small select example">
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Petugas">Petugas</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                </h5>
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