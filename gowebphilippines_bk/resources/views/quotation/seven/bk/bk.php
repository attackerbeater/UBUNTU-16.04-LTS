@extends('layouts.mainpdf')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-lg-12">

      <br/>
      <br/>

      <ul class="nav nav-tabs ul-center" role="tablist">

        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE CLIENT CONFIRMATION</a>
        </li>
        <li class="nav-item">
          <a class="nav-link home_tab" data-toggle="tab" href="#home"  role="tab">SEND EMAIL TO CLIENT</a>
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
              <input type="hidden"  name="filename" value="generate-confirmation-to-client" />
              <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
              <input type="hidden" name="transaction_type" value="client" />

              <textarea cols="80" class="ckeditor" name="editor" id="editor-en" rows="10">
                <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                <p>&nbsp;</p>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ strtoupper($client[0]->company_name) }}</strong></p>

                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Attn Dhr. {{ $client[0]->contact_first_name }} {{ $client[0]->contact_lastname }}</u>
                  <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_street }}
                  <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_zip }}&nbsp; {{ $client[0]->company_city }}
                  <br />
                </p>

                <p>&nbsp;</p>

                <p><span style="font-size:24px;"><strong>ORDER CONFIRMATION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></p>

                <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                    <tr>
                      <th style="width:95px">
                        <p style="text-align: center;">DATE</p>
                      </th>
                      <th style="width:132px">
                        <p style="text-align: center;">VAT-NUMBER</p>
                      </th>
                      <th style="width:113px">
                        <p style="text-align: center;">DOC.NUMBER</p>
                      </th>
                      <th style="width:142px">
                        <p style="text-align: center;">CUSTOMER NUMBER</p>
                      </th>
                      <th style="width:236px">
                        <p style="text-align: center;">PAYMENT CONDITIONS</p>
                      </th>
                    </tr>
                    <tr>
                      <td style="height:35px; width:95px">
                        <p style="text-align: center;">{{ date('d/m/Y') }}</p>
                      </td>
                      <td style="height:35px; width:132px">
                        <p style="text-align: center;">{{ $client[0]->vn }}</p>
                      </td>
                      <td style="height:35px; width:113px">
                        <p style="text-align: center;">{{ substr($order[0]->order_reference_number, 4) }}</p>
                      </td>
                      <td style="height:35px; width:142px">
                        <p style="text-align: center;">{{ $order[0]->order_number_from_client }}</p>
                      </td>
                      <td style="height:35px; width:236px">
                        <p style="text-align: center;">&nbsp; Net. 30 days after invoice date</p>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <p style="text-align: center;">&nbsp;</p>

                <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                  <tbody>
                    <tr class="second-table">
                      <th style="width:85px">
                        <p style="text-align: center;">AMOUNT</p>
                      </th>
                      <th style="width:406px">
                        <p style="text-align: center;">DESCRIPTION</p>
                      </th>
                      <th style="width:114px">
                        <p style="text-align: center;">PRICE PER UNIT</p>
                      </th>
                      <th style="width:114px">
                        <p style="text-align: center;">TOTAL PRICE</p>
                      </th>
                    </tr>
                    <tr>
                      <td style="height:396px; width:85px">
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:396px; width:406px">
                        <p style="margin-left: 40px;">Your order number {{ $client[0]->company_number }}&nbsp;of {{ date('d/m/Y') }} at {{ $client[0]->company_name }}</p>

                        <p style="margin-left: 40px;">We would like to thank you for your order and provide you with the order confirmation. We will provide the delivery according to specifications below and within the agreed delivery period at {{ $supplier[0]->supplier_city }}</p>

                        <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>

                        <div style="margin-left: 40px;">Product description : {{ $order[0]->order_details }}</div>

                        <p style="margin-left: 40px;">&nbsp;</p><p style="margin-left: 40px;">

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Delivery: From factory, conditions in attachment.</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">This order has been carefully determined by us and the information you provide. If you want to report inaccuracies immediately, so this order confirmation may need to be adjusted.</p>

                          <p style="margin-left: 40px;">Thank you for your order and confidence</p>

                          <p style="margin-left: 40px;">Total cost are exlusive transportation costs</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>
                        </td>

                        <td style="height:396px; width:114px">

                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $_order_price)
                          @if($_order_price !=='undefined')
                          <p style="text-align: right;">{{ number_format($_order_price,2) }}&nbsp;&euro;&nbsp; &nbsp;</p>
                          @endif

                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                        <td style="height:396px; width:114px">

                          <?php $_order_amount = explode(',', $order[0]->order_amount); ?>

                          <?php $total = 0; ?>


                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $k=> $_order_price)
                          @if($_order_price !=='undefined')
                          <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                          <?php $total += $pxam; ?>

                          <p style="text-align: right;">{{ number_format($pxam,2) }} &euro;&nbsp; &nbsp; </p>
                          @endif

                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">SUBTOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total)
                          <p style="text-align:right">{{ number_format($total,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">00.0 &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>

                      <?php $percentage = (ucfirst(strtolower($data['company_country'])) =="Belgium")? 21: 0; ?>
                      <?php $total_vat = ($percentage / 100) * $total; ?>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">V.A.T. {{$percentage}}%&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total_vat > 0)
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">TOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total && $total_vat)
                          <p style="text-align:right"><strong>{{ number_format($total + $total_vat, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @else
                          <p style="text-align:right"><strong>{{ number_format($total, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p>&nbsp;</p>

                  <div style="border:3px solid #000;">
                    <p style="text-align: center;"><strong>Please send the signed ORDER CONFIRMATION for agreement via e-mail or fax : 09/3558330</strong></p>
                  </div>

                  <p>&nbsp;</p>

                  <p>&nbsp;</p>

                </textarea>
                <!-- CKEditor  !-->
              </form>
            </div>

            <!-- fr -->
            <div id="fr">
              <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                <input type="hidden"  name="filename" value="generate-confirmation-to-client" />
                <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                <input type="hidden" name="transaction_type" value="client" />

                <textarea cols="80" class="ckeditor" name="editor" id="editor-fr" rows="10">
                  <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                  <p>&nbsp;</p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ strtoupper($client[0]->company_name) }}</strong></p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>À l’Attn de Dhr. {{ $client[0]->contact_first_name }} {{ $client[0]->contact_lastname }}</u>
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_street }}
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_zip }}&nbsp; {{ $client[0]->company_city }}
                    <br />
                  </p>

                  <p>&nbsp;</p>

                  <p><span style="font-size:24px;"><strong>CONFIRMATION DE COMMANDE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></p>

                  <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <th style="width:95px">
                          <p style="text-align: center;">DATE</p>
                        </th>
                        <th style="width:132px">
                          <p style="text-align: center;">NUMERO DE T.V.A</p>
                        </th>
                        <th style="width:113px">
                          <p style="text-align: center;">NUMERO DOC.</p>
                        </th>
                        <th style="width:142px">
                          <p style="text-align: center;">NUMERO DE CLIENT</p>
                        </th>
                        <th style="width:236px">
                          <p style="text-align: center;">CONDITIONS DE PAIEMENT</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:35px; width:95px">
                          <p style="text-align: center;">{{ date('d/m/Y') }}</p>
                        </td>
                        <td style="height:35px; width:132px">
                          <p style="text-align: center;">{{ $client[0]->vn }}</p>
                        </td>
                        <td style="height:35px; width:113px">
                          <p style="text-align: center;">{{ substr($order[0]->order_reference_number, 4) }}</p>
                        </td>
                        <td style="height:35px; width:142px">
                          <p style="text-align: center;">{{ $order[0]->order_number_from_client }}</p>
                        </td>
                        <td style="height:35px; width:236px">
                          <p style="text-align: center;">&nbsp; Net.30 jours après la date facturation</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p style="text-align: center;">&nbsp;</p>

                  <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="second-table">
                        <th style="width:85px">
                          <p style="text-align: center;">QUANTITÉ</p>
                        </th>
                        <th style="width:406px">
                          <p style="text-align: center;">DESCRIPTION</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">PRIX PAR UNITÉ</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">PRIX TOTAL</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:396px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td style="height:396px; width:406px">
                          <p style="margin-left: 40px;">Votre numéro de commande  {{ $client[0]->company_number }}&nbsp;de {{ date('d/m/Y') }} à {{ $client[0]->company_name }}</p>

                          <p style="margin-left: 40px;">Nous aimerions vous remercier pour votre commande et vous fournir la confirmation de commande. Nous fournirons la livraison selon les spécifications ci-dessous et dan les délais convenus à {{ $supplier[0]->supplier_city }}</p>

                          <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>

                          <div style="margin-left: 40px;">Description de produit :  {{ $order[0]->order_details }}</div>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Livraison: De L’usine, conditions en pièce jointe </p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Cette commande a été soigneusement déterminée par nous et les informations que vous fournissez. Si vous souhaitez signaler immédiatement des inexactitudes, on devrez modifier la confirmation de commande. </p>

                          <p style="margin-left: 40px;">Merci pour votre commande et confiance</p>

                          <p style="margin-left: 40px;">Le coût total sont les coûts de transport exclusifs</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>
                        </td>

                        <td style="height:396px; width:114px">

                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $_order_price)
                          @if($_order_price !=='undefined')
                          <p style="text-align: right;">{{ number_format($_order_price,2) }}&nbsp;&euro;&nbsp; &nbsp;</p>
                          @endif

                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                        <td style="height:396px; width:114px">

                          <?php $_order_amount = explode(',', $order[0]->order_amount); ?>

                          <?php $total = 0; ?>


                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $k=> $_order_price)
                          @if($_order_price !=='undefined')
                          <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                          <?php $total += $pxam; ?>

                          <p style="text-align: right;">{{ number_format($pxam,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">SUBTOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total)
                          <p style="text-align:right">{{ number_format($total,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">00.0 &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>

                      <?php $percentage = (ucfirst(strtolower($data['company_country'])) =="Belgium")? 21: 0; ?>
                      <?php $total_vat = ($percentage / 100) * $total; ?>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">T.V.A {{$percentage}}%&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total_vat > 0)
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">TOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total && $total_vat)
                          <p style="text-align:right"><strong>{{ number_format($total + $total_vat, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @else
                          <p style="text-align:right"><strong>{{ number_format($total, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p>&nbsp;</p>

                  <div style="border:3px solid #000;">
                    <p style="text-align: center;"><strong>Veuillez envoyer la confirmation de commande signée pour accord par e-mail ou par fax: 09/3558330</strong></p>
                  </div>

                  <p>&nbsp;</p>

                  <p>&nbsp;</p>

                </textarea>
                <!-- CKEditor  !-->
              </form>
            </div>

            <!-- nl -->
            <div id="nl">
              <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                <input type="hidden"  name="filename" value="generate-confirmation-to-client" />
                <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                <input type="hidden" name="transaction_type" value="client" />

                <textarea cols="80" class="ckeditor" name="editor" id="editor-nl" rows="10">
                  <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                  <p>&nbsp;</p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ strtoupper($client[0]->company_name) }}</strong></p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>T.a.v. Dhr. {{ $client[0]->contact_first_name }} {{ $client[0]->contact_lastname }}</u>
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_street }}
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_zip }}&nbsp; {{ $client[0]->company_city }}
                    <br />
                  </p>

                  <p>&nbsp;</p>

                  <p><span style="font-size:24px;"><strong>ORDERBEVESTIGING&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></p>

                  <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <th style="width:95px">
                          <p style="text-align: center;">DATUM</p>
                        </th>
                        <th style="width:132px">
                          <p style="text-align: center;">BTW-NUMMER</p>
                        </th>
                        <th style="width:113px">
                          <p style="text-align: center;">DOC.NUMMER</p>
                        </th>
                        <th style="width:142px">
                          <p style="text-align: center;">KLANTNUMMER</p>
                        </th>
                        <th style="width:236px">
                          <p style="text-align: center;">BETALINGSVOORWAARDEN</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:35px; width:95px">
                          <p style="text-align: center;">{{ date('d/m/Y') }}</p>
                        </td>
                        <td style="height:35px; width:132px">
                          <p style="text-align: center;">{{ $client[0]->vn }}</p>
                        </td>
                        <td style="height:35px; width:113px">
                          <p style="text-align: center;">{{ substr($order[0]->order_reference_number, 4) }}</p>
                        </td>
                        <td style="height:35px; width:142px">
                          <p style="text-align: center;">{{ $order[0]->order_number_from_client }}</p>
                        </td>
                        <td style="height:35px; width:236px">
                          <p style="text-align: center;">&nbsp; Netto 30 dagen na factuurdatum</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p style="text-align: center;">&nbsp;</p>

                  <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="second-table">
                        <th style="width:85px">
                          <p style="text-align: center;">AANTAL</p>
                        </th>
                        <th style="width:406px">
                          <p style="text-align: center;">BESCHRIJVING</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">PRIJS PER EENHEID</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">TOTAAL PRIJS</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:396px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td style="height:396px; width:406px">
                          <p style="margin-left: 40px;">Uw order nr.{{ $client[0]->company_number }}&nbsp;van {{ date('d/m/Y') }} à {{ $client[0]->company_name }}</p>

                          <p style="margin-left: 40px;">Onder dankzegging voor uw bestelling doen wij u hierbij de orderbevestiging toekomen. Wij zullen de levering volgens onderstaande specificatie en op de afgesproken leverdatum gereed hebben te {{ $supplier[0]->supplier_city }}</p>

                          <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>

                          <div style="margin-left: 40px;">Artikelomschr.:  {{ $order[0]->order_details }}</div>

                          <p style="margin-left: 40px;"><u>Eventueel meerwerk wordt o.b.v. nacalculatie berekend</u></p>

                          <p style="margin-left: 40px;">Prijzen : exclusief B.T.W. en in overeenstemming met gemaakte offerte en/of reeds eerder behandelde onderdelen. </p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Levering : af fabriek, conform bijlage leveringsvoorwaarden. Betaling : binnen 30 dagen netto.</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Deze order is met zorg door ons en de door u verstrekte gegevens vastgesteld. Wilt u eventuele onjuistheden ons direct melden, zodat deze orderbevestiging mogelijk aangepast dient te worden.</p>

                          <p style="margin-left: 40px;">Bedankt voor Uw opdracht.</p>

                          <p style="margin-left: 40px;">Transport H/T ten Uwe laste.</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>
                        </td>

                        <td style="height:396px; width:114px">

                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $_order_price)
                          @if($_order_price !=='undefined')
                          <p style="text-align: right;">{{ number_format($_order_price,2) }}&nbsp;&euro;&nbsp; &nbsp;</p>
                          @endif
                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                        <td style="height:396px; width:114px">

                          <?php $_order_amount = explode(',', $order[0]->order_amount); ?>

                          <?php $total = 0; ?>


                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $k=> $_order_price)
                          @if($_order_price !=='undefined')
                          <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                          <?php $total += $pxam; ?>

                          <p style="text-align: right;">{{ number_format($pxam,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">SUBTOTAAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total)
                          <p style="text-align:right">{{ number_format($total,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">00.0 &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>

                      <?php $percentage = (ucfirst(strtolower($data['company_country'])) =="Belgium")? 21: 0; ?>
                      <?php $total_vat = ($percentage / 100) * $total; ?>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">B.T.W. {{$percentage}}%&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total_vat > 0)
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">TOTAAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total && $total_vat)
                          <p style="text-align:right"><strong>{{ number_format($total + $total_vat, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @else
                          <p style="text-align:right"><strong>{{ number_format($total, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p>&nbsp;</p>

                  <div style="border:3px solid #000;">
                    <p style="text-align: center;"><strong>Gelieve deze ORDERBEVESTIGING voor akkoord  ondertekend te willen teurgsturen via fax : 09/3558330</strong></p>
                  </div>

                  <p>&nbsp;</p>

                  <p>&nbsp;</p>

                </textarea>
                <!-- CKEditor  !-->
              </form>
            </div>

            <!-- de -->
            <div id="de">
              <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
                <input type="hidden"  name="filename" value="generate-confirmation-to-client" />
                <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
                <input type="hidden" name="transaction_type" value="client" />

                <textarea cols="80" class="ckeditor" name="editor" id="editor-de" rows="10">
                  <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                  <p>&nbsp;</p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>{{ strtoupper($client[0]->company_name) }}</strong></p>

                  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <u>Z.hd. Dhr. {{ $client[0]->contact_first_name }} {{ $client[0]->contact_lastname }}</u>
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_street }}
                    <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $client[0]->company_zip }}&nbsp; {{ $client[0]->company_city }}
                    <br />
                  </p>

                  <p>&nbsp;</p>

                  <p><span style="font-size:24px;"><strong>Bestellbestätigung&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></p>

                  <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr>
                        <th style="width:95px">
                          <p style="text-align: center;">DATUM</p>
                        </th>
                        <th style="width:132px">
                          <p style="text-align: center;">MWST-NUMMER</p>
                        </th>
                        <th style="width:113px">
                          <p style="text-align: center;">DOC.NUMMER</p>
                        </th>
                        <th style="width:142px">
                          <p style="text-align: center;">KUNDENNUMMER</p>
                        </th>
                        <th style="width:236px">
                          <p style="text-align: center;">ZAHLUNGSBEDINGUNGEN</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:35px; width:95px">
                          <p style="text-align: center;">{{ date('d/m/Y') }}</p>
                        </td>
                        <td style="height:35px; width:132px">
                          <p style="text-align: center;">{{ $client[0]->vn }}</p>
                        </td>
                        <td style="height:35px; width:113px">
                          <p style="text-align: center;">{{ substr($order[0]->order_reference_number, 4) }}</p>
                        </td>
                        <td style="height:35px; width:142px">
                          <p style="text-align: center;">{{ $order[0]->order_number_from_client }}</p>
                        </td>
                        <td style="height:35px; width:236px">
                          <p style="text-align: center;">&nbsp; Netz. 30 Tage nach Rechnungsdatum</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p style="text-align: center;">&nbsp;</p>

                  <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                      <tr class="second-table">
                        <th style="width:85px">
                          <p style="text-align: center;">MENGE</p>
                        </th>
                        <th style="width:406px">
                          <p style="text-align: center;">BESCHREIBUNG</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">PREIS PRO EINHEIT</p>
                        </th>
                        <th style="width:114px">
                          <p style="text-align: center;">TOTAL PRICE</p>
                        </th>
                      </tr>
                      <tr>
                        <td style="height:396px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td style="height:396px; width:406px">
                          <p style="margin-left: 40px;">Ihre Auftragsnummer {{ $client[0]->company_number }}&nbsp;von {{ date('d/m/Y') }} beim {{ $client[0]->company_name }}</p>

                          <p style="margin-left: 40px;">Wir danken Ihnen für Ihre Bestellung und übermitteln Ihnen die Auftragsbestätigung. Wir werden die Lieferung gemäß den folgenden Spezifikationen und innerhalb der vereinbarten Lieferfrist in {{ $supplier[0]->supplier_city }} liefern.</p>

                          <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>

                          <div style="margin-left: 40px;">Produktbeschreibung: {{ $order[0]->order_details }}</div>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Lieferung: Ab Werk, Bedingungen im Anhang.</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">Diese Bestellung wurde von uns und den von Ihnen angegebenen Informationen sorgfältig festgelegt. Wenn Sie Ungenauigkeiten sofort melden möchten, muss diese Bestellbestätigung möglicherweise angepasst werden.</p>

                          <p style="margin-left: 40px;">Danke für Ihre Bestellung und Ihr Vertrauen</p>

                          <p style="margin-left: 40px;">Gesamtkosten sind exklusive Transportkosten</p>

                          <p style="margin-left: 40px;">&nbsp;</p>

                          <p style="margin-left: 40px;">&nbsp;</p>
                        </td>

                        <td style="height:396px; width:114px">

                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $_order_price)
                          @if($_order_price !=='undefined')
                          <p style="text-align: right;">{{ number_format($_order_price,2) }}&nbsp;&euro;&nbsp; &nbsp;</p>
                          @endif
                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                        <td style="height:396px; width:114px">

                          <?php $_order_amount = explode(',', $order[0]->order_amount); ?>

                          <?php $total = 0; ?>


                          @if($order[0]->order_price)
                          @foreach(explode(',', $order[0]->order_price) as $k=> $_order_price)
                          @if($_order_price !=='undefined')
                          <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                          <?php $total += $pxam; ?>

                          <p style="text-align: right;">{{ number_format($pxam,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                          @endforeach
                          @endif

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>

                          <p style="text-align: center;">&nbsp;</p>
                        </td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">SUBTOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total)
                          <p style="text-align:right">{{ number_format($total,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">00.0 &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>

                      <?php $percentage = (ucfirst(strtolower($data['company_country'])) =="Belgium")? 21: 0; ?>
                      <?php $total_vat = ($percentage / 100) * $total; ?>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">MwSt {{$percentage}}%&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total_vat > 0)
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @else
                          <p style="text-align:right">{{ number_format($total_vat,2) }} &euro;&nbsp; &nbsp;</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                          <p style="margin-left: 40px; text-align: right;">TOTAL&nbsp;&nbsp;</p>
                        </td>
                        <td>
                          @if($total && $total_vat)
                          <p style="text-align:right"><strong>{{ number_format($total + $total_vat, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @else
                          <p style="text-align:right"><strong>{{ number_format($total, 2) }} &euro;&nbsp; &nbsp;</strong></p>
                          @endif
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <p>&nbsp;</p>

                  <div style="border:3px solid #000;">
                    <p style="text-align: center;"><strong>Bitte senden Sie die unterschriebene BESTÄTIGUNG zur Vereinbarung per E-Mail oder Fax: 09/3558330</strong></p>
                  </div>

                  <p>&nbsp;</p>

                  <p>&nbsp;</p>

                </textarea>
                <!-- CKEditor  !-->
              </form>
            </div>

          </div>

          <div class="tab-pane" id="home" role="tabpanel">

            <br/>

            <div class="alert alert-danger form-error-msg" style="display:none;">
              <ul></ul>
            </div>

            <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{ url('/admin/post-generate-client-confirmation') }}" role="form" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
              <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
              <input type="hidden" name="id" value="{{$data['order_id']}}">

              <div class="messages"></div>

              <div class="row">
                <div class="form-group col-sm-12">
                  <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $data['company_name'] }}" placeholder="Name">
                </div>
                <div class="form-group col-sm-12">

                  <?php
                  $emails = array_unique(explode(',',$client[0]->contact_person_email));
                  $emails[] = $data['company_email'];
                  ?>

                  <select class="form-control" name="email" id="type">
                    @foreach(array_reverse($emails, true) as $email)
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

                  <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject" value="" placeholder="Subject">
                </div>
                <div class="form-group col-sm-12">
                  <div id="text">
                    <div>
                      <input type="file" accept="application/pdf" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp"/>
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
                <textarea id="message" class="form-control" rows="5" name="message" placeholder="Enter your message"></textarea>
              </div>

              <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>
              <input type="reset" class="btn btn-danger" value="Clear" />

            </form>

          </div>
        </div>
        <!-- /.8 -->
      </div>
      <!-- /.row-->
    </div>
  </div>
  <!-- /.container-->
  <script>
  CKEDITOR.replace('editor-en',
  {
    height: '1000px',
  });

  CKEDITOR.replace('editor-fr',
  {
    height: '1000px',
  });

  CKEDITOR.replace('editor-nl',
  {
    height: '1000px',
  });

  CKEDITOR.replace('editor-de',
  {
    height: '1000px',
  });
</script>
@endsection
