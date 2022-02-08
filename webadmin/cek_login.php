<?php
include (("../config/koneksi.php"));

$username 	= $_POST['username'];
$password 	= md5($_POST['password']);

$perintah = "SELECT * FROM admin WHERE username='$username' AND password = '$password'" ;

$login = $koneksi->query($perintah) or die ($koneksi->error);

if ($login->num_rows > 0){
    $data = $login->fetch_array();
    session_start();

    $_SESSION['admin'] = 1;
	$_SESSION['id_admin'] = $data['id_admin'];
	$_SESSION['nm_admin'] = $data['nama_admin'];
	$_SESSION['level'] = $data['level'];
	header('location:index.php');
}
else {
	header('location:loginAdmin.php?failed=1');
}
?>