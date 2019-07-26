<div id="de">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$orders['id']}}" />
    <input type="hidden" name="filename" value="goods_sent_to_client" />
    <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
    <input type="hidden" name="transaction_type" value="client" />
    <textarea class="ckeditor" name="editor" id="editor-de">
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
          <p style="margin-left: 80px;">Attn Dhr. {{$orders['contact_first_name']}} {{$orders['contact_lastname']}}<br />
            {{$orders['company_street']}}<br />
            {{$orders['company_city']}}&nbsp;{{$orders['company_zip']}}<br />
            <strong>{{$orders['company_country']}}</strong>
          </p>
        </div>   
      </div>     
      <div style="clear:both;"></div> 
        <p><span style="font-size:24px;"><strong>LIEFERSCHEIN</strong></span></p>
        <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td style="width:76px">
                <p style="text-align:center"><strong>DATUM</strong></p>
              </td>
              <td style="width:123px">
                <p style="text-align:center"><strong>MwSt-NUMMER</strong></p>
              </td>
              <td style="width:142px">
                <p style="text-align:center"><strong>DOC.NUMMER</strong></p>
              </td>
              <td style="width:142px">
                <p style="text-align:center"><strong>KUNDENNUMMER</strong></p>
              </td>
              <td style="width:151px">
                <p style="text-align:center"><strong>TRANSPORTMODUS</strong></p>
              </td>
            </tr>
            <tr>
              <td style="height:34px; width:76px">
                <p style="text-align:center">{{ date('d/m/Y') }}&nbsp;</p>
              </td>
              <td style="height:34px; width:123px">
                <p style="text-align:center">&nbsp;</p>
                <p style="text-align:center">{{ $orders['vn'] }}&nbsp;</p>
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:34px; width:142px">
                <p style="text-align:center">&nbsp;</p>
                <p style="text-align:center">{{ $orders['client_reference_number'] }}&nbsp;</p>
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:34px; width:142px">
                <p style="text-align:center">{{ substr($orders['id'],0, 2) }}.{{ substr($orders['id'],2) }} </p>
              </td>
              <td style="height:34px; width:151px">
                <p style="text-align:center">{{ $orders['transport_company'] }}</p>
              </td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td style="height:26px; width:78px">
                <p style="text-align:center"><strong>ANZAHL</strong></p>
              </td>
              <td style="height:26px; width:340px">
                <p style="text-align:center"><strong>BESCHREIBUNG</strong></p>
              </td>
              <td style="height:26px; width:91px">
                <p style="text-align:center"><strong>STÜCK IN</strong></p>
              </td>
              <td style="height:26px; width:126px">
                <p style="text-align:center"><strong>GESAMMTE OUT</strong></p>
              </td>
            </tr>
            <tr>
              <td style="height:125px; width:78px">
                <p style="text-align:center">&nbsp;</p>
                <p style="text-align:center">&nbsp;</p>
                @foreach(explode(',',$orders['order_amount']) as $amount)
                @if($amount)
                <p style="text-align:center">{{ $amount }}</p>
                @else
                <p style="text-align:center">da</p>
                @endif
                @endforeach
                <p style="text-align:center">&nbsp;</p>
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:125px; width:340px">
                <p style="margin-left:40px">Deine Bestellung Nr. {{ $orders['order_number_from_client'] }} &nbsp;datiert {{ date('d/m/Y') }}&nbsp;</p>
                <p style="margin-left:40px">Für {{ $orders['order_subject'] }}</p>
                <?php
                $order_product = explode(',',$orders['order_product'])
                ?>
                @foreach($order_product as $key => $product)
                <p style="margin-left:40px">{{ $order_product[$key] }}</p>
                @endforeach
                <p style="text-align:center">&nbsp;</p>
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:125px; width:91px">
                <p style="text-align:center">&nbsp;</p>
                @foreach(explode(',',$orders['order_amount']) as $amount)
                @if($amount)
                <p style="text-align:center">{{ $amount }}</p>
                @else
                <p style="text-align:center">da</p>
                @endif
                @endforeach
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:125px; width:126px">
                <p style="text-align:center">&nbsp;</p>
                @foreach(explode(',',$orders['order_amount']) as $amount)
                @if($amount)
                <p style="text-align:center">{{ $amount }}</p>
                @else
                <p style="text-align:center">da</p>
                @endif
                @endforeach
                <p style="text-align:center">&nbsp;</p>
              </td>
            </tr>
            <tr>
              <td style="height:33px; width:78px">
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:33px; width:340px">
                <p style="text-align:center">&nbsp;</p>
              </td>
              <td style="height:33px; width:91px">
                <p style="text-align:center"><strong>Total </strong></p>
              </td>
              <?php $amounts = explode(',',$orders['order_amount']); ?>
              <td style="height:33px; width:126px">
                <p style="text-align:center">{{ str_replace('.',',',number_format(array_sum($amounts))) }}</p>
              </td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <p>Innergemeinschaftliche Lieferung</p>
        <p>Die Parteien stimmen ausdrücklich zu, dass ihre vertraglichen Beziehungen ausschließlich durch diese Allgemeinen Verkaufsbedingungen geregelt werden. Der Versand erfolgt auf Gefahr des Käufers. Die Kontrolle der Waren, Qualität und Quantität, erfolgt bei Lieferung. Reklamationen werden nicht angenommen, wenn sie nicht zum Zeitpunkt der Lieferung auf dem Lieferschein oder auf der Rechnung aufgeführt und innerhalb von drei Tagen schriftlich bestätigt wurden.</p>
        <p>Für den Empfang in gutem Zustand: </p>
      </div>
    </textarea>
  </form>
</div>  
