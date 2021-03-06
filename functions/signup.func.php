<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.php');

  if (!$allowAccountCreation) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php");
    exit();
  }

  if (isset($_POST['create_acc_send'])) {

    require 'database.inc.php';

    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password_repeat'];

    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=emptyfields&u=".$userName."&e=".$email);
      exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[\w]*$/", $userName)) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=invalidmailusername");
      exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=invalidemail&u=".$userName);
      exit();
    } else if (!preg_match("/^[\w]*$/", $userName)) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=invalidusername&e=".$email);
      exit();
    } else if ($password !== $passwordRepeat) {
      header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=passwordcomparefail&u=".$userName."&e=".$email);
      exit();
    } else {

      $sql = "SELECT userName FROM users WHERE userName=?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=slqerror");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=usertaken&e=".$email);
          exit();
        } else {
          $sql = "INSERT INTO users (userName, email, pwd) VALUES (?, ?, ?)";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php?error=sqlerror");
            exit();
          } else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=Your account was created successfully, you can now sign in&message-type=confirm");
            exit();
          }
        }
      }

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  }

else {
  header("Location: http://".$_SERVER['HTTP_HOST']."/pages/signup.php");
  exit();
}


 ?>
