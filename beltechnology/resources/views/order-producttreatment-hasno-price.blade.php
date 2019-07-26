<ul> 
  @if($value['order_material'] !=='')
  <li><u>Product: <b>{{ $value['order_product'] }}</b></u>

    <ul>
      @if($value['order_material'] !=='')
      <li>Amount: {{ $value['order_amount'] }}</li>
      @endif

      

      @if($value['order_material'] !=='')
      <li>Material: {{ $value['order_material'] }}</li>
      @endif 

      @if($value['order_dimensionweight'] !=='')  
      <li>Dimensions : &nbsp; {{ $value['order_dimensionweight'] }}</li>
      @endif

      @if($value['order_material'] !=='')
      <li>Technical/Drawing Reference: {{ $value['order_technical_drawingreference'] }}</li>
      @endif
      <li style="list-style: none; ">&nbsp;</li>  

      <?php if(!empty($value['order_treatment'])) :  ?>
        <?php $order_treatment = $value['order_treatment']; ?>
        <?php $order_treatment_details = $value['order_treatment_details']; ?>
       
        <?php $i = 0; ?>
        <?php $title = []; ?>
        <?php foreach ($order_treatment as $key1 => $value1): ?>
          <?php $c = $i++ + 1; ?>    
          <?php $title[] = $value1; ?>
        <?php endforeach; ?>
        <li>Treatments : {{ implode(',',$title) }} </li> 
      <?php endif; ?> 
    </ul>

  </li>
  @endif  
</ul>

