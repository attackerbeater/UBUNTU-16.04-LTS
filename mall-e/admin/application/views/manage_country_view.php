			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle"><div class="row">
								<div class="col-md-4 text-primary">
									Manage Country
								</div>
								<div class="col-md-4">
									<a href="<?= base_url('city') ?>" class="text-danger">Manage City</a>
								</div>
								<div class="col-md-4">
									<a href="<?= base_url('town') ?>" class="text-danger">Manage Town</a>
								</div>
							</div></div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="countryform" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="text" name="countryname" id="countryname" placeholder="Country Name" class="form-control col-md-12" required>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddCountry">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Country Name</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="countrytable">


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
		              <p class="font-12">Are you sure you want to delete this country?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletecountry">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

					displayCountries();

					function displayCountries(){
						$.ajax({
							type : 'ajax',
							url : '<?= base_url('Country/displayCountries') ?>',
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
													'<td>'+ data[country].country_name +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[country].country_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}


								
								$('#countrytable').html(html);
							},
							error : function(){

							}
						});
					}


					$('#btnAddCountry').click(function(e){
						e.preventDefault();

						var data = $('#countryform').serialize();

						if ($('#countryname').val().length > 0) {

							$.ajax({
					          type : 'ajax',
					          method : 'post',
					          url : '<?= base_url('Country/processCountry') ?>',
					          data : data,
					          async : false,
					          dataType : 'json',
					          success : function(response){
					            $('input').val('');
					            toastr['info']('New country added.');
					            displayCountries();
					          },
					          error : function(){
					            	toastr['error']('Could not save country.');
					          }
					        });

						}else{
							toastr["error"]("Country Name can't be null.");
						}
					});

					$('#countrytable').on('click','.btn-delete',function(){
						var country_id = $(this).attr('data');
						$('#deletemodal').modal('show');

						$('#btndeletecountry').unbind().click(function(){
							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Country/destroyCountry') ?>',
									data : {country_id:country_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayCountries();
											toastr['info']('Country deleted.');
										}
										else{
											$('#deleteThisPost').modal('hide');
											toastr['error']("Can't delete this country.");
										}
										
									},
									error : function(){
										alert("Error deleting country.");
									}
								});
						});

					});


				})

			</script>