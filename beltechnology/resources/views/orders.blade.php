@extends('layouts.main')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">

    <h1 class="h2">Manage Orders</h1>

    <div id="here"></div>

    <div class="btn-toolbar mb-2 mb-md-0">

      <div class="btn-group mr-2">

        <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" id="new-order" data-target=".new-order">New Order</button>

      </div>

    </div>

  </div>

  <div class="table-responsive">

    <table id="orders" class="display table table-striped table-sm" cellspacing="0" width="100%">

      <thead>

        <tr>

          <th>Order Reference Number</th>

          <th>Client</th>

          <th>Status</th>

          <th>Counter</th>

          <th>Sort</th>

          <th></th>

        </tr>

      </thead>

      <tfoot>

        <tr>

          <th>Order Reference Number</th>

          <th>Client</th>

          <th>Status</th>

          <th>Counter</th>

          <th>Sort</th>

          <th></th>

        </tr>

      </tfoot>

      <?php

      $array_clients = [];

      foreach ($client_names as $k => $client_name)

      {

        $array_clients['client_names'][$k] = $client_name;

      }

      foreach ($client_ids as $k => $client_id)

      {

        $array_clients['client_ids'][$k] = $client_id;

      }

      $exclusivity_status = [0 => 'No', 1 => 'Yes'];

      ?>

      <tbody>

        @if(count($orders) > 0)

        @foreach($orders as $list)

        <?php

        $currentid[] = $list->id;

        $data = explode(',', $list->order_status);

        $r = explode('/', $list->order_reference_number);

        $refnum = implode('-', $r);

        $data = explode(',', $list->order_status);

        ?>

        <tr id="{{$list->id}}">

          <td>{{$list->order_reference_number}}</td>

          <td>{{$list->order_clients}}</td>

          <td>

            <?php $data = explode(',', $list->order_status); ?>

            @foreach (explode(',', $list->order_status) as $key => $status)

            @if($status == 'LOST')

            <a href="javascript:void(0)" class="btn btn-warning btn-sm btn-lost" data-msg="Are you sure do you want to recover it ?" data-status="4.QUOTE SENT to CLIENT" data-id="{{$list->id}}"><span class="glyphicon glyphicon-edit"></span>{{$status}}</a>

            @elseif($status == '1.QUOTE REQUEST RECEIVED from Client')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".quote-request-received-from-client">{{$status}}

            </a>

            @elseif($status == '2.QUOTE REQUEST SENT to SUPPLIER')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".quote-request-sent-to-supplier">{{$status}}

            </a>

            @elseif($status == '3.QUOTE SUPPLIER RECEIVED')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".quote-supplier-received">{{$status}}

            </a>

            @elseif($status == '4.QUOTE SENT to CLIENT')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".quote-sent-to-client">{{$status}}

            </a>

            @elseif($status == '5.QUOTE ACCEPTANCE from CLIENT')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".quote-acceptance-from-client">{{$status}}

            </a>

            @elseif($status == '6.SEND CONFIRMATION TO SUPPLIER')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".send-confirmation-to-supplier">{{$status}}

            </a>

            @elseif($status == '7.UPLOAD CONFIRMATION SUPPLIER DOC')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".upload-confirmation-supplier-doc">{{$status}}

            </a>

            @elseif($status == '8.GENERATE CONFIRMATION TO CLIENT' || $status == '8.GOODS RECEIVED from CLIENT')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".generate-confirmation-to-client">{{$status}}

            </a>

            @elseif($status == '9.GOODS SENT from SUPPLIER')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".goods-sent-from-supplier">{{$status}}

            </a>

            @elseif($status == '10.GOOD RECEIVED from SUPPLIER')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".good-received-from-supplier">{{$status}}

            </a>

            @elseif($status == '11.GOODS SENT to CLIENT')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".goods-sent-to-client">{{$status}}

            </a>

            @elseif($status == '12.INVOICE RECEIVED')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".invoice-received">{{$status}}

            </a>

            @elseif($status == '13.INVOICE SENT')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".invoice-sent">{{$status}}

            </a>

            @elseif($status == '14.INVOICE PAID')

            <a style="color:#333; background: #00800036;" href=javascript:void(0) class="openModalLink" data-clientid="{{$list->client_id}}" dataorderlist="[{{json_encode($list)}}]" id="{{$list->id}}" data-toggle="modal" data-target=".invoice-paid">{{$status}}

            </a>

            @endif

            @endforeach

          </td>

          <td><a style="color:#333; text-decoration: underline;" href='{{url("/admin/oread/{$list->client_id}/{$refnum}")}}'>{{$list->order_status_number}}</a></td>

          <td>

            <a class="btn btn-info btn-sm" href='{{url("/admin/oread/{$list->id}/{$refnum}")}}'>

              <span data-feather="eye-off"></span> view

            </a>

          </td>

          <td id="delete_order_row">

            <a class="btn btn-danger btn-sm" id="{{$list->id}}" href='{{url("/admin/orderdelete/{$list->id}")}}' data-refno="{{$list->order_reference_number}}">

              <span data-feather="delete"></span> delete

            </a>

          </td>

        </tr>

        @endforeach

        @endif

      </tbody>

    </table>

  </div>

</main>

<!-- NEW ORDER -->

<!-- MODAL -->

<div class="modal fade new-order quote-request-received-from-client quote-request-sent-to-supplier quote-supplier-received quote-sent-to-client quote-acceptance-from-client send-confirmation-to-supplier upload-confirmation-supplier-doc generate-supplier-confirmation generate-confirmation-to-client goods-sent-from-supplier goods-sent-to-client good-received-from-supplier goods-received goods-sent-sup good-received-sup_ good-received-sup goods-sent invoice-received invoice-sent invoice-paid" data-backdrop="static" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <div class="alert alert-danger form-error-msg" style="display:none;">

        <ul></ul>

      </div>

      <div class="modal-header">

        <!-- <h5 class="modal-title" id="exampleModalLabel">New Order </h5> -->

        <ol class="wizard-progress clearfix hide" id="top-menu">

          <li>

            <div class="col-sm-12" data-id="one">

              <span class="visuallyhidden">Step </span><span class="step-num">1</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="two">

              <span class="visuallyhidden">Step </span><span class="step-num">2</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="three">

              <span class="visuallyhidden">Step </span><span class="step-num">3</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="four">

              <span class="visuallyhidden">Step </span><span class="step-num">4</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="five">

              <span class="visuallyhidden">Step </span><span class="step-num">5</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="six">

              <span class="visuallyhidden">Step </span><span class="step-num">6</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="seven">

              <span class="visuallyhidden">Step </span><span class="step-num">7</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="eight">

              <span class="visuallyhidden">Step </span><span class="step-num">8</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="nine">

              <span class="visuallyhidden">Step </span><span class="step-num">9</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="ten">

              <span class="visuallyhidden">Step </span><span class="step-num">10</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="eleven">

              <span class="visuallyhidden">Step </span><span class="step-num">11</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="twelve">

              <span class="visuallyhidden">Step </span><span class="step-num">12</span>

            </div>

          </li>

          <li>

            <div class="col-sm-12" data-id="thirteen">

              <span class="visuallyhidden">Step </span><span class="step-num">13</span>

            </div>

          </li>

          <!-- <li>

          <div class="col-sm-12" data-id="fourteen">

          <span class="visuallyhidden">Step </span><span class="step-num">14</span>

        </div>

      </li> -->

    </ol>

    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">

    <span aria-hidden="true">&times;</span>

  </button> -->

</div>

<!-- New order -->

<div class="form-field-modal-default" id="form-field-modal-default-new-order">

  <form name="createorder" method="post" action="{{url('admin/ostore')}}" id="1" enctype="multipart/form-data" novalidate>

    {{ csrf_field() }}

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>INFORMATION INPUT</span></div>

            <fieldset class="form-control mb-3">

              <div class="mb-3">

                <label for="client">Client</label>

                <select class="selectpicker form-control client" id="client" name="company_name" data-container="body" data-live-search="true" title="Search client by name" data-hide-disabled="true"></select>

              </div>

              <div class="mb-3">

                <label for="orderProduct">Order number from Client</label>

                <input type="text" class="form-control" id="order_number_from_client" name="order_number_from_client">

              </div>

            </fieldset>

            <fieldset class="form-control mb-3">

              <div class="mb-3">

                <label for="supplier">Supplier</label>

                <select class="selectpicker form-control" id="orderSuppier" name="order_supplier" data-container="body" data-live-search="true" title="Search supplier by name" data-hide-disabled="true"></select>

              </div>

              <div class="mb-3">

                <label for="orderProduct">Order number from Supplier</label>

                <input type="text" class="form-control" id="order_number_from_supplier" name="order_number_from_supplier">

              </div>

            </fieldset>

            <div class="mb-3">

              <label for="exampleInputFile">File input</label>

              <input type="file" accept="application/pdf" name="upload_quotation_received" class="form-control-file" id="exampleInputFile 1" aria-describedby="fileHelp" />

              <small id="fileHelp" class="form-text text-muted">Upload quotation received</small>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL</span></div>

            <fieldset class="form-control mb-3">ORDER DETAIL

              <div class="mb-3">

                <label for="">Subject</label>

                <input type="text" class="form-control" id="order_subject" name="order_subject" placeholder="(e.g. TEFLON COATING)">

              </div>

            </fieldset>

            <fieldset class="form-control mb-3">

              <!-- products -->

              <div class="input_fields_wrap_products">

                <!-- append dynamic form here -->

                <div id="foo">

                  <div class="add-row" style="margin-bottom:5px;">

                    <button type="button" class="close_ remove_field_" aria-label="Close" style="padding: 0; background-color: transparent; border: 0;-webkit-appearance: none; float: right; font-size: 1.5rem; font-weight: 700; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; opacity: .5;">

                      <span aria-hidden="true">&nbsp;</span>

                    </button>

                  </div>

                </div>

              </div>

              <div class="row">

                <div class="col-md-6 mb-3">

                  <p class="child-modal-link">

                    <!--  <u><a href="#" id="newProductChild" onclick="$('#productNewModal').modal({'backdrop': 'static'});" class="button"><i class="fa fa-plus"></i>Click to new add product</a></u> -->

                    <u><a href="#" data-toggle="modal" data-target=".productNewModal" class="button"><i class="fa fa-plus"></i>Click to add / edit product</a></u>

                  </p>

                  <p class="child-modal-link">

                    <!--  <u><a href="#" id="newProductChild" onclick="$('#productNewModal').modal({'backdrop': 'static'});" class="button"><i class="fa fa-plus"></i>Click to new add product</a></u> -->

                    <u><a href="#" data-toggle="modal" data-target=".treatmentNewModal" class="button"><i class="fa fa-plus"></i>Click to add / edit treatment</a></u>

                  </p>

                  <!-- <button class="add_field_button btn btn-sm btn-primary btn-submit">Add Product</button> -->

                </div>

                <!-- modal product -->

                <div class="modal productNewModal" id="productNewModal" tabindex="-1" role="dialog" aria-labelledby="productNewModal" aria-hidden="true"><!-- prevent outsie click data-backdrop="static" -->

                  <div class="modal-dialog modal-lg">

                    <div class="modal-content">

                      <!-- Modal Header -->

                      <div class="modal-header">

                        <h4 class="modal-title">Add Product</h4>

                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

                      </div>

                      <!-- <form id=""> -->

                      <!-- Modal body -->

                      <div class="modal-body">

                        <div class="row">

                          <div class="col-md-4" id="product-list">

                            <div class="col-md-12 mb-3" id="default">

                              <input type="checkbox" class="update_order_product" name="update_order_product" />

                              <label for="">Blank</label>

                            </div>

                          </div>

                          <div class="col-md-8">

                            <div id="append-product">

                              <!-- append product here -->

                            </div>

                            <div class="row targetDiv">

                              <div class="col-md-6 mb-3">

                                <label for="">Product </label>

                                <input type="text" class="form-control" data-error="order_product" id="order_new_product" />

                                <div class="invalid-feedback">

                                  Name on card is required

                                </div>

                              </div>

                              <div class="col-md-6 mb-3">

                                <label for="">Amount</label>

                                <input type="number" min="1" class="form-control order_amount" data-error="order_new_amount" id="order_new_amount"/>

                              </div>

                              <div class="col-md-6 mb-3">

                                <label for="vn">Material</label>

                                <input type="text" class="form-control" data-error="order_material" id="order_new_material"/>

                                <div class="invalid-feedback">

                                  Please select Supplier

                                </div>

                              </div>

                              <div class="col-md-6 mb-3">

                                <label for="">Dimensions/Weight</label>

                                <input type="text" class="form-control" data-error="order_dimensionweight" id="order_new_dimensionweight"/>

                              </div>

                              <div class="col-md-12 mb-3">

                                <label for="">Technical/Drawing Reference</label>

                                <input type="text" class="form-control" data-error="order_technical_drawingreference" id="order_new_technical_drawingreference"/>

                              </div>

                            </div>

                          </div>

                        </div>

                        <!--   Modal body.. -->

                      </div>

                      <!-- Modal footer -->

                      <div class="modal-footer">

                        <button type="button" id="add-new-products" class="btn btn-sm btn-success pull-right">Send</button>

                      </div>

                      <!--  </form> -->

                    </div>

                  </div>

                </div>

                <div class="modal treatmentNewModal" id="treatmentNewModal" tabindex="-1" role="dialog" aria-labelledby="treatmentNewModal" aria-hidden="true"><!-- prevent outsie click data-backdrop="static" -->

                  <div class="modal-dialog modal-lg" style="overflow-y: scroll;">

                    <div class="modal-content">

                      <!-- Modal Header -->

                      <div class="modal-header">

                        <h4 class="modal-title">Add Treatment</h4>

                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

                      </div>

                      <!-- Modal body -->

                      <div class="modal-body">

                        <div class="row">

                          <div class="col-md-4" id="reference-product-list"><!-- append checkbox here --></div>

                          <div class="col-md-8">

                            <div class="row append-treatment-clone">

                            </div>

                            <div class="row append-treatment">

                              <div class="col-md-12 mb-3 treatment-for-this-product">

                                

                                <div class="mb-3">

                                  <label for="title">Treatment</label>

                                  <input type="text" class="form-control treatment-title" name="treatment-title" id="treatment-title" placeholder="Title">

                                </div>

                                <div class="mb-3">

                                  <label for="title">Treatment description</label>

                                  <textarea id="treatment-details"name="treatment-details" class="form-control treatment-details"></textarea>

                                </div>

                                <div class="mb-3" style="display:none;">

                                  <input type="hidden" class="form-control treatment-price" id="treatment-price" value="0" />

                                </div>

                                

                              </div>

                            </div>

                          </div>

                        </div>

                        <!--   Modal body.. -->

                      </div>

                      <!-- Modal footer -->

                      <div class="modal-footer">

                        <div class="add_new_treatment btn btn-info btn-submit btn-sm">Add Treatment</div>

                      </div>

                    </div>

                  </div>

                </div>

                <!-- treatment  -->

              </div>

              <!-- / products -->

            </fieldset>

            <fieldset class="form-control mb-3" id="product-treatment-orderlists">

            </fieldset>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- ONE -->

<div class="form-field-modal-default hide" id="form-field-modal-default-one">

  <form method="post" action="" class="23" id="23" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="status" value="2.QUOTE REQUEST SENT to SUPPLIER" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container-fluid">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="tableresponsive-md">

              <table class="table table-bordered table-striped_ table-responsive_ order-detail">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td class="order_client"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td class="order_supplier"supplier></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td class="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product_noprice"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Request for quotation from supplier(s) (can be multiple)</span></div>

            <div class="mb-3">

              <a class="btn btn-sm btn-success btn-sm gqr" id="gqr"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION REQUEST</a>

            </div>

            <div class="mb-3 hide">

              <label for="">File input</label>

              <input type="file" accept="application/pdf" name="upload_recieved_quotation" class="form-control-file" id="upload_recieved_quotation_one_view">

              <small id="fileHelp" class="form-text text-muted">Upload recieved quotation</small>

            </div>

            <script type="text/javascript">

            document.getElementById("upload_recieved_quotation_one_view").disabled = true;

            </script>

          </div>

          <!-- modal -->

          <div class="modal" id="productTwoModal" tabindex="-1" role="dialog" aria-labelledby="productTwoModal" aria-hidden="true">

            <div class="modal-dialog modal-lg_product">

              <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">

                  <h4 class="modal-title">Add Product</h4>

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>

                <!-- Modal body -->

                <div class="modal-body">

                  <div id="treatment_form_no_price">

                    <!-- append form here if ther's from the db -->

                  </div>

                  <div class="order_product_append">

                    <div class="order_product-three-update order_product-update" id="order_product-update"></div>

                  </div>

                  <div class="form">

                    <button class="add_field_products btn btn-primary btn-submit btn-sm">Add Product</button>

                  </div>

                  <!--   Modal body..

                  <a class="custom-close"><u> My Custom Close Link</u> </a> -->

                </div>

                <!-- Modal footer -->

                <div class="modal-footer">

                  <!-- <button type="button" class="btn btn-sm btn-secondary" id="productBtnCancel">Close</button> -->

                  <!-- <button type="button" class="btn btn-danger" id="productBtnCancel">Close</button> -->

                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->

                  <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal" id="quotation-recieved-btn-close">Close</button>

      <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- TWO -->

<div class="form-field-modal-default hide" id="form-field-modal-default-two">

  <form method="post" action="" class="23" id="23_" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="quote_supplier_received" />

    <input type="hidden" name="status" value="3.QUOTE SUPPLIER RECEIVED" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_quote_supplier_received" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container-fluid">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="tableresponsive-md">

              <table class="table table-bordered table-striped_ table-responsive_ order-detail">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product_noprice"><ul></ul></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Request(s) received from supplier(s)</span></div>

            <div class="mb-3">

              <label for="">File input</label>

              <input type="file" accept="application/pdf" name="quote_supplier_received" class="form-control-file" id="upload_recieved_quotation">

              <small id="fileHelp" class="form-text text-muted">Upload recieved quotation</small>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal" id="quotation-recieved-btn-close">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

    <!-- modal -->

    <div class="modal" id="productOneUpdateModal" tabindex="-1" role="dialog" aria-labelledby="productOneUpdateModal" aria-hidden="true">

      <div class="modal-dialog modal-lg_product">

        <div class="modal-content">

          <!-- Modal Header -->

          <div class="modal-header">

            <h4 class="modal-title">Add Product</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <!-- Modal body -->

          <div class="modal-body">

            <div id="treatment_form_no_price">

              <!-- append form here if ther's from the db -->

            </div>

            <div class="order_product_append">

              <div class="order_product-three-update order_product-update" id="order_product-update"></div>

            </div>

            <div class="form">

              <button class="add_field_products btn btn-primary btn-submit btn-sm">Add Product</button>

            </div>

            <!--   Modal body.. -->

          </div>

          <!-- Modal footer -->

          <div class="modal-footer">

            <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

          </div>

        </div>

      </div>

    </div>

  </form>

</div>

<!-- THREE -->

<form method="post" action="" id="45" enctype="multipart/form-data">

  {{ csrf_field() }}

  <div class="form-field-modal-default hide" id="form-field-modal-default-three">

    <input type="hidden" name="status" value="3.QUOTE SUPPLIER RECEIVED" />

    <input type="hidden" name="file" value="upload_client_confirmation" />

    <input type="hidden" name="path" value="client" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" class="form-control" id="orderSupplier" name="order_supplier" placeholder="">

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="table-responsive-md">

              <table class="table table-bordered table-striped_ table-responsive_ order-detail">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <p>

                        <u><a href="#" data-toggle="modal" data-target="#productModal" id="productModalClick" class="button productModalClick"><i class="fa fa-plus"></i>Click to add / edit price</a></u>

                      </p>

                      <div class="order_product"><ul></ul></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td>

                      <input type="text" name="transport"class="form-control">

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td>

                      <input type="number" name="transport_price"class="form-control">

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td>

                      <input type="text" name="delivery_time" class="form-control">

                    </td>

                  </tr>

                  <tr>

                    <td></td>

                    <td><button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Quotation sent to client </span></div>

            <div class="mb-3">

              <a class="btn btn-success btn-sm gq" id="gq"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION</a>

              <small id="fileHelp" class="form-text text-muted">(PLEASE NOTE:  PDF ADAPTABLE for not standard options (like a word document))</small>

            </div>

            <div class="mb-3 hide">

              <label for="exampleInputFile">File input</label>

              <input type="file" accept="application/pdf" name="upload_client_confirmation" class="form-control-file" id="upload_client_confirmation_3_view" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">Upload client confirmation </small>

            </div>

            <script type="text/javascript">

            document.getElementById("upload_client_confirmation_3_view").disabled = true;

            </script>

            <div class="mb-3 hide">

              <a href="#" class="btn btn-warning btn-sm custom_"><span class="glyphicon glyphicon-edit"></span>LOST</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <div type="submit" id="thirdbtnredirect" class="btn btn-sm btn-success pull-right">Send</div>

    </div>

  </div>

  <div class="modal" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true">

    <div class="modal-dialog modal-lg_product">

      <div class="modal-content">

        <!-- Modal Header -->

        <div class="modal-header">

          <h4 class="modal-title">Add Price </h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        <!-- Modal body -->

        <div class="modal-body">

          <div id="treatment_form">

            <!-- append form here if ther's from the db -->

          </div>

          <div class="order_product_append">

            <div class="order_product-three-update order_product-update" id="order_product-update"></div>

          </div>

          <div class="form"></div>

          <!--   Modal body.. -->

        </div>

        <!-- Modal footer -->

        <div class="modal-footer">

          <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

        </div>

      </div>

    </div>

  </div>

</form>

<!-- FOUR -->

<div class="form-field-modal-default hide" id="form-field-modal-default-four">

  <form method="post" action="" id="4a" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="quote_acceptance_from_client" />      

    <input type="hidden" name="status" value="5.QUOTE ACCEPTANCE from CLIENT" />

    <input type="hidden" name="path" value="client" />

    <input type="hidden" name="column" value="created_quote_acceptance_from_client" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" class="form-control" id="orderSupplier" name="order_supplier" placeholder="">

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="table-responsive-md">

              <table class="table table-bordered table-striped_ table-responsive_ order-detail">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td>

                      <input type="number" name="transport_price"class="form-control">

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>CONFIRMATION</span></div>

            <div class="mb-3">

              <label for="exampleInputFile">File input</label>

              <input type="file" accept="application/pdf" name="quote_acceptance_from_client" class="form-control-file" id="exampleInputFile 3" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">Upload client confirmation</small>

            </div>

            <div class="mb-3">

              <a href="javascript:void(0)" class="btn btn-warning btn-sm btn-lost" data-msg="Are you sure do you want to lost it ?" data-status="LOST" data-id=""><span class="glyphicon glyphicon-edit"></span>LOST</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- FIVE -->

<div class="form-field-modal-default hide" id="form-field-modal-default-five">

  <form method="post" action="" id="5" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="status" value="6.SEND CONFIRMATION TO SUPPLIER" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="mb-3">

              <a class="btn btn-success btn-sm gsc" id="gsc"><span class="glyphicon glyphicon-edit"></span>GENERATE SUPPLIER CONFIRMATION</a>

            </div>

            <div class="mb-3">

              <small id="fileHelp" class="form-text text-muted">(Can be standard message with recieved quotation under step 2 in copy, e.g. I accept your offer as referenced in the below  quotation)</small>

            </div>

            <div class="mb-3 hide">

              <label for="exampleInputFile">File input</label>

              <input type="file" accept="application/pdf" name="upload_confirmation_supplier_doc" class="form-control-file" id="upload_confirmation_supplier_doc_5_view" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD SIGNED ORDER CONFIRMATION</small>

            </div>

            <script type="text/javascript">

            document.getElementById("upload_confirmation_supplier_doc_5_view").disabled = true;

            </script>

            <div class="mb-3 hide">

              <a class="btn btn-success btn-sm disabled-link gcc" id="gcc"><span class="glyphicon glyphicon-edit"></span>GENERATE CLIENT CONFIRMATION</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- SIX -->

<div class="form-field-modal-default hide" id="form-field-modal-default-six">

  <form method="post" action="" id="6" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="upload_confirmation_supplier_doc" />

    <input type="hidden" name="status" value="7.UPLOAD CONFIRMATION SUPPLIER DOC" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_upload_confirmation_supplier_doc " />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="mb-3">

              <label for="exampleInputFile">File input</label>

              <input type="file" accept="application/pdf" name="upload_confirmation_supplier_doc" class="form-control-file" id="" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD SIGNED ORDER CONFIRMATION</small>

            </div>

            <div class="mb-3">

              <a class="btn btn-success btn-sm disabled-link gcc hide" id="gcc"><span class="glyphicon glyphicon-edit"></span>GENERATE CLIENT CONFIRMATION</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- SEVEN -->

<div class="form-field-modal-default hide" id="form-field-modal-default-seven">

  <form method="post" action="" id="7" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="goods_received_from_client" />

    <input type="hidden" name="status" value="8.GOODS RECEIVED from CLIENT" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_goods_received_from_client" /> 

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" id="has_exclusivity" name="has_exclusivity" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="mb-3">

              <a class="btn btn-success btn-sm gcc gcc_8" id="gcc"><span class="glyphicon glyphicon-edit"></span>GENERATE CLIENT CONFIRMATION</a>

            </div>

            <div class="mb-3">

              <label for="invoice_received">File input</label>

              <input type="file" accept="application/pdf"accept="application/pdf" name="goods_received_from_client" class="form-control-file" id="goods_received_from_client" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">GOODS RECEIVED FROM CLIENT</small>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- EIGHT -->

<div class="form-field-modal-default hide" id="form-field-modal-default-eight">

  <form method="post" action="" id="8" enctype="multipart/form-data">

    {{ csrf_field() }}  

    <!-- <input type="hidden" name="status_update" value="1" /> -->

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="goods_sent_from_supplier" />

    <input type="hidden" name="status" value="9.GOODS SENT from SUPPLIER" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_goods_sent_from_supplier" />

    <input type="hidden" name="form" value="form-eight-update" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" id="has_exclusivity" name="has_exclusivity" />    

  

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Goods sent to Supplier</span></div>

            <div class="mb-3">

              <small id="fileHelp" class="form-text text-muted">(applicable if exclusivity status)</small>

            </div>

            <div class="mb-3">

              <label for="upload_delivery_document">File input</label>

              <input type="file" accept="application/pdf" name="goods_sent_from_supplier" class="form-control-file" id="goods-sent-from-supplier" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">GOODS SENT FROM SUPPLIER</small>

            </div>

            <div class="mb-3 hide">

              <label for="upload_delivery_document">File input</label>

              <input type="file" accept="application/pdf" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document_nine_update" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD DELIVERY DOCUMENT</small>

            </div>

            <script type="text/javascript">

            document.getElementById("upload_delivery_document_nine_update").disabled = true;

            </script>

            <div class="mb-3 hide">

              <a class="btn btn-success btn-sm gdd disabled-link" id="gdd"><span class="glyphicon glyphicon-edit"></span>GENERATE DELIVERY DOCUMENT</a>

            </div>

          </div>

        </div>

      </div>

    </div>



    <div class="modal-footer">

      <!-- <button type="button" class="btn btn-info pull-right cancel" id="cancel">Return</button> -->

      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

      <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- NINE -->

<div class="form-field-modal-default hide" id="form-field-modal-default-nine">

  <form method="post" action="" id="9" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="good_received_from_supplier" />

    <input type="hidden" name="status" value="10.GOOD RECEIVED from SUPPLIER" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_good_received_from_supplier" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" id="has_exclusivity" name="has_exclusivity" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Upload delivery note from Supplier</span></div>

            <div class="mb-3">

              <small id="fileHelp" class="form-text text-muted">(non exclusivity status)</small>

            </div>

            <div class="mb-3">

              <label for="invoice_received">File input</label>

              <input type="file" accept="application/pdf" name="good_received_from_supplier" class="form-control-file" id="good_received_from_supplier_nine_update" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD DELIVERY DOCUMENT</small>

            </div>

            <div class="mb-3 hide">

              <a class="btn btn-success btn-sm disabled-link gdd" id="gdd"><span class="glyphicon glyphicon-edit"></span>GENERATE DELIVERY DOCUMENT</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- TEN -->

<div class="form-field-modal-default hide" id="form-field-modal-default-ten">

  <form method="post" action="" id="10" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="status" value="11.GOODS SENT to CLIENT" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_index" />

    <input type="hidden" id="checkListId" name="id" />

    <input type="hidden" id="has_exclusivity" name="has_exclusivity" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Generate delivery document for Client</span></div>

            <div class="mb-3 hide">

              <small id="fileHelp" class="form-text text-muted">(if applicable, non-exclusivity)</small>

            </div>

            <div class="mb-3">

              <a class="btn btn-success btn-sm gdd" id="gdd"><span class="glyphicon glyphicon-edit"></span>GENERATE DELIVERY DOCUMENT</a>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- ELEVEN -->

<!-- <div class="form-field-modal-default hide" id="form-field-modal-default-eleven">

<form method="post" action="" id="11" enctype="multipart/form-data">

{{ csrf_field() }}

<input type="hidden" name="is_upload" value="1" />

<input type="hidden" name="file" value="invoice_received" />

<input type="hidden" name="status" value="12.INVOICE RECEIVED" />

<input type="hidden" name="path" value="supplier" />

<input type="hidden" name="column" value="invoice_received" />

<input type="hidden" name="row_num" />

<input type="hidden" name="column_num" />

<input type="hidden" id="checkListId" name="id" />

<div class="modal-body">

<div class="container col-md-12">

<div class="row">

<div class="col-md-6">

<div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

<div class="mb-3">

<table class="table table-bordered">

<tbody>

<tr>

<th scope="row">Client</th>

<td id="order_clients"></td>

</tr>

<tr>

<th scope="row">Supplier</th>

<td id="order_supplier"></td>

</tr>

<tr>

<th scope="row">Subject</th>

<td id="order_subject"></td>

</tr>

<tr>

<th scope="row">Product</th>

<td>

<div class="order_product"></div>

</td>

</tr>

<tr>

<th scope="row">Treatment</th>

<td>

<div class="order_treatment"></div>

</td>

</tr>

<tr>

<th scope="row">Transport</th>

<td class="transport"></td>

</tr>

<tr>

<th scope="row">Transport price</th>

<td>

<input type="number" name="transport_price"class="form-control">

</td>

</tr>

<tr>

<th scope="row">Delivery Time</th>

<td class="delivery_time"></td>

</tr>

</tbody>

</table>

</div>

</div>

<div class="col-md-6">

<div class="section-divider mb40"><span>Goods sent to Client (Depending on Exclusivity) </span></div>

<div class="mb-3">

<label for="invoice_received">File input</label>

<input type="file" accept="application/pdf" name="invoice_received" class="form-control-file" id="invoice_received" aria-describedby="fileHelp">

<small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>

</div>

<div class="mb-3 hide">

<label for="invoice_received">File input</label>

<input type="file" accept="application/pdf" name="invoice_received" class="form-control-file" id="invoice_received" aria-describedby="fileHelp">

<small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>

</div>

<div class="mb-3 hide">

<a href="#" class="btn btn-success btn-sm disabled-link gi" id="gi"><span class="glyphicon glyphicon-edit"></span>GENERATE INVOICE</a>

</div>

<div class="mb-3">

<small id="fileHelp" class="form-text text-muted">(all the information should be in the system + PDF ADAPTABLE for not standard options (like a word document))</small>

</div>

</div>

<div class="col-md-4">&nbsp;</div>

</div>

</div>

</div>

<div class="modal-footer">

<button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

<button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>

</div>

</form>

</div> -->

<!-- TWELVE -->

<div class="form-field-modal-default hide" id="form-field-modal-default-eleven">

  <!-- <div class="form-field-modal-default hide" id="form-field-modal-default-twelve"> -->

  <form method="post" action="" id="12" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="is_upload" value="1" />

    <input type="hidden" name="file" value="upload_delivery_document" />

    <input type="hidden" name="status" value="12.INVOICE RECEIVED" />

    <input type="hidden" name="path" value="supplier" />

    <input type="hidden" name="column" value="created_invoice_received" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_num" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-6">

            <div class="section-divider mb40"><span>ORDER DETAIL (FOR INFORMATION PURPOSE)</span></div>

            <div class="mb-3">

              <table class="table table-bordered">

                <tbody>

                  <tr>

                    <th scope="row">Client</th>

                    <td id="order_clients"></td>

                  </tr>

                  <tr>

                    <th scope="row">Supplier</th>

                    <td id="order_supplier"></td>

                  </tr>

                  <tr>

                    <th scope="row">Subject</th>

                    <td id="order_subject"></td>

                  </tr>

                  <tr>

                    <th scope="row">Product</th>

                    <td>

                      <div class="order_product"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Treatment</th>

                    <td>

                      <div class="order_treatment"></div>

                    </td>

                  </tr>

                  <tr>

                    <th scope="row">Transport</th>

                    <td class="transport"></td>

                  </tr>

                  <tr>

                    <th scope="row">Transport price</th>

                    <td class="transport_price"></td>

                  </tr>

                  <tr>

                    <th scope="row">Delivery Time</th>

                    <td class="delivery_time"></td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <div class="col-md-6">

            <div class="section-divider mb40"><span>Received invoice from Supplier</span></div>

            <!-- <div class="mb-3 hide">

            <label for="invoice_received">File input</label>

            <input type="file" accept="application/pdf" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document" aria-describedby="fileHelp">

            <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>

          </div> -->

          <script type="text/javascript">

          // document.getElementById("invoice_received_twelve_view").disabled = true;

          </script>

          <div class="mb-3">

            <label for="invoice_received">File input</label>

            <input type="file" accept="application/pdf" name="upload_delivery_document" class="form-control-file" aria-describedby="fileHelp">

            <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>

          </div>

          <div class="mb-3 hide">

            <a href="#" class="btn btn-success btn-sm disabled-link gi" id="gi"><span class="glyphicon glyphicon-edit"></span>GENERATE INVOICE</a>

          </div>

          <div class="mb-3">

            <small id="fileHelp" class="form-text text-muted">(all the information should be in the system + PDF ADAPTABLE for not standard options (like a word document))</small>

          </div>

        </div>

        <div class="col-md-4">&nbsp;</div>

      </div>

    </div>

  </div>

  <div class="modal-footer">

    <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>

    <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

  </div>

</form>

</div>

<!-- THIRTEEN -->

<!-- <div class="form-field-modal-default hide" id="form-field-modal-default-thirteen"> -->

<div class="form-field-modal-default hide" id="form-field-modal-default-twelve">

  <form method="post" action="" id="13" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="status" value="13.INVOICE SENT" />

    <input type="hidden" name="form" value="form-thirteen-update" />

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_num" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-4">&nbsp;</div>

          <div class="col-md-4">

            <div class="mb-3 hide">

              <label for="invoice_received hide">File input</label>

              <input type="file" accept="application/pdf" name="invoice_received" class="form-control-file" id="invoice_received_thirteen_view" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE [INVOICE RECEIVED]</small>

            </div>

            <script type="text/javascript">

            document.getElementById("invoice_received_thirteen_view").disabled = true;

            </script>

            <div class="mb-3 hide">

              <label for="invoice_received">File input</label>

              <input type="file" accept="application/pdf" name="invoice_received" class="form-control-file" id="invoice_received_thirteen_view" aria-describedby="fileHelp">

              <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>

            </div>

            <script type="text/javascript">

            document.getElementById("invoice_received_thirteen_view").disabled = true;

            </script>

            <div class="mb-3">

              <a href="#" class="btn btn-success btn-sm gi" id="gi"><span class="glyphicon glyphicon-edit"></span>GENERATE INVOICE</a>

            </div>

            <div class="mb-3">

              <small id="fileHelp" class="form-text text-muted">(all the information should be in the system + PDF ADAPTABLE for not standard options (like a word document))</small>

            </div>

          </div>

          <div class="col-md-4">&nbsp;</div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

      <button type="submit" class="btn btn-sm btn-success pull-right">Send</button>

    </div>

  </form>

</div>

<!-- 14, 15-->

<div class="form-field-modal-default hide" id="form-field-modal-default-thirteen"> 

  <!-- <div class="form-field-modal-default hide" id="form-field-modal-default-fourteen"> -->

  <form method="post" action="" id="131415" enctype="multipart/form-data">

    {{ csrf_field() }}

    <input type="hidden" name="row_num" />

    <input type="hidden" name="column_num" />

    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">

      <div class="container col-md-12">

        <div class="row">

          <div class="col-md-4">&nbsp;</div>

          <div class="col-md-4">

            <h1 class="text-center">FINISHED</h1>

          </div>

          <div class="col-md-4">&nbsp;</div>

        </div>

      </div>

    </div>

    <div class="modal-footer">

      <button type="button" class="btn btn-sm btn-secondary close-m" data-dismiss="modal">Close</button>  

    </div>

  </form>

</div>

<!-- included files -->

<div class="form-field-modal-one inluded" id="form-field-modal-one"><!-- reference for preview status -->

  @include('append.one')

</div>

<div class="form-field-modal-two inluded" id="form-field-modal-two">

  @include('append.two')

</div>

<div class="form-field-modal-three inluded" id="form-field-modal-three">

  @include('append.three')

</div>

<div class="form-field-modal-four inluded" id="form-field-modal-four">

  @include('append.four')

</div>

<div class="form-field-modal-five inluded" id="form-field-modal-five">

  @include('append.five')

</div>

<div class="form-field-modal-six inluded" id="form-field-modal-six">

  @include('append.six')

</div>

<div class="form-field-modal-seven inluded" id="form-field-modal-seven">

  @include('append.seven')

</div>

<div class="form-field-modal-eight inluded" id="form-field-modal-eight">

  @include('append.eight')

</div>

<div class="form-field-modal-nine inluded" id="form-field-modal-nine">

  @include('append.nine')

</div>

<div class="form-field-modal-ten inluded" id="form-field-modal-ten">

  @include('append.ten')

</div>

<div class="form-field-modal-eleven inluded" id="form-field-modal-eleven">

  @include('append.eleven')

</div>

<div class="form-field-modal-twelve inluded" id="form-field-modal-twelve">

  @include('append.twelve')

</div>

<div class="form-field-modal-thirteen inluded" id="form-field-modal-thirteen">

  @include('append.thirteen')

</div>

</div>

</div>

</div>

<!-- The Modal -->

</div>

</div>

<script>

// close child popup window when parent close

window.onbeforeunload = function() {

  popupWindow.close();

};

</script>

<style type="text/css">

.modal-lg_product{

  max-width: 50%;

}

</style>

@endsection

