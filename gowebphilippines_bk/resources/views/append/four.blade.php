<form method="post" action="" class="form-four-update" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="hidden" name="status_update" value="1" />
  <input type="hidden" name="is_upload" value="1" />
  <input type="hidden" name="file" value="quote_acceptance_from_client" />
  <input type="hidden" name="path" value="client" />
  <input type="hidden" name="column" value="created_quote_acceptance_from_client" />
  <input type="hidden" name="form" value="form-four-update" />
  <input type="hidden" name="row_num" />
  <input type="hidden" name="column_index" />
  <input type="hidden" id="checkListId" name="id" />
  <!-- <input type="hidden" class="form-control" id="orderSupplier" name="order_supplier" placeholder=""> -->
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
          <div class="section-divider mb40"><span>CONFIRMATION</span></div>
          <div class="mb-3 hide">
            <a class="btn btn-success btn-sm gq disabled-link" id="gq"><span class="glyphicon glyphicon-edit"></span>GENERATE QUOTATION</a>
            <small id="fileHelp" class="form-text text-muted">(PLEASE NOTE:  PDF ADAPTABLE for not standard options (like a word document))</small>
          </div>
          <div class="mb-3">
            <label for="exampleInputFile">File input</label>
            <input type="file" accept="application/pdf" name="quote_acceptance_from_client" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload client confirmation</small>
          </div>
          <div class="mb-3">
            <!-- <a href="#" class="btn btn-warning btn-sm custom_"><span class="glyphicon glyphicon-edit"></span>LOST</a> -->
            <a href="javascript:void(0)" class="btn btn-warning btn-sm btn-lost" data-msg="Are you sure do you want to lost it ?" data-status="LOST" data-id=""><span class="glyphicon glyphicon-edit"></span>LOST</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-sm btn-info pull-right cancel" id="cancel">Return</button>
    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>
  </div>
</form>
