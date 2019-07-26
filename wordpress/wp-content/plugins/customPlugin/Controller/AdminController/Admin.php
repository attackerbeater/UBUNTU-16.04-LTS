<?php

class Admin {

	public function __construct(){
		// call the custo post type method	
		add_action('init', ['Admin', 'custom_post_type']);
	}

	// for admin: admin_enqueue_scripts
	public function register_admin_scripts(){
		add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
	}

	public function enqueue_admin(){
		// enqueue all scripts
		wp_enqueue_style('customstyle', plugins_url('/../../view/admin/web/css/customstyle.css', __FILE__));
		wp_enqueue_script('customscript', plugins_url('/../../view/admin/web/js/customscript.js', __FILE__));
	}

	// create custom book post type
	public static function custom_post_type(){
		register_post_type('book', [
			'public' => true,
			'label' => 'Books'
		]);
	}

}	
