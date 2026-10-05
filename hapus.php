<?php
include "koneksi.php";
$id=$_GET['id'];
mysqli_query($koneksi,"DELETE FROM testimoni WHERE id='$id'");
header("location:index.php");
exit;
?>