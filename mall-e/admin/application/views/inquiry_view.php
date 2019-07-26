			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Inquiry</div>
							<div class="card-body">
								<div class="row mt-4 ml-0">
									<div class="col-md-11">
										<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Date</th>
														<th>Outlet Name</th>
														<th>Country</th>
														<th>Contact Person</th>
														<th>Contact Number</th>
														<th>Email</th>
													</tr>
												</thead>
												<tbody id="inquiry_table">
													
													<?php 

															if ($inquiries) {

																foreach ($inquiries as $inquiry) {
																	
																	$originalDate = $inquiry->Inquiry_Date;
																	$inquiry->Inquiry_Date = date("d/m/Y", strtotime($originalDate));
																	?>

																		<tr>
																			
																			<td><?= $inquiry->Inquiry_Date ?></td>
																			<td><?= $inquiry->Outlet_name ?></td>
																			<td><?= $inquiry->country_name ?></td>
																			<td><?= $inquiry->Contact_person ?></td>
																			<td><?= $inquiry->Contact_number ?></td>
																			<td><?= $inquiry->Email_id ?></td>

																		</tr>


																	<?php
																}

															}else{

																?>

																<script type="text/javascript">
																		
																		var	html = '<p class="alert mt-4" role="alert">No available data.</p>';

																		$('#inquiry_table').html(html);
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