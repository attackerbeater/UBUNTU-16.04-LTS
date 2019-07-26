<!-- en -->
<div id="en">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden"  name="filename" value="send-confirmation-to-supplier" />
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
            {{$supplier[0]->supplier_number}}, {{$supplier[0]->supplier_street}}<br />
            {{$supplier[0]->supplier_city}}&nbsp;{{$supplier[0]->supplier_zip}}<br />
            <strong>{{$supplier[0]->supplier_country}}</strong>
          </p>
        </div>   
      </div>     
      <div style="clear:both;"></div>        
      @if($supplier[0]->supplier_exclusivity_status == 1)        
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>
        <p><u><strong>ORDER CONFIRMATION :</strong> {{ strtoupper($order[0]->order_subject) }}</u></p>
        <p>We would like to confirm our order for the treatment of the workpieces as described below</p>
        <p>The <strong>{{ $order[0]->order_subject }}</strong> &nbsp;and finishing  :</p>
        @foreach ($newArr as $key => $value)
          <ul>
            @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
            <li>
              {{ $value['order_amount'] }}
              {{ $value['order_product'] }}
              {{ $value['order_technical_drawingreference'] }}
            </li>
            @endif
            
            @if($value['order_material'] !=='')
            <li>Material: {{ $value['order_material'] }}</li>
            @endif
            
            @if($value['order_dimensionweight'])
            <li>Dimensions: {{ $value['order_dimensionweight'] }}</li>
            @endif
          </ul>
          @if(!empty($value['order_treatment']))
            <?php $order_treatment = $value['order_treatment']; ?>
            <?php $order_treatment_details = $value['order_treatment_details']; ?>
            <?php $order_treatment_price = $value['order_treatment_price']; ?>
            <?php $i = 0; ?>
            @foreach ($order_treatment as $key1 => $value1)
            <?php $c = $i++ + 1; ?>
            <?php //echo '<p style="margin-left: 40px;">Price: '.$order_treatment_price[$key1].'&euro;/piece.  Your order number:  '.$order[0]->order_number_from_supplier.'</p>'; ?>
            @endforeach
          @endif
        @endforeach
        <p><strong>We thank you for the fast delivery with {{ $order[0]->transport }} to </strong>:</p>
        <p style="margin-left:40px"><strong>{{ $client[0]->company_name }}</strong>
        <br />
        <strong>{{ $client[0]->company_street }}</strong><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ref. nr. {{ $order[0]->order_number_from_client }}</strong>
        <br />
        <strong>{{ $client[0]->company_zip }}&nbsp; </strong>&nbsp;<strong>{{ $client[0]->company_city }}</strong></p>
        <p>Kind Regards.<br/><strong>Bel-Technologies nv.</strong><br/>Peter van Belle</p>
      @else
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{{ $supplier[0]->supplier_name }}</strong></p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Attn. {{ ucfirst($supplier[0]->contact_first_name) }} {{ $supplier[0]->contact_lastname }}</u>
        <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_street }}, {{ $supplier[0]->supplier_number }}
        <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_zip }},{{ $supplier[0]->supplier_city }}
        <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $supplier[0]->supplier_country }}</p>
        <p>&nbsp;</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>
        <p><strong><u>ORDER CONFIRMATION&nbsp; :</u></strong>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p>Dear {{ $supplier[0]->contact_first_name }},</p>
        <p><u>Concern :</u>&nbsp;&nbsp; <strong>BEL-TEC</strong>HNOLOGIES nv/sa Lochristi Belgi&euml;.</p>
        <p>We would like to confirm our order for  <strong>{{ $order[0]->order_subject }}</strong>&nbsp;of the workpieces as described below.</p>
        <p>&nbsp;</p>
        <p>The <strong>{{ $order[0]->order_subject }}</strong> &nbsp;and finishing  :</p>
        @foreach ($newArr as $key => $value)
          <ul>
          @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
          <li>
            {{ $value['order_amount'] }}
            {{ $value['order_product'] }}
            {{ $value['order_technical_drawingreference'] }}
          </li>
          @endif
          @if($value['order_material'] !=='')
          <li>Material: {{ $value['order_material'] }}</li>
          @endif
          @if($value['order_dimensionweight'])
          <li>Dimensions: {{ $value['order_dimensionweight'] }}</li>
          @endif
          </ul>
          @if(!empty($value['order_treatment']))
            <?php $order_treatment = $value['order_treatment'];  ?>
            <?php $order_treatment_details = $value['order_treatment_details'];  ?>
            <?php $order_treatment_price = $value['order_treatment_price'];  ?>
            <?php $i = 0;  ?>
            @foreach ($order_treatment as $key1 => $value1)
              <?php $c = $i++ + 1; ?>
              <?php //echo '<p style="margin-left: 40px;">Price: '.$order_treatment_price[$key1].'&euro;/pièce         Votre numéro de commande:  '.$order[0]->order_number_from_supplier.'</p>';  ?>
            @endforeach
          @endif
        @endforeach
        <p><strong>We thank you for the fast delivery with {{ $order[0]->transport }} to </strong>:</p>
        <p style="margin-left:40px"><strong>BEL</strong><strong>-</strong>TECHNOLOGIES nv/sa
        <br /> Rapaartakkerlaan 17-19<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ref. nr. {{ $order[0]->order_reference_number }}</strong>
        <br /> B-9080 Lochristi I Belgium</p>
        <p>Kind Regards.
          <br/><strong>Bel-Technologies nv.</strong>
          <br/>Peter van Belle</p>
      @endif
    </textarea>
  </form>
</div>
