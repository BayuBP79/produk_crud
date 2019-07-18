<?php
include 'koneksi.php';

$sql = "DELETE FROM kategori WHERE id_kategori=".$_GET['id'];
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:index.php");
?>
