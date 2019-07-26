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
				            ////alert('Error was: ' + status);
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
				            //alert('Error was: ' + status);
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
				            //alert('Error was: ' + status);
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
				            //alert('Error was: ' + status);
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
			background: url(../../admin/main/<?=$merchant_info['mer_main_image']?>) no-repeat;
			background-position: center !important;
			background-size: cover !important;
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
			
	      	<span class="malle-logo-text  second-item"><?= $merchant_info['merchant_name'] ?></span>




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
				<div class="col-md-5">
										<div class="col-md-12">
											<h4><?= $merchant_info['merchant_name'] ?></h4>
										</div>
										<div class="col-md-6">
											<p class="text-primary">
												<?=  $merchant_info['merchant_address'] .' ,' . $merchant_info['country_name'] ?>
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
												<?=  $merchant_info['telephone'] ?>
											</span>
										</div>
										<div class="col-md-3 social" >
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
				<div class="col-md-4">
					<div class="col-md-12 ">
						<p class="">Opening Hours: <br/><span class="text-primary"><?= $merchant_info['opening_hour'] ?></span></p>
					</div>
					<div class="col-md-12 ">
						
					</div>
				</div>
		</div>
		<div class="row latest-deals-container" style="background: rgba(227, 227, 227, 0.32);    padding: 40px;">
			 <div class="col-md-12">
						   <h1 class="">About  <strong><?= $merchant_info['merchant_name'] ?></strong></h1>
						   <p class="lead section-lead"><?= $merchant_info['about_us'] ?></p>
				
				</div>
				   <!-- /.row -->
	   </div>
		<!--<div class="row" style="border-bottom: 1px solid #cecece;">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light">
				
				<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				  <div class="navbar-nav">
					<a class="nav-item nav-link active" href="#">Deals</a>
					<a class="nav-item nav-link" href="#">Promo Flyers</a>
					<a class="nav-item nav-link" href="#">Menu</a>
					<a class="nav-item nav-link" href="#">Jobs</a>
				  </div>
				</div>
			  </nav>
			</div>
		</div>-->

						<?php 
						
							foreach ($mall_locations as $mall) {
									if ($mall->mall_id == $merchant_info['mall_id']) {
										?>

		<div class="row latest-deals-container mt-5">

			<div class="col-md-4">
				<h4>Locations (<?=count($mall_locations)?>) - <span class="" style="padding: 5px 10px;">
				<?php
					$count_type =0;
					foreach($mall_type_count as $mtc){
						echo  $mtc->type_name .'('.$mtc->total_count.')';
						if($count_type > 0 && $count_type != count($mall_type_count)){
							echo ' | ';
						}
					}
				?>
				</span></h4>
				
			</div>
			
			<div class="col-md-4"></div>

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
												
												
												<div class="col-md-3 mt-3 locationcontainer" data-id="<?=$row->merchantLocation_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
		
															<a href="<?= base_url('Merchant/MerchantProfile/'). $row->merchantLocation_id ?>/<?=$row->mall_id?>" class="t-d">
		
															
															<div class="deal-card mt-4 card latest-deals-card cont-deals dealcontainer" data-id="<?=$row->merchantLocation_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
																<div class="row">
																	<div class="col-md-12 col-sm-12">
																		<h5> <?= $row->mall_name ?><span style="    font-size: 12px;    padding: 8px 0px;" class=" pull-right location-text "></span></h5>
																		
																	</div>
																	<div class="col-md-12 col-sm-12 mt-3">
																		<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->mall_image?>" alt="<?=$row->merchantLocation_id?>">
																	</div>
																	
																	<div class="col-md-12 col-sm-12">
																		<hr>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="row text-center">
																					<div class="col-md-12">
																						<h5 class=""><?= $row->merchant_name ?></h5>
																						
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-md-6">
																				
																				<h6 class=""><?= $row->merchant_location ?></h6>
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
					        
					       <?php
					       	if($count > 1){
								
					       ?>
						   <div>
								<ul class="control-box pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div> 
					       <?php
					       
							}
					       ?>                       
				    	</div>      

				</div>


		</div>


										<?php
									}
							}

						 ?>


							

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
					        	foreach(array_chunk($merchant_promos,20) as $m):
					        			
					       	 	?>
					            	<div class="item <?php if($count == 0) echo'active';?>">
					                    <ul class="thumbnails">
					                       <div class="row">
						                        <?php foreach($m as $key => $row): ?>
												
												<?php 	//foreach ($merchant_promos as $promos):
													// echo '<pre>';
													// print_r($row);
													// echo '<pre/>';									
												?>
												<div class="col-md-3 mt-3 mallcontainer" >

													<a href="<?= base_url('Promotion/Info/'). $row->promo_id ?>" class="t-d">
														<div class="deal-card mt-4 card latest-deals-card cont-deals">
													       <div class="col-md-12">
													          <h5 class="font-weight-bold  mt-4"><?=$row->promo_name?></h5>
													          <hr>
													       </div>
													       <div class="row">
													          <div class="col-md-12 col-sm-12">
													             <div class="card-img-overlay">
													                <p class="img-overlay1 overlay-feature"><strong><?=($row->tag_name)? $row->tag_name : 'Featured' ?></strong></p>
													             </div>
													             <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/promos/<?= $row->image_name?>" alt="<?=$row->image_name?>">	
													          </div>
													           <div class="col-md-12">
													             <div class="row">
													                <div class="col-sm">
													                   <h5 class="font-weight-bold  mt-4 text-danger">
													                      <?php if ($row->amount == "" || is_null($row->amount)) : ?>
													                      <?=$row->other_offer; ?>
													                      <?php else: ?>
													                   	  <?=$row->currency_symbol?> <?=$row->amount?>
													                      <?php endif;?>
													                   </h5>
													                   <h5 class="mt-2">
													                      <?=$promo_m_outlets[$key]; ?> Outlets
													                   </h5>
													                </div>
													                <div class="col-sm">
													                   <img class="card-img-top card-img" style=" background-position: center;" src="https://admin.mall-e.net/uploads/<?=$merchant_info['image_name'] ?>" alt="<?=$row->merchant_name?>">
													                </div>
													             </div>
													          </div>
													       </div>
													    </div>														
													</a>
												</div>
												<?php	
														//endforeach
												?>
												<?php
													endforeach
												?>
											</div>
					                    </ul>
					              	</div>
					            <?php
					            $count++;
				              	endforeach;
      			                ?>
					        </div>
					        
					       <?php
					       	if($count > 1){
								
					       ?>
						   <div>
								<ul class="control-box pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div> 
					       <?php
					       
							}
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
		
															<!--<div class="card latest-deals-card cont-deals" style="">
		
															  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
		
															   <div class="card-img-overlay"><p class="img-overlay4"><strong><?= $row->mall_name ?></strong></p></div>
		
															   <div class="card-img-overlay"><p class="img-overlay2 text-danger"><?= $row->short_desc ?></p></div>
		
															   <div class="card-img-overlay"><p class="img-overlay3 deal-text"></p></div>
		
															  <div class="card-body-mall">
		
																<div class="row">
		
																	<div class="col-md-12 text-center">
		
																		<h4 class="text-danger font-weight-bold"><?=$row->currency_symbol.' '.$row->deal_amount?></h4>
																		<h6>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)</h6>
		
																		
																	</div>
		
																</div>
		
		
															  </div>
															 
		
															</div>-->
															
															<div class="deal-card mt-4 card latest-deals-card cont-deals dealcontainer" data-id="<?=$row->dm_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
																<div class="row">
																	<div class="col-md-12 col-sm-12">
																		<h5><?//$row->Sub_Category_name?> <?= $row->short_desc ?></h5>
																	</div>
																	<div class="col-md-12 col-sm-12 mt-3">
																		<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
																	</div>
																	<?php if($row->featured) {?><div class="card-img-overlay"><p class="img-overlay1 overlay-feature"><strong>Featured</strong></p></div><?php } ?>
																	<div class="col-md-12 text-center">
		
																		<h5 class="font-weight-bold  mt-4"><span class="text-danger "><?=$row->currency_symbol.' '.$row->deal_amount?></span><span style="color: #111";>
																		<?php if($row->usual_price > 1) {?>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)<?php } ?></span></h5>
		
																		
																	</div>
																	<div class="col-md-12 col-sm-12">
																		<hr>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="row text-center">
																					<div class="col-md-12">
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
																					<div class="col-md-12">
																						<h5 class=""><?= $row->merchant_name ?></h5>
																						
																					</div>
																					<div class="col-md-12">
																						<p class=""><?= $row->mall_name ?></p>
																						
																					</div>
																					
																				</div>
																			</div>
																			<div class="col-md-6">
																				<p class="deal-text "></p>
																				<h6 class=""><?= $row->merchant_location ?></h6>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															
															<!--<div class="row">
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
															  </div>-->
		
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