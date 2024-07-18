<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="ridhwansr13715@gmail.com">
    <title>Masuk</title>
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
    <div class="login-container">
        <h1>Masuk</h1>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="input-group">
                <label for="sandi">Kata Sandi</label>
                <input type="password" id="sandi" name="sandi" placeholder="Masukkan Kata Sandi" required>
            </div>
            <button name="masuk" type="submit">Masuk</button>
        </form>
        <p>Belum memiliki Akun? <a class="register-link" href="daftar.php">Daftar</a></p>
    </div>
</body>

</html>

<?php
include 'koneksi.php';
if (isset($_POST['masuk'])) {
    $email = $_POST['email'];
    $sandi = $_POST['sandi'];

    $cekAkun = $koneksi->query("SELECT * FROM akun WHERE email='$email' AND sandi='$sandi'");
    $dataAkun = $cekAkun->fetch_assoc();

    if (empty($dataAkun)) {
        echo "<script>alert('Akun tidak terdaftar')</script>";
        echo "<script>location='masuk.php'</script>";
    } else {
        $_SESSION['idAkun'] = $dataAkun['id_akun'];
        $_SESSION['email'] = $dataAkun['email'];
        echo "<script>location='index.php'</script>";
    }
}

?>