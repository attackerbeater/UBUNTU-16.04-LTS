		
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-3">Merchant ID : <span class="text-danger"><?= $merchant_type['mt_id'] ?></span></div>
									<?php 

										$mdate = new DateTime($merchant_type['dated']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $mdate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $merchant_type['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div> 
							<div class="card-body">
								
								
									<div class="row">
										
										
										<?php 
											if ($merchant_type['image']) {
										?>
										<div class="col-md-3"> 				
											<img src="<?= base_url('merchanttype_images/') . $merchant_type['image'] ?>" class="img-thumbnail">
									 		<a href="#" id="removeimageMT" data="<?= $merchant_type['mt_id'] ?>" class="text-danger font-12">Remove</a>
									    </div>
										<?php
											}
										else{
											?> 
											<div class="col-md-3"> 
												<form action="<?= base_url('ManageMasters/addImageMTType/') . $merchant_type['mt_id'] ?>" class="dropzone" id="imageTags">
												</form> 
											</div> 
									<?php
									}

								 ?> 
								      <form method="post" action="" id="editMTypesform" autocomplete="off"> 
										<div class="row">
										  <div class="col-md-9">
											<div class="form-group"> 
												<input type="hidden" name="mt_id" id="mt_id" value="<?= $merchant_type['mt_id'] ?>">
												<label class="mb-2 font-12">Merchant Type</label> 
												<input type="text"  name="merchant_type" id="merchant_type" required  class="form-control" value="<?= $merchant_type['type'] ?>">

											</div> 
										</div>
										<div class="col-md-3"> 
											 <br>
											<button type="submit" class="btn btn-primary" id="btnEditMType">Update</button>
										</div> 
										</div>  
									  </form>
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

 	
	   <script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
		<script type="text/javascript">


			Dropzone.options.imageTags = {
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
 

					$('#btnEditMType').click(function(){
						
						var data = $('#editMTypesform').serialize();
  
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('ManageMasters/processEditMtype') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 

								            toastr['info']('Type updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update type.');
								          }
					});
				}); 
 				
 				$('#removeimageMT').click(function(e){
					e.preventDefault();

					var mt_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('ManageMasters/destroyMTImage') ?>',
									data : {mt_id:mt_id},
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