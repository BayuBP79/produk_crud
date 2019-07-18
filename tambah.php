<?php
include 'koneksi.php';

$id_kategori = $_POST['id_kategori'];
$nama = $_POST['nama'];
$warna = $_POST['warna'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$id_merk = $_POST['id_merk'];
$keterangan = $_POST['keterangan'];


$sql = "INSERT INTO produk (nama, keterangan, warna, jumlah, harga, id_merk, id_kategori)
VALUES ('$nama', '$keterangan', '$warna', '$jumlah', '$harga', '$id_merk', '$id_kategori')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

header("location:index.php");
?>