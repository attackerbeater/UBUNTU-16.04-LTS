<div id="en">
  <form method="post" action="{{url('vendor/unisharp/laravel-ckeditor/process.php')}}">
    
    <input type="hidden" name="order_id" value="{{$orders['id']}}" />
    <input type="hidden" name="filename" value="goods-sent-to-client" />
    <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />
    <input type="hidden" name="transaction_type" value="client" />
    
    <textarea class="ckeditor" name="editor" id="editor-en">
      <p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p>
      <div>
        <div>
          <div>
            <p><strong>BEL-TECH</strong>NOLOGIES nv/sa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <br /> Rapaartakkerlaan 17 -19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <br /> B-9OBO Lochristi I Belgium&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <br /> Tel . +32 (O)g 355 24 41&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <br /> Fax +32 (O)g 355 83 30&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_name'] }}</strong><br/>
              <br /> Gsm +32 (0)475 24 12 OB&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Attn. MR. {{ $orders['contact_first_name'] }} {{ $orders['contact_lastname'] }}
              <br /> e-mail : info @ bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{ $orders['company_street'] }}
              <br /> URL: www.bel-tec.be&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; {{ $orders['company_zip'] }} {{ $orders['company_city'] }}
              <br /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>{{ $orders['company_country'] }}</strong></p>
            </p>
          </div>
        </div>
      </div>
      
      <div>
        <p><span style="font-size:24px;"><strong>DELIVERY NOTE:</strong></span></p>
        <table id="first-table" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td style="width:76px">
                <p style="text-align:center"><strong>DATE</strong></p>
              </td>
              <td style="width:123px">
                <p style="text-align:center"><strong>VAT-NUMBER</strong></p>
              </td>
              <td style="width:142px">
                <p style="text-align:center"><strong>DOC.NUMBER</strong></p>
              </td>
              <td style="width:142px">
                <p style="text-align:center"><strong>CUSTOMER NMBR</strong></p>
              </td>
              <td style="width:151px">
                <p style="text-align:center"><strong>TRANSPORT MODE</strong></p>
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
                <p style="text-align:center"><strong>Amount</strong></p>
              </td>
              <td style="height:26px; width:340px">
                <p style="text-align:center"><strong>DESCRIPTION</strong></p>
              </td>
              <td style="height:26px; width:91px">
                <p style="text-align:center"><strong>PARTS IN</strong></p>
              </td>
              <td style="height:26px; width:126px">
                <p style="text-align:center"><strong>TOTAL OUT</strong></p>
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
                <p style="margin-left:40px">Your order Nr. {{ $orders['order_number_from_client'] }} &nbsp;dated {{ date('d/m/Y') }}&nbsp;</p>
                
                <p style="margin-left:40px">For the {{ $orders['order_subject'] }}</p>
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
        
        <p>Intra-Community supply</p>
        
        <p>The Parties explicitly agree that their contractual relations are governed exclusively by these general terms and conditions of sale. The goods are shipped at the risk of the buyer. The control of the goods, quality and quantity, happens upon delivery. Complaints will not be accepted if they were not listed on the delivery note or on the invoice at the time of delivery, and confirmed in writing within three days.</p>
        
        <p>For reception in good condition :</p>
      </div>
      
    </textarea> <!-- CKEditor  !-->
  </form>
</div>
