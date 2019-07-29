<?php

session_start();

include 'koneksi.php';

$username = $_POST['uname'];
$password = $_POST['pass'];

$data = mysqli_query($conn,"select * from user where uname='$username' and pass='$password'");

while ($value = mysqli_fetch_assoc($data)) {
	if ($value['level'] == 1) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'on';
		$_SESSION['level'] = 'admin';
		header("location:admin");
	} elseif ($value['level'] == 2) {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'on';
		$_SESSION['level'] = 'client';
		header("location:client");
	} else {
		header("location:index.php");
	}
}


