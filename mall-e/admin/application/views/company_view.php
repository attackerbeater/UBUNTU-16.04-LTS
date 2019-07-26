
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Company</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="companyform" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="text" name="companyname" placeholder="Company Name" id="companyname" class="form-control col-md-12">
									</div>
									<div class="col-md-2">
										<div class="dropdown">
											  <button class="btn btn-secondary dropdown-toggle btn-city" type="button" id="cityoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select City</button>
											  <div class="dropdown-menu" aria-labelledby="cityoption">
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
										<button type="submit" class="btn btn-primary" id="btnAddCompany">Update</button>
									</div>
								</form>
								<br>
								<div class="row">
									<div class="col-md-10">
										<table class="table table-striped malle-table" id="mallTable">

												<thead>
													<tr>
														<th>Company Name</th>
														<th>City Name</th>	
														<th></th>
													</tr>
												</thead>
												<tbody id="companytable">
													

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
		              <p class="font-12">Are you sure you want to delete this company?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btnDeleteCompany">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>



<script type="text/javascript">
	

    $(function(){
    	displayCompanies();

    	function displayCompanies(){


    			$.ajax({
								type : 'ajax',
								url : '<?= base_url('Company/displayCompanies') ?>',
								async : false,
								dataType : 'json',
								success : function(data){
									var html = '';
									var d;

									console.log(data);

									if (data.length == 0) {
										html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
									}else{
										for(d = 0; d < data.length ; d++){
											
											var href = '<?= base_url('Company/EditCompany/') ?>';
											
											html += '<tr>'+
														'<td>'+ data[d].company_name +'</td>'+
														'<td>'+ data[d].city_name +'</td>'+
														'<td class="text-right"><a href="'+href+ data[d].company_id +'" data="'+ data[d].company_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[d].company_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
													'</tr>';

										
										}
									}
									
									$('#companytable').html(html);
								},
								error : function(){

								}
							});

    	}

    	$(".dropdown-menu").on('click','a',function(){
			 $(".btn-city:first-child").html($(this).text()+' <span class="caret"></span>');
			 $('#city_id').val($(this).attr('data'));
		})
		

		$('#btnAddCompany').click(function(e){
			e.preventDefault();

			var data = $('#companyform').serialize();

			if ($('#companyname').val().length > 0) {

					if ($('#city_id').val().length > 0) {


									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Company/processCompany') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New Company added.');

								            $(".btn-city:first-child").html('Select City');
								            displayCompanies();

								          },
								          error : function(xhr, ajaxOptions, thrownError){
								             toastr['error']('Could not save company.');
								           
								          }
								        });


					}else{
						toastr["warning"]("Please select city.");
					}

			}else{
				toastr["warning"]("Company Name can't be null.");
			}


		});

		$('#companytable').on('click','.btn-delete',function(e){
			e.preventDefault();

			var company_id = $(this).attr('data');

			$('#deletemodal').modal('show');

			$('#btnDeleteCompany').unbind().click(function(){


								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Company/destroyCompany') ?>',
									data : {company_id:company_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayCompanies();
											toastr['info']('Company deleted.');
										}
										else{
											$('#deletemodal').modal('hide');
											toastr['error']("Can't delete this company.");
										}
										
									},
									error : function(){
										alert("Error deleting company.");
									}
								});


			});
		});

    });
</script>