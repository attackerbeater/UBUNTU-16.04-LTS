<form method="post" action="" id="13" class="form-thirteen-update" enctype="multipart/form-data">
  {{ csrf_field() }}
  <!-- <input type="hidden" name="status_update" value="1" />
  
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
  <label for="upload_delivery_document">File input</label>
  <input type="file" accept="application/pdf" name="invoive_received" class="form-control-file" id="invoive_received_thirteen_update" aria-describedby="fileHelp">
  <small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE [INVOICE RECEIVED]</small>
</div>
<script type="text/javascript">
document.getElementById("invoive_received_thirteen_update").disabled = true;
</script>
<div class="mb-3 hide">
<label for="upload_delivery_document">File input</label>
<input type="file" accept="application/pdf" name="upload_delivery_document" class="form-control-file" id="upload_delivery_document_thirteen_update" aria-describedby="fileHelp">
<small id="fileHelp" class="form-text text-muted">UPLOAD SUPPLIER INVOICE </small>
</div>
<script type="text/javascript">
document.getElementById("upload_delivery_document_thirteen_update").disabled = true;
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
<button type="button" class="btn btn-sm btn-info pull-right cancel" id="cancel">Return</button>
<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-sm btn-success pull-right">Send</button>
</div> -->

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
