			<div class="col-md-10">
				<div class="row">
					<div class="col-md-10">
						<div class="card card-malle">
							<div class="card-header-malle">Manage Deal Categories</div>
							<div class="card-body">
								<form class="form-inline" method="post" action="" id="subcategoryform" autocomplete="off">
									<div class="form-group col-md-5">
										<input type="text" name="subcategoryname" id="subcategoryname" placeholder="Deal Category Name" class="form-control col-md-12" required>
									</div>
									<div class="col-md-2">
										<div class="dropdown">
											  <button class="btn btn-secondary dropdown-toggle btn-category" type="button" id="countryoption" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Category</button>
											  <div class="dropdown-menu" aria-labelledby="countryoption">
											    <?php 
													foreach ($categories as $category) {
														?>
														<a class="dropdown-item" href="#" data="<?= $category->Category_id ?>"><?= $category->Category_name ?></a>

												<?php
													}
												 ?>
											  </div>
											</div> 
											<input type="hidden" name="Category_id" id="Category_id">
									</div>
									<div class="col-md-1 ml-4">
										<button type="submit" class="btn btn-primary" id="btnAddSubCategory">Update</button>
									</div>
								</form>	
								<div class="row mt-4">
									<div class="col-md-9">
										<table class="table table-striped malle-table">
											<thead>
												<tr>
													<th>Deal Category Name</th>
													<th>Category Name</th>
													<th></th>
												</tr>
											</thead>
											
											<tbody id="subcategorytable">


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
		              <p class="font-12">Are you sure you want to delete this sub category?</p>
		            </div>
		            <div class="modal-footer">
		              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
		              <button type="button" class="btn btn-danger" id="btndeletecity">Yes</button>
		            </div>
		          </div>
		        </div>
		      </div>


			<script type="text/javascript">

				$(function(){

						displaySubCategories();
						
						$(".dropdown-menu").on('click','a',function(){
							 $(".btn-category:first-child").html($(this).text()+' <span class="caret"></span>');
							 $('#Category_id').val($(this).attr('data'));
						})

						function displaySubCategories(){
							$.ajax({
								type : 'ajax',
								url : '<?= base_url('SubCategory/displaySubCategories') ?>',
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
											

											var href = '<?= base_url('Dealcategory/EditDealCategory/') ?>';
											html += '<tr>'+
														'<td>'+ data[category].Sub_Category_name +'</td>'+
														'<td>'+ data[category].Category_name +'</td>'+
														'<td class="text-right"><a  href="'+href+  data[category].sub_category_id +'" data="'+ data[category].sub_category_id +'"  class="btn-edit"><span class="text-success">Edit</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" data="'+ data[category].Sub_Category_id +'" class="text-danger btn-delete">Delete</a></td>'+
													'</tr>';

										
										}
									}


									
									$('#subcategorytable').html(html);
								},
								error : function(){

								}
							});
						}

						$('#btnAddSubCategory').click(function(e){
							e.preventDefault();

							var data = $('#subcategoryform').serialize();

							if ($('#subcategoryname').val().length > 0) {
								if ($('#Category_id').val().length > 0) {

									$.ajax({
								          type : 'ajax',
								          method : 'post',
								          url : '<?= base_url('SubCategory/processSubCategory') ?>',
								          data : data,
								          async : false,
								          dataType : 'json',
								          success : function(response){
								            $('input').val('');
								            toastr['info']('New sub category added.');
								            displaySubCategories();

								          },
								          error : function(){
								            toastr['error']('Could not save sub category.');
								          }
								        });


								}else{
									toastr["error"]("Please select category.");
								}
							}else{
								toastr["error"]("Sub Category Name can't be null.");
							}

						});

						$('#subcategorytable').on('click','.btn-delete',function(){
							var Sub_Category_id = $(this).attr('data');
							$('#deletemodal').modal('show');

							$('#btndeletecity').unbind().click(function(){
								$.ajax({
									type : 'ajax',
									method : 'get',
									async : false,
									url : '<?= base_url('SubCategory/destroySubCategory') ?>',
									data : {Sub_Category_id:Sub_Category_id},
									dataType : 'json',
									success : function(response){
										if (response.success) {
											$('#deletemodal').modal('hide');
											displaySubCategories();
											toastr['info']('Sub Category deleted.');
										}
										else{
											$('#deleteThisPost').modal('hide');
											toastr['error']("Can't delete this sub category.");
										}
										
									},
									error : function(){
										alert("Error deleting sub category.");
									}
								});
							});

						});

				})


			</script>