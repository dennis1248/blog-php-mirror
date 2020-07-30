<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getpostsbyowner.func.php');

  // check if logged in
  if (!isset($_SESSION['userId'])) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/pages/login.php?message=You are not logged in, login to access this page&message-type=notice");
    exit();
  }
?>

  <div class="content">
    <div class="list">
      <?php if ($resultCheck > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) {?>
          <div class="post">
            <div class="post_header">
              <h1 class="post_title"><?php echo $row['title']; ?></h1>
              <p class="post_date">Posted by <b><?php echo $row['owner']; ?></b> on <?php echo $row['date']; ?></p>
            </div>
            <div class="post_controls">
              <form action="/functions/removepost.func.php?id=<?php echo $row['id']; ?>" method="post">
                <input type="submit" name="post_removed" value="Remove" onclick="return confirm('Do you really want to remove this post?');">
              </form>
              <form action="/pages/edit.php?id=<?php echo $row['id']; ?>&section=posts" method="post">
                <input type="submit" name="post_removed" value="Edit">
              </form>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div>
          <div class="no_post_info">
            <p>Nobody here but us chickens! (That means you have not made any posts yet)</p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
