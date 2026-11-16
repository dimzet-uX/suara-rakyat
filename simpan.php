<?php

include "koneksi.php";

$nama = $_POST['nama'];
$anonim = $_POST['anonim'];
$kategori = $_POST['kategori'];
$judul = $_POST['judul'];
$isi_kritik = $_POST['isi_kritik'];

if ($anonim == 1) {
    $nama = NULL;
}

$query = "INSERT INTO kritik
(nama, anonim, kategori, judul, isi_kritik)
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);

mysqli_stmt_bind_param(
    $stmt,
    "sisss",
    $nama,
    $anonim,
    $kategori,
    $judul,
    $isi_kritik
);

if (mysqli_stmt_execute($stmt)) {
    echo "Kritik berhasil disimpan!";
} else {
    echo "Kritik gagal disimpan!";
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);

?>