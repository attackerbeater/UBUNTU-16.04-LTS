$(function() {

    var max_fields = 9999;
    var _products = $(".order_product_append").find(".order_product-update");
    var add_button = $(".add_field_products");
    var x = 0;
    $('body').on("click", ".add_field_products", function(e) { 
        e.preventDefault();
        
        if (x < max_fields) {   
            x++;
            counter = x;          
            _products.append('<div class="add-row" product_id="'+counter+'" style="border-bottom:1px solid #eee; margin-bottom:5px;">' +
                '<button type="button" class="close remove_" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '<div class="row">' +
                    '<div class="col-md-6 mb-3">' +
                        '<label for="ban">Product </label>' +
                        '<input type="text" class="form-control" data-error="order_product.'+counter+'" id="order_product_'+counter+'" name="order_product[]">' +
                        '<div class="invalid-feedback">' +
                            'Name on card is required' +
                        '</div>' +
                    '</div>' +               
                    '<div class="col-md-6 mb-3">' +
                        '<label for="ban">Amount</label>' +
                        '<input type="number" min="1" class="form-control order_amount" data-error="order_amount.'+counter+'" id="order_amount_'+counter+'" name="order_amount[]">' +
                    '</div>' +
                    '<div class="col-md-6 mb-3">' +
                        '<label for="vn">Material</label>' +
                        '<input type="text" class="form-control" data-error="order_material.'+counter+'" id="order_material_'+counter+'" name="order_material[]">' +
                        '<div class="invalid-feedback">' +
                            'Please select Supplier' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-md-6 mb-3">' +
                        '<label for="ban">Dimensions/Weight</label>' +
                        '<input type="text" class="form-control" data-error="order_dimensionweight.'+counter+'" id="order_dimensionweight_'+counter+'" name="order_dimensionweight[]">' +
                    '</div>' +                
                    '<div class="col-md-12 mb-3">' +
                        '<label for="ban">Technical/Drawing Reference</label>' +
                        '<input type="text" class="form-control" data-error="order_technical_drawingreference.'+counter+'" id="order_technical_drawingreference_'+counter+'" name="order_technical_drawingreference[]">' +
                    '</div>' +                  
                '</div>' +              
                '<div class="row append-treatment">'+                                 
            
                '</div>'+
                '<div class="row btn-treatment">'+ 
                    '<div class="col-md-12 mb-3">'+   
                        '<div class="add_treatment_button btn btn-info btn-submit btn-sm">Add Treatment</div>'+
                    '</div>'+
                '</div>'+                     
            '</div>');  

        }

        if($(".add_field_products").hasClass('remove')){
        
            $('.order_product_append').find('div > .row > div:nth-child(6)').addClass('price-field-hide');    
        }

    });

    _products.on("click", ".remove_", function(e) { 
     
        e.preventDefault();

        // get the order number of specific div eg: 0,1 or 2
        var index = $(this).parent('div.add-row').index();

        // delete based on the order of div. multi delete 
        $("div.order_product-update").find('div.add-row:nth('+index+')').remove();
        x--;
    });   

});   
