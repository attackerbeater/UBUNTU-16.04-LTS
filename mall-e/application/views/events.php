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



	
	<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>
	
	
	<script>
		if (navigator.geolocation) {
		          navigator.geolocation.watchPosition(function(position) {
		           
					var x_lat = position.coords.latitude;
					var x_long = position.coords.longitude;
					var res;
					 
					 
					 
					 
					$(".mallcontainer").each(function(){
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
				          	console.log(results);
				            var originList = response.originAddresses;
				            var destinationList = response.destinationAddresses;
							if(response.rows[0].elements[0].status=="ZERO_RESULTS")
							return_result = "Distance not available with your location!"
							else
				           	return_result = response.rows[0].elements[0].distance.text;
				           
				        	
					    	$(".mallcontainer[data-id="+id+"] .text-danger").html(return_result);
				            
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
	<style>
		.malle-body2 {
			background: url(../../assets/images/src/events-page.jpg) no-repeat;
			background-position: center !important;
			background-size: cover !important;
			height: 200px;
		}
	</style>
</head>

<body>

	<!--nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white	shadow-sm">

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

	      <li class="nav-item ">
			
	      	<select class="malle-country">
				<?php
					if($countries){
						
						foreach($countries as $key){
							if($key->country_id == $this->input->get('country'))
							echo '<option selected value="'.$key->country_id.'" >'.$key->country_name.'</option>';
							else
							echo '<option value="'.$key->country_id.'" >'.$key->country_name.'</option>';
						}
					}
				?>
	      		
				
	      	</select>




	      </li>

	    </ul>

	    <ul class="navbar-nav my-2 my-lg-0">
			
	    	<li class="nav-item" style="margin: 0px 20px;">
				<p  style="  margin-bottom: 0px;">Merchant</p>
	    		

	      		<a href="<?= base_url('NewMerchant') ?>"><button class="btn-orange my-2 my-sm-0 " type="submit">Open Free Account</button></a>

	    	</li>

	    	<li class="nav-item"  style="margin: 0px 20px;">

	    		<p style="  margin-bottom: 0px;">Shoppers</p>

	      		<a href="<?= base_url('Shopper') ?>"><button class="btn-red my-2 my-sm-0 " type="submit">Quick Register</button></a>

	    	</li>
			<li class="nav-item"  style="margin: 0px 20px;">
				<p  style="  margin-bottom: 0px;">&nbsp;</p>
	      		<a href="#" class="btn-blue my-2 my-sm-0" >How it works</a>

	    	</li>
			 <li class="nav-item active"  style="margin: 14px 20px;"> 

				<a class="nav-link" href="#">
	
					<i class="fas fa-bars malle-bars"></i>
	
				</a>
	
			  </li>

	    </ul>

	  </div>

	</nav>
	
	<div class="container-fluid">

		<div class="row malle-body2" id="malle-body">

			<!-- <div class="col-md-12">

				<img class="malle-logo2" id="intro" src="<?= base_url('assets/images/logo/rec.png') ?>">

			</div>

			<div class="col-md-12" id="intro2">

				<h2>Are you going to a mall?</h2>

				<p>Looking for Discounts, Coupon, Sales</p>

			</div> -->

		</div>

		<div class="row latest-deals-container mt-5">
				
			<div id="filters">  
               <style>
                             	 
                ul.filter > li {
                    float: left;
                    margin-right: 9px;
                }     

                ul.filter > li > a {
                	color: #007bff!important;
                }      

                ul.filter > li > a > h4{
                	/*text-decoration: underline;*/
                }
               </style>
               <ul class="filter">
                  	<li><a data-filter="*"><h4>All(<?= count($events) ?>) </h4></a></li>
                  	<li>
                  	    <a data-filter=".current">
              	    		<h4>| Current <?='('.count($events_current).')'?> </h4>
              	    	</a>
              	    </li> 		
              	    <li>
                  	    <a data-filter=".past">
              	    		<h4>| Past <?='('.count($events_past).')'?> </h4>
              	    	</a>
              	    </li> 
              	    <li>
                  	    <a data-filter=".upcoming">
              	    		<h4>| Upcoming <?='('.count($events_upcoming).')'?> </h4>
              	    	</a>
              	    </li> 

                  	<?php            
      //             	foreach($events_view as $etc){
      //             		$etype = $etc->type;
						// switch($etype){
						// 	case 'C':
						// 	$etype = 'Current';
						// 	break;
						// 	case 'U':
						// 	$etype = 'Upcoming';
						// 	break;
						// 	case 'P':
						// 	$etype = 'Past';
						// 	break;
						// }

						// $data_filter = '';
						// switch ($row->type) {
						// 	case 'C':
						// 		$data_filter = 'current';
						// 		break;
						// 	case 'P':
						// 		$data_filter = 'past';
						// 		break;
						// 	case 'U':
						// 		$data_filter = 'upcoming';
						// 		break;						
							
						// }

						// if($etype != 'C'){
												
						?>
						<!-- <li>
                  	    	<a data-filter=".<?=str_replace(' ', '-', strtolower($data_filter))?>">
                  	    		<h4>| <?=$data_filter .'('.$etc->type_count.')'?> </h4>
                  	    	</a>
                  	    </li> 	 -->		
                  	   
                  	<?php 
                  	// 	}
                  	// } 
                  	?>                  	    
                  
               </ul> 
            </div>   	
			<div class="col-md-12">
				<div class="grid row mt-5">				
				<?php 
				
				foreach ($events_view as $row) {
					// echo str_replace(' ', '-', strtolower($all_events->type));				
					$data_filter = '';
					switch ($row->type) {
						case 'C':
							$data_filter = 'current';
							break;
						case 'P':
							$data_filter = 'past';
							break;
						case 'U':
							$data_filter = 'upcoming';
							break;						
						
					}

					$start_month = implode('-',(explode('/',$row->start_date))); 
                    $end_month = implode('-',(explode('/',$row->end_date)));  

     //                die();

				?>


				<?php 

				// echo '<pre>';
				// print_r($events_view);


				// die();	

				// foreach($events as $row){

				// }

				?>


					 <div class="item active mall_item">
                        <ul class="thumbnails">
                           <div class="row">
                            
                               <div class="col-md-3 mt-3 mallcontainer element-item <?=$data_filter?>" data-id="<?=$row->event_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>">
                                 <a href="<?= base_url('Event/EventInfo/'). $row->event_id ?>/events-list" class="text-danger">
                                    <div class="deal-card mt-4 card latest-deals-card cont-deals">
                                       <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                             <img class="card-img-top card-img latest-deals-img" style=" background-position: center;" src="<?= base_url() ?>admin/event_photos/<?= $row->event_image?>" alt="<?=$row->event_id?>">
                                          </div>
                                          <div class="col-md-12">
                                             <h5 class="font-weight-bold  mt-4"><?=$row->event_name?></h5>
                                             <small><?=$row->mall_name?></small>
                                             <br>
                                             <small><i class="fa fa-calendar"></i> 
                                             <?= date('d M',strtotime($start_month)) ?> - <?= date('d M',strtotime($end_month)) ?></small>
                                             <br>
                                             <small><strong>Category: <?= $row->event_cat ?></strong> </small>
                                          </div>
                                       </div>
                                    </div>
                                 </a>
                              	</div>
                             
                           </div>
                        </ul>
                     </div>
					<!-- <div class="col-md-3 mt-3 mallcontainer element-item <?=$data_filter?>"  data-id="<?=$all_events->mall_id?>" data-lat="<?=$all_events->lat?>" data-long="<?=$all_events->long?>" >

						<a href="<?= base_url('Event/EventInfo/') . $all_events->mall_id ?>" class="t-d">
							<div class="card latest-deals-card">
							  <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/event_photos/<?= $all_events->event_image?>" alt="<?=$all_events->mall_name?>">
							   <div class="card-img-overlay">
							   	<p class="img-overlay1">
							   		<strong><?= $all_events->type_name ?></strong>
							   	</p>
							   	</div>

							  <div class="card-body-mall">

							    <div class="row">

							    	<div class="col-md-12 distance_cls">

							    		<h5 class="name"><?=$all_events->mall_name?></h5>

							    		<p><?php if($all_events->town_name) echo $all_events->town_name . ', ' ?> <?php if($all_events->city_name) echo $all_events->city_name .', '; ?> <?php if($all_events->country_name) echo $all_events->country_name ; ?></p>
							    		<p class="text-danger " id="distance"></p>
							    	</div>

							    </div>

							  </div>

							</div>
						</a>

					</div> -->



				<?php
					} 
				?>

				
				</div>
			</div>
		</div>
		

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

			<!-- isotope -->            
            <script type="text/javascript" src="<?= base_url('assets/js/isotope.pkgd.min.js')?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/js/mall-e-isotope.js') ?>"></script> 
            <!-- / -->

		</footer>

	</div>

</body>
<script>
	var base_url = '<?=base_url('Mall')?>';
	
	 $(document).ready(function() {
	  	 $('.malle-country').change(function(e){
		 	location.replace(base_url+'?country='+this.value);
		 });
	  });

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