@if(array_key_exists('order_treatment', $value) && !empty($value['order_treatment']) )
@php $value['order_treatment'] @endphp
@endif

@if(array_key_exists('order_treatment_details', $value) && !empty($value['order_treatment_details']) )
@php $value['order_treatment_details'] @endphp
@endif

@if(array_key_exists('order_treatment_price', $value) && !empty($value['order_treatment_price']) )
@php $value['order_treatment_price']; @endphp
@endif
<ul>
  
  @if($value['order_product'] !=='')
  <li><u>Product: <b>{{ $value['order_product'] }}</b></u>
    <ul>
      @if($value['order_amount'] !=='')
      <li>Amount: {{ $value['order_amount'] }}</li>
      @endif
      
      @if($value['order_material'] !=='')
      <li>Material: {{ $value['order_material'] }}</li>
      @endif
      
      @if($value['order_dimensionweight'] !=='')
      <li>Dimensions:  &nbsp;{{ $value['order_dimensionweight'] }}</li>
      @endif
      
      @if($value['order_technical_drawingreference'] !=='')
      <li>Technical/Drawing Reference: {{ $value['order_technical_drawingreference'] }}</li>
      @endif
      
      @if(array_key_exists('order_treatment', $value) && !empty($value['order_treatment']))
      @for ($i=0; $i < count($value['order_treatment']); $i++)
      @php $order_treatment = $value['order_treatment'][$i] @endphp
      @if(array_key_exists('order_treatment_price', $value))
      @php $order_treatment_price = $value['order_treatment_price'][$i]? $value['order_treatment_price'][$i]: 0; @endphp
      @php $price = str_replace('.', ',', number_format($order_treatment_price, 2))
      @endphp
      @else
      @php $price = 0 @endphp
      @endif
      <li>{{$order_treatment}} : 
        <ul>
          <li>{{$value['order_product']}}: {{$price}} &euro;</li>
        </ul>
      </li>
      @endfor
      @endif
    </ul>
    
  </li>
  @endif
  
</ul>
