<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/database.inc.php');

  $owner = $_SESSION['userName'];

  $sql = 'SELECT * FROM posts WHERE owner=? ORDER BY id DESC;';
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=SQL statement failed&message-type=warning");
    exit();
  } else {
    mysqli_stmt_bind_param($stmt, "s", $owner);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $resultCheck = mysqli_num_rows($result);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
 ?>
