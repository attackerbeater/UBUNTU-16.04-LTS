<body class="admin-body">
<?php 
	
	if ($this->session->flashdata('invalid_login')) {
		?>

			<script type="text/javascript">

				$(document).ready(function(){
				  toastr["error"]("<?= $this->session->flashdata('invalid_login') ?>");
				})
			</script>

		<?php
	}

 ?>

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

 <?php 
	
	if ($this->session->flashdata('email')) {
		?>

			<script type="text/javascript">

				$(document).ready(function(){
				  toastr["error"]("<?= $this->session->flashdata('email') ?>");
				})
			</script>

		<?php
	}

 ?>

 <?php 
	
	if ($this->session->flashdata('login_required')) {
		?>

			<script type="text/javascript">

				$(document).ready(function(){
				  toastr["warning"]("<?= $this->session->flashdata('login_required') ?>");
				})
			</script>

		<?php
	}

 ?>
	<div class="container">
		<div class="card card-container">
			<img class="img-card-admin" src="<?= base_url('assets/images/logo/malle.png') ?>">
			<form class="form-admin-login" method="post" action="<?= base_url('Account/validate_login') ?>" autocomplete="off">
				<div class="form-group">
					<input type="email" name="email" placeholder="Email Address" class="form-control" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="Password" class="form-control" required>
					<a href="#" class="forgot-password " data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password?</a>
				</div>
				<div class="form-group pt-4">
					<button type="submit" class="btn btn-block btn-sign-in">Sign in</button>
				</div>
			</form>
		</div>

		<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
	        	<p>Please enter your Email Address and we will send you a new password.</p>
	        	<form method="post" action="<?= base_url('Account/forgotPassword') ?>">
	        		<div class="form-group">
	        			<input type="email" name="email_fp" class="form-control" placeholder="Enter your email" required>
	        		</div>
	        		<div class="form-group">
	        			<button type="submit" class="btn btn-success">Request Password</button>
	        			<button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Go Back</button>
	        		</div>
	        	</form>
		      </div>
		    </div>
		  </div>
		</div>