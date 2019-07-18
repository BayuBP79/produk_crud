<?php
include 'koneksi.php';

$sql = "DELETE FROM merk WHERE id_merk=".$_GET['id'];
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:index.php");
?>
