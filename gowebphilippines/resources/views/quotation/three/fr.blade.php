<div id="fr">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <?php $now = date('Y-m-d h:i:s'); ?>
    <input type="hidden"  name="filename" value="quote_sent_to_client" />
    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
    <input type="hidden" name="transaction_type" value="client" />
    <textarea cols="80" class="ckeditor" name="editor" id="editor-fr" rows="10">
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
          <p style="margin-left: 80px;">A l’attn. de {{$client[0]->contact_first_name}} {{$client[0]->contact_lastname}}<br />
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
        <p><strong><u>OFFRE DE PRIX: {{ strtoupper($order[0]->order_subject) }}</u></strong></p>
        <p>Faisant suite à votre demande de prix  par mail du {{ date('d/m/Y') }} nous pouvons vous offrir ce qui suit.</p>
        <p>Sur pièces de votre fourniture,  sous réserves de contrôle,  pièces prêtes aux traitements, déjà pourvus d'un état de surface pour vous idéal,  sans traces de corrosion ou pollution.</p>
        <p><strong><u>Produit:</u></strong></p>
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
            <li>Matériel: {{ $value['order_material'] }}</li>
            @endif
            @if($value['order_dimensionweight'])
            <li>Dimensions : &Oslash; {{ $value['order_dimensionweight'] }}</li>
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
              <li>Traitements : {{ implode(',',$title) }} </li><?php
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
        <p><strong><u>Traitement:</u></strong></p>
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
        <p>{{$order[0]->order_details}}</p>
        @endif
        <p>&nbsp;</p>
        @if($order[0]->delivery_time)
        <p><u>Délai de livraison</u> : {{$order[0]->delivery_time}}<br/>
          <u> Conditions de paiement</u> : net à 30 jours <br/>
          <u> Conditions générales</u>  :  seuls nos conditions sont d’application, par une commande le client accepte.
          @else
          <p><u>Delivery</u> : <br/>
            @endif
            <!-- <u>Conditions</u> : 30 days after invoice<br/> -->
            <!-- <u>General conditions :</u>&nbsp; only our general conditions apply, by an order the customers agrees.<br/> -->
            <p><u>Transport</u>: {{$order[0]->transport}}</p>
            <p>Nos prix sont unitaires hors taxes, transports et emballages en sus, valables 2 mois et pour la quantités des pièces sus mentionnées.
              En attendant une suite favorable,  et toujours à votre disposition.
            </p>
            <p>Meilleures salutations.<br/>
              <strong>BEL-TEC</strong>HNOLOGIES SA.<br/>
              Peter van Belle</p>
            </textarea> <!-- CKEditor  !-->
          </form>
        </div>
