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
				input{
					  border:none;
					  background-color: transparent;
					}
					input:focus,
					select:focus,
					textarea:focus,
					button:focus {
					    outline: none;
					}

					.fa-user-circle-o{
					  color: gray;
					}
 
			</style>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-3">Offer ID : <span class="text-danger"><?= $offers['offer_id'] ?></span></div>
									<?php 

										$odate = new DateTime($offers['dated']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $odate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $offers['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								
								<form method="post" action="" id="editOfferform" autocomplete="off">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<input type="hidden" name="offer_id" id="offer_id" value="<?= $offers['offer_id'] ?>">
												<input type="hidden" name="mall_id" id="mall_id" value="<?= $offers['mall_id'] ?>">
												<label class="mb-2 font-12">Offer Title</label>
												<input type="text" name="offer_title" id="offer_title" class="form-control" value="<?= $offers['offer_title'] ?>"  placeholder="Event Name" required>  
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mallname" id="mallname" placeholder="Mall Name" class="form-control" value="<?= $offers['mall_name'] ?>" readonly> 
											</div>
										</div>
									
									</div>
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label class="mb-2 font-12">Offer Description</label>
												<textarea type="text" name="offer_desc" id="offer_desc" placeholder="Offer Description" required value="" class="form-control" style="height: 300px;"><?= $offers['offer_desc'] ?></textarea>
											</div>
										</div>

										<div class="col-md-3">  
											<label class="mb-2 font-12">Start Date</label> 
											<div class="input-group"> 
												<input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control py-2 border-right-0 border" value="<?= date('d/m/Y')  ?>" > 

									            <span class="input-group-append">
									                <button class="btn btn-outline-secondary border-left-0 border" type="button">
									                    <i class="fa fa-calendar"></i>
									                </button>
									              </span>
									        </div>
										<br>

												 <div class="row">
												  	<div class="col-md-6">
												  		<label class="mb-2 font-12">End Date</label>
												  	</div>
												  	<div class="col-md-6">
												  		<div class="checkbox">
														  <label class="mb-2 font-12"><input type="checkbox" value="Y" name="no_end_date" id="no_end_date"  <?php if($offers['no_end_date'] == "Y"){ ?> checked <?php } ?>> No End Date</label>
														</div>
												  	</div>
												  </div>
									
											<div class="input-group"> 
												<input type="text" name="End_date" id="End_date" placeholder="End Date" value="<?= $offers['End_date'] ?>"  class="form-control py-2 border-right-0 border">
									            <span class="input-group-append">
									                <button class="btn btn-outline-secondary border-left-0 border" type="button">
									                    <i class="fa fa-calendar"></i>
									                </button>
									              </span>
									        </div>
										
									</div>
								</div>
									<div class="row"> 
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary" id="btnEditOffer">Update</button>
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
							<div class="card-header-malle">Offers</div>
							<div class="card-body">
								<div class="row">
									<?php
										
														for($i = 1; $i <= 5; $i++){
														if (@$image_offers[$i][0]->count == $i) {
									
															?>
			
			
																	<div class="col-md-2">
														
																		<img src="<?= base_url('offer_images/') . $image_offers[$i][0]->Image_name ?>" class="img-thumbnail">
																		<a href="#" id="removeimagefromoffer<?= $image_offers[$i][0]->count ?>" data="<?= $image_offers[$i][0]->moi_id?>" class="text-danger font-12">Remove</a>
				
																	</div>

			
															<?php
			
														}
														else{
														?>
															<div class="col-md-2">
																	
			
																		<form action="<?= base_url('Mall/addImageOffer/') .  $offers['mall_id'] ?>/<?=$i?>/<?= $this->session->userdata('user')['user_id'] ?>/<?= $offers['offer_id'] ?>" class="dropzone" id="image<?=$i?>">
																		
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

					$('#btnEditOffer').click(function(){
						
						var data = $('#editOfferform').serialize();


						if ($('#offer_desc').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Offer/processOfferEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 

								            toastr['info']('Offer edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit offer.');
								          }
								        });

					}else{
						toastr["error"]("Offer Description can't be null.");
					}

					}); 


$('#removeimagefromoffer1').click(function(e){
					e.preventDefault();

					var moi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageOffer') ?>',
									data : {moi_id:moi_id},
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
 				
 				$('#removeimagefromoffer2').click(function(e){
					e.preventDefault();

					var moi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageOffer') ?>',
									data : {moi_id:moi_id},
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
 				
 				$('#removeimagefromoffer3').click(function(e){
					e.preventDefault();

					var moi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageOffer') ?>',
									data : {moi_id:moi_id},
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
 				
 				$('#removeimagefromoffer4').click(function(e){
					e.preventDefault();

					var moi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageOffer') ?>',
									data : {moi_id:moi_id},
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
 				
 				$('#removeimagefromoffer5').click(function(e){
					e.preventDefault();

					var moi_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteparkingimagemodal').modal('show');

					$('#btndeleteparkingimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroMallImageOffer') ?>',
									data : {moi_id:moi_id},
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
					

 

		</script>

		