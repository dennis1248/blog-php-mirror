<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/database.inc.php');

  $sql = "SELECT * FROM  projects ORDER BY id DESC;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  mysqli_close($conn);
 ?>
