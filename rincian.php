<?php
include 'koneksi.php';

$idStore = $_GET['store'];
$cekStores = $koneksi->query("SELECT * FROM toko WHERE id_toko='$idStore'");
$dataStores = $cekStores->fetch_assoc();

$idAkun = $dataStores['id_akun'];
$products = array();
$cekProducts = $koneksi->query("SELECT * FROM produk WHERE id_akun='$idAkun'");
while ($dataProducts = $cekProducts->fetch_assoc()) {
    $products[] = $dataProducts;
}
include 'header.php';
?>

<section class="rincian-content">
    <div class="rincian-best-batik" style="gap: 20px;">
        <?php if (!empty($dataStores)) : ?>
            <img src="<?php echo $dataStores['gambar_toko'] ?>" alt="<?php echo $dataStores['nama_toko'] ?>" class="rincian-best-batik-gambar">
            <div class="rincian-alamat-dan-nama">
                <div class="rincian-alamat-toko">
                    <p><?php echo $dataStores['alamat_toko'] ?></p>
                </div>
                <div class="rincian-nama-toko">
                    <h2><?php echo $dataStores['nama_toko'] ?></h2>
                </div>
                <hr class="rincian-garis-panjang">
                <div class="rincian-deskripsi-toko">
                    <p><?php echo $dataStores['deskripsi_toko'] ?></p>
                </div>
            </div>
        <?php endif ?>
    </div>
</section>
<section class="title-katalog">
    <div>
        <h1 class="katalog-title">Produk Toko</h1>
    </div>
</section>
<section class="card-section-rincian">
    <?php foreach ($products as $product) : ?>
        <div class="card-rincian">
            <img src="<?php echo $product['gambar_produk'] ?>" alt="<?php echo $product['nama_produk'] ?>">
            <div class="card-content-rincian">
                <h2><?php echo $product['nama_produk'] ?></h2>
                <p><?php echo $product['deskripsi_produk'] ?></p>
            </div>
        </div>
    <?php endforeach ?>
</section>
</main>

<?php
include 'footer.php';
?>