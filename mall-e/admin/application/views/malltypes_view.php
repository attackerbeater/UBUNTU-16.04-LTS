			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-2">Mall Types</div>
									<div class="col-md-3"><a href="<?= base_url('ManageMasters/MerchantTypes') ?>" class="text-primary">Merchant Types</a></div>
									<div class="col-md-3"><a href="<?= base_url('ManageMasters/TagTypes') ?>" class="text-primary">Tag Types</a></div>
								</div>
							</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="malltypeForm" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="text" name="malltype" id="malltype" placeholder="Mall Type" class="form-control col-md-12" required>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddMallType">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Mall Type</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="mallTypeTable">


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
		              <p class="font-12">Are you sure you want to delete this mall type?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletemalltype">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

					displayMallTypes();

					function displayMallTypes(){
						$.ajax({
							type : 'ajax',
							url : '<?= base_url('ManageMasters/displayMallType') ?>',
							async : false,
							dataType : 'json',
							success : function(data){
								var html = '';
								var type;

								console.log(data);

								if (data.length == 0) {
									html += '<div class="alert alert-info mt-4" role="alert">No mall type(s) yet.</div>';
								}else{
									for(type = 0; type < data.length ; type++){
										
										
										html += '<tr>'+
													'<td>'+ data[type].type_name +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[type].mt_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}


								
								$('#mallTypeTable').html(html);
							},
							error : function(){

							}
						});
					}


					$('#btnAddMallType').click(function(e){
					    e.preventDefault();
					    
					    var data = $('#malltypeForm').serialize();

					    if ($('#malltype').val().length > 0) {

					        $.ajax({
					          type : 'ajax',
					          method : 'post',
					          url : '<?= base_url('ManageMasters/processMallType') ?>',
					          data : data,
					          async : false,
					          dataType : 'json',
					          success : function(response){
					            $('input').val('');
					            toastr['info']('New mall type added.');
					            displayMallTypes();
					          },
					          error : function(){
					            toastr['error']('Could not save mall type.');
					          }
					        });

					    }else{
					      toastr["error"]("Mall type can't be null.");
					    }
					});


					$('#mallTypeTable').on('click','.btn-delete', function(){
						var mt_id = $(this).attr('data');
						$('#deletemodal').modal('show');
						$('#btndeletemalltype').unbind().click(function(){
							$.ajax({
								type : 'ajax',
								method : 'get',
								async : false,
								url : '<?= base_url('ManageMasters/destroyMallType') ?>',
								data : {mt_id:mt_id},
								dataType : 'json',
								success : function(response){
									if (response.success) {
										$('#deletemodal').modal('hide');
										displayMallTypes();
										toastr['info']('Mall type deleted.');
									}
									else{
										$('#deleteThisPost').modal('hide');
										toastr['error']("Can't delete this mall type.");
									}
									
								},
								error : function(){
									alert("Error deleting mall type.");
								}
							});
						});
					});

				});

			</script>