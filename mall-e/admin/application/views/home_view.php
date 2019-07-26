
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Malls</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="mallform" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="hidden" name="lat" id="lat">
										<input type="hidden" name="long" id="long">
										<input type="text" name="mallname" placeholder="Mall Name" id="mallname" class="form-control col-md-12">
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
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddMall">Update</button>
									</div>
								</form>
								<br>
								<div class="row">
									<div class="col-md-10">
										<table class="table table-striped malle-table" id="mallTable">
										<thead>
												<tr>
													<th scope="col">Mall Name</th>
													<th scope="col">City</th>
													<th scope="col">Country</th>
													<th scope="col">Mall Type</th>
													<th scope="col">Active</th>
													<th scope="col">Featured</th>
												</tr>
											</thead>
											<tbody id="displayTable">
												
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
		              <p class="font-12">Are you sure you want to delete this mall?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnDeleteMall">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>
<!--
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDBnip6Qb5cLuPkYcVXPaPdIQHvFhdCnOQ"></script>-->


<script type="text/javascript">
	var lat = '';
	var long = '';

	var mallUpdateData = {};
    function init() {
        var options = {
            types: ['establishment']
        };
        var input = document.getElementById('mallname');
        var autocomplete = new google.maps.places.Autocomplete(input, options);
				
        autocomplete.addListener('place_changed', function () {
            var loc = autocomplete.getPlace();
            console.log(loc.geometry.location.lat());
            console.log(loc.geometry.location.lng());

            lat = loc.geometry.location.lat();
            long = loc.geometry.location.lng();

            $('#lat').val(lat);
            $('#long').val(long);

            mallUpdateData.lat = loc.geometry.location.lat();
            mallUpdateData.lng = loc.geometry.location.lng();

						document.getElementById("mallname").value = loc.name;
						document.getElementById("mallname").disabled = false;
						
        });
    }
    google.maps.event.addDomListener(window, 'load', init);

    $(function(){


		$(".dropdown-menu").on('click','a',function(){
			 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
			 $('#city_id').val($(this).attr('data'));
		})

		displayMalls();

						function displayMalls(){
							$.ajax({
								type : 'POST',
								url : '<?= base_url('Mall/displayMalls') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var mall;

									if (data.length == 0) {
										html += '<tr><td td colspan="10" style="text-align:center">No matching records found</td></tr>'; 
									}else{
										for(mall = 0; mall < data.length ; mall++){
											
											var href = '<?= base_url('Mall/EditMall/') ?>';
											
											html += '<tr>'+
																		'<td>'+ ((data[mall].mall_name != null)? data[mall].mall_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[mall].city_name != null)? data[mall].city_name : "Not Available"  )  +'</td>'+
																		'<td>'+ ((data[mall].country_name != null)? data[mall].country_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[mall].type_name != null)? data[mall].type_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[mall].mall_active == 'Y')? "Yes" : "No"  ) +'</td>'+
																		'<td>'+ ((data[mall].featured == 'Y')? "Yes" : "No"  ) +'</td>'+
																		'<td class="text-right"><a href="'+href+ data[mall].mall_id +'" data="'+ data[mall].mall_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[mall].mall_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
																	'</tr>';						
										}
									}
									
									$('#displayTable').html(html);
								},
								error : function(){

								}
							});
						}


						$('#btnAddMall').click(function(e){
							e.preventDefault();

							var data = $('#mallform').serialize();

							if ($('#mallname').val().length > 0) {
								if ($('#city_id').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Mall/processMall') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New mall added.');
								            displayMalls();

								          },
								          error : function(xhr, ajaxOptions, thrownError){
								             toastr['error']('Could not save mall.');
								           
								          }
								        });


								}else{
									toastr["error"]("Please select city.");
								}
							}else{
								toastr["error"]("Mall Name can't be null.");
							}

						});


						$('#mallTable').on('click','.btn-delete',function(){
							var mall_id = $(this).attr('data');
							$('#deletemodal').modal('show');

							$('#btnDeleteMall').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Mall/destroyMall') ?>',
									data : {mall_id:mall_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayMalls();
											toastr['info']('Mall deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this mall.");
										}
										
									},
									error : function(){
										alert("Error deleting mall.");
									}
								});
							});

						});

						$(document).ready(function(){
							$("#mallname").keyup(function(){
								if($("#mallname").val().length>=1){

									$.ajax({
									type: "POST",
									url: "<?= base_url('Mall/liveSearchMalls') ?>",
									cache: false,    
									dataType : 'json',
									data:'search='+$("#mallname").val(),
									success: function(data){
										var html = '';
										var m;
										if(data.length>0){
											try{
												for(m = 0; m < data.length ; m++){
															
															var href = '<?= base_url('Mall/EditMall/') ?>';
								
															html += '<tr>'+
																		'<td>'+ ((data[m].mall_name != null)? data[m].mall_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[m].city_name != null)? data[m].city_name : "Not Available"  )  +'</td>'+
																		'<td>'+ ((data[m].country_name != null)? data[m].country_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[m].type_name != null)? data[m].type_name : "Not Available"  ) +'</td>'+
																		'<td>'+ ((data[m].mall_active == 'Y')? "Yes" : "No"  ) +'</td>'+
																		'<td>'+ ((data[m].featured == 'Y')? "Yes" : "No"  ) +'</td>'+
																		'<td class="text-right"><a href="'+href+ data[m].mall_id +'" data="'+ data[m].mall_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].mall_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
																	'</tr>';

														
														}
											}catch(e) {  
													console.log(e);
													alert('Exception while request..');
											}  	
										}else{
											html += '<tr><td td colspan="10" style="text-align:center">No matching records found</td></tr>'; 
										}  
										$('#displayTable').html(html);
									},
									error: function(){      
										alert('Error while request..');
									}
									});
								} else {
									displayMalls();	
								}
							return false;
							});
						});

    });
</script>