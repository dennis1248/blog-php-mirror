<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php'); ?>

  <div class="login_box">
    <div class="login_box_header">
      <h1 class="sign_in_header">Sign in</h1>
    </div>
    <div class="form_container">
      <form class="" action="/functions/login.func.php" method="post">
        <?php if ($_GET[error] === 'invalidlogin'): ?>
          <p class="error">Username or password is incorrect</p>
        <?php endif; ?>
        <input type="text" name="mailuserName" placeholder="Email address or username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="login_send" value="Sign me in">
      </form>
      <a class="form_footer" href="/pages/signup.php">No account yet?</a>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
