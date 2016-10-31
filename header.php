<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

  <title><?php wp_title(); ?></title>

  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/img/site-icon.png" type="image/png">

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('title'); ?> | RSS Feed" href="<?php bloginfo('rss2_url'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div class="page-container">
    <div class="page-header-and-content-container">

      <header class="page-header">
        <div class="container">
          <a href="<?php bloginfo('url'); ?>">
            <?php bloginfo('name'); ?>
          </a>
          <div class="header-nav">
            <?php wp_nav_menu(array('theme_location' => 'header')); ?>
          </div>
        </div>
      </header>

      <div class="page-content">
