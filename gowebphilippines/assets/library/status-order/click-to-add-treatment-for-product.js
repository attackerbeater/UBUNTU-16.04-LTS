$(function() {

  // TREATMENT
  var max_fields = 9999;
  var x = 0;
  $('body').on("click", ".add_treatment_button", function(e) {

    var index = $(this).parent().parent().parent().find('[name="order_product[]"]').val();

    if (x < max_fields) {
      x++;
      counter = x;
      $(this).parent().parent().parent().find('.append-treatment').append(
        '<div class="col-md-12 mb-3">'+
        '<button type="button" class="close remove_treatment" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '<div class="mb-3">'+
        '<label for="title">Treatment title</label>'+
        '<input type="text" class="form-control" name="order_treatment[product_name]['+index+'][]" id="treattitle_'+counter+'" placeholder="Title">'+
        '</div>'+
        '<div class="mb-3">'+
        '<label for="title">Treatment description </label>'+
        '<textarea name="order_treatment_details[product_name]['+index+'][]" id="treatdetails_'+counter+'" class="form-control"></textarea>'+
        '</div>'+
        '<div class="mb-3">'+
        '<label for="title">Treatment price</label>'+
        '<input type="number" step="any" min="0.00" class="form-control" name="order_treatment_price[product_name]['+index+'][]" id="treatprice_'+counter+'" placeholder="Price">'+
        '</div>'+
        '</div>'
      );

    }
  });
  
  /* end add treatment */

  /* add treatment */
  $('body').on("click", ".remove_treatment", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  });
});
