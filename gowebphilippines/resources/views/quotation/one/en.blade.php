<!-- en -->
<div id="en">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden" name="filename" value="quote_request_sent_to_supplier" />
    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
    <input type="hidden" name="transaction_type" value="supplier" />
    <textarea cols="80" class="ckeditor" name="editor" id="editor-en" rows="10">
      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>
      <div style="width:100%">
        <div style="width:50%; float:left;">
          <p><b>BEL-TECH</b>NOLOGIES nv/sa<br />
            Rapaartakkerlaan 17-19<br />
            B-9OBO Lochristi Belgium<br />
            Tel. +32 (0)9 355 24 41<br />
            Fax +32 (0)9 355 83 30
          </p>
          <p>Gsm +32 (0)475 24 12 08<br />
            E-mail: info@bel-tec.be<br />
            URL: www.bel-tec.be
          </p>   
        </div>
        <div style="width:50%; float:left;">
          <p style="margin-left: 80px;"><strong>{{strtoupper($supplier[0]->supplier_name)}}</strong></p>
          <p style="margin-left: 80px;">Attn. of {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}<br />
            {{$supplier[0]->supplier_street}}<br />
            {{$supplier[0]->supplier_city}}&nbsp;{{$supplier[0]->supplier_zip}}<br />
            <strong>{{$supplier[0]->supplier_country}}</strong>
          </p>  
        </div>      
      </div>
      <div style="clear:both;"></div>  
      <div style="width:100%">
        <div style="width:50%; float:left;">
          <p>&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}</p>     
        </div>
        <div style="width:50%; float:left;">
          <p style="margin-left: 80px;">{{ date('d/m/Y') }}</p>
        </div>
      </div>    
      <div style="clear:both;"></div>  
      <div>
        <p><u><strong>PRICE INQUIRY: </strong>{{ strtoupper($order[0]->order_subject) }}</u></p>
        <p>We hereby have the pleasure to remit our new price inquiry for:</p>
        <p><strong><u>Product:</u></strong></p>
        @foreach ($newArr as $key => $value)
        <ul>
          @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
          <li>       
            {{ $value['order_amount'] }}
            {{ $value['order_product'] }}
            @if($value['order_technical_drawingreference'] !=='')
            ({{ $value['order_technical_drawingreference'] }})
            @endif              
          </li>            
          @endif           
          @if($value['order_material'] !=='')
          <li>Material: {{ $value['order_material'] }}</li>
          @endif
          @if($value['order_dimensionweight'] !=='')
          <li>Dimensions: &Oslash; {{ $value['order_dimensionweight'] }}</li>
          @endif          
          @if(!empty($value['order_treatment']))
          @php $order_treatment = $value['order_treatment'] @endphp
          @php $order_treatment_details = $value['order_treatment_details'] @endphp
          @php $i = 0 @endphp
          @php $title = [] @endphp
          @foreach ($order_treatment as $key1 => $value1)
          @php $c = $i++ + 1 @endphp
          @php $title[] = $value1 @endphp
          @endforeach
          <li>Treatments: {{ implode(', ',$title) }} </li>
          @endif
        </ul>         
        @endforeach
        <p><strong><u>Treatment:</u></strong></p>
        @foreach ($newArr as $key => $value)
        @if(!empty($value['order_treatment']))
        @php $order_treatment = $value['order_treatment'] @endphp
        @php $order_treatment_details = $value['order_treatment_details'] @endphp
        @php $i = 0 @endphp
        @foreach ($order_treatment as $key1 => $value1)
        @php $c = $i++ + 1 @endphp
        <p><u>{{ $value1 }}</u></p>
        <p>{{ $order_treatment_details[$key1] }}</p>
        @endforeach
        @endif
        @endforeach
        @if($order[0]->order_details)
        <p>{{$order[0]->order_details}}</p>
        @endif
        <p>&nbsp;</p>
        <p>Thanks in advance for your early reply.<br/>
          Kind regards<br/>
          BEL-TECHNOLOGIES NV.<br/>
          Peter van Belle
        </p>
      </div>
    </textarea> <!-- CKEditor  !-->
  </form>
</div>
