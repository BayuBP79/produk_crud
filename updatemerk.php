
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlen";
$con = mysqli_connect($servername, $username, $password, $dbname);
$nama = $_POST['nama_merk'];
$id   = $_POST['id_merk']; 

$code = mysqli_query($con, "UPDATE merk SET nama_merk='$nama' WHERE id_merk='$id'");

if ($code) {
	echo "Berhasil";
} else {
    echo "Error: " . $code . "<br>" . mysqli_error($con);
}

mysqli_close($con);
header("location:index.php");
