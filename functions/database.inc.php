<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

  $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }

 ?>
