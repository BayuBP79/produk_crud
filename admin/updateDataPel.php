 <?php
require('koneksi.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$level = $_POST['level'];
$sql = "UPDATE user SET id ='$id', namau ='$nama', alamat = '$alamat', jk = '$jk', uname ='$uname', pass = '$pass', level = '$level' WHERE id ='$id'";


if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 