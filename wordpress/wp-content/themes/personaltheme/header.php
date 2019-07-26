<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- <div id="main-container">
  <header class="header-column">
    <?php wp_nav_menu(['theme_location'=>'top']); ?>
    <img src="<?php header_image(); ?>" />
  </header> -->


  
  <!-- Top bar --->
  <nav class="top-bar">
    <div class="top-bar-left">
      <ul class="menu">
        <li class="name">
          <div class="header-logo"></div>
        </li>
      </ul>
    </div>
    <div class="top-bar-center">
        <?php
        wp_nav_menu(array(
          'container' => false,                            // remove nav container
          'container_class' => '',           	      	     // class of container
          'menu' => '',                      	             // menu name
          'menu_class' => 'vertical medium-horizontal menu lower',         	 // adding custom nav class
          'theme_location' => 'top-bar-r',                 // where it's located in the theme
          'before' => '',                                  // before each link <a>
          'after' => '',                                   // after each link </a>
          'link_before' => '',                             // before each link text
          'link_after' => '',                              // after each link text
          'depth' => 5,                                    // limit the depth of the nav
          'fallback_cb' => false,                          // fallback function (see below)
          'walker' => new top_bar_walker()
        ));
        ?>
    </div>
    <div class="top-bar-right">
      <?php get_search_form(); ?>
    </div>
  </nav>
