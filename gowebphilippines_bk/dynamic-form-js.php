<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>add demo</title>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<div class="input_fields_wrap_products">
  <div id="foo"></div>
    <!-- <div class="add-row" style="background: #eee; margin-bottom:5px;">
        <button type="button" class="close remove_field" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="ban">Product</label>
            <input type="text" class="form-control" id="order_product" name="order_product[]" placeholder="">
            <div class="invalid-feedback">Name on card is required</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="vn">Price / Piece</label>
            <input type="text" class="form-control order_price" id="order_price" name="order_price[]" placeholder="">
            <div class="invalid-feedback">Please enter your Vat Number address.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="ban">Amount</label>
            <input type="text" class="form-control order_amount" id="order_amount" name="order_amount[]">
          </div>
          <div class="col-md-6 mb-3">
            <label for="vn">Material</label>
            <input type="text" class="form-control" id="order_material" name="order_material[]" placeholder="">
            <div class="invalid-feedback">Please select Suppier</div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="ban">Dimensions/Weight</label>
            <input type="text" class="form-control" id="orderAmount" name="order_dimensionweight[]">
          </div>
        </div>
    </div> -->
</div>

<div class="row">
	<div class="col-md-6 mb-3">
		<button class="add_field_button btn btn-primary btn-submit">Add Product</button>
	</div>

  <ul>
      <li>Total amount:<input id="amount" type="text" name="Imponibile-Importo" value="0.00"></li>
  </ul>
</div>



<script>
// autocompute dynamic form
// url: http://jsfiddle.net/j2Lcmsm7/72/
$(".input_fields_wrap_products").on("change keyup keydown paste propertychange bind mouseover", function(){
  // alert(1);
    calculateSum();
});

// add fields
$( ".add_field_button" ).click(function() {
  $( "#foo" ).append(
      '<div class="add-row" style="background: #eee; margin-bottom:5px;">'+
          '<button type="button" class="close remove_field" aria-label="Close">'+
            '<span aria-hidden="true">×</span>'+
          '</button>'+
          '<div class="row">'+
            '<div class="col-md-6 mb-3">'+
              '<label for="ban">Product</label>'+
              '<input type="text" class="form-control" id="order_product" name="order_product[]" placeholder="">'+
              '<div class="invalid-feedback">Name on card is required</div>'+
            '</div>'+
            '<div class="col-md-6 mb-3">'+
              '<label for="vn">Price / Piece</label>'+

              '<input type="text" class="form-control order_price valore" id="order_price" name="order_price[]" placeholder="">'+
            '</div>'+
            '<div class="col-md-6 mb-3">'+
              '<label for="ban">Amount</label>'+
              '<input type="text" class="form-control order_amount quantita" id="order_amount" name="order_amount[]">'+
            '</div>'+
            '<div class="col-md-6 mb-3">'+
              '<label for="vn">Material</label>'+
              '<input type="text" class="form-control" id="order_material" name="order_material[]" placeholder="">'+
              '<div class="invalid-feedback">Please select Suppier</div>'+
            '</div>'+
            '<div class="col-md-6 mb-3">'+
              '<label for="ban">Dimensions/Weight</label>'+
              '<input type="text" class="form-control" id="orderAmount" name="order_dimensionweight[]">'+
            '</div>'+
          '</div>'+
          '<input type="text" name="ValoreTotale" value="0.00" class= "somma">'+
      '</div>'
  );

  $(".somma").each(function() {
      $(this).keyup(function(){
          calculateSum();

      });
  });

});

// function
function calculateSum() {
  var sum = 0;
  $(".somma").each(function() {
      if(!isNaN(this.value) && this.value.length!=0) {

          var quantita = $(this).closest(".add-row").find("input.order_amount:text").val();
          var valore = $(this).closest(".add-row").find("input.order_price:text").val();

          var subTot = (quantita * valore);

          $(this).val(subTot.toFixed(2));

          sum += parseFloat(subTot.toFixed(2));
      }
  });
  $('#amount').val(sum.toFixed(2));
}




</script>

</body>
</html>
