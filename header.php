<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="dicoding:email" content="ridhwansr13715@gmail.com">
    <title>Batikku</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <a href="#main-content" class="skip-to-content">Skip to Content</a>

    <header>
        <div class="logo">
            <img src="assets/image/batikku.png" alt="Batikku-Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="katalog.php">Katalog Toko</a></li>
                <li><a href="kontak.php">Hubungi Kami</a></li>
                <?php
                if (!isset($_SESSION['idAkun'])) {
                    echo "<li><a href='masuk.php' class='login' id='nav-login'>Login</a></li>";
                } else {
                    echo '<li><a href="tokoku.php" class="store"><i id="store" class="fas fa-store"></i></a></li>';
                    echo "<li><a href='logout.php' class='logout' id='nav-login'>Logout</a></li>";
                }
                ?>
            </ul>
        </nav>
        <div class="hamburger-menu">
            ☰
        </div>
    </header>

    <main class="main" id="main-content">
        <section class="hero">
            <div class="hero-image-container">
                <img src="assets/image/hero1.jpg" alt="Gambar Hero" class="hero-image">
            </div>
            <div class="hero-text">
                <div class="location">Pekalongan, <span class="highlight">Indonesia</span></div>
                <h1>CINTAI <br>
                    PRODUK <br>
                    DALAM NEGRI</h1>
            </div>
        </section>