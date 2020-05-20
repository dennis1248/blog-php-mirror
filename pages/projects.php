<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getprojects.func.php');
?>

  <div class="content">
    <div class="container">
      <div class="git_info">
        <p> <?php echo $projectsMessage; ?> </p>
      </div>
      <?php if (isset($_SESSION['userId'])): ?>
        <div class="controls">
          <a href="/pages/newproject.php" class="controls_button">New post</a>
          <a href="/pages/manageprojects.php" class="controls_button">Manage projects</a>
        </div>
      <?php endif; ?>
        <div class="post_container <?php if (isset($_SESSION['userId'])): ?>controls_active<?php endif; ?> <?php if (!isset($_SESSION['userId'])): ?>controls_inactive<?php endif; ?>">
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
                  <?php if (strlen($row['content']) > 512): ?>
                    <a href="/pages/viewproject.php?id=<?php echo $row['id']; ?>">Click to see full post</a>
                  <?php endif; ?>
                </div>
              </div>
            <?php } ?>
          <?php } else { ?>
            <div>
              <div class="no_post_info">
                <p>Nobody here but us chickens! (That means there are no projects yet)</p>
              </div>
            </div>
          <?php } ?>
        </div>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
