<?php

  // Website settings
  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.conf');

  // SVG icons
  include ($_SERVER['DOCUMENT_ROOT'].'/functions/svgReq.func.php');

  // Session
  session_start();

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Blog</title>
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

    <?php if ($pageName === 'newpost.php' OR $pageName === 'newproject.php') : ?>
      <link rel="stylesheet" href="/css/newpost.css">
    <?php endif; ?>

    <?php if ($pageName === 'viewpost.php' OR $pageName === 'viewproject.php') : ?>
      <link rel="stylesheet" href="/css/viewpost.css">
    <?php endif; ?>
  </head>
  <body>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'notice'): ?>
      <div id="message" class="notice">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <?php svgReq('close'); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'confirm'): ?>
      <div id="message" class="confirm">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <?php svgReq('close'); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['message']) && $_GET['message-type'] === 'warning'): ?>
      <div id="message" class="warning">
        <span class="message_text"><?php echo $_GET['message']; ?></span>
        <?php svgReq('close'); ?>
      </div>
    <?php endif; ?>

    <header>
      <div class="left">
        <h4 class="header_h4"><?php echo $headerText; ?></h4>
      </div>
      <div class="right">
        <!-- Horrible way to remove white spaces -->
        <a href="/">Home</a
        ><a href="/pages/projects.php">Projects</a
        <?php if (isset($_SESSION['userId'])) { ?>
          ><a href="/functions/logout.func.php">Logout</a>
        <?php } else { ?>
          ><a href="/pages/login.php">Login</a>
        <?php }; ?>
      </div>
    </header>
