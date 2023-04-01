<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "nurrizkyromadhon";
$koneksi = mysqli_connect($server, $user, $password, $nama_database);
//echo "berhasil terkoneksi..... ";
if( !$koneksi ){
die("Gagal terhubung dengan database: " . 
mysqli_connect_error());
}
