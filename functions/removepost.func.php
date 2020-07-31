<?php
  session_start();
  require 'database.inc.php';

  $id = $_GET['id'];

  // Check if id is valid
  if (!is_numeric($id)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Invalid post datatype&message-type=warning");
    exit();
  }

  // Check if owner
  $sql = 'SELECT * FROM posts WHERE id=?;';
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
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this feature&message-type=notice");
    exit();
  }
  
  // Remove the post
  $sql = 'DELETE FROM posts WHERE id=?;';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/manageposts.php?message=SQL statement failed&message-type=warning");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  header("Location: http://".$_SERVER['HTTP_HOST']."/pages/manageposts.php?message=Post has been removed&message-type=confirm");
  exit();
 ?>
