
<div class="add-row" id="" style="border-bottom:1px solid #eee; margin-bottom:5px;">

  <input type="hidden" class="form-control" data-error="order_product" id="order_product_" name="order_product[]" value="{{ $value['order_product'] }}">
  <input type="hidden" min="1" class="form-control order_amount" data-error="order_amount" id="order_amount_" name="order_amount[]" value="{{ $value['order_amount'] }}">
  <input type="hidden" class="form-control" data-error="order_material" id="order_material_" name="order_material[]" value="{{ $value['order_material'] }}">
  <input type="hidden" class="form-control" data-error="order_dimensionweight" id="order_dimensionweight_" name="order_dimensionweight[]" value="{{ $value['order_dimensionweight'] }}">
  <input type="hidden" class="form-control" data-error="order_technical_drawingreference" id="order_technical_drawingreference_" name="order_technical_drawingreference[]" value="{{ $value['order_technical_drawingreference'] }}">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="mb-3 input_treatment_title">
        <p>Product: <u><b>{{ strtoupper($value['order_product']) }}</b></u></p>
      </div>
    </div>
  </div>

  <div class="row append-treatment" style="border-bottom: 1px dashed #dcdcdc; border-left: 1px dashed #dcdcdc; border-right: 1px dashed #dcdcdc;">

    <?php
    if(!empty($value['order_treatment'])) {

      $order_treatment = $value['order_treatment'];
      $order_treatment_details = $value['order_treatment_details'];

      if(!empty($value['order_treatment_price'])){
        $order_treatment_price = $value['order_treatment_price'];
      }
      foreach ($order_treatment as $key1 => $value1) { ?>

        <div class="col-md-12 mb-3">

          <div class="mb-3 input_treatment_title">
            <label for="title">Treatment Title: <b>{{ $value1 }}</b> </label>
            <input type="hidden" class="form-control treattitle_i" data-id="" name="order_treatment[product_name][<?php echo $value['order_product']; ?>][]" value="{{ $value1 }}" id="treattitle_" placeholder="Title">
            <textarea style="display: none;" name="order_treatment_details[product_name][<?php echo $value['order_product']; ?>][]" class="form-control treatdetails_">{{$order_treatment_details[$key1] }}</textarea>
          </div>

          <div class="mb-3">
            <label for="title">Treatment price </label>
            <input
            type="number"
            step="any"
            class="form-control treatprice_"
            name="order_treatment_price[product_name][<?php echo $value['order_product']; ?>][]"
            value="<?php echo (!empty($order_treatment_price[$key1]))? $order_treatment_price[$key1]: 0; ?>"
            id="treat_price"
            placeholder="Price"
            required
            />
          </div>


        </div>

        <?php
      }
    } ?>

  </div>
</div>
