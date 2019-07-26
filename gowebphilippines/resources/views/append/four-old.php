<form method="post" action="" class="form-four-update" enctype="multipart/form-data">
    {{ csrf_field() }}
    

    <input type="hidden" name="form" value="form-four-update" />
    <input type="hidden" name="row_num" />
    <input type="hidden" name="column_index" />
    <input type="hidden" id="checkListId" name="id" />
    <!-- <input type="hidden" class="form-control" id="orderSupplier" name="order_supplier" placeholder=""> -->
    <div class="modal-body">
        <div class="container col-md-12">
            <div class="row">

                <div class="col-md-6">
                    <div class="section-divider mb40"><span>ORDER DETAIL (CONSOLIDATE FROM SUPPLIER)</span></div>
                    <div class="mb-3">
                        <!-- <input type="hidden" name="order_price" id="order_price" /> -->
                        <label for="orderProduct">Product</label>

                        <textarea class="form-control" rows="5" name="order_product" id="orderProduct"></textarea>
                        <div class="invalid-feedback">
                            Please enter Product.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="orderAmount">Amount</label>

                        <textarea class="form-control" rows="5" name="order_amount" id="orderAmount"></textarea>
                        <div class="invalid-feedback">
                            Please enter a Amount.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">

                        <a class="btn btn-success btn-sm" id="gq"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION</a>

                        <small id="fileHelp" class="form-text text-muted">(PLEASE NOTE:  PDF ADAPTABLE for not standard options (like a word document))</small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="upload_client_confirmation" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Upload client confirmation</small>
                    </div>
                    <div class="mb-3">
                        <a href="#" class="btn btn-warning btn-sm custom_"><span class="glyphicon glyphicon-edit"></span>LOST</a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="section-divider mb40"><span>QUOTATION DETAIL</span></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    	<button type="button" class="btn btn-info pull-right" id="cancel">Return</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <input type="submit" class="btn btn-primary btn-submit" id="lstore-submit" name="submit" value="Add" /> -->
        <button type="submit" id="lstore-submit" class="btn btn-success pull-right">Send</button>
    </div>
</form>
