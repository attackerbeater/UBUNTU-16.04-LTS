<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('author'); ?>">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog Template · Bootstrap</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_template_directory_uri().'/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri().'/css/blog.css'; ?>" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body>
  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="text-muted" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="#">Business</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="text-muted" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
          <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
        </div>
      </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
      <?php
      // wp_nav_menu( array(
      //   'menu'              => 'wpb-theme-top-nav',
      //   'theme_location'    => 'wpb-theme-top-nav',
      //   'depth'             => 20,
      //   'container'         => 'nav',
      //   'container_class'   => 'nav d-flex justify-content-between',
      //   'container_id'      => 'navbarCollapse',
      //   'menu_class'        => 'navbar-nav mr-auto',
      //   'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      //   'walker'            => new wp_bootstrap_navlist_walker()
      //   )
      // );

      wp_nav_menu( array(
    		'menu'              => 'wpb-theme-top-nav',
    		'theme_location'    => 'wpb-theme-top-nav',
    		'depth'             => 2,
    		'container'         => 'false',
    		'menu_class'        => 'nav d-flex justify-content-between',
    		'fallback_cb'       => 'wp_bootstrap_navlist_walker::fallback',
    		'walker'			=> new wp_bootstrap_navlist_walker())
    	);

      ?>


<!--
      <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="#">World</a>
        <a class="p-2 text-muted" href="#">U.S.</a>
        <a class="p-2 text-muted" href="#">Technology</a>
        <a class="p-2 text-muted" href="#">Design</a>
        <a class="p-2 text-muted" href="#">Culture</a>
        <a class="p-2 text-muted" href="#">Business</a>
        <a class="p-2 text-muted" href="#">Politics</a>
        <a class="p-2 text-muted" href="#">Opinion</a>
        <a class="p-2 text-muted" href="#">Science</a>
        <a class="p-2 text-muted" href="#">Health</a>
        <a class="p-2 text-muted" href="#">Style</a>
        <a class="p-2 text-muted" href="#">Travel</a>
      </nav> -->
    </div>
