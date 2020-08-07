<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");
    exit();
  }

  $world = $_GET['world'];

  // Check if valid world is defined
  if (!isset($world) || str_replace(' ', '', $world) === '') {
    header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper world defined&message-type=warning");
    exit();
  }

  // Include appropriate get posts file
  if ($world === 'posts') {
    include ($_SERVER['DOCUMENT_ROOT'].'/functions/getpostbyid.func.php');
  } elseif ($world === 'projects') {
    include ($_SERVER['DOCUMENT_ROOT'].'/functions/getprojectbyid.func.php');
  } else {
    header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper world defined&message-type=warning");
    exit();
  }
?>

  <div class="content">
    <div class="form_container">
      <h1 class="new_post_header">Edit</h1>
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <?php if ($world === 'posts') { ?>
          <form class="new_post_form" action="/functions/update.func.php?id=<?php echo $row['id']; ?>&world=posts" method="post">
        <?php } elseif ($world === 'projects') { ?>
          <form class="new_post_form" action="/functions/update.func.php?id=<?php echo $row['id']; ?>&world=projects" method="post">
        <?php } else {
          header("Location: http://".$_SERVER['HTTP_HOST']."?message=No proper update target defined&message-type=warning");
          exit();
          } ?>
          <input type="text" name="update_title" placeholder="Post title" maxlength="255" value="<?php echo $row['title']; ?>">
          <textarea name="update_content" rows="16" placeholder="Write your post here"><?php echo $row['content']; ?></textarea>
          <input type="submit" name="post_submit" value="Submit">
        </form>
      <?php } ?>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
