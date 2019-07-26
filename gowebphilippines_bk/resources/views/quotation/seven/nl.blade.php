<div id="nl">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden"  name="filename" value="generate_confirmation_to_client" />
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
          <p style="margin-left: 80px;">Attn Dhr. {{$client[0]->contact_first_name}} {{$client[0]->contact_lastname}}<br />
            {{$client[0]->company_street}}<br />
            {{$client[0]->company_city}}&nbsp;{{$client[0]->company_zip}}<br />
            <strong>{{$client[0]->company_country}}</strong>
          </p>
        </div>   
      </div>     
      <div style="clear:both;"></div> 
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
          </tr><tr>
            <td style="width:85px"></td>
            <td style="width:406px">
              <p style="margin-left: 40px;">Uw order nr.{{ $client[0]->company_number }}&nbsp;van {{ date('d/m/Y') }} à {{ $client[0]->company_name }}</p>
              <p style="margin-left: 40px;">Onder dankzegging voor uw bestelling doen wij u hierbij de orderbevestiging toekomen. Wij zullen de levering volgens onderstaande specificatie en op de afgesproken leverdatum gereed hebben te {{ $supplier[0]->supplier_city }}</p>
              <!-- <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p> -->
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </td>
            <td></td>
            <td></td>
            <tr></tr>
            <td>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <p style="text-align: center;">{{$newArr[$i]['order_amount']}}</p>
              @endfor
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </td>
            <td>
              <div style="margin-left: 40px;">
                <p>Artikelomschr.:  {{ $order[0]->order_details }}</p>
                @for ($i=0; $i < count($newArr); $i++)
                <p>{{$newArr[$i]['order_product']}}</p>
                @endfor
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </div>
            </td>
            <td>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <p style="text-align: right;">{{array_sum($newArr[$i]['order_treatment_price'])}}&nbsp;&nbsp; &nbsp; </p>
              @endfor
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </td>
            <td>
              <?php $total = 0; ?>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <?php $pxam = $newArr[$i]['order_amount'] * array_sum($newArr[$i]['order_treatment_price']); ?>
              <?php $total += $pxam; ?>
              <p style="text-align: right;">{{$pxam}}&nbsp;&euro;&nbsp;&nbsp; </p>
              @endfor
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </td>
          </tr><tr>
            
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
      <p>Levering : af fabriek, conform bijlage leveringsvoorwaarden. Betaling : binnen 30 dagen netto.</p>
      <p>Deze order is met zorg door ons en de door u verstrekte gegevens vastgesteld. Wilt u eventuele onjuistheden ons direct melden, zodat deze orderbevestiging mogelijk aangepast dient te worden.</p>
      <p>Bedankt voor Uw opdracht.</p>
      <p>Transport H/T ten Uwe l</p>
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
