<?php
include "../config.php";

//terima data dari v_detail_penjualan.php
$id_detail_penjualan = $_POST['id_detail_penjualan'];
$id_pelanggan = $_POST['id_pelanggan'];

//terima data untuk kembalikan stok barang
$jumlah_barang = $_POST['jumlah_barang'];
$id_barang = $_POST['id_barang'];



// cari data ditabel detail
$cari = mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id_pelanggan='$id_pelanggan'");

$hasilCari = mysqli_fetch_assoc($cari);

// cek jika total > 0 maka tidak bisa dihapus
if ($hasilCari['total'] > 0) {
    echo "<script>alert('GAGAL HAPUS !!! DATA SUDAH DIPAKAI TRANSAKSI')</script>";
    // include('v_detail_penjualan.php');
    header("location: v_detail_penjualan.php?id_pelanggan=$id_pelanggan");
} else {

    //cari data barang di tb_barang
    $cari = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");

    $hasil = mysqli_fetch_assoc($cari);
    $tampung_jumlah_barang = $hasil['stok_barang'];

    //tambahkan jumlah barang di tb_barang dengan jumlah barang yang dihapus
    $stok_barang_baru = $tampung_jumlah_barang + $jumlah_barang;

    $barang = mysqli_query($koneksi, "UPDATE tb_barang SET stok_barang='$stok_barang_baru' WHERE id_barang='$id_barang'");

    //hapus data di tb_detail_penjualan berdarkan id_detail_penjualan
    $sql = mysqli_query($koneksi, "DELETE FROM tb_detail_penjualan WHERE id_detail_penjualan='$id_detail_penjualan'");

    header("location: v_detail_penjualan.php?id_pelanggan=$id_pelanggan");
}
