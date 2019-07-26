<form method="post" action="" class="form-three-update" id="form-three-update" enctype="multipart/form-data">
  {{ csrf_field() }}
  <input type="hidden" name="status_update" value="1" />
  <input type="hidden" name="file" value="upload_client_confirmation" />
  <input type="hidden" name="path" value="client" />
  <input type="hidden" name="form" value="form-three-update" />
  <input type="hidden" name="row_num" />
  <input type="hidden" name="column_index" />
  <input type="hidden" id="checkListId" name="id" />
  <input type="hidden" name="statusTreeAppend" value="1" />
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
                      <u><a href="#" data-toggle="modal" data-target="#productThreeUpdateModal"  id="productModalClick" class="button productModalClick"><i class="fa fa-plus"></i>Click to add / edit price</a></u>
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
            <input type="file" accept="application/pdf" name="upload_client_confirmation" class="form-control-file" id="upload_client_confirmation_3_update" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Upload client confirmation</small>
          </div>
          <script type="text/javascript">
          document.getElementById("upload_client_confirmation_3_update").disabled = true;
          </script>
          <div class="mb-3 hide">
            <a href="#" class="btn btn-warning btn-sm custom_"><span class="glyphicon glyphicon-edit"></span>LOST</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-sm btn-info pull-right cancel" id="cancel">Return</button>
    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
  </div>
  <!-- modal -->
  <div class="modal" id="productThreeUpdateModal" tabindex="-1" role="dialog" aria-labelledby="productThreeUpdateModal" aria-hidden="true">
    <div class="modal-dialog modal-lg_product">
      <div class="modal-content">
        <!-- <input type="number" name="update_treatement_price" value=""/> -->
        <!-- <input type="number" name="update_treatement_price_noredirect" value="1"/> -->
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Price</h4>
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
          <div class="form">
            <!-- <button class="add_field_products btn btn-primary btn-submit btn-sm">Add Price</button>                                           -->
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
