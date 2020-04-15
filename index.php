<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php'); ?>

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
      <?php for ($i = 1; $i <= 3; $i = $i + 2) { ?>
      <div class="container_box">
        <div class="paragraph boxed post">
          <div class="header_title">
            <h3>This is a post</h3>
          </div>
          <div class="article">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="container">
      <?php for ($i = 0; $i <= 2; $i = $i + 2) { ?>
      <div class="container_box">
        <div class="paragraph boxed post">
          <div class="header_title">
            <h3>This is a post</h3>
          </div>
          <div class="article_image" style="background:url(/images/cat.jpg);">

          </div>
          <div class="article">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
