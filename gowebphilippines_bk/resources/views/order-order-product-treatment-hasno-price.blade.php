<?php

// for ($i=0; $i < count($value['order_treatment']); $i++) {
//   if(!array_key_exists($i, $value['order_treatment_price'])) {
//     $curr = $value['order_treatment_price'];
//     if (empty($cur)) {
//       $value['order_treatment_price'][$i] = 10;
//     }
//   }
// }
//
// var_dump(array_key_exists(1, $value['order_treatment_price']));
// echo '<pre>';
// print_r($value);
// echo '</pre>';


?>

<div class="add-row" id="" style="border-bottom:1px solid #eee; margin-bottom:5px;">
  <button type="button" class="close remove_treatment" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="">Product </label>
      <input type="text" class="form-control" data-error="order_product" id="order_product_" name="order_product[]" value="{{ $value['order_product'] }}">
      <div class="invalid-feedback">
        Name on card is required
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="">Amount</label>
      <input type="number" min="1" class="form-control order_amount" data-error="order_amount" id="order_amount_" name="order_amount[]" value="{{ $value['order_amount'] }}">
    </div>
    <div class="col-md-6 mb-3">
      <label for="vn">Material</label>
      <input type="text" class="form-control" data-error="order_material" id="order_material_" name="order_material[]" value="{{ $value['order_material'] }}">
      <div class="invalid-feedback">
        Please select Supplier
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="">Dimensions/Weight</label>
      <input type="text" class="form-control" data-error="order_dimensionweight" id="order_dimensionweight_" name="order_dimensionweight[]" value="{{ $value['order_dimensionweight'] }}">
    </div>
    <div class="col-md-12 mb-3">
      <label for="">Technical/Drawing Reference</label>
      <input type="text" class="form-control" data-error="order_technical_drawingreference" id="order_technical_drawingreference_" name="order_technical_drawingreference[]" value="{{ $value['order_technical_drawingreference'] }}">
    </div>
  </div>

  <div class="row append-treatment">

    <?php
    if(!empty($value['order_treatment'])) {

      $order_treatment = $value['order_treatment'];
      $order_treatment_details = $value['order_treatment_details'];
      $order_treatment_price = $value['order_treatment_price'];

      foreach ($order_treatment as $key1 => $value1) { ?>

        <div class="col-md-12 mb-3">
          <button type="button" class="close remove_treatment" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="mb-3 input_treatment_title">
            <label for="title">Treatment title </label>
            <input type="text" class="form-control treattitle_" data-id="" name="order_treatment[product_name][<?php echo $value['order_product']; ?>][]" value="{{ $value1 }}" id="treattitle_" placeholder="Title">
          </div>
          <div class="mb-3">
            <label for="title">Treatment description </label>
            <textarea name="order_treatment_details[product_name][<?php echo $value['order_product']; ?>][]" class="form-control treatdetails_">{{ $order_treatment_details[$key1] }}</textarea>
          </div>
          <div class="mb-3 input_treatment_price" style="display:none;">
            <label for="title">Treatment price </label>
            <input type="text" class="form-control treatprice_" data-id="" name="order_treatment_price[product_name][<?php echo $value['order_product']; ?>][]" value="{{ $order_treatment_price[$key1] }}" id="treatprice_" placeholder="Price">
          </div>

        </div>
        <?php
      }
    } ?>

  </div>


  <div class="row btn-treatment">

    <div class="col-md-12 mb-3">
      <div class="add_treatment_button_with-no-price btn btn-info btn-submit btn-sm">Add Treatment</div>
    </div>

  </div>

</div>
