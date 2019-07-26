<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>add demo</title>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<div class="page">
<!--   <ul>
      <li>Quantità: <span><input type="text" name="Quantita" value="" class="quantita"></span></li>
      <li>Valore unitario: <span><input type="text" name="ValoreUnitario" value="" class="valore"></span></li>
      <li> Valore totale: <span><input type="text" name="ValoreTotale" value="0.00" class="somma"></span></li>
  </ul> -->

  <div id="foo"></div>

  <input type="submit" value="ADD MORE" class="button" id="clicca">
  <ul>
      <li>Total amount:<input id="amount" type="text" name="Imponibile-Importo" value="0.00"></li>
  </ul>
</div>



<script>
$(".page").on("change keyup keydown paste propertychange bind mouseover", function(){
  // alert(1);
    calculateSum();
});

// add fields
$( "#clicca" ).click(function() {
  $( "#foo" ).append(
      '<ul>' + '\n\r' +
        '<li>Quantità: <span><input type="text" name="Quantita" value="" class="quantita"></span></li>' + '\n\r' +
        '<li>Valore unitario: <span><input type="text" name="ValoreUnitario" value="" class="valore"></span></li>' + '\n\r' +
        '<li>Valore totale: <span><input type="text" name="ValoreTotale" value="0.00" class="somma"></span></li>' + '\n\r' +
      '</ul>'
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

          var quantita = $(this).closest("ul").find("input.quantita:text").val();
          var valore = $(this).closest("ul").find("input.valore:text").val();

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
