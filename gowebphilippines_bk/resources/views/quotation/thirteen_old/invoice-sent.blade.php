@extends('layouts.mainpdf')



@section('content')



<div class="container">  

  

  <div class="row">

    

    <div class="col-lg-12">

      

      <br/>

      <br/>

      

      <ul class="nav nav-tabs ul-center" role="tablist">

        

        <li class="nav-item">

          <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">GENERATE INVOICE</a>

        </li>

        <li class="nav-item" style="display:none;">

          <a class="nav-link" data-toggle="tab" href="#home" role="tab">SEND EMAIL TO CLIENT</a>

        </li>

        

      </ul>

      

      <!-- Tab panes -->

      <div class="tab-content">

        

        <div class="tab-pane active" id="profile" role="tabpanel">

          

          <div class="row mt-3">

            <div class="col-md-3 mb-3">

              <div class="form-group">

                <select class="form-control" id="localization">

                  <option value="en">English</option>

                  <option value="fr">French</option>

                  <option value="nl">Dutch</option>

                  <option value="de">German</option>

                </select>

              </div>

            </div>

          </div>

          <!-- en -->

          @include('quotation.thirteen.en')  

          <!-- fr -->

          @include('quotation.thirteen.fr')             
          <!-- de -->

          @include('quotation.thirteen.de')   

          <!-- nl -->

          @include('quotation.thirteen.nl')   

          
        </div>

        <div class="tab-pane" id="home" role="tabpanel">

          

          <br/>

          

          <div class="alert alert-danger form-error-msg" style="display:none;">

            <ul></ul>

          </div>

          

          <form name=f1 id="post-generate-invoice" method="post" action="{{url('/admin/generate-invoice')}}" role="form" enctype="multipart/form-data">

            {{ csrf_field() }}

            

            <input type="hidden" name="order_id" value="{{$orders['id']}}" />

            <input type="hidden" name="client_id" value="{{$orders['client_id']}}" />

            <input type="hidden" name="id" value="{{ $orders['order_id'] }}">

            

            <div class="messages"></div>

            

            <div class="row">

              <div class="form-group col-sm-12">

                <input type="text" placeholder="Supplier Name" class="form-control" id="name" name="name" value="{{ $orders['company_name'] }}" placeholder="Name">

              </div>

              <div class="form-group col-sm-12">

                <?php

                $emails = explode(',',$orders['contact_person_email']);

                $emails[] = $orders['company_email'];

                ?>

                <select class="form-control" name="email" id="type">

                  @foreach(array_reverse($emails, true) as $email)

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

                

                <input type="text" placeholder="Subject" class="form-control" id="subject" name="subject" value="" placeholder="Subject">

              </div>

              <div class="form-group col-sm-12">

                <div id="text">

                  <div>

                    <input type="file" accept="application/pdf" name="attachment[]" class="form-control-file" id="attachment" aria-describedby="fileHelp"/>

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

            <textarea id="message" class="form-control" rows="5" name="message" placeholder="Enter your message"></textarea>

          </div>

          

          <button type="submit" id="form-btn" class="btn btn-success pull-right">Send</button>

          <input type="reset" class="btn btn-danger" value="Clear" />

          

        </form>

        

      </div>

      

    </div>

  </div>

  <!-- /.8 -->

</div>

<!-- /.row-->

</div>

<!-- /.container-->

<script>

CKEDITOR.replace('editor-en',

{

  height: '1000px',

});



CKEDITOR.replace('editor-fr',

{

  height: '1000px',

});



CKEDITOR.replace('editor-nl',

{

  height: '1000px',

});



CKEDITOR.replace('editor-de',

{

  height: '1000px',

});





</script>



@endsection

