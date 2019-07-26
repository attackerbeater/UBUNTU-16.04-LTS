<form method="post" action="" class="form-six-update" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="hidden" name="status_update" value="1" />
  <input type="hidden" name="is_upload" value="1" />
  <input type="hidden" name="file" value="upload_confirmation_supplier_doc" />
  <input type="hidden" name="path" value="supplier" />
  <input type="hidden" name="column" value="created_upload_confirmation_supplier_doc" />
  <input type="hidden" name="form" value="form-six-update" />
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
          <div class="mb-3 hide">
            <a class="btn btn-success btn-sm gsc disabled-link" id="gsc"><span class="glyphicon glyphicon-edit"></span>GENERATE SUPPLIER CONFIRMATION</a>
            <small id="fileHelp" class="form-text text-muted">(Can be standard message with recieved quotation under step 2 in copy, e.g. I accept your offer as referenced in the below  quotation)</small>
          </div>
          <div class="mb-3">
            <label for="exampleInputFile">File input</label>
            <input type="file" accept="application/pdf" name="upload_confirmation_supplier_doc" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">UPLOAD SIGNED ORDER CONFIRMATION</small>
          </div>
          <div class="mb-3 hide">
            <a class="btn btn-success btn-sm disabled-link gcc" id="gcc"><span class="glyphicon glyphicon-edit"></span>GENERATE CLIENT CONFIRMATION</a>
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
