<div class="tab-pane" id="home" role="tabpanel" style="display:none;">
  <br/>
  <div class="alert alert-danger form-error-msg">
    <ul></ul>
  </div>
  <form name=f1 id="post-generate-quotation-request-form" method="post" action="{{url('/admin/post-generate-quotation-request-form')}}" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="order_id" value="{{$order[0]->id}}" />
    <input type="hidden" name="client_id" value="{{$order[0]->client_id}}" />
    <input type="hidden" name="row_num" value="{{$data['row_num']}}">
    <input type="hidden" name="column_num" value="{{$data['column_num']}}">
    <input type="hidden" name="id" value="{{$data['order_id']}}">
    <div class="messages"></div>
    <div class="row">
      <div class="form-group col-sm-12">
        <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name"  value="{{ $data['supplier_name'] }}" placeholder="Name" >
      </div>
      <div class="form-group col-sm-12">
        <?php
        $emails = explode(',',$supplier[0]->contact_person_email);
        $emails[] = $data['supplier_email'];
        ?>
        <select name="email" class="form-control" id="type">
          @foreach(array_reverse($emails,true) as $email)
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
        <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject"  value="" placeholder="Subject" >
      </div>
      <div class="form-group col-sm-12">
        <div id="text">
          <div>
            <input type="file" accept="application/pdf" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp" />
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
      <textarea id="message" class="form-control ckeditor" rows="5" name="message" placeholder="Enter your message" ></textarea>
    </div>
    <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>
    <input type="reset" class="btn btn-danger" value="Clear" />
  </form>
</div>
</div>
