<?php
include "koneksi.php";
$idProduk = $_GET['id'];

$koneksi->query("DELETE FROM produk WHERE id_produk='$idProduk'");

echo "<script> alert('Data Berhasil Dihapus')</script>";
header("location:tokoku.php");
