		
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-3">Tag ID : <span class="text-danger"><?= $tag_info['tag_id'] ?></span></div>
									<?php 

										$promodate = new DateTime($tag_info['dated']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $promodate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $tag_info['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div> 
							<div class="card-body">
								
								
									<div class="row">
										
										
										<?php 
											if ($tag_info['image']) {
										?>
										<div class="col-md-3"> 				
											<img src="<?= base_url('tag_images/') . $tag_info['image'] ?>" class="img-thumbnail">
									 		<a href="#" id="removeimageTags" data="<?= $tag_info['tag_id'] ?>" class="text-danger font-12">Remove</a>
									    </div>
										<?php
											}
										else{
											?> 
											<div class="col-md-3"> 
												<form action="<?= base_url('ManageMasters/addImageTagType/') . $tag_info['tag_id'] ?>" class="dropzone" id="imageTags">
												</form> 
											</div> 
									<?php
									}

								 ?> 
								      <form method="post" action="" id="editTagTypesform" autocomplete="off"> 
										<div class="row">
										  <div class="col-md-9">
											<div class="form-group"> 
												<input type="hidden" name="tag_id" id="tag_id" value="<?= $tag_info['tag_id'] ?>">
												<label class="mb-2 font-12">Tag Name</label> 
												<input type="text"  name="tag_name" id="tag_name" required  class="form-control" value="<?= $tag_info['tag_name'] ?>">

											</div> 
										</div>
										<div class="col-md-3"> 
											 <br>
											<button type="submit" class="btn btn-primary" id="btnEditTagType">Update</button>
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
 

					$('#btnEditTagType').click(function(){
						
						var data = $('#editTagTypesform').serialize();
  
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('ManageMasters/processEditTagtype') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 

								            toastr['info']('Tag updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update tag.');
								          }
					});
				}); 
 				
 				$('#removeimageTags').click(function(e){
					e.preventDefault();

					var tag_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('ManageMasters/destroyTagImage') ?>',
									data : {tag_id:tag_id},
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