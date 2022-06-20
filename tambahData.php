<?php

include 'koneksi.php';

$judulBuku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$pesan = '';

if ($judulBuku == '') {
    $pesan = 'Judul buku harus di isi';
} elseif ($pengarang == '') {
    $pesan = 'Pengarang harus di isi';
} elseif ($tahun_terbit == '') {
    $pesan = 'Tahun terbit harus di isi';
} else {
    $sql =
        "INSERT INTO tb_buku (judul_buku, pengarang, tahun_terbit) VALUE ('" .
        $judulBuku .
        "', '" .
        $pengarang .
        "', '" .
        $tahun_terbit .
        "')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        $pesan = 'Data Berhasil di Tambahkan';
    } else {
        $pesan = 'Data Gagagl di Tambahkan';
    }
}

echo json_encode($pesan);

?>
