<?php

// ini untuk nambah data ke database
require('koneksi.php');


    
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$level = $_POST['level'];

$sql = "INSERT INTO user (namau, alamat, jk, uname, pass, level)
VALUES ('$nama', '$alamat', '$jk', '$uname', '$pass' , '$level')";

if (mysqli_query($conn, $sql)) {
	header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>