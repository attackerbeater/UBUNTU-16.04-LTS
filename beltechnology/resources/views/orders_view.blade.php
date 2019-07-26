@extends('layouts.main')
@section('content')
<div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Order Information</h1> 
  </div>
  <div class="col-md-12">
    <div class="row pb-2 mb-3 border-bottom">
      <div class="col-md-6">
        <table class="table table-bordered_ table-striped table-responsive_" id="example">
          <tbody>
            <tr>
              <th class="text-nowrap" scope="row">Order Reference Number</th>
              <td>{{$orders[0]->order_reference_number}}</td>
            </tr>
            <tr>
              <th class="text-nowrap" scope="row">Order Date</th>
              <td>{{$orders[0]->created_at}}</td>
            </tr>
            <tr>
              <th class="text-nowrap" scope="row">Order Status</th>
              @if($orders[0]->order_status =='QUOTE RECEIVED')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">1. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'QUOTE REQUEST')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">2. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'ORDER DETAILS')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">3. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'QUOTE SUP RECEIVED')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">4. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'QUOTE SENT')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">5. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'QUOTE ACCEPTANCE')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">6. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'SEND CONFIRMATION TO SUPPLIER')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">7. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'UPLOAD CONFIRMATION SUPPLIER DOC')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">8. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'GENERATE CONFIRMATION TO CLIENT DOC')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">9. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'GOOD RECEIVED SUP')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">10. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'GOODS SENT')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">11. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'INVOICE SENT')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">12. {{$orders[0]->order_status}}</a>
              </td>
              @elseif($orders[0]->order_status == 'INVOICE PAID')
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">13. {{$orders[0]->order_status}}</a>
              </td>
              @else
              <td>
                <a href="#" class="order-view-edit_" data-type="text" data-column="order_status" data-url="{{url('/order/edit',['id'=>$orders[0]->id])}}" data-pk="{{$orders[0]->id}}" data-title="change" data-name="order_status">{{$orders[0]->order_status}}</a>
              </td>
              @endif
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-bordered_ table-striped table-responsive_">
          <tbody>
            <tr>
              <th class="text-nowrap-" scope="row">Client</th>
              <td><a href='{{url("/admin/kread/{$orders[0]->client_id}")}}'>{{$orders[0]->order_clients}}</a></td>
            </tr>
            <tr>
              <th class="text-nowrap" - scope="row">Supplier</th>
              
              @if(count($leveranciers )>0) 
              <td><a href='{{url("/admin/lread/{$leveranciers[0]->id}")}}'>{{$orders[0]->order_supplier}}</a></td>
              @endif
              <!-- inalis ko ang herf=value kasi ayaw gumana ng supplier id empty nag kaka error -->
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-12">  
    <div class="row pb-2 mb-3 border-bottom">
      <div class="col-md-12">
        <span class="title">Order Detail</span>
      </div>
    </div>
  </div>
  <div class="col-md-12">  
    <div class="row pb-2 border-bottom">
      <div class="col-md-6">
        <table class="table table-striped table-responsive_">
          <tbody>
            <tr>
              <th class="text-nowrap" scope="row">Transport Company</th>
              <td>{{$orders[0]->transport}}</td>
            </tr>
            <tr>
              <th class="text-nowrap" scope="row">Transport price</th>
              <td>{{$orders[0]->transport_price}}</td>
            </tr>
            <tr>
              <th class="text-nowrap" scope="row">Delivery Time</th>
              <td>{{$orders[0]->delivery_time}}</td>
            </tr>
            <tr>
              <th class="text-nowrap" scope="row">Subject</th>
              <td>{{$orders[0]->order_subject}}</td>
            </tr>          
          </tbody>
        </table>
      </div>
      <div class="col-md-6">
        <table class="table table-responsive table-striped" id="itemsordered">
          <thead>
            <th>Status</th>
            <th>Date</th>
            <th>PDF</th>
            <th></th>
          </thead>
          <tbody>
            @if (\Session::has('success'))
            <div class="alert alert-success">
              <ul>
                <li>{!! \Session::get('success') !!}</li>
              </ul>
            </div>
            @endif
            <!-- 1 -->
            @if($orders[0]->quote_request_sent_to_supplier)
            <tr>
              <td>2.QUOTE REQUEST SENT to SUPPLIER</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_quote_request_sent_to_supplier))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->quote_request_sent_to_supplier}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>        
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdelete-i" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->quote_request_sent_to_supplier}}" 
                data-column="quote_request_sent_to_supplier" 
                data-column-date="created_quote_request_sent_to_supplier" 
                onclick="pdfDeletei()">Delete pdf</a>
                <script>              
                function pdfDeletei() {
                  let dataId = document.getElementById("pdfdelete-i").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-i").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-i").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-i").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-i").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->quote_supplier_received)
            <tr>
              <td>3.QUOTE SUPPLIER RECEIVED</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_quote_supplier_received))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->quote_supplier_received}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-ii" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->quote_supplier_received}}" 
                data-column="quote_supplier_received" 
                data-column-date="created_quote_supplier_received" 
                onclick="pdfDeleteii()">Delete pdf</a>
                <script>              
                function pdfDeleteii() {
                  let dataId = document.getElementById("pdfdelete-ii").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-ii").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-ii").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-ii").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-ii").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
      
            <!-- 4 -->
            @if($orders[0]->quote_sent_to_client)
            <tr>
              <td>4.QUOTE SENT to CLIENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_quote_sent_to_client))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->quote_sent_to_client}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-iii" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->quote_sent_to_client}}" 
                data-column="quote_sent_to_client" 
                data-column-date="created_quote_sent_to_client" 
                onclick="pdfDeleteiii()">Delete pdf</a>
                <script>              
                function pdfDeleteiii() {
                  let dataId = document.getElementById("pdfdelete-iii").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-iii").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-iii").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-iii").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-iii").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>            
            @endif
            @if($orders[0]->quote_acceptance_from_client)
            <tr>
              <td>5.QUOTE ACCEPTANCE from CLIENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_quote_acceptance_from_client))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->quote_acceptance_from_client}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdelete-iv" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->quote_acceptance_from_client}}" 
                data-column="quote_acceptance_from_client" 
                data-column-date="created_quote_acceptance_from_client" 
                onclick="pdfDeleteiv()">Delete pdf</a>
                <script>
                function pdfDeleteiv() {
                  let dataId = document.getElementById("pdfdelete-iv").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-iv").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-iv").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-iv").getAttribute("data-column");  
                  let dataColumnDate = document.getElementById("pdfdelete-iv").getAttribute("data-column-date");                
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;                   
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->send_confirmation_to_supplier)
            <tr>
              <td>6.SEND CONFIRMATION TO SUPPLIER</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_send_confirmation_to_supplier))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->send_confirmation_to_supplier}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-vi" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->send_confirmation_to_supplier}}" 
                data-column="send_confirmation_to_supplier" 
                data-column-date="created_send_confirmation_to_supplier" 
                onclick="pdfDeletevi()">Delete pdf</a>
                <script>              
                function pdfDeletevi() {
                  let dataId = document.getElementById("pdfdelete-vi").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-vi").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-vi").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-vi").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-vi").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>            
            @endif          
            @if($orders[0]->upload_confirmation_supplier_doc)
            <tr>
              <td>7.UPLOAD CONFIRMATION SUPPLIER DOC</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_upload_confirmation_supplier_doc ))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->upload_confirmation_supplier_doc}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a><br/>    
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdelete-vii" 
                data-id="{{$orders[0]->id}}"
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->upload_confirmation_supplier_doc}}" 
                data-column="upload_confirmation_supplier_doc"
                data-column-date="created_upload_confirmation_supplier_doc"  
                onclick="pdfDeletevii()">Delete pdf</a>
                <script>
                function pdfDeletevii() {
                  let dataId = document.getElementById("pdfdelete-vii").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-vii").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-vii").getAttribute("data-pdf");    
                  let dataColumn = document.getElementById("pdfdelete-vii").getAttribute("data-column");  
                  let dataColumnDate = document.getElementById("pdfdelete-vii").getAttribute("data-column-date");                    
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;                     
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->generate_confirmation_to_client)
            <tr>
              <td>8.GENERATE CONFIRMATION TO CLIENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_generate_confirmation_to_client))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->generate_confirmation_to_client}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-viii" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->generate_confirmation_to_client}}" 
                data-column="generate_confirmation_to_client" 
                data-column-date="created_generate_confirmation_to_client" 
                onclick="pdfDeleteviii()">Delete pdf</a>
                <script>              
                function pdfDeleteviii() {
                  let dataId = document.getElementById("pdfdelete-viii").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-viii").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-viii").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-viii").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-viii").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>            
            @endif            
            @if($orders[0]->goods_received_from_client)
            <tr><!--   -->
              <td>8-1.GOODS RECEIVED from CLIENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_goods_received_from_client))}}</td>
              <td>              
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->goods_received_from_client}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a><br/>    
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdeleteviii1" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}"
                data-pdf="{{$orders[0]->goods_received_from_client}}" 
                data-column="goods_received_from_client" 
                data-column-date="created_goods_received_from_client"
                onclick="pdfDeleteiviii1()">Delete pdf</a>
                <script>
                function pdfDeleteiviii1() {
                  let dataId = document.getElementById("pdfdeleteviii1").getAttribute("data-id");
                  let dataClientid = document.getElementById("pdfdeleteviii1").getAttribute("data-clientid");  
                  let dataPdf = document.getElementById("pdfdeleteviii1").getAttribute("data-pdf");   
                  let dataColumn = document.getElementById("pdfdeleteviii1").getAttribute("data-column");
                  let dataColumnDate = document.getElementById("pdfdeleteviii1").getAttribute("data-column-date");                   
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;                  
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->goods_sent_from_supplier)
            <tr>
              <td>9.GOODS SENT from SUPPLIER</td> 
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_goods_sent_from_supplier))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->goods_sent_from_supplier}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a><br/>  
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdeleteviiii" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}"
                data-pdf="{{$orders[0]->goods_sent_from_supplier}}" 
                data-column="goods_sent_from_supplier" 
                data-column-date="created_goods_sent_from_supplier"
                onclick="pdfDeleteiviiii()">Delete pdf</a>
                <script>
                function pdfDeleteiviiii() {
                  let dataId = document.getElementById("pdfdeleteviiii").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdeleteviiii").getAttribute("data-clientid");
                  let dataPdf = document.getElementById("pdfdeleteviiii").getAttribute("data-pdf");   
                  let dataColumn = document.getElementById("pdfdeleteviiii").getAttribute("data-column");
                  let dataColumnDate = document.getElementById("pdfdeleteviiii").getAttribute("data-column-date");                       
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;                             
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->good_received_from_supplier)
            <tr>
              <td>10.GOOD RECEIVED from SUPPLIER</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_good_received_from_supplier))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->good_received_from_supplier}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a><br/>  
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdelete-v10" 
                data-id="{{$orders[0]->id}}"
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->good_received_from_supplier}}" 
                data-column="good_received_from_supplier" 
                data-column-date="created_good_received_from_supplier"
                onclick="pdfDeletev10()">Delete pdf</a>
                <script>
                function pdfDeletev10() {
                  let dataId = document.getElementById("pdfdelete-v10").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-v10").getAttribute("data-clientid");
                  let dataPdf = document.getElementById("pdfdelete-v10").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-v10").getAttribute("data-column"); 
                  let dataColumnDate = document.getElementById("pdfdelete-v10").getAttribute("data-column-date");                  
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;                   
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif      
            @if($orders[0]->goods_sent_to_client)      
            <tr>
              <td>11.GOODS SENT to CLIENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_goods_sent_to_client))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->goods_sent_to_client}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-11" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->goods_sent_to_client}}" 
                data-column="goods_sent_to_client" 
                data-column-date="created_goods_sent_to_client" 
                onclick="pdfDeletev11()">Delete pdf</a>
                <script>              
                function pdfDeletev11() {
                  let dataId = document.getElementById("pdfdelete-11").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-11").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-11").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-11").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-11").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>            
            @endif            
            @if($orders[0]->upload_delivery_document)
            <tr>
              <td>12.INVOICE RECEIVED</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_invoice_received))}}</td>
              <td>
                <a href="{{ url('/') }}/storage/supplier/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->upload_delivery_document}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a><br/>  
              </td>
              <td>
                <a href="javascript::void(0)" 
                id="pdfdelete-v12" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}"
                data-pdf="{{$orders[0]->upload_delivery_document}}" 
                data-column="upload_delivery_document" 
                data-column-date="created_invoice_received"
                onclick="pdfDeletev12()">Delete pdf</a>
                <script>
                function pdfDeletev12() {
                  let dataId = document.getElementById("pdfdelete-v12").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-v12").getAttribute("data-clientid");
                  let dataPdf = document.getElementById("pdfdelete-v12").getAttribute("data-pdf");                     
                  let dataColumn = document.getElementById("pdfdelete-v12").getAttribute("data-column");    
                  let dataColumnDate = document.getElementById("pdfdelete-v12").getAttribute("data-column-date");   
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/supplier/'+dataColumn+'/'+dataColumnDate;  
                  else
                  return false;
                }
                </script>
              </td>
            </tr>
            @endif
            @if($orders[0]->invoice_sent)      
            <tr>
              <td>13.INVOICE SENT</td>
              <td>{{date('Y-m-d h:i:s A', strtotime($orders[0]->created_invoice_sent))}}</td>
              <td>                
                <a href="{{ url('/') }}/storage/client/{{$orders[0]->id}}-{{$orders[0]->client_id}}/{{$orders[0]->invoice_sent}}" target="_blank">
                  <img width="20" src="{{ asset('storage/if_pdf_3745.png') }}" />
                </a>                
              </td>
              <td>            
                <a href="javascript::void(0)" 
                id="pdfdelete-13" 
                data-id="{{$orders[0]->id}}" 
                data-clientid="{{$orders[0]->client_id}}" 
                data-pdf="{{$orders[0]->invoice_sent}}" 
                data-column="invoice_sent" 
                data-column-date="created_invoice_sent" 
                onclick="pdfDeletev13()">Delete pdf</a>
                <script>              
                function pdfDeletev13() {
                  let dataId = document.getElementById("pdfdelete-13").getAttribute("data-id"); 
                  let dataClientid = document.getElementById("pdfdelete-13").getAttribute("data-clientid"); 
                  let dataPdf = document.getElementById("pdfdelete-13").getAttribute("data-pdf");     
                  let dataColumn = document.getElementById("pdfdelete-13").getAttribute("data-column");   
                  let dataColumnDate = document.getElementById("pdfdelete-13").getAttribute("data-column-date");                     
                  if (confirm("Do you really want to delete pdf?"))
                  window.location.href = "{{url('/')}}/admin/unlinkPdf/"+dataId+'/'+dataClientid+'/'+dataPdf+'/client/'+dataColumn+'/'+dataColumnDate;      
                  else
                  return false;
                }
                </script>
              </td>
            </tr>            
            @endif  
                          
          </tbody>
        </table>        
      </div>      
    </div>
  </div>
  <div class="col-md-12">    
    <div class="row pb-2 mb-3 border-bottom">
      <div class="col-md-12">
        <span class="title">Items Ordered</span>
      </div>
    </div>
    <div class="row pb-2 mb-3 border-bottom">
      <div class="col-md-12">
        <table class="table table-striped table-responsive_" id="items-ordered">
          <thead>
            <th>Product</th>
            <th>Amount</th>
            <th>Price</th>
          </thead>
          <tbody>
            <?php foreach ($products as $key => $value)  :?>
              <tr>
                <td>
                  <p>
                    <span >
                      <span >{{ $value['order_product']  }}&nbsp;</span>
                    </span>
                    <!-- &Oslash;&nbsp; {{ $value['order_dimensionweight'] }} -->
                  </p>
                </td>
                <td>
                  <p>{{ $value['order_amount'] }}</p>
                </td>                
                <td>
                  <?php
                  if(!empty($value['order_treatment'])) :
                    $order_treatment = $value['order_treatment'];
                    $order_treatment_details = $value['order_treatment_details'];
                    $op = $order_treatment_price = $value['order_treatment_price'];
            
                    $i = 0;
                    $p = [];
                    foreach ($order_treatment as $key1 => $value1):
                      $c = $i++ + 1;     
                      $p[] = $order_treatment_price[$key1];      
                    
                    endforeach;
            
                    ?>
                    <p>{{number_format(array_sum($p),2 )}} &euro;&nbsp; &nbsp; &nbsp;</p>
                    <?php 
                  endif;
                  ?>
                </td>               
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection
