<?php
require 'connect.php';
require 'vars.php';
setcookie("name", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("password", "", time() - 3600, "/");
setcookie("email", "", time() - 3600, "/");
setcookie("rank", "", time() - 3600, "/");
setcookie("logged_in", false, time() - 3600, "/");
?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Naitsabes Forums - Log Out</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<?php require 'header.php'; ?>

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
                <h2>Logged Out</h2>
                <p>
                  You are now logged out of your account.
                </p>
                <p>
                  <a href="index.php" class="button big">Return to Homepage</a>
                </p>
							</article>

					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
