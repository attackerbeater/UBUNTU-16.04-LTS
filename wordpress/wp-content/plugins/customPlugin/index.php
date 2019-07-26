<?php
/**
 * @package Hello_Dolly
 * @version 1.7.2
 */
/*
Plugin Name: CustomPlugin
Plugin URI: 
Description: This is the test plugin
Author: John Manducdoc. Junsay
Version:
Author URI:
*/

if(!defined('ABSPATH')){
	die;
}

require_once(dirname(__FILE__) . '/Controller/AdminController/Activate.php');
require_once(dirname(__FILE__) . '/Controller/AdminController/Deactivate.php');
require_once(dirname(__FILE__) . '/Controller/AdminController/Admin.php');
require_once(dirname(__FILE__) . '/Controller/Index/Index.php');

if(class_exists('activate')){
	// activation                      ,same to add_action('init', 'function name');  
	register_activation_hook(__FILE__, ['Activate', 'activation'] );
}

if(class_exists('deactivate')){
	register_deactivation_hook(__FILE__, ['Deactivate', 'deactivation'] );
}

if(class_exists('admin')){
	$objAdmin = new Admin();
	$objAdmin->register_admin_scripts();
}

if(class_exists('index')){
	$objIndex = new Index();
	$objIndex->register_frontend_scripts();
}

