<!DOCTYPE HTML>
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Generic - Solid State by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a class="navbar-brand" href="{{ url('/') }}">
                                Fondation Tamkine
                            </a>
                        </h1>
						<nav>
							<a href="{{ route('login') }}">Login</a>
						</nav>
					</header>
				<!-- Wrapper -->
					<section id="wrapper">
						<header>
							<div class="inner">
								<h2>TAMKINE's DASHBOARD </h2>
								<p> visualize the status of your platforms.</p>
							</div>
						</header>

						<!-- Content -->
							<div class="wrapper">
								<div class="inner">

									<h3 class="major">Administrators</h3>
									<p>
                                        <?php $admin=0; ?>
                                        @foreach ($rows as $row)
                                            <?php $admin++; ?>
                                        @endforeach
                                        <?php echo $admin; ?>
                                    </p>
                                    <h3 class="major">Platforms</h3>
									<p>
                                        <?php $platform=0; ?>
                                        @foreach ($datas as $data)
                                            <?php $platform++; ?>
                                        @endforeach
                                        <?php echo $platform; ?>
                                    </p>

								</div>
							</div>
					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<h2 class="major">Get in touch</h2>
							<ul class="contact">
								<li class="icon solid fa-phone">+212 537 708 391</li>
								<li class="icon solid fa-envelope">contact@tamkine.org</li>
								<li class="icon brands fa-twitter">twitter.com/fondationtamki1</li>
								<li class="icon brands fa-facebook-f">facebook.com/fondation.tamkine</li>
								<li class="icon brands fa-instagram">instagram.com/fondation_tamkine/</li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
