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
            <td style="width:85px"></td>
            <td style="width:406px">
              <p style="margin-left: 40px;">Your order number {{ $client[0]->company_number }}&nbsp;of {{ date('d/m/Y') }} at {{ $client[0]->company_name }}</p>
              <p style="margin-left: 40px;">We would like to thank you for your order and provide you with the order confirmation. We will provide the delivery according to specifications below and within the agreed delivery period at {{ $supplier[0]->supplier_city }}</p>
              <p style="margin-left: 40px;">{{ $order[0]->order_subject }}</p>
            </td>
            <td></td>
            <td></td>
            <tr></tr>
            <td>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <p style="text-align: center;">{{$newArr[$i]['order_amount']}}</p>
              @endfor
            </td>
            <td>
              <div style="margin-left: 40px;">
                <p>Product description : {{ $order[0]->order_details }}</p>
                @for ($i=0; $i < count($newArr); $i++)
                <p>{{$newArr[$i]['order_product']}}</p>
                @endfor
              </div>
            </td>
            <td>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <p style="text-align: right;">{{array_sum($newArr[$i]['order_treatment_price'])}}&nbsp;&nbsp; &nbsp; </p>
              @endfor
            </td>
            <td>
              <?php $total = 0; ?>
              <p>&nbsp;</p>
              @for ($i=0; $i < count($newArr); $i++)
              <?php $pxam = $newArr[$i]['order_amount'] * array_sum($newArr[$i]['order_treatment_price']); ?>
              <?php $total += $pxam; ?>
              <p style="text-align: right;">{{$pxam}}&nbsp;&euro;&nbsp;&nbsp; </p>
              @endfor
            </td>
          </tr><tr>
            <td></td>
            <td>
              <p style="margin-left: 40px;">Delivery: From factory, conditions in attachment.</p>
            </td>
            <td style="width:114px"></td>
            <td style="width:114px"> </td>
          </tr><tr>
            <td></td>
            <td>
              <p style="margin-left: 40px;">This order has been carefully determined by us and the information you provide. If you want to report inaccuracies immediately, so this order confirmation may need to be adjusted.</p>
              <p style="margin-left: 40px;">Thank you for your order and confidence</p>
              <p style="margin-left: 40px;">Total cost are exlusive transportation costs</p>
            </td>
            <td style="width:114px"></td>
            <td style="width:114px"> </td>
          </tr><tr>
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
