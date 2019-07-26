<!-- de -->
<div id="de">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden"  name="filename" value="send_confirmation_to_supplier" />
    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
    <input type="hidden" name="transaction_type" value="supplier" />
    <textarea cols="80" class="ckeditor" name="editor" id="editor-de" rows="10">
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
          <p style="margin-left: 80px;">Z.hd. von {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}<br />
            {{$supplier[0]->supplier_street}}<br />
            {{$supplier[0]->supplier_city}}&nbsp;{{$supplier[0]->supplier_zip}}<br />
            <strong>{{$supplier[0]->supplier_country}}</strong>
          </p>
        </div>
      </div>     
      <div style="clear:both;"></div>        
      @if($supplier[0]->supplier_exclusivity_status == 1)        
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>
        <p><u><strong>AUFTRAGSBESTÄTIGUNG: {{ strtoupper($order[0]->order_subject) }}</strong></u></p>
        <p>Wir bestätigen Ihnen hiermit unseren Auftrag für {{ strtoupper($order[0]->order_subject) }}</p>
        <p><strong><u>Produkt:</u></strong></p>
        <!-- start -->
        <?php 
        $data = [];
        ?>
        <?php $count =0; foreach ($newArr as $key => $value) : $i= $count++; ?> 
          <ul>
            @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
            <!-- a -->
            @php 
              $data[$i]['no_of_packages'] = $value['order_amount'];
            @endphp
            <!-- / -->
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
            <!-- b -->
            @php 
              $data[$i]['weight'] = $value['order_dimensionweight'];
            @endphp
            <!-- / -->
            <li>Masse : &Oslash; {{ $value['order_dimensionweight'] }}</li>
            @endif
            <?php
            if(!empty($value['order_treatment'])) :
              $order_treatment = $value['order_treatment'];
              $order_treatment_details = $value['order_treatment_details'];
              $i = 0;
              $title = [];
              foreach ($order_treatment as $key1 => $value1):
                $c = $i++ + 1;
                $title[] = $value1;
              endforeach;?>
              <li>Behandlung : {{ implode(',',$title) }} </li><?php
            endif;
            ?>               
          </ul>         
        <?php endforeach; ?>    
        <!-- c -->
        @php 

        $multiply_dimension_weight = [];
        $no_of_packages = [];
        foreach ($data as $a => $b) {
          foreach(explode('x', $b['no_of_packages']) as $c => $d ){
            $no_of_packages[] = $d;
          }
          foreach(explode('x', $b['weight']) as $c => $d ){
            $multiply_dimension_weight[] = $d;
          }
            
        }

        $output['no_of_packages'] = array_sum($no_of_packages);
        $output['weight'] = ceil(array_product($multiply_dimension_weight) / 166);

        @endphp
          
        <p>Anzahl Kollis: {{ $output['no_of_packages'] }}<br/>
        KistenMasse: <br/>
        Gewicht: {{ $output['weight'] }} lbs. <br/>
        Warenwert EUR: <br/>
        Ursprungsland:  {{$supplier[0]->supplier_country}} <br/>
        Waren-Tarifnummer:  <br/>
        Lieferbedingungen:     </p>
        <!-- / -->  
  
        <p>Mit Freundlichen grüßen.<br/><strong>Bel-Technologies nv.</strong><br/>Peter van Belle</p>
      @else
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>
        <p><u><strong>ORDER BEVESTIGING: {{ strtoupper($order[0]->order_subject) }}</strong></u></p>
        <p>Graag bevestigen wij u onze order van de werkstukken zoals navolgend beschreven.</p>
        <p><strong><u>Product:</u></strong></p>
        <!-- start -->
        <?php 
        $data = [];
        ?>
        <?php $count =0; foreach ($newArr as $key => $value) : $i= $count++; ?> 
          <ul>
            @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')
            <!-- a -->
            @php 
              $data[$i]['no_of_packages'] = $value['order_amount'];
            @endphp
            <!-- / -->
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
            <!-- b -->
            @php 
              $data[$i]['weight'] = $value['order_dimensionweight'];
            @endphp
            <!-- / -->
            <li>Masse : &Oslash; {{ $value['order_dimensionweight'] }}</li>
            @endif
            <?php
            if(!empty($value['order_treatment'])) :
              $order_treatment = $value['order_treatment'];
              $order_treatment_details = $value['order_treatment_details'];
              $i = 0;
              $title = [];
              foreach ($order_treatment as $key1 => $value1):
                $c = $i++ + 1;
                $title[] = $value1;
              endforeach;?>
              <li>Behandlung : {{ implode(',',$title) }} </li><?php
            endif;
            ?>               
          </ul>         
        <?php endforeach; ?>    
        <!-- c -->
        @php 

        $multiply_dimension_weight = [];
        $no_of_packages = [];
        foreach ($data as $a => $b) {
          foreach(explode('x', $b['no_of_packages']) as $c => $d ){
            $no_of_packages[] = $d;
          }
          foreach(explode('x', $b['weight']) as $c => $d ){
            $multiply_dimension_weight[] = $d;
          }
            
        }

        $output['no_of_packages'] = array_sum($no_of_packages);
        $output['weight'] = ceil(array_product($multiply_dimension_weight) / 166);

        @endphp
          
        <p>Anzahl Kollis: {{ $output['no_of_packages'] }}<br/>
        KistenMasse: <br/>
        Gewicht: {{ $output['weight'] }} lbs. <br/>
        Warenwert EUR: <br/>
        Ursprungsland:  {{$supplier[0]->supplier_country}} <br/>
        Waren-Tarifnummer:  <br/>
        Lieferbedingungen:     </p>
        <!-- / -->  

        <p>Mit Freundlichen grüßen.<br/><strong>Bel-Technologies nv.</strong><br/>Peter van Belle</p>
      @endif
    </textarea>
  </form>
</div>
