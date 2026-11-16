
<?php
include "koneksi.php";

$query = "SELECT * FROM kritik ORDER BY tanggal DESC";
$hasil = mysqli_query($koneksi, $query);

$jumlah = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspirasi Masyarakat — Suara Rakyat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <a href="index.php" class="brand">
        <span class="brand-icon">S</span>
        <span>suara<span class="brand-red">rakyat.</span></span>
    </a>

    <div class="nav-links">
        <a href="index.php">Beranda</a>
        <a href="tampil.php" class="active">Aspirasi</a>
    </div>

    <a href="index.php#form-kritik" class="nav-button">
        Kirim Aspirasi ↗
    </a>
</nav>

<header class="listing-hero">
    <div class="section-label">RUANG ASPIRASI MASYARAKAT</div>

    <h1>Suara yang telah<br><span>disampaikan.</span></h1>

    <p>
        Kumpulan kritik, gagasan, dan aspirasi
        yang telah dikirimkan melalui Suara Rakyat.
    </p>

    <div class="listing-count">
        <strong><?php echo number_format($jumlah); ?></strong>
        <span>aspirasi tersimpan</span>
    </div>
</header>

<main class="listing-container">

    <div class="listing-heading">
        <div>
            <span class="section-label">DAFTAR ASPIRASI</span>
            <h2>Pendapat masyarakat</h2>
        </div>

        <a href="index.php#form-kritik" class="secondary-button">
            + Tulis Aspirasi
        </a>
    </div>

    <?php if ($jumlah > 0) { ?>

        <div class="criticism-grid">

            <?php while ($data = mysqli_fetch_assoc($hasil)) { ?>

                <article class="criticism-card">

                    <div class="card-top">
                        <span class="category-tag">
                            <?php echo htmlspecialchars($data['kategori']); ?>
                        </span>

                        <span class="card-id">
                            #<?php echo str_pad($data['id'], 4, "0", STR_PAD_LEFT); ?>
                        </span>
                    </div>

                    <h3>
                        <?php echo htmlspecialchars($data['judul']); ?>
                    </h3>

                    <p class="criticism-content">
                        <?php echo nl2br(htmlspecialchars($data['isi_kritik'])); ?>
                    </p>

                    <div class="card-bottom">
                        <div class="author-info">
                            <div class="author-avatar">
                                <?php echo $data['anonim'] == 1 ? "A" : "P"; ?>
                            </div>

                            <div>
                                <strong>
                                    <?php
                                    echo $data['anonim'] == 1
                                        ? "Anonim"
                                        : htmlspecialchars($data['nama']);
                                    ?>
                                </strong>
                                <small>Pengirim aspirasi</small>
                            </div>
                        </div>

                        <time>
                            <?php echo htmlspecialchars($data['tanggal']); ?>
                        </time>
                    </div>

                </article>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="empty-state">
            <div class="empty-icon">✦</div>
            <h3>Belum ada aspirasi</h3>
            <p>Jadilah orang pertama yang menyampaikan pendapat.</p>
            <a href="index.php#form-kritik" class="primary-button">
                Kirim Aspirasi ↗
            </a>
        </div>

    <?php } ?>

</main>

<section class="closing-section">
    <div>
        <span class="section-label">GILIRAN ANDA</span>
        <h2>Setiap pendapat layak untuk disampaikan.</h2>
    </div>

    <a href="index.php#form-kritik">Sampaikan Aspirasi →</a>
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
