<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="icon" href="<?php echo base_url('vendor/img/robotics.ico') ?>">
	<link rel="stylesheet" href="<?php echo base_url('vendor/fontawesome/css/all.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title><?php echo $judul; ?></title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand" href="<?php echo base_url() ?>">Beranda</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Menu
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="<?php echo base_url('menu/tentang') ?>"><i class="fas fa-bullhorn"></i>&nbsp;&nbsp;Tentang Robotika</a>
						<a class="dropdown-item" href="<?php echo base_url('menu/listpendaftaran') ?>"><i class="fas fa-th-list"></i>&nbsp;&nbsp;List Anggota Baru</a>
						<a class="dropdown-item" href="<?php echo base_url('menu/login') ?>"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;Login Robotics Community</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<style>
		body {
			background-image: url('<?php echo base_url() ?>/vendor/img/bg.jpg');
			max-width: 1920;
			width: 100%;
			max-height: 1080;
			height: 100%;
			color: white;
		}

		.container {
			margin-top: 4%;
		}

		.info {
			margin-bottom: -1%;
		}

		.inner-content {
			text-align: center;
		}

		.dropdown-item:hover {
			background-color: #6495ED;
		}

		.kotak {
			border: 10px double #B0C4DE;
		}

		.title {
			margin-top: 20px;
			font-weight: bold;
		}

		.konten {
			margin: 0 auto;
			margin-bottom: -45px;
			width: 450px;
		}

		.pict1 {
			height: 420px;
			width: 100%;
			margin-top: -1%;
		}

		.navbar {
			font-weight: bold;
			background-color: #4682B4;
		}

		h3 {
			margin-top: 2%;
			color: white;
		}
	</style>