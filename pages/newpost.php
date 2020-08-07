<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

  $world = $_GET['world'];

  // Check if world is defined
  if (!isset($world) || str_replace(' ', '', $world) === '') {
    header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper update target defined&message-type=warning");
    exit();
  }

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");
    exit();
  }
?>

  <div class="content">
    <div class="form_container">
      <h1 class="new_post_header">New Post</h1>
      <?php if ($world === 'posts'): ?>
        <form class="new_post_form" action="/functions/newpost.func.php?world=posts" method="post">
      <?php endif; ?>
      <?php if ($world === 'projects'): ?>
        <form class="new_post_form" action="/functions/newpost.func.php?world=projects" method="post">
      <?php endif; ?>
        <input type="text" name="post_title" placeholder="Post title" maxlength="255">
        <textarea name="post_content" rows="16" placeholder="Write your post here"></textarea>
        <input type="submit" name="post_submit" value="Submit">
      </form>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
