<?php
  include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/getprojectbyid.func.php');
?>

<div class="content">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="container">
      <div class="post_header">
        <h1><?php echo $row['title']; ?></h1>
      </div>
      <div class="post_content">
        <?php echo $row['content']; ?>
      </div>
    </div>
  <?php } ?>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
