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
		<title>Naitsabes Forums - Promote User</title>
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
                      $promote_user_username = $_GET['username'];
                      $promote_user_query = $conn->query("SELECT * FROM accounts WHERE username = '" . $promote_user_username . "'");
                      if ($promote_user_query->num_rows == 1) {
                        while ($promote_user = $promote_user_query->fetch_assoc()) {
                          if ($_COOKIE['rank'] > $promote_user['rank']) {
                            if ($promote_user['rank'] < 4) {
                              $increased_rank = $promote_user['rank'] + 1;
                              if ($conn->query("UPDATE accounts SET rank = " . $increased_rank . " WHERE username = '" . $promote_user['username'] . "'") == true) { ?>
                                <h2>Promotion Successful</h2>
                                <p>
                                  The promotion was successful.  Your selected user now has an increased rank.
                                </p>
                              <?php } else { ?>
                                <h2>Action Failed</h2>
                                <p>
                                  Sorry, an unknown error occurred and the promotion did not take place.  We apologise for the inconvenience caused.
                                </p>
                              <?php }
                            } else { ?>
                              <h2>Action Not Permitted</h2>
                              <p>
                                Sorry, you cannot promote anyone who is already a Super Moderator or above.
                              </p>
                            <?php }
                          } else { ?>
                            <h2>Action Not Permitted</h2>
                            <p>
                              Sorry, you are not allowed to promote anyone who currently has the same rank or a higher rank than you.
                            </p>
                          <?php }
                        }
                      } else { ?>
                        <h2>User Not Found</h2>
                        <p>
                          Sorry, we couldn't seem to find the user you requested.  Are you sure that username exists?
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
                      Sorry, our system has detected invalid cookies in your browser which most likely indicates that you have not logged in properly.  Please log out, log in again using the login form and try again.
                    </p>
                    <p>
                      <a class="button big" href="logout.php">Log Out</a>
                    </p>
                  <?php }
                } else { ?>
                  <h2>Not Logged In</h2>
                  <p>
                    You have to be logged in to access this page.
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
