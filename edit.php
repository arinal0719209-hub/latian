<?php
include "koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM testimoni WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $testimoni = $_POST['testimoni'];
    mysqli_query($koneksi, "UPDATE testimoni SET nama='$nama', testimoni='$testimoni' WHERE id='$id'");
    header("Location:index.php#testimoni");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Testimoni</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

<div class="container mt-5">
<h2>Edit Testimoni</h2>

<form method="post">
<input name="nama" class="form-control mb-2" value="<?= $row['nama'] ?>" required>

<textarea name="testimoni" class="form-control mb-2" required><?= $row['testimoni'] ?></textarea>

<button name="update" class="btn btn-success">Update</button>
<a href="index.php#testimoni" class="btn btn-secondary">Kembali</a>
</form>

</div>

</body>
</html>