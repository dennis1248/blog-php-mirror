<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php'); ?>

  <div class="login_box">
    <div class="login_box_header">
      <h1 class="sign_in_header">Sign in</h1>
    </div>
    <div class="form_container">
      <form class="" action="/php/log_me_in.php" method="post">
        <input type="text" name="email" placeholder="Email Address">
        <input type="text" name="password" placeholder="Password">
        <input type="button" name="login_send" value="Sign me in">
      </form>
      <a class="form_footer" href="/pages/create_account.php">No account yet?</a>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
