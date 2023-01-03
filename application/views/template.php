<!DOCTYPE html>
<html lang="en">

<head>
	<title>Sistem Pakar </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="#">
	<meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="#">
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url() ?>assets\libraries\assets\images\favicon.ico" type="image/x-icon">
	<!-- Google font-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
	<!-- Required Fremwork -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\bower_components\bootstrap\css\bootstrap.min.css">
	<!-- themify-icons line icon -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\themify-icons\themify-icons.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\icofont\css\icofont.css">
	<!-- feather Awesome -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\feather\css\feather.css">
	<!-- Data Table Css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\pages\data-table\css\buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\bower_components\datatables.net-responsive-bs4\css\responsive.bootstrap4.min.css">
	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\css\style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\css\jquery.mCustomScrollbar.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\font-awesome\css\font-awesome.min.css">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\icofont\css\icofont.css">

</head>

<body style="font-size: 12px;">
	<!-- Pre-loader start -->
	<div class="theme-loader">
		<div class="ball-scale">
			<div class='contain'>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pre-loader end -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">

			<nav class="navbar header-navbar pcoded-header">
				<div class="navbar-wrapper">

					<div class="navbar-logo">
						<a class="mobile-menu" id="mobile-collapse" href="#!">
							<i class="feather icon-menu"></i>
						</a>
						<a href="index-1.htm">
							Sistem Pakar CBR
						</a>
						<a class="mobile-options">
							<i class="feather icon-more-horizontal"></i>
						</a>
					</div>
					<div class="navbar-container container-fluid">
						<ul class="nav-right">
							<li class="user-profile header-notification">
								<div class="dropdown-primary dropdown">
									<div class="dropdown-toggle" data-toggle="dropdown">
										<img src="<?= base_url() ?>assets/img/<?= $this->fungsi->user_login()->gambar; ?>" class="img-radius" alt="User-Profile-Image">
										<span><?= ucfirst($this->fungsi->user_login()->nama) ?></span>
										<i class="feather icon-chevron-down"></i>
									</div>
									<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
										<li>
											<a href="<?= base_url() ?>auth/profile">
												<i class="feather icon-settings"></i> Setting Profile
											</a>
										</li>
										<li>
											<a href="<?= base_url() ?>auth/logout">
												<i class="feather icon-log-out"></i> Logout
											</a>
										</li>
									</ul>

								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<nav class="pcoded-navbar">
						<div class="pcoded-inner-navbar main-menu">
							<div class="pcoded-navigatio-lavel">MAIN MENU</div>
							<ul class="pcoded-item pcoded-left-item">
								<?php if ($this->fungsi->user_login()->level_id == 1) { ?>
									<li class="">
										<a href="<?= base_url() ?>dashboard">
											<span class="pcoded-micon"><i class="feather icon-home"></i></span>
											<span class="pcoded-mtext">Dashboard</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>konsultasi">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Konsultasi</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>pengetahuan">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Basis Kasus / Pengetahuan</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>penyakit">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Data Penyakit</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>gejala">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Data Gejala</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>diagnosa">
											<span class="pcoded-micon"><i class="feather icon-book"></i></span>
											<span class="pcoded-mtext">Laporan Diagnosa</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>user">
											<span class="pcoded-micon"><i class="feather icon-users"></i></span>
											<span class="pcoded-mtext">User</span>
										</a>
									</li>
								<?php } else { ?>
									<li class="">
										<a href="<?= base_url() ?>penyakit">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Konsultasi</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>penyakit">
											<span class="pcoded-micon"><i class="feather icon-list"></i></span>
											<span class="pcoded-mtext">Data Penyakit</span>
										</a>
									</li>
									<li class="">
										<a href="<?= base_url() ?>diagnosa">
											<span class="pcoded-micon"><i class="feather icon-book"></i></span>
											<span class="pcoded-mtext">Laporan Diagnosa</span>
										</a>
									</li>
								<?php } ?>

							</ul>
						</div>
					</nav>
					<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
					<?php if ($this->session->flashdata('message')) : ?>
					<?php endif; ?>

					<div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
					<?php if ($this->session->flashdata('error')) : ?>
					<?php endif; ?>

					<?php echo $contents ?>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery\js\jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\popper.js\js\popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\bootstrap\js\bootstrap.min.js"></script>
	<!-- jquery slimscroll js -->
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\modernizr\js\modernizr.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\modernizr\js\css-scrollbars.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\pages\data-table\js\jszip.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\pages\data-table\js\pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\pages\data-table\js\vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next\js\i18next.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\pages\data-table\js\data-table-custom.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\js\pcoded.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\js\vartical-layout.min.js"></script>
	<script src="<?= base_url() ?>assets\libraries\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\assets\js\script.js"></script>
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="<?= base_url(); ?>assets/js/dataflash.js"></script>

</body>

</html>
