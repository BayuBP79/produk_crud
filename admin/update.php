

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlen";
$con = mysqli_connect($servername, $username, $password, $dbname);

$id 	= $_POST['id_produk'];
$kat 	= $_POST['id_kategori'];
$nama 	= $_POST['nama'];
$warna 	= $_POST['warna'];
$jumlah = $_POST['jumlah'];
$harga 	= $_POST['harga'];
$merk 	= $_POST['id_merk'];
$ket 	= $_POST['keterangan'];

$code = mysqli_query($con, "UPDATE produk SET nama='$nama', keterangan='$ket', warna='$warna', jumlah='$jumlah', harga='$harga', id_merk='$merk', id_kategori='$kat' WHERE id_produk='$id'");
if ($code) {
	echo "Berhasil";
} else {
    echo "Error: " . $code . "<br>" . mysqli_error($con);
}

mysqli_close($con);
header("location:index.php");
?>