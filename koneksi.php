
<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "suara_rakyat"
);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>
