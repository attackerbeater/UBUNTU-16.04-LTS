		
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-3">Deal Category ID : <span class="text-danger"><?= $deal_info['sub_category_id'] ?></span></div>
									<?php 

										$promodate = new DateTime($deal_info['Created_on']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $promodate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $deal_info['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div> 
							<div class="card-body">
								
								
									<div class="row">
										
										
										<?php 
											if ($deal_info['image']) {
										?>
										<div class="col-md-3"> 				
											<img src="<?= base_url('dealcategory_images/') . $deal_info['image'] ?>" class="img-thumbnail">
									 		<a href="#" id="removeimageDealCategory" data="<?= $deal_info['sub_category_id'] ?>" class="text-danger font-12">Remove</a>
									    </div>
										<?php
											}
										else{
											?> 
											<div class="col-md-3"> 
												<form action="<?= base_url('Dealcategory/addImageDealCategory/') . $deal_info['sub_category_id'] ?>" class="dropzone" id="imageDealCategory">
												</form> 
											</div> 
									<?php
									}

								 ?> 
								      <form method="post" action="" id="editDealsform" autocomplete="off"> 
										<div class="row">
										  <div class="col-md-9">
											<div class="form-group"> 
												<input type="hidden" name="sub_category_id" id="sub_category_id" value="<?= $deal_info['sub_category_id'] ?>">
												<label class="mb-2 font-12">Deal Category Name</label> 
												<input type="text"  name="Sub_Category_name" id="Sub_Category_name" required  class="form-control" value="<?= $deal_info['Sub_Category_name'] ?>">

											</div>   
											  <select class="form-control" id="Category_name" name="Category_name">
											  	<?php
											 		$sel = "";
											 		if ($deal_info['Category_id'] == 0) { 
											  
													foreach ($categories as $category) {
														?>
														<option value="<?= $category->Category_id ?>"><?= $category->Category_name ?></option>

												<?php }  }else{
											 		foreach ($categories as $row) { 
											 			if( $deal_info['Category_id'] == $row->Category_id ){
											 				$sel = "selected";
											 			?>
														<option value="<?= $row->Category_id ?>" <?= $sel ?>><?= $row->Category_name ?></option>
													 
											 	<?php }else{ ?>
														<option value="<?= $row->Category_id ?>"><?= $row->Category_name ?></option> 
											 	<?php 
													 }
													 }
													 } ?> 
											 </select> 
										</div>
										<div class="col-md-3"> 
											 <br>
											<button type="submit" class="btn btn-primary" id="btnEditDeal">Update</button>
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


			Dropzone.options.imageDealCategory = {
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
 
 

					$('#btnEditDeal').click(function(e){
							e.preventDefault();

							var data = $('#editDealsform').serialize(); 

							if ($('#Sub_Category_name').val().length > 0) {
								if ($('#Category_name').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Dealcategory/processEditDealCategory') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								            toastr['info']('Deal category edited.'); 

								          },
								          error : function(){
								            toastr['error']('Could not save deal category.');
								          }
								        });


								}else{
									toastr["error"]("Please select category.");
								}
							}else{
								toastr["error"]("Sub Category Name can't be null.");
							}

						});
 				
 				$('#removeimageDealCategory').click(function(e){
					e.preventDefault();

					var sub_category_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Dealcategory/destroyimageDealCategory') ?>',
									data : {sub_category_id:sub_category_id},
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