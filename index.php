<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getposts.func.php');

?>
  <div class="content">
    <?php if (isset($_SESSION['userId'])): ?>
      <div class="controls">
        <a href="/pages/newpost.php" class="controls_button">New post</a>
        <a href="/pages/manage.php" class="controls_button"> Manage posts</a>
      </div>
    <?php endif; ?>
      <div class="post_container <?php if (isset($_SESSION['userId'])): ?>controls_active<?php endif; ?>">
        <?php if ($resultCheck > 0) { ?>
          <?php while ($row = mysqli_fetch_assoc($result)) {?>
            <div class="post">
              <div class="post_header">
                <h1 class="post_title"><?php echo $row['title']; ?></h1>
                <p class="post_date">Posted by <b><?php echo $row['owner']; ?></b> on <?php echo $row['date']; ?></p>
              </div>
              <div class="post_content">
                <?php echo strip_tags(substr($row['content'], 0, 512)); if (strlen($row['content']) > 512) {echo "...";} ?>
              </div>
              <div class="post_footer">
                <?php if (strlen($row['content']) > 512 OR $row['image'] != 'empty'): ?>
                  <a href="/pages/viewpost.php?id=<?php echo $row['id']; ?>">Click to see full post</a>
                <?php endif; ?>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <div>
            <div class="no_post_info">
              <p>Nobody here but us chickens! (That means there are no posts yet)</p>
            </div>
          </div>
        <?php } ?>
      </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
