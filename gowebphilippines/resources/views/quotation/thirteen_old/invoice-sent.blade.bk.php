@extends('layouts.mainpdf')

@section('content')

<div class="container">


    <div class="row">

        <div class="col-lg-12">



            <br/>
            <br/>

            <ul class="nav nav-tabs ul-center" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE INVOICE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO CLIENT</a>
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

                      <input type="hidden" name="order_id" value="{{$orders['id']}}" />
                      <input type="hidden" name="filename" value="invoice-paid" />
                      <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
                      <input type="hidden" name="transaction_type" value="client" />


                      <textarea cols="80" class="ckeditor en" name="editor" id="editor-en" rows="10">
                          <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                          <p>&nbsp;</p>

                          <p style="margin-left:3.75in;"><strong><span style="font-family:tahoma,sans-serif;">{{strtoupper($orders['company_name'])}}</span></strong></p>
                          <p style="margin-left:3.75in;"><u><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Attn. of</span></span></u>&nbsp;&nbsp;<u><span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Accounting Dept.</span></span></u><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_street']}},{{$orders['company_number']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_zip']}},{{$orders['company_city']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_country']}}</span></span></strong></p>

                          <p style="margin-left:3.75in;">&nbsp;</p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:16.0pt;">INVOICE</span></span></strong><span style="color:white;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">E</span></span></span></p>

                          <p>&nbsp;</p>

                          <table border="1" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td style="width:96px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DATE</span></span></strong></p>
                                </td>
                                <td style="width:132px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">CUSTOMER V.A.T.- NUMBER</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:18px;">
                                <p style="margin-left:20.0pt;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">INVOICE NUMBER</span></span></strong></p>
                                </td>
                                <td style="width:141px;height:18px;">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">CUSTOMER NUMBER&nbsp;</span></span></strong></p>
                                </td>
                                <td style="width:237px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">PAYMENT CONDITIONS</span></span></strong></p>
                                </td>
                              </tr>
                              <tr>
                                <td style="width:96px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{date('d/m/Y')}}</span></span></p>
                                </td>
                                <td style="width:132px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['vn']}}</span></span></p>
                                </td>
                                <td style="width:113px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4)}}</span></span></p>
                                </td>
                                <td style="width:141px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4, -5)}}</span></span></p>
                                </td>
                                <td style="width:237px;height:23px;">
                                <p style="text-align: center;">
                                  <span style="font-family:tahoma,sans-serif;">
                                    <span style="font-size:10.0pt;">Our terms are NET 30 days from date </span>

                                  </span>
                                </p>

                                </td>
                              </tr>
                            </tbody>
                          </table>

                          <p>&nbsp;</p>

                          <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>

                              <tr>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">QTY.</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DESCRIPTION</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">COSTS PER PIECE</span></span></strong></p>
                                </td>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                 <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTALPRICE</span></span></strong></p>
                                </td>

                              </tr>
                              <tr>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="text-align: center;">{{$order_value['amount']}}</p>
                                    @endforeach
                                    <p style="text-align: center;">&nbsp;</p>
                                    <p style="text-align: center;">&nbsp;</p>

                                  </td>
                                  <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Your order {{$orders['order_reference_number']}} dated {{date('d/m/Y')}} for {{$orders['order_subject']}}&nbsp;</span></span></p>
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$order_value['product']}}&nbsp;</span></span>&Oslash;&nbsp; {{$order_value['dimensionweight']}}
                                    </p>
                                    @endforeach

                                    <p style="margin-left: 9pt;">&nbsp;</p>

                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Transport &amp; Packaging TNT</span></span></p>

                                    <p style="margin-left: 9pt;">&nbsp;</p>
                                  </td>
                                  <td style="width:113px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>

                                    @foreach($dataorder as $order_key => $order_value)
                                      <p style="text-align: right;">{{$order_value['price']}} &euro;&nbsp; &nbsp; &nbsp;</p>
                                    @endforeach

                                    <p style="text-align: center;">&nbsp;</p>

                                    <p style="text-align: center;">&nbsp;</p>
                                  </td>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>


                                    <?php $_order_amount = explode(',', $orders['order_amount']); ?>

                                    <?php $total = 0; ?>


                                    @if($orders['order_price'])
                                        @foreach(explode(',', $orders['order_price']) as $k=> $_order_price)
                                          @if($_order_price !=='undefined')
                                            <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                                            <?php $total += $pxam; ?>

                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($pxam,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                          @endif

                                        @endforeach
                                    @endif


                                    <p style="text-align: center;">&nbsp;</p>
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($transport_price,2)}}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">00.0&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  </td>



                              </tr>

                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Subtotal&nbsp; :&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total)
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($transport_price + $total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                <?php $total_vat = ($percentage / 100) * $total; ?>

                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">V.A.T. {{$percentage}}%&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total_vat > 0)
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @else
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:26px;border: 1px solid #000;">
                                       <p style="margin-left: 48pt; text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTAL&nbsp; &nbsp;&nbsp;</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:115px;height:26px;border: 1px solid #000;">

                                  @if($total && $total_vat)

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat + $transport_price, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif

                                  @else

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($transport_price + $total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif
                                  @endif

                                </td>
                              </tr>
                             <!--  -->
                            </tbody>
                          </table>

                          <p><br />
                          &nbsp;</p>

                          <p><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Act is not subject to Belgian </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored</span></span></span><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;"> by the Contractor </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art. 51 WBTW- Art.44 and</span></span></span> <span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art.196 of the European VAT/BTW-Directives - B2B-Rule.</span></span></span></p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Please make payment of this invoice free of costs on our Bankaccount at the KBC-Bank IBAN BE69 4428 6426 5178</span></span></strong><br/>

                          <span style="font-size:10.0pt;">Address :&nbsp; KBC-KREDIETBANK NV.</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Kerkstraat, 57&nbsp;&nbsp;&nbsp;&nbsp; B-9200&nbsp; Dendermonde</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Swift&nbsp; :&nbsp; KREDBEBB</span></span></p>

                          <p><strong><span style="color:#222222;"><span style="font-family:calibri,sans-serif;"><span style="font-size:8.0pt;">The parties agree expressly that these general conditions govern their contractual exclusion of all others. The goods travel at the risk and peril of the recipient. The verification of the goods, quantity and quality, should be at the front desk. No claim shall be taken into account, if it has not been noted in writing on the note to send or on the invoice at the time of delivery, and confirmed in writing within three days</span></span></span></strong></p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>


                      </textarea>
                    </form>
                  </div>

                  <!-- fr -->
                  <div id="fr">
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden" name="order_id" value="{{$orders['id']}}" />
                      <input type="hidden" name="filename" value="invoice-paid" />
                      <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
                      <input type="hidden" name="transaction_type" value="client" />

                      <textarea cols="80" class="ckeditor en" name="editor" id="editor-fr" rows="10">
                          <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                          <p>&nbsp;</p>

                          <p style="margin-left:3.75in;"><strong><span style="font-family:tahoma,sans-serif;">{{strtoupper($orders['company_name'])}}</span></strong></p>
                          <p style="margin-left:3.75in;"><u><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">à l’Attn. de </span></span></u>&nbsp;<u><span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Accounting Dept.</span></span></u><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_street']}},{{$orders['company_number']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_zip']}},{{$orders['company_city']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_country']}}</span></span></strong></p>

                          <p style="margin-left:3.75in;">&nbsp;</p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:16.0pt;">FACTURE D’ACHAT</span></span></strong><span style="color:white;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">E</span></span></span></p>

                          <p>&nbsp;</p>

                          <table border="1" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td style="width:96px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DATE</span></span></strong></p>
                                </td>
                                <td style="width:132px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">NUMERO DE T.V.A.</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:18px;">
                                <p style="margin-left:20.0pt;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">MUMERO D’ACHAT</span></span></strong></p>
                                </td>
                                <td style="width:141px;height:18px;">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">NUMERO CLIENT&nbsp;</span></span></strong></p>
                                </td>
                                <td style="width:237px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">CONDITIONS DE PAIEMENT</span></span></strong></p>
                                </td>
                              </tr>
                              <tr>
                                <td style="width:96px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{date('d/m/Y')}}</span></span></p>
                                </td>
                                <td style="width:132px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['vn']}}</span></span></p>
                                </td>
                                <td style="width:113px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4)}}</span></span></p>
                                </td>
                                <td style="width:141px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4, -5)}}</span></span></p>
                                </td>
                                <td style="width:237px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;">
                                  <span style="font-size:10.0pt;">Nos termes sont NET 30 jours à compter de la date de facturation</span>

                                </p>

                                </td>
                              </tr>
                            </tbody>
                          </table>

                          <p>&nbsp;</p>

                          <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">QUANTITE.</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DESCRIPTION</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">COÛT PAR PIÈCE</span></span></strong></p>
                                </td>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                 <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">PRIX TOTAL</span></span></strong></p>
                                </td>

                              </tr>

                              <tr>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="text-align: center;">{{$order_value['amount']}}</p>
                                    @endforeach
                                    <p style="text-align: center;">&nbsp;</p>
                                    <p style="text-align: center;">&nbsp;</p>

                                  </td>
                                  <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Votre commande  {{$orders['order_reference_number']}} daté {{date('d/m/Y')}} pour {{$orders['order_subject']}}&nbsp;</span></span></p>
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$order_value['product']}}&nbsp;</span></span>&Oslash;&nbsp; {{$order_value['dimensionweight']}}
                                    </p>
                                    @endforeach

                                    <p style="margin-left: 9pt;">&nbsp;</p>

                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Transport &amp; Packaging TNT</span></span></p>

                                    <p style="margin-left: 9pt;">&nbsp;</p>
                                  </td>
                                  <td style="width:113px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>

                                    @foreach($dataorder as $order_key => $order_value)
                                      <p style="text-align: right;">{{$order_value['price']}} &euro;&nbsp; &nbsp; &nbsp;</p>
                                    @endforeach

                                    <p style="text-align: center;">&nbsp;</p>

                                    <p style="text-align: center;">&nbsp;</p>
                                  </td>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>


                                    <?php $_order_amount = explode(',', $orders['order_amount']); ?>

                                    <?php $total = 0; ?>


                                    @if($orders['order_price'])
                                        @foreach(explode(',', $orders['order_price']) as $k=> $_order_price)
                                          @if($_order_price !=='undefined')
                                            <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                                            <?php $total += $pxam; ?>

                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($pxam,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                          @endif

                                        @endforeach
                                    @endif


                                    <p style="text-align: center;">&nbsp;</p>
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($transport_price,2)}}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">00.0&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  </td>



                              </tr>

                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Subtotal&nbsp; :&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total)
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($transport_price + $total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                <?php $total_vat = ($percentage / 100) * $total; ?>

                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">T.V.A. {{$percentage}}%&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total_vat > 0)
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @else
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:26px;border: 1px solid #000;">
                                       <p style="margin-left: 48pt; text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTAL&nbsp; &nbsp;&nbsp;</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:115px;height:26px;border: 1px solid #000;">

                                  @if($total && $total_vat)

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat + $transport_price, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif

                                  @else

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($transport_price + $total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif
                                  @endif

                                </td>
                              </tr>
                             <!--  -->
                            </tbody>
                          </table>

                          <p><br />
                          &nbsp;</p>

                          <p><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Act is not subject to Belgian </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored</span></span></span><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;"> by the Contractor </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art. 51 WBTW- Art.44 and</span></span></span> <span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art.196 of the European VAT/BTW-Directives - B2B-Rule.</span></span></span></p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Veuillez effectuer le paiement de cette facture sans frais sur notre compte bancaire à la Banque CBC -- IBAN BE69 4428 6426 5178</span></span></strong><br/>

                          <span style="font-size:10.0pt;">Address :&nbsp; KBC-KREDIETBANK NV.</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Kerkstraat, 57&nbsp;&nbsp;&nbsp;&nbsp; B-9200&nbsp; Dendermonde</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Swift&nbsp; :&nbsp; KREDBEBB</span></span></p>

                          <p><strong><span style="color:#222222;"><span style="font-family:calibri,sans-serif;"><span style="font-size:8.0pt;">Les parties conviennent expressément que ces conditions générales régissent leur exclusion contractuelle de toutes les autres. Les marchandises voyagent aux risques et périls du destinataire. La vérification des marchandises, la quantité et la qualité, devrait être à la réception. Aucune réclamation ne sera prise en compte, si elle n'a pas été notée par écrit sur la note à envoyer ou sur la facture au moment de la livraison, et confirmée par écrit dans les trois jours.</span></span></span></strong></p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>


                      </textarea>
                    </form>
                  </div>

                  <!-- nl -->
                  <div id="nl">
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden" name="order_id" value="{{$orders['id']}}" />
                      <input type="hidden" name="filename" value="invoice-paid" />
                      <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
                      <input type="hidden" name="transaction_type" value="client" />

                      <textarea cols="80" class="ckeditor en" name="editor" id="editor-nl" rows="10">
                          <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                          <p>&nbsp;</p>

                          <p style="margin-left:3.75in;"><strong><span style="font-family:tahoma,sans-serif;">{{strtoupper($orders['company_name'])}}</span></strong></p>
                          <p style="margin-left:3.75in;"><u><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Ter Att. Van </span></span></u>&nbsp;<u><span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Accounting Dept.</span></span></u><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_street']}},{{$orders['company_number']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_zip']}},{{$orders['company_city']}}</span></span></strong><br />
                          <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_country']}}</span></span></strong></p>

                          <p style="margin-left:3.75in;">&nbsp;</p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:16.0pt;">FACTUUR</span></span></strong><span style="color:white;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">E</span></span></span></p>

                          <p>&nbsp;</p>

                          <table border="1" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>
                                <td style="width:96px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DATUM</span></span></strong></p>
                                </td>
                                <td style="width:132px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">BTW-Nummer</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:18px;">
                                <p style="margin-left:20.0pt;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">FACTUUR NUMMER</span></span></strong></p>
                                </td>
                                <td style="width:141px;height:18px;">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">FACTUUR NUMMER&nbsp;</span></span></strong></p>
                                </td>
                                <td style="width:237px;height:18px;">
                                <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">BETALINGSVOORWAARDEN</span></span></strong></p>
                                </td>
                              </tr>
                              <tr>
                                <td style="width:96px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{date('d/m/Y')}}</span></span></p>
                                </td>
                                <td style="width:132px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['vn']}}</span></span></p>
                                </td>
                                <td style="width:113px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4)}}</span></span></p>
                                </td>
                                <td style="width:141px;height:23px;">
                                <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4, -5)}}</span></span></p>
                                </td>
                                <td style="width:237px;height:23px;">
                                <p style="text-align: center;">
                                  <span style="font-family:tahoma,sans-serif;">
                                    <span style="font-size:10.0pt;">Te betalen 30 dagen na factuurdatum </span>
                                  </span>
                                </p>

                                </td>
                              </tr>
                            </tbody>
                          </table>

                          <p>&nbsp;</p>

                          <table border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                              <tr>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">AANTAL</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">BESCHRIJVING</span></span></strong></p>
                                </td>
                                <td style="width:113px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">KOST PER STUK</span></span></strong></p>
                                </td>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                 <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTALE PRIJS</span></span></strong></p>
                                </td>

                              </tr>

                              <tr>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="text-align: center;">{{$order_value['amount']}}</p>
                                    @endforeach
                                    <p style="text-align: center;">&nbsp;</p>
                                    <p style="text-align: center;">&nbsp;</p>

                                  </td>
                                  <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Uw order nr. {{$orders['order_reference_number']}} van  {{date('d/m/Y')}} voor {{$orders['order_subject']}}&nbsp;</span></span></p>
                                    <p style="text-align: center;">&nbsp;</p>
                                    @foreach($dataorder as $order_key => $order_value)
                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$order_value['product']}}&nbsp;</span></span>&Oslash;&nbsp; {{$order_value['dimensionweight']}}
                                    </p>
                                    @endforeach

                                    <p style="margin-left: 9pt;">&nbsp;</p>

                                    <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Transport &amp; Packaging TNT</span></span></p>

                                    <p style="margin-left: 9pt;">&nbsp;</p>
                                  </td>
                                  <td style="width:113px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>

                                    @foreach($dataorder as $order_key => $order_value)
                                      <p style="text-align: right;">{{$order_value['price']}} &euro;&nbsp; &nbsp; &nbsp;</p>
                                    @endforeach

                                    <p style="text-align: center;">&nbsp;</p>

                                    <p style="text-align: center;">&nbsp;</p>
                                  </td>

                                  <td style="width:87px;height:27px;border: 1px solid #000; ">
                                    <p style="text-align: center;">&nbsp;</p>


                                    <?php $_order_amount = explode(',', $orders['order_amount']); ?>

                                    <?php $total = 0; ?>


                                    @if($orders['order_price'])
                                        @foreach(explode(',', $orders['order_price']) as $k=> $_order_price)
                                          @if($_order_price !=='undefined')
                                            <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                                            <?php $total += $pxam; ?>

                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($pxam,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                          @endif

                                        @endforeach
                                    @endif


                                    <p style="text-align: center;">&nbsp;</p>
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($transport_price,2)}}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">00.0&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  </td>



                              </tr>

                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Subtotal&nbsp; :&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total)
                                    @if($transport_price)
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($transport_price + $total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @else
                                      <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                    @endif
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:5px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                                <?php $total_vat = ($percentage / 100) * $total; ?>

                                <td style="width:113px;height:5px; border: 1px solid #000;">
                                <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">B.T.W. {{$percentage}}%&nbsp; &nbsp;</span></span></p>
                                </td>
                                <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                  @if($total_vat > 0)
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @else
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                  @endif
                                </td>
                              </tr>
                              <tr>
                                <td style="width:87px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:155px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:252px;height:26px;">
                                <p style="text-align: center;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:26px;border: 1px solid #000;">
                                       <p style="margin-left: 48pt; text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTAAL &nbsp; &nbsp; &nbsp;&nbsp;</span></span></strong></p>
                                </td>
                                <td colspan="2" style="width:115px;height:26px;border: 1px solid #000;">

                                  @if($total && $total_vat)

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat + $transport_price, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif

                                  @else

                                    @if($transport_price)
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($transport_price + $total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @else
                                      <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                    @endif
                                  @endif

                                </td>
                              </tr>
                             <!--  -->
                            </tbody>
                          </table>

                          <p><br />
                          &nbsp;</p>

                          <p><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Act is not subject to Belgian </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored</span></span></span><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;"> by the Contractor </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art. 51 WBTW- Art.44 and</span></span></span> <span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art.196 of the European VAT/BTW-Directives - B2B-Rule.</span></span></span></p>

                          <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Vermeld bij betaling factuurnummer en -datum a.u.b.
                          Gelieve deze factuur kosteloos te betalen op de bankrekening van de
                          KBC-Bank     IBAN BE69 4428 6426 5178
                          </span></span></strong><br/>

                          <span style="font-size:10.0pt;">Address :&nbsp; KBC-KREDIETBANK NV.</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Kerkstraat, 57&nbsp;&nbsp;&nbsp;&nbsp; B-9200&nbsp; Dendermonde</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Swift&nbsp; :&nbsp; KREDBEBB</span></span></p>

                          <p><strong><span style="color:#222222;"><span style="font-family:calibri,sans-serif;"><span style="font-size:8.0pt;">De partijen komen uitdrukkelijk overeen dat hun contractuele betrekkingen uitsluitend geregeld worden door deze algemene verkoopsvoorwaarden. De goederen worden verzonden op risico van de koper. De controle van de goederen, kwaliteit en kwantiteit, gebeuren bij levering. Klachten zullen niet worden aanvaard indien zij niet vermeld werden op de leveringsbon of op de factuur op het ogenblik van de levering, en schriftelijk bevestigd binnen de drie dagen. </span></span></span></strong></p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>

                          <p>&nbsp;</p>


                      </textarea>
                    </form>
                  </div>

                  <!-- de -->
                  <div id="de">
                    <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">

                      <input type="hidden" name="order_id" value="{{$orders['id']}}" />
                      <input type="hidden" name="filename" value="invoice-paid" />
                      <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
                      <input type="hidden" name="transaction_type" value="client" />

                      <textarea cols="80" class="ckeditor en" name="editor" id="editor-de" rows="10">
                        <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>

                        <p>&nbsp;</p>

                        <p style="margin-left:3.75in;"><strong><span style="font-family:tahoma,sans-serif;">{{strtoupper($orders['company_name'])}}</span></strong></p>
                        <p style="margin-left:3.75in;"><u><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Z. HD. </span></span></u>&nbsp;<u><span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Accounting Dept.</span></span></u><br />
                        <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_street']}},{{$orders['company_number']}}</span></span></strong><br />
                        <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_zip']}},{{$orders['company_city']}}</span></span></strong><br />
                        <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_country']}}</span></span></strong></p>

                        <p style="margin-left:3.75in;">&nbsp;</p>

                        <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:16.0pt;">RECHNUNG</span></span></strong><span style="color:white;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">E</span></span></span></p>

                        <p>&nbsp;</p>

                        <table border="1" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td style="width:96px;height:18px;">
                              <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DATUM</span></span></strong></p>
                              </td>
                              <td style="width:132px;height:18px;">
                              <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">MWST-NUMMER</span></span></strong></p>
                              </td>
                              <td style="width:113px;height:18px;">
                              <p style="margin-left:20.0pt;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">RECHNUNG NUMMER</span></span></strong></p>
                              </td>
                              <td style="width:141px;height:18px;">
                              <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">KUNDENNUMMER&nbsp;</span></span></strong></p>
                              </td>
                              <td style="width:237px;height:18px;">
                              <p align="center"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">ZAHLUNGSBEDINGUNGEN</span></span></strong></p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:96px;height:23px;">
                              <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{date('d/m/Y')}}</span></span></p>
                              </td>
                              <td style="width:132px;height:23px;">
                              <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['vn']}}</span></span></p>
                              </td>
                              <td style="width:113px;height:23px;">
                              <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4)}}</span></span></p>
                              </td>
                              <td style="width:141px;height:23px;">
                              <p style="text-align: center;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{substr($orders['order_reference_number'], 4, -5)}}</span></span></p>
                              </td>
                              <td style="width:237px;height:23px;">
                              <p style="text-align: center;">
                                <span style="font-family:tahoma,sans-serif;">
                                  <span style="font-size:10.0pt;">ZAHLUNGSFRIST  20 Tage nach Rechnungsdatum</span>

                                </span>
                              </p>

                              </td>
                            </tr>
                          </tbody>
                        </table>

                        <p>&nbsp;</p>

                        <table border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>

                              <td style="width:87px;height:27px;border: 1px solid #000; ">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">MENGE</span></span></strong></p>
                              </td>
                              <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">BESCHREIBUNG</span></span></strong></p>
                              </td>
                              <td style="width:113px;height:27px;border: 1px solid #000; ">
                                <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">PREIS PRO STÜCK</span></span></strong></p>
                              </td>

                              <td style="width:87px;height:27px;border: 1px solid #000; ">
                               <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">GESAMTPREIS</span></span></strong></p>
                              </td>

                            </tr>

                            <tr>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;">&nbsp;</p>
                                  @foreach($dataorder as $order_key => $order_value)
                                  <p style="text-align: center;">{{$order_value['amount']}}</p>
                                  @endforeach
                                  <p style="text-align: center;">&nbsp;</p>
                                  <p style="text-align: center;">&nbsp;</p>

                                </td>
                                <td colspan="2" style="width:407px;height:27px;border: 1px solid #000; ">
                                  <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Deine Bestellung {{$orders['order_reference_number']}} datiert {{date('d/m/Y')}} für {{$orders['order_subject']}}&nbsp;</span></span></p>
                                  <p style="text-align: center;">&nbsp;</p>
                                  @foreach($dataorder as $order_key => $order_value)
                                  <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$order_value['product']}}&nbsp;</span></span>&Oslash;&nbsp; {{$order_value['dimensionweight']}}
                                  </p>
                                  @endforeach

                                  <p style="margin-left: 9pt;">&nbsp;</p>

                                  <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Transport &amp; Packaging TNT</span></span></p>

                                  <p style="margin-left: 9pt;">&nbsp;</p>
                                </td>
                                <td style="width:113px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;">&nbsp;</p>

                                  @foreach($dataorder as $order_key => $order_value)
                                    <p style="text-align: right;">{{$order_value['price']}} &euro;&nbsp; &nbsp; &nbsp;</p>
                                  @endforeach

                                  <p style="text-align: center;">&nbsp;</p>

                                  <p style="text-align: center;">&nbsp;</p>
                                </td>

                                <td style="width:87px;height:27px;border: 1px solid #000; ">
                                  <p style="text-align: center;">&nbsp;</p>


                                  <?php $_order_amount = explode(',', $orders['order_amount']); ?>

                                  <?php $total = 0; ?>


                                  @if($orders['order_price'])
                                      @foreach(explode(',', $orders['order_price']) as $k=> $_order_price)
                                        @if($_order_price !=='undefined')
                                          <?php $pxam =  $_order_amount[$k] *  $_order_price; ?>
                                          <?php $total += $pxam; ?>

                                          <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($pxam,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                        @endif

                                      @endforeach
                                  @endif


                                  <p style="text-align: center;">&nbsp;</p>
                                  @if($transport_price)
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($transport_price,2)}}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                  @else
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">00.0&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                  @endif
                                </td>



                            </tr>

                            <tr>
                              <td style="width:87px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:155px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:252px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:113px;height:5px; border: 1px solid #000;">
                              <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Subtotal&nbsp; :&nbsp; &nbsp;</span></span></p>
                              </td>
                              <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                @if($total)
                                  @if($transport_price)
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($transport_price + $total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                  @else
                                    <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ number_format($total,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                  @endif
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td style="width:87px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:155px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:252px;height:5px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                              <?php $total_vat = ($percentage / 100) * $total; ?>

                              <td style="width:113px;height:5px; border: 1px solid #000;">
                              <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">MwSt {{$percentage}}%&nbsp; &nbsp;</span></span></p>
                              </td>
                              <td colspan="2" style="width:115px;height:5px; border: 1px solid #000;">
                                @if($total_vat > 0)
                                  <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                @else
                                  <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ number_format($total_vat,2) }}  &euro; &nbsp;</span></span></p>
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td style="width:87px;height:26px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:155px;height:26px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:252px;height:26px;">
                              <p style="text-align: center;">&nbsp;</p>
                              </td>
                              <td style="width:113px;height:26px;border: 1px solid #000;">
                                <p style="margin-left: 48pt; text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">ZU&nbsp; zhalen&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></span></strong></p>
                              </td>
                              <td colspan="2" style="width:115px;height:26px;border: 1px solid #000;">

                                @if($total && $total_vat)

                                  @if($transport_price)
                                    <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat + $transport_price, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                  @else
                                    <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total + $total_vat, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                  @endif

                                @else

                                  @if($transport_price)
                                    <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($transport_price + $total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                  @else
                                    <p style="text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp;&nbsp;{{ number_format($total, 2) }}  &euro;&nbsp;</span></span></strong></p>
                                  @endif
                                @endif

                              </td>
                            </tr>
                           <!--  -->
                          </tbody>
                        </table>

                        <p><br />
                        &nbsp;</p>

                        <p><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Act is not subject to Belgian </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored</span></span></span><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;"> by the Contractor </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art. 51 WBTW- Art.44 and</span></span></span> <span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span style="font-size:10.0pt;">Art.196 of the European VAT/BTW-Directives - B2B-Rule.</span></span></span></p>

                        <p><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Bitte bezahlen Sie diese Rechnung kostenlos auf unserem Bankkonto bei der
                        KBC-Bank     IBAN BE69 4428 6426 5178
                        </span></span></strong><br/>

                        <span style="font-size:10.0pt;">Address :&nbsp; KBC-KREDIETBANK NV.</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Kerkstraat, 57&nbsp;&nbsp;&nbsp;&nbsp; B-9200&nbsp; Dendermonde</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Swift&nbsp; :&nbsp; KREDBEBB</span></span></p>

                        <p><strong><span style="color:#222222;"><span style="font-family:calibri,sans-serif;"><span style="font-size:8.0pt;">Die Parteien stimmen ausdrücklich zu, dass diese allgemeinen Bedingungen ihren vertraglichen Ausschluss von allen anderen regeln. Die Waren reisen auf Gefahr und Gefahr des Empfängers. Die Überprüfung der Waren, Menge und Qualität sollte an der Rezeption erfolgen. Eine Reklamation wird nicht berücksichtigt, wenn sie nicht innerhalb von drei Tagen schriftlich auf dem Lieferschein oder auf der Rechnung zum Zeitpunkt der Lieferung vermerkt und schriftlich bestätigt wurde.</span></span></span></strong></p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>

                        <p>&nbsp;</p>


                      </textarea>
                    </form>
                  </div>



                </div>
                <div class="tab-pane" id="home" role="tabpanel">

                    <br/>

                    <div class="alert alert-danger form-error-msg" style="display:none;">
                        <ul></ul>
                    </div>

                    <form name=f1 id="post-generate-invoice" method="post" action="{{url('/admin/generate-invoice')}}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="order_id" value="{{$orders['id']}}" />
                        <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
                        <input type="hidden" name="id" value="{{ $orders['order_id'] }}">

                        <div class="messages"></div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $orders['company_name'] }}" placeholder="Name">
                            </div>
                            <div class="form-group col-sm-12">
                                <?php
                                $emails = explode(',',$orders['contact_person_email']);
                                $emails[] = $orders['company_email'];
                                ?>
                                <select class="form-control" name="email">
                                  @foreach(array_reverse($emails, true) as $email)
                                  <option value="{{ $email }}">{{ $email }}</option>
                                  @endforeach
                                </select>
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
        </div>
        <!-- /.8 -->
    </div>
    <!-- /.row-->
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
