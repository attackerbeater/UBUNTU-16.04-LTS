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

	<nav class="navbar navbar-light bg-white">
	  <a class="navbar-brand" href="http://mall-e.net/">
	    <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo ml-4 mr-3" alt="Mall-E Logo">
	    <span class="malle-logo-text">MERCHANTS</span>
	  </a>
	</nav>


	<div class="container">
		<div class="row">
			<div class="col-md-7 mt-5">
				<div class="row mt-4">
					<div class="col-md-12">
						<h5>New Merchants / Outlets</h5>
						<form method="post" action="<?= base_url('Enquiry/sendEnquiry') ?>" class="mt-4 inquiry-form" autocomplete="off">
							<div class="row">
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="text" name="m_name" id="m_name" class="form-control form-control-sm" placeholder="Merchant or Company Name" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group mt-m">
												<input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Your Name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mt-m">
												<input type="text" name="country" id="country" class="form-control form-control-sm" placeholder="Country" required list="datalist">

												<datalist id="datalist">
													<?php 
														foreach ($countries as $country) {
															?>

															<option value="<?= $country->country_name ?>">

													<?php
															}

													 ?>	
												</datalist>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group mt-m">
												<input type="text" name="number" id="number" class="form-control form-control-sm" placeholder="Contact Number" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group mt-m">
												<input type="email" name="email" id="email" class="form-control form-control-sm" placeholder="Your Email" required>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3 offset-md-1">
									<div class="row">
										<div class="col-md-12">
											<button type="button" class="btn btn-outline-dark btn-sm col-md-12" id="btnClear">Clear <span><i class="fas fa-times ml-3"></i></span></button>
										</div>
										<div class="col-md-12 mt-2">
											<button type="submit" class="btn btn-primary btn-sm col-md-12">Submit <span><i class="fas fa-sign-in-alt ml-3"></i></span></button>
										</div>
									</div>
									
								</div>
							</div>
						</form>
						<p class="foot mt-2">*Fill in all the details above and press Submit and we will get back to you.</p>
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
		
		$('#btnClear').click(function(){
			$('input').val('');
		});

	</script>
</body>
</html>