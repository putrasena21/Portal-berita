<?php
	$host 		= 'localhost';
	$user 		= 'root';
	$password	= '';
	$namadb 	= 'ebisnis';
	
	$koneksi = new mysqli($host,$user,$password,$namadb);
	
	if($koneksi->connect_error){
		die('Koneksi Gagal'.$koneksi->connect_error);
	}
?>