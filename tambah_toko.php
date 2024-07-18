<?php
include 'koneksi.php';
if (!isset($_SESSION['idAkun'])) {
    echo "<script>alert('Login dulu')</script>";
    echo "<script>location='masuk.php'</script>";
};
include 'header.php';
?>
<section class="title-favorit">
    <h1 class="favorit-title">Tambah Toko</h1>
</section>
<section class="tambahdata">
    <div class="tambahdata-column">
        <form method="POST" class="tambahdata-form" enctype="multipart/form-data">
            <label class="tambahdata">Tambahkan Toko</label>
            <div class="tambahdata-input-group">
                <label for="namatoko">Nama Toko</label>
                <input type="text" id="namatoko" name="namatoko" placeholder="Nama Toko..." required>
            </div>
            <div class="tambahdata-input-group">
                <label for="gambar">Gambar</label>
                <input type="file" id="gambar" name="gambar" placeholder="Gambar..." required>
            </div>
            <div class="tambahdata-input-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Alamat..." required></textarea>
            </div>
            <div class="tambahdata-input-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi..." required></textarea>
            </div>
            <button name="tambahToko" type="submit" class="tambahdata-button">Tambah</button>
        </form>
    </div>
</section>
</main>
<?php
include 'footer.php';

if (isset($_POST['tambahToko'])) {
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

    $idAkun = $_SESSION['idAkun'];
    $cekStores = $koneksi->query("SELECT * FROM toko WHERE id_akun='$idAkun'");
    $dataStores = $cekStores->fetch_assoc();

    if (empty($dataStores)) {
        // Jika file berhasil di upload
        if (move_uploaded_file($lokasiFile, $uploadFile)) {
            // Masukkan informasi file ke dalam database
            $koneksi->query("INSERT INTO toko (nama_toko, gambar_toko, alamat_toko, deskripsi_toko, id_akun) 
                VALUES('$namaToko', '$uploadFile','$alamatToko','$deskripsiToko', '$idAkun')");
            echo "<script>location='tokoku.php'</script>";
        } else {
            echo "<script>alert('Tambah Toko gagal');</script>";
        }
    } else {
        echo "<script>alert('Maksimal 1 Toko');</script>";
        echo "<script>location='tokoku.php'</script>";
    }
}

?>