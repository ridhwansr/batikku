<?php
include 'koneksi.php';
include 'header.php';
?>
<section class="title-favorit">
    <div>
        <h1 class="favorit-title">Hubungi Kami</h1>
    </div>
</section>
<section class="kontak">
    <div class="kontak-container">
        <div class="kontak-left-column">
            <h2>HUBUNGI KAMI<br> MELALUI KONTAK<br> KAMI</h2>
            <p>Lorem ipsum dolor sit amet consectetur. Nec lorem arcu turpis dui cursus posuere.
                Eu ut odio rhoncus augue sit nullam adipiscing. Elit odio sodales scelerisque aliquam.
                Mi sed sed fermentum cras, lobortis in ullamcorper consectetur. Vel nulla dui enim, diam
                faucibus lorem urna. Vitae ut faucibus semper ut eu habitant. Vel a euismod consequat sagittis
                gravida habitant lacus sed mi. Integer ligula eros lacinia non pellentesque adipiscing.</p>
            <div class="kontak-info">
                <div class="kontak-card"><a href="https:/wa.me/6282230076831" target="_blank">
                        <div class="kontak-card-content">
                            <ul>
                                <li>
                                    <div class="kontak-icon">
                                        <img src="assets/image/whatsapp.png" alt="Whatsapp">
                                    </div>
                                    <div class="kontak-info">
                                        <h4>082 230 076 831</h4>
                                        <p>No Whatsapp - Risman</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="kontak-card"><a href="mailto:ridhwansr13715@gmail.com">
                        <div class="kontak-card-content">
                            <ul>
                                <li>
                                    <div class="kontak-icon">
                                        <img src="assets/image/gmail.png" alt="Gmail">
                                    </div>
                                    <div class="kontak-info">
                                        <h4>ridhwansr13715@gmail.com</h4>
                                        <p>Email Bisnis</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="kontak-right-column">
            <form action="https://formspree.io/f/xldrdlkw" method="POST" class="kontak-form">
                <label class="kontak">Berikan Umpan Balik Kepada Kami</label>
                <div class="kontak-input-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" placeholder="Email..." required>
                </div>
                <div class="kontak-input-group">
                    <label for="nama">Subjek</label>
                    <input type="text" id="subjek" name="subjek" placeholder="Subjek..." required>
                </div>
                <div class="kontak-input-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" placeholder="Pesan..." required></textarea>
                </div>
                <button type="submit" class="kontak-button">Kirim</button>
            </form>
        </div>
    </div>
</section>
</main>

<?php
include 'footer.php';
?>