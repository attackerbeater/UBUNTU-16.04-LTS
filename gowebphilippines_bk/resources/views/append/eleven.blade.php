<form method="post" action="" class="form-eleven-update" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="hidden" name="status_update" value="1" />
  <input type="hidden" name="is_upload" value="1" />
  <input type="hidden" name="file" value="upload_delivery_document" />
  <input type="hidden" name="path" value="supplier" />
  <input type="hidden" name="column" value="created_invoice_received" />
  <input type="hidden" name="form" value="form-twelve-update" />
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
          <div class="mb-3 hide">
            <label for="invoice_received">File input</label>
            <input type="file" accept="application/pdf" name="invoice_received" class="form-control-file" id="invoice_received_twelve_update" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE</small>
          </div>
          <script type="text/javascript">
          document.getElementById("invoice_received_twelve_update").disabled = true;
          </script>
          <div class="mb-3">
            <label for="upload_delivery_document">File input</label>
            <input type="file" accept="application/pdf" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document" aria-describedby="fileHelp">
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
    <button type="button" class="btn btn-sm btn-info pull-right cancel" id="cancel">Return</button>
    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" id="lstore-submit" class="btn btn-sm btn-success pull-right">Send</button>
  </div>
</form>
