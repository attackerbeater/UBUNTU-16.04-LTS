<style type="text/css">
	
.dsp-block{
  display: block;
}

.dsp-none{
  display: none;
}


</style>


			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Merchants</div>
							<div class="card-body">
								<form  method="post" action="" id="merchantform" autocomplete="off">
									<div class="row">
										<div class="form-group col-md-7 holder">
											<input type="text" name="merchantname" id="merchantname"  placeholder="Merchant Name" class=" form-control col-md-12 search" autocomplete="off" list="datalist1">
											<ul id="merchantResult"></ul>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnUpdateMerchant">Update</button>
									</div>
									</div>
									
								</form>	
								<div class="row mt-4 ml-0">
									<div class="col-md-8">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th colspan="2">Merchant Name</th>
													<th scope="col">City</th>
													<th scope="col">Country</th>
													<th scope="col">Type</th>
													<th scope="col">Active</th>
													<th scope="col">Featured</th>
												</tr>
											</thead>
											<tbody id="merchantTable">
												
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



 
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.10.6/jquery.typeahead.min.js"></script>
		<script type="text/javascript">

	
		var mallUpdateData = {};
			function init() {
				var options = {
					types: ['establishment']
				};
				var input = document.getElementById('merchantname');
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

					document.getElementById("merchantname").value = loc.name;
					document.getElementById("merchantname").disabled = false;
								
				});
			}
			google.maps.event.addDomListener(window, 'load', init);											


			$(function(){
				$(".auto_list").on('click','.auto-item',function(e){
					e.preventDefault();

					var name = $(this).attr('data');
					 alert(name);
					 // $('#city_id').val($(this).attr('data'));
				});

				displayMerchant();

				function displayMerchant(){


					$.ajax({
								type : 'ajax',
								url : '<?= base_url('Merchant/displayMerchants') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var m;

									// console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(m = 0; m < data.length ; m++){
											
											var href = '<?= base_url('Merchant/EditMerchant/') ?>';
				
											html += '<tr>'+
														'<td colspan="2">'+ ((data[m].merchant_name != null)? data[m].merchant_name : "Not Available"  ) +'</td>'+
														'<td>'+ ((data[m].city_name != null)? data[m].city_name : "Not Available"  )  +'</td>'+
														'<td>'+ ((data[m].country_name != null)? data[m].country_name : "Not Available"  ) +'</td>'+
														'<td>'+ ((data[m].type != null)? data[m].type : "Not Available"  ) +'</td>'+
														'<td>'+ ((data[m].merchant_active == 'Y')? "Yes" : "No"  )  +'</td>'+
														'<td>'+ ((data[m].featured == 'Y')? "Yes" : "No"  ) +'</td>'+
														'<td class="text-right" colspan="2"><a href="'+href+ data[m].merchant_id +'" data="'+ data[m].merchant_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].merchant_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
													'</tr>';

										
										}
									}
									
									$('#merchantTable').html(html);
								},
								error : function(){

								}
							});

				}


				$('#btnUpdateMerchant').click(function(e){
					e.preventDefault();

					var data = $('#merchantform').serialize();

					if ($('#merchantname').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processMerchant') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New merchant added.');
								            displayMerchant();

								          },
								          error : function(xhr, ajaxOptions, thrownError){
								             toastr['error']('Could not save merchant.');
								           
								          }
								        });

					}else{
						toastr["error"]("Merchant Name can't be null.");
					}

				});

				$('#merchantTable').on('click','.btn-delete',function(){


					var merchant_id = $(this).attr('data');

					
					$('#deletemodal').modal('show');

					$('#btndeletemerchant').unbind().click(function(){
						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/destroyMerchant') ?>',
									data : {merchant_id:merchant_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayMerchant();
											toastr['info']('Merchant deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this merchant.");
										}
										
									},
									error : function(){
										alert("Error deleting merchant.");
									}
								});
					});

				});


				$(document).ready(function(){
					$("#merchantname").keyup(function(){
						if($("#merchantname").val().length>=1){

							$.ajax({
							type: "POST",
							url: "<?= base_url('Merchant/liveSearchMerchants') ?>",
							cache: false,    
							dataType : 'json',
							data:'search='+$("#merchantname").val(),
							success: function(data){
								$('#merchantResult').html("");
								var html = '';
								var m;
								if(data.length>0){
									try{
										for(m = 0; m < data.length ; m++){
													
													var href = '<?= base_url('Merchant/EditMerchant/') ?>';
						
													html += '<tr>'+
																'<td colspan="2">'+ ((data[m].merchant_name != null)? data[m].merchant_name : "Not Available"  ) +'</td>'+
																'<td>'+ ((data[m].city_name != null)? data[m].city_name : "Not Available"  )  +'</td>'+
																'<td>'+ ((data[m].country_name != null)? data[m].country_name : "Not Available"  ) +'</td>'+
																'<td>'+ ((data[m].type != null)? data[m].type : "Not Available"  ) +'</td>'+
																'<td>'+ ((data[m].merchant_active == 'Y')? "Yes" : "No"  )  +'</td>'+
																'<td>'+ ((data[m].featured == 'Y')? "Yes" : "No"  ) +'</td>'+
																'<td class="text-right" colspan="2"><a href="'+href+ data[m].merchant_id +'" data="'+ data[m].merchant_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[m].merchant_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
															'</tr>';

												
												}
									}catch(e) {  
											alert('Exception while request..');
									}  	
								}else{
									html += '<tr><td td colspan="10" style="text-align:center">No matching records found</td></tr>'; 
								}  
								$('#merchantTable').html(html);
							},
							error: function(){      
								alert('Error while request..');
							}
							});
						} else {
							displayMerchant();	
						}
					return false;
					});
				});

		 	});

			

		</script>