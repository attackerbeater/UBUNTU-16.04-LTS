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


</head>

<body>


	<nav class="navbar navbar-light bg-white">
	  	<a class="navbar-brand" href="<?= base_url() ?>">
	    <img src="<?= base_url('assets/images/logo/rec.png') ?>" class="malle-logo1 ml-4 mr-3" alt="Mall-E Logo">
	    <span class="malle-logo-text"><?= $mall_info['mall_name'] ?></span>
	  </a>
	</nav>									
			
	<div class="container-fluid">	

		<div class="row">
			<div class="col-md-12 mall-pd"></div>
		</div>
	</div>
		<div class="container-fluid bg-white">
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
														
														
														<div class="col-md-2 mt-3 mr-4">

															<div class="card latest-deals-card" style="">

															  <img class="card-img-top card-img  mer-img" src="<?= base_url() ?>admin/uploads/<?= $mer->image_name?>" alt="<?=$mer->merchant_name?>">

															  <div class="card-body-mall">

															    <div class="row">

															    	<div class="col-md-12">

															    		<h5><?=$mer->merchant_name?></h5>

															    		<h6><?php if($mer->country_name) echo $mer->country_name  ?></h6>

															    	</div>

															    </div>

															  </div>

															</div>

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








					<?php 


					$c = 1;
				foreach ($subcat as $sub) {
					?>

						<div class="row latest-deals-container mt-5 bg-white">

							<div class="col-md-12"><h3><?= $sub->Sub_Category_name ?> <span class="text-danger">Deals</span></h3></div>



								<div class="col-md-12">
					<div class="carousel slide" id="myCarousel<?= $c ?>">
					        <div class="carousel-inner">
					        	<?php 
	
					        	$count = 0;
					        		foreach(array_chunk($deals,4) as $m):
					        			
					       	 	?>
					            <div class="item <?php if($count == 0) echo'active';?>">
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
					$c = $c + 1;
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