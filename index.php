
<?php
include "koneksi.php";

$result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kritik");
$jumlah = mysqli_fetch_assoc($result)['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suara Rakyat — Ruang Aspirasi Indonesia</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="brand">
        <span class="brand-icon">S</span>
        <span>suara<span class="brand-red">rakyat.</span></span>
    </a>

    <div class="nav-links">
        <a href="index.php" class="active">Beranda</a>
        <a href="tampil.php">Aspirasi</a>
    </div>

    <a href="#form-kritik" class="nav-button">Sampaikan Aspirasi ↗</a>
</nav>

<header class="hero">
    <div class="hero-content">
        <div class="eyebrow">
            <span class="status-dot"></span>
            RUANG ASPIRASI DIGITAL INDONESIA
        </div>

        <h1>
            Suara Anda,<br>
            <span>Perubahan Kita.</span>
        </h1>

        <p>
            Setiap pendapat memiliki arti. Sampaikan kritik,
            gagasan, dan aspirasi untuk Indonesia yang lebih baik.
        </p>

        <div class="hero-actions">
            <a href="#form-kritik" class="primary-button">
                Sampaikan Aspirasi <span>↗</span>
            </a>

            <a href="tampil.php" class="secondary-button">
                Lihat Aspirasi →
            </a>
        </div>

        <div class="hero-note">
            <span>✓</span> Bebas berpendapat
            <span>✓</span> Identitas opsional
            <span>✓</span> Mudah digunakan
        </div>
    </div>

    <div class="hero-visual">
        <div class="visual-top">
            <span class="visual-label">SUARA MASYARAKAT</span>
            <span class="visual-number">01 / 01</span>
        </div>

        <div class="quote-mark">“</div>

        <h2>
            Perubahan dimulai
            ketika suara berani
            disampaikan.
        </h2>

        <div class="visual-bottom">
            <span>RUANG ASPIRASI</span>
            <span>INDONESIA 2026</span>
        </div>
    </div>
</header>

<section class="stats-section">
    <div class="stat-item">
        <div class="stat-number">
            <?php echo number_format($jumlah); ?>
        </div>
        <div class="stat-label">Aspirasi terkirim</div>
    </div>

    <div class="stat-item">
        <div class="stat-number">07</div>
        <div class="stat-label">Kategori aspirasi</div>
    </div>

    <div class="stat-item">
        <div class="stat-number">01</div>
        <div class="stat-label">Ruang untuk semua</div>
    </div>

    <div class="stat-description">
        Satu ruang untuk menyampaikan
        berbagai pandangan dan gagasan.
    </div>
</section>

<main class="main-content" id="form-kritik">

    <div class="section-heading">
        <div>
            <div class="section-label">Sampaikan Pendapatmu</div>
            <h2>Mulai dari suara Anda.</h2>
            <p>
                Isi formulir berikut untuk mengirimkan
                kritik maupun aspirasi.
            </p>
        </div>

        <div class="form-index">FORM / 001</div>
    </div>

    <div class="form-layout">

        <aside class="form-sidebar">
            <div class="sidebar-number">01</div>
            <h3>Bagaimana Indonesia bisa menjadi lebih baik?</h3>

            <p>
                Pendapat yang disampaikan secara terbuka
                dapat menjadi awal dari perubahan.
            </p>

            <div class="sidebar-divider"></div>

            <div class="sidebar-info">
                <span class="info-icon">01</span>
                <div>
                    <strong>Pilih identitas</strong>
                    <small>Gunakan nama atau anonim.</small>
                </div>
            </div>

            <div class="sidebar-info">
                <span class="info-icon">02</span>
                <div>
                    <strong>Tulis aspirasi</strong>
                    <small>Sampaikan pendapat dengan jelas.</small>
                </div>
            </div>

            <div class="sidebar-info">
                <span class="info-icon">03</span>
                <div>
                    <strong>Kirim pendapat</strong>
                    <small>Aspirasi akan disimpan.</small>
                </div>
            </div>
        </aside>

        <section class="form-card">

            <div class="form-card-heading">
                <div>
                    <span class="section-label">FORMULIR DIGITAL</span>
                    <h3>Kirim Aspirasi</h3>
                </div>
                <span class="required-note">* Wajib diisi</span>
            </div>

            <form action="simpan.php" method="POST">

                <div class="field-group">
                    <label>Identitas Pengirim</label>

                    <div class="identity-options">
                        <label class="identity-option">
                            <input type="radio" name="anonim"
                                   value="1" checked>
                            <span class="option-content">
                                <strong>Anonim</strong>
                                <small>Tanpa nama</small>
                            </span>
                        </label>

                        <label class="identity-option">
                            <input type="radio" name="anonim"
                                   value="0">
                            <span class="option-content">
                                <strong>Dengan Nama</strong>
                                <small>Gunakan identitas</small>
                            </span>
                        </label>
                    </div>
                </div>

                <div class="field-group">
                    <label for="nama">Nama Pengirim</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama Anda (opsional)"
                        maxlength="100"
                    >
                </div>

                <div class="field-group">
                    <label for="kategori">Kategori Aspirasi <span>*</span></label>

                    <select name="kategori" id="kategori" required>
                        <option value="">Pilih kategori aspirasi</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Infrastruktur">Infrastruktur</option>
                        <option value="Politik dan Pemerintahan">Politik dan Pemerintahan</option>
                        <option value="Lingkungan">Lingkungan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div class="field-group">
                    <label for="judul">Judul Aspirasi <span>*</span></label>
                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        placeholder="Contoh: Pemerataan fasilitas pendidikan"
                        maxlength="200"
                        required
                    >
                </div>

                <div class="field-group">
                    <label for="isi_kritik">Isi Kritik dan Aspirasi <span>*</span></label>
                    <textarea
                        name="isi_kritik"
                        id="isi_kritik"
                        placeholder="Tuliskan pendapat, kritik, atau saran Anda secara jelas..."
                        required
                    ></textarea>
                    <div class="field-hint">
                        Sampaikan pendapat dengan bahasa yang jelas dan bertanggung jawab.
                    </div>
                </div>

                <div class="form-footer">
                    <span>Pastikan informasi sudah benar.</span>
                    <button type="submit" class="submit-button">
                        Kirim Aspirasi <span>↗</span>
                    </button>
                </div>

            </form>
        </section>

    </div>
</main>

<section class="closing-section">
    <div>
        <span class="section-label">SUARA ANDA PENTING</span>
        <h2>Perbedaan pendapat adalah bagian dari demokrasi.</h2>
    </div>

    <a href="tampil.php">Jelajahi aspirasi →</a>
</section>

<footer class="footer">
    <a href="index.php" class="brand footer-brand">
        <span class="brand-icon">S</span>
        <span>suara<span class="brand-red">rakyat.</span></span>
    </a>

    <p>Ruang aspirasi digital untuk masyarakat Indonesia.</p>

    <span>© 2026 Suara Rakyat. Ruang untuk berpendapat.</span>
</footer>

</body>
</html>
