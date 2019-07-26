			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-2"><a href="<?= base_url('ManageMasters/MallTypes') ?>">Mall Types</a></div>
									<div class="col-md-3"><a href="<?= base_url('ManageMasters/MerchantTypes') ?>">Merchant Types</a></div>
									<div class="col-md-3">Tag Types</div>
								</div>
							</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="tagtypeForm" autocomplete="off">
									<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user')['user_id'] ?>">
									<div class="form-group col-md-7">
										<input type="text" name="tagtype" id="tagtype" placeholder="Tag Type" class="form-control col-md-12" required>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddTagType">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Tag Type</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="tagTypeTable">


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
		              <p class="font-12">Are you sure you want to delete this tag type?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletetagtype">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

					displayTagTypes();

					function displayTagTypes(){
						$.ajax({
							type : 'ajax',
							url : '<?= base_url('ManageMasters/displayTagType') ?>',
							async : false,
							dataType : 'json',
							success : function(data){ 
								var type;

								console.log(data);

								var html = '';
								var type ;

								if (data.length == 0) {
									html += '<div class="alert alert-info mt-4" role="alert">No tag type(s) yet.</div>';
								}else{
									for(type = 0; type < data.length ; type++){
										
										var href = '<?= base_url('ManageMasters/EditTagsType/') ?>';

										html += '<tr>'+
													'<td>'+ data[type].tag_name +'</td>'+
													'<td class="text-right"><a href="'+ href + data[type].tag_id +'" data="'+ data[type].tag_id +'"  class="btn-edit"><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[type].tag_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}


								
								$('#tagTypeTable').html(html);
							},
							error : function(){

							}
						});
					}


					$('#btnAddTagType').click(function(e){
					    e.preventDefault();
					    
					    var data = $('#tagtypeForm').serialize();

					    if ($('#tagtype').val().length > 0) {

					        $.ajax({
					          type : 'ajax',
					          method : 'post',
					          url : '<?= base_url('ManageMasters/processTagType') ?>',
					          data : data,
					          async : false,
					          dataType : 'json',
					          success : function(response){ 
					            toastr['info']('New tag type added.');
					            displayTagTypes();
					          },
					          error : function(){
					            toastr['error']('Could not save tag type.');
					          }
					        });

					    }else{
					      toastr["error"]("Tag type can't be null.");
					    }
					});


					$('#tagTypeTable').on('click','.btn-delete', function(){
						var tag_id = $(this).attr('data');
						$('#deletemodal').modal('show');
						$('#btndeletetagtype').unbind().click(function(){
							$.ajax({
								type : 'ajax',
								method : 'get',
								async : false,
								url : '<?= base_url('ManageMasters/destroyTagType') ?>',
								data : {tag_id:tag_id},
								dataType : 'json',
								success : function(response){
									if (response.success) {
										$('#deletemodal').modal('hide');
										displayTagTypes();
										toastr['info']('Tag type deleted.');
									}
									else{
										$('#deleteThisPost').modal('hide');
										toastr['error']("Can't delete this tag type.");
									}
									
								},
								error : function(){
									alert("Error deleting tag type.");
								}
							});
						});
					});

				});

			</script>