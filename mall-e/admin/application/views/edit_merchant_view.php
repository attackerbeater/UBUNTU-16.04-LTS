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
							<div class="card-header-malle">Merchant Info</div>
							<div class="card-body">
								<form method="post" action="" id="editmerchantform" autocomplete="off">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="hidden" name="merchant_id_main" id="merchant_id_main" value="<?= $merchant['merchant_id'] ?>">
												<label class="mb-2 font-12">Merchant Name</label>
												<input type="text" name="merchantname" id="merchantname" placeholder="Merchant Name" class="form-control col-md-12" value="<?= $merchant['merchant_name'] ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="mb-2 font-12">Type</label>
														<input type="text" name="merchanttype" id="merchanttype" placeholder="Merchant Type" class="form-control" value="<?= $merchant['type'] ?>" list="datalist4">

														<datalist id="datalist4">



															<?php 
																	foreach ($types as $type) {
																		?>

																		<option value="<?= $type->type ?>">

															<?php
																	}

															 ?>	
													
														</datalist>

													</div>
												</div>
											</div>
											
										</div>
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary col-md-8" id="btnUpdateMerchant">Update</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Address</label>
												<textarea rows="4" class="form-control" name="merchantaddress" placeholder="Address"><?= $merchant['merchant_address'] ?></textarea>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Country</label>
												<input type="text" name="country" id="country" class="form-control" placeholder="Country" value="<?= $merchant['country_name'] ?>" list="datalist5">


												<datalist id="datalist5">



															<?php 
																	foreach ($countries as $country) {
																		?>

																		<option value="<?= $country->country_name ?>">

															<?php
																	}

															 ?>	
													
												</datalist>


											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
													<label class="mb-2 font-12">Postal Code</label>
													<input type="text" name="postalcode" id="postalcode" placeholder="Postal Code" class="form-control" value="<?= $merchant['postal_code'] ?>">
											</div>
											<div class="form-group">
													<label class="mb-2 font-12">Telephone #</label>
													<input type="text" name="telephone" id="telephone" placeholder="Telephone" class="form-control" value="<?= $merchant['telephone'] ?>">
												</div>
											<div class="col-md-12">
												
											</div>
											<div class="col-md-12">
												
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="mb-2 font-12">Website</label>
												<input type="text" name="website" id="website" placeholder="Website" class="form-control" value="<?= $merchant['website'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Facebook</label>
												<input type="text" name="facebook" id="facebook" placeholder="Facebook" class="form-control" value="<?= $merchant['facebook'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Instagram</label>
												<input type="text" name="instagram" id="instagram" placeholder="Instagram" class="form-control" value="<?= $merchant['instagram'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Twitter</label>
												<input type="text" name="twitter" id="twitter" placeholder="Twitter" class="form-control" value="<?= $merchant['twitter'] ?>">
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">YouTube</label>
												<input type="text" name="youtube" id="youtube" placeholder="YouTube" class="form-control" value="<?= $merchant['youtube'] ?>">
											</div>
										</div>
										<div class="col-md-3">
											<label class="mb-2 font-12">Merchant Active</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">

													<?php 



													$isActive = '';
													$isNotActive = '';

													if ($merchant['merchant_active'] == 'Y') {
														$isActive = 'active';
													}else{
														$isNotActive = 'active';
													}


													 ?>
													  <label class="btn btn-default <?= $isActive ?>"  id="yes_merchantactive">
													    <input type="radio" name="options_merchantactive" autocomplete="off" > Yes
													  </label>
													  <label class="btn btn-default <?= $isNotActive ?>" id="no_merchantactive">
													    <input type="radio" name="options_merchantactive"  autocomplete="off" > No
													  </label>
													  
													</div>
													<input type="hidden" name="merchantactive" id="merchantactive" value="<?= $merchant['merchant_active'] ?>">
												<br>
												<label class="mb-2 font-12">Featured</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">

													<?php 



													$isActive = '';
													$isNotActive = '';

													if ($merchant['featured'] == 'Y') {
														$isActive = 'active';
													}else{
														$isNotActive = 'active';
													}


													 ?>
													  <label class="btn btn-default <?= $isActive ?>"  id="yes_featured_merchant">
													    <input type="radio" name="options_featured" autocomplete="off" > Yes
													  </label>
													  <label class="btn btn-default <?= $isNotActive ?>" id="no_featured_merchant">
													    <input type="radio" name="options_featured"  autocomplete="off" > No
													  </label>
													  
													</div>
													<input type="hidden" name="featured_merchant" id="featured_merchant" value="<?= $merchant['featured'] ?>">
													
													
											<div class="form-group">
												<label class="mb-2 font-12">Opening Hours</label>
												<textarea type="text" name="opening_hour" id="opening_hour" placeholder="Opening Hours" class="form-control" rows="3"><?= $merchant['opening_hour'] ?></textarea>
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Latitude</label>
												<input type="text" name="latitude" id="latitude" placeholder="Latitude" class="form-control" >
											</div>
											<div class="form-group">
												<label class="mb-2 font-12">Longitude</label>
												<input type="text" name="longitude" id="longitude" placeholder="Longitude" class="form-control">
											</div>
										</div>
										
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="mb-2 font-12">Parent Company</label>
													<input type="text" name="parentcompany" id="parentcompany" placeholder="Parent Company" class="form-control" list="datalist2" value="<?= $comp['company_name'] ?>">


													<datalist id="datalist2">



												<?php 
														foreach ($companies as $company) {
															?>

															<option value="<?= $company->company_name ?>">

												<?php
														}

												 ?>	
										
											</datalist>
											</div>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-12">
											<div class="form-group">
												<label class="mb-2 font-12">About Us</label>
												<textarea type="text" name="about_us" id="about_us" placeholder="About Us" class="form-control" rows="5"><?= $merchant['about_us'] ?></textarea>
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
							<div class="card-header-malle">Merchant Logo</div>
							<div class="card-body">
								<?php 

									if ($image['image_name']) {
										
										?>

											<div class="col-md-4">
														
														<img src="<?= base_url('uploads/') . $image['image_name'] ?>" class="pic ">
									 					<a href="#" id="removeimagefrommerchant" data="<?= $image['merchant_image_id'] ?>" class="text-danger font-12">Remove</a>

													</div>

										<?php

									}
									else{
										?>
										<div class="col-md-4">
														

											<form action="<?= base_url('Merchant/addImageToMerchant/') . $image['merchant_image_id'] ?>" class="dropzone" id="image1">
											
											</form>


										</div>
									<?php
									}

								 ?>
							</div>
						</div>
					</div>
				</div>
				
			<!--	<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Merchant Promo Images</div>
							<div class="card-body">
								<div class="row">
									
												
									 

														<?php
														//var_export($image_count);
														//echo $image_count[1][0]->image_count ;
														for($i = 1; $i <= 5; $i++){
														if (@$image_count[$i][0]->image_count == $i) {
									
															?>
			
			
																	<div class="col-md-2">
														
																		<img src="<?= base_url('promos/') . $image_count[$i][0]->image_name ?>" class="pic ">
																		<a href="#" id="removeimagefrommall<?= $image_count[$i][0]->image_count ?>" data="<?= $image_count[$i][0]->mallpromo_image_id?>" class="text-danger font-12">Remove</a>
				
																	</div>

			
															<?php
			
														}
														else{
														?>
															<div class="col-md-2">
																	
			
																		<form action="<?= base_url('Merchant/addImagePromo/') .  $merchant['merchant_id'] ?>/<?=$i?>" class="dropzone" id="image1<?=$i?>">
																		
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
				</div>-->

				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Merchant Promotions</div>
							<div class="card-body">
								<form method="post" action="" id="merchantPromotionForm" autocomplete="off"> 
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Promotion Name</label>
												<input type="text" name="promotion_name" placeholder="Promotion Name" id="promotion_name" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden" name="merchant_id_promo" id="merchant_id_promo" value="<?= $merchant['merchant_id'] ?>">
											<input type="hidden" name="user_id_promo" id="user_id_promo" value="<?= $this->session->userdata('user')['user_id'] ?>">
											<br>
											<button type="submit" class="btn btn-primary col-md-6" id="btnUpdatePromo">Update</button>
										</div>
										<div class="col-md-4"> </div> 
										</div> 
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Promotion Name</th> 
														<th>Created by</th> 
														<th></th>
													</tr>
												</thead>
												
												<tbody id="merchantpromotions">



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
							<div class="card-header-malle">Deals Master</div>
							<div class="card-body">
								<form method="post" action="" id="merchantDealForm" autocomplete="off"> 
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Deal Name</label>
												<input type="text" name="deal_name" placeholder="Deal Name" id="deal_name" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden" name="merchant_id_deal" id="merchant_id_deal" value="<?= $merchant['merchant_id'] ?>">
											<input type="hidden" name="user_id_deal" id="user_id_deal" value="<?= $this->session->userdata('user')['user_id'] ?>">
											<br>
											<button type="submit" class="btn btn-primary col-md-6" id="btnUpdateDeal">Update</button>
										</div>
										<div class="col-md-4"> </div> 
										</div> 
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Deal Name</th> 
														<th>Created by</th> 
														<th></th>
													</tr>
												</thead>
												
												<tbody id="merchantdeals">



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
							<div class="card-header-malle">Merchant Main Image</div>
							<div class="card-body">
								<?php 

									if ($merchant['main_image']) {
										
										?>

											<div class="col-md-4">
														
														<img src="<?= base_url('main/') . $merchant['main_image'] ?>" class="pic ">
									 					<a href="#" id="emptyimagefrommerchant_master" data="<?= $merchant['merchant_id'] ?>" class="text-danger font-12">Remove</a>

													</div>

										<?php

									}
									else{
										?>
										<div class="col-md-4">
														

											<form action="<?= base_url('Merchant/addImageToMerchantMain/') . $merchant['merchant_id'] ?>" class="dropzone" id="image2">
											
											</form>


										</div>
									<?php
									}

								 ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Merchant Contacts</div>
							<div class="card-body">
								<form method="post" action="" id="contactform" autocomplete="off">
									<div class="row">
										<div class="col-md-12">
											<input type="hidden" name="merchant_id" value="<?= $merchant['merchant_id'] ?>">
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
												
												<tbody id="merchantcontacts">



												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row move-top" id="merchant_outlets">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Merchants Outlets</div>
							<div class="card-body">
								<form method="post" action="" id="locationform" autocomplete="off">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<input type="hidden" name="merchant_id" value="<?= $merchant['merchant_id'] ?>">
												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mall_name" placeholder="Mall Name" id="mall_name" class="form-control" required list="datalist1">


												<datalist id="datalist1">



												<?php 
														foreach ($malls as $mall) {
															?>

															<option value="<?= $mall->mall_name ?>">

												<?php
														}

												 ?>	
										
											</datalist>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Location</label>
												<input type="text" name="location" placeholder="Location" id="location" class="form-control" required>
											</div>
										</div>
										
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">&nbsp;</label>
												<!--<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-mt" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--Select Level--</button>
												  <div class="dropdown-menu mt-drop" aria-labelledby="countryoption">
												   <?php 
																foreach ($levels as $level) {
																	?>
																	<a class="dropdown-item" href="#merchant_outlets" data="<?= $level->level_id ?>"><?= $level->level ?></a>

															<?php
																}
															 ?>
												  </div>
												</div>-->
												
												<div class="dropdown">
													<button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Level</button>
													<div class="dropdown-menu" aria-labelledby="countryoption">
													 <?php 
																foreach ($levels as $level) {
																	?>
																	<a class="dropdown-item" href="#merchant_outlets" data="<?= $level->level_id ?>"><?= $level->level ?></a>

															<?php
																}
															 ?>
													</div>
												  </div> 
												<input type="hidden" name="level_id" id="level_id" value="">
											</div>
										</div>
										
										<div class="col-md-3">
											<button type="submit" class="btn btn-primary col-md-12 top-t" id="btnMerchantLocation">Update</button>
										</div>
									</div>
								</form>
								<div class="row">
									<table class="table table-striped malle-table">
										<tbody id="merchantlocations">



										</tbody>
									</table>
								</div>
							</div>
						</div>
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
		              <button type="button" class="btn btn-danger" id="btndeleteimage">Yes</button>
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

		      <div class="modal fade" id="deletelocationmodal" tabindex="-1" role="dialog" aria-labelledby="deletemodallocationlabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodallocationlabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this location?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnDeleteLocation">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		        <div class="modal fade" id="deletemodalPromo" tabindex="-1" role="dialog" aria-labelledby="deletemodalPromolabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodalPromolabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this promo?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="BtnDeletePromo">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		         <div class="modal fade" id="deletemodalDeal" tabindex="-1" role="dialog" aria-labelledby="deletemodalDeallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletemodalDeallabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this deal?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="BtnDeleteDeal">Yes</button>
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
		              		<input type="hidden" name="mrc_idedit" id="mrc_idedit">
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

		      <div class="modal fade" id="editLoactionmodal" tabindex="-1" role="dialog" aria-labelledby="editlocationmodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="editlocationmodallabel">Edit Location</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <form id="editlocationform" autocomplete="off">
		              	<div class="form-group">
		              		<input type="hidden" name="merchantLocation_id" id="merchantLocation_id">
		              		<label class="mb-2 font-12">Mall Name</label>
		              		<input type="text" name="mall_name_location" id="mall_name_location" class="form-control" placeholder="Mall Name" required list="datalist3">


		              					<datalist id="datalist3">



												<?php 
														foreach ($malls as $mall) {
															?>

															<option value="<?= $mall->mall_name ?>">

												<?php
														}

												 ?>	
										
											</datalist>
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Location</label>
		              		<input type="text" name="locationedit" id="locationedit" class="form-control" placeholder="Location">
		              	</div>
		              </form>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		              <button type="button" class="btn btn-primary col-md-3" id="btnEditLocation">Edit</button>
		            </div>
		          </div>
		        </div>
		      </div>

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
			
			Dropzone.options.image11 = {
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
			Dropzone.options.image12 = {
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
			Dropzone.options.image13 = {
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
			Dropzone.options.image14 = {
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
			Dropzone.options.image15 = {
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
			
			

			$(function(){
				
				

			$(".dropdown-menu").on('click','a',function(){
				 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
				 $('#level_id').val($(this).attr('data'));
			})

				displayContacts();	
				displayLocations();	
				displayMerchantPromo();
				displayMerchantDeal();


				function displayLocations(){

					var merchant_id = $('#merchant_id_main').val();

					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayLocations') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){	

												var href = '<?= base_url('Merchant/EditMerchantLocation/') ?>';

												html += '<tr>'+
													'<td>'+ data[c].mall_name +'</td>'+
													'<td>'+ data[c].merchant_location +'</td>'+
													'<td>'+ data[c].level +'</td>'+
													'<td class="text-right"><a href="'+ href + data[c].merchantLocation_id + '/'+ <?= $merchant['merchant_id'] ?> + '/'+ data[c].mall_id +'" data="'+ data[c].merchantLocation_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[c].merchantLocation_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#merchantlocations').html(html);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								});


				}

				function displayContacts(){


						var merchant_id = $('#merchant_id_main').val();


    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayContacts') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
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
													'<td class="text-right"><a href="#" data="'+ data[c].mrc_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[c].mrc_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#merchantcontacts').html(html);
									},
									error : function(){
										// alert("Error retrieving contacts.");
									}
								});	

				}

 
			function displayMerchantPromo(){

    					var merchant_id = $('#merchant_id_main').val();


    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayMerchantPromo') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												var href = '<?= base_url('Merchant/EditPromo/') ?>';


												html += '<tr>'+
													'<td>'+ data[c].promo_name +'</td>'+ 
													'<td>'+ data[c].short_name +'</td>'+ 
													'<td class="text-right"><a  href="'+href+  data[c].promo_id +'" data="'+ data[c].promo_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data-toggle="modal" data="'+ data[c].promo_id +'" class="linkDeleteEvent"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#merchantpromotions').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}
    					function displayMerchantDeal(){

    					var merchant_id = $('#merchant_id_main').val();


    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayMerchantDeals') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												var href = '<?= base_url('Merchant/EditMerchantDeal/') ?>';


												html += '<tr>'+
													'<td>'+ data[c].deal_main_name +'</td>'+ 
													'<td>'+ data[c].short_name +'</td>'+ 
													'<td class="text-right"><a  href="'+href+  data[c].dm_id +'" data="'+ data[c].dm_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data-toggle="modal" data="'+ data[c].dm_id +'" class="linkDeleteDeal"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#merchantdeals').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}

				$('#btnUpdatePromo').click(function(e){
					e.preventDefault();

					var data = $('#merchantPromotionForm').serialize();


					if ($('#promotion_name').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processMerchantPromo') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayMerchantPromo();
								          	$('#promotion_name').val('');  
								          	
								            toastr['info']('Merchant Promo updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update Merchant Promo.');
								          }
								        });

					}else{
						toastr["error"]("Promotion name can't be null.");
					}

				});
 


					$('#merchantpromotions').on('click','.linkDeleteEvent',function(e){
					e.preventDefault();

					var promo_id = $(this).attr('data');
					$('#deletemodalPromo').modal('show');

					$('#BtnDeletePromo').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantPromo') ?>',
									data : {promo_id:promo_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodalPromo').modal('hide');
											displayMerchantPromo();
											toastr['info']('Merchant Promo deleted.');
										}
										else{
											$('#deletemodalPromo').modal('hide');
											toastr['error']("Can't delete this promo.");
										}
										
									},
									error : function(){
										alert("Error deleting promo.");
									}
								});
							});
				});


				$('#btnUpdateDeal').click(function(e){
					e.preventDefault();

					var data = $('#merchantDealForm').serialize();


					if ($('#deal_name').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processMerchantDeal') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayMerchantDeal(); 
								          	
								            toastr['info']('Merchant Deals updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update Merchant Deals.');
								          }
								        });

					}else{
						toastr["error"]("Deal name can't be null.");
					}

				});

				$('#merchantdeals').on('click','.linkDeleteDeal',function(e){
					e.preventDefault();

					var dm_id = $(this).attr('data');
					$('#deletemodalDeal').modal('show');

					$('#BtnDeleteDeal').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantDeals') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodalDeal').modal('hide');
											displayMerchantDeal();
											toastr['info']('Merchant Deal deleted.');
										}
										else{
											$('#deletemodalDeal').modal('hide');
											toastr['error']("Can't delete this deal.");
										}
										
									},
									error : function(){
										alert("Error deleting deal.");
									}
								});
							});
				});

				$('#btnUpdateMerchant').click(function(e){
					e.preventDefault();

					var data = $('#editmerchantform').serialize();

					if ($('#merchantname').val().length >0) {

						if ($('#merchanttype').val().length > 0) {

							if ($('#country').val().length > 0) {


									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processEditMerchant') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Merchant updated.');
								           

								          },
								          error : function(){
								            toastr['error']('Could not update merchant.');
								          }
								        });
								}else{
									toastr["warning"]("Country can't be null.");
								}


							}else{
								toastr["warning"]("Merchant type can't be null.");
							}



					}else{
						toastr["warning"]("Merchant name can't be null.");
					}

				});

				
				//promos
				
				
				$('#removeimagefrommall1').click(function(e){
					e.preventDefault();

					var mallpromo_image_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
									data : {mallpromo_image_id:mallpromo_image_id},
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

					var mallpromo_image_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
									data : {mallpromo_image_id:mallpromo_image_id},
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

					var mallpromo_image_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
									data : {mallpromo_image_id:mallpromo_image_id},
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
				
				
				$('#removeimagefrommall4').click(function(e){
					e.preventDefault();

					var mallpromo_image_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
									data : {mallpromo_image_id:mallpromo_image_id},
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
				
				
				$('#removeimagefrommall5').click(function(e){
					e.preventDefault();

					var mallpromo_image_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
									data : {mallpromo_image_id:mallpromo_image_id},
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
				
				
				
				$('#removeimagefrommerchant').click(function(e){
					e.preventDefault();

					var merchant_image_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImage') ?>',
									data : {merchant_image_id:merchant_image_id},
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
				
				
				$('#emptyimagefrommerchant_master').click(function(e){
					e.preventDefault();

					var merchant_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImageMain') ?>',
									data : {merchant_id:merchant_id},
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


				$('#btnUpdateContact').click(function(e){

					e.preventDefault();

					var data = $('#contactform').serialize();

					if ($('#contactperson').val().length > 0) {


									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processContact') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	$('#contactperson').val('');
								          	$('#positionheld').val('');
								          	$('#contactnumber').val('');
								          	$('#emailcontact').val('');
								          	
								            toastr['info']('Merchant Contact updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update merchant contact.');
								          }
								        });


					}else{
						toastr['warning']('Contact person cant be null.');	
					}

				});

				$('#merchantcontacts').on('click','.btn-delete',function(e){
						e.preventDefault();


						var mrc_id = $(this).attr('data');

						
						$('#deletemodal').modal('show');

						$('#btnDeleteContact').unbind().click(function(){

							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyContact') ?>',
									data : {mrc_id:mrc_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayContacts();
											toastr['info']('Merchant contact deleted.');
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

				$('#merchantcontacts').on('click','.btn-edit',function(e){
						e.preventDefault();

						var mrc_id = $(this).attr('data');

						$('#editmodal').modal('show');

								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/getContact') ?>',
									data : {mrc_id:mrc_id},
									dataType : 'json',
									success : function(data){

										console.log(data);

										$('#mrc_idedit').val(data.mrc_id);
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
								          url : '<?= base_url('Merchant/processContactEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	
								          	$('#editmodal').modal('hide');

								            toastr['info']('Merchant Contact edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit merchant contact.');
								          }
								        });

					}else{

						toastr['warning']("Contact person cant be null.");

					}

				});

				$('#btnMerchantLocation').click(function(e){
					e.preventDefault();


					var data = $('#locationform').serialize();

					if ($('#mall_name').val().length > 0) {
						if ($('#location').val().length > 0) {


								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processLocation') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayLocations();	
								          	$('#mall_name').val('');
								          	$('#location').val('');
								          	
								          	
								            toastr['info']('Merchant location updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update merchant location.');
								          }
								        });



						}else{
							toastr['warning']("Location cant be null.");
						}
					}else{
						toastr['warning']("Mall name cant be null.");
					}

				});
				
				$('#yes_merchantactive').click(function(){
						$('#merchantactive').val('Y');
					});

					$('#no_merchantactive').click(function(){
						$('#merchantactive').val('N');
					});

				$('#yes_featured_merchant').click(function(){
						$('#featured_merchant').val('Y');
					});

					$('#no_featured_merchant').click(function(){
						$('#featured_merchant').val('N');
					});

					$("input[name='options_merchantactive']").change(function(){

						var merchant_active = $('#merchantactive').val();
						var merchant_id = $('#merchant_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processActive') ?>',
								          data : {merchant_active:merchant_active,merchant_id:merchant_id},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Merchant active updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update merchant active.');
								          }
								        });
					});

					$("input[name='options_featured']").change(function(){

						var featured = $('#featured_merchant').val();
						var merchant_id = $('#merchant_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processFeatured') ?>',
								          data : {merchant_id:merchant_id,featured:featured},
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
					

				$('#merchantlocations').on('click','.btn-delete',function(e){
					e.preventDefault();

					var merchantLocation_id = $(this).attr('data');

					$('#deletelocationmodal').modal('show');

					$('#btnDeleteLocation').unbind().click(function(){


							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyLocation') ?>',
									data : {merchantLocation_id:merchantLocation_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletelocationmodal').modal('hide');
											displayLocations();
											toastr['info']('Merchant location deleted.');
										}
										else{
											$('#deletelocationmodal').modal('hide');
											toastr['error']("Can't delete this location.");
										}
										
									},
									error : function(){
										alert("Error deleting location.");
									}
								});


					});


				});


	

			});


		</script>