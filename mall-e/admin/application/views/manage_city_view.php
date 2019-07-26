			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle"><div class="row">
								<div class="col-md-4">
									<a href="<?= base_url('country') ?>" class="text-danger">Manage Country</a>
								</div>
								<div class="col-md-4 text-primary">
									Manage City
								</div>
								<div class="col-md-4">
									<a href="<?= base_url('town') ?>" class="text-danger">Manage Town</a>
								</div>
							</div></div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="cityform" autocomplete="off">
									<div class="form-group col-md-5">
										<input type="text" name="cityname" id="cityname" placeholder="City Name" class="form-control col-md-12" required>
									</div>
									<div class="col-md-2">
										<div class="dropdown">
											  <button class="btn btn-secondary dropdown-toggle btn-country" type="button" id="countryoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Country</button>
											  <div class="dropdown-menu drop" aria-labelledby="countryoption">
											    <?php 
													foreach ($countries as $country) {
														?>
														<a class="dropdown-item" href="#" data="<?= $country->country_id ?>"><?= $country->country_name ?></a>

												<?php
													}
												 ?>
											  </div>
											</div> 
											<input type="hidden" name="country_id" id="country_id">
									</div>
									<div class="col-md-1 ml-2">
										<button type="submit" class="btn btn-primary" id="btnAddCity">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>City Name</th>
													<th>Country Name</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="cityTable">


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
		              <p class="font-12">Are you sure you want to delete this city?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletecity">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">
			
			    var mallUpdateData = {};
					function init() {
							var options = {
									types: ['(cities)']
							};
							var input = document.getElementById('cityname');
							var autocomplete = new google.maps.places.Autocomplete(input, options);
							
							autocomplete.addListener('place_changed', function () {
									var loc = autocomplete.getPlace();
									
									document.getElementById("cityname").value = loc.name;
									document.getElementById("cityname").disabled = false;
									
							});
					}
					google.maps.event.addDomListener(window, 'load', init);

				$(function(){

						displayCities();
						
						$(".drop").on('click','a',function(){
							 $(".btn-country:first-child").html($(this).text()+' <span class="caret"></span>');
							 $('#country_id').val($(this).attr('data'));
						})

						function displayCities(){
							$.ajax({
								type : 'ajax',
								url : '<?= base_url('City/displayCities') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var country;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(country = 0; country < data.length ; country++){
											
											
											html += '<tr>'+
														'<td>'+ data[country].city_name +'</td>'+
														'<td>'+ data[country].country_name +'</td>'+
														'<td class="text-right"><a href="#" data="'+ data[country].city_id +'" class="text-danger btn-delete">Delete</a></td>'+
													'</tr>';

										
										}
									}


									
									$('#cityTable').html(html);
								},
								error : function(){

								}
							});
						}

						$('#btnAddCity').click(function(e){
							e.preventDefault();

							var data = $('#cityform').serialize();

							if ($('#cityname').val().length > 0) {
								if ($('#country_id').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('City/processCity') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New city added.');
								            displayCities();

								          },
								          error : function(){
								            toastr['error']('Could not save city.');
								          }
								        });


								}else{
									toastr["error"]("Please select country.");
								}
							}else{
								toastr["error"]("City Name can't be null.");
							}

						});

						$('#cityTable').on('click','.btn-delete',function(){
							var ct_id = $(this).attr('data');
							$('#deletemodal').modal('show');

							$('#btndeletecity').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('City/destroyCity') ?>',
									data : {ct_id:ct_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayCities();
											toastr['info']('City deleted.');
										}
										else{
											$('#deleteThisPost').modal('hide');
											toastr['error']("Can't delete this city.");
										}
										
									},
									error : function(){
										alert("Error deleting city.");
									}
								});
							});

						});

				})


			</script>