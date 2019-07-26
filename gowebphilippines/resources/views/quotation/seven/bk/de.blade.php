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
