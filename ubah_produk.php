<?php
include 'koneksi.php';
if (!isset($_SESSION['idAkun'])) {
    echo "<script>alert('Login dulu')</script>";
    echo "<script>location='masuk.php'</script>";
};

$idProduct = $_GET['id'];
$cekProducts = $koneksi->query("SELECT * FROM produk WHERE id_produk='$idProduct'");
$dataProducts = $cekProducts->fetch_assoc();

include 'header.php';
?>
<section class="title-favorit">
    <div>
        <h1 class="favorit-title">Ubah Produk</h1>
    </div>
</section>
<section class="tambahdata">
    <div class="tambahdata-column">
        <form method="POST" class="tambahdata-form" enctype="multipart/form-data">
            <label class="tambahdata">Ubah Data Produk</label>
            <div class="tambahdata-input-group">
                <label for="namaproduk">Nama Produk</label>
                <input type="text" id="namaproduk" name="namaproduk" value="<?php echo $dataProducts['nama_produk'] ?>" required>
            </div>
            <div class="tambahdata-input-group">
                <label for="gambarproduk">Gambar</label>
                <input type="file" id="gambarproduk" name="gambarproduk" value="<?php echo $dataProducts['gambar_produk'] ?>" required>
            </div>
            <div class="tambahdata-input-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" value="<?php echo $dataProducts['deskripsi_produk'] ?>" required></textarea>
            </div>
            <button name="ubahproduk" type="submit" class="tambahdata-button">Ubah</button>
        </form>
    </div>
</section>
</main>

<?php
include 'footer.php';

if (isset($_POST['ubahproduk'])) {
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

    if (move_uploaded_file($lokasiFile, $uploadFile)) {
        // Masukkan informasi file ke dalam database
        $koneksi->query("UPDATE produk SET nama_produk='$namaProduk', gambar_produk='$uploadFile', deskripsi_produk='$deskripsiProduk'
        WHERE id_produk='$idProduct'");
        echo "<script>location='tokoku.php'</script>";
    } else {
        echo "<script>alert('Ubah Produk gagal');</script>";
    }
}
?>