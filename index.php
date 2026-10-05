<?php
include "koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM testimoni ORDER BY id DESC");
?>

<html>
<head>
<title>SweetBake - Kursus Membuat Kue</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="index.php">
<img src="assets/lo.jpg" width="40"> SweetBake
</a>

<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">
<ul class="navbar-nav ml-auto">
<li class="nav-item"><a class="nav-link" href="#profil">Profil</a></li>
<li class="nav-item"><a class="nav-link" href="#kursus">Kursus</a></li>
<li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
<li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
</ul>
</div>
</div>
</nav>

<!-- PROFIL -->
<section id="profil">
<div class="position-relative">
<img src="assets/profil.jpg" class="img-fluid w-100" style="height:550px;object-fit:cover">
<div class="position-absolute text-center text-white" style="top:50%;left:10%;right:10%">
<h1>Kursus Membuat Kue</h1>
<p>Belajar membuat kue sederhana dan lezat bersama SweetBake.</p>
<a href="#kursus" class="btn btn-success">Lihat Kursus</a>
<button class="btn btn-success" data-toggle="modal" data-target="#modalWA">WhatsApp</button>
</div>
</div>
</section>

<!-- KURSUS -->
<section class="py-5" id="kursus">
<div class="container">
<h2 class="text-center mb-4">Pilihan Kursus</h2>
<div class="row">

<?php
$kursus = [
    ["br.jpg","Brownies","Rp150.000","mengenal bahan, membuat adonan, dan memanggang"],
    ["do.jpg","Donat","Rp125.000","mengenal bahan, membuat adonan, membentuk, dan menggoreng"],
    ["bj.jpg","Bolu Jadul","Rp140.000","mengenal bahan, membuat adonan, dan memanggang"]
];

foreach($kursus as $k){
?>
<div class="col-md-4 mb-4">
<div class="card">
<img src="assets/<?= $k[0] ?>" class="card-img-top">
<div class="card-body">
<h5><?= $k[1] ?></h5>
<p>Belajar membuat <?= strtolower($k[1]) ?> yang lembut dan lezat.</p>
<p><b>Materi:</b> <?= $k[3] ?>.</p>
<p><b><?= $k[2] ?> / bulan</b></p>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</section>

<!-- GALERI -->
<section class="py-5" id="galeri">
<div class="container">
<h2 class="text-center mb-4">Galeri</h2>
<div class="row">

<?php
$gambar = ["br.jpg","do.jpg","bj.jpg","k.jpg","ku.jpg","kur.jpg"];
foreach($gambar as $g){
?>
<div class="col-md-4 mb-4">
<img src="assets/<?= $g ?>" class="img-fluid">
</div>
<?php } ?>

</div>
</div>
</section>

<!-- TESTIMONI -->
<section class="py-5" id="testimoni">
<div class="container">
<h2 class="text-center mb-4">Testimoni</h2>

<form action="tambah.php" method="post">
<input name="nama" class="form-control mb-2" placeholder="Nama" required>
<textarea name="testimoni" class="form-control mb-2" placeholder="Tulis testimoni..." required></textarea>
<button class="btn btn-success">Kirim Testimoni</button>
</form>

<?php while($row=mysqli_fetch_assoc($data)){ ?>
<div class="border rounded p-3 mt-3">
<h5><?= $row['nama'] ?></h5>
<p><?= $row['testimoni'] ?></p>
<a href="edit.php?id=<?= $row['id'] ?>">Edit</a>
<a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus testimoni?')">Hapus</a>
</div>
<?php } ?>

</div>
</section>

<!-- FOOTER -->
<footer class="bg-light text-center p-3">
© 2026 SweetBake - Kursus Membuat Kue
</footer>

<!-- MODAL WHATSAPP -->
<div class="modal" id="modalWA">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Hubungi SweetBake</h5>
<button class="close" data-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
<p>Ada pertanyaan tentang kursus?</p>
</div>

<div class="modal-footer">
<a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success">
Chat WhatsApp
</a>
<button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
</div>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>