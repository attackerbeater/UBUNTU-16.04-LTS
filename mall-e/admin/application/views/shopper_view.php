			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Shoppers</div>
							<div class="card-body">
								<div class="row mt-4 ml-0">
									<div class="col-md-11">
										<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Registered on</th>
														<th>Full Name</th>
														<th>Gender</th>
														<th>Mobile #</th>
														<th>Email ID</th>
													</tr>
												</thead>
												<tbody id="shoppers_table">
													
													<?php 

															if ($shoppers) {

																foreach ($shoppers as $shopper) {
																	?>

																		<tr>
																			
																			<td><?= $shopper->Registered_on ?></td>
																			<td><?= $shopper->Shopper_name ?></td>

																			<?php 

																				if ($shopper->Gender == 0) {
																					$gender = 'Male';
																				}else{
																					$gender = 'Female';
																				}

																			 ?>

																			<td><?= $gender ?></td>
																			<td><?= $shopper->Mobile_number ?></td>
																			<td><?= $shopper->Email_id ?></td>

																		</tr>


																	<?php
																}

															}else{

																?>

																<script type="text/javascript">
																		
																		var	html = '<p class="alert mt-4" role="alert">No available data.</p>';

																		$('#shoppers_table').html(html);
																</script>

																<?php

															}

													 ?>


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
		              <p class="font-12">Are you sure you want to delete this merchant?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletemerchant">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>



 
		
		<script type="text/javascript">




			$(function(){




		 	});


		</script>