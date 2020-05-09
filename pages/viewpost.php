<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getpostbyid.func.php');
?>

<div class="content">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="container">
      <div class="post_header">
        <?php if ($row['image'] != 'empty'): ?>
          <div class="post_image">
            <img src="<?php echo $row['image']; ?>" alt="Post image">
          </div>
        <?php endif; ?>
        <h1><?php echo $row['title']; ?></h1>
      </div>
      <div class="post_content">
        <p><?php echo $row['content']; ?></p>
      </div>
    </div>
  <?php } ?>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
