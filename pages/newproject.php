<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");
    exit();
  }
?>

  <div class="content">
    <div class="form_container">
      <h1 class="new_post_header">New Project</h1>
      <form class="new_post_form" action="/functions/newproject.func.php" method="post">
        <input type="text" name="post_title" placeholder="Post title" maxlength="255">
        <textarea name="post_content" rows="16" placeholder="Write your post here"></textarea>
        <input type="submit" name="post_submit" value="Submit">
      </form>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
