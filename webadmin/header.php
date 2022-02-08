<?php
include ("../config/koneksi.php");
include ("../config/config.php");
session_start();
	if (!isset($_SESSION['admin'])) {
		header('location:loginAdmin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Administrator | BERITA 1NFO</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/admin.css">
	<link rel="stylesheet" type="text/css" href="../assets/summernote-master/summernote.min.css">

	<script src="../assets/jquery/jquery-3.6.0.min.js"></script>
	<script src="../assets/summernote-master/summernote.min.js"></script>
	<script async defer src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Administrator</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo $base_url; ?>" target="_blank">
							<i class="fa fa-globe"></i> Kunjungi Situs
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-user"></i> <?php echo $_SESSION['nm_admin']; ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="profil.php"><i class="fa fa-user"></i> Profil</a></li>
							<!-- <li><a href="admin-data.php"><i class="fa fa-user-plus"></i> Tambah Admin</a></li> -->
							<li><a href="#" data-toggle="modal" data-target="#modal_logout"><i
										class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>