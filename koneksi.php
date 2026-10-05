<?php
$koneksi = mysqli_connect("localhost","root","","latian");
if(!$koneksi){
    die("koneksi gagal:".mysqli_connect_error());
}
?>