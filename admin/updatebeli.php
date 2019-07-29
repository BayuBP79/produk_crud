
<?php

$nama = $_POST['user'];
$produk   = $_POST['produk']; 
$jumlah   = $_POST['jumlah']; 
$Status   = $_POST['status']; 
$id   = $_POST['id']; 

$code = mysqli_query(mysqli_connect('localhost', 'root', '', 'onlen'), "UPDATE transaksi SET id_produk='$produk', id_pelanggan='$nama', jumlah='$jumlah', Status='$Status' WHERE id_transaksi='$id'");

if ($code) {
	echo "Berhasil";
} else {
    echo "Error: " . $code . "<br>" . mysqli_error(mysqli_connect('localhost', 'root', '', 'onlen'));
}

mysqli_close(mysqli_connect('localhost', 'root', '', 'onlen'));
header("location:index.php");
