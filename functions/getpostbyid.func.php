<?php

  require 'database.inc.php';

  $id = $_GET['id'];

  if (!is_numeric($id)) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?message=Invalid post id&message-type=warning");
    exit();
  }

  $sql = "SELECT title,image,content FROM posts WHERE id={$id}";
  $result = mysqli_query($conn, $sql);

 ?>
