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
							<div class="card-header">
								<div class="row">
								   <input type="hidden" name="po_id_main" id="po_id_main" value="<?= $pm_info['po_id'] ?>">

									<div class="col-md-4"><?= $pm_info['promo_name'] ?></div>
								 
									<div class="col-md-4"><?= $pm_info['merchant_name'] ?></div> 
									<div class="col-md-4 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								
								<form method="post" action="" id="editMerchantPromoform" autocomplete="off"> 
									<div class="row">
										<input type="hidden" name="po_id" id="po_id" value="<?= $pm_info['po_id'] ?>">
										<div class="col-md-3"> 
											<?php if($image_count['image_name'] == ''){ ?>
												<img src="https://admin.mall-e.net/assets/images/logo/rec.png" class="img-thumbnail"> 
											<?php } else { ?>
												<img src="<?= base_url('promos/') . $image_count['image_name'] ?>" class="img-thumbnail"> 
											<?php } ?>
										 	
								      </div>	
										<div class="col-md-4">
											<div class="form-group"> 
												<label class="mb-2 font-12">Promotion Description</label>
												  <?php 
													  $desc ='';
													  if($pm_info['promo_description']==''){
													  	$desc = $pm_info['description'];
													  }else{
													  	$desc = $pm_info['promo_description'];
													  }?>
												<textarea   name="promo_description" id="promo_description" required  class="form-control"><?= $desc ?></textarea> 

											</div>

									<div class="row">
										<?php
											$sel = 'selected';
										?> 
										<div class="col-md-3"> 
											<div class="form-group"> 
												<label class="mb-2 font-12">Live</label><br>
												<select name="live" id="live" class="deal-status" >
													<?php if($pm_info['live']=='N' || $pm_info['live']==''){ ?>
													<option value="N" <?= $sel ?>>No</option>
													<option value="Y" >Yes</option> 
													<?php } else { ?>
													<option value="Y" <?= $sel ?>>Yes</option>
													<option value="N" >No</option> 
													<?php } ?>
												</select>	 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group"> 
												<label class="mb-2 font-12">Featured</label><br>
												<select name="featured" id="featured" class="deal-status" >
													<?php if($pm_info['featured']=='N' || $pm_info['featured']==''){ ?>
													<option value="N" <?= $sel ?>>No</option>
													<option value="Y" >Yes</option> 
													<?php } else { ?>
													<option value="Y" <?= $sel ?>>Yes</option>
													<option value="N" >No</option> 
													<?php } ?>
												</select>	 
											</div> 
										</div>
										<div class="col-md-5"> 
											<div class="form-group"> 
												<label class="mb-2 font-12">Redeem as Deal</label><br>
												<select name="redeem_deal" id="redeem_deal" class="deal-status" >
													<?php if($pm_info['redeem']=='N' || $pm_info['redeem']==''){ ?>
													<option value="N" <?= $sel ?>>No</option>
													<option value="Y" >Yes</option> 
													<?php } else { ?>
													<option value="Y" <?= $sel ?>>Yes</option>
													<option value="N" >No</option> 
													<?php } ?>
												</select>	
											</div>
										</div>
									</div> 
										</div>
										<div class="col-md-2"> 
											<div class="form-group"> 
												<label class="mb-2 font-12">Promo Amount</label> 
													<div class="input-group mb-3">
													  <div class="input-group-prepend">
													    <span class="input-group-text text-primary font-weight-bold" id="basic-addon1"><?= $pm_info['currency_symbol'] ?></span>
													  </div>
													  <?php 
													  $amt ='';
													  if($pm_info['amount']==0){
													  	$amt = $pm_info['pm_amount'];
													  }else{
													  	$amt = $pm_info['pm_amount'];
													  }?>
													  <input type="text" name="promo_amount" class="form-control text-primary text-right font-weight-bold" id="promo_amount" aria-describedby="basic-addon1" value="<?= $amt ?>" >
													</div>	

											</div>
										</div> 
										<div class="col-md-3"> 
											<br>
											<button type="submit" class="btn btn-primary" id="btnEditPromoMerchant">Update</button>
										</div> 
									</div>
								</form>
								
							</div>
						</div> 
					
					</div> 
 

					</div> 
 			 		<!--<div class="row move-top">
					 <div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row"> 
									<div class="col-md-3">Promo Tags</div>
								</div>
							</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="tagtypePromoForm" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="hidden" name="po_id" id="po_id" value="<?= $pm_info['po_id'] ?>">
										<input type="hidden" name="user_id" id="user_id" value="<?= $pm_info['user_id'] ?>">
										<input type="hidden" name="merchant_id" id="merchant_id" value="<?= $pm_info['merchant_id'] ?>">

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
										<button type="submit" class="btn btn-primary" id="btnAddPromoTagType">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table"> 
											
											<tbody id="tagPromoTypeTable">


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>-->
					


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
		              <p class="font-12">Are you sure you want to delete this tag?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletePromotagtype">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>
 	
		<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
		<script type="text/javascript">
  
			$(function(){

				  displayPromoTagTypes();

					$('#btnEditPromoMerchant').click(function(){
						
						var data = $('#editMerchantPromoform').serialize();
  
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processEditPromoMerchantInfo') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 

								            toastr['info']('Promo updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update promo.');
								          }
					});
										}); 
 

					$('#btnAddPromoTagType').click(function(){
						
						var data = $('#tagtypePromoForm').serialize();
  
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processPromoTagType') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){ 
								          	displayPromoTagTypes();
								            toastr['info']('Promo tags updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update promo tags.');
								          }
					});
 
					}); 

					$('#tagPromoTypeTable').on('click','.btn-delete', function(){
						var pot_id = $(this).attr('data');
						$('#deletemodal').modal('show');
						$('#btndeletePromotagtype').unbind().click(function(){
							$.ajax({
								type : 'ajax',
								method : 'get',
								async : false,
								url : '<?= base_url('Merchant/destroyPromoTagType') ?>',
								data : {pot_id:pot_id},
								dataType : 'json',
								success : function(response){
									if (response.success) {
										$('#deletemodal').modal('hide');
										displayPromoTagTypes();
										toastr['info']('Tag deleted.');
									}
									else{
										$('#deletemodal').modal('hide');
										toastr['error']("Can't delete this tag.");
									}
									
								},
								error : function(){
									alert("Error deleting tag.");
								}
							});
						});
					});



					function displayPromoTagTypes(){

					var po_id = $('#po_id_main').val();

					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/displayPromoTagType') ?>',
									data : {po_id:po_id},
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
													'<td class="text-right"><a href="#" data="'+ data[type].pot_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}

										$('#tagPromoTypeTable').html(html);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								}); 
							}

						$("select[name='live']").change(function(){

						var live = $("select[name='live']").val();
						var po_id = $('#po_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processLive') ?>',
								          data : {live:live,po_id:po_id},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Live updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update live.');
								          }
								        });
							});

						$("select[name='featured']").change(function(){

						var featured = $("select[name='featured']").val();
						var po_id = $('#po_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processFeaturedPromo') ?>',
								          data : {featured:featured,po_id:po_id},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Featured updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Featured.');
								          }
								        });
							});

						$("select[name='redeem_deal']").change(function(){

						var redeem = $("select[name='redeem_deal']").val();
						var po_id = $('#po_id_main').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processRedeem') ?>',
								          data : {redeem:redeem,po_id:po_id},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Redeem updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Redeem.');
								          }
								        });
							});


					

	}); 


					 
				
					

 

		</script>