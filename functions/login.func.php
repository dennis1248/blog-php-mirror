<?php

if (isset($_POST['login_send'])) {

  require 'database.inc.php';

  $mailuserName = $_POST['mailuserName'];
  $password = $_POST['password'];

  if (empty($mailuserName) || empty($password)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?error=emptyfields");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE userName=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?error=sqlerror");
      exit();
    } else {

      mysqli_stmt_bind_param($stmt, "ss", $mailuserName, $mailuserName);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $passwordCheck = password_verify($password, $row['pwd']);
        if ($passwordCheck === false) {
          header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?error=loginfail");
          exit();
        } else if ($passwordCheck === true) {
          session_start();
          $_SESSION['userId'] = $row['id'];
          $_SESSION['userName'] = $row['userName'];

          header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?message=You have successfully been logged in&message-type=confirm");
          exit();

        } else {
          header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?error=loginerror");
          exit();
        }
      } else {
        header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?error=loginfail");
        exit();
      }


    }
  }


} else {
  header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?error=forbidden");
  exit();
}

 ?>
