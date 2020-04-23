<?php

  // Website settings
  include ($_SERVER['DOCUMENT_ROOT'].'/config/default.conf');

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
    <header>
      <div class="left">
        <h4 class="header_h4">Dennis ten Hoove</h4>
      </div>
      <div class="right">
        <a href="/">Home</a>
        <a href="/pages/projects.php">Projects</a>
        <?php if (true) { ?>
          <a href="/pages/login.php">Login</a>
        <?php } else { ?>
          <a href="/pages/logout.php">Logout</a>
        <?php }; ?>
      </div>
    </header>
