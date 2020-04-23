<?php

  $dbServerName = "localhost";
  $dbUserName = "testUser";
  $dbPassword = "1234567890";
  $dbName= "blogphp";


  $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

  if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
  }

 ?>
