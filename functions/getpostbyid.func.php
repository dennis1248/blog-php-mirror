<?php

  require 'database.inc.php';

  $id = $_GET['id'];

  // Check if valid datatype
  if (!is_numeric($id)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/?message=Invalid post id&message-type=warning");
    exit();
  }

  $sql = "SELECT title,content FROM posts WHERE id={$id}";
  $result = mysqli_query($conn, $sql);

 ?>
