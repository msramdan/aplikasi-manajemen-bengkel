<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman Login Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="#">
	<meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="#">
	<link rel="icon" href="<?= base_url() ?>assets\libraries\assets\images\favicon.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\bower_components\bootstrap\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\themify-icons\themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\icon\icofont\css\icofont.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets\libraries\assets\css\style.css">
</head>

<body class="fix-menu">
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

	<section class="login-block">
		<!-- Container-fluid starts -->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- Authentication card start -->

					<form class="md-float-material form-material" action="<?= site_url('auth/process') ?>" method="POST">
						<div class="auth-box card">
							<div class="card-block">
								<div class="row m-b-20">
									<div class="col-md-12">
										<h3 class="text-center">Sign In</h3>
									</div>
								</div>
								<?php $this->view('messages') ?>
								<div class="form-group form-primary">
									<input type="text" name="username" id="username" class="form-control" required="" placeholder="Username">
									<span class="form-bar"></span>
								</div>
								<div class="form-group form-primary">
									<input type="password" name="password" id="password" class="form-control" required="" placeholder="Password">
									<span class="form-bar"></span>
								</div>
								<div class="row m-t-25 text-left">
									<div class="col-12">
										<div class="checkbox-fade fade-in-primary d-">
											<label>
												<input type="checkbox" value="1" id="rememberMe" onclick="myFunction()" />
												<span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
												<span class="text-inverse">Show Password</span>
											</label>
										</div>
									</div>
								</div>
								<div class="row m-t-30">
									<div class="col-md-12">
										<button type="submit" name="login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
									</div>
								</div>
								<p class="text-inverse text-left">Don't have an account?<a href="<?= base_url() ?>auth/registrasi"> <b class="f-w-600">Register here </b></a></p>
								<hr>
							</div>
						</div>
					</form>
					<!-- end of form -->
				</div>
				<!-- end of col-sm-12 -->
			</div>
			<!-- end of row -->
		</div>
		<!-- end of container-fluid -->
	</section>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery\js\jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\popper.js\js\popper.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\bootstrap\js\bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\modernizr\js\modernizr.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\modernizr\js\css-scrollbars.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next\js\i18next.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next-xhr-backend\js\i18nextXHRBackend.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\i18next-browser-languagedetector\js\i18nextBrowserLanguageDetector.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\bower_components\jquery-i18next\js\jquery-i18next.min.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>assets\libraries\assets\js\common-pages.js"></script>
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script>
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>

</html>
