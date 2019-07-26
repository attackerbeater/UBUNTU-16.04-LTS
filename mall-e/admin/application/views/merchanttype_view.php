			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">
								<div class="row">
									<div class="col-md-2"><a href="<?= base_url('ManageMasters/MallTypes') ?>" class="text-primary">Mall Types</a></div>
									<div class="col-md-3" >Merchant Types</div>
									<div class="col-md-3"><a href="<?= base_url('ManageMasters/TagTypes') ?>" class="text-primary">Tag Types</a></div>

								</div>
							</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="merchanttypeform" autocomplete="off">
									<div class="form-group col-md-7">
										
										<input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user')['user_id'] ?>" class="form-control col-md-12" required>
										<input type="text" name="merchanttype" id="merchanttype" placeholder="Merchant Type" class="form-control col-md-12" required>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddMerchantType">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Merchant Type</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="merchanttypetable">


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
		              <p class="font-12">Are you sure you want to delete this merchant type?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletemerchanttype">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>

		     <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodallabel" aria-hidden="true">
		        <div class="modal-dialog" role="document">
		          <div class="modal-content">
		            <div class="modal-header">
		              <h5 class="modal-title" id="editmodallabel">Edit Merchant Type</h5>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body ">
		             	<form id="editform">
		             		<div class="form-group">
		             			<input type="hidden" name="mt_id_edit" id="mt_id_edit">
		             			<input type="text" name="merchantedit" id="merchantedit" class="form-control" placeholder="Merchant Type">
		             		</div>
		             	</form>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		              <button type="button" class="btn btn-danger" id="btneditmerchanttype">Edit</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

					displayMerchantTypes();

					function displayMerchantTypes(){

						$.ajax({
							type : 'ajax',
							url : '<?= base_url('Merchant/displayMerchantTypes') ?>',
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
										
										var href = '<?= base_url('ManageMasters/EditMerchantType/') ?>';
										
										html += '<tr>'+
													'<td>'+ data[type].type +'</td>'+
													'<td class="text-right"><a href="'+ href + data[type].mt_id +'" data="'+ data[type].mt_id +'"  ><span class="text-success">Edit</span></a> | <a href="#" data="'+ data[type].mt_id +'" class="btn-delete"><span class="text-danger" >Delete</span></a></td>'+
												'</tr>';

									
									}
								}


								
								$('#merchanttypetable').html(html);
							},
							error : function(){

							}
						});

					}

					$('#btnAddMerchantType').click(function(e){

						e.preventDefault();

						var data = $('#merchanttypeform').serialize();

						if ($('#merchanttype').val().length > 0) {

								

							 $.ajax({
						          type : 'ajax',
						          method : 'post',
						          url : '<?= base_url('Merchant/processMerchantType') ?>',
						          data : data,
						          async : false,
						          dataType : 'json',
						          success : function(response){
						            $('input').val('');
						            toastr['info']('New merchant type added.');
						            displayMerchantTypes();
						          },
						          error : function(){
						            toastr['error']('Could not save merchant type.');
						          }
						        });


						}else{
							toastr['warning']('Merchant type cant be null');
						}

					});

					$('#merchanttypetable').on('click','.btn-delete',function(e){
						e.preventDefault();

						var mt_id = $(this).attr('data');
						$('#deletemodal').modal('show');

						$('#btndeletemerchanttype').unbind().click(function(){


							$.ajax({
								type : 'ajax',
								method : 'get',
								async : false,
								url : '<?= base_url('Merchant/destroyMerchantType') ?>',
								data : {mt_id:mt_id},
								dataType : 'json',
								success : function(response){
									if (response.success) {
										$('#deletemodal').modal('hide');
										displayMerchantTypes();
										toastr['info']('Merchant type deleted.');
									}
									else{
										$('#deletemodal').modal('hide');
										toastr['error']("Can't delete this merchant type.");
									}
									
								},
								error : function(){
									alert("Error deleting merchant type.");
								}
							});


						});
					});

					$('#merchanttypetable').on('click','.btn-edit',function(e){

						e.preventDefault();

						var mt_id = $(this).attr('data');

						$('#editmodal').modal('show');

								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Merchant/getMerchantType') ?>',
									data : {mt_id:mt_id},
									dataType : 'json',
									success : function(data){

										
										$('#mt_id_edit').val(data.mt_id);
										$('#merchantedit').val(data.type);
										
									},
									error : function(){
										alert("Error getting merchant type.");
									}
								});



					});

					$('#btneditmerchanttype').click(function(e){
						e.preventDefault();

						var data = $('#editform').serialize();


						if ($('#merchantedit').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('Merchant/processMerchantTypeEdit') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								          	displayMerchantTypes();
								          	
								          	$('#editmodal').modal('hide');

								            toastr['info']('Merchant type edited.');

								           
								          },
								          error : function(){
								            toastr['error']('Could not edit merchant type.');
								          }
								        });


						}else{
							toastr['warning']('Merchant type cant be null');
						}

					});
					
				});

			</script>