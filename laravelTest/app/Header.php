<?php 

namespace App;

class Header {

	public static function header($name){

		return "<!doctype html>
				<html lang=\"en\">
				   	<head>
				      	<meta charset=\"utf-8\">
				      	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
				      	<meta name=\"description\" content="">
				      	<meta name=\"author\" content=\"Mark Otto, Jacob Thornton, and Bootstrap contributors\">
				      	<meta name=\"generator\" content=\"Jekyll v3.8.5\">
				      	<meta name=\"csrf-token\" content=\"{{ csrf_token() }}\">
				      
				      	<title>{$name}</title>
				      	<link rel=\"canonical\" href=\"https://getbootstrap.com/docs/4.3/examples/starter-template/\">
				      	<!-- Bootstrap core CSS -->
				      	<link href=\"/css/app.css\" rel=\"stylesheet\">
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
				   	</head>
				  	<body>";
	}
}