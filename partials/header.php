<?php

  // Website settings
  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.conf');

  // Session
  session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/header.css">
    <?php $pageName = basename($_SERVER['PHP_SELF']); ?>

    <?php if ($pageName === 'index.php') : ?>
      <link rel="stylesheet" href="/css/index.css">
    <?php endif; ?>

    <?php if ($pageName === 'login.php' OR $pageName === 'signup.php') : ?>
      <link rel="stylesheet" href="/css/login.css">
    <?php endif; ?>

    <?php if ($pageName === 'projects.php') : ?>
      <link rel="stylesheet" href="/css/projects.css">
    <?php endif; ?>
  </head>
  <body>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'notice'): ?>
      <div id="message" class="notice">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <svg class="close" onclick="document.getElementById('message').hidden = true;">
          <path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
        </svg>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'confirm'): ?>
      <div id="message" class="confirm">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <svg class="close" onclick="document.getElementById('message').hidden = true;">
          <path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
        </svg>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'warning'): ?>
      <div id="message" class="warning">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <svg class="close" onclick="document.getElementById('message').hidden = true;">
          <path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path>
        </svg>
      </div>
    <?php endif; ?>

    <header>
      <div class="left">
        <h4 class="header_h4">Dennis ten Hoove</h4>
      </div>
      <div class="right">
        <a href="/">Home</a>
        <a href="/pages/projects.php">Projects</a>
        <?php if (isset($_SESSION['userId'])) { ?>
          <a href="/functions/logout.func.php">Logout</a>
        <?php } else { ?>
          <a href="/pages/login.php">Login</a>
        <?php }; ?>
      </div>
    </header>
