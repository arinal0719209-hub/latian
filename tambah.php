<?php
include "koneksi.php";
$nama = $_POST['nama'];
$testimoni = $_POST['testimoni'];
mysqli_query($koneksi, "INSERT INTO testimoni (nama, testimoni)VALUES ('$nama', '$testimoni')");
header("Location: index.php#testimoni");
exit;
?>