<?php

include 'koneksi.php';
$id = $_POST['id'];
$sql = 'SELECT * FROM tb_buku WHERE id=' . $id;
$array_data = [];
$query = mysqli_query($koneksi, $sql)->fetch_assoc();
$array_data = $query;

echo json_encode($query);

?>
