<form method="post" action="" class="form-two-update" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="status_update" value="1" />
    <input type="hidden" name="is_upload" value="1" />
    <input type="hidden" name="file" value="quote_supplier_received" />
    <input type="hidden" name="path" value="supplier" />
    <input type="hidden" name="column" value="created_quote_supplier_received" />

    <input type="hidden" name="form" value="form-two-update" />
    <input type="hidden" name="row_num" />
    <input type="hidden" name="column_index" />
    <input type="hidden" id="checkListId" name="id" />

    <div class="modal-body">
        <div class="container-fluid">

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
                                <!--         <p>
                                            <u><a href="#" data-toggle="modal" data-target=".productTwoUpdateModal" class="button"><i class="fa fa-plus"></i>Click to new add product</a></u>
                                        </p>
 -->
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
                    <div class="mb-3 hide">
                        <a class="btn btn-success btn-sm gqr disabled-link" data-id="gqr" id="gqr"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION REQUEST</a>
                    </div>
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
        <button type="button" class="btn btn-sm btn-info pull-right cancel">Return</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>
    </div>

    <!-- modal -->
    <div class="modal productTwoUpdateModal" id="productTwoUpdateModal" tabindex="-1" role="dialog" aria-labelledby="productTwoUpdateModal" aria-hidden="true">
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

                        <button class="add_field_products_with-no-price btn btn-primary btn-submit btn-sm">Add Product</button>
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
