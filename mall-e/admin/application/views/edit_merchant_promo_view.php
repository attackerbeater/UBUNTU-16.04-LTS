<style>
	.btn-default{
		color: #fff;
		background-color: #ccc;
		border-color: #ccc;
	}
	.active{
		background-color: #007bff !important;
		border-color: #007bff !important;
	}
	.pic {
		width: 100%;
		height: 100%;
	}
</style>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-10">
			<div class="card card-malle">
				<div class="card-header-malle">
					<div class="row">
						 <input type="hidden" name="promo_id_main" id="promo_id_main" value="<?= $promo['promo_id'] ?>">
						<input disabled typeOther Offer="hidden" name="merchant_id_main" id="merchant_id_main" value="<?= $promo['merchant_id'] ?>">


						<div class="col-md-3">Promo ID : <span class="text-danger"><?= $promo['promo_id'] ?></span></div>
						<?php

							$promodate = new DateTime($promo['dated']);

						 ?>
						<div class="col-md-4">| Created On : <span class="text-danger"><?= $promodate->format('d-m-Y') ?></span></div>
						<div class="col-md-3">| Created By : <span class="text-danger"><?= $promo['short_name'] ?></span></div>
						<div class="col-md-2 text-right">
							<a href="#" onclick="history.back();" class="text-primary">Back</a>
						</div>
					</div>
				</div>
				<div class="card-body">

					<form method="post" action="" id="editPromoform" autocomplete="off">
						<div class="row">
							 <div class="col-md-5">
							 <div class="form-group">
									<input type="hidden" name="promo_id" id="promo_id" value="<?= $promo['promo_id'] ?>">
									<input type="hidden" name="user_id" id="user_id" value="<?= $promo['user_id'] ?>">
									<input type="hidden" name="merchant_id" id="merchant_id" value="<?= $promo['merchant_id'] ?>">

									<label class="mb-2 font-12">Merchant Name</label>
									<h6><?= $promo['merchant_name'] ?></h6>
								</div>
								</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label class="mb-2 font-12">Promotion Name</label>
									<input type="text" name="promo_name" id="promo_name" placeholder="Promotion Name" value="<?= $promo['promo_name'] ?>" required  class="form-control">

								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="mb-2 font-12">Amount</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text text-primary font-weight-bold" id="basic-addon1"><?= $promo['currency_symbol'] ?></span>
											</div>
											 <input type="text" name="promo_amount" id="promo_amount" value="<?= $promo['amount'] ?>"  aria-describedby="basic-addon1"  class="form-control text-primary text-right font-weight-bold" onkeypress="return isNumber(event)">

										</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label class="mb-2 font-12">Other Offer</label>
										<div class="input-group mb-2">
											 <input type="text" name="other_offer" id="other_offer" <?php if($promo['other_offer']==""){?> value="" <?php }else{ ?> value="<?php $promo['other_offer'] ?>" <?php } ?>  class="form-control" maxlength="15" >

										</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-md-5">

								<div class="form-group">
									<label class="mb-2 font-12">Description</label>
									<textarea style="height: 200px;" type="text" name="description" id="description"  required value="" class="form-control"><?= $promo['description'] ?></textarea>
								</div>
							</div>

							<div class="col-md-2">
								<label class="mb-2 font-12">Active</label><br>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<!--
										 <?php
										$isActive = '';
										$isNotActive = '';

										if ($promo['mall_active'] == 'Y') {
											$isActive = 'active';
										}else{
											$isNotActive = 'active';
										}
?> -->
											<label class="btn btn-default active"  id="yes">
												<input type="radio" name="options" autocomplete="off" > Yes
											</label>
											<label class="btn btn-default" id="no">
												<input type="radio" name="options"  autocomplete="off" > No
											</label>

										</div>

										<!--<input type="hidden" name="current_event" id="current_event" value="<?= $mall['mall_active'] ?>">-->

										<br><br>

										<label class="mb-2 font-12">Redeemable</label><br>
									<div class="btn-group btn-group-toggle" data-toggle="buttons">

										 <?php
										$isActive = '';
										$isNotActive = '';

										if ($promo['redeemable'] == 'Y') {
											$isActive = 'active';
										}else{
											$isNotActive = 'active';
										}
										 ?>
											<label class="btn btn-default <?= $isActive ?>"  id="yes_redeemable">
												<input type="radio" name="redeemable" autocomplete="off" > Yes
											</label>
											<label class="btn btn-default <?= $isNotActive ?>" id="no_redeemable">
												<input type="radio" name="redeemable"  autocomplete="off" > No
											</label>

										</div>

										<input type="hidden" name="redeemable_txt" id="redeemable_txt" value="<?= $promo['redeemable'] ?>">
							</div>
							<div class="col-md-3">
								<label class="mb-2 font-12">Promoton Starts on</label>
								<div class="input-group">
									<input type="text" name="start_date" id="start_date" placeholder="Start Date" class="form-control py-2 border-right-0 border" value="<?= date('d/m/Y')  ?>" >

												<span class="input-group-append">
														<button class="btn btn-outline-secondary border-left-0 border" type="button">
																<i class="fa fa-calendar"></i>
														</button>
													</span>
										</div>
							<br>
								<div class="checkbox">
												<label class="mb-2 font-12"><input type="checkbox" value="Y" name="no_end_date" id="no_end_date"  <?php if($promo['no_end_date'] == "Y"){ ?> checked <?php } ?>> No End Date</label>
											</div>

								<label class="mb-2 font-12">Promotion Ends on </label>
								<div class="input-group">
									<input type="text" name="end_date" id="end_date" placeholder="End Date" value="<?= $promo['ends_on'] ?>"  class="form-control py-2 border-right-0 border" <?php if($promo['no_end_date'] == "Y"){ ?> disabled <?php } ?>>
												<span class="input-group-append">
														<button class="btn btn-outline-secondary border-left-0 border" type="button">
																<i class="fa fa-calendar"></i>
														</button>
													</span>
										</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-4">
								<button type="button" class="btn btn-primary" id="btnEditPromo">Update</button>
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
				<div class="card-header-malle">Promotion Images</div>
				<div class="card-body">
					<div class="row">
						<?php
							for($i = 1; $i <= 5; $i++){
							if (@$image_count[$i][0]->image_count == $i) {
						 ?>
										<div class="col-md-2">
											 <img src="<?= base_url('promos/') . $image_count[$i][0]->image_name ?>" class="img-thumbnail">
											<a href="#" id="removeimagefrommall<?= $image_count[$i][0]->image_count ?>" data="<?= $image_count[$i][0]->mallpromo_image_id?>" class="text-danger font-12">Remove</a>
										</div>
							<?php } else{ ?>
										<div class="col-md-2">
											<form action="<?= base_url('Merchant/addImagePromo/') .  $promo['merchant_id'] . '/' . $promo['promo_id'].'/'.$i?>" class="dropzone" id="image1<?=$i?>"> </form>
										</div>
							<?php } } ?>

					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row move-top">
		 <div class="col-md-10">
			<div class="card card-malle">
				<div class="card-header-malle">
					<div class="row">
						<div class="col-md-3">Promo Tags</div>
					</div>
				</div>
				<div class="card-body">
					<form class="form-inline" method="post" action="" id="tagtypePromoForm" autocomplete="off">
						<div class="form-group col-md-7">
						 <input type="hidden" name="promo_id" id="promo_id" value="<?= $promo['promo_id'] ?>">
							<input type="hidden" name="user_id" id="user_id" value="<?= $promo['user_id'] ?>">
							<input type="hidden" name="merchant_id" id="merchant_id" value="<?= $promo['merchant_id'] ?>">

							<input type="text" name="tagtype" id="tagtype" placeholder="Tag Name" class="form-control col-md-12" required list="datalist1">
							<datalist id="datalist1">
									<?php
										foreach ($tags as $tag) {
									?>
										<option value="<?= $tag->tag_name ?>">
									<?php
											}

									 ?>

								</datalist>
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-primary" id="btnAddPromoTagType">Update</button>
						</div>
					</form>
					<div class="row mt-4">
						<div class="col-md-9">
							<table class="table table-striped malle-table">
								<thead>
									<th>Tag Name</th>
									<th>Primary Tag</th>
									<th></th>
								</thead>
								<tbody id="tagPromoTypeTable">


								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row move-top">
		 <div class="col-md-10">
			<div class="card card-malle">
				<div class="card-header-malle">
					<div class="row">
						<div class="col-md-3">Promotion in Outlets</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped malle-table">

								<tbody id="tblPromoOutlets">


								</tbody>
							</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row move-top">
		 <div class="col-md-10">
			<div class="card card-malle">
				<div class="card-header-malle">
					<div class="row">
						<div class="col-md-5">Promotions - Days of Week</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped malle-table">
								<thead>
									<th>Monday</th>
									<th>Tuesday</th>
									<th>Wednesday</th>
									<th>Thursday</th>
									<th>Friday</th>
									<th>Saturday</th>
									<th>Sunday</th>
								</thead>
								<tbody id="tblDOW">

									<tr>
										<td>
											<select name="Monday" id="Monday" class="deal-status" >

												<?php
													if ($dow['monday'] == 'N' || $dow['monday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Tuesday" id="Tuesday" class="deal-status">
												<?php
													if ($dow['tuesday'] == 'N' || $dow['tuesday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Wednesday" id="Wednesday" class="deal-status">
												<?php
													if ($dow['wednesday'] == 'N' || $dow['wednesday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Thursday" id="Thursday" class="deal-status">
												<?php
													if ($dow['thursday'] == 'N' || $dow['thursday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Friday" id="Friday" class="deal-status">
												<?php
													if ($dow['friday'] == 'N' || $dow['friday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Saturday" id="Saturday" class="deal-status">
												<?php
													if ($dow['saturday'] == 'N' || $dow['saturday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>
										<td>
											<select name="Sunday" id="Sunday" class="deal-status">
												<?php
													if ($dow['sunday'] == 'N' || $dow['sunday'] == '') {
												?>
													<option value="Y">Yes</option>
													<option value="N" selected>No</option>
												<?php
													} else{
												?>
													<option value="Y" selected>Yes</option>
													<option value="N" >No</option>
												<?php } ?>
											</select>
										</td>

									</tr>
								</tbody>
							</table>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="deletetagmodal" tabindex="-1" role="dialog" aria-labelledby="deletetaglabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="deletetaglabel">Delete Confirmation</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body ">
						<p class="font-12">Are you sure you want to delete this tag?</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<button type="button" class="btn btn-danger" id="btndeletetag">Yes</button>
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




<script type="text/javascript" src="<?= base_url('assets/js/dropzone.js') ?>"></script>
<script type="text/javascript">

Dropzone.options.image11 = {
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
Dropzone.options.image12 = {
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
Dropzone.options.image13 = {
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
Dropzone.options.image14 = {
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
Dropzone.options.image15 = {
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

function isNumber(evt) {
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 46 || charCode > 57) ) {
					return false;
			}

			return true;
	}

			$('#no_end_date').click(function() {
					if ($(this). prop("checked") == true) {
							$("#end_date").attr('disabled', true).val("");
					}
					else {
							$("#end_date").attr('disabled', false);
					}
			});

	$('#yes_redeemable').click(function(){
			$('#redeemable_txt').val('Y');
		});

		$('#no_redeemable').click(function(){
			$('#redeemable_txt').val('N');
		});



		$('#btnEditPromo').click(function(){

			var data = $('#editPromoform').serialize();


			if ($('#description').val().length > 0) {

						$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processEditMerchantProm') ?>',
										data : data,
										async : false,
										dataType : 'json',
										success : function(response){

											toastr['info']('Promo edited.');


										},
										error : function(){
											toastr['error']('Could not edit promo.');
										}
									});

		}else{
			toastr["error"]("Description can't be null.");
		}

		});



		$('#removeimagefrommall1').click(function(e){
		e.preventDefault();

		var mallpromo_image_id = $(this).attr('data');
		//var image_count = $(this).attr('image_count');

		$('#deleteimagemodal').modal('show');

		$('#btndeleteimage').unbind().click(function(){

			$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
						data : {mallpromo_image_id:mallpromo_image_id},
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


	$('#removeimagefrommall2').click(function(e){
		e.preventDefault();

		var mallpromo_image_id = $(this).attr('data');
		//var image_count = $(this).attr('image_count');

		$('#deleteimagemodal').modal('show');

		$('#btndeleteimage').unbind().click(function(){

			$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
						data : {mallpromo_image_id:mallpromo_image_id},
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


	$('#removeimagefrommall3').click(function(e){
		e.preventDefault();

		var mallpromo_image_id = $(this).attr('data');
		//var image_count = $(this).attr('image_count');

		$('#deleteimagemodal').modal('show');

		$('#btndeleteimage').unbind().click(function(){

			$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
						data : {mallpromo_image_id:mallpromo_image_id},
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


	$('#removeimagefrommall4').click(function(e){
		e.preventDefault();

		var mallpromo_image_id = $(this).attr('data');
		//var image_count = $(this).attr('image_count');

		$('#deleteimagemodal').modal('show');

		$('#btndeleteimage').unbind().click(function(){

			$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
						data : {mallpromo_image_id:mallpromo_image_id},
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


	$('#removeimagefrommall5').click(function(e){
		e.preventDefault();

		var mallpromo_image_id = $(this).attr('data');
		//var image_count = $(this).attr('image_count');

		$('#deleteimagemodal').modal('show');

		$('#btndeleteimage').unbind().click(function(){

			$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/destroMerchantImagePromo') ?>',
						data : {mallpromo_image_id:mallpromo_image_id},
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




	$('#btnAddPromoTagType').click(function(){



			var data = $('#tagtypePromoForm').serialize();
			console.log(data);
			alert(data);
			// promo_id=4&user_id=1&merchant_id=2&tagtype=ads
			// promo_id=4&user_id=1&merchant_id=2&tagtype=Free%20Stuff
			// tagtype

						$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processMerchantPromoTagType') ?>',
										data : data,
										async : false,
										dataType : 'json',
										success : function(response){
											 displaytagTypeTable();
											toastr['info']('Promo Tag updated.');


										},
										error : function(){
											toastr['error']('Could not update Promo Tag.');
										}
									});




		});




	$(function(){

		displaytagTypeTable();
		displayPromoOutlets();

		function displayPromoOutlets(){

		var merchant_id = $('#merchant_id_main').val();
		var promo_id = $('#promo_id_main').val();


		$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/displayMerchantPromoOutlets') ?>',
						data : {merchant_id:merchant_id, promo_id:promo_id},
						dataType : 'json',
						success : function(data){
							// console.log(data);

							var html = '';
							var c ;
							var sel = 'selected';

					if (data.length == 0) {
						html += '<div class="alert alert-info mt-4" role="alert">No tag type(s) yet.</div>';
					}else{
						for(type = 0; type < data.length ; type++){


							html += '<tr>'+
										'<td>'+ data[type].mall_name +'</td>'+
									'</tr>';


						}
					}

							$('#tblPromoOutlets').html(html);
						},
						error : function(){
							alert("Error retrieving locations.");
						}
					});
				}


		function displaytagTypeTable(){

		var promo_id = $('#promo_id_main').val();

		$.ajax({
						type : 'ajax',
						method : 'get',
						async : false,
						url : '<?= base_url('Merchant/displayMerchantPromoTagType') ?>',
						data : {promo_id:promo_id},
						dataType : 'json',
						success : function(data){
							// console.log(data);

							var html = '';
							var c ;
							var sel = 'selected';

					if (data.length == 0) {
						html += '<div class="alert alert-info mt-4" role="alert">No tag type(s) yet.</div>';
					}else{
						for(type = 0; type < data.length ; type++){


							html += '<tr>'+
										'<td>'+ data[type].tag_name +'</td>'+
										'<td><select name="primary_tag" id="primary_tag" class="deal-status" data="'+ data[type].pt_id +'">';

											if (data[type].primary_tag == 'N' || data[type].primary_tag == '') {
												html +=	'<option value="N" '+ sel +'>No</option>'+
														'<option value="Y">Yes</option>';
											}else{
												html +=	'<option value="Y" '+ sel +'>Yes</option>'+
														'<option value="N">No</option>';
											}


										html += '</select></td>'+
										'<td class="text-right"><a href="#" data="'+ data[type].pt_id +'" class="text-danger btn-delete">Delete</a></td>'+

									'</tr>';


						}
					}

							$('#tagPromoTypeTable').html(html);
						},
						error : function(){
							alert("Error retrieving locations.");
						}
					});
				}





		$('#tagPromoTypeTable').on('click','.btn-delete', function(){
			var pt_id = $(this).attr('data');
			$('#deletetagmodal').modal('show');
			$('#btndeletetag').unbind().click(function(){
				$.ajax({
					type : 'ajax',
					method : 'get',
					async : false,
					url : '<?= base_url('Merchant/destroyMerchantPromoTagType') ?>',
					data : {pt_id:pt_id},
					dataType : 'json',
					success : function(response){
						if (response.success) {
							$('#deletetagmodal').modal('hide');
							displaytagTypeTable();
							toastr['info']('Tag deleted.');
						}
						else{
							$('#deletetagmodal').modal('hide');
							toastr['error']("Can't delete this tag.");
						}

					},
					error : function(){
						alert("Error deleting tag.");
					}
				});
			});
		});

		$('#tagPromoTypeTable').on('change','#primary_tag',function(){

		var pt_id = $(this).attr('data');
		var primary_tag = $('#primary_tag').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processPrimaryTag') ?>',
										data : {pt_id:pt_id,primary_tag:primary_tag},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Primary tag updated.');

										},
										error : function(){
											toastr['error']('Could not update Primary tag.');
										}
									});

	});

		$('#tblDOW').on('change','#Monday',function(){

		var promo_id = $('#promo_id_main').val();
		var Monday = $('#Monday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processMonday') ?>',
										data : {promo_id:promo_id,Monday:Monday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Monday updated.');

										},
										error : function(){
											toastr['error']('Could not update Monday.');
										}
									});

	});

		$('#tblDOW').on('change','#Tuesday',function(){

		var promo_id = $('#promo_id_main').val();
		var Tuesday = $('#Tuesday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processTuesday') ?>',
										data : {promo_id:promo_id,Tuesday:Tuesday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Tuesday updated.');

										},
										error : function(){
											toastr['error']('Could not update Tuesday.');
										}
									});

	});


	$('#tblDOW').on('change','#Wednesday',function(){

		var promo_id = $('#promo_id_main').val();
		var Wednesday = $('#Wednesday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processWednesday') ?>',
										data : {promo_id:promo_id,Wednesday:Wednesday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Wednesday updated.');

										},
										error : function(){
											toastr['error']('Could not update Wednesday.');
										}
									});

	});


	$('#tblDOW').on('change','#Thursday',function(){

		var promo_id = $('#promo_id_main').val();
		var Thursday = $('#Thursday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processThursday') ?>',
										data : {promo_id:promo_id,Thursday:Thursday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Thursday updated.');

										},
										error : function(){
											toastr['error']('Could not update Thursday.');
										}
									});

	});


	$('#tblDOW').on('change','#Friday',function(){

		var promo_id = $('#promo_id_main').val();
		var Friday = $('#Friday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processFriday') ?>',
										data : {promo_id:promo_id,Friday:Friday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Friday updated.');

										},
										error : function(){
											toastr['error']('Could not update Friday.');
										}
									});

	});


	$('#tblDOW').on('change','#Saturday',function(){

		var promo_id = $('#promo_id_main').val();
		var Saturday = $('#Saturday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processSaturday') ?>',
										data : {promo_id:promo_id,Saturday:Saturday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Saturday updated.');

										},
										error : function(){
											toastr['error']('Could not update Saturday.');
										}
									});

	});


	$('#tblDOW').on('change','#Sunday',function(){

		var promo_id = $('#promo_id_main').val();
		var Sunday = $('#Sunday').val();

					$.ajax({
										type : 'ajax',
										method : 'post',
										url : '<?= base_url('Merchant/processSunday') ?>',
										data : {promo_id:promo_id,Sunday:Sunday},
										async : false,
										dataType : 'json',
										success : function(response){
											toastr['info']('Sunday updated.');

										},
										error : function(){
											toastr['error']('Could not update Sunday.');
										}
									});

	});




});






</script>
