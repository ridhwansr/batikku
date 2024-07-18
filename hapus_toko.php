<?php
include "koneksi.php";
$idToko = $_GET['id'];

$koneksi->query("DELETE FROM toko WHERE id_toko='$idToko'");

echo "<script> alert('Data Berhasil Dihapus')</script>";
header("location:tokoku.php");
