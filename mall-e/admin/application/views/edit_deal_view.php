			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-3">Deal ID : <span class="text-danger"><?= $deal['deal_id'] ?></span></div>
									<input type="hidden" name="merchant_id_main" id="merchant_id_main" value="<?= $deal['merchant_id'] ?>">
									<input type="hidden" name="dm_id_main" id="dm_id_main" value="<?= $deal['dm_id'] ?>">
									<?php 

										$dealdate = new DateTime($deal['deal_date']);

									 ?>
									<div class="col-md-4">| Created On : <span class="text-danger"><?= $dealdate->format('d-m-Y') ?></span></div>
									<div class="col-md-3">| Created By : <span class="text-danger"><?= $deal['short_name'] ?></span></div>
									<div class="col-md-2 text-right">
										<a href="#" onclick="history.back();" class="text-primary">Back</a>
									</div>
								</div>
							</div>
							<div class="card-body">
								
								<form method="post" action="" id="editdealform" autocomplete="off">
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<input type="hidden" name="deal_master_id" value="<?= $deal['deal_master_id'] ?>">
												<label class="mb-2 font-12">Merchant Name</label>
												<input type="text" name="merchantname" id="merchantname" class="form-control" value="<?= $deal['merchant_name'] ?>" list="datalist1" placeholder="Merchant Name" required>

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
										<div class="col-md-5">
											<div class="form-group">
												<label class="mb-2 font-12">Mall Name</label>
												<input type="text" name="mallname" id="mallname" placeholder="Mall Name" class="form-control" value="<?= $deal['mall_name'] ?>" list="datalist2" required>


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
										<div class="col-md-2">
											<button type="submit" class="btn btn-primary mt-3 float-right" id="btnUpdateDeal">Update</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5">
											<div class="form-group">
												<label class="mb-2 font-12">Sub-Category</label>
												<input type="text" name="subcategory" id="subcategory" placeholder="Sub Category" required value="<?= $deal['Sub_Category_name'] ?>" class="form-control col-md-6" list="datalist3">


												<datalist id="datalist3">



												<?php 
														foreach ($subs as $sub) {
															?>

															<option value="<?= $sub->Sub_Category_name ?>">

												<?php
														}

												 ?>	
										
											</datalist>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<label class="mb-2 font-12">Location</label>
												<input type="text" name="Location" class="form-control" readonly value="<?= $deal['merchant_location'] ?>">
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<select name="dealstatus" id="dealstatus" class="deal-status  float-right" data="<?= $deal['deal_master_id'] ?>">
													<?php 
														if ($deal['deal_status'] == 'P') {
														?>

															<option value="P" selected>Pending</option>
															<option value="D">Draft</option>
															<option value="L">Live</option>

														<?php
														}elseif($deal['deal_status'] == 'D'){
														?>

															<option value="P">Pending</option>
															<option value="D" selected>Draft</option>
															<option value="L">Live</option>

														<?php
														}else{
														?>

															<option value="P">Pending</option>
															<option value="D">Draft</option>
															<option value="L" selected>Live</option>

														<?php
														}
													 ?>
												</select>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
									   <div class="col-md-5">
										<div class="form-group">
												<input type="hidden" name="dm_id_main2" id="dm_id_main2" value="<?= $deal['dm_id'] ?>">
												<input type="hidden" name="deal_main_name" id="deal_main_name" value="<?= $deal['deal_main_name'] ?>">
												<label class="mb-2 font-12">Deal Name</label>
												<select class="form-control" id="select_deals"> 
													
												</select>
												
									        </div>
									   </div>
									   <div class="col-md-5" id="deal_image_input">
									   		<input type="hidden" name="di_id1" id="di_id1" value="<?= $deal['di_id'] ?>">
									   </div>
									 
									</div>
									<div class="row">

										<div class="col-md-5">
											<div class="form-group">
												<label class="mb-2 font-12">Deal Details</label>
												<textarea style="height: 200px;" class="form-control" placeholder="Deal in short" name="short_desc" id="short_desc" required rows="2"><?= $deal['short_desc'] ?></textarea>
											</div>
										</div>
										<div class="col-md-5">
										 <div class="row">
											<div class="col-md-6">

												<label class="mb-2 font-12">Whats the deal</label>
													<div class="input-group mb-3">
													  <div class="input-group-prepend">
													    <span class="input-group-text text-primary font-weight-bold" id="basic-addon1"><?= $deal['currency_symbol'] ?></span>
													  </div>
													  <input type="text" name="dealamount" class="form-control text-primary text-right font-weight-bold" id="dealamount" aria-describedby="basic-addon1" value="<?= $deal['deal_amount'] ?>" placeholder="0.00" onkeypress="return isNumber(event)">
													</div>											
											
										    </div>
										    <div class="col-md-6">
											<label class="mb-2 font-12">Usual Price</label>
													<div class="input-group mb-3">
													  <div class="input-group-prepend">
													    <span class="input-group-text text-danger font-weight-bold" id="basic-addon1"><?= $deal['currency_symbol'] ?></span>
													  </div>
													  <input type="text" name="usualprice" id="usualprice" class="form-control text-danger text-right font-weight-bold"  aria-describedby="basic-addon1" value="<?= $deal['usual_price'] ?>" onkeypress="return isNumber(event)">
													</div>											

										</div>
										<br>

										<div class="col-md-6">
											<label class="mb-2 font-12">Deal Starts on</label> 
											<div class="input-group"> 
												<input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control py-2 border-right-0 border" value="<?= date('d/m/Y')  ?>" > 

									            <span class="input-group-append">
									                <button class="btn btn-outline-secondary border-left-0 border" type="button">
									                    <i class="fa fa-calendar"></i>
									                </button>
									              </span>
									        </div> 
											<div class="checkbox">
														  <label class="mb-2 font-12"><input type="checkbox" value="Y" name="no_end_date" id="no_end_date"  <?php if($deal['no_end_date'] == "Y"){ ?> checked <?php } ?>> No End Date</label>
														</div>
												
										</div>
										<div class="col-md-6">
											<label class="mb-2 font-12">Deals Ends on </label>
											<div class="input-group"> 
												<input type="text" name="end_date" id="end_date" placeholder="End Date" value="<?= $deal['deal_ends'] ?>"  class="form-control py-2 border-right-0 border" <?php if($deal['no_end_date'] == "Y"){ ?> disabled <?php } ?>>
									            <span class="input-group-append">
									                <button class="btn btn-outline-secondary border-left-0 border" type="button">
									                    <i class="fa fa-calendar"></i>
									                </button>
									              </span>
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
							<div class="card-header-malle">Deal Images</div>
							<div class="card-body">
								<div class="row" id="deal_images">

									<?php
										if ( $deal['deal_image'] != '') {
									 ?>
										 <div class="col-md-4">
													<!--<img src="<?= base_url('deal_images/') ?><?= $deal['deal_image'] ?>" class="img-thumbnail"> -->
												<?php if($deal['loc'] == '1'){?>
															<img src="<?= base_url('promos/') ?><?= $deal['deal_image'] ?>" class="img-thumbnail">
														<?php } else{?>
															<img src="<?= base_url('deal_images/') ?><?= $deal['deal_image'] ?>" class="img-thumbnail">
														<?php } ?>	
										</div>

									 <?php		
										}
									?>
 
											
								</div>
							</div>
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
								<table class="table table-striped malle-table"> 
											
											<tbody id="tblDealTags">


											</tbody>
										</table>
							</div>
						</div>
					</div>	
				</div>

				<div class="row move-top">
					 <div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row"> 
									<div class="col-md-5">Deals - By Week</div>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-striped malle-table"> 
											<thead>
												<th>Monday</th>
												<th>Tuesday</th>
												<th>Wednesday</th>
												<th>Thursday</th>
												<th>Friday</th>
												<th>Saturday</th>
												<th>Sunday</th>
											</thead>
											<tbody id="tblDOW">

												<tr>
													<td>
														<select name="Monday" id="Monday" class="deal-status" >

															<?php 
																if ($dow['monday'] == 'N' || $dow['monday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Tuesday" id="Tuesday" class="deal-status">
															<?php 
																if ($dow['tuesday'] == 'N' || $dow['tuesday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Wednesday" id="Wednesday" class="deal-status">
															<?php 
																if ($dow['wednesday'] == 'N' || $dow['wednesday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Thursday" id="Thursday" class="deal-status">
															<?php 
																if ($dow['thursday'] == 'N' || $dow['thursday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Friday" id="Friday" class="deal-status">
															<?php 
																if ($dow['friday'] == 'N' || $dow['friday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Saturday" id="Saturday" class="deal-status">
															<?php 
																if ($dow['saturday'] == 'N' || $dow['saturday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													<td>
														<select name="Sunday" id="Sunday" class="deal-status">
															<?php 
																if ($dow['sunday'] == 'N' || $dow['sunday'] == '') {
															?>
																<option value="Y">Yes</option>
																<option value="N" selected>No</option>
															<?php
																} else{
															?>	
																<option value="Y" selected>Yes</option>
																<option value="N" >No</option>
															<?php } ?>
														</select>
													</td>
													
												</tr>
											</tbody>
										</table>
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


 	
		<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
		<script type="text/javascript">

		
				function isNumber(evt) {
				    evt = (evt) ? evt : window.event;
				    var charCode = (evt.which) ? evt.which : evt.keyCode;
				    if (charCode > 31 && (charCode < 46 || charCode > 57) ) {
				        return false;
				    }

				    return true;
				}


			$(function(){

				$('#dealamount').focusout(function(){
					var s = $(this).val();

					var sss = parseFloat(s);
					var ss = sss.toFixed(2);

					$(this).val(ss);
				});

				$('#usualprice').focusout(function(){
					var s = $(this).val();

					var sss = parseFloat(s);
					var ss = sss.toFixed(2);

					$(this).val(ss);
				});

				$("#select_deals").change(function(){
					var dm_id = $(this).val();
					
					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/displayDealsMainSpec') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
										
										}else{
										
											for(c = 0; c < data.length ; c++){	
												$('#short_desc').val(data[c].deal_details);  
								          		$('#dealamount').val(data[c].deal_amount);  
								          		$('#dm_id_main2').val(data[c].dm_id); 
								          
											}
										}

									},
									error : function(){
										alert("Error retrieving locations.");
									}
								});
                        
                        	$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/displayDealsMainImg') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';
                                        var html2 = '';
										var c ;

										if (data.length == 0) {
										
										}else{
										
											for(c = 0; c < data.length ; c++){	
											    
											    var href = '<?= base_url('deal_images/') ?>';
											    var href1 = '<?= base_url('promos/') ?>';
                                                html += '<div class="col-md-4">';

                                                if(data[c].loc == 1){

													 html +=  '<img src="'+ href1 + data[c].deal_image +'" class="img-thumbnail">';
                                                }else{
                                                	 html +=  '<img src="'+ href + data[c].deal_image +'" class="img-thumbnail">';
                                                }
												 html += '</div>';
												
												html2 += '<input type="hidden" name="di_id'+data[c].img_count+'" id="di_id'+data[c].img_count+'" value="'+ data[c].di_id +'">';

								          
											}
										}
										
											$('#deal_images').html(html);
                                            $('#deal_image_input').html(html2);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								});

			       });

				$('#btnUpdateDeal').click(function(e){
					e.preventDefault();


					var data = $('#editdealform').serialize();

					if ($('#merchantname').val().length > 0) {

						if ($('#mallname').val().length > 0) {
							if ($('#subcategory').val().length > 0) {


										$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processEditDeal') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Deal updated.');
								           

								          },
								          error : function(){
								            toastr['error']('Could not update deal.');
								          }
								        });


							}else{
								toastr["warning"]("Sub-Category can't be null.");
							}
						}else{
							toastr["warning"]("Mall Name can't be null.");
						}

					}else{
						toastr["warning"]("Merchant Name can't be null.");
					}
				});




				$('#dealstatus').on('change',function(){
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

								          },
								          error : function(){
								            toastr['error']('Could not update deal status.');
								          }
								        });

				})



		 	});

		 		$('#tblDOW').on('change','#Monday',function(){

					var dm_id = $('#dm_id_main').val();
					var Monday = $('#Monday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processMonday') ?>',
								          data : {dm_id:dm_id,Monday:Monday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Monday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Monday.');
								          }
								        });

				});

					$('#tblDOW').on('change','#Tuesday',function(){

					var dm_id = $('#dm_id_main').val();
					var Tuesday = $('#Tuesday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processTuesday') ?>',
								          data : {dm_id:dm_id,Tuesday:Tuesday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Tuesday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Tuesday.');
								          }
								        });

				});
				

				$('#tblDOW').on('change','#Wednesday',function(){

					var dm_id = $('#dm_id_main').val();
					var Wednesday = $('#Wednesday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processWednesday') ?>',
								          data : {dm_id:dm_id,Wednesday:Wednesday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Wednesday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Wednesday.');
								          }
								        });

				});
				

				$('#tblDOW').on('change','#Thursday',function(){

					var dm_id = $('#dm_id_main').val();
					var Thursday = $('#Thursday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processThursday') ?>',
								          data : {dm_id:dm_id,Thursday:Thursday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Thursday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Thursday.');
								          }
								        });

				});
				

				$('#tblDOW').on('change','#Friday',function(){

					var dm_id = $('#dm_id_main').val();
					var Friday = $('#Friday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processFriday') ?>',
								          data : {dm_id:dm_id,Friday:Friday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Friday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Friday.');
								          }
								        });

				});
				

				$('#tblDOW').on('change','#Saturday',function(){

					var dm_id = $('#dm_id_main').val();
					var Saturday = $('#Saturday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processSaturday') ?>',
								          data : {dm_id:dm_id,Saturday:Saturday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Saturday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Saturday.');
								          }
								        });

				});
				

				$('#tblDOW').on('change','#Sunday',function(){

					var dm_id = $('#dm_id_main').val();
					var Sunday = $('#Sunday').val();

								$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Deal/processSunday') ?>',
								          data : {dm_id:dm_id,Sunday:Sunday},
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Sunday updated.');

								          },
								          error : function(){
								            toastr['error']('Could not update Sunday.');
								          }
								        });

				});
				

			$(function(){
				

				displayDeals();
				displayDealTags();	


				function displayDeals(){

					var merchant_id = $('#merchant_id_main').val();

					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/displayDealsMain') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											html += '<option value="'+$('#dm_id_main2').val()+'"> ' +  $('#deal_main_name').val() + '</option>';
											for(c = 0; c < data.length ; c++){	

											

												html += '<option value="'+ data[c].dm_id +'" >'+
													''+ data[c].deal_main_name +''+
												'</option>';

											}
										}

										$('#select_deals').html(html);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								});


				}



				  function displayDealTags(){

					var dm_id = $('#dm_id_main').val();
					$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Deal/displayDealTags') ?>',
									data : {dm_id:dm_id},
									dataType : 'json',
									success : function(data){
										// console.log(data);
										
										var html = '';
										var c ;
										var sel = 'selected';

								if (data.length == 0) {
									html += '<div class="alert alert-info mt-4" role="alert">No tag type(s) yet.</div>';
								}else{
									for(type = 0; type < data.length ; type++){
										
										
										html += '<tr>'+
													'<td>'+ data[type].tag_name +'</td>'+
												'</tr>';

									
									}
								}

										$('#tblDealTags').html(html);
									},
									error : function(){
										alert("Error retrieving locations.");
									}
								}); 
							}
			});

		</script>