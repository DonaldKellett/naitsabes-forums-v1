<?php
require 'connect.php';
require 'vars.php';
?>
<header id="header">
  <h1><a href="index.php">Naitsabes Forums</a></h1>
  <nav class="links">
    <ul>
      <?php if (isset($_COOKIE['logged_in']) && $_COOKIE['logged_in'] == true) { ?>
        <li><a href="logout.php">Logout</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <?php if ($_COOKIE['rank'] >= 3) { ?>
          <li><a href="mod-admin.php">Mod/Admin Panel</a></li>
        <?php } ?>
      <?php } else { ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
      <?php } ?>
    </ul>
  </nav>
  <nav class="main">
    <ul>
      <li class="search">
        <a class="fa-search" href="#search">Search</a>
        <form id="search" method="get" action="search.php">
          <input type="text" name="q" placeholder="Search This Forum" />
        </form>
      </li>
    </ul>
  </nav>
</header>
