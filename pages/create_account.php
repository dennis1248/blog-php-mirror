<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/header.php'); ?>

  <div class="login_box">
    <div class="login_box_header">
      <h1 class="sign_in_header">Sign up</h1>
    </div>
    <div class="form_container">
      <form class="" action="/php/create_account.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <input type="button" name="create_acc_send" value="Sign me up">
      </form>
      <a class="form_footer" href="/pages/login.php">Already have an account?</a>
    </div>
  </div>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/partials/footer.php'); ?>
