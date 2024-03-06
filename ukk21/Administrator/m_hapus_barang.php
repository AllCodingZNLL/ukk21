<?php
//ambil koneksi
include "../config.php";

//ambil data id_barang dari URL
$id_barang = $_GET['id_barang'];

//cari data di tabel barang
$cari = mysqli_query($koneksi, "SELECT * FROM tb_detail_penjualan WHERE id_barang='$id_barang'");

$hasilCari = mysqli_fetch_assoc($cari);


//cek jika total > 0 maka tidak bisa dihapus
if ($hasilCari['id_barang'] > 0) {
    echo "<script>alert('GAGAL HAPUS !!! DATA SUDAH DIPAKAI TRANSAKSI')</script>";
    header('location: ?halaman=pendataan');
} else {

    //hapus barang berdasarkan id_barang 
    $sql = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang='$id_barang'");

    //jika berhasil kembali ke v_daftar_barang.php
    if ($sql) {
        header('location: v_daftar_barang.php');
    }
}
