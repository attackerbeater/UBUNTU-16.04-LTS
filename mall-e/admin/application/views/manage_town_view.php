			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle"><div class="row">
								<div class="col-md-4">
									<a href="<?= base_url('country') ?>" class="text-danger">Manage Country</a>
								</div>
								<div class="col-md-4">
									<a href="<?= base_url('city') ?>" class="text-danger">Manage City</a>
								</div>
								<div class="col-md-4 text-primary">
									Manage Town
								</div>
							</div></div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="cityform" autocomplete="off">
									<div class="form-group col-md-5">
										<input type="text" name="townName" id="townName" placeholder="Town Name" class="form-control col-md-12" required>
									</div>
									<div class="col-md-2">
										<div class="dropdown">
											  <button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select City</button>
											  <div class="dropdown-menu" aria-labelledby="countryoption">
											    <?php 
													foreach ($cities as $city) {
														?>
														<a class="dropdown-item" href="#" data="<?= $city->city_id ?>"><?= $city->city_name ?></a>

												<?php
													}
												 ?>
											  </div>
											</div> 
											<input type="hidden" name="city_id" id="city_id">
									</div>
									<div class="col-md-1 ml-2">
										<button type="submit" class="btn btn-primary" id="btnAddTown">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Town Name</th>
													<th>City Name</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="townTable">


											</tbody>
										</table>
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
		              <p class="font-12">Are you sure you want to delete this town?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletetown">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">
			    var mallUpdateData = {};
					function init() {
							var options = {
									types: ['(regions)']
							};
							var input = document.getElementById('townName');
							var autocomplete = new google.maps.places.Autocomplete(input, options);
							
							autocomplete.addListener('place_changed', function () {
									var loc = autocomplete.getPlace();
									
									document.getElementById("townName").value = loc.name;
									document.getElementById("townName").disabled = false;
									
							});
					}
					google.maps.event.addDomListener(window, 'load', init);

				$(function(){

						displayTowns();
						
						$(".dropdown-menu").on('click','a',function(){
							 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
							 $('#city_id').val($(this).attr('data'));
						})

						function displayTowns(){

							$.ajax({
								type : 'ajax',
								url : '<?= base_url('Town/displayTowns') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var town;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(town = 0; town < data.length ; town++){
											
											
											html += '<tr>'+
														'<td>'+ data[town].town_name +'</td>'+
														'<td>'+ data[town].city_name +'</td>'+
														'<td class="text-right"><a href="#" data="'+ data[town].town_id +'" class="text-danger btn-delete">Delete</a></td>'+
													'</tr>';

										
										}
									}


									
									$('#townTable').html(html);
								},
								error : function(){

								}
							});

						}

						$('#btnAddTown').click(function(e){
							e.preventDefault();

							var data = $('#cityform').serialize();

							if ($('#townName').val().length > 0) {
								if ($('#city_id').val().length > 0) {
									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Town/processTown') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New town added.');
								            displayTowns();

								          },
								          error : function(){
								            toastr['error']('Could not save town.');
								          }
								        });


								}else{
									toastr["error"]("Please select city.");
								}
							}else{
								toastr["error"]("Town Name can't be null.");
							}

						});

						$('#townTable').on('click','.btn-delete',function(){
							var town_id = $(this).attr('data');
							$('#deletemodal').modal('show');

							$('#btndeletetown').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Town/destroyTown') ?>',
									data : {town_id:town_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayTowns();
											toastr['info']('Town deleted.');
										}
										else{
											$('#deleteThisPost').modal('hide');
											toastr['error']("Can't delete this mall type.");
										}
										
									},
									error : function(){
										alert("Error deleting town.");
									}
								});
							});

						});

				})


			</script>