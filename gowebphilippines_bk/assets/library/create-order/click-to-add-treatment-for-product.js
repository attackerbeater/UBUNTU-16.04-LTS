$(function() {
  var max_fields = 9999;
  var x = 0;
  $('body').on("click", ".add_new_treatment_button", function(e) {
    var index = $(this).parent().parent().parent().find('[name="order_product[]"]').val();
    if (x < max_fields) {
      x++;
      counter = x;
      $(this).parent().parent().parent().find('.append-treatment').append(
        '<div class="col-md-12 mb-3 treatment-for-this-product">'+
        '<button type="button" class="close remove_treatment" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '<div class="mb-3">'+
        '<label for="title">Treatment</label>'+
        '<input type="text" class="form-control" id="treatment-title" adad placeholder="Title" value="">'+
        '</div>'+
        '<div class="mb-3">'+
        '<label for="title">Treatment description</label>'+
        '<textarea id="treatment-details" class="form-control"></textarea>'+
        '</div>'+
        '</div>'
      );
      $(".append-treatment").on('change', '#treatment-title-'+counter, function(){
        console.log($(this).val());
      });
    }
  });
  $('body').on("click", ".remove_treatment", function(e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  });
});
