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


	<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">

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

	      <li class="nav-item ">

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

	</nav> -->

	<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm p-3 mb-5">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

		    <span class="navbar-toggler-icon"></span>

		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  	<a class="navbar-brand" href="<?= base_url() ?>">
	    <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
	    <span class="malle-logo-text"><?= $deal_info['short_desc'] ?></span>
	  </a>
	  </div>
	</nav>	

 <!-- 	<div class="container-fluid mt-5">
 		<div class="row mt-5 pt-5 shadow-sm p-3 mb-5">
			<div class="col-md-2 col-sm-3 pl-5 pr-4">
				 <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
			</div>
			<div class="col-md-10 pl-4 col-sm-9">
				 <span class="malle-logo-text"><?= $subcategory_info['Sub_Category_name'] . ' with ' . $deal_info['short_desc'] ?></span>
			</div>
		</div>
 	</div> -->
			
	<div class="container-fluid">	
		
		<div class="row">
			<div class="col-md-8 offset-md-2">
				
				<div class="row mt-3">

					<div class="col-md-6 mt-4">
						<img src="<?= base_url('admin/uploads/').$deal_info['image_name'] ?>" class="img-fluid">
					</div>
					<div class="col-md-6">
						<div class="deal-card mt-4">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<h4><?= $subcategory_info['Sub_Category_name'] ?> <span class="text-danger"> Deals</span></h4>
								</div>
								<div class="col-md-12 col-sm-12 mt-3">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<img src="<?= base_url('admin/uploads/'). $d_image['image_name'] ?>" height="80" width="80" >
										</div>
										<div class="col-md-9 col-sm-6">
											<h5 class="text-primary mt-3"><?= $deal_info['merchant_name'] ?></h5>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 mt-4">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<h5 class="text-secondary">Mall Location</h5>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<h6 class="text-primary"><?= $deal_info['mall_name'] ?></h6>
										</div>
										<div class="col-md-6 col-sm-6">
											<h6 class="text-primary"><?= $deal_info['merchant_location'] ?></h6>
										</div>
									</div>
								</div>
								<div class="col-md-12 col-sm-12 mt-5">
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="row text-center">
												<div class="col-md-12">
													<h5 class="text-danger"><?= $deal_info['currency_symbol'] .' '. $deal_info['deal_amount']?></h5>
												</div>
												<div class="col-md-12">
													<h6><?php if($deal_info['usual_price'] > 1) {?>( UP : <?= $deal_info['currency_symbol'] .' '. $deal_info['usual_price'] ?> ) <?php } ?></h6>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<button class="btn btn-danger btn-block">Pre-Redeem</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--Review-->
				<div class="row mt-5 mb-5 text-secondary">
					<div class="col-md-8">
						<h6>10 Reviews</h6>
						<hr>
					</div>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-body"><a href="">Sign in to write a review</a></div>
						  </div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">ngiau j</div>
							<div class="col-md-6"><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span></div>
						</div>
						<p>10 May, 2018</p>
						<p>私はとてもハンサムです</p>
						<hr>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">Afiq D</div>
							<div class="col-md-6"><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span></div>
						</div>
						<p>21 Apr, 2018</p>
						<p>Taste Delicious 👍</p>
						<hr>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6">Vignesh V</div>
							<div class="col-md-6"><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span><span class="fas fa-star float-right text-primary"></span></div>
						</div>
						<p>4 Apr, 2018</p>
						<p>Awesome and on time. Good food can recommend</p>
						<hr>
					</div>
				</div>

			</div>
		</div>
	</div>
	
	
	
	<div class="container-fluid bg-white mt-5">
			<?php
		//var_export($deals);
				$c = 1;
					
						if($deal_count > 0){	
					?>

						<div class="row latest-deals-container mt-5">

							<div class="col-md-12"><h3>More <?= $subcategory_info['Sub_Category_name'] ?> Deals(<?= $deal_count ?>)</h3></div>



								<div class="col-md-12">
					<div class="carousel slide" id="myCarousel<?= $c ?>">
					        <div class="carousel-inner">
					        	<?php 
	
					        	$count = 0;
					        		foreach(array_chunk($deals,500000) as $m):
					        		
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?>">
					                    <ul class="thumbnails">
					                       <div class="row">
						                    <?php
													
												foreach($m as $row){
																
												?>


												<div class="col-md-3 mt-3 dealcontainer" data-id="<?=$row->dm_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">

													<a href="<?= base_url('Deal/DealInfo/'). $row->dm_id . '/'. $subcategory_info['sub_category_id'] ?>" class="t-d">

													
													
													<div class="deal-card mt-4 card latest-deals-card cont-deals"">
														<div class="row">
															<div class="col-md-12 col-sm-12">
																<h5><? //$row->Sub_Category_name?> <?= $row->short_desc ?></h5>
															</div>
															<div class="col-md-12 col-sm-12 mt-3">
																<img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
															</div>
															<div class="col-md-12 text-center">

													    		<h5 class="font-weight-bold  mt-4"><span class="text-danger "><?=$row->currency_symbol.' '.$row->deal_amount?></span><span style="color: #111";>
													    		( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>)</span></h5>

													    		
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
					       	if($count > 5){
								
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