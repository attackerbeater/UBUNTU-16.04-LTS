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
							<div class="card-header-malle">
								<div class="row">
									 <input type="hidden" name="dm_id_main" id="dm_id_main" value="<?= $dm_info['dm_id'] ?>">
									<div class="col-md-3">DM ID : <span class="text-danger"><?= $dm_info['dm_id'] ?></span></div>
									<?php 

										//$promodate = new DateTime($dm_info['dated']);
										//$promodate->format('d-m-Y')

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $dm_info['dated'] ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $dm_info['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								
								<form method="post" action="" id="editDealform" autocomplete="off">
									<div class="row">
									   <div class="col-md-5"> 
										 <div class="form-group"> 
												<input type="hidden" name="dm_id" id="dm_id" value="<?= $dm_info['dm_id'] ?>">

												<label class="mb-2 font-12">Merchant Name</label>
												<h6><?= $dm_info['merchant_name'] ?></h6> 
											</div>
								      </div>			
									</div>
									<div class="row">
										<div class="col-md-5">
											<div class="form-group"> 
												<label class="mb-2 font-12">Deal Name</label>
												<input type="text" name="deal_main_name" id="deal_main_name" placeholder="Deal Name" value="<?= $dm_info['deal_main_name'] ?>" required  class="form-control">

											</div>
										</div>
										<div class="col-md-3"> 
											<div class="form-group"> 
												<label class="mb-2 font-12">Amount</label>
												 <div class="input-group mb-3">
													  <div class="input-group-prepend">
													    <span class="input-group-text text-primary font-weight-bold" id="basic-addon1"><?= $dm_info['currency_symbol'] ?></span>
													  </div>
													  <?php
													  	$dl_amt = '';
													  	if ($dm_info['deal_amount'] == '' || $dm_info['deal_amount'] == '0') {
													  		$dl_amt = '0.00';
													  	}else{
													  		$dl_amt = $dm_info['deal_amount'];
													  	}
													   ?>
													   <input type="text" name="dealamount" class="form-control text-primary text-right font-weight-bold" id="dealamount" aria-describedby="basic-addon1" value="<?= $dl_amt; ?>" onkeypress="return isNumber(event)">
                                               
													</div>
											</div>
										</div> 
									</div>
									<div class="row">
										<div class="col-md-5">
												
											<div class="form-group">
												<label class="mb-2 font-12">Description</label>
												<textarea type="text" name="deal_details" id="deal_details"  class="form-control"><?= $dm_info['deal_details'] ?></textarea>
											</div>
										</div> 
										
										<div class="col-md-5">
											<label class="mb-2 font-12">Active</label><br>
												<div class="btn-group btn-group-toggle" data-toggle="buttons">
												<!--
													 <?php  
													$isActive = '';
													$isNotActive = '';

													if ($promo['mall_active'] == 'Y') {
														$isActive = 'active';
													}else{
														$isNotActive = 'active';
													}
 ?> -->
													  <label class="btn btn-default active"  id="yes">
													    <input type="radio" name="options" autocomplete="off" > Yes
													  </label>
													  <label class="btn btn-default" id="no">
													    <input type="radio" name="options"  autocomplete="off" > No
													  </label>
													  
													</div>
													<!--<input type="hidden" name="current_event" id="current_event" value="<?= $mall['mall_active'] ?>">-->
										</div>
									</div>
									<div class="row"> 
										<div class="col-md-4">
											<button type="submit" class="btn btn-primary" id="btnEditDeal">Update</button>
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
							<div class="card-header-malle">Deal Images</div>
							<div class="card-body">
								<div class="row"> 
									<?php 
										for($i = 1; $i <= 3; $i++){
										if (@$image_count[$i][0]->img_count == $i) {
									 ?> 
													<div class="col-md-4">
														<?php if($image_count[$i][0]->loc == 1){?>
															 <img src="<?= base_url('promos/') . $image_count[$i][0]->deal_image ?>" class="img-thumbnail">
														<?php } else{?>
															 <img src="<?= base_url('deal_images/') . $image_count[$i][0]->deal_image ?>" class="img-thumbnail">
														<?php } ?>
														<a href="#" id="removeimagefrommall<?= $image_count[$i][0]->img_count ?>" data="<?= $image_count[$i][0]->di_id?>" class="text-danger font-12">Remove</a> 
													</div>
 										<?php } else{ ?>
													<div class="col-md-4"> 
														<form action="<?= base_url('Merchant/addImageDeal/') . $dm_info['dm_id'].'/'.$i?>" class="dropzone" id="image1<?=$i?>"> </form>
			 										</div>
										<?php } } ?> 		
													
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
									<div class="col-md-3">Deal Tags</div>
								</div>
							</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="DealTagForm" autocomplete="off">
									<div class="form-group col-md-7"> 
										<input type="hidden" name="user_id" id="user_id" value="<?= $dm_info['user_id'] ?>">
										<input type="hidden" name="dm_id" id="dm_id" value="<?= $dm_info['dm_id'] ?>"> 
 
										<input type="text" name="tagtype" id="tagtype" placeholder="Tag Name" class="form-control col-md-12" required list="datalist1">
										<datalist id="datalist1"> 
												<?php 
													foreach ($tags as $tag) {
												?> 
													<option value="<?= $tag->tag_name ?>"> 
												<?php
														}

												 ?>	
										
											</datalist> 
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddDealTagType">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table"> 
											
											<tbody id="DealtagTypeTable">


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div> 
 

				 <div class="modal fade" id="deletetagmodal" tabindex="-1" role="dialog" aria-labelledby="deletetaglabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="deletetaglabel">Delete Confirmation</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Are you sure you want to delete this tag?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletetag">Yes</button>
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
			

				function isNumber(evt) {
				    evt = (evt) ? evt : window.event;
				    var charCode = (evt.which) ? evt.which : evt.keyCode;
				    if (charCode > 31 && (charCode < 46 || charCode > 57) ) {
				        return false;
				    }

				    return true;
				}



					$('#removeimagefrommall1').click(function(e){
					e.preventDefault();

					var di_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantImageDeal') ?>',
									data : {di_id:di_id},
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

					var di_id = $(this).attr('data'); 

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantImageDeal') ?>',
									data : {di_id:di_id},
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

					var di_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantImageDeal') ?>',
									data : {di_id:di_id},
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

					var di_id = $(this).attr('data');
					//var image_count = $(this).attr('image_count');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantImageDeal') ?>',
									data : {di_id:di_id},
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

					var di_id = $(this).attr('data'); 

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchantImageDeal') ?>',
									data : {di_id:di_id},
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
				

					$('#btnEditDeal').click(function(){
						
						var data = $('#editDealform').serialize();


						if ($('#deal_main_name').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processEditMerchantDeal') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								          	 
								            toastr['info']('Deal edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit Deal.');
								          }
								        });

					}else{
						toastr["error"]("Deal name can't be null.");
					}

					}); 

					$('#btnAddDealTagType').click(function(){
						
						var data = $('#DealTagForm').serialize(); 

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processDealTagType') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								          	 displayDealtagTypeTable();
								            toastr['info']('Deal Tag updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update Deal.');
								          }
								        });
 

					}); 

							


				$(function(){

					$('#dealamount').focusout(function(){
					var s = $(this).val();

					var sss = parseFloat(s);
					var ss = sss.toFixed(2);

					$(this).val(ss);
					});

				  displayDealtagTypeTable();

				  function displayDealtagTypeTable(){

					var dm_id = $('#dm_id_main').val();

					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayDealTagType') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';

										var c ;

								if (data.length == 0) {
									html += '<div class="alert alert-info mt-4" role="alert">No tag type(s) yet.</div>';
								}else{
									for(type = 0; type < data.length ; type++){
										
										
										html += '<tr>'+
													'<td>'+ data[type].tag_name +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[type].dt_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}

										$('#DealtagTypeTable').html(html);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								}); 
							}



					$('#DealtagTypeTable').on('click','.btn-delete', function(){
						var dt_id = $(this).attr('data');
						$('#deletetagmodal').modal('show');
						$('#btndeletetag').unbind().click(function(){
							$.ajax({
								type : 'ajax',
								method : 'get',
								async : false,
								url : '<?= base_url('Merchant/destroyDealTagType') ?>',
								data : {dt_id:dt_id},
								dataType : 'json',
								success : function(response){
									if (response.success) {
										$('#deletetagmodal').modal('hide');
										displayDealtagTypeTable();
										toastr['info']('Tag deleted.');
									}
									else{
										$('#deletetagmodal').modal('hide');
										toastr['error']("Can't delete this tag.");
									}
									
								},
								error : function(){
									alert("Error deleting tag.");
								}
							});
						});
					});
					

	}); 



			

				
					

 

		</script>