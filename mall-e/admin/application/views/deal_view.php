			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Deals</div>
							<div class="card-body">
								<form method="post" action="" id="dealform" autocomplete="off">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<input type="text" name="merchantname" id="merchantname" placeholder="Merchant Name" class="form-control" list="datalist1" required>
												<datalist id="datalist1">



												<?php 
														foreach ($merchantnames as $merch) {
															?>

															<option value="<?= $merch->merchant_name ?>">

												<?php
														}

												 ?>	
										
											</datalist>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<input type="text" name="mallname" id="mallname" placeholder="Mall Name" class="form-control" list="datalist2" required>


												<datalist id="datalist2">



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
										<div class="col-md-1">
											<button type="submit" class="btn btn-primary" id="btnupdate">Update</button>
										</div>
									</div>
								</form>

								<div class="row">
									<div class="col-md-12">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Deal Id</th>
													<th>Created On</th>
													<th>Created By</th>
													<th>Merchant</th>
													<th>Mall</th>
													<th>
														<span class="text-danger">Edit</span>
														|
														<span class="text-success">Delete</span>
													</th>
													<th>Deal Status</th>
													<th>Featured</th>
													<th></th>
												</tr>
											</thead>
											<tbody id="dealtable">
												
											</tbody>
											
										</table>
									</div>
								</div>
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
		              <p class="font-12">Are you sure you want to delete this deal?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletedeal">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>
		
		<div class="modal fade" id="clonemodal" tabindex="-1" role="dialog" aria-labelledby="clonemodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="clonemodallabel">Clone Deal</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <p class="font-12">Do you wish to clone this deal?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnclonedeal">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>



 
		
		<script type="text/javascript">




			$(function(){

				displayDeals();

				function displayDeals(){

					$.ajax({
								type : 'ajax',
								url : '<?= base_url('Deal/displayDeals') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var m;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(m = 0; m < data.length ; m++){
											
											var href = '<?= base_url('Deal/EditDeal/') ?>';

											var sel = 'selected';
											
											html += '<tr>'+
														'<td>'+ data[m].deal_id +'</td>'+
														'<td>'+ moment(data[m].deal_date).format('DD-MM-YYYY') +'</td>'+
														'<td>'+ data[m].short_name +'</td>'+
														'<td>'+ data[m].merchant_name +'</td>'+
														'<td>'+ data[m].mall_name +'</td>'+
														'<td class="text-right"><a href="'+href+ data[m].deal_master_id +'/'+data[m].dm_id+'" data="'+ data[m].deal_master_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].deal_master_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
														'<td><select name="dealstatus" id="dealstatus" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].deal_status == 'P') {
															html +=	'<option value="P" '+ sel +'>Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L">Live</option>';
														}
														else if(data[m].deal_status == 'D'){
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D"  '+ sel +'>Draft</option>'+
																	'<option value="L">Live</option>';
														}else{
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L"  '+ sel +'>Live</option>';
														}

													
													html += '</select></td>'+
													'<td><select name="featured" id="featured" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].featured == 'N' || data[m].featured == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += '</select></td>'+
														'<td> <a href="#" class="text-danger btn-clone" data="'+ data[m].deal_master_id +'">Clone</a></td>'+
													'</tr>'+
													'<tr>'+
														'<td colspan="1" class="text-danger font-weight-bold">'+ data[m].Sub_Category_name +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold">'+ '<span class="text-danger" >' + data[m].deal_main_name+'</span> <br>'+ data[m].short_desc +'</td>'+
														'<td colspan="1" class="text-primary font-weight-bold"><span class="text-danger" >Deal </span> <br>'+ data[m].currency_symbol + ' ' +data[m].deal_amount +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold"><span class="text-danger" >Usual Price </span> <br> '+ data[m].currency_symbol + ' ' +data[m].usual_price +'</td>'+
													'</tr>';

										
										}
									}
									
									$('#dealtable').html(html);
								},
								error : function(){

								}
							});

				}


				
				var merchant_name = '';
				var mall_name = '';
				$("#merchantname").on('input', function () {
					var val = this.value;
					if($('#datalist1 option').filter(function(){
						return this.value.toUpperCase() === val.toUpperCase();        
					}).length) {
						//send ajax request
						//alert(this.value);
					merchant_name = this.value;
					mall_name = $("#mallname").val();

					$.ajax({
								type : 'ajax',
								method : 'post',
								url : '<?= base_url('Deal/displayDealsbyMerchantMall/') ?>',
								async : false,
								data : {merchant_name: merchant_name,mall_name:mall_name},
								dataType : 'json',
								success : function(data){
									var html = '';
									var m;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(m = 0; m < data.length ; m++){
											
											var href = '<?= base_url('Deal/EditDeal/') ?>';

											var sel = 'selected';
											
											html += '<tr>'+
														'<td>'+ data[m].deal_id +'</td>'+
														'<td>'+ moment(data[m].deal_date).format('DD-MM-YYYY') +'</td>'+
														'<td>'+ data[m].short_name +'</td>'+
														'<td>'+ data[m].merchant_name +'</td>'+
														'<td>'+ data[m].mall_name +'</td>'+
														'<td class="text-right"><a href="'+href+ data[m].deal_master_id +'/'+data[m].dm_id+'" data="'+ data[m].deal_master_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].deal_master_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
														'<td><select name="dealstatus_search1" id="dealstatus_search1" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].deal_status == 'P') {
															html +=	'<option value="P" '+ sel +'>Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L">Live</option>';
														}
														else if(data[m].deal_status == 'D'){
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D"  '+ sel +'>Draft</option>'+
																	'<option value="L">Live</option>';
														}else{
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L"  '+ sel +'>Live</option>';
														}

													
													html += '</select></td>'+
													'<td><select name="featured_search1" id="featured_search1" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].featured == 'N' || data[m].featured == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += '</select></td>'+
														'<td> <a href="#" class="text-danger btn-clone" data="'+ data[m].deal_master_id +'">Clone</a></td>'+
													'</tr>'+
													'<tr>'+
														'<td colspan="1" class="text-danger font-weight-bold">'+ data[m].Sub_Category_name +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold">'+ '<span class="text-danger" >' + data[m].deal_main_name+'</span> <br>'+ data[m].short_desc +'</td>'+
														'<td colspan="1" class="text-primary font-weight-bold"><span class="text-danger" >Deal </span> <br>'+ data[m].currency_symbol + ' ' +data[m].deal_amount +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold"><span class="text-danger" >Usual Price </span> <br> '+ data[m].currency_symbol + ' ' +data[m].usual_price +'</td>'+
													'</tr>';

										
										}
									}
									
									$('#dealtable').html(html);
								},
								error : function(){

								}
							});

					}
				});
				
				
				$("#mallname").on('input', function () {
					var val = this.value;
					if($('#datalist2 option').filter(function(){
						return this.value.toUpperCase() === val.toUpperCase();        
					}).length) {
						//send ajax request
						//alert(this.value);
					mall_name = this.value;
					merchantname = $("#merchantname").val();

					$.ajax({
								type : 'ajax',
								method : 'post',
								url : '<?= base_url('Deal/displayDealsbyMerchantMall/') ?>',
								async : false,
								data : {merchant_name: merchant_name,mall_name:mall_name},
								dataType : 'json',
								success : function(data){
									var html = '';
									var m;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(m = 0; m < data.length ; m++){
											
											var href = '<?= base_url('Deal/EditDeal/') ?>';

											var sel = 'selected';
											
											html += '<tr>'+
														'<td>'+ data[m].deal_id +'</td>'+
														'<td>'+ moment(data[m].deal_date).format('DD-MM-YYYY') +'</td>'+
														'<td>'+ data[m].short_name +'</td>'+
														'<td>'+ data[m].merchant_name +'</td>'+
														'<td>'+ data[m].mall_name +'</td>'+
														'<td class="text-right"><a href="'+href+ data[m].deal_master_id +'/'+data[m].dm_id+'" data="'+ data[m].deal_master_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].deal_master_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
														'<td><select name="dealstatus_search2" id="dealstatus_search2" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].deal_status == 'P') {
															html +=	'<option value="P" '+ sel +'>Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L">Live</option>';
														}
														else if(data[m].deal_status == 'D'){
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D"  '+ sel +'>Draft</option>'+
																	'<option value="L">Live</option>';
														}else{
															html +=	'<option value="P">Pending</option>'+
																	'<option value="D">Draft</option>'+
																	'<option value="L"  '+ sel +'>Live</option>';
														}

													
													html += '</select></td>'+
													'<td><select name="featured_search2" id="featured_search2" class="deal-status" data="'+ data[m].deal_master_id +'">';

														if (data[m].featured == 'N' || data[m].featured == '') {
															html +=	'<option value="N" '+ sel +'>No</option>'+
																	'<option value="Y">Yes</option>';
														}else{
															html +=	'<option value="Y" '+ sel +'>Yes</option>'+
																	'<option value="N">No</option>';
														}

													
													html += '</select></td>'+
														'<td> <a href="#" class="text-danger btn-clone" data="'+ data[m].deal_master_id +'">Clone</a></td>'+
													'</tr>'+
													'<tr>'+
														'<td colspan="1" class="text-danger font-weight-bold">'+ data[m].Sub_Category_name +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold">'+ '<span class="text-danger" >' + data[m].deal_main_name+'</span> <br>'+ data[m].short_desc +'</td>'+
														'<td colspan="1" class="text-primary font-weight-bold"><span class="text-danger" >Deal </span> <br>'+ data[m].currency_symbol + ' ' +data[m].deal_amount +'</td>'+
														'<td colspan="3" class="text-primary font-weight-bold"><span class="text-danger" >Usual Price </span> <br> '+ data[m].currency_symbol + ' ' +data[m].usual_price +'</td>'+
													'</tr>';

										
										}
									}
									
									$('#dealtable').html(html);
								},
								error : function(){

								}
							});

					}
				});
				
				
				
				$('#btnupdate').click(function(e){
					e.preventDefault();

					var data = $('#dealform').serialize();


					if ($('#merchantname').val().length > 0) {
						if ($('#mallname').val().length > 0) {


									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDeal') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New deal added.');
								            displayDeals();
								            

								          },
								          error : function(xhr, ajaxOptions, thrownError){
								             toastr['error']('Could not save deal.');
								           
								          }
								        });


						}else{
							toastr["warning"]("Mall Name can't be null.");
						}
					}else{
						toastr["warning"]("Merchant Name can't be null.");
					}

				});

				$('#dealtable').on('click','.btn-delete',function(e){
					e.preventDefault();

					var deal_master_id = $(this).attr('data');

					$('#deletemodal').modal('show');

					$('#btndeletedeal').unbind().click(function(){


							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/destroyDeal') ?>',
									data : {deal_master_id:deal_master_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayDeals();
											toastr['info']('Deal deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this deal.");
										}
										
									},
									error : function(){
										alert("Error deleting deal.");
									}
								});



					});

				});
				
				$('#dealtable').on('click','.btn-clone',function(e){
					e.preventDefault();

					var dm_id = $(this).attr('data');

					$('#clonemodal').modal('show');

					$('#btnclonedeal').unbind().click(function(){


							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/cloneDeal') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#clonemodal').modal('hide');
											displayDeals();
											toastr['info']('Deal cloned.');
										}
										else{
											$('#clonemodal').modal('hide');
											toastr['error']("Can't clone this deal.");
										}
										
									},
									error : function(){
										alert("Error cloning deal.");
									}
								});



					});

				});

				
				$('#dealtable').on('change','#dealstatus',function(){

					var deal_master_id = $(this).attr('data');
					var deal_status = $('#dealstatus').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealStatus') ?>',
								          data : {deal_master_id:deal_master_id,deal_status:deal_status},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal status updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal status.');
								          }
								        });

				});
				
					$('#dealtable').on('change','#dealstatus_search1',function(){

					
					var deal_master_id = $(this).attr('data');
					var deal_status = $('#dealstatus').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealStatus') ?>',
								          data : {deal_master_id:deal_master_id,deal_status:deal_status},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal status updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal status.');
								          }
								        });

				});
				
				$('#dealtable').on('change','#dealstatus_search2',function(){

					
					var deal_master_id = $(this).attr('data');
					var deal_status = $('#dealstatus').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealStatus') ?>',
								          data : {deal_master_id:deal_master_id,deal_status:deal_status},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal status updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal status.');
								          }
								        });

				});
				
				
				$('#dealtable').on('change','#featured',function(){

					var deal_master_id = $(this).attr('data');
					var featured_data = $('#featured').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealFeature') ?>',
								          data : {deal_master_id:deal_master_id,featured_data:featured_data},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal featured updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal featured.');
								          }
								        });

				});
				
				$('#dealtable').on('change','#featured_search1',function(){

					var deal_master_id = $(this).attr('data');
					var featured_data = $('#featured_search1').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealFeature') ?>',
								          data : {deal_master_id:deal_master_id,featured_data:featured_data},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal featured updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal featured.');
								          }
								        });

				});
                
                $('#dealtable').on('change','#featured_search2',function(){

					var deal_master_id = $(this).attr('data');
					var featured_data = $('#featured_search2').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processDealFeature') ?>',
								          data : {deal_master_id:deal_master_id,featured_data:featured_data},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal featured updated.');
								           	displayDeals();

								          },
								          error : function(){
								            toastr['error']('Could not update deal featured.');
								          }
								        });

				});


		 	});


		</script>