<?php
include 'koneksi.php';

$merk 	= $_POST['nama_merk'];

$sql	= "INSERT INTO merk (id_merk, nama_merk) VALUES ('', '$merk')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

header("location:index.php")
?>