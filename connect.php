<?php
/*
  connect.php
  (c) Donald Leung.  All rights reserved.
*/

# Establish connection with database

$conn = new mysqli("localhost", "root", "root", "forums");

if ($conn->connect_error) {
  echo "There was an error connecting to the database.  " . $conn->connect_error; // Return an error message if there was a problem connecting to the database
}

?>
