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

	<style type="text/css">
		
		body{
		    background-image: url("<?= base_url('admin/uploads/'). $mall_info['image_name'] ?>");
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    background-size: cover;
		}

	</style>
	
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
			background: url(../../admin/main/<?=$mall_info['image_name']?>) no-repeat;
			background-position: center !important;
			background-size: cover !important;
		}
	</style>

</head>

<body>


	<nav class="navbar navbar-light bg-white">
	  	<a class="navbar-brand" href="<?= base_url() ?>">
	    <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
	    <span class="malle-logo-text"><?= $mall_info['mall_name'] ?></span>
	  </a>
	</nav>									
			
	<div class="container-fluid">	

		<div class="row malle-body" id="malle-body">

			<div class="col-md-12">

				<!--<img class="malle-logo2" id="intro" src="<?= base_url('assets/images/logo/rec.png') ?>">-->

			</div>

			<!--<div class="col-md-6" id="" style="top: 100px">

				
				

			</div>-->

		</div>
	</div>
	<div class="row mt-5  latest-deals-container" style="    background: #fff;padding: 40px;">
				<div class="col-md-3" style="position: relative;bottom: 100px;">
										<div class="col-md-12">
											<img src="<?= base_url('admin/mall_photos/'). $mall_info['main_image'] ?>" class="mer-img2">
										</div>
										<div class="col-md-12">
											<h6 class="text-danger text-center"><?= $mall_info['type_name'] ?></h6>
										</div>
										
				</div>
				<div class="col-md-4">
										<div class="col-md-12">
											<h4><?= $mall_info['mall_name'] ?></h4>
										</div>
										<div class="col-md-12">
											<p class="text-primary">
												<?=  $mall_info['business_address'] .' ,' . $mall_info['country_name'].' ,' . $mall_info['city_name'] .' ,' . $mall_info['town_name']?>
											</p>
										</div>
										<div class="col-md-12">
											<p class="text-primary">
												<?=  $mall_info['website'] ?>
											</p>
										</div>
										
										<div class="col-md-12">
											<label>Tel: </label>
											<span class="text-primary">
												<?=  $mall_info['telephone'] ?>
											</span>
										</div>
										<div class="col-md-12  social" >
											<span class="" style="  ">

												<a href="<?=$mall_info['instagram']?>" target="_blank">
												<i class="fab fa-instagram" style=" font-size: 25px;"></i>
												</a>
												<!--<a href="<?=$mall_info['twitter']?>" target="_blank">
												<i class="fab fa-twitter" style=" font-size: 25px;"></i>
												</a>-->
												<a href="<?=$mall_info['facebook']?>" target="_blank">
												<i class="fab fa-facebook-f" style=" font-size: 25px;"></i>
												</a>
											</span>
										</div>
										
										
				</div>
				<div class="col-md-2">
					<div class="col-md-12 ">
						<p class="">Opening Hours: <br><span class="text-primary"><?= $mall_info['opening_hour'] ?></span></p>
					</div>
					<div class="col-md-12 ">
						<p class="">Managed By: <br><span class="text-primary"><?= $mall_info['managed_by'] ?></span></p>
					</div>
				</div>
				<div class="col-md-3 row">
					<div class="col-md-12 ">
						<p class="">Parking Charges </p>
					</div>
					<div class="col-md-12 ">
						<p class="">Free Parking <br><span class="text-primary"><?= $mall_info['free_parking'] ?></span></p>
					</div>
					<div class="col-md-12 ">
						<p class="">Paid Parking <br><span class="text-primary"><?= $mall_info['paid_parking'] ?></span></p>
					</div>
					<div class="col-md-6 ">
						<p class="">Parking Spaces<br><span class="text-primary"><?= $mall_info['total_parking'] ?></span></p>
					</div>
					<div class="col-md-6 ">
						<p class="">Available Now<br><span class="text-primary"><?= $mall_info['available_parking'] ?></span></p>
					</div>
					
				</div>
				
		</div>
	<div class="row latest-deals-container" style="    background:#f9f5f5e6;    padding: 40px;">
			 <div class="col-md-12">
						   <h1 class="">About  <strong><?= $mall_info['mall_name'] ?></strong></h1>
						   <p class="lead section-lead"><?= $mall_info['about_us'] ?></p>
				
				</div>
				   <!-- /.row -->
	   </div>
		
		<div class="container-fluid bg-white">
		
			<div class="row latest-deals-container pt-5">

				<div class="col-md-4">
					<h4>Mall Images</h4>
					
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
							
														foreach ($mall_images as $images) {
										
													?>
													<div class="col-md-3 mt-3 mallcontainer" >
	
														<a href="#" class="t-d">
	
														<div class="card latest-deals-card" style="">
	
														  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $images->image_name?>" alt="<?=$images->image_name?>">
	
														   <!--<div class="card-img-overlay"><p class="img-overlay1"></p></div>-->
	
														  
	
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
			
		<div class="row latest-deals-container">

			<div class="col-md-2"><h3>Events</h3></div>
			<div class="col-md-2 mt-2">
				 <select class="form-control" id="sel1">
				    <option>All Malls</option> 
				    <?php foreach($malls as $mall):?>
				    	<option><?= $mall->mall_name?></option> 
				    <?php endforeach; ?>
				  </select>
			</div>
			<div class="col-md-2 mt-2 clearable">
				 <select class="form-control" id="sel1">
				    <option>All Categories</option> 
				  </select>
			</div>

				<div class="col-md-12">
					<div class="carousel slide" id="myCarousel">
					        <div class="carousel-inner">
					        	<?php 
					        	//var_dump(array_chunk($malls,4));
					        	
					        	//exit();
					        	$count = 0;
					        		foreach(array_chunk($events,4) as $event):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?> mall_item">
					                    <ul class="thumbnails">
					                       <div class="row">
						                       <?php 
						                            $start_month = '';
						                            $end_month = '';
						                       	    foreach($event as $row): 
						                       		$parts = explode('/', $row->start_date);
						                       		$parts2 = explode('/', $row->end_date);
						                       		
						                       		foreach($months as $mo): 
						                       			if($mo->month_id == $parts[1]){
						                       				$start_month = $parts[0] .' '.$mo->month;
						                       			}
						                       			if($mo->month_id == $parts2[1]){
						                       				$end_month = $parts2[0] .' '.$mo->month;
						                       			}
						                       		endforeach;	

						                       	?> 

												<div class="col-md-3 mt-3 dealcontainer" data-id="<?=$row->event_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">

													<a href="<?= base_url('Event/EventInfo/'). $row->event_id ?>" class="t-d">
 
													
														<div class="deal-card mt-4 card latest-deals-card cont-deals">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<img class="card-img-top card-img latest-deals-img" style=" background-position: center;" src="<?= base_url() ?>admin/event_photos/<?= $row->event_image?>" alt="<?=$row->event_id?>">
															</div> 
															<div class="col-md-12">	
													    		<h5 class="font-weight-bold  mt-4"><?=$row->event_name?></h5> 
													    		<small><?=$row->mall_name?></small>
													    		<br> 
													    		<small><i class="fa fa-calendar"></i> <?= $start_month ?> - <?= $end_month ?></small>
													    		<br>
													    		<small><strong>Category: <?= $row->event_cat ?></strong> </small>

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
					              </div><!-- /Slide1 --> 
					              <?php
					              $count++;
					              	endforeach;
					              ?>
					        </div>
					        
					       <?php
					       	if($count > 1){
								
					       ?>
						   <div>
								<ul class="control-box pager" id="mall_pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div>
						   <!-- /.control-box -->   
					       <?php
					       
							}
					       ?>                       
				    	</div><!-- /#myCarousel -->        

				</div><!-- /.container -->
		</div>
		<div class="row latest-deals-container">
			<div class="col-md-4"><h3>Parking Info in Malls</h3></div>

				<div class="col-md-12" style="margin-top: -20px;">
					<div class="carousel slide" id="myCarousel">
					        <div class="carousel-inner">
					        	<?php 
					        	//var_dump(array_chunk($malls,4));
					        	
					        	//exit();
					        	$count = 0;
					        		foreach(array_chunk($parkings,4) as $parking):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?> mall_item">
					                    <ul class="thumbnails">
					                       <div class="row">
						                       <?php 
						                       	    foreach($parking as $row): 
						                       	?> 

												<div class="col-md-3 mt-3 dealcontainer" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
													<a class="t-d">
													    <h5 class="font-weight-bold  mt-4"><?=$row->mall_name?></h5> 
													    <small><strong><?=$row->town_name?>, <?= $row->country_name ?></strong></small>
														<div class="deal-card mt-4 card latest-deals-card cont-deals">
															<div class="row">
																<div class="col-md-12 col-sm-12">
																	<img class="card-img-top card-img latest-deals-img" style=" background-position: center;" src="<?= base_url() ?>admin/parking_images/<?= $row->parking_image?>" alt="<?=$row->pi_id?>">
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
					              </div><!-- /Slide1 --> 
					              <?php
					              $count++;
					              	endforeach;
					              ?>
					        </div>
					        
					       <?php
					       	if($count > 1){
								
					       ?>
						   <div>
								<ul class="control-box pager" id="mall_pager">
									<li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
									<li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
									
								</ul>
							</div>
						   <!-- /.control-box -->   
					       <?php
					       
							}
					       ?>                       
				    	</div><!-- /#myCarousel -->        

				</div><!-- /.container -->

		</div>

		<!--  -->
		<div class="row latest-deals-container">
		   <div class="col-md-4">
		      <h3>Offers by Malls</h3>
		   </div>
		   <div class="col-md-12" style="margin-top: -20px;">
		      <div class="carousel slide" id="myCarousel5">
		         <div class="carousel-inner">
		            <?php
		               //var_dump(array_chunk($malls,4));
		               
		               //exit();
		               $count = 0;
		               	foreach(array_chunk($offers,4) as $offer):
		               
		               	?>
		            <div class="item <?php if($count == 0) echo'active';?> mall_item">
		               <ul class="thumbnails">
		                  <div class="row">
		                     <?php
		                        foreach($offer as $row):
		                        ?>
		                     <div class="col-md-3 mt-3 dealcontainer" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
		                        <a class="t-d">
		                           <div class="deal-card mt-4 card latest-deals-card cont-deals">
		                              <h5 class="font-weight-bold"><?=$row->offer_title?></h5>
		                              <small class="text-primary"><strong><?=$row->mall_name?></strong></small>
		                              <div class="row">
		                                 <br>
		                                 <div class="col-md-12 col-sm-12">
		                                    <img class="card-img-top card-img latest-deals-img" style=" background-position: center;" src="<?= base_url() ?>admin/offer_images/<?= $row->Image_name?>" alt="<?=$row->moi_id?>">
		                                 </div>
		                                 <br>
		                                 <div class="col-md-12">
		                        <a href="<?= base_url('Offer/OfferInfo/'). $row->offer_id ?>" class="btn btn-outline-secondary">More Info</a>
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
		            <!-- /Slide1 -->
		            <?php
		               $count++;
		               	endforeach;
		               ?>
		         </div>
		         <?php
		            if($count > 1){
		            
		            ?>
		         <div>
		            <ul class="control-box pager" id="mall_pager">
		               <li><a data-slide="prev" href="#myCarousel5" class=""><i class="fa fa-arrow-left"></i></a></li>
		               <li><a data-slide="next" href="#myCarousel5" class=""><i class="fa fa-arrow-right"></i></a></li>
		            </ul>
		         </div>
		         <!-- /.control-box -->
		         <?php
		            }
		                 ?>
		      </div>
		      <!-- /#myCarousel -->
		   </div>
		   <!-- /.container -->
		</div>
		<!-- / -->

			
		<div class="row latest-deals-container bg-white pt-5">

					<div class="col-md-4"><h3>Merchants in <span class="text-primary"><?= $mall_info['mall_name'] ?></span></h3></div>
					
					<div class="col-md-4"></div>

						<div class="col-md-12">
							<div class="carousel slide" id="myCarousel">
							        <div class="carousel-inner">
							        	<?php 
							        	//var_dump(array_chunk($malls,4));
							        	
							        	//exit();
							        	$count = 0;
							        		foreach(array_chunk($merchants,5) as $m):
							        			
							       	 	?>
							            <div class="item <?php if($count == 0) echo'active';?>">
							                    <ul class="thumbnails">
							                       <div class="row">
								                         <?php
															
																foreach($m as $mer):
																	
																
														?>
														
													
															<div class="col-md-2 mt-3 mr-4 merchantcontainer" data-id="<?=$mer->merchant_id?>" data-lat="<?=$mer->lat?>" data-long="<?=$mer->long?>">
																<a style="    color: transparent;" href="<?= base_url('Merchant/MerchantInfo/') ?><?=$mer->merchant_id?>">
																<div class="card latest-deals-card" style="">
	
																  <img class="card-img-top card-img  mer-img" src="<?= base_url() ?>admin/uploads/<?= $mer->image_name?>" alt="<?=$mer->merchant_name?>">
	
																  <div class="card-body-mall">
	
																	<div class="row">
	
																		<div class="col-md-12">
	
																			<h5><?=$mer->merchant_name?></h5>
	
																			<h6><?php if($mer->country_name) echo $mer->country_name  ?></h6>
																			<p class="text-primary"><?php if($mer->type) echo $mer->type  ?></p>
																			<p class="text-danger merchant-text" ></p>
	
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
							              </div><!-- /Slide1 --> 
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
								   <!-- /.control-box -->   
							       <?php
							       
									}
							       ?>                       
						    	</div><!-- /#myCarousel -->        

						</div><!-- /.container -->


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
		//var_export($deals);
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

						<div class="row latest-deals-container mt-5">

							<div class="col-md-12"><h3><?= $sub->Sub_Category_name ?> <span class="text-danger">Deals</span><span class="ml-5 text-primary"><a href="#">View All(<?= $countdeals ?>)</a></span></h3></div>



								<div class="col-md-12">
					<div class="carousel slide" id="myCarousel<?= $c ?>">
					        <div class="carousel-inner">
					        	<?php 
	
					        	$count = 0;
					        		foreach(array_chunk($deals,500) as $m):
					        		
					        			
					       	 	?>
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

													
													<div class="deal-card mt-4 card latest-deals-card cont-deals"">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<h5><? //$row->Sub_Category_name?> <?= $row->short_desc ?></h5>
															</div>
															<div class="col-md-12 col-sm-12 mt-3">
																<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
															</div>
															<?php if($row->featured) {?><div class="card-img-overlay"><p class="img-overlay1 overlay-feature"><strong>Featured</strong></p></div><?php } ?>
															<div class="col-md-12 text-center">

													    		<h5 class="font-weight-bold  mt-4"><span class="text-danger "><?=$row->currency_symbol.' '.$row->deal_amount?></span><span style="color: #111";>
													    		<?php if($row->usual_price > 1) {?>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)<?php }?></span></h5>

													    		
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
																		<p class="deal-text"></p>
																		<h6 class=""><?= $row->merchant_location ?></h6>
																	</div>
																</div>
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
					       	if($countdeals > 5){
								
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
				    	</div><!-- /#myCarousel -->        

				</div><!-- /.container -->



						</div>


					<?php
					$c = $c +1;
					}
				}
		 ?>



</div>

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