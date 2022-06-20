<?php

$koneksi = mysqli_connect('127.0.0.1:3306', 'root', '', 'perpustakaan');

if (!$koneksi) {
    echo 'koneksi gagal';
    exit();
}

?>
