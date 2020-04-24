<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php'); ?>

  <div class="login_box">
    <div class="login_box_header">
      <h1 class="sign_in_header">Sign up</h1>
    </div>
    <?php if ($allowAccountCreation) { ?>
      <div class="form_container">
        <form class="" action="/functions/signup.func.php" method="post">
          <?php if ($_GET[error] === 'emptyfields'): ?>
            <p class="error">Please fill in all fields</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'invalidmailusername'): ?>
            <p class="error">Username and email are invalid</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'invalidemail'): ?>
            <p class="error">Email is invalid</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'invalidusername'): ?>
            <p class="error">Username is invalid</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'passwordcomparefail'): ?>
            <p class="error">Passwords do not match</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'sqlerror'): ?>
            <p class="error">An SQL error occured</p>
          <?php endif; ?>
          <?php if ($_GET[error] === 'usertaken'): ?>
            <p class="error">This username is already taken</p>
          <?php endif; ?>
          <input type="text" name="userName" placeholder="Name" value="<?php echo $_GET[u]; ?>" autocomplete="off">
          <input type="email" name="email" placeholder="Email Address" value="<?php echo $_GET[e]; ?>" autocomplete="off">
          <input type="password" name="password" placeholder="Password" autocomplete="off">
          <input type="password" name="password_repeat" placeholder="Repeat password" autocomplete="off">
          <input type="submit" name="create_acc_send" value="Sign me up">
        </form>
        <a class="form_footer" href="/pages/login.php">Already have an account?</a>
      </div>
    <?php } else { ?>
      <div class="form_container">
        <form class="" action="/functions/signup.func.php" method="post">
          <p class="error">Sign up is currently disabled</p>
          <input type="text" name="userName" placeholder="Name" disabled>
          <input type="email" name="email" placeholder="Email Address" disabled>
          <input type="password" name="password" placeholder="Password" disabled>
          <input type="password" name="password_repeat" placeholder="Repeat password" disabled>
          <input type="submit" name="create_acc_send" value="Sign me up" disabled>
        </form>
        <a class="form_footer" href="/pages/login.php">Already have an account?</a>
      </div>
    <?php } ?>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
