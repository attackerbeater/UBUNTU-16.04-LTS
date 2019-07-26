			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Categories</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="categoryform" autocomplete="off">
									<div class="form-group col-md-7">
										<input type="text" name="categoryname" id="categoryname" placeholder="Category Name" class="form-control col-md-12" required>
									</div>
									<div class="col-md-1">
										<button type="submit" class="btn btn-primary" id="btnAddCategory">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Category Name</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="categorytable">


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
		              <p class="font-12">Are you sure you want to delete this category?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletecategory">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

					displayCategories();

					function displayCategories(){
						$.ajax({
							type : 'ajax',
							url : '<?= base_url('Category/displayCategories') ?>',
							async : false,
							dataType : 'json',
							success : function(data){
								var html = '';
								var category;

								console.log(data);

								if (data.length == 0) {
									html += '<div class="alert alert-info mt-4" role="alert">No available data.</div>';
								}else{
									for(category = 0; category < data.length ; category++){
										
										
										html += '<tr>'+
													'<td>'+ data[category].Category_name +'</td>'+
													'<td class="text-right"><a href="#" data="'+ data[category].Category_id +'" class="text-danger btn-delete">Delete</a></td>'+
												'</tr>';

									
									}
								}


								
								$('#categorytable').html(html);
							},
							error : function(){

							}
						});
					}


					$('#btnAddCategory').click(function(e){
						e.preventDefault();

						var data = $('#categoryform').serialize();

						if ($('#categoryname').val().length > 0) {

							$.ajax({
					          type : 'ajax',
					          method : 'post',
					          url : '<?= base_url('Category/processCategory') ?>',
					          data : data,
					          async : false,
					          dataType : 'json',
					          success : function(response){
					            $('input').val('');
					            toastr['info']('New category added.');
					            displayCategories();
					          },
					          error : function(){
					            	toastr['error']('Could not save category.');
					          }
					        });

						}else{
							toastr["error"]("Category Name can't be null.");
						}
					});

					$('#categorytable').on('click','.btn-delete',function(){
						var Category_id = $(this).attr('data');
						$('#deletemodal').modal('show');

						$('#btndeletecategory').unbind().click(function(){
							$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('Category/destroyCategory') ?>',
									data : {Category_id:Category_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displayCategories();
											toastr['info']('Category deleted.');
										}
										else{
											$('#deleteThisPost').modal('hide');
											toastr['error']("Can't delete this category.");
										}
										
									},
									error : function(){
										alert("Error deleting category.");
									}
								});
						});

					});


				})

			</script>