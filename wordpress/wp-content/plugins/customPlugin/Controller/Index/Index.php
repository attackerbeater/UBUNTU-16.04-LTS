<?php

class Index {

	public function enqueue_frontend(){
		// enqueue all scripts
		wp_enqueue_style('customstyle', plugins_url('/../../view/frontend/web/css/customstyle.css', __FILE__));
		wp_enqueue_script('customscript', plugins_url('/../../view/frontend/web/js/customscript.js', __FILE__));
	}

	// for frontend: wp_enqueue_scripts	
	public function register_frontend_scripts(){
		add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend']);
		// add_action('the_content', [$this, 'this_is_my_test_plugin']);
	}

	public function this_is_my_test_plugin( string $content ) {
	    $content .= '<p>Hi, This is <b>John Manducdoc. Junsay</b></p>';
	    $content .= '<p>This is my first test plugin output!</p>';
	    return $content;
	}
}	
