<?php
include 'koneksi.php';

$stores = array();
$listStores = $koneksi->query("SELECT * FROM toko");
while ($dataStores = $listStores->fetch_assoc()) {
    $stores[] = $dataStores;
}

include 'header.php';
?>

<section class="title-katalog">
    <div>
        <h1 class="katalog-title">Katalog Toko</h1>
    </div>
</section>
<section class="card-section">
    <?php foreach ($stores as $valueStores) : ?>
        <div class="card">
            <img src="<?php echo $valueStores['gambar_toko'] ?>" alt="<?php echo $valueStores['nama_toko'] ?>">
            <div class="card-content">
                <h2> <a href="rincian.php?store=<?php echo $valueStores['id_toko'] ?>"><?php echo $valueStores['nama_toko'] ?></a></h2>
                <p><?php echo $valueStores['deskripsi_toko'] ?></p>
            </div>
        </div>
    <?php endforeach ?>
</section>
</main>

<?php
include 'footer.php';
?>