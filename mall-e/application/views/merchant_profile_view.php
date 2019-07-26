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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>

	<script>
		if (navigator.geolocation) {
		          navigator.geolocation.watchPosition(function(position) {
		           
					var x_lat = position.coords.latitude;
					var x_long = position.coords.longitude;
					var res;
					 
					 
					 
					 
					$(".mallcontainer").each(function(){
					    //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
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
				           
				        	
					    	$(".mallcontainer[data-id="+id+"]  .mall-text").html(return_result);
				            
				        	}
				        });
					   
					   
					});
					
					 
					$(".merchantcontainer").each(function(){
					    //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
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
				           
				        	
					    	$(".merchantcontainer[data-id="+id+"] .merchant-text").html(return_result);
				            
				        	}
				        });
					   
					   
					});
					
					
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
					
					$(".locationcontainer").each(function(){
					    //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
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
				           
				        	
					    	$(".locationcontainer[data-id="+id+"] .location-text").html(return_result);
				            
				        	}
				        });
					   
					   
					});
					 
				  });
		}
	</script>
	<style>
		.btn-blue {
			background: blue;
			padding: 8px;
			color: #fff;
			border: 0;
			position: relative;
			 top: 0px; 
		}
		.malle-body{
			height: 300px;
		}
		.mer-img2 {
			height: 100%;
			width: 100%;
			border: 15px solid #fff;
		}
		.bord{
			border-bottom: none;
		}
		.malle-body {
			background: url(<?=base_url()?>admin/main_merchant/<?=$merchant_info['mer_main_image']?>) no-repeat;
			background-position: center !important;
			background-size: cover !important;
		}
		.latest-deals-img{
			height: 100%;
			border-radius: 0;
		}
		.deal-card{
			    padding: 0px 20px;
				border: none;
		}
		.img-overlay1{
			margin-left: 120px;
			margin-top: 0px;
			width: 60px;
		}
		.malle-logo-text {
			position: relative;
			top: 12px;
			left: 20px;
		}
	</style>
	
</head>

<body>

	
	<!--<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

		    <span class="navbar-toggler-icon"></span>

		</button>



	  <div class="collapse navbar-collapse" id="navbarSupportedContent">

	    <ul class="navbar-nav mr-auto">

	      <li class="nav-item active">

	        <a class="nav-link" href="#">

	        	<i class="fas fa-bars malle-bars"></i>

	        </a>

	      </li>

	      <li class="nav-item">

	        <a class="nav-link" href="<?= base_url() ?>">

	        	<img class="malle-logo" src="<?= base_url('assets/images/logo/rec.png') ?>" >

	        </a>

	      </li>

	      <li class="nav-item">

	      	<select class="malle-country">

	      		<option>Singapore</option>

	      		<option>India</option>

	      		<option>Philippines</option>

	      	</select>




	      </li>

	    </ul>

	    <ul class="navbar-nav my-2 my-lg-0">

	    	<li class="nav-item">

	    		Merchant

	      		<button class="btn-orange my-2 my-sm-0 ml-2 mr-3" type="submit">Open Free Account</button>

	    	</li>

	    	<li class="nav-item">

	    		Shoppers

	      		<a href="<?= base_url('Shopper') ?>"><button class="btn-red my-2 my-sm-0 ml-2" type="submit">Quick Register</button></a>

	    	</li>

	    </ul>

	  </div>

	</nav>
-->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

		    <span class="navbar-toggler-icon"></span>

		</button>



	  <div class="collapse navbar-collapse" id="navbarSupportedContent">

	    <ul class="navbar-nav mr-auto">

	     

	      <li class="nav-item" style="">

	        <a class="nav-link" href="<?= base_url() ?>">

	        	<img class="malle-logo" src="<?= base_url('assets/images/logo/rec.png') ?>" >

	        </a>

	      </li>
		  
		   <li class="nav-item">
			
	      	<span class="malle-logo-text  second-item"><?= $merchant_info['merchant_name'] ?> - <?= $merchant_info['mall_name'] ?></span>




	      </li>

	      
	    </ul>

	   

	  </div>

	</nav>
	
	<div class="container-fluid">

		<div class="row malle-body" id="malle-body">

			<div class="col-md-12">

				<!--<img class="malle-logo2" id="intro" src="<?= base_url('assets/images/logo/rec.png') ?>">-->

			</div>

			<!--<div class="col-md-6" id="" style="top: 100px">

				
				

			</div>-->

		</div>

		<div class="row mt-5 bord">
				<div class="col-md-3" style="position: relative;bottom: 100px;">
										<div class="col-md-12">
											<img src="<?= base_url('admin/uploads/'). $merchant_info['image_name'] ?>" class="mer-img2">
										</div>
										<div class="col-md-12">
											<h6 class="text-danger text-center"><?= $merchant_info['type'] ?></h6>
										</div>
										
				</div>
				<div class="col-md-6">
										<div class="col-md-12">
											<h4>Outlet Address</h4>
										</div>
										<div class="col-md-6">
											<p class="text-primary">
												<?=  $merchant_info['loc_address'] .' ,' . $merchant_info['country_name'] ?>
											</p>
										</div>
										<div class="col-md-12">
											<p  class="text-primary">
												<a href="<?=  $merchant_info['website'] ?>">
												<?=  $merchant_info['website'] ?></a>
											</p>
										</div>
										<div class="col-md-12">
											<label>Tel: </label>
											<span class="text-primary">
												<?=  $merchant_info['loc_telephone'] ?>
											</span>
										</div>
										<div class="col-md-12 ">
											<label>Opening Hours:  </label>
											<span class="text-primary"><?= $merchant_info['opening_hour'] ?></span>
										</div>
										<div class="col-md-3  social" >
											<span class="" style="  ">

												<a href="<?=$merchant_info['instagram']?>" target="_blank">
												<i class="fab fa-instagram" style=" font-size: 25px;"></i>
												</a>
												<!--<a href="<?=$merchant_info['twitter']?>" target="_blank">
												<i class="fab fa-twitter" style=" font-size: 25px;"></i>
												</a>-->
												<a href="<?=$merchant_info['facebook']?>" target="_blank">
												<i class="fab fa-facebook-f" style=" font-size: 25px;"></i>
												</a>
											</span>
										</div>
										
				</div>
				<div class="col-md-3">
					<!--<div class="col-md-12 ">-->
					<!--	<p class="">Opening Hours: <span class="text-primary"><?= $merchant_info['opening_hour'] ?></span></p>-->
					<!--</div>-->
					<div class="col-md-12 ">
						<div class="col-md-12">
					<div class="carousel slide" id="myCarousel">
					        <div class="carousel-inner">
					        	<?php 
					        	
					        	$count = 0;
					        		foreach(array_chunk($mall_locations,5) as $m):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?>">
					                    <ul class="thumbnails">
					                       <div class="row">
						                         <?php
													
												foreach($m as $row):
															
																
															
														
												?>
												
												
												<div class="col-md-12 locationcontainer" data-id="<?=$row->merchantLocation_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
		
															<a href="<?= base_url('Mall/MallInfo/'). $row->mall_id ?>" class="t-d">
		
															
															<div class="deal-card card latest-deals-card cont-deals dealcontainer" data-id="<?=$row->merchantLocation_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
																<div class="row">
																	<div class="col-md-12 col-sm-12">
																		<h5><?//$row->Sub_Category_name?> <span style="    font-size: 12px;    padding: 8px 0px;" class="text-danger location-text "></span></h5>
																		
																	</div>
																	<div class="col-md-12 col-sm-12 ">
																		<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->merchantLocation_id?>">
																		<div class="card-img-overlay"><p class="img-overlay1"><?= $row->type_name ?></strong></p></div>
																	</div>
																	
																	<div class="col-md-12 col-sm-12">
																		<div class="row">
																			<div class="col-md-12">
																				<div class="row text-left">
																					<div class="col-md-12">
																						<h5 class=""><?= $row->mall_name ?></h5>
																						<h6 class="text-primary"><?= $row->merchant_location ?></h6>
																					</div>
																					
																				</div>
																			</div>
																			
																		</div>
																	</div>
																</div>
															</div>
															
		
															  </a>
													</div>
												<?php	
														endforeach;
												?>
											</div>
					                    </ul>
					              </div>
					              <?php
					              $count++;


					              	endforeach;
					              ?>
					        </div>
					</div>
				</div>
		</div>
		
			
	</div>
	
	</div>
	<div class="row latest-deals-container" style="    background: rgba(227, 227, 227, 0.32);    padding: 40px;">
			 <div class="col-md-12">
						   <h1 class="">About  <strong><?= $merchant_info['merchant_name'] ?></strong></h1>
						   <p class="lead section-lead"><?= $merchant_info['loc_about_us'] ?></p>
				
				</div>
				   <!-- /.row -->
	   </div>
	
	<div class="row latest-deals-container mt-5">

			<div class="col-md-4">
				<h4>Outlet Pictures</h4>
				
			</div>
			
			<div class="col-md-4"></div>

				<div class="col-md-12">
					<div class="carousel slide" id="myCarousel">
					        <div class="carousel-inner">
					        	<?php 
					        	
					        	$count = 0;
					        	//	foreach(array_chunk($merchant_promos,5) as $m):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?>">
					                    <ul class="thumbnails">
					                       <div class="row">
						                         <?php
													
												//foreach($m as $row):
															
																
															
														
												?>
												
												<?php 
						
													foreach ($outlet_images as $out) {
									
												?>
												<div class="col-md-3 mt-3 mallcontainer" >

													<a href="#" class="t-d">

													<div class="card latest-deals-card" style="">

													  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $out->image_name?>" alt="<?=$out->image_name?>">

													   <!--<div class="card-img-overlay"><p class="img-overlay1"></p></div>-->

													  <div class="card-body-mall">

													    <div class="row">

													    	<div class="col-md-12">

													    		
													    		<div class="row">
													    			<div class="col-md-6"><p class="text-danger  mall-text" id="distance"></p></div>
													    			<div class="col-md-6">
																		
																	</div>
													    		</div>
													    		
													    		
													    	</div>

													    </div>

													  </div>

													</div>
													</a>

												</div>
												<?php	
												//		endforeach;
												?>
												<?php
													}
												?>
											</div>
					                    </ul>
					              </div>
					              <?php
					              //$count++;


					              //	endforeach;
					              ?>
					        </div>
					        
					       <?php
					       	//if($count > 1){
								
					       ?>
						   <!--<div>
								<ul class="control-box pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div> -->
					       <?php
					       
							//}
					       ?>                       
				    	</div>      

				</div>


		</div>

	
	<div class="row latest-deals-container mt-5">

			<div class="col-md-4">
				<h4>Promotions (<?=count($merchant_promos)?>)</h4>
				
			</div>
			
			<div class="col-md-4"></div>

				<div class="col-md-12">
					<div class="carousel slide" id="myCarousel">
					        <div class="carousel-inner">
					        	<?php 
					        	
					        	$count = 0;
					        	//	foreach(array_chunk($merchant_promos,5) as $m):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?>">
					                    <ul class="thumbnails">
					                       <div class="row">
						                         <?php
													
												//foreach($m as $row):
															
																
															
														
												?>
												
												<?php 
						
													foreach ($merchant_promos as $promos) {
									
												?>
												<div class="col-md-3 mt-3 mallcontainer" >

													<a href="#" class="t-d">

													<div class="card latest-deals-card" style="">

													  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/promos/<?= $promos->image_name?>" alt="<?=$promos->image_name?>">

													   <!--<div class="card-img-overlay"><p class="img-overlay1"></p></div>-->

													  <div class="card-body-mall">

													    <div class="row">

													    	<div class="col-md-12">

													    		
													    		<div class="row">
													    			<div class="col-md-6"><p class="text-danger  mall-text" id="distance"></p></div>
													    			<div class="col-md-6">
																		
																	</div>
													    		</div>
													    		
													    		
													    	</div>

													    </div>

													  </div>

													</div>
													</a>

												</div>
												<?php	
												//		endforeach;
												?>
												<?php
													}
												?>
											</div>
					                    </ul>
					              </div>
					              <?php
					              //$count++;


					              //	endforeach;
					              ?>
					        </div>
					        
					       <?php
					       	//if($count > 1){
								
					       ?>
						   <!--<div>
								<ul class="control-box pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div> -->
					       <?php
					       
							//}
					       ?>                       
				    	</div>      

				</div>


		</div>

	<?php 
								$c = 1;
								foreach ($subcat as $sub) {
									
									$countdeals = 0;
					        		foreach($deals as $m){
										if ($m->Sub_Category_name == $sub->Sub_Category_name) {
										$countdeals++;
										}
									}
									
									if($countdeals > 0){
										?>


									<div class="row latest-deals-container mt-5 bg-white">

												<div class="col-md-2"><h3><?= $sub->Sub_Category_name ?> <!--<span class="text-danger">Deals</span>--></h3></div>
												<div class="col-md-6 mt-2"><a href="<?= base_url('#') ?>" class="text-primary"><h5>View All(<?= $countdeals ?>)</h5></a></div>

													<div class="col-md-12">
														
														<div class="carousel slide" id="myCarousel<?= $c ?>">

															 <div class="carousel-inner">
										<?php 
			
										$count = 0;
											foreach(array_chunk($deals,4) as $m):
												
										?>
									   <!-- <div class="item <?php if($count == 0) echo'active';?>">
												<ul class="thumbnails">
												   <div class="row">
														 <?php
															
																foreach($m as $row){
																	
																if ($row->Sub_Category_name == $sub->Sub_Category_name) {
																	?>
		
		
																			<div class="col-md-3 mt-3">
		
															<div class="card latest-deals-card cont-deals" style="">
		
															  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
		
															   <div class="card-img-overlay"><p class="img-overlay4"><strong><?= $row->mall_name ?></strong></p></div>
		
															   <div class="card-img-overlay"><p class="img-overlay2 text-danger"><?= $row->short_desc ?></p></div>
		
															   <div class="card-img-overlay"><p class="img-overlay3">0.3km</p></div>
		
															  <div class="card-body-mall">
		
																<div class="row">
		
																	<div class="col-md-12 text-center">
		
																		<h4 class="text-danger font-weight-bold"><?=$row->currency_symbol.' '.$row->deal_amount?></h4>
																		<h6>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)</h6>
		
																		
																	</div>
		
																</div>
		
		
															  </div>
															 
		
															</div>
		
															<div class="row">
																<div class="col-md-10 offset-md-1">
																		
																<div class="row sub-cont">
		
																	<div class="col-md-4 bor">
		
																		<?php 
		
																			foreach ($d_images as $dd) {
																				if ($dd->merchant_id == $row->merchant_id) {
																					?>
		
																					<img class="latest-deals-logo" src="<?= base_url() ?>admin/uploads/<?= $dd->image_name ?>">
		
																					<?php
																				}
																			}
		
																		 ?>
		
																		
		
																	</div>
		
																	<div class="col-md-8">
		
																		<h5 class="text-primary"><?= $row->merchant_name ?></h5>
		
																		<h6 class="text-primary"><?= $row->merchant_location ?></h6>
		
																	</div>
		
																</div>
		
		
																</div>
															  </div>
		
		
														</div>
		
		
																	<?php
																}
														?>
														
														
														
		
		
														<?php		
																}
														?>
													</div>
		
												</ul>
										  </div>-->
										  
											   <div class="item <?php if($count == 0) echo'active';?>">
												<ul class="thumbnails">
												   <div class="row">
													<?php
															
														foreach($m as $row){
																	
															if ($row->Sub_Category_name == $sub->Sub_Category_name) {
																//echo $row->Sub_Category_name;
														?>
		
		
														<div class="col-md-3 mt-3 dealcontainer" data-id="<?=$row->dm_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
		
															<a href="<?= base_url('Deal/DealInfo/'). $row->dm_id . '/'. $sub->sub_category_id ?>" class="t-d">
		
															
															
															<div class="deal-card mt-4 card latest-deals-card cont-deals dealcontainer" data-id="<?=$row->dm_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>" style="    padding: 20px;    border: 1px solid #000;">
																<div class="row">
																	<div class="col-md-12 col-sm-12">
																		<h5><?//$row->Sub_Category_name?> <?= $row->short_desc ?></h5>
																	</div>
																	<div class="col-md-12 col-sm-12 mt-3">
																		<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
																	</div>
																	<?php if($row->featured) {?><div class="card-img-overlay"><p class="img-overlay1 overlay-feature"><strong>Featured</strong></p></div><?php } ?>
																	<div class="col-md-12 text-center">
		
																		<h6 class="font-weight-bold  mt-4"><span class="text-danger "><?=$row->currency_symbol.' '.$row->deal_amount?></span><span style="color: #111";>
																		<?php if($row->usual_price > 1) {?>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)<?php } ?></span></h6>
		
																		
																	</div>
																	
																</div>
															</div>
														</a>
													</div>
		
		
																	<?php
																	
																}
														?>
														
														
														
		
		
														<?php		
														
																
																}
														?>
												</div>
		
											</ul>
										</div><!-- /Slide1 --> 
										  <?php
										  $count++;
											endforeach;
											
										  ?>
								</div>
					        
					       <?php
								}
					       	if($count > 1){
								
					       ?>
						   <div>
								<ul class="control-box pager">
									<li><a data-slide="prev" href="#myCarousel<?= $c ?>" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel<?= $c ?>" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div>
						   <!-- /.control-box -->   
					       <?php
					       
							}
					       ?> 
															
						</div>

					</div>
				</div>	

				<?php
					$c = $c + 1;
					}	
				 ?>


<footer class="mt-5">

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