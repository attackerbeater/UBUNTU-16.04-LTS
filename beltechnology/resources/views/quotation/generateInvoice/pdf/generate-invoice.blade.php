 <?php 

$order_products = explode(',',$orders['order_product']);
$amounts = explode(',',$orders['order_amount']);
$prices = explode(',',$orders['order_price']);
$order_dimensionweights = explode(',',$orders['order_dimensionweight']);
$order_materials = explode(',',$orders['order_material']);
$order_prices = explode(',', $orders['order_price']);
$order_technical_drawingreferences = explode(',', $orders['order_technical_drawingreference']);


$dataorder = [];
foreach ($order_products as $key => $product) {
    if($product){
        $dataorder[$key]['product'] = $product;
    } 
    
    
}  
foreach ($amounts as $key => $amount) {
    if($amount){
        $dataorder[$key]['amount'] = $amount;
    }                              
}  
foreach ($prices as $key => $price) {
    if($price){
        $dataorder[$key]['price'] = $price;
    }                              
}  
foreach ($order_dimensionweights as $key => $order_dimensionweight) {
    if($order_dimensionweight){
        $dataorder[$key]['dimensionweight'] = $order_dimensionweight;
    }                        
}  
foreach ($order_materials as $key => $order_material) {
    if($order_material){
        $dataorder[$key]['material'] = $order_material;
    }                       
}  
foreach ($order_prices as $key => $order_price) {
    if($order_price){
        $dataorder[$key]['price'] = $order_price;
    }                          
}  
foreach ($order_technical_drawingreferences as $key => $order_technical_drawingreference) {

    if($order_technical_drawingreference){
        $dataorder[$key]['technical_drawingreference'] = $order_technical_drawingreference;
    }                           
}  

$transport_price = $orders['transport_price'] ?  $orders['transport_price']: '00.0';

$ordered = DB::table('orders')->select('*')->where('id', $id)->get();

$datas = [];  

$order_product = $ordered[0]->order_product;
$datas['order_product'] = $order_product;    

$order_amount = $ordered[0]->order_amount;
$datas['order_amount'] = $order_amount;

$order_material = $ordered[0]->order_material;
$datas['order_material'] = $order_material;

$order_dimensionweight = $ordered[0]->order_dimensionweight;
$datas['order_dimensionweight'] = $order_dimensionweight;

$order_technical_drawingreference = $ordered[0]->order_technical_drawingreference;
$datas['order_technical_drawingreference'] = $order_technical_drawingreference;

$order_treatment = json_decode($ordered[0]->order_treatment);
$datas['order_treatment'] = $order_treatment;

$order_treatment_details = json_decode($ordered[0]->order_treatment_details);
$datas['order_treatment_details'] = $order_treatment_details;

$order_treatment_price = json_decode($ordered[0]->order_treatment_price);
$datas['order_treatment_price'] = $order_treatment_price;


$arr = [];
foreach (json_decode(json_encode($datas), true) as $key => $value) {

    if(is_array($value)){
        $arr[$key] = $value;
    }else{
        $arr[$key] = explode(',',$value);
    }

}

$newArr = [];

$newArr = [];
foreach ($arr as $key => $value) {

    if($key == 'order_product'){

        for ($i=0; $i < count($value); $i++) { 
            $newArr[]['order_product'] = $value[$i];
        }

    }
}        

foreach ($arr as $key => $value) {    

    if($key == 'order_amount'){

        for ($i=0; $i < count($value); $i++) {                     
            $newArr[$i]['order_amount'] = $value[$i];
        }

    }
}

foreach ($arr as $key => $value) {  

    if($key == 'order_material'){

        for ($i=0; $i < count($value); $i++) {                     
            $newArr[$i]['order_material'] = $value[$i];
        }

    }
}            

foreach ($arr as $key => $value) {      

    if($key == 'order_dimensionweight'){

        for ($i=0; $i < count($value); $i++) {                     
            $newArr[$i]['order_dimensionweight'] = $value[$i];
        }

    }

}            

foreach ($arr as $key => $value) {      

    if($key == 'order_technical_drawingreference'){

        for ($i=0; $i < count($value); $i++) {                     
            $newArr[$i]['order_technical_drawingreference'] = $value[$i];
        }

    }

}         
foreach ($arr as $key => $value) {   

    if($key == 'order_treatment'){                        

        foreach ($value as $key => $value) {
            $product_name = $key;              
            $key = array_search($product_name, array_column($newArr, 'order_product'));
            $newArr[$key]['order_treatment'] = $value;    
                                  
        }         
    }
}

foreach ($arr as $key => $value) {   

    if($key == 'order_treatment_details'){                         

        foreach ($value as $key => $value) {
            $product_name = $key;              
            $key = array_search($product_name, array_column($newArr, 'order_product'));
            $newArr[$key]['order_treatment_details'] = $value;                 
        }            
    }
}

foreach ($arr as $key => $value) {   

    if($key == 'order_treatment_price'){                         

        foreach ($value as $key => $value) {
            $product_name = $key;              
            $key = array_search($key, array_column($newArr, 'order_product'));
            $newArr[$key]['order_treatment_price'] = $value;                 
        }            
    }
}
?>
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
                <li class="nav-item" style="display:none;">
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
  

                      <textarea class="ckeditor en" name="editor" id="editor-en" frameborder="0px">                   
                             
                        <table style="width:100%;">
                            <thead>
                                <tr><td><p><img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="height:66px; width:250px" /></p></td></tr>
                            </thead>
                         <!--    <tfoot>
                                <tr>
                                  <td>
                                    
                                   

                                    Best regards<br/>

                                    <strong>BEL-TEC</strong>HNOLOGIES SA.<br/>

                                    Peter van Belle</p>
                                  </td>
                                </tr>
                            </tfoot> -->
                            <tbody>
                              <!-- 500 more rows -->  
                              <tr>
                                <td id="content"> 

                                  <p>&nbsp;</p>

                                  <table style="width:100%" border="0" cellpadding="0" cellspacing="0">

                                    <div class="">
                                      <p style="margin-left:3.75in;"><strong><span style="font-family:tahoma,sans-serif;">{{strtoupper($orders['company_name'])}}</span></strong></p>
                                      <p style="margin-left:3.75in;"><u><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Attn. of</span></span></u>&nbsp;&nbsp;<u><span style="font-family:tahoma,sans-serif;"><span style="font-size:9.5pt;">Accounting Dept.</span></span></u><br />
                                      <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_street']}},{{$orders['company_number']}}</span></span></strong><br />
                                      <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_zip']}},{{$orders['company_city']}}</span></span></strong><br />
                                      <strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{$orders['company_country']}}</span></span></strong></p>

                                      <p style="margin-left:3.75in;">&nbsp;</p>

                                      <p>
                                        <strong>
                                          <span style="font-family:tahoma,sans-serif;">
                                            <span style="font-size:16.0pt;">INVOICE</span>
                                          </span>
                                        </strong>                        
                                      </p>  
                                    </div>
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

                                      <!-- separator -->
                                      <tr>
                                        <td style="width:87px;height:27px; "></td>
                                        <td colspan="2" style="width:407px;height:27px; "></td>
                                        <td style="width:113px;height:27px; "> </td>
                                        <td style="width:87px;height:27px; "></td>
                                      </tr>
                                      <!-- /. separator -->
                             
                                      <tr>

                                        <td style="width:87px;height:27px; ">
                                          <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">QTY.</span></span></strong></p>
                                        </td>
                                        <td colspan="2" style="width:407px;height:27px; ">
                                          <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">DESCRIPTION</span></span></strong></p>
                                        </td>
                                        <td style="width:113px;height:27px; ">
                                          <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">COSTS PER PIECE</span></span></strong></p>
                                        </td>                              
                                        <td style="width:87px;height:27px; ">
                                         <p style="text-align: center;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTALPRICE</span></span></strong></p>
                                        </td>                    
                                      </tr>

                                      <tr>
                                        <td style="width:87px;height:27px; "></td>
                                        <td colspan="2" style="width:407px;height:27px; ">
                                          <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Your order {{$orders['order_reference_number']}} dated {{date('d/m/Y')}} for {{$orders['order_subject']}}&nbsp;</span></span></p>
                                        </td>
                                        <td style="width:113px;height:27px; "></td>
                                        <td style="width:87px;height:27px; "></td>
                                        
                                      </tr>   

                                      <?php foreach ($newArr as $key => $value)  :?>
                                     
                                      <tr>                                
                                        <td style="width:87px;height:27px; ">
                                          <p style="text-align: center;">{{ $value['order_amount'] }}</p>
                                        </td>
                                        <td colspan="2" style="width:407px;height:27px; ">
                                          <p style="margin-left: 9pt;">
                                            <span style="font-family:tahoma,sans-serif;">
                                              <span style="font-size:10.0pt;">{{ $value['order_product']  }}&nbsp;</span>
                                            </span>&Oslash;&nbsp; {{ $value['order_dimensionweight'] }}
                                          </p>
                                        </td>
                                        <td style="width:113px;height:27px; ">                               
                                       
                                              <?php
                                              if(!empty($value['order_treatment'])) : 

                                                  $order_treatment = $value['order_treatment'];
                                                  $order_treatment_details = $value['order_treatment_details'];
                                                  $order_treatment_price = $value['order_treatment_price'];
                                                  $i = 0;
                                                  foreach ($order_treatment as $key1 => $value1):
                                                    $c = $i++ + 1; 
                                                    // $number = 1234.56;
                                                    // setlocale(LC_MONETARY,"en_US");
                                                    // echo money_format("The price is %i", $number);
                                                    ?>

                                                    <p style="text-align: right;"><?php echo (count($order_treatment_price[$key1]) > 0)? $order_treatment_price[$key1]: '00.0'; ?> &euro;&nbsp; &nbsp; &nbsp;</p>
                                                    <?php

                                                  endforeach;
                                              endif;
                                              ?>                                    
                                      
                                        </td>
                                        <td style="width:87px;height:27px; ">
                                          <?php $_order_amount = explode(',', $orders['order_amount']); ?>                            
                                          <?php $total = 0; ?>                                    
                                          
                                

                                              <?php
                                              if(!empty($value['order_treatment'])) : 

                                                  $price= [];                                       

                                                  $order_treatment = $value['order_treatment'];
                                                  $order_treatment_details = $value['order_treatment_details'];
                                                  $order_treatment_price = $value['order_treatment_price'];
                                                  $i = 0;
                                                  foreach ($order_treatment as $key1 => $value1):
                                                    $c = $i++ + 1;
                                                    $price[] = $order_treatment_price[$key1]; ?>                                            
                                                    
                                                  <?php
                                                  endforeach;

                                                  $price_sum = array_sum($price);
                                                  $total +=$price_sum; 
                                                  ?>
                                                  <p style="text-align: right;">
                                                    <span style="font-family:tahoma,sans-serif;">
                                                      <span style="font-size:10.0pt;">{{ str_replace('.', ',', number_format( array_sum($price), 2)) }}&nbsp;</span>
                                                    </span>&euro;&nbsp; &nbsp;
                                                  </p> 
                                                  <?php 
                                              endif;
                                              ?>
                                          
                                        </td>                            
                                      </tr>
                                      <?php endforeach; ?>

                                      <tr>
                                        <td style="width:87px;height:27px; "></td>
                                        <td colspan="2" style="width:407px;height:27px; ">
                                          <p style="margin-left: 9pt;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Transport &amp; Packaging TNT</span></span></p>
                                        </td>
                                        <td style="width:113px;height:27px; "></td>
                                        <td style="width:87px;height:27px; ">
                                    
                                          @if($transport_price)
                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ str_replace('.', ',', number_format($transport_price,2))}}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                          @else
                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ str_replace('.', ',', number_format(0,2)) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
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
                                        <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">Subtotal&nbsp; &nbsp; &nbsp;</span></span></p>
                                        </td>
                                        <td colspan="2" style="width:115px;height:5px; ">
                                          @if($total)
                                            @if($transport_price)
                                              <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ str_replace('.', ',', number_format($transport_price + $total,2)) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
                                            @else
                                              <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">&nbsp; {{ str_replace('.', ',', number_format($total,2)) }}&nbsp;</span></span>&euro;&nbsp; &nbsp;</p>
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

                                        <td style="width:113px;height:5px; ">
                                        <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">V.A.T. {{$percentage}}%&nbsp; &nbsp;</span></span></p>
                                        </td>
                                        <td colspan="2" style="width:115px;height:5px; ">
                                          @if($total_vat > 0)                                       
                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ str_replace('.', ',', number_format($total_vat,2)) }}  &euro; &nbsp;</span></span></p>                          
                                          @else                                  
                                            <p style="text-align: right;"><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">{{ str_replace('.', ',', number_format($total_vat,2)) }}  &euro; &nbsp;</span></span></p>  
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
                                               <p style="margin-left: 48pt; text-align: right;"><strong><span style="font-family:tahoma,sans-serif;"><span style="font-size:10.0pt;">TOTAL&nbsp; &nbsp;&nbsp;</span></span></strong></p>
                                        </td>
                                        <td colspan="2" style="width:115px;height:26px;">

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
                                </td>
                              </tr>
                            </tbody>
                        </table>
                        <style type="text/css">
                          @media print {
                              #content:after {
                                display: block;
                                content: "";
                                margin-bottom: 594mm;  larger than largest paper size you support 
                              }
                              body
                              {
                                padding: 1px;
                                margin: 0;
                                background-color: #ffffff;
                              }
                          }  

                        </style>
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
