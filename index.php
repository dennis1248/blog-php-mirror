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
            <h3><?php echo $welcomeTitle; ?></h3>
          </div>
          <div class="article">
            <?php echo $welcomeMessage; ?>
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
