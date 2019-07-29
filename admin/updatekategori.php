
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlen";
$con = mysqli_connect($servername, $username, $password, $dbname);
$nama = $_POST['nama_kategori'];
$id   = $_POST['id_kategori']; 

$code = mysqli_query($con, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");

if ($code) {
	echo "Berhasil";
} else {
    echo "Error: " . $code . "<br>" . mysqli_error($con);
}

mysqli_close($con);
header("location:index.php");
