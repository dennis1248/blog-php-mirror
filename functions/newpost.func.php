<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.php');

  $world = $_GET['world'];

  // Check if world is defined
  if (!isset($world) || str_replace(' ', '', $world) === '') {
    header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper update target defined&message-type=warning");
    exit();
  }

  // Start session
  session_start();

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");

  }

  if (isset($_POST['post_submit'])) {

    require 'database.inc.php';

    $title = $_POST['post_title'];
    $content = $_POST['post_content'];
    $date = date("d-m-Y");
    $owner = $_SESSION['userName'];

    if ($world === 'posts') {
      $sql = 'INSERT INTO posts (title, content, date, owner) VALUES (?, ?, ?, ?);';
    } elseif ($world === 'projects') {
      $sql = 'INSERT INTO projects (title, content, date, owner) VALUES (?, ?, ?, ?);';
    } else {
      header("Location: http://".$_SERVER['HTTP_HOST']."/?message=No proper world defined&message-type=warning");
      exit();
    }


    $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: http://".$_SERVER['HTTP_HOST']."/?message=SQL statement failed, bye bye huge post you wrote :(&message-type=warning");
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "ssss", $title, $content, $date, $owner);
        mysqli_stmt_execute($stmt);
      }

      mysqli_stmt_close($stmt);
      mysqli_close($conn);

      if ($world === 'posts') {
        header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Post has been made successfully&message-type=confirm");
        exit();
      } elseif ($world === 'projects') {
        header("Location: http://".$_SERVER['HTTP_HOST']."/pages/projects.php?message=Post has been made successfully&message-type=confirm");
        exit();
      }
    }

    else {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/newpost.php?message=header else error&message-type=warning");
    exit();
  }


 ?>
