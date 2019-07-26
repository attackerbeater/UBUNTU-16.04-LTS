			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle text-danger">
								<div class="row">
									<div class="col-md-6">
									    <input type="hidden" name="mall_id_main" id="mall_id_main" value="<?= $merchant_info['mall_id'] ?>">
										<input type="hidden" name="merchant_id_main" id="merchant_id_main" value="<?= $merchant_info['merchant_id'] ?>">
										<?= $merchant_info['merchant_name'] ?>
									</div>
									<div class="col-md-6">
										<a href="#" onclick="history.back();" class="float-right text-primary">Back</a>
									</div>
								</div>
								</div>
							<div class="card-body">
								<form method="post" action="" id="editmerchantlocationform" autocomplete="off">
									<div class="row">
										<div class="col-md-6">
											<input type="hidden" name="merchantLocation_id" id="merchantLocation_id" value="<?= $merchant_info['merchantLocation_id'] ?>">
											<label class="mb-2 font-12">Mall Name</label>
											<input type="text" name="mallname" id="mallname" class="form-control" value="<?= $merchant_info['mall_name'] ?>" required list="datalist1">


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
										<div class="col-md-3 offset-md-3">
											<button type="submit" class="btn btn-primary col-md-8" id="btnUpdateMerchantLocation">Edit</button>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Location</label>
												<input type="text" name="merchant_location" id="location" class="form-control" required value="<?= $merchant_info['merchant_location'] ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Level</label>
												<div class="dropdown">
													<button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $merchant_info['level'] ?></button>
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
												<input type="hidden" name="level_id" id="level_id" value="<?= $merchant_info['level_id'] ?>">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
													<label class="mb-2 font-12">Telephone #</label>
													<input type="text" name="loc_telephone" id="telephone" placeholder="Telephone" class="form-control" value="<?= ($merchant_info['loc_telephone']  != '' ? $merchant_info['loc_telephone'] : $merchant_info['telephone']) ?>">
												</div>
										</div>
										<div class="col-md-4">
											<label class="mb-2 font-12">Location Details</label>
												<textarea type="text" name="location_details" id="location_details" placeholder="Location Details" class="form-control" rows="5"><?= ($merchant_info['location_details'] != '' ? $merchant_info['location_details'] : $merchant_info['location_details']) ?></textarea>
												
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Address</label>
												<textarea rows="4" class="form-control" name="loc_address" placeholder="Address"><?=  ($merchant_info['loc_address'] != ''  ? $merchant_info['loc_address']  : $merchant_info['merchant_address']); ?></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Opening Hours</label>
												<textarea type="text" name="loc_opening_hour" id="opening_hour" placeholder="Opening Hours" class="form-control" rows="3"><?= ($merchant_info['loc_opening_hour'] != '' ? $merchant_info['loc_opening_hour'] : $merchant_info['opening_hour']) ?></textarea>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">About Us</label>
												<textarea type="text" name="loc_about_us" id="about_us" placeholder="About Us" class="form-control" rows="5"><?= ($merchant_info['loc_about_us'] != '' ? $merchant_info['loc_about_us'] : $merchant_info['about_us']) ?></textarea>
												
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
							<div class="card-header-malle">Merchant Outlet Main Image</div>
							<div class="card-body">
								<?php 

									if ($merchant_info['location_image']) {
										
										?>

											<div class="col-md-4">
														
														<img src="<?= base_url('main_merchant/') . $merchant_info['location_image'] ?>" class="pic ">
									 					<a href="#" id="emptyimagefrommerchant_master" data="<?= $merchant_info['merchantLocation_id'] ?>" class="text-danger font-12">Remove</a>

													</div>

										<?php

									}
									else{
										?>
										<div class="col-md-4">
														

											<form action="<?= base_url('Merchant/addImageToMerchantMainLocation/') . $merchant_info['merchantLocation_id'] ?>" class="dropzone" id="image2">
											
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
							<div class="card-header-malle">Merchant Outlets Other Images</div>
							<div class="card-body">
								<div class="row">
									<?php 

											$delnum = 1;

											foreach ($images as $image) {
												if ($image->image_name) {
													
													?>

														<div class="col-md-4">
															
															<img src="<?= base_url('uploads/') . $image->image_name ?>" class="pic ">
										 					<a href="#" id="removeimagefrommerchant<?= $delnum ?>" data="<?= $image->merchant_image_id ?>" class="text-danger font-12">Remove</a>

														</div>

													<?php

												}

												$delnum = $delnum + 1;
											}

									 ?>

									 <?php 

									 		$delnums = 1;

									 		foreach ($images as $image) {
									 			if ($image->image_name == '') {
									 					
									 					?>

									 						<div class="col-md-4">
															

																<form action="<?= base_url('Merchant/addImageToMerchantLocation/') . $image->merchant_image_id ?>" class="dropzone" id="image1">
																
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
							<div class="card-header-malle">								
								<div class="row">
									<div class="col-md-6">
										<b><?= $merchant_info['mall_name'] ?></b>  
									</div>
									<div class="col-md-6">
										<a href="#" onclick="history.back();" class="float-right text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								<form method="post" action="" id="merchantLocationPromotionForm" autocomplete="off"> 
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="hidden" name="mall_id" id="mall_id" value="<?= $merchant_info['mall_id'] ?>">
												<input type="hidden" name="merchant_id" id="merchant_id" value="<?= $merchant_info['merchant_id'] ?>">

												<label class="mb-2 font-12">Promotion Name</label>
												<select class="form-control" id="promo_name_merchant" name="promo_name_merchant">
													<option>---select promotion name---</option>
													<?php foreach($promos as $pr):?>
														<option value="<?= $pr->promo_id ?>"><?= $pr->promo_name ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user')['user_id'] ?>">
											<input type="hidden" name="merchantLocation_id_promo" id="merchantLocation_id_promo" value="<?= $merchant_info['merchantLocation_id'] ?>"> 
											<br>
											<button type="submit" class="btn btn-primary col-md-6" id="btnUpdatemerchantLocationPromo">Update</button>
										</div>
										<div class="col-md-4"> </div> 
										</div> 
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th></th>  
														<th></th>
													</tr>
												</thead>
												
												<tbody id="merchantLocationpromotions">



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
		              <p class="font-12">Are you sure you want to delete this merchant?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletemerchant">Yes</button>
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

		      <div class="modal fade" id="deletepromomerchantmodal" tabindex="-1" role="dialog" aria-labelledby="deletepromomerchantmodallabel3" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletepromomerchantmodallabel3">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this promo?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletepromomerchant">Yes</button>
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


			$(function(){

					displayPromoMerchant();

				$(".dropdown-menu").on('click','a',function(){
					 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
					$('#level_id').val($(this).attr('data'));
			   })

					function displayPromoMerchant(){

    					var mall_id = $('#mall_id_main').val();
                        var merchant_id = $('#merchant_id_main').val();

    					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayPromoMerchant') ?>',
									data : {mall_id:mall_id,merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												var href = '<?= base_url('Merchant/EditPromoMerchant/') ?>';


												html += '<tr>'+
													'<td>'+ data[c].promo_name +'</td>'+ 
													'<td class="text-right"><a  href="'+href+  data[c].po_id +'/' +  data[c].promo_id+'" data="'+ data[c].po_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data-toggle="modal" data="'+ data[c].po_id +'" class="linkDeletePromo"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#merchantLocationpromotions').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});

    				}

				$('#btnUpdatemerchantLocationPromo').click(function(e){
					e.preventDefault();


					var data = $('#merchantLocationPromotionForm').serialize();


					if ($('#promo_name_merchant').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processPromoMerchant') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								            if (response.success) {
												displayPromoMerchant();
												toastr['info']('Promo Updated.'); 
											}
											else{
												toastr['error']("This Promotion already exist");
											}
								            displayPromoMerchant();
								          },
								          error : function(){
								            toastr['error']('Could not update promo.');
								          }
								        });

					}else{
						toastr['warning']("Promo name cant be null.");
					}
				});

   			$('#merchantLocationpromotions').on('click','.linkDeletePromo',function(e){
					e.preventDefault();

					var po_id = $(this).attr('data');
					$('#deletepromomerchantmodal').modal('show');

					$('#btndeletepromomerchant').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyPromoMerchant') ?>',
									data : {po_id:po_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletepromomerchantmodal').modal('hide');
											displayPromoMerchant();
											toastr['info']('Promo deleted.');
										}
										else{
											$('#deletepromomerchantmodal').modal('hide');
											toastr['error']("Can't delete this promo.");
										}
										
									},
									error : function(){
										alert("Error deleting promo.");
									}
								});
							});
				});

			   
			   
				$('#btnUpdateMerchantLocation').click(function(e){
					e.preventDefault();


					var data = $('#editmerchantlocationform').serialize();


					if ($('#mallname').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processLocationEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								            toastr['info']('Merchant location edited.');
								           
								           
								          },
								          error : function(){
								            toastr['error']('Could not edit merchant location.');
								          }
								        });

					}else{
						toastr['warning']("Mall name cant be null.");
					}
				});


			
				$('#emptyimagefrommerchant_master').click(function(e){
					e.preventDefault();

					var merchantLocation_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage1').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroMerchantImageMainLoc') ?>',
									data : {merchantLocation_id:merchantLocation_id},
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

				$('#removeimagefrommerchant1').click(function(e){
						e.preventDefault();


						$('#deleteimagemodal').modal('show');

						var merchant_image_id = $(this).attr('data');
						$('#btndeleteimage1').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantLocationImage') ?>',
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

				$('#removeimagefrommerchant2').click(function(e){
						e.preventDefault();


						$('#deleteimagemodal2').modal('show');

						var merchant_image_id = $(this).attr('data');
						$('#btndeleteimage2').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantLocationImage') ?>',
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

				$('#removeimagefrommerchant3').click(function(e){
						e.preventDefault();


						$('#deleteimagemodal3').modal('show');

						var merchant_image_id = $(this).attr('data');
						$('#btndeleteimage3').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantLocationImage') ?>',
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



		 	});


		</script>