$(function() {
	var productArr = [];
	var i = 0;
	var t = [];
	$("button#add-new-products").on('click', function(){
		var counter = i++;
		var  order_new_product = $("input#order_new_product").val();
		var  order_new_amount = $("input#order_new_amount").val();
		var  order_new_material = $("input#order_new_material").val();
		var  order_new_dimensionweight = $("input#order_new_dimensionweight").val();
		var  order_new_technical_drawingreference = $("input#order_new_technical_drawingreference").val();	
		$("div#append-product").append(
			'<div id="div'+counter+'" class="row targetDiv added-product">'+
			'<div class="col-md-6 mb-3">'+
			'<label for="">Product </label> '+
			'<input type="text" class="form-control" data-error="order_product" name="order_product[]" id="order_product_'+counter+'" value="'+order_new_product+'" />'+
			'</div> '+
			'<div class="col-md-6 mb-3"> '+
			'<label for="">Amount</label> '+
			'<input type="number" min="1" class="form-control order_amount" data-error="order_amount" name="order_amount[]" value="'+order_new_amount+'" />'+
			'</div> '+
			'<div class="col-md-6 mb-3"> '+
			'<label for="vn">Material</label> '+
			'<input type="text" class="form-control" data-error="order_material" name="order_material[]" value="'+order_new_material+'" />'+
			'</div> '+
			'<div class="col-md-6 mb-3"> '+
			'<label for="">Dimensions/Weight</label> '+
			'<input type="text" class="form-control" data-error="order_dimensionweight" name="order_dimensionweight[]" value="'+order_new_dimensionweight+'" />'+
			'</div>'+
			'<div class="col-md-12 mb-3"> '+
			'<label for="">Technical/Drawing Reference</label> '+
			'<input type="text" class="form-control" data-error="order_technical_drawingreference" name="order_technical_drawingreference[]" value="'+order_new_technical_drawingreference+'" />'+
			'</div>'+
			'</div>'
		);
		$("input#order_new_product").val('');
		$("input#order_new_amount").val('');
		$("input#order_new_material").val('');
		$("input#order_new_dimensionweight").val('');
		$("input#order_new_technical_drawingreference").val('');
		// }
		if(order_new_product !== ''){
			productArr.push(order_new_product);
			// for product
			$("div#product-list #default").after(
				'<div class="col-md-12 mb-3">'+
				'<input type="checkbox" class="showSingle update_order_product" name="update_order_product" target="'+counter+'" id="update_order_product_'+counter+'" value="'+order_new_product+'"/>'+
				'<label for="'+order_new_product+'">'+order_new_product+'</label>'+
				`<a data-counter="${counter}" class="product-remove" href="javascript:;"> (remove) </a>`+
				'</div>'
			);
			// for treatment
			$("div#reference-product-list").append(
				'<div class="col-md-12 mb-3">'+
				'<input type="checkbox" class="reference_order_product" data-id="'+counter+'" id="reference_order_product_'+counter+'" value="'+order_new_product+'"/>'+
				'<label for="'+order_new_product+'">'+order_new_product+'</label>'+
				'<div id="treatment-list-'+counter+'"></div>'+
				'</div>'
			);
			$("#product-treatment-orderlists").append(
				'<div class="col-md-12 mb-3">'+
				'<input type="hidden" class="reference_order_product" data-id="'+counter+'" id="reference_treatment_orderlists_'+counter+'" value="'+order_new_product+'"/>'+
				'<label for="'+order_new_product+'">Product: '+order_new_product+'</label>'+
				'<div id="treatment-list-'+counter+'"></div>'+
				'</div>'
			);

			var addTreatment = [];			
			$('#reference_order_product_'+counter).change(function(event){
				var target = this;
				if (this.checked){
					console.log('add treatment has checked now');				
					addTreatment.push(this.value);					
				} else {					
					var removeItem = this.value;
					addTreatment = jQuery.grep(addTreatment, function(value) {
						return value != removeItem;
					});					
				}				
				
				var titleInput = [];
				var tc = 0;
				// add treatment to product
				$('body').on("click", ".add_new_treatment", function(e) {
					var tCounter = tc++;
					var btnClick = $(this); 					
					var title = $("input#treatment-title").val();
					console.log('VAL: '+title);
					var desc = $("textarea#treatment-details").val();
					var treatmentTitle = $("input.treatment-title").attr('data-title');
					var treatmentDetails = $("textarea.treatment-details").attr('data-desc', desc);
					
					// $('#treatment-title').on('input', function(){									
						// titleInput.push(this.value);
						// console.log('titleInput: ' + this.value);		
					// });
					
					$("input#treatment-title").removeAttr('data-title');
					if (target.checked){
						if(treatmentTitle || treatmentDetails){
							if(addTreatment.length){
								treatment_product = unique(addTreatment);					
															
								var $clone = $(".append-treatment .treatment-for-this-product")
												.clone()
												.removeClass('treatment-for-this-product')
												.removeClass('treatment-title')
												.addClass('clone-product-'+counter)
												.attr('data-tcounter', tCounter)
												.attr('data-id', counter)
												// .attr('id', counter);
												// .attr('data-ref', treatment_product);
												.css('display', 'none');

								$('.append-treatment-clone').append($clone);
								$('.append-treatment-clone')
									.find('.clone-product-'+counter)
									.find('input.treatment-title')
									.attr('name','order_treatment[product_name]['+treatment_product+'][]')
									.attr('data-id', counter)
									.attr('id', treatment_product);
									
									// .attr('value', title);

								$('.append-treatment-clone')
									.find('.clone-product-'+counter)
									.find('textarea.treatment-details')
									.attr('name','order_treatment_details[product_name]['+treatment_product+'][]')
									.attr('data-id', counter);
								
								$('.append-treatment-clone')
									.find('.clone-product-'+counter)
									.find('input.treatment-price')
									.attr('name','order_treatment_price[product_name]['+treatment_product+'][]')
									.attr('data-id', counter);	
																					
								
								var seen = {};
								var atc =  $('.append-treatment-clone');
								
								$(atc.find('.clone-product-'+counter)).each(function() {
									var title   = $(this).find('input.treatment-title').val();
									var details = $(this).find('textarea.treatment-details').val();
									var dataid  = $(this).find('input.treatment-title').attr('data-id');
									
									$('#reference_order_product_'+dataid).parent().find('div#treatment-list-'+counter).append(
										'<div><ul><li>' +title+' <a href="javascript:void(0)" dataid-id="'+dataid+'" data-tcounter='+tCounter+' data-title="'+title+'" class="removeTreatment">(remove)</a></li></ul></div>'
									);								
									
									$('#reference_treatment_orderlists_'+dataid).parent().find('div#treatment-list-'+counter).attr('data-title', title);
									$('#reference_treatment_orderlists_'+dataid).parent().find('div#treatment-list-'+counter).append(
										'<div id="'+title+'"><ul><li>Treatment: ' +title+'</li></ul></div>'
									);					
									
									setTimeout(function() {										
										$('.append-treatment').find('input.treatment-title').val('');
										$('.append-treatment').find('textarea.treatment-details').val('');
									}, 500);
																		
									if (seen[title]){
										$(this).remove();
									}else{
										seen[title] = true;
									}
								});
								var remove_duplicate = {};
								$('div#treatment-list-'+counter).find('div').each(function(key, value){
									var txt = $(this).text();
									if (remove_duplicate[txt]){
										$(this).remove();
									}else{
										remove_duplicate[txt] = true;
									}
								});

								$(".removeTreatment").click(function(){
									var dataTcounter = $(this).attr('data-tcounter'); 
									var data_id = $(this).attr('dataid-id');

									var titled = $(this).attr('data-title');	
									var parent_product = $(this).parent().parent().parent().parent().parent().find("input#reference_order_product_"+data_id).val();	

									var val = $("div.append-treatment-clone").find("input#"+parent_product).val(); 						

									$("div.append-treatment-clone").find('div').each(function(i, n){
										console.log(i, n);
									
										if(	$(this).attr('data-id') === data_id && $(this).attr('data-tcounter') === dataTcounter){										
										
											$(this).remove(); 
										}

									});
									
									$("#product-treatment-orderlists").find("div#treatment-list-"+data_id).find("div#"+titled).remove(); 

									$(this).css({'border':'1px solid red'});	

									$(this).parent().parent().remove(); 
								});
							}
						}
					}					
					
					$('[name="createorder"]').each(function(){
											
					});
					$('input#reference_order_product_'+counter).prop( "checked", false );					
					
				});
			});
		}
		$('input.update_order_product:checkbox').on('change',function(){
			var th = $(this), name = th.prop('name');
			if(th.is(':checked')){
				$(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);
			}
		});
		$('#div'+counter).hide();
		$('.showSingle').click(function(){
			var target = $(this).attr('target');
			$('div#append-product').css('display','block');
			$('.targetDiv').hide();
			$('#div'+$(this).attr('target')).show();
			$("button#add-new-products").on('click', function(){
				// products
				var new_val = $('input#order_product_'+target).val();
				$("input#update_order_product_"+target).parent().find('label').text(new_val);
				$("input#update_order_product_"+target).val(new_val);
				//treatment
				$("input#reference_order_product_"+target).parent().find('label').text(new_val);
				$("input#reference_order_product_"+target).val(new_val);
			});
		});
		$('#default').click(function(){
			$('div#append-product').css('display','none');
			$('.targetDiv').show();
		});
		// Remove already added product
		$('div#product-list').on('click', '.product-remove', function() {
			// Remove the wish from the DOM and update the sum
			$(this).parent().remove();
			$(this).css({'border': '1px solid red'});
			var target_counter = $(this).attr('data-counter');		
			$("#reference_treatment_orderlists_"+target_counter).parent().remove(); 			
			$("input#reference_order_product_"+target_counter).parent().remove();			
		});
	});
	// remove duplicate from array
	function unique(list) {
		var result = [];
		$.each(list, function(i, e) {
			if ($.inArray(e, result) == -1) result.push(e);
		});
		return result;
	}
});
