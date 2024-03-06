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
    <title>Detail Penjualan</title>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="container">
        <h1 class="text-primary" style="margin: 20px;"><u>PENJUALAN</u></h1>
        <?php
        include "../config.php";
        $id_pelanggan = $_GET['id_pelanggan'];
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan INNER JOIN tb_penjualan ON tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan");
        foreach ($sql as $pelanggan) {
            if ($pelanggan['id_pelanggan'] == $id_pelanggan) {
        ?>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="card p-3 mb-2 ">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="icon">
                                            <!-- <i class="bi bi-person-fill-check"></i>  -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                            </svg>
                                        </div>
                                        <div class="ms-2 c-details">
                                            <h5 class="mb-0">Pelanggan</h5> <span> - Detail Pelanggan</span>
                                        </div>
                                    </div>
                                    <!-- <div class="badge"> <span>Design</span> </div> -->
                                </div>
                                <div class="mt-5">
                                    <h3 class="h6">
                                        <table class="table">
                                            <tr>
                                                <td>ID Pelanggan</td>
                                                <td>:</td>
                                                <td><?= $pelanggan['id_pelanggan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pelanggan</td>
                                                <td>:</td>
                                                <td><?= $pelanggan['nama_pelanggan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td><?= $pelanggan['alamat_pelanggan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Telepon</td>
                                                <td>:</td>
                                                <td><?= $pelanggan['telepon_pelanggan'] ?></td>
                                            </tr>
                                        </table>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <!-- cooding card pengguna end -->
                <!-- mengirim ke m_beli_barang.php-->
                <form action="m_beli_barang.php" method="post">
                    <input type="hidden" name="id_penjualan" id="" value="<?= $pelanggan['id_penjualan']  ?>">
                    <input type="hidden" name="id_pelanggan" id="" value="<?= $pelanggan['id_pelanggan']  ?>">
                    <input type="submit" class="btn btn-primary" value="Tambah Barang">
                </form>
                <!--cooding table kasir start-->
                <br>
                <div class="row">
                    <div class="col">
                        <div class="shadow-lg p-3 mb-5 bg-body rounded">
                            <div class="card p-3 mb-2 ">
                                <table class="table table-hover">
                                    <thead class="table-secondary">
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Sub Total</th>
                                        <th scope="col">Stok Barang</th>
                                        <th colspan="2" scope="col"></th>
                                    </thead>
                                    <?php
                                    $data = mysqli_query($koneksi, "SELECT * FROM tb_detail_penjualan");

                                    $dataBarang = mysqli_query($koneksi, "SELECT * FROM tb_barang");

                                    foreach ($data as $detail) {
                                        if ($detail['id_penjualan'] == $pelanggan['id_penjualan']) {

                                            foreach ($dataBarang as $barang) {
                                                if ($barang['id_barang'] == $detail['id_barang']) {
                                                    $harga_barang =  $barang['harga_barang'];
                                                    $stok_barang = $barang['stok_barang'];
                                                }
                                            }
                                    ?>
                                            <tbody>
                                                <div class="row row-cols-6">
                                                    <tr>
                                                        <td>
                                                            <form action="m_update_barang_detail.php" method="post">
                                                                <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                                                                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                                <div class="col">
                                                                    <select name="id_barang" id="" onchange="this.form.submit()" class="form-select">
                                                                        <?php
                                                                        foreach ($dataBarang as $barang) {
                                                                        ?> <option value="<?= $barang['id_barang'] ?>" <?php if ($barang['id_barang'] == $detail['id_barang']) echo "selected"; ?>><?= $barang['nama_barang'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </td>
                                                        <!-- kolom jumlah barang dan sub total dan stok barang -->
                                                        <form action="m_hitung_sub_total.php" method="post">
                                                            <div class="col">
                                                                <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                                                            </div>
                                                            <div class="col">
                                                                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                            </div>
                                                            <div class="col">
                                                                <input type="hidden" name="id_barang" class="form-select" aria-label="Default select example" value="<?= $detail['id_barang'] ?>">
                                                            </div>

                                                            <td>
                                                                <div class="col">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Rp.</span>
                                                                        <input type="text" name="harga_barang" class="form-control" id="" value="<?= $harga_barang ?>" readonly>
                                                                    </div>
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <input type="number" name="jumlah_barang" value="<?= $detail['jumlah_barang'] ?>" tabindex="1" onchange="this.form.submit()" class="form-control">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Rp.</span>
                                                                        <input type="text" name="sub_total" id="" class="form-control" value="<?= $detail['sub_total'] ?>" readonly>
                                                                    </div>
                                                            </td>
                                                            <td>
                                                                <div class="col">
                                                                    <input type="text" name="stok_barang" class="form-control" value="<?= $stok_barang ?>" readonly>
                                                                </div>
                                                            </td>
                                                        </form>
                                                        <!-- kolom hapus -->
                                                        <td>
                                                            <form action="m_hapus_detail_barang.php" method="post">
                                                                <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                                                                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                                                                <input type="hidden" name="jumlah_barang" value="<?= $detail['jumlah_barang'] ?>">
                                                                <input type="hidden" name="id_barang" value="<?= $detail['id_barang'] ?>">
                                                                <input type="submit" value="Hapus" class="btn btn-danger">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                </div>
                                        <?php   }
                                    }
                                        ?>

                                        <!-- kolom hitung total -->
                                        <form action="m_hitung_total.php" method="post">
                                            <input type="hidden" name="id_penjualan" value="<?= $detail['id_penjualan'] ?>">
                                            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                                            <tr>
                                                <?php
                                                //  hitung total pembelian dari tb_detail_penjualan
                                                $hitung = mysqli_query($koneksi, "SELECT SUM(sub_total) AS Total FROM tb_detail_penjualan WHERE id_penjualan='$pelanggan[id_penjualan]'");
                                                $total = mysqli_fetch_assoc($hitung);
                                                ?>
                                                <td colspan="2"></td>
                                                <td>Total</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span>
                                                        <input type="text" name="total" id="" class="form-control" value="<?= $total['Total'] ?>" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>Bayar</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span><input type="number" name="bayar" class="form-control" id="bayar" onchange="this.form.submit()" tabindex="1">
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                                <td>Kembali</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">Rp.</span><input type="number" name="kembali" id="" class="form-control" value="<?php if (isset($_GET['kembali'])) {
                                                                                                                                                                            echo    $kembali = $_GET['kembali'];
                                                                                                                                                                        } ?>" readonly>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            </tbody>
                                            </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--cooding table kasir end-->

    </div>
<?php }
        } ?>
</body>

</html>