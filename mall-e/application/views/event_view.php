<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="x-ua-compatible" content="ie=edge">



	<title><?= $title ?></title>




	<link href="<?= base_url('assets/images/logo/malle.png') ?>" rel="icon" type="image">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/malle_style.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome/css/all.css') ?>">

	<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>



	<style>

		.panel {
			margin-bottom: 20px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		.panel-default {
			border-color: #ddd;
		}
		.panel-body {
			padding: 15px;
		}
	</style>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>


	<script>
		if (navigator.geolocation) {
		          navigator.geolocation.watchPosition(function(position) {

					var x_lat = position.coords.latitude;
					var x_long = position.coords.longitude;
					var res;

					$(".dealcontainer").each(function(){
					    console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
					    var id = $(this).attr("data-id");
					    var return_result = '';
					    var _lat = $(this).attr("data-lat");
					    var _long = $(this).attr("data-long");

					    var origin1 = {lat: parseFloat(x_lat), lng: parseFloat(x_long)};
						var destinationB = {lat: parseFloat(_lat), lng: parseFloat(_long)};
						var geocoder = new google.maps.Geocoder;

				        var service = new google.maps.DistanceMatrixService;
				        service.getDistanceMatrix({
				          origins: [origin1],
				          destinations: [destinationB],
				          travelMode: 'DRIVING',
				          unitSystem: google.maps.UnitSystem.METRIC,
				          avoidHighways: false,
				          avoidTolls: false
				        }, function(response, status) {
				          if (status !== 'OK') {
				            alert('Error was: ' + status);
				          } else {

				          	results = response;
				          	//console.log(results);
				            var originList = response.originAddresses;
				            var destinationList = response.destinationAddresses;
							if(response.rows[0].elements[0].status=="ZERO_RESULTS")
							return_result = "Distance not available with your location!"
							else
				           	return_result = response.rows[0].elements[0].distance.text;


					    	$(".dealcontainer[data-id="+id+"] .deal-text").html(return_result);

				        	}
				        });


					});



			     }, function() {
		            alert("No Location found") ;
		          });
		        } else {

		          alert("No Location found") ;
		 }
	</script>



</head>

<body>

	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 mb-5">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

			    <span class="navbar-toggler-icon"></span>

			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="navbar-brand mr-auto" href="<?= base_url() ?>">
					<img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
					<span class="malle-logo-text"><?=$events['event_name']?></span>
				</a>
				<ul class="nav navbar-nav ml-auto">

					<li class="nav-item">
						<a class="nav-link active" href="javascript:void(0)"><p>&nbsp;</p></a>
					</li>
					<li class="nav-item">					
						<a class="nav-link active" href="<?= (!empty($url))? base_url().'Event' : base_url(). '#events-section' ?>"><h3>Back</h3></a>
					</li>	
				</ul>

		  </div>
		</nav>
	</header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<?php
					// echo '<pre>';
					// print_r($event_image);
					// echo '<pre/>';

					$cnt = 0;
					for($i = 1; $i <= 5; $i++){
						
						if (@$event_image[$i][0]->event_count == $i) {
							$cnt = $i;
						}
					}

					
				?>
				<?php if($cnt>1){ ?>
				<div class="row">
					<div class="col-md-6">
						<ul class="control-box pager"  id="merchant_pager">
							<li><a data-slide="prev" href="#myCarousel3" class=""><i class="fa fa-arrow-left"></i></a></li>
							<li><a data-slide="next" href="#myCarousel3" class=""><i class="fa fa-arrow-right"></i></a></li>
						</ul>
					</div>
				</div>
				<?php } ?>

				
				<div class="row">

					<div class="col-md-6">
						<div class="carousel slide" id="myCarousel3">

							<div class="carousel-inner">
						        <?php
						        	$cnt = 0;
											for($i = 1; $i <= 5; $i++){
									 			if (@$event_image[$i][0]->event_count == $i) {
									 				$cnt = $i;
									  ?>
	   											<div class="item <?php if($i==1) echo'active';?> merchant_item">
								            		<img class="d-block w-100" src="<?= base_url('admin/event_photos/') . $event_image[$i][0]->event_image?>">

								          		</div>
								          		
											<?php }

										    }?>



						    </div>

				    	</div><!-- /#myCarousel -->

				    	

						<!--<img class="img-fluid" src="<?= base_url() ?>admin/event_photos/<?= $events['event_image']?>" alt="<?=$events['event_id']?>"> -->
						<!-- <div class="row">
							<div class="col-md-12">
							    <p>Primary Tag: <span class="font-weight-bold  mt-4 text-danger"> <?=$promotion['tag_name'] ?></span></p>
							    <p>Other Tags: </p>
							</div>    
						</div>     -->
					</div>


					<div class="col-md-6">
						 <h2>Event Details</h2>
						 <hr><?php
						  $start_on = implode('-',(explode('/',$events['start_date'])));
							$ends_on = implode('-',(explode('/',$events['end_date'])));
						 ?>
						 <p>
						 	<i class="fa fa-calendar" aria-hidden="true"></i> <?=date('d M',strtotime($start_on)); ?> - <?=date('d M',strtotime($ends_on)); ?></p>
						 <p>
						 <p>
						 	<i class="fa fa-clock" aria-hidden="true"></i>
						 	<?=$events['event_timing'] ?>
						 </p>
							 <?= $events['event_description'] ?>
						 </p>
						 <br>
						 <h2>Venue</h2>
						 <hr>
						 <p>
						   <strong>
						   		<?= $events['location']; ?>
								<?php

								// if($promotion['monday'] == 'Y'){
								// 	echo "Monday,\n";
								// }

								// if($promotion['tuesday'] == 'Y'){
								// 	echo "Tuesday,\n";
								// }

								// if($promotion['wednesday'] == 'Y'){
								// 	echo "Wednesday,\n";
								// }

								// if($promotion['thursday'] == 'Y'){
								// 	echo "Thursday,\n";
								// }

								// if($promotion['friday'] == 'Y'){
								// 	echo "Friday,\n";
								// }

								// if($promotion['saturday'] == 'Y'){
								// 	echo "Saturday,\n";
								// }

								// if($promotion['sunday'] == 'Y'){
								// 	echo "Sunday";
								// }

								?>


							</strong>

						 </p>
							
						 <h5>Category</h5>
					
						  <hr>
							<?= $events['event_cat'] ?>					 

					</div>
				</div>

			</div>
			<hr>
		</div>
	</div>
	
	<br/><br/>

<div class="container-fluid">

		<footer>

			<div class="row malle-footer">

				<div class="col-md-3 malle-footer-content">

					<div class="cont"></div>

				</div>

				<div class="col-md-3 malle-footer-content">

					<div class="cont"></div>

				</div>

				<div class="col-md-3 malle-footer-content">

					<div class="content">

						Social Media

						<br>

						<a href="#"><i class="fab fa-facebook-f mt-4"></i></a>

						<a href="#"><i class="fab fa-twitter"></i></a>

						<a href="#"><i class="fab fa-instagram"></i></a>

					</div>

				</div>

				<div class="col-md-3 malle-footer-content">

					<div class="content2">

						Mobile App

						<br>

						<a href="#"><img class="dlink2 mt-3" src="<?= base_url('assets/images/src/ios.png') ?>"></a>

						<a href="#"><img class="dlink2 mt-2" src="<?= base_url('assets/images/src/andoird.png') ?>"></a>

					</div>

				</div>

			</div>



			<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>

			<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/TweenMax.min.js') ?>"></script>

			<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/TimelineMax.min.js') ?>"></script>

			<script type="text/javascript" src="<?= base_url('assets/greensock-js/src/minified/plugins/ScrollToPlugin.min.js') ?>"></script>

			<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
			<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min2.js') ?>"></script>

			<script type="text/javascript" src="<?= base_url('assets/js/malle.js') ?>"></script>

		</footer>
</div>


</body>
<script>
	 $(document).ready(function() {
	    $('.carousel').carousel({
	      interval: 0
	    })
	  });

	 $(document).ready(function() {
	    $('.carousel-1').carousel({
	      interval: 0
	    })
	  });

</script>
</html>
