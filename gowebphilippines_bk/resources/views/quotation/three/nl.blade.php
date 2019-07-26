<div id="nl">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <?php $now = date('Y-m-d h:i:s'); ?>
    <input type="hidden"  name="filename" value="quote_sent_to_client" />
    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
    <input type="hidden" name="transaction_type" value="client" />
    <textarea cols="80" class="ckeditor" name="editor" id="editor-nl" rows="10">
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
          <p style="margin-left: 80px;"><strong>{{strtoupper($client[0]->company_name)}}</strong></p>
          <p style="margin-left: 80px;">T.a.v. {{$client[0]->contact_first_name}} {{$client[0]->contact_lastname}}<br />
            {{$client[0]->company_street}}<br />
            {{$client[0]->company_city}}&nbsp;{{$client[0]->company_zip}}<br />
            <strong>{{$client[0]->company_country}}</strong>
          </p>
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
        <p><strong><u>OFFERTE: {{ strtoupper($order[0]->order_subject) }}</u></strong></p>
        <p>Wij danken U voor Uwprijsaanvraag van {{ date('d/m/Y') }} en hebben het genoegen U hierbij onze offerte toe te sturen:</p>
        <p>Op werkstukken door u aan te leveren, onder voorbehoud van controle, werkstukken klaar voor behandeling, en voorzien van een voor u ideale oppervlaktegesteldheid, vrij van vervuiling, beschadigingen en oliën.</p>
        <p><strong><u>Product:</u></strong></p>
        <?php foreach ($newArr as $key => $value) : ?>
          <ul>
            @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
            <li>
              {{ $value['order_amount'] }}
              {{ $value['order_product'] }}
              {{ $value['order_technical_drawingreference'] }}
            </li>
            @endif
            @if($value['order_material'] !=='')
            <li>Materiaal: {{ $value['order_material'] }}</li>
            @endif
            @if($value['order_dimensionweight'])
            <li>Afmetingen : &Oslash; {{ $value['order_dimensionweight'] }}</li>
            @endif
            <?php
            if(!empty($value['order_treatment'])){
              $order_treatment = $value['order_treatment'];
              $i = 0;
              $title = [];
              foreach ($order_treatment as $key1 => $value1):
                $c = $i++ + 1;
                $title[] = $value1;
              endforeach;?>
              <li>Behandeling : {{ implode(',',$title) }} </li><?php
            }else{
              $order_treatment = '';
            }
            if(!empty($value['order_treatment_details'])){
              $order_treatment_details = $value['order_treatment_details'];
            }
            if(!empty($value['order_treatment_details'])){
              $order_treatment_price = (!empty($value['order_treatment_price']))? $value['order_treatment_price']: '00.0';
            }else{
              $order_treatment_price = '';
            }
            if(array_key_exists('order_treatment', $value) && !empty($value['order_treatment'])){
              for ($i=0; $i < count($value['order_treatment']); $i++) {
                $order_treatment = $value['order_treatment'][$i];
                if(array_key_exists('order_treatment_price', $value)){
                  $order_treatment_price = $value['order_treatment_price'][$i]? $value['order_treatment_price'][$i]: 0;
                  $price = str_replace('.', ',', number_format($order_treatment_price, 2));
                }else{
                  $price = 0;
                }
                echo '<li>'.$order_treatment.': ' .$price. ' &euro; </li>';
              }
            }
            ?>
          </ul>
        <?php endforeach; ?>
        <p><strong><u>Behandeling:</u></strong></p>
        <?php foreach ($newArr as $key => $value) : ?>
          <?php
          if(!empty($value['order_treatment'])) :
            $order_treatment = $value['order_treatment'];
            $order_treatment_details = $value['order_treatment_details'];
            $order_treatment_price = (!empty($value['order_treatment_price']))? $value['order_treatment_price']: '00.0';
            $i = 0;
            foreach ($order_treatment as $key1 => $value1):
              $c = $i++ + 1;
              echo '<p><u>'.$value1.'</u></p>';
              echo '<p>'.$order_treatment_details[$key1].'</p>';
            endforeach;
          endif;
        endforeach;?>
        @if($order[0]->order_details)
        <u>Technische details:</u>
        <p>{{$order[0]->order_details}}</p>
        @endif
        
        @if($order[0]->delivery_time)
        <p><u>Levertijd:</u> : {{$order[0]->delivery_time}}<br/>             
          @else
          <p><u>Levertijd:</u> :<br/>        
            @endif            
            <u>Betalingscondities</u> : Netto,  30 dagen na factuurdatum.<br/>
            <u>Algemene voorwaarden</u> : enkele onze algemene voorwaarden zijn van toepassing, bij order aanvaard de klant.<br/>
            <u>Transport</u>: {{$order[0]->transport}}<br/>
            Onze prijzen zijn Netto, exclusief BTW, verpakking en transport.
          </p>
          
          <p>Wij vertrouwen erin u hiermede van dienst te zijn geweest en houden ons voor uw gewaardeerde opdracht beleefd aanbevolen.</p>
          
          Met vriendelijke groeten.<br/>
          <strong>BEL-TEC</strong>HNOLOGIES SA.<br/>
          Peter van Belle</p>
        </textarea> <!-- CKEditor  !-->
      </form>
    </div>
