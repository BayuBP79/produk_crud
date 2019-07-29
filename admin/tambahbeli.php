<?php
include 'koneksi.php';

$user   = $_POST['user'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];
$tgl 	= date('y-m-d');

$kode   = mysqli_query($conn, "SELECT harga FROM produk WHERE id_produk='$produk'");
while ($value = mysqli_fetch_assoc($kode)) {
$harga  = $jumlah * $value['harga'];

}


$sql = "INSERT INTO transaksi (id_produk, id_pelanggan, tgl_transaksi, jumlah, harga)
VALUES ('$produk', '$user', '$tgl', '$jumlah', '$harga')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
header("location:index.php");
?>