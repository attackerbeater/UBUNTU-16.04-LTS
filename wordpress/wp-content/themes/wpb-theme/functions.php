<?php
if ( ! file_exists( get_template_directory() . '/wp_bootstrap_navlist_walker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/wp_bootstrap_navlist_walker.php';
}

function wpb_theme_setup(){
	if ( function_exists( 'add_theme_support' ) ) {
	  add_theme_support('menus');

		add_theme_support( 'post-thumbnails' );
	 	set_post_thumbnail_size( 700, 500, true ); // default Post Thumbnail dimensions (cropped)
	  // additional image sizes
	  // delete the next line if you do not need additional image sizes
	  add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)

	  add_theme_support('custom-background');
	  add_theme_support('custom-header');
		// Post formats
		add_theme_support('post-formats',array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

		add_theme_support( 'featured-content', array(
  		'featured_content_filter' => 'wpbtheme_get_featured_content',
		));
	}

  register_nav_menus(
    array(
			'wpb-theme-top-nav'  => __('WPB Top navigation')
    )
  );

}
add_action('init', 'wpb_theme_setup');

// widget
function wpb_init_widgets($id){
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'	=> 'sidebar',
		'before-widget'=> '<div class="p-4">',
		'after-widget'=> '</div>',
		'before_title'	=> '<h4>',
		'after_title'	=> '</h4>'
	));
}

add_action('widgets_init', 'wpb_init_widgets');
