<form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden" name="filename" value="invoice_sent" /> 
    <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
    <input type="hidden" name="transaction_type" value="client" />                       
    <textarea cols="80" class="ckeditor" name="editor" id="editor" rows="10">
      <div id="get_file">
        <p><img alt="" src="{{url('assets/images/BELTEC-logo.png')}}" style="height:66px; width:250px" /></p>
        <p style="margin-left:3.75in" key="home"><strong>{{ $orders['company_name'] }}</strong>
            <br />
            <p style="margin-left:3.75in">
                <br />
                <u>{{ $orders['contact_person_first_name'] }}</u>
                <br />
                <strong>{{ $orders['company_street'] }},{{ $orders['company_number'] }}<br />
                  {{ $orders['company_zip'] }},{{ $orders['company_city'] }}</strong>
                <br />
                <strong><strong>{{ $orders['company_country'] }}  </strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
            <p style="margin-left:3.75in">&nbsp;&nbsp;</p>
            <p><strong><span style="font-size:18px"><strong>INVOICE</strong></span>
                </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
            <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                        <th style="width:95px">
                            <p style="text-align: center;">DATE</p>
                        </th>
                        <th style="width:132px">
                            <p style="text-align: center;">CUSTOMER&nbsp; V.A.T.-number</p>
                        </th>
                        <th style="width:113px">
                            <p style="text-align: center;">Invoice number</p>
                        </th>
                        <th style="width:142px">
                            <p style="text-align: center;">Customer Number</p>
                        </th>
                        <th style="width:1px">
                            <p style="text-align: center;">Payment CONDITIONS</p>
                        </th>
                    </tr>
                    <tr>
                        <td style="height:55px; width:95px">
                            <p style="text-align: center;">{{ date('d/m/y') }}&nbsp;</p>
                        </td>
                        <td style="height:55px; width:132px">
                            <p style="text-align: center;">{{ $orders['vn'] }}&nbsp;</p>
                        </td>
                        <td style="height:55px; width:113px">
                            <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4) }}</p>
                        </td>
                        <td style="height:55px; width:142px">
                            <p style="text-align:center">&nbsp;</p>
                            <p style="text-align: center;">{{ substr($orders['order_reference_number'], 4, -5) }}</p>
                            <p style="text-align: center;">&nbsp;</p>
                        </td>
                        <td style="height:55px; width:236px">
                            <p style="text-align: center;">Our terms are NET 30 days from date of invoice. DATE OF PAYMENT 09/12/2017</p>
                            <p style="text-align: center;">&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>
            <table id="second-table" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                    <tr>
                      <th colspan="3" style="width:85px">
                          <p style="text-align: center;">Qty.</p>
                      </th>
                      <th style="width:406px">
                          <p style="text-align: center;">Description</p>
                      </th>
                      <th style="width:114px">
                          <p>&nbsp; &nbsp;Costs per piece</p>
                      </th>
                      <th style="width:114px">
                          <p style="text-align: center;">Total price</p>
                      </th>
                    </tr>
                    <tr>
                        <td colspan="3" style="height:32px; width:85px">
                            <p style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        </td>
                        <td style="height:32px; width:406px">
                            <p style="text-align: center;">&nbsp; Your order {{ $orders['order_reference_number'] }}&nbsp; dated {{ $orders['created_at'] }}&nbsp;&nbsp; for &nbsp;{{ $orders['order_subject'] }}</p>
                            <p>&nbsp;</p>
                        </td>
                        <td style="height:32px; width:114px">
                            <p>&nbsp;</p>
                        </td>
                        <td style="height:32px; width:114px">
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <?php $amount = explode(',',$orders['order_amount']); ?>
                    <?php $price = explode(',',$orders['order_price']); ?>
                    <?php $total = 0; ?>
                    @foreach(explode(',',$orders['order_product']) as $key => $product)
                    <?php $subtotal = $price[$key] * $amount[$key]; ?>
                    <?php $total += $subtotal; ?>
                  <tr>
                      <td colspan="3" style="height:32px; width:85px">
                          @if($amount[$key])
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ number_format($amount[$key],2) }}</p>
                          @else
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                          @endif
                      </td>
                      <td style="height:32px; width:406px">
                          <p style="text-align: center;">&nbsp;{{ $product }}</p>
                      </td>
                      <td style="height:32px; width:114px">
                          @if($price[$key])
                            <p style="text-align: center;">&nbsp;{{ number_format($price[$key],2) }} &euro;</p>
                          @else
                            <p style="text-align: center;">&nbsp;00.00 &euro;</p>
                          @endif  
                      </td>
                      <td style="height:32px; width:114px">
                          <p style="text-align: center;">&nbsp;{{ number_format($amount[$key]*$price[$key],2) }} &euro;</p>
                      </td>
                  </tr>
                  @endforeach
                  <tr>
                      <td colspan="3" style="height:32px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:32px; width:406px">
                          <p>&nbsp;</p>
                      </td>
                      <td style="height:32px; width:114px">
                          <p>&nbsp;</p>
                      </td>
                      <td style="height:32px; width:114px">
                          <p>&nbsp;</p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="3" style="height:5px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:5px; width:406px">
                          <p>&nbsp;</p>
                      </td>
                      <td style="height:5px; width:114px">
                          <p>&nbsp;</p>
                      </td>
                      <td style="height:5px; width:114px">
                          <p>&nbsp;</p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="3" style="height:32px; width:85px">
                          <p>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:32px; width:406px">
                          <p style="text-align: center;">&nbsp;Transport &amp; Packaging TNT</p>
                      </td>
                      <td style="height:32px; width:114px">
                          <p>&nbsp;</p>
                      </td>
                      <td style="height:32px; width:114px">
                        @if($orders['transport_price'])
                          <p style="text-align: center;">{{ $orders['transport_price'] }} &euro;</p>
                        @else
                          <p style="text-align: center;">00.00 &euro;</p>
                        @endif  
                      </td>
                  </tr>
                  <tr>
                      <td colspan="3" style="height:5px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:5px; width:406px">
                          <p>&nbsp;</p>
                      </td>
                      <th style="height:5px; width:114px">
                          <p style="text-align: right;">Subtotal &nbsp;</p>
                      </th>
                      <td style="height:5px; width:114px">
                          @if($total)
                            <p style="text-align: center;"> {{ number_format($total,2) }} &euro; </p>
                          @else
                            <p style="text-align: center;"> 00.00 &euro; </p>
                          @endif  
                      </td>
                  </tr>
                  <?php $percentage = (ucfirst(strtolower($orders['company_country'])) =="Belgium")? 21: 0; ?>
                  <?php $total_vat = ($percentage / 100) * $total; ?>
                  <tr>
                      <td colspan="3" style="height:5px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:5px; width:406px">
                          <p>&nbsp;</p>
                      </td>
                      <th style="height:5px; width:114px">
                          <p style="text-align: right;">V.A.T. {{$percentage}}/% &nbsp;</p>
                      </th>
                      <td style="height:5px; width:114px">
                           <p style="text-align: center;">{{ number_format($total_vat,2) }}</p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="3" style="height:5px; width:85px">
                          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                      </td>
                      <td style="height:5px; width:406px">
                          <p>&nbsp;</p>
                      </td>
                      <th style="height:5px; width:114px">
                          <p style="text-align: right;">TOTAL &nbsp;</p>
                      </th>
                      <td style="height:5px; width:114px">
                          @if($orders['transport_price'])  
                            <p style="text-align: center;"><strong>{{ number_format($total + $total_vat,2) }} &euro;</strong></p>
                          @else
                            <p style="text-align: center;"><strong>00.00 &euro;</strong></p>
                          @endif  
                      </td>
                  </tr>
                </tbody>
            </table>
            <div>
                <div>
                    <div>
                        <p>Act is not subject to Belgian VAT/BTW. Art. 21 &sect;2 WBTW. BTW/VAT to be honnored by the Contractor Art. 51 WBTW- &nbsp;Art.44 and Art.196 of the European VAT/BTW-Directives &nbsp;- &nbsp;B2B-Rule.</p>
                    </div>
                </div>
            </div>
            <p><strong>Please make payment of this invoice free of costs on our Bankaccount at the<br />
                  KBC-Bank &nbsp; &nbsp; IBAN BE69 4428 6426 5178</strong>
                <br /> Address : &nbsp;KBC-KREDIETBANK NV. &nbsp; &nbsp; Kerkstraat, 57 &nbsp; &nbsp;B-9200 &nbsp;Dendermonde &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; Swift &nbsp;: &nbsp;KREDBEBB</p>
            <p><strong><span style="font-size:10px">The parties agree expressly that these general conditions govern their contractual exclusion of all others. The goods travel at the risk and peril of the recipient. The verification of the goods, quantity and quality, should be at the front desk. No claim shall be taken into account, if it has not been noted in writing on the note to send or on the invoice at the time of delivery, and confirmed in writing within three days</span></strong>
                <br /> &nbsp;
            </p>
            <p><strong>&nbsp;</strong></p>
            <p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></p>
            <p><strong>&nbsp;</strong></p>
            <p><strong>&nbsp;</strong></p>
      </div>    
    </textarea>
    <!-- CKEditor  !-->
</form>
