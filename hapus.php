<?php

include 'koneksi.php';

$id = $_POST['id'];
$pesan = '';

$sql = 'DELETE FROM tb_buku WHERE id=' . $id;
$query = mysqli_query($koneksi, $sql);
if ($query) {
    $pesan = 'Data Berhasil Hapus!!';
} else {
    $pesan = 'Data Gagagl Hapus!!';
}

echo json_encode($pesan);

?>
