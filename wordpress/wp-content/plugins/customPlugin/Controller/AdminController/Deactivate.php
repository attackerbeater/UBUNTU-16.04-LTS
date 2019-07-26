<?php

class Deactivate {

	public static function deactivation(){
		// flush rewrite rules
		flush_rewrite_rules();
	}

}	
