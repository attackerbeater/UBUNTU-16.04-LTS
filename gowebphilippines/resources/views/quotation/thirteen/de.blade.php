<div id="de">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$orders['order_id']}}" />
    <input type="hidden" name="filename" value="invoice_sent" />
    <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
    <input type="hidden" name="transaction_type" value="client" />
    <textarea class="ckeditor de" name="editor" id="editor-de" frameborder="0px">
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
          <p style="margin-left: 80px;"><strong>{{strtoupper($orders['company_name'])}}</strong></p>
          <p style="margin-left: 80px;">Z. HD. {{$orders['contact_first_name']}} {{$orders['contact_lastname']}}<br />
            {{$orders['company_street']}}<br />
            {{$orders['company_city']}}&nbsp;{{$orders['company_zip']}}<br />
            <strong>{{$orders['company_country']}}</strong>
          </p>
        </div>   
      </div>     
      <div style="clear:both;"></div>  
      <table style="width:100%" border="1" cellpadding="10" cellspacing="0">
        <p>
          <strong>
            <span >
              <span>RECHNUNG</span>
            </span>
          </strong>
        </p>
        <tbody>
          <tr>
            <td style="width:96px;">
              <p align="center"><strong><span ><span >DATUM</span></span></strong></p>
            </td>
            <td style="width:132px;">
              <p align="center"><strong><span ><span >MWST-NUMMER</span></span></strong></p>
            </td>
            <td style="width:113px;">
              <p style="margin-left:20.0pt;"><strong><span ><span >RECHNUNG NUMMER</span></span></strong></p>
            </td>
            <td style="width:141px;">
              <p style="text-align: center;"><strong><span ><span >KUNDENNUMMER&nbsp;</span></span></strong></p>
            </td>
            <td style="width:237px;">
              <p align="center"><strong><span ><span >ZAHLUNGSBEDINGUNGEN</span></span></strong></p>
            </td>
          </tr>
          <tr>
            <td style="width:96px;">
              <p style="text-align: center;"><span ><span >{{date('m/d/Y')}}</span></span></p>
            </td>
            <td style="width:132px;">
              <p style="text-align: center;"><span ><span >{{$orders['vn']}}</span></span></p>
            </td>
            <td style="width:113px;">
              <p style="text-align: center;"><span ><span >{{substr($orders['order_reference_number'], 4)}}</span></span></p>
            </td>
            <td style="width:141px;">
              <p style="text-align: center;"><span ><span >{{substr($orders['order_reference_number'], 4, -5)}}</span></span></p>
            </td>
            <td style="width:237px;">
              <p style="text-align: center;">
                <span >
                  <span >ZAHLUNGSFRIST  20 Tage nach Rechnungsdatum </span>
                </span>
              </p>
            </td>
          </tr>
          <!-- separator -->
          <tr>
            <td style="width:87px;"></td>
            <td colspan="2" style="width:407px;"></td>
            <td style="width:113px;"> </td>
            <td style="width:87px;"></td>
          </tr>
          <!-- /. separator -->
          <tr>
            <td style="width:87px;">
              <p style="text-align: center;"><strong><span ><span >MENGE</span></span></strong></p>
            </td>
            <td colspan="2" style="width:407px;">
              <p style="text-align: center;"><strong><span ><span >BESCHREIBUNG</span></span></strong></p>
            </td>
            <td style="width:113px;">
              <p style="text-align: center;"><strong><span ><span >PREIS PRO STÜCK</span></span></strong></p>
            </td>
            <td style="width:87px;">
              <p style="text-align: center;"><strong><span ><span >GESAMTPREIS</span></span></strong></p>
            </td>
          </tr>
          <tr>
            <td style="width:87px;"></td>
            <td colspan="2" style="width:407px;">
              <p style="margin-left: 9pt;"><span ><span >Deine Bestellung {{$orders['order_reference_number']}} datiert {{date('d/m/Y')}} für {{$orders['order_subject']}}&nbsp;</span></span></p>
            </td>
            <td style="width:113px;"></td>
            <td style="width:87px;"></td>
          </tr>
          <?php $total = 0; ?>
          <?php $data = []; ?>
          <?php $TOTALPRICE = []; ?>
          
          <?php foreach ($products as $key => $value)  :?>
            <tr>
              <td style="width:87px;">
                <p style="text-align: center;">{{ $value['order_amount'] }}</p>
              </td>
              <td colspan="2" style="width:407px;">
                <p style="margin-left: 9pt;">
                  <span >
                    <span >{{ $value['order_product']  }}&nbsp;</span>
                  </span>&Oslash;&nbsp; {{ $value['order_dimensionweight'] }}
                </p>
              </td>
              <td style="width:113px;">
                <!-- 11/10/2018 -->
                <?php
                if(!empty($value['order_treatment'])) :
                  $order_treatment = $value['order_treatment'];
                  $order_treatment_details = $value['order_treatment_details'];
                  $order_treatment_price = $value['order_treatment_price'];
                 
                  $i = 0;
                  $p = [];
                  foreach ($order_treatment as $key1 => $value1):
                    $c = $i++ + 1;     
                    $p[] = $order_treatment_price[$key1]; //COST PER PIECE
                  endforeach;
              
                  ?>
                  <p style="text-align: right;"><?php echo array_sum($p); ?> &euro;&nbsp; &nbsp; &nbsp;</p>
                  <?php 
                endif;
                ?>
              </td>
              <!-- 11/10/2018 -->
              <td style="width:87px;">
                <?php $_order_amount = explode(',', $orders['order_amount']); ?>             
                <?php
                if(!empty($value['order_treatment'])) :
                  $price= [];
                  $order_treatment = $value['order_treatment'];
                  $order_treatment_details = $value['order_treatment_details'];
                  $order_treatment_price = $value['order_treatment_price'];
                  $i = 0;
                  foreach ($order_treatment as $key1 => $value1):
                    $c = $i++ + 1;
                    $price[] = $order_treatment_price[$key1]; 
                  endforeach;
                  
                  $price_sum =  array_sum($price);
                  $order_amount = $value['order_amount'];

                  $total +=$price_sum;

                  $TOTAL_PRICE = $price_sum * $order_amount; 
                  $TOTALPRICE[] = $TOTAL_PRICE;
                  
                  $data['total_prices'][$key] = $TOTAL_PRICE;
                  ?>
                  <p style="text-align: right;">
                    <span >
                      <span >{{ number_format($TOTAL_PRICE, 2) }}&nbsp;</span>
                    </span>&euro;&nbsp; &nbsp;
                  </p>
                  <?php
                endif;
                ?>
              </td>
            </tr>
          <?php endforeach; ?>
          
          <?php
          // PREPARE THE SUBTOTAL <!-- 11/10/2018 -->
          $TOTALPRICE= array_sum($TOTALPRICE);
          $transport_price = $orders['transport_price'];
          
          if($transport_price){
            $subtotal = $TOTALPRICE + $transport_price;
          }else{
            $subtotal = $TOTALPRICE;
          }
          ?>
         <tr>
           <td style="width:87px;"></td>
           <td colspan="2" style="width:407px;">
             <p style="margin-left: 9pt;"><span ><span >Transport &amp; Packaging : {{$orders['transport']}} </span></span></p>
           </td>
           <td style="width:113px;"></td>
           <td style="width:87px;">
             @if($transport_price)
             <p style="text-align: right;"><span ><span >{{ number_format($transport_price,2)}}&nbsp; </span></span>&euro;&nbsp; &nbsp;</p>
             @else
             <p style="text-align: right;"><span ><span >{{ number_format(0,2) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
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
            <td style="width:113px;height:5px; ">
              <p style="text-align: right;"><span ><span >Subtotal&nbsp; &nbsp; &nbsp;</span></span></p>
            </td>
            <td colspan="2" style="width:115px;height:5px; ">    
              <p style="text-align: right;"><span ><span >&nbsp; {{ number_format($subtotal, 2) }} &nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
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
            <?php $total_vat = ($percentage / 100) * $subtotal; ?>
            <td style="width:113px;height:5px; ">
              <p style="text-align: right;"><span ><span >MwSt {{$percentage}}%&nbsp; &nbsp;</span></span></p>
            </td>
            <td colspan="2" style="width:115px;height:5px; ">
              <!-- 11/10/2018 -->
              @if($total_vat > 0)
              <p style="text-align: right;"><span ><span >&nbsp; {{ number_format($total_vat,2) }}  &nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
              @else
              <p style="text-align: right;"><span ><span >&nbsp; {{ number_format($total_vat,2) }}  &nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
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
            <td style="width:113px;height:26px;">
              <p style="margin-left: 48pt; text-align: right;"><strong><span ><span >ZU zhalen &nbsp; &nbsp;&nbsp;</span></span></strong> </p>
            </td>
            <td colspan="2" style="width:115px;height:26px;">
              <!-- 11/10/2018 -->
              <p style="text-align: right;"><strong><span ><span >&nbsp;&nbsp;{{number_format($subtotal + $total_vat, 2)}} &euro;&nbsp; &nbsp;</span></span></strong></p>
          
            </td>
          </tr>
          <!--  -->
        </tbody>
      </table>
      <p><span style="color: rgb(34, 34, 34);"><span><span >Art.21 § 2 Belgische Wbtw. / art.44 Europaïsche Richtliën -  Durch Die Verwendung Ihrer Umsatsteuer-ID, geht die Steurerlast auf Sie über ( art.196) Europaïsche Richtliën + art.51 Belgische Wbtw</span></span></span><span style="color: rgb(34, 34, 34);"><span style="font-family:calibri,sans-serif;"><span > by the Contractor </span></span></span><span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span >Art. 51 WBTW- Art.44 and</span></span></span> <span style="color: rgb(89, 89, 89);"><span style="font-family:calibri,sans-serif;"><span >Art.196 of the European VAT/BTW-Directives - B2B-Rule.</span></span></span></p>
      <p><strong><span ><span >Bitte bezahlen Sie diese Rechnung kostenlos auf unserem Bankkonto bei der
        KBC-Bank     IBAN BE69 4428 6426 5178
      </span></span></strong><br/>
      <span >Addresse :&nbsp; KBC-KREDIETBANK NV.</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span ><span >Kerkstraat, 57&nbsp;&nbsp;&nbsp;&nbsp; B-9200&nbsp; Dendermonde</span></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span ><span style="font-size:9.5pt;">Swift&nbsp; :&nbsp; KREDBEBB</span></span></p>
      <p><strong><span style="color:#222222;"><span style="font-family:calibri,sans-serif;"><span style="font-size:8.0pt;">Die Parteien stimmen ausdrücklich zu, dass diese allgemeinen Bedingungen ihren vertraglichen Ausschluss von allen anderen regeln. Die Waren reisen auf Gefahr und Gefahr des Empfängers. Die Überprüfung der Waren, Menge und Qualität sollte an der Rezeption erfolgen. Eine Reklamation wird nicht berücksichtigt, wenn sie nicht innerhalb von drei Tagen schriftlich auf dem Lieferschein oder auf der Rechnung zum Zeitpunkt der Lieferung vermerkt und schriftlich bestätigt wurde.</span></span></span></strong></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </textarea>
  </form>
</div>
