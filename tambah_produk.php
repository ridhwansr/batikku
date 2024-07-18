<?php
include 'koneksi.php';
if (!isset($_SESSION['idAkun'])) {
    echo "<script>alert('Login dulu')</script>";
    echo "<script>location='masuk.php'</script>";
};
include 'header.php';
?>
<section class="title-favorit">
    <div>
        <h1 class="favorit-title">Tambah Produk</h1>
    </div>
</section>
<section class="tambahdata">
    <div class="tambahdata-column">
        <form method="POST" class="tambahdata-form" enctype="multipart/form-data">
            <label class="tambahdata">Tambahkan Produk</label>
            <div class="tambahdata-input-group">
                <label for="namaproduk">Nama Produk</label>
                <input type="text" id="namaproduk" name="namaproduk" placeholder="Nama Produk..." required>
            </div>
            <div class="tambahdata-input-group">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambarproduk" name="gambarproduk" placeholder="Gambar..." required>
            </div>
            <div class="tambahdata-input-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi..." required></textarea>
            </div>
            <button name="tambahproduct" type="submit" class="tambahdata-button">Tambah</button>
        </form>
    </div>
</section>
</main>

<?php
include 'footer.php';

if (isset($_POST['tambahproduct'])) {
    $namaProduk = $_POST['namaproduk'];
    $deskripsiProduk = $_POST['deskripsi'];

    // Nama file temporary yang akan disimpan di server
    $lokasiFile = $_FILES['gambarproduk']['tmp_name'];
    // Membaca nama file yang akan diupload
    $namaFile = $_FILES['gambarproduk']['name'];

    // Folder penyimpanan berkas/file
    $uploadDir = "assets/produk/";
    // Menggabungkan nama folder dan nama file
    $uploadFile = $uploadDir . $namaFile;

    $idAkun = $_SESSION['idAkun'];
    $cekStores = $koneksi->query("SELECT * FROM toko WHERE id_akun='$idAkun'");
    $dataStores = $cekStores->fetch_assoc();

    if (move_uploaded_file($lokasiFile, $uploadFile)) {
        // Masukkan informasi file ke dalam database
        $koneksi->query("INSERT INTO produk (nama_produk, gambar_produk, deskripsi_produk, id_akun) 
                VALUES('$namaProduk', '$uploadFile','$deskripsiProduk', '$idAkun')");
        echo "<script>location='tokoku.php'</script>";
    } else {
        echo "<script>alert('Tambah Produk gagal');</script>";
    }
}
?>