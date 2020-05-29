<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/database.inc.php');

  $owner = $_SESSION['userName'];

  $sql = "SELECT * FROM posts WHERE owner='{$owner}';";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  mysqli_close($conn);
 ?>
