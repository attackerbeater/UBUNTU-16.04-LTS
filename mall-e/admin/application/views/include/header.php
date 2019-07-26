<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?= $title ?></title>

	<link href="<?= base_url('assets/images/logo/malle.png') ?>" rel="icon" type="image">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/toastr.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/malle_style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dropzone.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jqueryui.css') ?>">

	<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script> 
	<script type="text/javascript" src="<?= base_url('assets/js/jqueryui.js') ?>"></script> 
	<script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script> 
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  <script> 
	  $.noConflict();
		jQuery(document).ready(function ($) {
		    $("#start_date").datepicker({dateFormat: 'dd/mm/yy'});
		    $("#end_date").datepicker({dateFormat: 'dd/mm/yy'});
		});
	  </script>
</head>