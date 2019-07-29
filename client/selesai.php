<?php

include "koneksi.php";

$sql = "UPDATE transaksi SET status='Selesai' WHERE id_transaksi=".$_GET['id'];
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:index.php");