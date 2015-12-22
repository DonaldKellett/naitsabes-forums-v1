<?php
require 'connect.php';
require 'vars.php';
?>
<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Naitsabes Forums - Demote User</title>
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
                <?php
                if ($_COOKIE['logged_in'] == true) {
                  $validate_cookies = $conn->query("SELECT * FROM accounts WHERE name = '" . $_COOKIE['name'] . "' AND username = '" . $_COOKIE['username'] . "' AND password = '" . $_COOKIE['password'] . "' AND email = '" . $_COOKIE['email'] . "' AND rank = " . $_COOKIE['rank']);
                  if ($validate_cookies->num_rows == 1) {
                    if ($_COOKIE['rank'] >= 3) {
                      $demote_user_username = $_GET['username'];
                      $demote_user_query = $conn->query("SELECT * FROM accounts WHERE username = '" . $demote_user_username . "'");
                      if ($demote_user_query->num_rows == 1) {
                        while ($demote_user = $demote_user_query->fetch_assoc()) {
                          if ($_COOKIE['rank'] > $demote_user['rank']) {
                            if ($demote_user['rank'] > 1) {
                              $decreased_rank = $demote_user['rank'] - 1;
                              if ($conn->query("UPDATE accounts SET rank = " . $decreased_rank . " WHERE username = '" . $demote_user['username'] . "'") == true) { ?>
                                <h2>Demotion Successful</h2>
                                <p>
                                  The action was successful and the user now has a lower rank.
                                </p>
                              <?php } else { ?>
                                <h2>Demotion Failed</h2>
                                <p>
                                  Sorry, the demotion failed for some reason.  We apologise for any inconvenience caused.
                                </p>
                              <?php }
                            } else { ?>
                              <h2>User Already Banned</h2>
                              <p>
                                Sorry, the user is already banned.  There is no more room for demotion.
                              </p>
                            <?php }
                          } else { ?>
                            <h2>Action Not Permitted</h2>
                            <p>
                              Sorry, you cannot demote a user that has the same rank or has a higher rank than you.
                            </p>
                          <?php }
                        }
                      } else { ?>
                        <h2>User Not Found</h2>
                        <p>
                          Sorry, we couldn't seem to match the requested username with an existing user.  Are you sure the user exists?
                        </p>
                      <?php }
                    } else { ?>
                      <h2>Access Denied</h2>
                      <p>
                        Sorry, your rank is not high enough to access this feature.
                      </p>
                    <?php }
                  } else { ?>
                    <h2>Invalid Cookies Detected</h2>
                    <p>
                      Sorry, our system has detected invalid cookies in your browser.  The most likely reason is because you have not logged in properly.  Please log out of your account, log in again and try again.
                    </p>
                  <?php }
                } else { ?>
                  <h2>Login Required</h2>
                  <p>
                    You must log in to use this service.
                  </p>
                  <p>
                    <a href="login.php" class="button big">Log In</a>
                  </p>
                <?php }
                ?>
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
