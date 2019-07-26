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
									<div class="col-md-3">Event ID : <span class="text-danger"><?= $event['event_id'] ?></span></div>
									<?php 

										$eventdate = new DateTime($event['created_on']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $eventdate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $event['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								
								<form method="post" action="" id="editEventform" autocomplete="off">
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<input type="hidden" name="event_id" id="event_id" value="<?= $event['event_id'] ?>">
												<input type="hidden" name="mall_id" id="mall_id" value="<?= $event['mall_id'] ?>">
												<label class="mb-2 font-12">Event Name</label>
												<input type="text" name="event_name" id="event_name" class="form-control" value="<?= $event['event_name'] ?>"  placeholder="Event Name" required>  
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mallname" id="mallname" placeholder="Mall Name" class="form-control" value="<?= $event['mall_name'] ?>" readonly> 
											</div>
										</div>
										<div class="col-md-3">  
											<label class="mb-2 font-12">Start Date</label> 
											<div class="input-group"> 
												<input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control py-2 border-right-0 border" value="<?= date('d/m/Y')  ?>"  required> 

									            <span class="input-group-append">
									                <button class="btn btn-outline-secondary border-left-0 border" type="button">
									                    <i class="fa fa-calendar"></i>
									                </button>
									              </span>
									        </div>
										</div>
									<div class="col-md-2"> 
											<br>
										<div class="form-group">
												<div class="checkbox">
												  <label class="mb-2 font-12"><input type="checkbox" value="Y" name="no_closing" id="no_closing"  <?php if($event['daily'] == "Y"){ ?> checked <?php } ?>> No Closing Date</label>
												</div>
												<div class="checkbox">
												  <label class="mb-2 font-12"><input type="checkbox" value="Y" name="one_day" id="one_day"  <?php if($event['just_1_day'] == "Y"){ ?> checked <?php } ?>> Just one day</label>
												</div>
											</div>   
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="mb-2 font-12">Event Description</label>
												<textarea type="text" name="event_description" id="event_description" placeholder="Event Description" required value="" class="form-control"><?= $event['event_description'] ?></textarea>
											</div>
										</div>
										<div class="col-md-4"> 
											<div class="form-group"> 
												  <div class="row">
												  	<div class="col-md-6">
												  		<label class="mb-2 font-12">Timing</label>
												  	</div>
												  	<div class="col-md-6">
												  		<div class="checkbox">
														  <label class="mb-2 font-12"><input type="checkbox" name="all_day" id="all_day" value="Y" <?php if($event['all_day'] == "Y"){ ?> checked <?php } ?> > All Day</label>
														</div>
												  	</div>
												  </div>
												  <input type="text" name="specific_timing" id="specific_timing" value="<?= $event['event_timing'] ?>"  placeholder="Specific Timing"  class="form-control"> 
											</div> 
										</div>
										<div class="col-md-4">
											<label class="mb-2 font-12">End Date</label>
											<div class="input-group"> 
												<input type="text" name="end_date" id="end_date" placeholder="End Date" value="<?= $event['end_date'] ?>" required  class="form-control py-2 border-right-0 border">
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
												 	<div class="form-group">
												<label class="mb-2 font-12">Event Location</label>
												<textarea type="text" name="location" id="location" placeholder="Sub Category" required  class="form-control"><?= $event['location'] ?> </textarea>
											</div>

										</div>
										
										<div class="col-md-3">
											<label class="mb-2 font-12">Event Type</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">

													<?php  
													
													$isActiveC = '';
													$isActiveP = '';
													$isActiveU = '';

													if ($event['type'] == 'C') { 
														$isActiveC = 'active'; 
													}else if ($event['type'] == 'P'){
														$isActiveP = 'active';
													}else if ($event['type'] == 'U'){
														$isActiveU = 'active';
													}



													 ?> 
													  <label class="btn btn-default <?= $isActiveC ?>"  id="current">
													    <input type="radio" name="options" autocomplete="off" value="C"> Current
													  </label>
													  <label class="btn btn-default <?= $isActiveP ?>" id="past">
													    <input type="radio" name="options"  autocomplete="off" value="P"> Past
													  </label>

													   <label class="btn btn-default <?= $isActiveU ?>" id="upcoming">
													    <input type="radio" name="options"  autocomplete="off" value="U"> Upcoming
													  </label>
													  
													</div>
													<input type="hidden" name="e_type" id="e_type" value="<?= $event['type'] ?>">
										</div>
										<div class="col-md-2">
											<label class="mb-2 font-12">Category</label><br>
											 <select class="form-control" id="ec_id" name="ec_id">
											 	<?php
											 		$sel = "";
											 		if ($event['ec_id'] == 0) { 
											 	?>
											 		<option>----Select----</option>
											 	<?php }else{
											 		foreach ($event_category as $row) { 
											 			if( $event['ec_id'] == $row->ec_id ){
											 				$sel = "selected";
											 			?>
													 <option value="<?= $row->ec_id?>" <?= $sel; ?>><?= $row->event_cat?></option>
											 	<?php }else{ ?>
														<option value="<?= $row->ec_id?>" ><?= $row->event_cat?></option>

											 	<?php 
													 }
													 }
													 } ?>
											 	 
											 </select>
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary" id="btnEditEvent">Update</button>
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
							<div class="card-header-malle">Events</div>
							<div class="card-body">
								<div class="row">
 
									<?php  
										for($i = 1; $i <= 5; $i++){
										 if (@$event_image[$i][0]->event_count == $i) {
									
												?> 
											<div class="col-md-2">
												 
												<img src="<?= base_url('event_photos/') . $event_image[$i][0]->event_image?>" class="img-thumbnail">
													<a href="#" id="removeEventImg<?= $event_image[$i][0]->event_count; ?>" data="<?= $event_image[$i][0]->event_image_id ?>" class="text-danger font-12">Remove</a> 
				
											</div>  
									<?php } else{ ?>
											 <div class="col-md-2">
												 <form action="<?= base_url('Event/addEventImg/') . $event['event_id'] . '/' . $event['user_id'] . '/' . $i ?>" class="dropzone" id="image1<?=$i?>"> </form>
			 								</div>
									 <?php } } ?>

								</div>

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
		              <button type="button" class="btn btn-danger" id="btndeleteEventImg">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

			 


		 
 	
		<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
		<script type="text/javascript">

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
					$('#current').click(function(){
						$('#e_type').val('C');
					});

					$('#past').click(function(){
						$('#e_type').val('P');
					});

					$('#upcoming').click(function(){
						$('#e_type').val('U');
					});

					$('#btnEditEvent').click(function(){
						
						var data = $('#editEventform').serialize();


						if ($('#event_description').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Event/processEventEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 

								            toastr['info']('Event edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit event.');
								          }
								        });

					}else{
						toastr["error"]("Event Description can't be null.");
					}

					}); 



					$('#removeEventImg1').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var event_image_id = $(this).attr('data');
						$('#btndeleteEventImg').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyImageEvent') ?>',
									data : {event_image_id:event_image_id},
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


					$('#removeEventImg2').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var event_image_id = $(this).attr('data');
						$('#btndeleteEventImg').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyImageEvent') ?>',
									data : {event_image_id:event_image_id},
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

					$('#removeEventImg3').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var event_image_id = $(this).attr('data');
						$('#btndeleteEventImg').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyImageEvent') ?>',
									data : {event_image_id:event_image_id},
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

					$('#removeEventImg4').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var event_image_id = $(this).attr('data');
						$('#btndeleteEventImg').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyImageEvent') ?>',
									data : {event_image_id:event_image_id},
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

					$('#removeEventImg5').click(function(e){
						e.preventDefault();

						$('#deletemallimagemodal').modal('show');

						var event_image_id = $(this).attr('data');
						$('#btndeleteEventImg').unbind().click(function(){



							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Event/destroyImageEvent') ?>',
									data : {event_image_id:event_image_id},
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

		