<?php
require('koneksi.php');

// sql to delete a record
$sql = "DELETE FROM user WHERE id=".$_GET['id'];

if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>