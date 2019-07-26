<?php

function personaltheme_scripts(){
  // wp_enqueue_style( 'personalthemestyle', get_template_directory_uri() . '/assets/css/personal-theme.css',false,'1.1','all');
  // Foundation.zurb css
  wp_enqueue_style( 'foundationstyle', get_template_directory_uri() . '/assets/css/foundation.css',false,'1.1','all');
  wp_enqueue_style( 'appstyle', get_template_directory_uri() . '/assets/css/app.css',false,'1.1','all');
}
add_action('wp_enqueue_scripts', 'personaltheme_scripts');

function prefix_add_footer_styles() {
  // wp_enqueue_script( 'personalthemescript', get_template_directory_uri() . '/assets/js/personal-theme.js', array ( 'jquery' ), 1.1, true);
  // Foundation.zurb js
  wp_enqueue_script( 'appscript', get_template_directory_uri() . '/assets/js/app.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'what-input', get_template_directory_uri() . '/assets/js/vendor/what-input.js', array ( 'jquery' ), 1.1, true);
  wp_enqueue_script( 'foundationscript', get_template_directory_uri() . '/assets/js/vendor/foundation.js', array ( 'jquery' ), 1.1, true);
  // wp_enqueue_script( 'foundationtopbarscript', get_template_directory_uri() . '/assets/js/foundation/foundation.topbar.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'get_footer', 'prefix_add_footer_styles' );

function personaltheme_setup(){
  add_theme_support('menus');
  add_theme_support('custom-background');
  add_theme_support('custom-header');
  // add_theme_support('custom-header-uploads');
  register_nav_menus(
    array(
			'top'  => __('Top Menu', 'personaltheme'),
      'top-bar-r' => __('Vanz Top Bar Right Menu', 'personaltheme'),
      'footer'  => __('Footer', 'personaltheme'),
			'social' => __('Social Links Menu', 'personaltheme'),
  	)
  );
}
add_action('init', 'personaltheme_setup');

// https://gist.github.com/awshout/3943026
// https://kriesi.at/archives/improve-your-wordpress-navigation-menu-output
require_once( get_template_directory() . '/top-bar-walker.php' );
