<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/database.inc.php');

  $owner = $_SESSION['userName'];

  $sql = "SELECT * FROM projects WHERE owner='{$owner}' ORDER BY id DESC;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  mysqli_close($conn);
 ?>
