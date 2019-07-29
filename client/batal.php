<?php
include 'koneksi.php';

$sql = "DELETE FROM transaksi WHERE id_transaksi=".$_GET['id'];
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:index.php");
?>
