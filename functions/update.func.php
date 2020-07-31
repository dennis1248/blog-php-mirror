<?php
  session_start();

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");
    exit();
  }

  require 'database.inc.php';

  $title = $_POST['update_title'];
  $content = $_POST['update_content'];
  $id = $_GET['id'];
  $section = $_GET['section'];

  // Check section and set target correctly
  if ($section === 'posts') {
    $target = 'posts';
  } elseif ($section === 'projects') {
    $target = 'projects';
  } else {
    header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper update target defined&message-type=warning");
    exit();
  }

  // Check if owner
  if ($target === 'posts') {
    $sql = 'SELECT owner FROM posts WHERE id=?;';
  } elseif ($target === 'projects') {
    $sql = 'SELECT owner FROM projects WHERE id=?;';
  }
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=SQL statement failedddd&message-type=warning");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
  }

  mysqli_stmt_close($stmt);

  if ($row['owner'] !== $_SESSION['userName']) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=You do not own this content and are not allowed to edit it&message-type=warning");
    exit();
  }

  // Check if id is valid
  if (!is_numeric($id)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Invalid post datatype&message-type=warning");
    exit();
  }

  if ($target === 'posts') {
    $sql = 'UPDATE posts SET title=?,content=? WHERE id=?;';
  } elseif ($target === 'projects') {
    $sql = 'UPDATE projects SET title=?,content=? WHERE id=?;';
  }

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=SQL statement failedddd&message-type=warning");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $id);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);

  header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Post has been successfully edited&message-type=confirm");

?>
