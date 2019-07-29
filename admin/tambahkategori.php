<?php
include 'koneksi.php';

$kat = $_POST['nama_kategori'];

$sql = "INSERT INTO kategori (id_kategori, nama_kategori)
VALUES ('','$kat')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

header("location:index.php")
?>