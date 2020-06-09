<?php

  require 'database.inc.php';

  $id = $_GET['id'];

  if (!is_numeric($id)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Invalid post id&message-type=warning");
    exit();
  }

  $sql = 'SELECT title,content FROM projects WHERE id=?';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=SQL statement failed&message-type=warning");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
 ?>
