<?php

include 'Admin.php';

class Activate extends Admin {

	public static function activation(){ 
		// generate CPT
		self::custom_post_type();
		// flush rewrite rules
		flush_rewrite_rules();
	}	
}	
