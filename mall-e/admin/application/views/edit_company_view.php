			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Company Info</div>
							<div class="card-body">
								<form method="post" action="" id="editCompanyForm" autocomplete="off">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="hidden" name="company_id_main" id="company_id_main" value="<?= $company['company_id'] ?>">
												<label class="mb-2 font-12">Company Name</label>
												<input type="text" name="companyname" id="companyname" class="form-control" placeholder="Company Name" value="<?= $company['company_name'] ?>">
											</div>
										</div>
										<div class="col-md-3 offset-md-3">
											<button type="submit" class="btn btn-primary col-md-8" id="btnUpdateCompany">Update</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											

												<label class="mb-2 font-12">Country</label><br>
													<div class="dropdown">
													  <button class="btn btn-secondary dropdown-toggle btn-ct" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $company['country_name'] ?></button>
													  <div class="dropdown-menu ct-drop" aria-labelledby="countryoption">
													  <?php 
																foreach ($countries as $country) {
																	?>
																	<a class="dropdown-item" href="#" data="<?= $country->country_id ?>"><?= $country->country_name ?></a>

															<?php
																}
															 ?>
													  </div>
													</div> 
													<input type="hidden" name="country_id" id="country_id" value="<?= $company['country_id'] ?>">


										</div>
										<div class="col-md-3">
											<label class="mb-2 font-12">City</label><br>
												<div class="dropdown">
												  <button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $company['city_name'] ?></button>
												  <div class="dropdown-menu city-drop" aria-labelledby="countryoption" id="citybycountry">
												 
												  </div>
												</div> 
												<input type="hidden" name="city_id" id="city_id" value="<?= $company['city_id'] ?>">
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-md-6">
											<label class="mb-2 font-12">City</label><br>
											<textarea rows="4" class="form-control" placeholder="Company Address" name="companyaddress"><?= $company['company_address'] ?></textarea>
										</div>
										<div class="col-md-3">
											<div class="row">
												<div class="col-md-12">
													<label class="mb-2 font-12">Postal Code</label><br>
													<input type="text" name="postalcode" class="form-control" placeholder="Postal Code" value="<?= $company['postal_code'] ?>">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<label class="mb-2 font-12">Telephone #</label><br>
													<input type="text" name="telephone" class="form-control" placeholder="Telephone" value="<?= $company['telephone'] ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-md-6">
											<label class="mb-2 font-12">Website</label><br>
											<input type="text" name="website" class="form-control" placeholder="Website" value="<?= $company['website'] ?>">
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
							<div class="card-header-malle">Merchant Logo</div>
							<div class="card-body">
								<?php 

									if ($image['image_name']) {
										
										?>

											<div class="col-md-4">
														
														<img src="<?= base_url('uploads/') . $image['image_name'] ?>" class="pic ">
									 					<a href="#" id="removeimagefromcompany" data="<?= $image['company_image_id'] ?>" class="text-danger font-12">Remove</a>

													</div>

										<?php

									}
									else{
										?>
										<div class="col-md-4">
														

											<form action="<?= base_url('Company/addImageToCompany/') . $image['company_image_id'] ?>" class="dropzone" id="image1">
											
											</form>


										</div>
									<?php
									}

								 ?>
							</div>
						</div>
					</div>
				</div>


				<div class="row move-top">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Company Contacts</div>
							<div class="card-body">
								<form method="post" action="" id="contactform" autocomplete="off">
									<div class="row">
										<div class="col-md-12">
											<input type="hidden" name="company_id" value="<?= $company['company_id'] ?>">
											<button type="submit" class="btn btn-primary col-md-2 float-right" id="btnUpdateContact">Update</button>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Contact Person</label>
												<input type="text" name="contactperson" placeholder="Contact Person" id="contactperson" class="form-control" required>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Position Held</label>
												<input type="text" name="positionheld" placeholder="Position Held" id="positionheld" class="form-control" required >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Contact #</label>
												<input type="text" name="contactnumber" placeholder="Contact" id="contactnumber" class="form-control" required >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="mb-2 font-12">Email</label>
												<input type="email" name="emailcontact" placeholder="Email" id="emailcontact" class="form-control" required >
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<table class="table table-striped malle-table">
												<thead>
													<tr>
														<th>Contact Person</th>
														<th>Position Held</th>
														<th>Contact #</th>
														<th>Email</th>
														<th></th>
													</tr>
												</thead>
												
												<tbody id="companytable">



												</tbody>
											</table>
										</div>
									</div>
								</form>
							</div>
						</div>
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
		              <p class="font-12">Are you sure you want to delete this contact?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnDeleteContact">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		      <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="editmodallabel">Edit Contact</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		              <form id="editcontactform" autocomplete="off">
		              	<div class="form-group">
		              		<input type="hidden" name="company_contact_id_edit" id="company_contact_id_edit">
		              		<label class="mb-2 font-12">Contact Person</label>
		              		<input type="text" name="contactpersonedit" id="contactpersonedit" class="form-control" placeholder="Contact Person">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Position Held</label>
		              		<input type="text" name="positionheldedit" id="positionheldedit" class="form-control" placeholder="Position Held">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Contact #</label>
		              		<input type="text" name="contactnumberedit" id="contactnumberedit" class="form-control" placeholder="Contact Number">
		              	</div>
		              	<div class="form-group">
		              		<label class="mb-2 font-12">Email</label>
		              		<input type="text" name="emailcontactedit" id="emailcontactedit" class="form-control" placeholder="Email">
		              	</div>
		              </form>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		              <button type="button" class="btn btn-primary col-md-3" id="btnEditContact">Edit</button>
		            </div>
		          </div>
		        </div>
		      </div>


		<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
		<script type="text/javascript">


			Dropzone.options.image1 = {
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
			

			$(function(){
				
				displayContacts();

				function displayContacts(){


						var company_id = $('#company_id_main').val();

						$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Company/displayContacts') ?>',
									data : {company_id:company_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<tr>'+
													'<td>'+ data[c].contact_name +'</td>'+
													'<td>'+ data[c].position_held +'</td>'+
													'<td>'+ data[c].contact_number +'</td>'+
													'<td>'+ data[c].email_id +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[c].company_contact_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[c].company_contact_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

											}
										}

										$('#companytable').html(html);
									},
									error : function(){
										// alert("Error retrieving towns.");
									}
								});


				}


				$('#companytable').on('click','.btn-delete',function(e){
					e.preventDefault();

					var company_contact_id = $(this).attr('data');

					$('#deletemodal').modal('show');

					$('#btnDeleteContact').unbind().click(function(){

								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Company/destroyContact') ?>',
									data : {company_contact_id:company_contact_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayContacts();
											toastr['info']('Company contact deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this contact.");
										}
										
									},
									error : function(){
										alert("Error deleting contact.");
									}
								});

					});

				});

				$('#companytable').on('click','.btn-edit',function(e){
						e.preventDefault();

						var company_contact_id = $(this).attr('data');

						$('#editmodal').modal('show');

								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Company/getContact') ?>',
									data : {company_contact_id:company_contact_id},
									dataType : 'json',
									success : function(data){

										

										$('#company_contact_id_edit').val(data.company_contact_id);
										$('#contactpersonedit').val(data.contact_name);
										$('#positionheldedit').val(data.position_held);
										$('#contactnumberedit').val(data.contact_number);
										$('#emailcontactedit').val(data.email_id);
										
									},
									error : function(){
										alert("Error getting contact.");
									}
								});


				});

				$('#btnEditContact').click(function(){
						
						var data = $('#editcontactform').serialize();


						if ($('#contactpersonedit').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Company/processContactEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	
								          	$('#editmodal').modal('hide');

								            toastr['info']('Mall Contact edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit mall contact.');
								          }
								        });

					}else{
						toastr["error"]("Contact Person can't be null.");
					}

					});

				$(".ct-drop").on('click','a',function(){
							 $(".btn-ct:first-child").html($(this).text()+' <span class="caret"></span>');
							 $(".btn-city:first-child").html('Select City'+' <span class="caret"></span>');
							 $(".btn-town:first-child").html('Select Town'+' <span class="caret"></span>');
							 $('#country_id').val($(this).attr('data'));
							 $('#city_id').val('');
							 $('#town_id').val('');

							 var country_id = $(this).attr('data');

							 $.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('City/displayCitiesByCountry') ?>',
									data : {country_id:country_id},
									dataType : 'json',
									success : function(data){
										console.log(data);
										
										var html = '';

										var c ;

										if (data.length == 0) {
											html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
										}else{
											for(c = 0; c < data.length ; c++){

												html += '<a class="dropdown-item" href="#" data="'+ data[c].city_id  +'">'+ data[c].city_name +'</a>';

											}
										}

										$('#citybycountry').html(html);
									},
									error : function(){
										alert("Error retrieving cities.");
									}
								});

						});

				$(".city-drop").on('click','a',function(){
							 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
							 $(".btn-town:first-child").html('Select Town'+' <span class="caret"></span>');
							 $('#city_id').val($(this).attr('data'));

						});


				$('#btnUpdateCompany').click(function(e){

					e.preventDefault();

					var data = $('#editCompanyForm').serialize();

					if ($('#companyname').val().length > 0) {

						if ($('#country_id').val().length > 0) {

							if ($('#city_id').val().length > 0) {


									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Company/processEditCompany') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            toastr['info']('Company updated.');
								           

								          },
								          error : function(){
								            toastr['error']('Could not update company.');
								          }
								        });



							}else{


								toastr["warning"]("Please select city.");
							}


						}else{

							toastr["warning"]("Please select country.");
						}

					}else{
						toastr["warning"]("Company Name can't be null.");
					}

				});

				$('#removeimagefromcompany').click(function(e){
					e.preventDefault();

					var company_image_id = $(this).attr('data');

					$('#deleteimagemodal').modal('show');

					$('#btndeleteimage').unbind().click(function(){

							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Company/destroyCompanyImage') ?>',
									data : {company_image_id:company_image_id},
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


				$('#btnUpdateContact').click(function(e){

					e.preventDefault();


					var data = $('#contactform').serialize();


					if ($('#contactperson').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Company/processContact') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayContacts();
								          	$('#contactperson').val('');
								          	$('#positionheld').val('');
								          	$('#contactnumber').val('');
								          	$('#emailcontact').val('');
								          	
								            toastr['info']('Company contact updated.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not update company contact.');
								          }
								        });

					}else{
						toastr["warning"]("Contact person can't be null.");

					}

				});

			});


		</script>