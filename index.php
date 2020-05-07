<?php

  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getposts.func.php');

?>
  <?php if (isset($_SESSION['userId'])): ?>
    <div class="controls">
      <a href="/pages/newpost.php" class="controls_button">New post</a>
      <a href="/pages/manage.php" class="controls_button"> Manage posts</a>
    </div>
  <?php endif; ?>

  <div class="content">

    <div class="container">
      <div class="container_box">
        <div class="paragraph boxed">
          <div class="header_title">
            <h3>Welcome to my blog!</h3>
          </div>
          <div class="article">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container reverse">
      <?php if ($resultCheck > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) {?>
        <div class="container_box">
          <div class="paragraph boxed post">
            <div class="header_title">
              <h3><?php echo $row['title']; ?></h3>
            </div>
            <?php if ($row['image'] != 'empty') : ?>
              <div class="article_image" style="background:url(<?php echo $row['image']; ?>);"></div>
            <?php endif; ?>
            <div class="article">
              <p><?php echo strip_tags(substr($row['content'], 0, 512)); if (strlen($row['content']) > 512) {echo "...";} ?></p>
              <?php if (strlen($row['content']) > 512): ?>
                <a href="/pages/viewpost.php?id=<?php echo $row['id']; ?>">Click to see full post</a>
              <?php endif; ?>
              <?php if (strlen($row['content']) > 512): ?>
                <a href="#"></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php } ?>
      <?php } ?>
    </div>


  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
