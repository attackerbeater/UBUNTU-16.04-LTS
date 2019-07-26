<?php header('Access-Control-Allow-Origin: *'); ?>
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
      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>
      <script>
			if (navigator.geolocation) {
			    navigator.geolocation.watchPosition(function(position) {
			        var x_lat = position.coords.latitude;
			        var x_long = position.coords.longitude;
			        var res;

			        $(".mallcontainer").each(function() {
			            //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
			            var id = $(this).attr("data-id");
			            var return_result = '';
			            var _lat = $(this).attr("data-lat");
			            var _long = $(this).attr("data-long");

			            var origin1 = {
			                lat: parseFloat(x_lat),
			                lng: parseFloat(x_long)
			            };
			            var destinationB = {
			                lat: parseFloat(_lat),
			                lng: parseFloat(_long)
			            };
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
			                    if (response.rows[0].elements[0].status == "ZERO_RESULTS")
			                        return_result = "Distance not available with your location!"
			                    else
			                        return_result = response.rows[0].elements[0].distance.text;


			                    $(".mallcontainer[data-id=" + id + "]  .mall-text").html(return_result);

			                }
			            });


			        });

							$(".promotioncontainer").each(function() {
			            //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
			            var id = $(this).attr("data-id");
			            var return_result = '';
			            var _lat = $(this).attr("data-lat");
			            var _long = $(this).attr("data-long");

			            var origin1 = {
			                lat: parseFloat(x_lat),
			                lng: parseFloat(x_long)
			            };
			            var destinationB = {
			                lat: parseFloat(_lat),
			                lng: parseFloat(_long)
			            };
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
			                    if (response.rows[0].elements[0].status == "ZERO_RESULTS")
			                        return_result = "Distance not available with your location!"
			                    else
			                        return_result = response.rows[0].elements[0].distance.text;

			                    $(".promotioncontainer[data-id=" + id + "] .merchant-text").html(return_result);

			                }
			            });
			        });

			        $(".merchantcontainer").each(function() {
			            //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
			            var id = $(this).attr("data-id");
			            var return_result = '';
			            var _lat = $(this).attr("data-lat");
			            var _long = $(this).attr("data-long");

			            var origin1 = {
			                lat: parseFloat(x_lat),
			                lng: parseFloat(x_long)
			            };
			            var destinationB = {
			                lat: parseFloat(_lat),
			                lng: parseFloat(_long)
			            };
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
			                    if (response.rows[0].elements[0].status == "ZERO_RESULTS")
			                        return_result = "Distance not available with your location!"
			                    else
			                        return_result = response.rows[0].elements[0].distance.text;

			                    $(".merchantcontainer[data-id=" + id + "] .merchant-text").html(return_result);

			                }
			            });


			        });

			        $(".dealcontainer").each(function() {
			            console.log($(this).attr("data-id"), $(this).attr("data-lat"), $(this).attr("data-long"));
			            var id = $(this).attr("data-id");
			            var return_result = '';
			            var _lat = $(this).attr("data-lat");
			            var _long = $(this).attr("data-long");

			            var origin1 = {
			                lat: parseFloat(x_lat),
			                lng: parseFloat(x_long)
			            };
			            var destinationB = {
			                lat: parseFloat(_lat),
			                lng: parseFloat(_long)
			            };
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
			                    if (response.rows[0].elements[0].status == "ZERO_RESULTS")
			                        return_result = "Distance not available with your location!"
			                    else
			                        return_result = response.rows[0].elements[0].distance.text;


			                    $(".dealcontainer[data-id=" + id + "] .deal-text").html(return_result);

			                }
			            });


			        });

			    }, function() {
			        alert("No Location found");
			    });
			} else {

			    alert("No Location found");
			}
		  </script>
      <style>
         .lighten-3{
         background-color: #b53f30;
         color: #ffffff;
         border: 1px solid #b53f30
         }
         /* Clearable text inputs */
         .clearable{
         position: relative;
         display: inline-block;
         }
         .clearable input[type=text]{
         padding-right: 24px;
         box-sizing: border-box;
         }
         .clearable__clear{
         display: none;
         position: absolute;
         right: 45px;
         top: 3px;
         padding: 0 8px;
         font-style: normal;
         font-size: 1.2em;
         user-select: none;
         cursor: pointer;
         }
         .clearable input::-ms-clear {  /* Remove IE default X */
         display: none;
         }
      </style>
   </head>
   <body>
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
      <div class="container-fluid">
         <div class="row malle-body" id="malle-body">
            <div class="col-md-12">
               <!--<img class="malle-logo2" id="intro" src="<?= base_url('assets/images/logo/rec.png') ?>">-->
            </div>
            <div class="col-md-6" id="intro2" style="    background: #77707094;">
               <h2 style="margin-top: 20px;"> Are you going to a mall? Looking for ....</h2>
               <p>
                  <label style="   color: #e4d934;  border-right: 3px solid #fff;   padding:0px 15px;">DEALS</label>
                  <label style="   color: #e4d934;  border-right: 3px solid #fff;   padding:0px 15px;">DISCOUNTS</label>
                  <label style="   color: #e4d934;  border-right: 3px solid #fff;   padding:0px 15px;">SALES</label>
                  <label style="   color: #e4d934;   padding:0px 15px;">PROMOTIONS</label>
               </p>
            </div>
         </div>
         <!--<div class="row malle-features-container">
            <div class="row malle-features">

            	<div class="col-md-4 mt-5" id="malls">

            		<div class="card card1" style="width: 18rem;">

            		  	<img class="card-img-top malle-pic" src="<?= base_url('assets/images/src/malls.jpg') ?>" alt="Merchants">

            		 	<div class="card-body malle-card">

            		    	<h5 class="card-title">Malls</h5>

            		    	<p class="card-text">Nearby a Mall or going to a Mall find various malls around you.</p>

            		  </div>

            		  <div class="card-footer footer1">

            		  	<a href="#" ><button class="btn-gray">View (10 Malls)</button></a>

            		  </div>

            		</div>

            	</div>

            	<div class="col-md-4 mt-5" id="merchant">

            		<div class="card card2" style="width: 18rem;">

            		  	<img class="card-img-top malle-pic" src="<?= base_url('assets/images/src/merchant.jpg') ?>" alt="Merchants">

            		 	<div class="card-body malle-card">

            		    	<h5 class="card-title">Merchants</h5>

            		    	<p class="card-text">Looking for a specific Merchant or a Brand ..Look no further as we have your favorite merchants onboard.</p>

            		    </div>

            		  <div class="card-footer footer2">

            		  	<a href="#"><button class="btn-gray">View 15 Merchants</button></a>

            		  </div>

            		</div>

            	</div>

            	<div class="col-md-4 mt-5" id="deals">

            		<div class="card card3" style="width: 18rem;">

            		  	<img class="card-img-top malle-pic" src="<?= base_url('assets/images/src/deals.jpg') ?>" alt="Merchants">

            		 	<div class="card-body malle-card">

            		    	<h5 class="card-title">Deals</h5>

            		    	<p class="card-text">Awesome Deals, Massive Sales, whether they are Coupons or Discounts.</p>

            		    	 </div>

            		  <div class="card-footer footer3">

            		  	<a href="#"><button class="btn-gray">View 75 Deals</button></a>

            		  </div>

            		</div>

            	</div>

            </div>

            </div>-->
         <section class="clearfix row" style="    background: rgba(227, 227, 227, 0.32);    padding: 40px 0px 40px 0;">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="">Welcome to <strong>Mall-e</strong></h1>
                     <p class="lead section-lead">Are you Nearby or going to a Mall .?  Are you looking for Deals , Discounts , Promotions at the Mall .?  Usually you get to know these only when you are inside the mall and walk pass various merchants . </p>
                     <p class="lead section-lead">Mall-e now can provide you with instant info at your fingertips on various offers given by Merchants at the Mall, Mega Malls, Shopping Centers & Shopping Plaza.</p>
                  </div>
               </div>
               <!-- /.row -->
            </div>
         </section>
         <div class="row latest-deals-container mt-5">
            <div class="col-md-2">
               <h3>Malls</h3>
            </div>
            <!--  $count_malls -->
            <div class="col-md-2 mt-2">
               <a href="<?= base_url('Mall') ?>" class="text-primary">
                  <h5>View All(<?=count($malls)?>)</h5>
               </a>
            </div>
            <div class="col-md-3 mt-1 clearable">
               <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 red-border" type="search" id="search_mall" placeholder="Search" aria-label="Search">
                  <i class="clearable__clear" id="clearable__clear">&times;</i>
                  <div class="input-group-append">
                     <span class="input-group-text red lighten-3" ><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="carousel slide" id="myCarousel">
                  <div class="carousel-inner">
                     <?php
                        //var_dump(array_chunk($malls,4));

                     	// echo '<pre>';
                     	// print_r(array_chunk($malls,4));
                      //   exit();
                        $count = 0;
                    	foreach(array_chunk($malls,4) as $m):

                    	?>
		                     <div  class="item <?php if($count == 0) echo'active';?> mall_item">
		                        <ul class="thumbnails" >
		                           <div class="row">
		                              <?php
		                                 foreach($m as $row):


		                                 ?>
		                              <div class="col-md-3 mt-3 mallcontainer"  data-name="<?=$row->mall_name?>" data-id="<?=$row->mall_id?>" data-lat="<?=$row->lat?>" data-long="<?=$row->long?>" >
		                                 <a href="<?= base_url('Mall/MallInfo/') . $row->mall_id ?>" class="t-d">
		                                    <div class="card latest-deals-card" style="">
		                                       <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->mall_name?>">
		                                       <div class="card-img-overlay">
		                                          <p class="img-overlay1"><strong><?= $row->type_name ?></strong></p>
		                                       </div>
		                                       <div class="card-body-mall">
		                                          <div class="row">
		                                             <div class="col-md-12 distance_cls">
		                                                <h5><?=$row->mall_name?></h5>
		                                                <p><?php if($row->town_name) echo $row->town_name . ', ' ?> <?php if($row->city_name) echo $row->city_name .', '; ?> <?php if($row->country_name) echo $row->country_name ; ?></p>
		                                                <p class="text-danger  mall-text" id="distance"></p>
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
		                     <!-- /Slide1 -->
                     <?php
                        $count++;
                        endforeach;
                        ?>
                  </div>
                  <?php
                     if($count > 1){

                     ?>
                  <div id="events-section">
                     <ul class="control-box pager" id="mall_pager">
                        <li><a data-slide="prev" href="#myCarousel" class=""><i class="fa fa-arrow-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel" class=""><i class="fa fa-arrow-right"></i></a></li>
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
         <div class="row latest-deals-container">
            <div class="col-md-2">
               <h3>Events</h3>

               <?php //echo count($events); ?>
            </div>
            <div class="col-md-2 mt-2">
               <a href="<?= base_url('Event') ?>" class="text-primary">
                  <h5>View All(<?= $count_events ?>)</h5>
               </a>
            </div>
          <!--   <div class="col-md-3 mt-1 clearable">
               <select class="form-control" id="sel1">
                  <option>All Malls</option>
                  <?php foreach($events_per_malls as $ekey => $evalue):?>
                  <?php echo '<option>'.$evalue->mall_name.'</option>'; ?>
                  <?php endforeach; ?>
               </select>
            </div> -->
            <!-- <div class="col-md-2 mt-2 clearable">
               <?php
                  $arr = array();
                  $arr2 = array();
                  foreach($events_per_malls as $eckey => $ecvalue):
                  ?>
               <?php $arr[] =  $ecvalue->event_cat; ?>
               <?php endforeach; ?>
               <select class="form-control" id="sel1">
                  <option>All Categories</option>
                  <?php $arr2 = array_unique($arr); foreach($arr2 as $ec_name):?>
                  <?php echo '<option>'.$ec_name.'</option>'; ?>
                  <?php endforeach; ?>
               </select>
            </div> -->
            <div class="col-md-12">
               <div class="carousel slide" id="myCarousel2">
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
                                 // $start_month = '';
                                 // $end_month = '';
                                 foreach($event as $row):	                                
                                 
                                	$start_month = implode('-',(explode('/',$row->start_date))); 
                               		$end_month = implode('-',(explode('/',$row->end_date)));  

		                            //     foreach($months as $mo):
		                            //      if($mo->month_id == $parts[1]){
		                            //     	 $start_month = $parts[0] .' '.$mo->month;
		                            //      }
		                            //      if($mo->month_id == $parts2[1]){
		                            // 	     $end_month = $parts2[0] .' '.$mo->month;
			                        //   }
		                            // endforeach;

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
                                             <small><i class="fa fa-calendar"></i> 
                                             <?= date('d M',strtotime($start_month)) ?> - <?= date('d M',strtotime($end_month)) ?></small>
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
                        <li><a data-slide="prev" href="#myCarousel2" class=""><i class="fa fa-arrow-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel2" class=""><i class="fa fa-arrow-right"></i></a></li>
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
         <div class="row latest-deals-container" style="margin-top: -20px;">
            <div class="col-md-4">
               <h3>Parking Info in Malls</h3>
            </div>
            
            <div class="col-md-12" style="margin-top: -20px;">
               <div class="carousel slide" id="myCarousel3">
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
                        <li><a data-slide="prev" href="#myCarousel3" class=""><i class="fa fa-arrow-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel3" class=""><i class="fa fa-arrow-right"></i></a></li>
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
         <div class="row latest-deals-container">
            <div class="col-md-4">
               <h3>Offers by Malls</h3>
            </div>
            <div class="col-md-2 mt-2">
               <a href="<?= base_url('Offer') ?>" class="text-primary">
                  <h5>View All(<?=count($offers)?>)</h5>
               </a>
            </div>
            <div class="col-md-12" style="margin-top: -20px;">
               <div class="carousel slide" id="myCarousel4">
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
                  <div id="promotions-section">
                     <ul class="control-box pager" id="mall_pager">
                        <li><a data-slide="prev" href="#myCarousel4" class=""><i class="fa fa-arrow-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel4" class=""><i class="fa fa-arrow-right"></i></a></li>
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
         <!-- Promotions by Merchant -->
         <div class="row latest-deals-container">
            <div class="col-md-4">
               <h3>Promotions by Merchants</h3>
            </div>
            <!-- $count_promotions -->
            <div class="col-md-2 mt-2">
               <a href="<?= base_url('Promotion') ?>" class="text-primary">
                  <h5>View All(<?=$count_promotions?>)</h5>
               </a>
            </div>
            <div class="col-md-3 mt-1">
               <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 red-border" type="text" id="search_promotion_merchant" placeholder="Merchant" aria-label="Search">
                  <i class="clearable__clear" id="clearable__clear_promotion_merch">&times;</i>
                  <div class="input-group-append">
                     <span class="input-group-text red lighten-3" ><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
                  </div>
               </div>
            </div>
            <div class="col-md-3 mt-1">
               <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 red-border" type="text" id="search_promotion_category" placeholder="Promotion Category" aria-label="Search">
                  <i class="clearable__clear" id="clearable__clear_promotion_category">&times;</i>
                  <div class="input-group-append">
                     <span class="input-group-text red lighten-3" ><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="carousel slide" id="myCarousel5">
                  <div class="carousel-inner">
                     <?php                    
                        $count = 0;
                    	foreach(array_chunk($promo_m,4) as $promo):
                    	?>
		                     <div class="item <?php if($count == 0) echo'active';?> mall_item">
		                        <ul class="thumbnails">
		                           <div class="row">
		                              <?php
		                                 $start_month = '';
		                                 $end_month = '';
		                                 foreach($promo as $key => $row):
		                                 ?>
											<div class="col-md-3 mt-3 promotioncontainer" data-name="<?=$row->merchant_name?>" data-id="<?=$row->promo_id?>" data-lat="" data-long="">
											 <a href="<?= base_url('Promotion/Info/'). $row->promo_id ?>" class="t-d">
											    <div class="deal-card mt-4 card latest-deals-card cont-deals">
											       <div class="col-md-12">
											          <h5 class="font-weight-bold  mt-4"><?=$row->promo_name?></h5>
											          <hr>
											       </div>
											       <div class="row">
											          <div class="col-md-12 col-sm-12">
											             <div class="card-img-overlay">											        	
											             <p class="img-overlay1 overlay-feature"><strong><?=$row->tag_name?></strong></p> 
											             </div>
											             <img class="card-img-top card-img latest-deals-img" style=" background-position: center;" src="<?= base_url() ?>admin/promos/<?= $row->image_name ?>" alt="<?=$row->po_id?>">
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
											                   <img class="card-img-top card-img" style=" background-position: center;" src="https://admin.mall-e.net/uploads/<?= $row->image ?>" alt="<?=$row->merchant_name?>">
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
                     <!-- /Slide1 -->
                     <?php
                        $count++;
                        endforeach;
                        ?>


                        <!-- 2 -->
                        

                  </div>
                  <?php
                     if($count > 1){

                     ?>
                  <div>
                     <ul class="control-box pager" id="promotion_pager">
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
         <!-- Merchants -->
         <div class="row latest-deals-container ">
            <div class="col-md-2">
               <h3>Merchants</h3>
            </div>
            <!-- $merchant_count -->
            <div class="col-md-2 mt-2">
               <a href="<?= base_url('Merchant') ?>" class="text-primary">
                  <h5>View All(<?=count($merchants)?>)</h5>
               </a>
            </div>
            <div class="col-md-3 mt-1">
               <div class="input-group md-form form-sm form-2 pl-0">
                  <input class="form-control my-0 py-1 red-border" type="text" id="search_merchant" placeholder="Search" aria-label="Search">
                  <i class="clearable__clear" id="clearable__clear_merch">&times;</i>
                  <div class="input-group-append">
                     <span class="input-group-text red lighten-3" ><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="carousel slide" id="myCarousel6">
                  <div class="carousel-inner">
                     <?php
                        //var_dump(array_chunk($malls,4));

                        //exit();
                        $count = 0;
                        	foreach(array_chunk($merchants,5) as $m):

                        	?>
                     <div class="item <?php if($count == 0) echo'active';?> merchant_item">
                        <ul class="thumbnails">
                           <div class="row">
                              <?php
                                 foreach($m as $mer):


                                 ?>
                              <div class="col-md-2 mt-3 mr-4 merchantcontainer" data-name="<?=$mer->merchant_name?>" data-id="<?=$mer->merchant_id?>" data-lat="" data-long="">
                                 <a href="<?= base_url('Merchant/MerchantInfo/') . $mer->merchant_id ?>" class="t-d">
                                    <div class="card latest-deals-card" style="">
                                       <img class="card-img-top card-img  mer-img" src="<?= base_url() ?>admin/uploads/<?= $mer->image_name?>" alt="<?=$mer->merchant_name?>">
                                       <div class="card-body-mall">
                                          <div class="row">
                                             <div class="col-md-12 distance_cls">
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
                     <ul class="control-box pager"  id="merchant_pager">
                        <li><a data-slide="prev" href="#myCarousel6" class=""><i class="fa fa-arrow-left"></i></a></li>
                        <li><a data-slide="next" href="#myCarousel6" class=""><i class="fa fa-arrow-right"></i></a></li>
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
            <div class="col-md-12">
               <h3><?= $sub->Sub_Category_name ?> <span class="text-danger">Deals</span><span class="ml-5 text-primary"><a href="#">View All(<?= $countdeals ?>)</a></span></h3>
            </div>
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

                                 	if ($row->Sub_Category_name == $sub->Sub_Category_name) {
                                 		//echo $row->Sub_Category_name;
                                 		if($count < 4){

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
                                    <div class="deal-card mt-4 card latest-deals-card cont-deals">
                                       <div class="row">
                                          <div class="col-md-12 col-sm-12">
                                             <h5><? //$row->Sub_Category_name?> <?= $row->short_desc ?></h5>
                                          </div>
                                          <div class="col-md-12 col-sm-12 mt-3">
                                             <img class="card-img-top card-img latest-deals-img" src="<?= base_url() ?>admin/uploads/<?= $row->image_name?>" alt="<?=$row->deal_id?>">
                                          </div>
                                          <?php if($row->featured) {?>
                                          <div class="card-img-overlay">
                                             <p class="img-overlay1 overlay-feature"><strong>Featured</strong></p>
                                          </div>
                                          <?php } ?>
                                          <div class="col-md-12 text-center">
                                             <h5 class="font-weight-bold  mt-4"><span class="text-danger "><?=$row->currency_symbol.' '.$row->deal_amount?></span><span style="color: #111";>
                                                <?php if($row->usual_price > 1) {?>( UP : <?= $row->currency_symbol.' '.$row->usual_price ?>) <?php }?></span>
                                             </h5>
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
                                 $count++;
                                 }
                                 ?>
                              <?php
                                 }
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
               </div>
               <!-- /#myCarousel -->
            </div>
            <!-- /.container -->
         </div>
         <?php
            $c = $c +1;
            }
            }
            ?>
         <div class="row app-download">
            <div class="col-md-6">
               <img class="phone pull-right" src="<?= base_url('assets/images/src/IPhone_X.png') ?>">
            </div>
            <div class="col-md-6 pl-4 phone-s">
               <h4 class="pt-5 mt-4">Have you got the app?</h4>
               <p>Get yours now - available on the iOS and Android app stores!</p>
               <a href="#"><img class="dlink" src="<?= base_url('assets/images/src/ios.png') ?>"></a>
               <a href="#"><img class="dlink" src="<?= base_url('assets/images/src/andoird.png') ?>"></a>
               <br>
               <a href="#"><i class="fab fa-facebook-f  social1 mt-3"></i></a>
               <a href="#"><i class="fab fa-twitter social2"></i></a>
               <a href="#"><i class="fab fa-instagram social3"></i></a>
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
         </footer>
      </div>
   </body>
   <script>
      var base_url = '<?=base_url()?>';
   </script>
   <script>
	 $(document).ready(function() {
		    $('.malle-country').change(function(e) {
		        location.replace(base_url + '?country=' + this.value);
		    });
		    $("#search_mall").keyup(function() {
		        $("#clearable__clear").show();
		        $("#mall_pager").hide();

		        $(".mallcontainer").each(function() {
		            //console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
		            var name = $(this).attr("data-name");
		            name = name.toLowerCase();
		            var search = $('#search_mall').val();
		            search = '*' + search + '*';
		            search = search.toLowerCase();

		            if (matchRuleShort(name, search)) {
		                $('.mall_item').addClass('active');

		                $(this).show();
		            } else {
		                $(this).hide();
		            }
		        });
		    });

				$("#search_promotion_merchant").keyup(function() {
					$("#clearable__clear_promotion_merch").show();
					$("#promotion_pager").hide();

					$(".promotioncontainer").each(function() {
							console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
							var name = $(this).attr("data-name");
							name = name.toLowerCase();
							var search = $('#search_promotion_merchant').val();
							search = '*' + search + '*';
							search = search.toLowerCase();

							if (matchRuleShort(name, search)) {
									$(this).show();
									$('.mall_item').addClass('active');
							} else {
									$(this).hide();
							}
					});
				});

				$("#search_promotion_category").keyup(function() {
					$("#clearable__clear_promotion_merch").show();
					$("#promotion_pager").hide();

					$(".promotioncontainer").each(function() {
							// console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
							var name = $(this).attr("data-name");
							name = name.toLowerCase();
							var search = $('#search_promotion_category').val();
							search = '*' + search + '*';
							search = search.toLowerCase();

							if (matchRuleShort(name, search)) {
									$(this).show();
									$('.mall_item').addClass('active');
							} else {
									$(this).hide();
							}
					});
				});

		    $("#search_merchant").keyup(function() {
		        $("#clearable__clear_merch").show();
		        $("#merchant_pager").hide();

		        $(".merchantcontainer").each(function() {
		            console.log($(this).attr("data-id"),$(this).attr("data-lat"),$(this).attr("data-long"));
		            var name = $(this).attr("data-name");
		            name = name.toLowerCase();
		            var search = $('#search_merchant').val();
		            search = '*' + search + '*';
		            search = search.toLowerCase();

		            if (matchRuleShort(name, search)) {
		                $(this).show();
		                $('.merchant_item').addClass('active');
		            } else {
		                $(this).hide();
		            }
		        });
		    });

		    $("#clearable__clear").click(function() {
		        $("#search_mall").val('');
		        $("#search_mall").keyup();
		    });
		    $("#clearable__clear_merch").click(function() {
		        $("#search_merchant").val('');
		        $("#search_merchant").keyup();
		    });
				$("#clearable__clear_promotion_merch").click(function() {
					 $("#search_promotion_merchant").val('');
					 $("#search_promotion_merchant").keyup();
			 	});
				$("#clearable__clear_promotion_category").click(function() {
					 $("#search_promotion_category").val('');
					 $("#search_promotion_category").keyup();
				});

		});

		function matchRuleShort(str, rule) {
		  return new RegExp("^" + rule.split("*").join(".*") + "$").test(str);
		}


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
