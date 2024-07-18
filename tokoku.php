<?php
include 'koneksi.php';
if (!isset($_SESSION['idAkun'])) {
    echo "<script>alert('Login dulu')</script>";
    echo "<script>location='masuk.php'</script>";
};

$idAkun = $_SESSION['idAkun'];
$cekStores = $koneksi->query("SELECT * FROM toko WHERE id_akun='$idAkun'");
$dataStores = $cekStores->fetch_assoc();

$products = array();
$cekProducts = $koneksi->query("SELECT * FROM produk WHERE id_akun='$idAkun'");
while ($dataProducts = $cekProducts->fetch_assoc()) {
    $products[] = $dataProducts;
}

include 'header.php';
?>

<section class="title-favorit">
    <h1 class="favorit-title">Tokoku</h1>
</section>
<?php
if (empty($dataStores)) {
    echo '<a href="tambah_toko.php" class="tokoku-tambah-link">Tambah</a>';
}
?>
<section class="tokoku-tabel-toko">
    <div class="tokoku-tabel-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Gambar</th>
                    <th>Alamat</th>
                    <th>Deskripsi</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($dataStores)) : ?>
                    <tr>
                        <td>1</td>
                        <td><?php echo $dataStores['nama_toko'] ?></td>
                        <td><img src="<?php echo $dataStores['gambar_toko'] ?>" alt="Foto <?php echo $dataStores['nama_toko'] ?>" class="tokoku-toko-image"></td>
                        <td><?php echo $dataStores['alamat_toko'] ?></td>
                        <td><?php echo $dataStores['deskripsi_toko'] ?></td>
                        <td>
                            <a href="ubah_toko.php?id=<?php echo $dataStores['id_toko'] ?>" class="tokoku-ubah">Ubah</a>
                            <a href="hapus_toko.php?id=<?php echo $dataStores['id_toko'] ?>" class="tokoku-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</section>

<section class="title-favorit">
    <h1 class="favorit-title">Produkku</h1>
</section>
<a href="tambah_produk.php" class="tokoku-tambah-link">Tambah</a>
<section class="tokoku-tabel-toko">
    <div class="tokoku-tabel-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Kelola</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=0;
                foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $no += 1 ?></td>
                        <td><?php echo $product['nama_produk'] ?></td>
                        <td><img src="<?php echo $product['gambar_produk'] ?>" alt="<?php echo $product['nama_produk'] ?>" class="tokoku-toko-image"></td>
                        <td><?php echo $product['deskripsi_produk'] ?></td>
                        <td>
                            <a href="ubah_produk.php?id=<?php echo $product['id_produk'] ?>" class="tokoku-ubah">Ubah</a>
                            <a href="hapus_produk.php?id=<?php echo $product['id_produk'] ?>" class="tokoku-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
</main>

<?php
include 'footer.php';
?>