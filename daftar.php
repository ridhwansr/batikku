<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="ridhwansr13715@gmail.com">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/css/style_login.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <a href="index.php">
        <div class="back-button">
            <i class="fas fa-arrow-left"></i>
        </div>
    </a>
    <div class="register-container">
        <h1>Daftar</h1>
        <form method="POST">
            <div class="input-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="input-group">
                <label for="sandi">Kata Sandi</label>
                <input type="sandi" id="sandi" name="sandi" placeholder="Masukkan Kata Sandi" required>
            </div>
            <div class="input-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <button name="daftar" type="submit">Daftar</button>
        </form>
        <p>Sudah memiliki Akun? <a class="register-link" href="masuk.php ">Masuk</a></p>
    </div>
</body>

</html>

<?php
include 'koneksi.php';
if (isset($_POST['daftar'])) {
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];
    $nama = $_POST['nama'];

    $cekAkun = $koneksi->query("SELECT * FROM akun WHERE email='$email' AND sandi='$sandi'");
    $dataAkun = $cekAkun->fetch_assoc();

    if (empty($dataAkun)) {
        $koneksi->query("INSERT INTO akun (email, sandi, nama_akun) VALUES('$email','$sandi','$nama')");

        $cekAkun = $koneksi->query("SELECT * FROM akun WHERE email='$email' AND sandi='$sandi'");
        $dataAkun = $cekAkun->fetch_assoc();

        $_SESSION['idAkun'] = $dataAkun['id_akun'];
        $_SESSION['email'] = $dataAkun['email'];
        $_SESSION['namaAkun'] = $dataAkun['nama_akun'];
        echo "<script>location='index.php'</script>";
    } else {
        echo "<script>alert('Akun sudah terdaftar')</script>";
        echo "<script>location='daftar.php'</script>";
    }
}

?>