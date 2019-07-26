<style>
	.btn-default{
		color: #fff;
		background-color: #ccc;
		border-color: #ccc; 
	}
	.active{
		background-color: #007bff !important;
		border-color: #007bff !important;
	}
	.pic {
		width: 100%;
		height: 100%;
	}
</style>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Info</div>
							<div class="card-body">
								<form  method="post" action="" id="mallupdateform" autocomplete="off">
									<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="hidden" name="mall_id_main" id="mall_id_main" value="<?= $mall['mall_id'] ?>">
													<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mallname" placeholder="Mall Name" id="mallname" class="form-control col-md-12" value="<?= $mall['mall_name'] ?>">	
												</div>
											</div>
											<div class="col-md-3">

												<label class="mb-2 font-12">Mall Type</label><br>
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-mt" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $mall['type_name'] ?></button>
												  <div class="dropdown-menu mt-drop" aria-labelledby="countryoption">
												   <?php 
																foreach ($malltypes as $malltype) {
																	?>
																	<a class="dropdown-item" href="#" data="<?= $malltype->mt_id ?>"><?= $malltype->type_name ?></a>

															<?php
																}
															 ?>
												  </div>
												</div> 
												<input type="hidden" name="mt_id" id="mt_id" value="<?= $mall['mt_id'] ?>">
											</div>
											<div class="col-md-3">
												<button type="submit" class="btn btn-primary col-md-6 mt-4" id="btnUpdateMall">Edit</button>
											</div>

									</div>
									<div class="row">

										<div class="col-md-3">
											<label class="mb-2 font-12">Country</label><br>
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-ct" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $mall['country_name'] ?></button>
												  <div class="dropdown-menu ct-drop" aria-labelledby="countryoption">
												  <?php 
															foreach ($countries as $country) {
																?>
																<a class="dropdown-item" href="#" data="<?= $country->country_id ?>"><?= $country->country_name ?></a>

														<?php
															}
														 ?>
												  </div>
												</div> 
												<input type="hidden" name="country_id" id="country_id" value="<?= $mall['country_id'] ?>">
										</div>

										<div class="col-md-3">
											<label class="mb-2 font-12">City</label><br>
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $mall['city_name'] ?></button>
												  <div class="dropdown-menu city-drop" aria-labelledby="countryoption" id="citybycountry">
												 
												  </div>
												</div> 
												<input type="hidden" name="city_id" id="city_id" value="<?= $mall['city_id'] ?>">
										</div>

										<div class="col-md-3">
											<label class="mb-2 font-12">Town</label><br>
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-town" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $mall['town_name'] ?></button>
												  <div class="dropdown-menu town-drop" aria-labelledby="countryoption" id="townbycity">
												  
												  </div>
												</div> 
												<input type="hidden" name="town_id" id="town_id" value="<?= $mall['town_id'] ?>">
										</div>
										
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group">
												<label class="mb-2 font-12">Address</label><br>
												<textarea rows="4" class="form-control" name="address"><?= $mall['business_address'] ?></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">Postal Code</label><br>
													<input type="text" name="postalcode" class="form-control" placeholder="Postal Code" value="<?= $mall['postal_code']?>">

												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">Telephone #</label><br>
													<input type="text" name="telephone" class="form-control" placeholder="Telephone" value="<?= $mall['telephone'] ?>">

												</div>
											</div>
										</div>
											<div class="col-md-3">
											<label class="mb-2 font-12">Featured</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">

													<?php 

													$isActive = '';
													$isNotActive = '';

													if ($mall['featured'] == 'Y') {
														$isActive = 'active';
													}else{
														$isNotActive = 'active';
													}


													 ?>
													  <label class="btn btn-default <?= $isActive ?>"  id="yes_mall_featured">
													    <input type="radio" name="options_mall_featured" autocomplete="off" > Yes
													  </label>
													  <label class="btn btn-default <?= $isNotActive ?>" id="no_mall_featured">
													    <input type="radio" name="options_mall_featured"  autocomplete="off" > No
													  </label>
													  
													</div>
													<input type="hidden" name="mall_featured" id="mall_featured" value="<?= $mall['featured'] ?>">
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group">
												<label class="mb-2 font-12">Website</label><br>
												<input type="text" name="website" class="form-control" placeholder="Website" value="<?= $mall['website'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Facebook</label>
												<input type="text" name="facebook" id="facebook" placeholder="Facebook" class="form-control" value="<?= $mall['facebook'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Instagram</label>
												<input type="text" name="instagram" id="instagram" placeholder="Instagram" class="form-control" value="<?= $mall['instagram'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Twitter</label>
												<input type="text" name="twitter" id="twitter" placeholder="Twitter" class="form-control" value="<?= $mall['twitter'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">YouTube</label>
												<input type="text" name="youtube" id="youtube" placeholder="YouTube" class="form-control" value="<?= $mall['youtube'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Mall Managed By</label><br>
												<input type="text" name="manage" class="form-control" placeholder="Mall Managed By" value="<?= $mall['managed_by'] ?>">
											</div>
											<div class="form-group">
													<label class="mb-2 font-12">About Us</label>
													<textarea type="text" name="about_us" id="about_us" placeholder="About Us" class="form-control" rows="5"><?= $mall['about_us'] ?></textarea>
												</div>	
										</div>
										<div class="col-md-3">
											<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">Latitude</label><br>
													<input type="text" name="lat" class="form-control" placeholder="Latitude" value="<?= $mall['lat']?>">

												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">Longitude</label><br>
													<input type="text" name="long" class="form-control" placeholder="Longitude" value="<?= $mall['long'] ?>">

												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">Opening Hours</label>
													<textarea type="text" name="opening_hour" id="opening_hour" placeholder="Opening Hours" class="form-control" rows="3"><?= $mall['opening_hour'] ?></textarea>
												</div>
											
											</div>
											<!--<div class="col-md-12">
												<div class="form-group">
													<label class="mb-2 font-12">About Us</label>
													<textarea type="text" name="about_us" id="about_us" placeholder="About Us" class="form-control" rows="5"><?= $mall['about_us'] ?></textarea>
												</div>	
											</div>-->
										</div>
										<div class="col-md-3">
											<label class="mb-2 font-12">Mall Active</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">

													<?php 



													$isActive = '';
													$isNotActive = '';

													if ($mall['mall_active'] == 'Y') {
														$isActive = 'active';
													}else{
														$isNotActive = 'active';
													}


													 ?>
													  <label class="btn btn-default <?= $isActive ?>"  id="yes_mallactive">
													    <input type="radio" name="options_mallactive" id="options_mallactive" autocomplete="off" value="Y"> Yes
													  </label>
													  <label class="btn btn-default <?= $isNotActive ?>" id="no_mallactive">
													    <input type="radio" name="options_mallactive" id="options_mallactive"  autocomplete="off" value="N"> No
													  </label>
													  
													</div>
													<input type="hidden" name="mallactive" id="mallactive" value="<?= $mall['mall_active'] ?>">
										</div>
										
									</div>
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Free Parking</label>
												<textarea type="text" name="free_parking" id="free_parking" placeholder="Free Parking" class="form-control" rows="5" style="color: #096fce;"><?= $mall['free_parking'] ?></textarea>
											</div>	
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Paid Parking</label>
												<textarea type="text" name="paid_parking" id="paid_parking" placeholder="Paid Parking" class="form-control" rows="5" style="color: #096fce;"><?= $mall['paid_parking'] ?></textarea>
											</div>	
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label class="mb-2 font-12">Parking Spaces</label>
												<input type="number" name="total_parking" id="total_parking" class="form-control" value="<?= $mall['total_parking'] ?>" style="color: #096fce;">
											</div>	
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label class="mb-2 font-12">Available Now</label>
												<input type="number" name="available_parking" id="available_parking" class="form-control" value="<?= $mall['available_parking'] ?>" style="color: #ce0909;">
											</div>	
										</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>

				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Parking Details</div>
							<div class="card-body">
								<div class="row">
									<?php
										
														for($i = 1; $i <= 3; $i++){
														if (@$image_parking[$i][0]->image_count == $i) {
									
															?>
			
			
																	<div class="col-md-2">
														
																		<img src="<?= base_url('parking_images/') . $image_parking[$i][0]->parking_image ?>" class="img-thumbnail">
																		<a href="#" id="removeimagefromparking<?= $image_parking[$i][0]->image_count ?>" data="<?= $image_parking[$i][0]->pi_id?>" class="text-danger font-12">Remove</a>
				
																	</div>

			
															<?php
			
														}
														else{
														?>
															<div class="col-md-3">
																	
			
																		<form action="<?= base_url('Mall/addImageParking/') .  $mall['mall_id'] ?>/<?=$i?>" class="dropzone" id="image<?=$i?>">
																		
																		</form>
			
			
																	</div>
														<?php
														}
														}
														?>
								</div>

							</div>
						</div>
					</div>
				</div>
				
				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Logo</div>
							<div class="card-body">
								<div class="row">
									<?php 

											if ($mall['main_image']) {
									
												?>

													<div class="col-md-4">
														
														<img src="<?= base_url('mall_photos/') . $mall['main_image']?>" class="pic ">
									 					<a href="#" id="removeimagefrommall_logo" data="<?= $mall['mall_id'] ?>" class="text-danger font-12">Remove</a>

													</div>

												<?php

											}

									 ?>

									 <?php 
	

											if ($mall['main_image'] == '') {
									
												?>


														<div class="col-md-4">
														

															<form action="<?= base_url('Mall/addMallLogo/') . $mall['mall_id'] ?>" class="dropzone" id="image2">
															
															</form>


														</div>
													

												<?php

											}

										

									 ?>
								</div>

							</div>
						</div>
					</div>
				</div>
				
				
				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Images</div>
							<div class="card-body">
								<div class="row">
									<?php 

										$delnum = 1;

										foreach ($mall_images as $mall_image) {
											

											if ($mall_image->image_name) {
									
												?>

													<div class="col-md-4">
														
														<img src="<?= base_url('uploads/') . $mall_image->image_name ?>" class="pic ">
									 					<a href="#" id="removeimagefrommall<?= $delnum ?>" data="<?= $mall_image->mall_image_id ?>" class="text-danger font-12">Remove</a>

													</div>

												<?php

											}

											$delnum = $delnum + 1;

										}

									 ?>

									 <?php 

										$delnums = 1;

										foreach ($mall_images as $mall_image) {
											

											if ($mall_image->image_name == '') {
									
												?>


														<div class="col-md-4">
														

															<form action="<?= base_url('Mall/addImageToMall/') . $mall_image->mall_image_id ?>" class="dropzone" id="image1">
															
															</form>


														</div>
													

												<?php

											}

											$delnums = $delnums + 1;

										}

									 ?>
								</div>

							</div>
						</div>
					</div>
				</div>
				<!--
				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Events</div>
							<div class="card-body">
								<div class="row">
									
												
									 

														<?php
														//var_export($image_count);
														//echo $image_count[1][0]->image_count ;
														for($i = 1; $i <= 5; $i++){
														if (@$image_count[$i][0]->image_count == $i) {
									
															?>
			
			
																	<div class="col-md-2">
														
																		<img src="<?= base_url('events/') . $image_count[$i][0]->image_name ?>" class="pic ">
																		<a href="#" id="removeimagefromevent<?= $image_count[$i][0]->image_count ?>" data="<?= $image_count[$i][0]->mallevent_image_id?>" class="text-danger font-12">Remove</a>
				
																	</div>

			
															<?php
			
														}
														else{
														?>
															<div class="col-md-2">
																	
			
																		<form action="<?= base_url('Mall/addImageEvent/') .  $mall['mall_id'] ?>/<?=$i?>" class="dropzone" id="image1<?=$i?>">
																		
																		</form>
			
			
																	</div>
														<?php
														}
														}
														?>
														
													
								</div>

							</div>
						</div>
					</div>
				</div>
				-->

					<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Events</div>
							<div class="card-body">
								<form method="post" action="" id="eventform" autocomplete="off"> 
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Event Name</label>
												<input type="text" name="event_name" placeholder="Event Name" id="event_name" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
 												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mall_name_event" value="<?= $mall['mall_name'] ?>" placeholder="Mall Name" id="mall_name_event" class="form-control" required readonly> 
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden" name="mall_id_event" id="mall_id_event" value="<?= $mall['mall_id'] ?>">
											<input type="hidden" name="user_id_event" id="user_id_event" value="<?= $this->session->userdata('user')['user_id'] ?>">
											
											<br>
											<button type="submit" class="btn btn-primary col-md-6" id="btnUpdateEvent">Update</button>
										</div> 
									</div>
									<br>
									<div class="row">
										<div class="col-md-1">
											<label class="font-12">Show   :  </label>
										</div>
										<div class="col-md-7"> 
											<div class="btn-group btn-group-toggle" data-toggle="buttons"> 
													  <label class="btn btn-default active"  id="all_tab" style="margin-right: 20px;">
													    <input type="radio" name="options" autocomplete="off" value=""> All
													  </label>
													  <label class="btn btn-default"  id="current_tab" style="margin-right: 20px;">
													    <input type="radio" name="options" autocomplete="off" value="C" > Current
													  </label>
													  <label class="btn btn-default" id="past_tab" style="margin-right: 20px;">
													    <input type="radio" name="options"  autocomplete="off" value="P"> Past
													  </label>

													   <label class="btn btn-default" id="upcoming_tab" style="margin-right: 20px;">
													    <input type="radio" name="options"  autocomplete="off" value="U"> Upcoming
													  </label> 
											</div>
													<input type="hidden" name="e_type" id="e_type" value="A">

										</div> 
									</div> 
									<br>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Event Name</th>
														<th>Mall Name</th>
														<th>Event Type</th>
														<th>Featured</th>
														<th>Created by</th> 
														<th></th>
													</tr>
												</thead>
												
												<tbody id="mallevents">



												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Offers</div>
							<div class="card-body">
								<form method="post" action="" id="offerform" autocomplete="off"> 
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Offer Title</label>
												<input type="text" name="offer_title" placeholder="Offer Title" id="offer_title" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
 												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mall_name_offer" value="<?= $mall['mall_name'] ?>" placeholder="Mall Name" id="mall_name_offer" class="form-control" required readonly> 
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden" name="mall_id_offer" id="mall_id_event" value="<?= $mall['mall_id'] ?>">
											<input type="hidden" name="user_id_offer" id="user_id_event" value="<?= $this->session->userdata('user')['user_id'] ?>">
											
											<br>
											<button type="submit" class="btn btn-primary col-md-6" id="btnUpdateOffer">Update</button>
										</div> 
									</div> 
									<br>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Offer Title</th>
														<th>Mall Name</th>
														<th>Live</th>
														<th>Featured</th>
														<th>Created by</th> 
														<th></th>
													</tr>
												</thead>
												
												<tbody id="malloffers">



												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Mall Contacts</div>
							<div class="card-body">
								<form method="post" action="" id="contactform" autocomplete="off">
									<div class="row">
										<div class="col-md-12">
											<input type="hidden" name="mall_id" value="<?= $mall['mall_id'] ?>">
											<button type="submit" class="btn btn-primary col-md-2 float-right" id="btnUpdateContact">Update</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Contact Person</label>
												<input type="text" name="contactperson" placeholder="Contact Person" id="contactperson" class="form-control" required>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Position Held</label>
												<input type="text" name="positionheld" placeholder="Position Held" id="positionheld" class="form-control" required >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Contact #</label>
												<input type="text" name="contactnumber" placeholder="Contact" id="contactnumber" class="form-control" required >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Email</label>
												<input type="email" name="emailcontact" placeholder="Email" id="emailcontact" class="form-control" required >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Contact Person</th>
														<th>Position Held</th>
														<th>Contact #</th>
														<th>Email</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody id="mallcontacts">



												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodallabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this contact?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnDeleteContact">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="modal fade" id="deleteimagemodal" tabindex="-1" role="dialog" aria-labelledby="deleteimagemodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deleteimagemodallabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this image?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeleteimage1">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		       <div class="modal fade" id="deleteimagemodal2" tabindex="-1" role="dialog" aria-labelledby="deleteimagemodallabel2" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deleteimagemodallabel2">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this image?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeleteimage2">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		       <div class="modal fade" id="deleteimagemodal3" tabindex="-1" role="dialog" aria-labelledby="deleteimagemodallabel3" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deleteimagemodallabel3">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this image?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeleteimage3">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="modal fade" id="deletemallimagemodal" tabindex="-1" role="dialog" aria-labelledby="deletemallimagemodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemallimagemodallabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this image?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletemallimage">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		       <div class="modal fade" id="deleteparkingimagemodal" tabindex="-1" role="dialog" aria-labelledby="deleteparkingimagemodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deleteparkingimagemodallabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this image?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeleteparkingimage">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="modal fade" id="deletemodalEvent" tabindex="-1" role="dialog" aria-labelledby="deletemodalEventlabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodalEventlabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this event?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="BtnDeleteEvent">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		       <div class="modal fade" id="deletemodalOffer" tabindex="-1" role="dialog" aria-labelledby="deletemodalOfferlabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodalOfferlabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this offer?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="BtnDeleteOffer">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="editmodallabel">Edit Contact</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <form id="editcontactform" autocomplete="off">
		              	<div class="form-group">
		              		<input type="hidden" name="mc_idedit" id="mc_idedit">
		              		<label class="mb-2 font-12">Contact Person</label>
		              		<input type="text" name="contactpersonedit" id="contactpersonedit" class="form-control" placeholder="Contact Person">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Position Held</label>
		              		<input type="text" name="positionheldedit" id="positionheldedit" class="form-control" placeholder="Position Held">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Contact #</label>
		              		<input type="text" name="contactnumberedit" id="contactnumberedit" class="form-control" placeholder="Contact Number">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Email</label>
		              		<input type="text" name="emailcontactedit" id="emailcontactedit" class="form-control" placeholder="Email">
		              	</div>
		              </form>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		              <button type="button" class="btn btn-primary col-md-3" id="btnEditContact">Edit</button>
		            </div>
		          </div>
		        </div>
		      </div>

		        
<!--<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDKjSG2eAAt95W9zbxp8fB8UR1SufExT4E"></script>-->

<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
<script type="text/javascript">

			Dropzone.options.image1 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	location.reload(true);
             
        		});
			  }
			};
			
			Dropzone.options.image2 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};

			Dropzone.options.image3 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};

			Dropzone.options.image4 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};

			Dropzone.options.image5 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};
			
		/*	Dropzone.options.imageparking1 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};
			Dropzone.options.imageparking2 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};
			Dropzone.options.imageparking3 = {
			  maxFiles: 1,
			  accept: function(file, done) {

			    console.log("uploaded");
			    done();

			  },
			  init: function() {
			    this.on("maxfilesexceeded", function(file){
			        toastr['error']('Upload one file only');

			    });
			    this.on("success", function(file, responseText) {
			    	//location.reload(true);
             
        		});
			  }
			};
			
*/
		
	var mallUpdateData = {};
    function init() {
        var options = {
            types: ['establishment']
        };
        var input = document.getElementById('mallname');
        var autocomplete = new google.maps.places.Autocomplete(input, options);

        autocomplete.addListener('place_changed', function () {
            var loc = autocomplete.getPlace();
            console.log(loc.geometry.location.lat());
            console.log(loc.geometry.location.lng());
            console.log(loc.description);
            mallUpdateData.lat = loc.geometry.location.lat();
            mallUpdateData.lng = loc.geometry.location.lng();
        });
    }
    google.maps.event.addDomListener(window, 'load', init);

    $(function(){	


    				displayCity();
    				displayTown();
    				displayContacts();
    				displayEvents();
    				displayOffers();

    				function displayCity(){

    					var country_id = $('#country_id').val();

    					 $.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('City/displayCitiesByCountry') ?>',
									data : {country_id:country_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<a class="dropdown-item" href="#" data="'+ data[c].city_id  +'">'+ data[c].city_name +'</a>';

											}
										}

										$('#citybycountry').html(html);
									},
									error : function(){
										// alert("Error retrieving cities.");
									}
								});
    				}

    				function displayContacts(){

    					var mall_id = $('#mall_id_main').val();


    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Contact/displayContacts') ?>',
									data : {mall_id:mall_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<tr>'+
													'<td>'+ data[c].contact_name +'</td>'+
													'<td>'+ data[c].position_held +'</td>'+
													'<td>'+ data[c].contact_number +'</td>'+
													'<td>'+ data[c].email_id +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[c].mc_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[c].mc_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#mallcontacts').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}

    				function displayTown(){
    					var city_id = $('#city_id').val();

    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Town/displayTownByCity') ?>',
									data : {city_id:city_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<a class="dropdown-item" href="#" data="'+ data[c].town_id  +'">'+ data[c].town_name +'</a>';

											}
										}

										$('#townbycity').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});
    				}

    					function displayEvents(){

    					var mall_id = $('#mall_id_main').val();
						var type = $('#e_type').val();

    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/displayEvent') ?>',
									data : {mall_id:mall_id, type:type},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												var href = '<?= base_url('Event/EditEvent/') ?>';
												var sel = 'selected';

												html += '<tr>'+
													'<td>'+ data[c].event_name +'</td>'+
													'<td>'+ data[c].mall_name +'</td>'+
														'<td><select name="type_stat" id="type_stat" class="deal-status" data="'+ data[c].event_id +'">';

														if (data[c].type == 'C') {
															html +=	'<option value="C" '+ sel +'>Current</option>'+
																	'<option value="P">Past</option>'+
																	'<option value="U">Upcoming</option>';
														}
														else if(data[c].type == 'P'){
															html +=	'<option value="C">Current</option>'+
																	'<option value="p"  '+ sel +'>Past</option>'+
																	'<option value="U">Upcoming</option>';
														}else{
															html +=	'<option value="C">Current</option>'+
																	'<option value="P">Past</option>'+
																	'<option value="U"  '+ sel +'>Upcoming</option>';
														}

													
													html += '</select></td>'+
													'<td><select name="featured_select" id="featured_select" class="deal-status" data="'+ data[c].event_id +'">';

														if (data[c].featured == 'N' || data[c].featured == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += 
													'</select></td>'+
													'<td>'+ data[c].short_name +'</td>'  
													+'<td class="text-right"><a  href="'+href+  data[c].event_id +'" data="'+ data[c].event_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data-toggle="modal" data="'+ data[c].event_id +'" class="linkDeleteEvent"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#mallevents').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}

			function displayOffers(){

    					var mall_id = $('#mall_id_main').val();

    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Offer/displayOffer') ?>',
									data : {mall_id:mall_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												var href = '<?= base_url('Offer/EditOffer/') ?>';
												var sel = 'selected';

												html += '<tr>'+
													'<td>'+ data[c].offer_title +'</td>'+
													'<td>'+ data[c].mall_name +'</td>'+
														'<td><select name="live_offer" id="live_offer" class="deal-status" data="'+ data[c].offer_id +'">';

													if (data[c].live == 'N' || data[c].live == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += '</select></td>'+
													'<td><select name="featured_offer" id="featured_offer" class="deal-status" data="'+ data[c].offer_id +'">';

														if (data[c].featured == 'N' || data[c].featured == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += 
													'</select></td>'+
													'<td>'+ data[c].short_name +'</td>'  
													+'<td class="text-right"><a  href="'+href+  data[c].offer_id +'" data="'+ data[c].offer_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data-toggle="modal" data="'+ data[c].offer_id +'" class="linkDeleteOffer"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#malloffers').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}

					$('#btnUpdateEvent').click(function(e){
					e.preventDefault();

					var data = $('#eventform').serialize();


					if ($('#event_name').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Event/processEvent') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayEvents();
								          	$('#event_name').val('');    
								          	
								            toastr['info']('Mall Event updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update mall event.');
								          }
								        });

					}else{
						toastr["error"]("Event name can't be null.");
					}

				});

					$('#mallevents').on('click','.linkDeleteEvent',function(e){
					e.preventDefault();

					var event_id = $(this).attr('data');
					$('#deletemodalEvent').modal('show');

					$('#BtnDeleteEvent').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyEvent') ?>',
									data : {event_id:event_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodalEvent').modal('hide');
											displayEvents();
											toastr['info']('Mall event deleted.');
										}
										else{
											$('#deletemodalEvent').modal('hide');
											toastr['error']("Can't delete this event.");
										}
										
									},
									error : function(){
										alert("Error deleting event.");
									}
								});
							});
				});


					$('#mallevents').on('change','#type_stat',function(){

					var event_id = $(this).attr('data');
					var type = $('#type_stat').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Event/processTypeStatus') ?>',
								          data : {event_id:event_id,type:type},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Event type updated.');
								           	displayEvents();

								          },
								          error : function(){
								            toastr['error']('Could not update event type.');
								          }
								        });

				});
				
				$('#mallevents').on('change','#featured_select',function(){

					var event_id = $(this).attr('data');
					var featured = $('#featured_select').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Event/processFeatured') ?>',
								          data : {event_id:event_id,featured:featured},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Event featured updated.');
								           	displayEvents();

								          },
								          error : function(){
								            toastr['error']('Could not update event featured.');
								          }
								        });

				});

				$('#btnUpdateOffer').click(function(e){
					e.preventDefault();

					var data = $('#offerform').serialize();


					if ($('#offer_title').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Offer/processOffer') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayOffers();
								          	$('#offer_title').val('');    
								          	
								            toastr['info']('Mall Offer updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update mall offer.');
								          }
								        });

					}else{
						toastr["error"]("Offer title can't be null.");
					}

				});

					$('#malloffers').on('click','.linkDeleteOffer',function(e){
					e.preventDefault();

					var offer_id = $(this).attr('data');
					$('#deletemodalOffer').modal('show');

					$('#BtnDeleteOffer').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Offer/destroyOffer') ?>',
									data : {offer_id:offer_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodalOffer').modal('hide');
											displayOffers();
											toastr['info']('Mall offer deleted.');
										}
										else{
											$('#deletemodalOffer').modal('hide');
											toastr['error']("Can't delete this offer.");
										}
										
									},
									error : function(){
										alert("Error deleting offer.");
									}
								});
							});
				});


				 $('#malloffers').on('change','#featured_offer',function(){

					var offer_id = $(this).attr('data');
					var featured = $('#featured_offer').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Offer/processFeatured') ?>',
								          data : {offer_id:offer_id,featured:featured},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Event featured updated.');
								           	displayEvents();

								          },
								          error : function(){
								            toastr['error']('Could not update event featured.');
								          }
								        });

				});

				  $('#malloffers').on('change','#live_offer',function(){

					var offer_id = $(this).attr('data');
					var live = $('#live_offer').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Offer/processLive') ?>',
								          data : {offer_id:offer_id,live:live},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Event featured updated.');
								           	displayEvents();

								          },
								          error : function(){
								            toastr['error']('Could not update event featured.');
								          }
								        });

				});



					$(".mt-drop").on('click','a',function(){
							 $(".btn-mt:first-child").html($(this).text()+' <span class="caret"></span>');
							 $('#mt_id').val($(this).attr('data'));
						})

					$(".ct-drop").on('click','a',function(){
							 $(".btn-ct:first-child").html($(this).text()+' <span class="caret"></span>');
							 $(".btn-city:first-child").html('Select City'+' <span class="caret"></span>');
							 $(".btn-town:first-child").html('Select Town'+' <span class="caret"></span>');
							 $('#country_id').val($(this).attr('data'));
							 $('#city_id').val('');
							 $('#town_id').val('');

							 var country_id = $(this).attr('data');

							 $.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('City/displayCitiesByCountry') ?>',
									data : {country_id:country_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<a class="dropdown-item" href="#" data="'+ data[c].city_id  +'">'+ data[c].city_name +'</a>';

											}
										}

										$('#citybycountry').html(html);
									},
									error : function(){
										// alert("Error retrieving cities.");
									}
								});

						})

					$(".city-drop").on('click','a',function(){
							 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
							 $(".btn-town:first-child").html('Select Town'+' <span class="caret"></span>');
							 $('#city_id').val($(this).attr('data'));
							 $('#town_id').val('');


							 var city_id = $(this).attr('data');


							 $.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Town/displayTownByCity') ?>',
									data : {city_id:city_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<a class="dropdown-item" href="#" data="'+ data[c].town_id  +'">'+ data[c].town_name +'</a>';

											}
										}

										$('#townbycity').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

						})

					$(".town-drop").on('click','a',function(){
							 $(".btn-town:first-child").html($(this).text()+' <span class="caret"></span>');
							 $('#town_id').val($(this).attr('data'));
						})

					$('#yes_mallactive').click(function(){
						$('#mallactive').val('Y');
						
					});

					$('#no_mallactive').click(function(){
						$('#mallactive').val('N');
					});

					$('#yes_mall_featured').click(function(){
						$('#mall_featured').val('Y');
						
						
					});

					$('#no_mall_featured').click(function(){
						$('#mall_featured').val('N');
					});
					
					$('#all_tab').click(function(){
						$('#e_type').val('A');
						displayEvents();
					});

					$('#current_tab').click(function(){
						$('#e_type').val('C');
						displayEvents();

					});

					$('#past_tab').click(function(){
						$('#e_type').val('P');
						displayEvents();

					});

					$('#upcoming_tab').click(function(){
						$('#e_type').val('U');
						displayEvents();

					});
					$("input[name='options_mallactive']").change(function(){

						var mall_active = $('#mallactive').val();
						var mall_id = $('#mall_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Mall/processMallActive') ?>',
								          data : {mall_active:mall_active,mall_id:mall_id},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Mall active updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update mall active.');
								          }
								        });
					});

					$("input[name='options_mall_featured']").change(function(){

						var featured = $('#mall_featured').val();
						var mall_id = $('#mall_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Mall/processMallFeatured') ?>',
								          data : {mall_id:mall_id,featured:featured},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Featured updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update featured.');
								          }
								        });
					});
					
 
				
				$('#removeimagefromparking1').click(function(e){
					e.preventDefault();

					var pi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageParking') ?>',
									data : {pi_id:pi_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});

					});
				});
				
				
				$('#removeimagefromparking2').click(function(e){
					e.preventDefault();

					var pi_id = $(this).attr('data');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageParking') ?>',
									data : {pi_id:pi_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});

					});
				});
				
				
				$('#removeimagefromparking3').click(function(e){
					e.preventDefault();

					var pi_id = $(this).attr('data');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageParking') ?>',
									data : {pi_id:pi_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});

					});
				});
				
			

				$('#btnUpdateMall').click(function(e){

					e.preventDefault();

					var data = $('#mallupdateform').serialize();

					if ($('#mallname').val().length > 0) {
						if ($('#city_id').val().length > 0) {
							if ($('#town_id').val().length > 0) {
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Mall/processEditMall') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Mall updated.');
								           

								          },
								          error : function(){
								            toastr['error']('Could not update mall.');
								          }
								        });
									}else{
										toastr["error"]("Town can't be null.");
									}
								}
								else{
									toastr["error"]("City can't be null.");
								}
					}else{
						toastr["error"]("Mall Name can't be null.");
					}

				});
				

				$('#btnUpdateContact').click(function(e){
					e.preventDefault();

					var data = $('#contactform').serialize();


					if ($('#contactperson').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Contact/processContact') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	$('#contactperson').val('');
								          	$('#positionheld').val('');
								          	$('#contactnumber').val('');
								          	$('#emailcontact').val('');
								          	
								            toastr['info']('Mall Contact updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update mall contact.');
								          }
								        });

					}else{
						toastr["error"]("Contact Person can't be null.");
					}

				});

				$('#mallcontacts').on('click','.btn-delete',function(e){
					e.preventDefault();

					var mc_id = $(this).attr('data');
					$('#deletemodal').modal('show');

					$('#btnDeleteContact').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Contact/destroyContact') ?>',
									data : {mc_id:mc_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayContacts();
											toastr['info']('Mall contact deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this contact.");
										}
										
									},
									error : function(){
										alert("Error deleting contact.");
									}
								});
							});
				});

					$('#mallcontacts').on('click','.btn-edit',function(e){
					e.preventDefault();

					var mc_id = $(this).attr('data');
					$('#editmodal').modal('show');

					
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Contact/getContact') ?>',
									data : {mc_id:mc_id},
									dataType : 'json',
									success : function(data){

										console.log(data);

										$('#mc_idedit').val(data.mc_id);
										$('#contactpersonedit').val(data.contact_name);
										$('#positionheldedit').val(data.position_held);
										$('#contactnumberedit').val(data.contact_number);
										$('#emailcontactedit').val(data.email_id);
										
									},
									error : function(){
										alert("Error getting contact.");
									}
								});
							

				});

					$('#btnEditContact').click(function(){
						
						var data = $('#editcontactform').serialize();


						if ($('#contactpersonedit').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Contact/processContactEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	
								          	$('#editmodal').modal('hide');

								            toastr['info']('Mall Contact edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit mall contact.');
								          }
								        });

					}else{
						toastr["error"]("Contact Person can't be null.");
					}

					}); 
			

					$('#removeimagefrommall_logo').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var mall_id = $(this).attr('data');
						$('#btndeletemallimage').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroyMallImageLogo') ?>',
									data : {mall_id:mall_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});


							

						});

					});
					


				$('#removeimagefrommall1').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var mall_image_id = $(this).attr('data');
						$('#btndeletemallimage').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroyMallImage') ?>',
									data : {mall_image_id:mall_image_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});


							

						});

					});
					$('#removeimagefrommall2').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var mall_image_id = $(this).attr('data');
						$('#btndeletemallimage').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroyMallImage') ?>',
									data : {mall_image_id:mall_image_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});


							

						});

					});


						$('#removeimagefrommall3').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var mall_image_id = $(this).attr('data');
						$('#btndeletemallimage').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroyMallImage') ?>',
									data : {mall_image_id:mall_image_id},
									dataType : 'json',
									success : function(response){
										
										toastr['info']('Image removed.');	
										location.reload(true);

									},
									error : function(){
										alert("Error deleting image.");
									}
								});


							

						});

					});


					
 
						
    });
</script>