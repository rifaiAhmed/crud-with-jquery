<?php

include 'koneksi.php';

$sql = 'SELECT * FROM tb_buku';
$query = mysqli_query($koneksi, $sql);

// ambil banyak
$array_data = [];
while ($data = mysqli_fetch_assoc($query)) {
    $array_data[] = $data;
}
echo json_encode($array_data);

?>
