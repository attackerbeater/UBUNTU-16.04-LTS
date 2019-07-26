
$('.modal').on('hidden.bs.modal', function (e) {
  
  $('[name="update_treatement_price"]').val(0);
  
  $(this).find('form')[0].reset(); //reset your form after your modal window has been closed
  location.reload();
  
  $('form').get(0).reset();
  $('form')[0].reset();
  resetErrors();
  
});
// reload current modal when click outside, close or hidden
$('.modal').on('show.bs.modal', function (e) {});
