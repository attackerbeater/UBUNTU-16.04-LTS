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


	<style type="text/css">
		
		body{
		    background-image: url("<?= base_url('assets/images/src/shopper.jpg') ?>");
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-size: cover;
		}
		.malle-logo-text {
			
			position: relative;
			top: 12px;
			left: 20px;
		}
	</style>

</head>
<body>

	<?php 

		if ($this->session->flashdata('emailsent')) {
			?>

				<script type="text/javascript">
					
					$(document).ready(function(){
					  toastr["success"]("<?= $this->session->flashdata('emailsent') ?>");
					})
				</script>

			<?php
		}

	?>

	<?php 

		if ($this->session->flashdata('emailnotsent')) {
			?>

				<script type="text/javascript">
					$(document).ready(function(){
					  toastr["error"]("<?= $this->session->flashdata('emailnotsent') ?>");
					})
				</script>

			<?php
		}

	?>

	<!--<nav class="navbar navbar-light bg-white">
	  <a class="navbar-brand" href="<?= base_url(); ?>">
	    <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
	    <span class="malle-logo-text">SHOPPERS</span>
	  </a>
	</nav>-->
	
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

		    <span class="navbar-toggler-icon"></span>

		</button>



	  <div class="collapse navbar-collapse" id="navbarSupportedContent">

	    <ul class="navbar-nav mr-auto">

	      

	      <li class="nav-item" style="margin-right: 10px;border-right: 3px solid;">

	        <a class="nav-link" href="<?= base_url() ?>">

	        	<img class="malle-logo" src="<?= base_url('assets/images/logo/rec.png') ?>" >

	        </a>

	      </li>

	      <li class="nav-item">
			
	      	<span class="malle-logo-text  second-item">Registered Shopper</span>




	      </li>

	    </ul>

	    <ul class="navbar-nav my-2 my-lg-0">
			
	    	<!--<li class="nav-item">

	    		Merchant

	      		<button class="btn-orange my-2 my-sm-0 ml-2 mr-3" type="submit">Open Free Account</button>

	    	</li>

	    	<li class="nav-item">

	    		Shoppers

	      		<a href="<?= base_url('Shopper') ?>"><button class="btn-red my-2 my-sm-0 ml-2" type="submit">Quick Register</button></a>

	    	</li>
			<li class="nav-item">

	      		<a href="#" class="btn-blue my-2 my-sm-0 ml-2 mr-3" >How it works</a>

	    	</li>
			<li class="nav-item active">

				<a class="nav-link" href="#">
	
					<i class="fas fa-bars malle-bars"></i>
	
				</a>
	
			  </li>-->
			
				<li class="nav-item" style="margin: 0px 20px;">
				<?php
				if(!$this->session->userdata('last_login')){
				
				?>
				<p  style="  margin-bottom: 0px;">Merchant</p>
	    		

	      		<a href="<?= base_url('NewMerchant') ?>"><button class="btn-orange my-2 my-sm-0 " type="submit">Open Free Account</button></a>
				<?php
				}else{
				
				?>
				<p  style="  margin-top: 30px;">Login Email : <strong><?=$this->session->userdata('email_login')?></strong></p>
	    		

				
				<?php
				}
				?>
				

	    	</li>

	    	<li class="nav-item"  style="margin: 0px 20px;">
				<?php
				if(!$this->session->userdata('last_login')){
				
				?>
	    		<p style="  margin-bottom: 0px;">Shoppers</p>

	      		<a href="<?= base_url('Shopper') ?>"><button class="btn-red my-2 my-sm-0 " type="submit">Quick Register</button></a>
				<?php
				}else{
				
				?>
				<p  style="  margin-top: 30px;">Last Login : <strong><?=$this->session->userdata('last_login')?></strong></p>
				<?php
				}
				?>
	    	</li>
			<li class="nav-item"  style="margin: 0px 20px;">
				<?php
				if(!$this->session->userdata('last_login')){
				
				?>
				<p  style="  margin-bottom: 0px;">&nbsp;</p>
	      		<a href="#" class="btn-blue my-2 my-sm-0" >How it works</a>
				<?php
				}else{
				
				?>
				<p  style=" margin-bottom: 10px;color: green;font-weight: 700;">Online</p>
	      		<a href="<?=site_url('Shopper/logout')?>" class="btn-red my-2 my-sm-0" >Logout</a>
				<?php
				}
				?>
	    	</li>
			 <li class="nav-item active"  style="margin: 14px 20px;"> 

				<a class="nav-link" href="#">
	
					<i class="fas fa-bars malle-bars"></i>
	
				</a>
	
			  </li>
	    </ul>

	  </div>

	</nav>


	<div class="container">
		<div class="row">
			<div class="col-md-6 mt-5" style="margin-top: 13rem!important;">
				<div class="row mt-4">
					<div class="col-md-12">
						
						<form method="post" action="<?= base_url('Shopper/processOTP') ?>" class="mt-4 inquiry-form" autocomplete="off">
							<h5>Registered Shopper</h5>
							<div class="row">
								<div class="col-md-12">
									
									<div class="row">
										<div class="col-md-4">
											<div class="form-group mt-m">
												<label class="text-primary"><?=$this->session->userdata('email_login')?></label>
												<input type="number" name="Otp" id="otp" class="form-control form-control-sm" placeholder="Enter 4 Digit" required>
											</div>
										</div>
									</div>
									
								</div>
								<!--<div class="col-md-3 offset-md-1">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-outline-dark btn-sm col-md-12" id="btnClear">Clear <span><i class="fas fa-times ml-3"></i></span></button>
										</div>
										
									</div>
									
								</div>-->
								<p class="foot mt-2">*Please check your email & enter the 4 digit number here.</p>
								<div class="col-md-3 mt-2">
											<button type="submit" class="btn btn-primary btn-sm col-md-12">Next <span><i class="fas fa-sign-in-alt ml-3"></i></span></button>
										</div>
								
							</div>
						</form>
						  
					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/TweenMax.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/TimelineMax.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/plugins/ScrollToPlugin.min.js') ?>"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js"></script>		
		<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/toastr.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/popper.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/avatar.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/malle.js') ?>"></script>

	<script type="text/javascript">
		
		function isNumber(evt) {
				    evt = (evt) ? evt : window.event;
				    var charCode = (evt.which) ? evt.which : evt.keyCode;
				    if (charCode > 31 && (charCode < 46 || charCode > 57) ) {
				        return false;
				    }

				    return true;
				}

		$('#btnClear').click(function(){
			$('input').val('');
		});

	</script>
</body>
</html>