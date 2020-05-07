<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.conf');

  if (!$allowNewPosts) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?message=The site is configured to not allow new posts&message-type=warning");
    exit();
  }

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this feature&message-type=notice");
    exit();
  }

  if (isset($_POST['post_submit'])) {

    require 'database.inc.php';

    $title = $_POST['post_title'];
    $image = $_POST['post_image'];
    $content = $_POST['post_content'];

    if (str_replace(' ', '', $image) === '') {
      $image = 'empty';
    }

      $sql = "INSERT INTO posts (title, image, content) VALUES (?, ?, ?);";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?message=SQL statement failed, bye bye huge post you wrote :(&message-type=warning");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "sss", $title, $image, $content);
        mysqli_stmt_execute($stmt);
      }

      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?message=Post has been made successfully&message-type=confirm");
      exit();
    }

    else {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/newpost.php?message=header else error&message-type=warning");
    exit();
  }


 ?>
