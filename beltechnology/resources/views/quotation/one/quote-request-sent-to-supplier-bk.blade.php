
@extends('layouts.mainpdf')

@section('content')


<?php 

// echo '<pre>';
// print_r($newArr);
// echo '</pre>';

// die();
?>

<div class="container">

  <div class="row">
    <div class="col-lg-12">
      <br/>
      <br/>

      <ul class="nav nav-tabs ul-center" role="tablist">

        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE QUOTE LETTER FOR SUPPLIER</a>
        </li>
        <li class="nav-item" style="display:none;">
          <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO SUPPLIER</a>
        </li>

      </ul>

      <!-- Tab panes -->
      <div class="tab-content">


        <div class="tab-pane active" id="profile" role="tabpanel">

          <div class="row mt-3">
            <div class="col-md-3 mb-3">
              <div class="form-group">
                <select class="form-control" id="localization">
                  <option value="en">English</option>
                  <option value="fr">French</option>
                  <option value="nl">Dutch</option>
                  <option value="de">German</option>
                </select>
              </div>
            </div>
          </div>

          <!-- en -->
          <div id="en">
            <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

              <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
              <input type="hidden" name="filename" value="request-for-quotation-from-supplier" />
              <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
              <input type="hidden" name="transaction_type" value="supplier" />

              <textarea cols="80" class="ckeditor" name="editor" id="editor-en" rows="10">
                <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>



                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{strtoupper($supplier[0]->supplier_name)}}&nbsp; &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Attn. of {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}</u><br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_street}}, {{$supplier[0]->supplier_number}}<br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_zip}}&nbsp; {{$supplier[0]->supplier_city}}<br/>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_country}}.</p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                  <p>&nbsp;</p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>

                  <p><strong><u>PRICE INQUIRY :</u></strong> {{ strtoupper($order[0]->order_subject) }}</p>

                  <p>&nbsp;</p>

                  <p>We hereby have the pleasure to remit our new price inquiry for:</p>

                  <p><strong><u>Product:</u></strong></p>

                  <?php foreach ($newArr as $key => $value) : ?>

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
                      <li>Dimensions &nbsp; &Oslash; : {{ $value['order_dimensionweight'] }}</li>
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
                        <li>Treatments : {{ implode(',',$title) }} </li><?php
                      endif;
                      ?>

                    </ul>

                  <?php endforeach; ?>

                  <p><strong><u>Treatment:</u></strong></p>

                  <?php foreach ($newArr as $key => $value) : ?>
                    <?php
                    if(!empty($value['order_treatment'])) :

                      $order_treatment = $value['order_treatment'];
                      $order_treatment_details = $value['order_treatment_details'];

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

                  <p>Thanks in advance for your early reply.
                    Kind regards<br/>

                    BEL-TECHNOLOGIES NV.<br/>

                    Peter van Belle</p>

                  </textarea> <!-- CKEditor  !-->
                </form>
              </div>

              <!-- fr -->
              <div id="fr">
                <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                  <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                  <input type="hidden" name="filename" value="request-for-quotation-from-supplier" />
                  <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                  <input type="hidden" name="transaction_type" value="supplier" />

                  <textarea cols="80" class="ckeditor" name="editor" id="editor-fr" rows="10">


                    <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>


                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{strtoupper($supplier[0]->supplier_name)}}&nbsp; &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>A l&#39;attn. de {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}</u><br/>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_street}}, {{$supplier[0]->supplier_number}}<br/>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_zip}}&nbsp;  {{$supplier[0]->supplier_city}}<br/>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_country}}</p>

                    <p>&nbsp;</p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>

                    <p><strong><u>DEMANDE DE PRIX :</u></strong> {{ strtoupper($order[0]->order_subject) }}</p>

                    <p>&nbsp;</p>

                    <p>Nous vous prions de bien vouloir nous faire votre meilleure offre de prix et d&eacute;lai pour la fourniture compl&egrave;te des pi&egrave;ces suivant donn&eacute;es ci-dessous :</p>

                    <p><strong><u>Produit:</u></strong></p>

                    <?php foreach ($newArr as $key => $value) : ?>
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
                        <li>Materiel: {{ $value['order_material'] }}</li>
                        @endif

                        @if($value['order_dimensionweight'] !=='')
                        <li>Dimensions &nbsp; &Oslash; : {{ $value['order_dimensionweight'] }}</li>
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
                          <li>Traitements : {{ implode(',',$title) }} </li><?php
                        endif;
                        ?>


                      </ul>

                    <?php endforeach; ?>

                    <p><strong><u>Traitement:</u></strong></p>

                    <?php foreach ($newArr as $key => $value) : ?>
                      <?php
                      if(!empty($value['order_treatment'])) :

                        $order_treatment = $value['order_treatment'];
                        $order_treatment_details = $value['order_treatment_details'];

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
                    <!-- end details -->

                    <p>Nous vous prions de bien vouloir nous faire parvenir votre offre dans le plus bref d&eacute;lai.</p>

                    <p>En attendant votre offre nous vous remercions d&#39;avance pour votre diligence.</p>


                    <p>Meilleures salutations.<br/>

                      <strong>BEL-TECHNOLOGIES SA.</strong><br/>

                      P. van Belle</p>
                    </style>
                  </textarea> <!-- CKEditor  !-->
                </form>
              </div>

              <!-- nl -->
              <div id="nl">
                <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                  <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                  <input type="hidden" name="filename" value="request-for-quotation-from-supplier" />
                  <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                  <input type="hidden" name="transaction_type" value="supplier" />
                  <textarea cols="80" class="ckeditor" name="editor" id="editor-nl" rows="10">

                    <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{strtoupper($supplier[0]->supplier_name)}}&nbsp; &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>T.a.v.&nbsp; {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}</u><br />

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_street}}, {{$supplier[0]->supplier_number}}<br/>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_zip}}&nbsp;  {{$supplier[0]->supplier_city}}<br/>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_country}}.</p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                    <p>&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>

                    <p><strong><u>PRIJSAANVRAAG :</u></strong> {{ strtoupper($order[0]->order_subject) }}</p>

                    <p>&nbsp;</p>

                    <p>Graag bekomen wij uw beste aanbieding voor prijs en levertermijn voor: </p>

                    <p><strong><u>Product:</u></strong></p>

                    <?php foreach ($newArr as $key => $value) : ?>
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
                        <li>Materiaal: {{ $value['order_material'] }}</li>
                        @endif

                        @if($value['order_dimensionweight'] !=='')
                        <li>Afmetingen &nbsp; &Oslash; : {{ $value['order_dimensionweight'] }}</li>
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
                          <li>Behandelings : {{ implode(',',$title) }} </li><?php
                        endif;
                        ?>

                      </ul>

                    <?php endforeach; ?>

                    <p><strong><u>Behandeling:</u></strong></p>

                    <?php foreach ($newArr as $key => $value) : ?>
                      <?php
                      if(!empty($value['order_treatment'])) :

                        $order_treatment = $value['order_treatment'];
                        $order_treatment_details = $value['order_treatment_details'];

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


                    <p>Mogen wij uw offerte voor deze werken dringend tegemoet zien,&nbsp; tesamen met uw levertermijn.</p>


                    <p>In afwachting van uw snelle reactie verblijven wij,</p>

                    <p>Met vriendelijke groeten.<br/>

                      BEL-TECHNOLOGIES NV.<br/>
                      Peter van Belle</p>

                    </textarea> <!-- CKEditor  !-->
                  </form>
                </div>

                <!-- de -->
                <div id="de">
                  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                    <input type="hidden" name="filename" value="request-for-quotation-from-supplier" />
                    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                    <input type="hidden" name="transaction_type" value="supplier" />

                    <textarea cols="80" class="ckeditor" name="editor" id="editor-de" rows="10">

                      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>




                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{strtoupper($supplier[0]->supplier_name)}}&nbsp; &nbsp;</strong> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Z.hd. von herrn&nbsp; {{$supplier[0]->contact_first_name}} {{$supplier[0]->contact_lastname}}</u><br/>

                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_street}}, {{$supplier[0]->supplier_number}}<br/>

                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_zip}}&nbsp;  {{$supplier[0]->supplier_city}}<br/>

                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$supplier[0]->supplier_country}}.</p>

                      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>

                      <p>&nbsp;</p>

                      <p>&nbsp;&nbsp;&nbsp;&nbsp; {{ $order[0]->order_reference_number }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ date('d/m/Y') }}</p>

                      <p>&nbsp;</p>

                      <p><strong><u>PREISANFRAGE :</u></strong> {{ strtoupper($order[0]->order_subject) }}</p>

                      <p>&nbsp;</p>

                      <p>Wir bitten Ihnen h&ouml;flichst anbei unsere Preisanfrage zu finden f&uuml;r das Neu Beschichten von :</p>

                      <p>&nbsp;</p>

                      <p><strong><u>Produkt:</u></strong></p>

                      <p>&nbsp;</p>


                      <!-- products -->



                      <?php foreach ($newArr as $key => $value) : ?>
                        <ul>
                          @if($value['order_amount'] !=='' || $value['order_product'] !=='' || $value['order_technical_drawingreference'] !=='')

                          <strong>
                            <li>{{ $value['order_amount'] }} <?php echo ($value['order_product'] !=='')? 'st&uuml;ck  &quot; ' .$value['order_product']. '&ldquo; &nbsp;':''; ?>
                            </strong>
                            <!-- @if(!empty($value['order_technical_drawingreference'] )) -->

                            ({{ $value['order_technical_drawingreference'] }})

                            <!-- @endif   -->

                          </li>
                          @endif

                        </ul>

                        @if($value['order_material'] !=='' || $value['order_dimensionweight'] !=='')

                        <p style="margin-left:53.25pt;">Materiel: {{ $value['order_material'] }}<br/>

                          Ma&szlig;e :&nbsp; &Oslash; {{ $value['order_dimensionweight'] }}<br/>

                          Fertig Schleifen laut angaben der Zeichnung, und Ra &nbsp;0,4<br/>

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
                            Behandelings : {{ implode(',',$title) }} <br/>  <?php
                          endif;
                          ?>


                        <?php endforeach; ?>

                        <!-- /end 1-->

                        <!-- / products -->

                        <p style="margin-left:53.25pt;">&nbsp;</p>

                        <p><strong><u>Behandelung:</u></strong></p>

                        <?php foreach ($newArr as $key => $value) : ?>
                          <?php
                          if(!empty($value['order_treatment'])) :

                            $order_treatment = $value['order_treatment'];
                            $order_treatment_details = $value['order_treatment_details'];

                            $i = 0;
                            foreach ($order_treatment as $key1 => $value1):
                              $c = $i++ + 1;

                              echo '<p><u>'.$value1.'</u></p>';
                              echo '<p>'.$order_treatment_details[$key1].'</p>';

                            endforeach;
                          endif;

                        endforeach;?>

                        <p>&nbsp;</p>

                        <p>F&uuml;r Ihre <strong>Zeitnahe</strong> Antwort per Email im voraus Herzlichen dank.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;</p>


                        <p>Mit Freundlichen gr&uuml;&szlig;en<br/>

                          <strong>BEL-TEC</strong>HNOLOGIES NV.<br/>

                          Peter van Belle</p>

                        </textarea> <!-- CKEditor  !-->
                      </form>
                    </div>




                  </div>

                  <div class="tab-pane" id="home" role="tabpanel">


                    <br/>


                    <div class="alert alert-danger form-error-msg" style="display:none;">
                      <ul></ul>
                    </div>

                    <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{url('/admin/post-generate-quotation-request-form')}}" role="form" enctype="multipart/form-data">
                      {{ csrf_field() }}

                      <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                      <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />

                      <input type="hidden" name="row_num" value="{{$data['row_num']}}">
                      <input type="hidden" name="column_num" value="{{$data['column_num']}}">
                      <input type="hidden" name="id" value="{{$data['order_id']}}">
                      <div class="messages"></div>

                      <div class="row">
                        <div class="form-group col-sm-12">
                          <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name"  value="{{ $data['supplier_name'] }}" placeholder="Name" >
                        </div>
                        <div class="form-group col-sm-12">
                          <?php
                          $emails = explode(',',$supplier[0]->contact_person_email);
                          $emails[] = $data['supplier_email'];
                          ?>
                          <select name="email" class="form-control" id="type">
                            @foreach(array_reverse($emails,true) as $email)
                            @if($email)
                            <option value="{{ $email }}">{{ $email }}</option>
                            @endif
                            @endforeach
                            <option class="add_new_email" name="new_email" value="new_email">-- add new email --</option>
                          </select>
                        </div>
                        <div class="form-group col-sm-12" id="row_dim">
                          <input type="text" placeholder="Email" class="form-control" id="custom_email" name="email"  value="" placeholder="Custom Email" >
                        </div>
                        <div class="form-group col-sm-12">
                          <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject"  value="" placeholder="Subject" >
                        </div>
                        <div class="form-group col-sm-12">
                          <div id="text">
                            <div>
                              <input type="file" accept="application/pdf" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp" />
                            </div>

                          </div>

                        </div>
                        <div class="form-group col-sm-12">
                          <input type="button" id="add-file-field" name="add" value="Add input field" />
                        </div>

                        <script type="text/javascript">
                        // This will add new input field
                        $("#add-file-field").click(function(){
                          $("#text").append("<div class='added-field'><input name='attachment[]' type='file' accept='application/pdf'/><input type='button' class='remove-btn' value='Remove Field' /></div>");
                        });

                        // The live function binds elements which are added to the DOM at later time
                        // So the newly added field can be removed too
                        $("#text").on('click', '.remove-btn',function() {
                          $(this).parent().remove();
                        });

                        </script>
                      </div>

                      <div class="form-group">
                        <textarea id="message" class="form-control ckeditor" rows="5" name="message" placeholder="Enter your message" ></textarea>
                      </div>

                      <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>
                      <input type="reset" class="btn btn-danger" value="Clear" />

                    </form>

                  </div>
                </div>
              </div><!-- /.8 -->
            </div> <!-- /.row-->
          </div>
          <!-- /.container-->
          @endsection
