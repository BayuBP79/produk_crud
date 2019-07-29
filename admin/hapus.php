<?php
include 'koneksi.php';

$sql = "DELETE FROM produk WHERE id_produk=".$_GET['id'];
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:index.php");
?>
