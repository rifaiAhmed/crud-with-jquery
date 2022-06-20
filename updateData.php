<?php

include 'koneksi.php';

$id = $_POST['id'];
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
        "UPDATE tb_buku SET judul_buku='" .
        $judulBuku .
        "', pengarang='" .
        $pengarang .
        "', tahun_terbit='" .
        $tahun_terbit .
        "' WHERE id='" .
        $id .
        "'";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        $pesan = 'Data Berhasil di Update';
    } else {
        $pesan = 'Data Gagagl di Update';
    }
}

echo json_encode($pesan);

?>
