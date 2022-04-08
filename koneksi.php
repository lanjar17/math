<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "game";

$koneksi = mysqli_connect($host, $username, $password, $db);

if (!$koneksi) {
    die("Koneksi Gagal " . mysqli_connect_error());
}


?>