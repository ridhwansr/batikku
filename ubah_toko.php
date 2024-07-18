<?php
include 'koneksi.php';
if (!isset($_SESSION['idAkun'])) {
    echo "<script>alert('Login dulu')</script>";
    echo "<script>location='masuk.php'</script>";
};

$idToko = $_GET['id'];
$cekStores = $koneksi->query("SELECT * FROM toko WHERE id_toko='$idToko'");
$dataStores = $cekStores->fetch_assoc();

include 'header.php';
?>
<section class="title-favorit">
    <div>
        <h1 class="favorit-title">Ubah Toko</h1>
    </div>
</section>
<section class="tambahdata">
    <div class="tambahdata-column">
        <form method="POST" class="tambahdata-form" enctype="multipart/form-data">
            <label class="tambahdata">Ubah Data Toko</label>
            <div class="tambahdata-input-group">
                <label for="namatoko">Nama Toko</label>
                <input type="text" id="namatoko" name="namatoko" value="<?php echo $dataStores['nama_toko'] ?>" required>
            </div>
            <div class="tambahdata-input-group">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar" value="<?php echo $dataStores['nama_toko'] ?>" required>
            </div>
            <div class="tambahdata-input-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" value="<?php echo $dataStores['gambar_toko'] ?>" required></textarea>
            </div>
            <div class="tambahdata-input-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" id="deskripsi" name="deskripsi" value="<?php echo $dataStores['deskripsi_toko'] ?>" placeholder="Deskripsi..." required>
            </div>
            <button name="ubahtoko" type="submit" class="tambahdata-button">Ubah</button>
        </form>
    </div>
</section>
</main>

<?php
include 'footer.php';

if (isset($_POST['ubahtoko'])) {
    $namaToko = $_POST['namatoko'];
    $alamatToko = $_POST['alamat'];
    $deskripsiToko = $_POST['deskripsi'];

    // Nama file temporary yang akan disimpan di server
    $lokasiFile = $_FILES['gambar']['tmp_name'];
    // Membaca nama file yang akan diupload
    $namaFile = $_FILES['gambar']['name'];

    // Folder penyimpanan berkas/file
    $uploadDir = "assets/toko/";
    // Menggabungkan nama folder dan nama file
    $uploadFile = $uploadDir . $namaFile;

    if (move_uploaded_file($lokasiFile, $uploadFile)) {
        // Masukkan informasi file ke dalam database
        $koneksi->query("UPDATE toko SET nama_toko='$namaToko', gambar_toko='$uploadFile', alamat_toko='$alamatToko', deskripsi_toko='$deskripsiToko'
        WHERE id_toko='$idToko'");
        echo "<script>location='tokoku.php'</script>";
    } else {
        echo "<script>alert('Ubah Toko gagal');</script>";
    }
}
?>