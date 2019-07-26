<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="">

  <meta name="author" content="">

  <meta http-equiv='cache-control' content='no-cache'>

  <meta http-equiv='expires' content='0'>

  <meta http-equiv='pragma' content='no-cache'>

  <link rel="icon" href="../../../../favicon.ico">

  <!-- CSRF Token -->

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>BelTechnology</title>

  <!-- <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}"> -->

  <link rel="stylesheet" type="text/css" href="{{url('assets/dist/css/bootstrap.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('assets/inventory/css/dashboard.css')}}">

  <!-- <link rel="stylesheet" type="text/css" href="{{url('assets/inventory/css/status-level.css')}}"> -->

  <!-- Datatables -->

  <link rel="stylesheet" type="text/css" href="{{url('assets/inventory/css/datatables/css/jquery.dataTables.min.css')}}">

  <!-- bootstrap-dropdown-select -->

  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-dropdown-select/dist/css/bootstrap-select.css')}}">

  <!-- /bootstrap-dropdown-select-->

  <link rel="stylesheet" type="text/css" href="{{url('assets/css/create-order/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{url('assets/css/status-order/style.css')}}">

  <style type="text/css">

  body{color:#484746;font-family:Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;font-size:16px!important}body.hidden,div.hidden{display:none}.sticky-top{position:sticky}.alert-danger,.alert-success{top:10px}.nav{margin-top:20px}.attachment{list-style:none}.attachment li img{background-position:center left;background-repeat:no-repeat;height:35px;display:inline-block;padding-top:10px}.dataTable td,.dataTable th{max-width:250px;min-width:70px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}@media (min-width:600px){.modal-lg{max-width:95%}}@media (min-width:801px){.G{max-width:80%}}@media (min-width:1025px){.modal-lg{max-width:80%}}@media (min-width:1281px){.modal-lg{max-width:80%}}.modal-dialog{overflow-y:initial!important}.modal-body{overflow-y:auto;max-height:75vh}.section-divider{border-top:1px solid #ccc!important;text-align:center}.section-divider span{color:#000!important;display:inline-block;position:relative;padding:0 17px;top:-11px;font-size:15px}#confirmNo,#confirmYes,.visuallyhidden{display:none}.admin-form .tab-content .section-divider span,.admin-form.panel .section-divider span,.admin-form.tab-content .section-divider span,.section-divider span{background:#fff!important}.verify{margin-top:4px;margin-left:9px;position:absolute;width:16px;height:16px}.error{color:red;font-size:12px;margin-top:5px;margin-bottom:0}.inputTxtError{border:1px solid red;color:#0e0e0e}.tabs-wrap{margin-top:40px}.tab-content .tab-pane{padding:20px 0}.dot-danger,.dot-success,.dot-warning{padding:3px;border-radius:100px;font-size:8pt}.custom{width:100%!important}.multi-row{background:#eee;margin-bottom:10px}.dot-success{background-color:#28a745;border-color:#28a745;color:#fff}.dot-danger{background-color:#dc3545;border-color:#dc3545;color:#fff}.dot-warning{color:#212529;background-color:#ffc107;border-color:#ffc107}.current,.sidebar .nav-link{color:#fff}::-webkit-input-placeholder{font-size:13px!important}:-moz-placeholder{font-size:13px!important}::-moz-placeholder{font-size:13px!important}.wizard-progress{list-style:none;padding:0;margin-top:20px;float:right;white-space:nowrap;margin-bottom:30px}.wizard-progress li{float:left;margin-right:22px;text-align:center;position:relative;width:100px}.wizard-progress .step-name{display:table-cell;height:32px;vertical-align:bottom;text-align:center;width:100px;background-color:#dcdcdc;font-size:9pt}.wizard-progress .step-name-wrapper{display:table-cell;height:100%;vertical-align:bottom}.wizard-progress .active-step-num,.wizard-progress .step-num{font-size:14px;width:26px;display:inline-block;margin-top:10px}.current{background-color:#333!important;font-weight:700}.wizard-progress .active-step-num{border:3px solid #333;border-radius:50%;background:#fff}.current-click{background-color:#dcdcdc!important}.wizard-progress .step-num{border:3px solid #dcdcdc;border-radius:50%;background-color:#fff}.wizard-progress .active-step-num:after,.wizard-progress .step-num:after{content:"";display:block;background:#dcdcdc;height:5px;position:absolute;bottom:10px}.wizard-progress .active-step-num:after{width:99px;width:74%;left:63px}.wizard-progress .step-num:after{width:99px;width:100%;left:66px}.wizard-progress li:last-of-type .step-num:after{display:none}.wizard-progress .active-step .step-num{background-color:#218838;font-weight:700;color:#fff}table.order-detail>tbody>tr>th{width:35%}.wizard-progress{width:100%}.wizard-progress li{margin:0!important;padding:0!important;display:inline-block}#form-field-modal-eight,#form-field-modal-eleven,#form-field-modal-five,#form-field-modal-four,#form-field-modal-nine,#form-field-modal-one,#form-field-modal-seven,#form-field-modal-six,#form-field-modal-ten,#form-field-modal-thirteen,#form-field-modal-three,#form-field-modal-twelve,#form-field-modal-two,.hide,.price-field-hide{display:none}.disabled-link{pointer-events:none;background-color:#dcdcdc;border-color:#dcdcdc}.navbar{border-bottom:2px solid rgba(0,0,0,.1)}.sidebar-sticky{background:#28304c}.navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:transparent;box-shadow:none}

</style>

</head>

<body class="hidden">

  <div id="main-content">

    <nav class="navbar navbar-white sticky-top bg-white flex-md-nowrap p-0">

      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">

        <img alt="" src="{{ url('assets/images/BELTEC-logo.png') }}" style="width: 50%;"/>

      </a>

      <ul class="navbar-nav px-3">

        <li class="nav-item text-nowrap">

          <a href="{{ route('logout') }}" onclick="event.preventDefault();

          document.getElementById('logout-form').submit();">

          Logout

        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

          {{ csrf_field() }}

        </form>

      </li>

    </ul>

  </nav>

  <div class="container-fluid" id="main">

    <div class="row">

      <nav class="col-md-2 d-none d-md-block bg-light sidebar">

        <div class="sidebar-sticky">

          <ul class="nav flex-column">

            <li class="nav-item">

              <a class="nav-link" href="{{url('admin/dashboard')}}">

                <span data-feather="folder"></span> Dashboard

              </a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="{{url('admin/client')}}">

                <span data-feather="users"></span> Client

              </a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="{{url('admin/supplier')}}">

                <span data-feather="calendar"></span> Supplier

              </a>

            </li>

            <li class="nav-item">

              <a class="nav-link" href="{{url('admin/orders')}}">

                <span data-feather="list"></span> Orders

              </a>

            </li>

          </ul>

        </div>

      </nav>

      @yield('content')

    </div>

    <!-- bootstrap-dropdown-select -->

    <script src="{{url('assets/bootstrap-dropdown-select/dist/js/jquery.min.js')}}"></script>

    <script src="{{url('assets/bootstrap-dropdown-select/dist/js/popper.min.js')}}"></script>

    <script src="{{url('assets/bootstrap-dropdown-select/dist/js/bootstrap.min.js')}}"></script>

    <script src="{{url('assets/bootstrap-dropdown-select/dist/js/bootstrap-select.js')}}"></script>

    <!-- step 3 -->

    <script src="{{url('assets/library/create-order/form-handler.js')}}"></script>

    <script src="{{url('assets/library/create-order/click-to-new-add-product.js')}}"></script>

    <script src="{{url('assets/library/create-order/click-to-add-treatment-for-product.js')}}"></script>

    <script src="{{url('assets/library/status-order/click-to-add-treatment-for-product-no-price.js')}}"></script>

    <script src="{{url('assets/library/status-order/click-to-new-add-product.js')}}"></script>

    <script src="{{url('assets/library/status-order/click-to-new-add-product-with-no-price.js')}}"></script>

    <script src="{{url('assets/library/status-order/click-to-add-treatment-for-product.js')}}"></script>

    <!-- <script src="{{url('assets/library/status-order/ckeditor-design.js')}}"></script> -->

    <script src="{{url('assets/library/orderview/modal-close.js')}}"></script>

    <!-- step 1 -->

    <script src="{{url('assets/library/orderview/status-1/generate-quotation-request.js')}}"></script>

    @if(!empty($client_names) AND !empty($suppliers))

    @for ($i=0; $i < count($client_names) ; $i++)

    <?php $optids[] = $client_ids[$i]; ?>

    <?php $optnames[] = $client_names[$i]; ?>

    @endfor

    @for ($i=0; $i < count($suppliers) ; $i++)

    <?php $supnames = $suppliers; ?>

    @endfor

    <script type="text/javascript">

    var ids = <?php echo json_encode($optids); ?>;

    var names = <?php echo json_encode($optnames); ?>;

    function clientOptions(ids, names) {

      var options = [], _options;

      for (var i = 0; i < ids.length; i++) {

        var option = '<option id="selected_client_name" value="' + ids[i] + '">'+ names[i] + '</option>';

        options.push(option);

      }

      _options = options.join('');

      $('#client')[0].innerHTML = _options;

      // $('#client-order-details')[0].innerHTML = _options;

    }

    clientOptions(ids, names);

    </script>

    <script type="text/javascript">

    function supplierOptions() {

      var options = [], _options;

      var supnames = <?php echo json_encode($supnames); ?>;  // get supplier names

      for (var i = 0; i < supnames.length; i++) {

        var option = '<option value="' + supnames[i] + '">'+ supnames[i] + '</option>';

        options.push(option);

      }

      _options = options.join('');

      $('#orderSuppier')[0].innerHTML = _options;

      // $('#orderSuppierdetails')[0].innerHTML = _options;

    }

    supplierOptions();

  </script>

  @endif

  <!-- bootstrap-dropdown-select -->

  <!-- /bootstrap-dropdown-select-->

  <!-- <script src="{{asset('assets/js/app.js') }}"></script> -->

  <!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->

  <!-- <script src="{{url('assets/ajax/libs/jquery/3.2.1/jquery.js')}}"></script> -->

  <!-- Datatables js -->

  <script src="{{url('assets/inventory/css/datatables/js/jquery-1.12.4.js')}}"></script>

  <script src="{{url('assets/inventory/css/datatables/js/jquery.dataTables.min.js')}}"></script>

  <!-- END Datatables js -->

  <script src="{{url('assets/library/beltech-ajaxsubmit-modal.js')}}"></script>

  <script src="{{url('assets/library/use-beltech-ajaxsubmit-modal.js')}}"></script>

  <script src="{{url('assets/library/beltech-window-open-email-ajax.js')}}"></script>

  <script src="{{url('assets/library/beltech-order-checklists.js')}}"></script>

  <script src="{{url('vendor/unisharp/laravel-ckeditor/tools/ckeditor/ckeditor.js') }}"></script>

  <!-- Icons -->

  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  <script>

  feather.replace()

</script>

<script type="text/javascript">

/*

* topMenuList: removes current-click class from previous menu

* pageWhenCliked: hide unwanted pages

* clickedList: adds current color for current clicked menu

* currentPageSelector: current page to show

* editUrl: edit form url

* formClass: class name of the form

* modalLg: modalbox

*/

// function pluginMenuWithPage(topMenuList, pageWhenCliked, checkedList, currentPageSelector, editUrl, formClass, modalLg, formFindButton, returnPage){

function pluginMenuWithPage(topMenuList, pageWhenCliked, checkedList, currentPageSelector, editUrl, formClass){

  $.each(topMenuList, function(key, value){

    $(value).find('span:nth(1)').removeClass('current-click');

  });

  $.each(pageWhenCliked, function(key, value){

    $(value).hide();

  });

  if ($(checkedList).find('span:nth(1)').hasClass('current')){

    $('.cancel').hide();

    // Do something if class exists

    $(checkedList).find('span:nth(1)').removeClass('current-click');

  } else {

    $('.cancel').show();

    // Do something if class does not exist

    $(checkedList).find('span:nth(1)').addClass('current-click');

  }

  $(currentPageSelector).show();

  $(formClass).attr('action', editUrl);

}

function setCaretPosition(ctrl, pos){

  if(ctrl.setSelectionRange)

  {

    ctrl.focus();

    ctrl.setSelectionRange(pos,pos);

  }

  else if (ctrl.createTextRange) {

    var range = ctrl.createTextRange();

    range.collapse(true);

    range.moveEnd('character', pos);

    range.moveStart('character', pos);

    range.select();

  }

} 

$("#new-order").click(function(){

  $('.modal').each(function(i, n){

    // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

    $(this).find('#form-field-modal-default-one').addClass('hide');

    $(this).find('#form-field-modal-default-two').addClass('hide');

    $(this).find('#form-field-modal-default-three').addClass('hide');

    $(this).find('#form-field-modal-default-four').addClass('hide');

    $(this).find('#form-field-modal-default-five').addClass('hide');

    $(this).find('#form-field-modal-default-six').addClass('hide');

    $(this).find('#form-field-modal-default-seven').addClass('hide');

    $(this).find('#form-field-modal-default-eight').addClass('hide');

    $(this).find('#form-field-modal-default-nine').addClass('hide');

    $(this).find('#form-field-modal-default-ten').addClass('hide');

    $(this).find('#form-field-modal-default-eleven').addClass('hide');

    $(this).find('#form-field-modal-default-twelve').addClass('hide');

    $(this).find('#form-field-modal-default-thirteen').addClass('hide');

    $(this).find('#form-field-modal-default-fourteen').addClass('hide');

    $(this).find('#form-field-modal-default-new-order').removeClass('hide');

    $(this).find('#top-menu').addClass('hide');

    var NewOrder =  $(this).find('#form-field-modal-default-new-order');

    NewOrder.removeClass('hide');

    NewOrder.css('display','block');

    var ostore_url = '{{ url("admin/ostore") }}';

    NewOrder.find('form').attr('action', ostore_url);

    NewOrder.find('form').attr('id', 1); //restore id value use for ajax post

    // NewOrder.find('form')[0].reset();

    // NewOrder.find('form').get(0).reset();

    $("div.inluded").css('display', 'none');

    resetErrors();

  });

});

function resetErrors() {

  $('form input, form select, form textarea').removeClass('inputTxtError');

  $('label.error').remove();

}

// $(document).on('keypress','#order_number_from_client', function(event){

// $("#order_number_from_client").keypress(function(event) {

//     var character = String.fromCharCode(event.keyCode);

//     return isValidWithForwarSlashes(character);

// });

// $("#order_number_from_supplier").keypress(function(event) {

//     var character = String.fromCharCode(event.keyCode);

//     return isValidWithForwarSlashes(character);

// });

function Validate(event) {

  var regex = new RegExp("^[0-9-!@#$%*?]");

  var key = String.fromCharCode(event.charCode ? event.which : event.charCode);

  if (!regex.test(key)) {

    event.preventDefault();

    return false;

  }

}

function isValidWithForwarSlashes(str) {

  return /^[0-9-!@#$%*?\/]+$/g.test(str);

}

// prevent special characters

$("#company_number, #supplier_number").keypress(function(event) {

  var character = String.fromCharCode(event.keyCode);

  return isValid(character);

});

function isValid(str) {

  return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);

}

$(document).ready(function() {

  $('body.hidden, div.hidden').fadeIn(1000).removeClass('hidden');

});

$("body").on('keydown', '#clientAddress, #supplierPrimaryContactName, #primaryContactName, #supplierContactFirstName', function() {

  var inputValue = $(this).val();

  $("#primaryContactName, #supplierContactFirstName, #clientAddress, #supplierPrimaryContactName").val(inputValue);

});

$(".btn-lost").on('click', function(e){

  e.preventDefault();

  var APP_URL = {!! json_encode(url('/')) !!}

  var order_id = $(this).attr('data-id');

  var status = $(this).attr('data-status');

  var alertmsg = $(this).attr('data-msg');

  if(confirm(alertmsg)){

    $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

    });

    $.ajax({

      url: APP_URL+'/admin/lost/'+order_id,

      type: 'POST',

      dataType: 'json',

      // processData: true, // set it to false if will using new FormData(this).

      // cache: false,

      // contentType: true, // set it to false if will using new FormData(thi   s).

      data: { order_status: status}, // use this to belong file input because if use serialize fike type not belongs and it hards for ajax to save the uploaded file

      success: function(data) {

        if(data.success){

          location.reload();

        }

      }

    });

  }

});

// window popup.

$("form#post-generate-quotation-request").beltechwindowOpenEmailAjax({

  alertmsg: "Quotation sent to client",

  // imgurl: '<img src="{{url('/assets/images/ajax-loader.gif') }}" /> Processing request'

});

// #######################################################################   set quote request #######################################################################

$("form#post-generate-quotation-request-form").beltechwindowOpenEmailAjax({

  alertmsg: "Request for quotation from suppliers",

  imgurl: "<img src='{{url('/assets/images/ajax-loader.gif') }}' /> Processing request",

  progressbar: "#progressbar",

  originaltext: "original-text",

  // statusmsg   : 'QUOTE REQUEST',

  // datatarget  : '.quote-request-sent-to-supplier',

  reload: false,

  // tablename: "table#orders"

});

// #######################################################################   set quote request #######################################################################

$("form#post-send-confirmation-to-supplier").beltechwindowOpenEmailAjax({

  alertmsg: "Send confirmation to supllier.",

  // imgurl: '<img src="{{url('/assets/images/ajax-loader.gif') }}" /> Processing request'

});

$("#form#post-generate-client-confirmation").beltechwindowOpenEmailAjax({

  alertmsg: "Generate confirmation to suppier doc.",

  imgurl: "<img src='{{url('/assets/images/ajax-loader.gif') }}' /> Processing request",

  progressbar: "#progressbar",

  originaltext: "original-text",

  // statusmsg   : 'QUOTE REQUEST',

  // datatarget  : '.quote-request-sent-to-supplier',

  reload: false,

  // tablename: "table#orders"

});

// end 6,7,8

//9,10,11,12

$("form#post-generate-delivery-document").beltechwindowOpenEmailAjax({

  alertmsg: "Sent delivery document to supplier",

  imgurl: "<img src='{{url('/assets/images/ajax-loader.gif') }}' /> Processing request",

  progressbar: "#progressbar",

  originaltext: "original-text",

  // statusmsg   : 'QUOTE REQUEST',

  // datatarget  : '.quote-request',

  reload: false,

  // tablename: "table#orders"

});

//13,14,15

$("form#post-generate-invoice").beltechwindowOpenEmailAjax({

  alertmsg: "Sent delivery document to supplier",

  imgurl: "<img src='{{url('/assets/images/ajax-loader.gif') }}' /> Processing request",

  progressbar: "#progressbar",

  originaltext: "original-text",

  // statusmsg   : 'QUOTE REQUEST',

  // datatarget  : '.quote-request',

  reload: false,

  // tablename: "table#orders"

});

// $(".order_product_append").hide();

$(function() {

  // $(".modal").modal('hidden');

  var selected_client_name = [];

  var xb = 0;

  $(".openModalLink").click(function() {

    resetErrors();

    var cid = $(this).data('clientid');

    var id = $(this).attr('id');

    // alert(clientid);

    var orderlist = $(this).attr('dataorderlist');

    var target = $(this).attr('data-target');

    var td = $(this).text();

    if(target == '.quote-request-received-from-client'){

      $(".price-field").css({'display':'none'});

      var currentSelector = $("div#form-field-modal-default-one");

    }

    if(target == '.quote-request-sent-to-supplier'){

      $(".price-field").css({'display':'none'});

      var currentSelector = $("div#form-field-modal-default-two");

    }

    if(target == '.quote-supplier-received'){

      $(".price-field").css({'display':'block'});

      var currentSelector = $("div#form-field-modal-default-three");

    }

    if(target == '.quote-sent-to-client'){

      var currentSelector = $("div#form-field-modal-default-four");

    }

    if(target == '.quote-acceptance-from-client'){

      var currentSelector = $("div#form-field-modal-default-five");

    }

    if(target == '.send-confirmation-to-supplier'){

      var currentSelector = $("div#form-field-modal-default-six");

    }

    if(target == '.upload-confirmation-supplier-doc'){

      var currentSelector = $("div#form-field-modal-default-seven");

    }

    if(target == '.generate-confirmation-to-client'){

      var currentSelector = $("div#form-field-modal-default-eight");

    }

    if(target == '.goods-sent-from-supplier'){

      var currentSelector = $("div#form-field-modal-default-nine");

    }

    if(target == '.good-received-from-supplier'){

      $('form').get(0).reset();

      resetErrors();

      var currentSelector = $("div#form-field-modal-default-ten");

    }

    if(target == '.goods-sent-to-client'){

      var currentSelector = $("div#form-field-modal-default-eleven");

    }

    if(target == '.invoice-received'){

      var currentSelector = $("div#form-field-modal-default-twelve");

    }

    if(target == '.invoice-sent'){

      var currentSelector = $("div#form-field-modal-default-thirteen");

    }

    if(target == '.invoice-paid'){

      var currentSelector = $("div#form-field-modal-default-fourteen");

    }

    function uniqId() {

      return Math.round(new Date().getTime() + (Math.random() * 100));

    }

    var uniqId = uniqId();

    //cancel

    // update status history

    var main = $("ol.wizard-progress");

    main.find('li > div').each(function(i, n){

      var modalLg = $(this).parent().parent().parent().parent().find(".form-field-modal-default").parent();

      // modalLg.css('border','1px solid red');

      // modalLg.find(".form-field-modal-one").find("button.cancel-one").css('border','1px solid red');

      var hide = '';

      $(this).on('click', function(){

        if($(this).attr('data-id')== 'one'){

          // $("div.add_treatment_button").parent().parent().hide();

          // $(".append-treatment").hide();

          // $(".btn-treatment").hide();

          // $(".t-price").hide();

          // alert(1);

          var hide = "hide";

          $(".price-field").css({'display':'none'});

          $(".add_field_products").addClass('remove');

          // $('[name="order_price[]]"]').hide();

          // $('[name="order_price[]"]').parent().find('label').hide();

          var clickedList = "ol.wizard-progress li:nth-child(1)";

          var topMenuList = [

            "ol.wizard-progress li:nth-child(2)",

            "ol.wizard-progress li:nth-child(3)",

            "ol.wizard-progress li:nth-child(4)",

            "ol.wizard-progress li:nth-child(5)",

            "ol.wizard-progress li:nth-child(6)",

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          var pageWhenCliked = [

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-one";

          // var editUrl = "{{url('admin/update-order-status')}}/" + id;

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-one-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

          modalLg.find(".form-field-modal-one > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-one").hide();

            currentSelector.show();

          });

        }

        if($(this).attr('data-id')== 'two'){

          // $("div.add_treatment_button").parent().parent().hide();

          // $(".append-treatment").hide();

          // $(".btn-treatment").hide();

          var hide = "hide";

          $(".price-field").css({'display':'none'});

          $(".add_field_products").addClass('remove');

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(2)";

          var topMenuList = [

            "ol.wizard-progress li:nth-child(3)",

            "ol.wizard-progress li:nth-child(4)",

            "ol.wizard-progress li:nth-child(5)",

            "ol.wizard-progress li:nth-child(6)",

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-two";

          var editUrl = "{{url('admin/processing')}}/" + id;

          // var editUrl = "{{url('admin/update-order-status')}}/" + id;

          var formClass = ".form-two-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-two > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-two").hide();

            currentSelector.show();

          });

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'three'){

          // $("#cancel").hide();

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          var hide = "hide";

          // alert(3);

          $(".price-field").css({'display':'block'});

          $(".add_field_products").removeClass('remove');

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(3)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(4)",

            "ol.wizard-progress li:nth-child(5)",

            "ol.wizard-progress li:nth-child(6)",

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-three";

          // var editUrl = "{{url('admin/update-order-status')}}/" + id;

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-three-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-three > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-three").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'four'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          var hide = "hide";

          $('div.order_product_append').find('input.order_price_update').parent().removeClass('hide');

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(4)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(5)",

            "ol.wizard-progress li:nth-child(6)",

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-four";

          // var editUrl = "{{url('admin/update-order-status')}}/" + id;

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-four-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-four > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-four").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'five'){

          $("div.add_treatment_button").parent().parent().show();

          $(".append-treatment").show();

          $(".btn-treatment").show();

          // alert(5);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(5)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(6)",

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-five";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-five-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-five > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-five").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'six'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(6);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(6)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(7)",

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-six";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-six-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-six > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-six").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'seven'){

          // alert(7);

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(7)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(8)",

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-seven";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-seven-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-seven > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-seven").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'eight'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(8);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(8)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(9)",

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-eight";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-eight-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-eight > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-eight").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'nine'){

          // alert(9);

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(9)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(10)",

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ]

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-fourteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-nine";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-nine-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-nine > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-nine").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'ten'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(10);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(10)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(11)",

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-fourteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-ten";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-ten-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-ten > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-ten").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'eleven'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(11);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(11)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(12)",

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-twelve",

            ".form-field-modal-thirteen",

            ".form-field-modal-fourteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-eleven";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-eleven-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-eleven > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-eleven").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        if($(this).attr('data-id')== 'twelve'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(12);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(12)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(13)",

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-thirteen",

            ".form-field-modal-fourteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-twelve";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-twelve-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-twelve > form > .modal-footer > button.cancel").on('click',function(){

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-twelve").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

        // 13

        if($(this).attr('data-id')== 'thirteen'){

          $("div.add_treatment_button").parent().parent().show();

          // $(".append-treatment").show();

          // $(".btn-treatment").show();

          // alert(13);

          $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeClass('current-click');

          $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeClass('current-click');

          var clickedList = "ol.wizard-progress li:nth-child(13)";

          // remove class current-click'

          var topMenuList = [

            "ol.wizard-progress li:nth-child(14)"

          ];

          // hide other page

          var pageWhenCliked = [

            ".form-field-modal-one",

            ".form-field-modal-two",

            ".form-field-modal-three",

            ".form-field-modal-four",

            ".form-field-modal-five",

            ".form-field-modal-six",

            ".form-field-modal-seven",

            ".form-field-modal-eight",

            ".form-field-modal-nine",

            ".form-field-modal-ten",

            ".form-field-modal-eleven",

            ".form-field-modal-twelve",

            // ".form-field-modal-fourteen",

            ".form-field-modal-default"

          ];

          var currentPageSelector = ".form-field-modal-thirteen";

          var editUrl = "{{url('admin/processing')}}/" + id;

          var formClass = ".form-thirteen-update";

          pluginMenuWithPage(topMenuList, pageWhenCliked, clickedList, currentPageSelector, editUrl, formClass);

          modalLg.find(".form-field-modal-thirteen > form > .modal-footer > button.cancel").on('click',function(){

            // alert(13);

            $(".active-step-num").removeClass('current-click');

            $(".form-field-modal-thirteen").hide();

            currentSelector.show();

          });

          // rest validation errors/ remove history of validation from previous form

          $('form input, form select, form textarea').removeClass('inputTxtError');

          $('label.error').remove();

        }

      });

    });

    // get column position

    var column_num = parseInt($(this).parent("table#orders td").index()) + 1;

    // get row position

    var row_num = parseInt($(this).parent("table#orders td").parent().index()) + 1;

    $('#modal').find('quote-modal').attr('class', target);

    $('#set-quote').text($(this).text());

    if (target.substr(1) == 'quote-request-received-from-client') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-one').removeClass('hide');

      });

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class');

      // removes attr data-id

      // indicate that the this lines are active, and can click from 1 only

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // mga hindi pa pwede i click

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      // remove attr data-id na hindi pa pwede i click or gamitin 2-12

      //except this line because it is active

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(1)" ).attr('class','active-step');

      // append to form as specific column count val and specific row count val

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/continue-send-order-status-one") }}/' + id; //oquotedreceived

      var ostore_url = '{{ url("admin/processing") }}/' + id; //oquotedreceived

    }

    // 2/3

    if (target.substr(1) == 'quote-request-sent-to-supplier') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-two').removeClass('hide');

      });

      // removes attr data-id

      // indicate that the this lines are active, and can click from 1 only

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // mga hindi pa pwede i click

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      // remove attr data-id na hindi pa pwede i click or gamitin 2-12

      //except this line because it is active

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(1)" ).attr('class','active-step');

      // append to form as specific column count val and specific row count val

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/quote-request-2424") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    if (target.substr(1) == 'quote-supplier-received') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-three').removeClass('hide');

      });

      // removes attr data-id

      // indicate that the this lines are active, and can click from 1 only

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').addClass('active-step');

      // mga hindi pa pwede i click

      // $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      // $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('step-num');

      // remove attr data-id na hindi pa pwede i click or gamitin 2-12

      // $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').css('border','1px solid red').removeAttr('data-id'); //except this line because it is active

      // $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(3)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/quote-sup-received") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 4/5

    if (target.substr(1) == 'quote-sent-to-client') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-four').removeClass('hide');

      });

      // ACTIVE MENU

      // MENU NA PWEDE I KLIK, indicate that the this lines are active, and can click from 1-5

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id para ma klik ang previous at current menu

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      // remove attr data-id na hindi pa pwede i click or gamitin 6-12

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(4)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/quote-sent") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    if (target.substr(1) == 'quote-acceptance-from-client') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-five').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-6

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(5)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/quote-acceptance") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 6

    if (target.substr(1) == 'send-confirmation-to-supplier') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-six').removeClass('hide');

      });

      // alert(7);

      // indicate that the this lines are active, and can click from 1-6

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num')

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(6)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/send-confirmation-to-supplier") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 7

    if (target.substr(1) == 'upload-confirmation-supplier-doc') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-seven').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-6

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num')

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      // $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(7)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/goods-received-from-client") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 8

    if (target.substr(1) == 'generate-confirmation-to-client') {

      // $('.gcc_8').addClass('disabled-link');

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-eight').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      // $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(8)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/goods-sent-from-supplier") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 9

    if (target.substr(1) == 'goods-sent-from-supplier') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-nine').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      // $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(9)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/good-received-from-supplier") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    if (target.substr(1) == 'good-received-sup') {

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(10)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/good-received-sup") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 10

    if (target.substr(1) == 'good-received-from-supplier') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#form-field-modal-default-new-order').css('display','none');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-ten').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(10)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      var ostore_url = '{{ url("admin/processing") }}/' + id;

      // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;

    }

    // 11

    if (target.substr(1) == 'goods-sent-to-client') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-eleven').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').attr('data-id', 'eleven');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      //

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(11)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      var ostore_url = '{{ url("admin/processing") }}/' + id;

      // var ostore_url = '{{ url("admin/upload-supplier-invoice") }}/' + id;

      // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;

    }

    // 12

    if (target.substr(1) == 'invoice-received') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-twelve').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').attr('data-id', 'eleven');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').attr('data-id', 'twelve');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(12)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/upload-invoice-sent") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    // 13

    if (target.substr(1) == 'invoice-sent') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-thirteen').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(13)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').attr('data-id', 'eleven');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').attr('data-id', 'twelve');

      $( "ol.wizard-progress li:nth-child(13)" ).find('span:nth(1)').parent('div').attr('data-id', 'thirteen');

      // remove attr data-id na hindi pa pwede i click or gamitin 7-12

      // $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(13)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $( "ol.wizard-progress li:nth-child(14)" ).find('span:nth(1)').parent('div').removeAttr('data-id');

      // $(".form-field-modal-thirteen").hide();

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(13)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      var ostore_url = '{{ url("admin/processing") }}/' + id;

      // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;

    }

    // 14

    if (target.substr(1) == 'invoice-paid') {

      $('form')[0].reset();

      $('.modal').each(function(i, n){

        // $(this).find('.modal-title').text('QUOTE REQUEST RECEIVED from Client');

        $(this).find('#form-field-modal-default-new-order').addClass('hide');

        $(this).find('#top-menu').removeClass('hide');

        $(this).find('#form-field-modal-default-fourteen').removeClass('hide');

      });

      // indicate that the this lines are active, and can click from 1-8

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(13)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num');

      $( "ol.wizard-progress li:nth-child(14)" ).find('span:nth(1)').removeAttr('class').addClass('active-step-num').addClass('current');

      // i restore and attribute data-id from 1-6 para magamit

      // form the previous attributes data-id is deleted na hindi pa available para i click

      // restore attr data-id from previous history, ngayon pwede na i click

      $( "ol.wizard-progress li:nth-child(1)" ).find('span:nth(1)').parent('div').attr('data-id', 'one');

      $( "ol.wizard-progress li:nth-child(2)" ).find('span:nth(1)').parent('div').attr('data-id', 'two');

      $( "ol.wizard-progress li:nth-child(3)" ).find('span:nth(1)').parent('div').attr('data-id', 'three');

      $( "ol.wizard-progress li:nth-child(4)" ).find('span:nth(1)').parent('div').attr('data-id', 'four');

      $( "ol.wizard-progress li:nth-child(5)" ).find('span:nth(1)').parent('div').attr('data-id', 'five');

      $( "ol.wizard-progress li:nth-child(6)" ).find('span:nth(1)').parent('div').attr('data-id', 'six');

      $( "ol.wizard-progress li:nth-child(7)" ).find('span:nth(1)').parent('div').attr('data-id', 'seven');

      $( "ol.wizard-progress li:nth-child(8)" ).find('span:nth(1)').parent('div').attr('data-id', 'eight');

      $( "ol.wizard-progress li:nth-child(9)" ).find('span:nth(1)').parent('div').attr('data-id', 'nine');

      $( "ol.wizard-progress li:nth-child(10)" ).find('span:nth(1)').parent('div').attr('data-id', 'ten');

      $( "ol.wizard-progress li:nth-child(11)" ).find('span:nth(1)').parent('div').attr('data-id', 'eleven');

      $( "ol.wizard-progress li:nth-child(12)" ).find('span:nth(1)').parent('div').attr('data-id', 'twelve');

      $( "ol.wizard-progress li:nth-child(13)" ).find('span:nth(1)').parent('div').attr('data-id', 'thirteen');

      $( "ol.wizard-progress li:nth-child(14)" ).find('span:nth(1)').parent('div').attr('data-id', 'fourteen');

      $( "ol.wizard-progress li").removeClass('active-step');

      $( "ol.wizard-progress li:nth-child(13)" ).attr('class','active-step');

      $('[name="row_num"]').val(row_num);

      $('[name="column_index"]').val(column_num);

      // var ostore_url = '{{ url("admin/upload-supplier-invoice") }}/' + id;

      var ostore_url = '{{ url("admin/processing") }}/' + id;

    }

    data = $.parseJSON(orderlist);

    $.each(data, function(i, item) {

      if (item.id == id) {

        // alert(item.id);

        $(".btn-lost").attr('data-id', id);

        if (item.goods_from_client_received.length > 0) {

          $("#gr").prop("checked", true);

        }

        if (item.goods_sent_to_supplier.length > 0) {

          $("#gss").prop("checked", true);

        }

        if (item.goods_received_from_supplier.length > 0) {

          $("#grs").prop("checked", true);

        }

        if (item.good_sent_to_client.length > 0) {

          $("#gs").prop("checked", true);

        }

        if (target.substr(1) == 'quote-request-sent-to-supplier') {

          $('.' + target.substr(1)).find('#gqr').hide();

        }

        $('.' + target.substr(1)).find('form').attr('action', ostore_url).attr('data-id', id);

        var form = new FormData();

        form.append(item.upload_quotation_received, $('input[type=file]')[0].files[0]);

        $('.' + target.substr(1)).find('[name="id"]').val(item.id);

        $('.' + target.substr(1)).find('#client-order-details').find('option[value="' + item.client_id + '"]').attr("selected", true);

        $('.' + target.substr(1)).find('#client-order-details').parent().find('.filter-option-inner').text(item.order_clients);

        $('.' + target.substr(1)).find('[name="order_supplier"]').find('option[value="' + item.order_supplier + '"]').attr("selected", true);

        $('.' + target.substr(1)).find('[name="order_supplier"]').parent().find('.filter-option-inner').text(item.order_supplier);

        if (item.order_status == 'GENERATE CONFIRMATION TO CLIENT') {

          $('.' + target.substr(1)).find('#gdd').parent('div.mb-3').css({

            'display': 'none'

          });

        }

        if (item.order_status == 'GOOD RECEIVED SUP') {

          if(item.order_exclusivity_status == 1){

            $('.' + target.substr(1)).find('#has_exclusivity').val(item.order_exclusivity_status);

            $('.' + target.substr(1)).find('#gdd').parent('div.mb-3').css({

              'display': 'none'

            });

          }

        }

        if (item.order_status == 'INVOICE SENT') {

          $('.' + target.substr(1)).find('.upload_delivery_document').css({

            'display': 'none'

          });

          $('.' + target.substr(1)).find('.upload_delivery_document-btn').css({

            'display': 'none'

          });

        } else {

          $('.' + target.substr(1)).find('.upload_delivery_document').css({

            'display': 'block'

          });

          $('.' + target.substr(1)).find('.upload_delivery_document-btn').css({

            'display': 'block'

          });

        }

        $('.' + target.substr(1)).find('#transport_price_orderdetails').val(item.transport_price);

        $('.' + target.substr(1)).find('[name="order_subject"]').val(item.order_subject);

        $('.' + target.substr(1)).find('#order_subject').val(item.order_subject);

        $('.' + target.substr(1)).find('#order_technicaldetails').val(item.order_technicaldetails);

        $('.' + target.substr(1)).find('#order_technicaldetails').text(item.order_technicaldetails);

        $('.' + target.substr(1)).find('#order_price').text(item.order_price);

        $('.' + target.substr(1)).find('#order_amount').text(item.order_amount);

        $('.' + target.substr(1)).find('#order_price').val(item.order_price);

        $('.' + target.substr(1)).find('#orderid').val(item.id);

        $('.' + target.substr(1)).find('#order_subject').val(item.order_subject);

        $('.' + target.substr(1)).find('#order_number_from_client').val(item.order_number_from_client);

        $('.' + target.substr(1)).find('#order_number_from_supplier').val(item.order_number_from_supplier);

        $('.' + target.substr(1)).find('#order_subject').val(item.order_subject);

        $('.' + target.substr(1)).find('#transport_company').val(item.transport_company);

        $('.' + target.substr(1)).find('#transport_price').val(item.transport_price);

        $('.' + target.substr(1)).find('#delivery_time').val(item.delivery_time);

        $('.' + target.substr(1)).find('#orderCommissionRate').val(item.orderCommissionRate);

        //text

        $('.' + target.substr(1)).find('#transport_price_orderdetails').text(item.transport_price);

        var order_details = item.order_details;

        var arrorder_details = order_details.split("-");

        var i;

        var items = [];

        for (i = 0; i < arrorder_details.length; ++i) {

          items.push('<ul><li>'+arrorder_details[i]+'</li></ul>');

        }

        $('.' + target.substr(1)).find('#order_details').append(items.join(''));

        $('.' + target.substr(1)).find('#order_price').text(item.order_price);

        $('.' + target.substr(1)).find('#orderid').text(item.id);

        $('.' + target.substr(1)).find('#order_number_from_client').text(item.order_number_from_client);

        $('.' + target.substr(1)).find('#order_number_from_supplier').text(item.order_number_from_supplier);

        $('.' + target.substr(1)).find('#transport_company').text(item.transport_company);

        $('.' + target.substr(1)).find('#transport_price').text(item.transport_price);

        $('.' + target.substr(1)).find('#delivery_time').text(item.delivery_time);

        $('.' + target.substr(1)).find('#orderCommissionRate').text(item.orderCommissionRate);

        $('.' + target.substr(1)).find('#orderReferenceNumber').val(item.order_reference_number);

        $('.' + target.substr(1)).find('#orderCommissionRate').val(item.order_commission_rate);

        $('.' + target.substr(1)).find('#orderSupplier').val(item.order_supplier);

        $('.' + target.substr(1)).find('td#order_supplier').text(item.order_supplier);

        $('.' + target.substr(1)).find('td#order_clients').text(item.order_clients);

        $('.' + target.substr(1)).find('td#order_subject').text(item.order_subject);

        $('.' + target.substr(1)).find('td#order_product').text(item.order_product);

        $('.' + target.substr(1)).find('td#orderAmount').text(item.order_amount);

        $('.' + target.substr(1)).find('td#orderAmount').val(item.order_amount);

        // edit staus level

        $('.' +target.substr(1)).find('[name="order_product"]').val(item.order_product);

        $('.' +target.substr(1)).find('[name="order_amount"]').val(item.order_amount);

        $('.' + target.substr(1)).find('#select_order_supplier').find('option[value="' + item.order_supplier + '"]').attr("selected", true);

        $('.' + target.substr(1)).find('[name="order_supplier"]').val(item.order_supplier);

        var finalvalue = 0;

        var partsOfStr = item.order_product.split(',');

        for (i = 0; i < partsOfStr.length; i++) {

          finalvalue += partsOfStr[i];

        }

        var product = $('.' + target.substr(1)).find('#orderProduct').val(item.order_product);

        var amount = $('.' + target.substr(1)).find('#orderAmount').val(item.order_amount);

        $('.' + target.substr(1)).find('td#orderAmount').text(item.order_amount);

        $('.' + target.substr(1)).find('#client').val(item.order_clients);

        var client = $('.' + target.substr(1)).find('#client').find('option[value="' + item.order_clients + '"]').attr("selected", true);

        var supplier = $('.' + target.substr(1)).find('#orderSuppier').find('option[value="' + item.order_supplier + '"]').attr("selected", true);

        $('.' + target.substr(1)).find('td#orderSuppier').text(item.order_supplier);

        $('.' + target.substr(1)).find('#exclusivityStatus').find('option[value="' + item.order_exclusively_status + '"]').attr("selected", true);

        // for quote recieved and request

        var URL = '{{url("/admin/generate-quotation-request-form")}}/' + id + '/' + item.order_supplier + '/' + row_num + '/' + column_num;

        $('.' + target.substr(1)).find('.gqr').attr('href', URL);

        $('.' + target.substr(1)).find('.gqr').attr('row_num', row_num);

        $('.' + target.substr(1)).find('.gqr').attr('column_num', column_num);

        $('.' + target.substr(1)).find('.gqr').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gqr').attr('data-order-client_id', item.client_id);

        $('.' + target.substr(1)).find('.gqr').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gqr').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gqr').attr('data-order-amount', amount.val());

        $('.' + target.substr(1)).find('.gqr').attr('data-order-client', client.val());

        //

        var URL = '{{url("/admin/generate-quotation-request")}}/' + id + '/' + item.client_id;

        // alert( URL);

        $('.' + target.substr(1)).find('.gq').attr('href', URL);

        $('.' + target.substr(1)).find('.gq').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gq').attr('data-order-client_id', item.client_id);

        $('.' + target.substr(1)).find('.gq').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gq').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gq').attr('data-order-amount', amount.val());

        $('.' + target.substr(1)).find('.gq').attr('data-order-client', client.val());

        //gsc

        var URL = '{{url("/admin/send-confirmation-to-supplier")}}/' + id + '/' + item.order_supplier;

        $('.' + target.substr(1)).find('.gsc').attr('href', URL);

        $('.' + target.substr(1)).find('.gsc').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gsc').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gsc').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gsc').attr('data-order-amount', amount.val());

        // for gcc

        var URL = '{{url("/admin/generate-client-confirmation")}}/' + id + '/' + item.client_id;

        $('.' + target.substr(1)).find('.gcc').attr('href', URL);

        $('.' + target.substr(1)).find('.gcc').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gcc').attr('data-order-client_id', item.client_id);

        $('.' + target.substr(1)).find('.gcc').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gcc').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gcc').attr('data-order-amount', amount.val());

        var URL = '{{url("/admin/generate-delivery-document")}}/' + id;

        $('.' + target.substr(1)).find('.gdd').attr('href', URL);

        $('.' + target.substr(1)).find('.gdd').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gdd').attr('data-order-client_id', item.client_id);

        $('.' + target.substr(1)).find('.gdd').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gdd').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gdd').attr('data-order-amount', amount.val());

        var URL = '{{url("/admin/generate-invoice")}}/' + id;

        // alert(URL);

        $('.' + target.substr(1)).find('.gi').attr('href', URL);

        $('.' + target.substr(1)).find('.gi').attr('data-order-id', id);

        $('.' + target.substr(1)).find('.gi').attr('data-order-client_id', item.client_id);

        $('.' + target.substr(1)).find('.gi').attr('data-order-supplier', supplier.val());

        $('.' + target.substr(1)).find('.gi').attr('data-order-product', product.val());

        $('.' + target.substr(1)).find('.gi').attr('data-order-amount', amount.val());

        // ####### START status level 1, 2, 3 #########################################################################################################

        $('.' + target.substr(1)).find('[name="transport"]').val(item.transport);

        $('.' + target.substr(1)).find('[name="transport_price"]').val(item.transport_price);

        $('.' + target.substr(1)).find("td.transport_price").text(item.transport_price);

        $('.' + target.substr(1)).find('[name="delivery_time"]').val(item.delivery_time);

        $('.' + target.substr(1)).find('td.transport').text(item.transport);

        $('.' + target.substr(1)).find('td.delivery_time').text(item.delivery_time);

        // view one

        $('.' + target.substr(1)).find('.order_client').text(item.order_clients);

        $('.' + target.substr(1)).find('.order_supplier').text(item.order_supplier);

        $('.' + target.substr(1)).find('.order_subject').text(item.order_subject);

        $('.' + target.substr(1)).find('td.order_details').html(item.order_details);

        //product

        var order_product = item.order_product;

        var order_product = order_product.split(",");

        // amount

        var order_amount = item.order_amount;

        var order_amount = order_amount.split(",");

        // material

        var order_material = item.order_material;

        var order_material = order_material.split(",");

        // technical drawing

        var order_technical_drawingreference = item.order_technical_drawingreference;

        var order_technical_drawingreference = order_technical_drawingreference.split(",");

        // dimensionweight

        var order_dimensionweight = item.order_dimensionweight;

        var order_dimensionweight = order_dimensionweight.split(",");

        // for order status  1, 2

        $.ajax({

          type: "GET",

          url: "<?php echo URL::to('/'); ?>/admin/order-modal-product-update-no-price/"+item.id,

          success: function(response){

            $('.' + target.substr(1)).find('div#treatment_form_no_price').append(response);

          }

        });

        $.ajax({

          type: "GET",

          url: "<?php echo URL::to('/'); ?>/admin/order-lists-noprice/"+item.id,

          success: function(response){

            $('.' + target.substr(1)).find('td > div.order_product_noprice').append(response);

          }

        });

        // for order status 3,4,5 ...

        $.ajax({

          type: "GET",

          url: "<?php echo URL::to('/'); ?>/admin/order-lists-hasprice/"+item.id,

          success: function(response){

            // console.log('asf: ' +response);

            $('.' + target.substr(1)).find('td > div.order_product').append(response);

          }

        });

        $.ajax({

          type: "GET",

          url: "<?php echo URL::to('/'); ?>/admin/order-modal-product-update-has-price/"+item.id,

          success: function(response){

            $('.' + target.substr(1)).find('div#treatment_form').append(response);

          }

        });

        $.ajax({

          type: "GET",

          url: "<?php echo URL::to('/'); ?>/admin/order-treatment-lists/"+item.id,

          success: function(response){

            $('.' + target.substr(1)).find('td > div.order_treatment').append(response);

          }

        });

        var order_treatment = item.order_treatment;

        var order_treatment_details = item.order_treatment_details;

        var order_treatment_price = item.order_treatment_price;

        var results = order_treatment.concat(order_treatment_details, order_treatment_price);

        var results2 = $.extend({}, order_treatment, order_treatment_details, order_treatment_price);

        var treatment = '['+results+']';

        var treatment_info = [];

        var treatment_product =[];

        var order_treatment_details = item.order_treatment_details;

        if(order_treatment_details){

          for (i = 0; i < order_treatment_details.length; ++i) {

            $('.' + target.substr(1)).find('td.order_treatment').append('<div class="mb-3 treatment">' +order_treatment_details[i]+'</div>');

          }

        }

        var order_treatment = item.order_treatment;

        var order_treatment_price = item.order_treatment_price;

        var i;

        var items_update = [];

        if(order_treatment){

          for (i = 0; i < order_treatment.length; ++i) {

            $('.' + target.substr(1)).find('td.order_treatment').find('div:nth('+i+')').css('background-color', '#eee').before('<b><u>'+order_treatment[i]+'</u></b>');

          }

        }

        // [UPDATE]

        $('.' + target.substr(1)).find('[name="order_supplier"]').val(item.order_supplier);

        $('.' + target.substr(1)).find('[name="order_clients"]').val(item.order_clients);

        $('.' + target.substr(1)).find('[name="order_subject"]').val(item.order_subject);

        var add_count = [];

        // #################### order details one

        $('.' +target.substr(1)).find('td.order_details-one-update').html('<textarea name="order_details" id="order_details_one_update_'+uniqId+'" class="form-control ckeditor" required="required">'+item.order_details+'</textarea>');

        var textareaId = 'order_details_one_update_'+uniqId;

        var column = item.order_details;

        validateCkeditor(textareaId, column);

        // #################### end order details one

        // #################### order details two

        $('.' +target.substr(1)).find('td.order_details-two-update').append('<textarea name="order_details" id="order_details_two_update_'+uniqId+'" class="form-control ckeditor" required="required">'+item.order_details+'</textarea>');

        var textareaId = 'order_details_two_update_'+uniqId;

        var column = item.order_details;

        validateCkeditor(textareaId, column);

        // #################### end order details two

        var order_treatment_details = item.order_treatment_details;

        var max_fields = 9999;

        // #################### order treatment details one update

        $(".add_field_button_update_one_update").on('click',function(e) {

          if (x < max_fields) {

            x++;

            counter = x;

            $(".input_fields_wrap_treatment-update_one_update").find("#treatment-detail-update_one_update").append(

              '<div class="mb-3">'+

              '<button type="button" class="close remove_field" aria-label="Close">' +

              '<span aria-hidden="true">&times;</span>' +

              '</button>' +

              '<div class="mb-3">'+

              '<input type="text" class="form-control" name="order_treatment[]" placeholder="Title"><br/>'+

              '</div>'+

              '<div class="mb-3">'+

              '<textarea name="order_treatment_details[]" id="order_treatment_one_update_update_'+counter+'_'+uniqId+'" class="form-control"></textarea><br/>'+

              '</div>'+

              '<div class="mb-3">'+

              '<input type="hidden" class="form-control" name="order_treatment_price[]" placeholder="Price" required><br/>'+

              '</div>'+

              '</div>');

              CKEDITOR.replace('order_treatment_one_update_update_'+counter+'_'+uniqId, {toolbarStartupExpanded : false} );

            }

          });

          $(".input_fields_wrap_treatment-update_one_update").find("#treatment-detail-update_one_update").on("click", ".remove_field", function(e) {

            e.preventDefault();

            $(this).parent('div').remove();

            x--;

          });

          // #################### end order treatment details one update

          // #################### order treatment details two update

          $(".add_field_button_update_two_update").on('click',function(e) {

            if (x < max_fields) {

              x++;

              counter = x;

              $(".input_fields_wrap_treatment-update_two_update").find("#treatment-detail-update_two_update").append(

                '<div class="mb-3">'+

                '<button type="button" class="close remove_field" aria-label="Close">' +

                '<span aria-hidden="true">&times;</span>' +

                '</button>' +

                '<div class="mb-3">'+

                '<input type="text" class="form-control" name="order_treatment[]" placeholder="Title"><br/>'+

                '</div>'+

                '<div class="mb-3">'+

                '<textarea name="order_treatment_details[]" id="order_treatment_two_update_update_'+counter+'_'+uniqId+'" class="form-control"></textarea><br/>'+

                '</div>'+

                '<div class="mb-3">'+

                '<input type="hidden" class="form-control" name="order_treatment_price[]" placeholder="Price" required><br/>'+

                '</div>'+

                '</div>');

                CKEDITOR.replace('order_treatment_two_update_update_'+counter+'_'+uniqId, {toolbarStartupExpanded : false});

              }

            });

            $(".input_fields_wrap_treatment-update_two_update").find("#treatment-detail-update_two_update").on("click", ".remove_field", function(e) {

              e.preventDefault();

              $(this).parent('div').remove();

              x--;

            });

            // #################### end order treatment details two update

            // #################### order treatment details three update

            $(".add_field_button_update_three_update").on('click',function(e) {

              if (x < max_fields) {

                x++;

                counter = x;

                $(".input_fields_wrap_treatment-update_three_update").find("#treatment-detail-update_three_update").append(

                  '<div class="mb-3">'+

                  '<button type="button" class="close remove_field" aria-label="Close">' +

                  '<span aria-hidden="true">&times;</span>' +

                  '</button>' +

                  '<div class="mb-3">'+

                  '<input type="text" class="form-control" name="order_treatment[]" placeholder="Title"><br/>'+

                  '</div>'+

                  '<div class="mb-3">'+

                  '<textarea name="order_treatment_details[]" id="order_treatment_three_update_update_'+counter+'_'+uniqId+'" class="form-control"></textarea><br/>'+

                  '</div>'+

                  '<div class="mb-3">'+

                  '<input type="number" step="any" min="0.00" class="form-control" name="order_treatment_price[]" placeholder="Price" required>'+

                  '</div>'+

                  '</div>');

                  CKEDITOR.replace('order_treatment_three_update_update_'+counter+'_'+uniqId, {toolbarStartupExpanded : false});

                }

              });

              $(".input_fields_wrap_treatment-update_three_update").find("#treatment-detail-update_three_update").on("click", ".remove_field", function(e) {

                e.preventDefault();

                $(this).parent('div').remove();

                x--;

              });

              // #################### end order treatment details three update

              // #################### order treatment details four update

              $(".add_field_button_update_four_update").on('click',function(e) {

                if (x < max_fields) {

                  x++;

                  counter = x;

                  $(".input_fields_wrap_treatment-update_four_update").find("#treatment-detail-update_four_update").append(

                    '<div class="mb-3">'+

                    '<button type="button" class="close remove_field" aria-label="Close">' +

                    '<span aria-hidden="true">&times;</span>' +

                    '</button>' +

                    '<div class="mb-3">'+

                    '<input type="text" class="form-control" name="order_treatment[]" placeholder="Title"><br/>'+

                    '</div>'+

                    '<div class="mb-3">'+

                    '<textarea name="order_treatment_details[]" id="order_treatment_four_update_update_'+counter+'_'+uniqId+'" class="form-control"></textarea><br/>'+

                    '</div>'+

                    '<div class="mb-3">'+

                    '<input type="number" step="any" min="0.00" class="form-control" name="order_treatment_price[]" placeholder="Price" required>'+

                    '</div>'+

                    '</div>');

                    CKEDITOR.replace('order_treatment_four_update_update_'+counter+'_'+uniqId);

                  }

                });

                $(".input_fields_wrap_treatment-update_four_update").find("#treatment-detail-update_four_update").on("click", ".remove_field", function(e) {

                  e.preventDefault();

                  $(this).parent('div').remove();

                  x--;

                });

                // #################### end order treatment details four update

                // #################### order treatment details three view

                // on step_3.js

                // #################### end order treatment details three view

                // #################### order treatment details four view

                $(".add_field_button_update_four_view").on('click',function(e) {

                  if (x < max_fields) {

                    x++;

                    counter = x;

                    $(".input_fields_wrap_treatment-update_four_view").find("#treatment-detail-update_four_view").append(

                      '<div class="mb-3">'+

                      '<button type="button" class="close remove_field" aria-label="Close">' +

                      '<span aria-hidden="true">&times;</span>' +

                      '</button>' +

                      '<div class="mb-3">'+

                      '<input type="text" class="form-control" name="order_treatment[]" placeholder="Title"><br/>'+

                      '</div>'+

                      '<div class="mb-3">'+

                      '<textarea name="order_treatment_details[]" id="order_treatment_four_update_view_'+counter+'_'+uniqId+'" class="form-control"></textarea><br/>'+

                      '</div>'+

                      '<div class="mb-3">'+

                      '<input type="number" step="any" min="0.00" class="form-control" name="order_treatment_price[]" placeholder="Price" required><br/>'+

                      '</div>'+

                      '</div>');

                      CKEDITOR.replace('order_treatment_four_update_view_'+counter+'_'+uniqId);

                    }

                  });

                  $(".input_fields_wrap_treatment-update_four_view").find("#treatment-detail-update_four_view").on("click", ".remove_field", function(e) {

                    e.preventDefault();

                    $(this).parent('div').remove();

                    x--;

                  });

                  // #################### end order treatment details four view

                  // #################### order treatment details three

                  // checks if order_treatment_details exists

                  if(order_treatment_details){

                    for (i = 0; i < order_treatment_details.length; ++i) {

                      // ### one update

                      var wrapper_one = $('.' + target.substr(1)).find('td > div.order_treatment-one-update').append(

                        '<div class="mb-3" style="border-bottom:1px solid #eee;">'+

                        '<div class="mb-3" style="padding-bottom: 20px;">'+

                        '<button type="button" class="close remove_field" aria-label="Close">' +

                        '<span aria-hidden="true">&times;</span>' +

                        '</button>'+

                        '</div>'+

                        '<div class="mb-3" style="padding: .375rem .75rem; font-size: 1rem; line-height: 1.5;color: #495057; background-color: #fff; background-clip: padding-box;border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">'+

                        '<textarea name="order_treatment_details[]" id="order_treatment_one_update_update_'+uniqId+'_'+[i]+'" class="form-control" required="required">'+order_treatment_details[i]+'</textarea>'+

                        '</div>'+

                        '<div class="mb-3">'+

                        '<input type="hidden" class="form-control" name="order_treatment_price[]" placeholder="Price" required><br/>'+

                        '</div>'+

                        '</div>');

                        $(wrapper_one).on("click", ".remove_field", function(e) {

                          e.preventDefault();

                          $(this).parent('div').parent('div').remove();

                          x--;

                        });

                        var textareaId = 'order_treatment_one_update_update_'+uniqId+'_'+[i];

                        var column = order_treatment_details[i];

                        validateCkeditor(textareaId, column);

                        // ### end one update

                        // ### two update

                        var wrapper_two = $('.' + target.substr(1)).find('td > div.order_treatment-two-update').append(

                          '<div class="mb-3" style="border-bottom:1px solid #eee;">'+

                          '<div class="mb-3" style="padding-bottom: 20px;">'+

                          '<button type="button" class="close remove_field" aria-label="Close">' +

                          '<span aria-hidden="true">&times;</span>' +

                          '</button>'+

                          '</div>'+

                          '<div class="mb-3" style="padding: .375rem .75rem; font-size: 1rem; line-height: 1.5;color: #495057; background-color: #fff; background-clip: padding-box;border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">'+

                          '<textarea name="order_treatment_details[]" id="order_treatment_two_update_update_'+uniqId+'_'+[i]+'" class="form-control" required="required">'+order_treatment_details[i]+'</textarea>'+

                          '</div>'+

                          '<div class="mb-3">'+

                          '<input type="hidden" class="form-control" name="order_treatment_price[]" placeholder="Price" required><br/>'+

                          '</div>'+

                          '</div>');

                          $(wrapper_two).on("click", ".remove_field", function(e) {

                            e.preventDefault();

                            $(this).parent('div').remove();

                            x--;

                          });

                          var textareaId = 'order_treatment_two_update_update_'+uniqId+'_'+[i];

                          var column = order_treatment_details[i];

                          validateCkeditor(textareaId, column);

                          // ### end two update

                          // ### three update

                          var wrapper_three = $('.' + target.substr(1)).find('td > div.order_treatment-three-update').append(

                            '<div class="mb-3" style="border-bottom:1px solid #eee;">'+

                            '<div class="mb-3" style="padding-bottom: 20px;">'+

                            '<button type="button" class="close remove_field" aria-label="Close">' +

                            '<span aria-hidden="true">&times;</span>' +

                            '</button>'+

                            '</div>'+

                            '<div class="mb-3" style="padding: .375rem .75rem; font-size: 1rem; line-height: 1.5;color: #495057; background-color: #fff; background-clip: padding-box;border: 1px solid #ced4da; border-radius: .25rem; transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;">'+

                            '<textarea name="order_treatment_details[]" id="order_treatment_three_update_update_'+uniqId+'_'+[i]+'" class="form-control" required="required">'+order_treatment_details[i]+'</textarea>'+

                            '</div>'+

                            '</div>');

                            $(wrapper_three).on("click", ".remove_field", function(e) {

                              e.preventDefault();

                              $(this).parent('div').remove();

                              x--;

                            });

                            var textareaId = 'order_treatment_three_update_update_'+uniqId+'_'+[i];

                            var column = order_treatment_details[i];

                            validateCkeditor(textareaId, column);

                            // ### end three update

                            // ### three view

                            var wrapper_three_view = $('.' + target.substr(1)).find('td > div.order_treatment-three').append(

                              '<div class="mb-3" style="border-bottom:1px solid #eee;">'+

                              '<button type="button" class="close remove_field" aria-label="Close">' +

                              '<span aria-hidden="true">&times;</span>' +

                              '</button>' +

                              '<div class="mb-3">'+

                              '<textarea three_view name="order_treatment_details[]" id="order_treatment_three_update_view_'+uniqId+'_'+[i]+'" class="form-control" required="required">'+order_treatment_details[i]+'</textarea>'+

                              '</div>'+

                              '</div>');

                              $(wrapper_three_view).on("click", ".remove_field", function(e) {

                                e.preventDefault();

                                $(this).parent('div').remove();

                                x--;

                              });

                              var textareaId = 'order_treatment_three_update_view_'+uniqId+'_'+[i];

                              var column = order_treatment_details[i];

                              validateCkeditor(textareaId, column);

                              // ### end three view

                              $('.' + target.substr(1)).find('td.order_treatment-four').find('table').append(

                                '<tr>'+

                                '<th>Title: </th>'+

                                '<td>'+order_treatment[i]+'</td>'+

                                '</tr>'+

                                '<tr>'+

                                '<th>Details: </th>'+

                                '<td>'+order_treatment_details[i]+'</td>'+

                                '</tr>'+

                                '<tr>'+

                                '<th>Price: </th>'+

                                '<td>'+order_treatment_price[i]+'</td>'+

                                '</tr>'+

                                '<tr>'+

                                '<td>&nbsp;</td>'+

                                '</tr>');

                                // }

                              }

                            }

                            if(order_treatment){

                              for (i = 0; i < order_treatment.length; ++i) {

                                $('.' + target.substr(1)).find('td > div.order_treatment-one-update').find('textarea:nth('+[i]+')').parent('div').before('<div class="mb-3 i"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" value="'+order_treatment[i]+'" placeholder="Treatment"/></div>');

                                $('.' + target.substr(1)).find('td > div.order_treatment-two-update').find('textarea:nth('+[i]+')').parent('div').before('<div class="mb-3 j"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" value="'+order_treatment[i]+'" placeholder="Treatment"/></div>');

                                $('.' + target.substr(1)).find('td > div.order_treatment-three-update').find('textarea:nth('+[i]+')').parent('div').before('<div class="mb-3 k"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" value="'+order_treatment[i]+'" placeholder="Treatment"/></div>');

                                $('.' + target.substr(1)).find('td > div.order_treatment-three').find('textarea:nth('+[i]+')').before('<div class="mb-3 m"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" value="'+order_treatment[i]+'" placeholder="Treatment"/></div>');

                              }

                            }else{

                              $('.' + target.substr(1)).find('td > div.order_treatment-two-update').find('textarea').parent('div').before('<div class="mb-3 p"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" placeholder="Treatment"/></div>');

                              $('.' + target.substr(1)).find('td > div.order_treatment-three-update').find('textarea').parent('div').before('<div class="mb-3 q"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" placeholder="Treatment"/></div>');

                              $('.' + target.substr(1)).find('td > div.order_treatment-three').find('textarea').parent('div').before('<div class="mb-3 s"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" placeholder="Treatment"/></div>');

                              $('.' + target.substr(1)).find('td > div.order_treatment-four').find('textarea').before('<div class="mb-3 t"><input type="text" class="form-control" id="order_treatment" name="order_treatment[]" placeholder="Treatment"/></div>');

                            }

                            if(order_treatment_details){

                              for (i = 0; i < order_treatment_details.length; ++i) {

                                $('.' + target.substr(1)).find('td > div.order_treatment-three').find('textarea:nth('+[i]+')').parent('div').after('<div class="mb-3 a"><input type="number" step="any" min="0.00" class="form-control" id="order_treatment_price_'+i+'" name="order_treatment_price[]" value="'+order_treatment_price[i]+'" placeholder="Price" required/></div>');

                                $('.' + target.substr(1)).find('td > div.order_treatment-three-update').find('textarea:nth('+[i]+')').parent('div').after('<div class="mb-3 b"><input type="number" step="any" min="0.00" class="form-control" id="order_treatment_price_'+i+'" name="order_treatment_price[]" value="'+order_treatment_price[i]+'" placeholder="Price" required/></div>');

                                $('.' + target.substr(1)).find('td > div.order_treatment-four').find('textarea:nth('+[i]+')').parent('div.4-view').after('<div class="mb-3 d 4-view-price"><input type="number" step="any" min="0.00" class="form-control" id="order_treatment_price_'+i+'" name="order_treatment_price[]" value="'+order_treatment_price[i]+'" placeholder="Price" required/></div>');

                              }

                            }else{

                            }

                            // #################### end order treatment details three

                            // #################### three order details view

                            $('.' +target.substr(1)).find('td.order_details-three').html('<textarea name="order_details" id="order_details_three_view_'+uniqId+'" class="form-control ckeditor">'+item.order_details+'</textarea>');

                            var textareaId = 'order_details_three_view_'+uniqId;

                            var column = item.order_details;

                            validateCkeditor(textareaId, column);

                            // #################### end three order details view

                            // #################### three order technical details view

                            $('.' +target.substr(1)).find('td.order_technicaldetails-three').html('<textarea name="order_technicaldetails" id="order_technicaldetails_three_view_'+uniqId+'" class="form-control ckeditor" required="required">'+item.order_technicaldetails+'</textarea>');

                            var textareaId = 'order_technicaldetails_three_view_'+uniqId;

                            var column = item.order_technicaldetails;

                            validateCkeditor(textareaId, column);

                            // #################### end three technical details view

                            // #################### three order details update

                            $('.' +target.substr(1)).find('td.order_details-three-update').html('<textarea name="order_details" id="order_details_three_update_'+uniqId+'" class="form-control ckeditor">'+item.order_details+'</textarea>');

                            var textareaId = 'order_details_three_update_'+uniqId;

                            var column = item.order_details;

                            validateCkeditor(textareaId, column);

                            // #################### end three order details update

                            // #################### three order technical details update

                            $('.' +target.substr(1)).find('td.order_technicaldetails-three-update').html('<textarea name="order_technicaldetails" id="order_technicaldetails_three_update_'+uniqId+'" class="form-control ckeditor" required="required">'+item.order_technicaldetails+'</textarea>');

                            var textareaId = 'order_technicaldetails_three_update_'+uniqId;

                            var column = item.order_technicaldetails;

                            validateCkeditor(textareaId, column);

                            // #################### end three technical details update

                            // #################### four order details view

                            $('.' +target.substr(1)).find('td.order_details-four').html(item.order_details);

                            // #################### end four order details view

                            // #################### four order technical details view

                            $('.' +target.substr(1)).find('td.order_technicaldetails-four').html(item.order_technicaldetails);

                            // #################### end four technical details view

                            // #################### four order details update

                            $('.' +target.substr(1)).find('td.order_details-four-update').html('<textarea name="order_details" id="order_details_four_update_'+uniqId+'" class="form-control ckeditor">'+item.order_details+'</textarea>');

                            var textareaId = 'order_details_four_update_'+uniqId;

                            var column = item.order_details;

                            validateCkeditor(textareaId, column);

                            // #################### end four order details update

                            // #################### four order technical details update

                            $('.' +target.substr(1)).find('td.order_technicaldetails-four-update').html('<textarea name="order_technicaldetails" id="order_technicaldetails_four_update_'+uniqId+'" class="form-control ckeditor" required="required">'+item.order_technicaldetails+'</textarea>');

                            var textareaId = 'order_technicaldetails_four_update_'+uniqId;

                            var column = item.order_technicaldetails;

                            validateCkeditor(textareaId, column);

                            // #################### end four technical details update

                            var order_treatment = item.order_treatment;

                            // console.log(order_treatment);

                            // var order_treatment = order_treatment.split(",");

                            var order_treatment_price = item.order_treatment_price;

                            // var order_treatment_price = order_treatment_price.split(",");

                            var i =0;

                            var items = [];

                            var x =0;

                            // end three

                            // end one

                            if(order_treatment_details){

                              for (i = 0; i < order_treatment_details.length; ++i) {

                                /* ################## TWO ##################*/

                                var wrapperx_2 = $('.' +target.substr(1)).find('td.order_treatment-two-update').append('<div class="mb-3" style="background:#eee;">'+

                                '<button type="button" class="close remove_field" aria-label="Close">' +

                                '<span aria-hidden="true">&times;</span>' +

                                '</button>' +

                                '<textarea name="order_treatment_details[]" id="order_treatment_two_update_'+[i]+'" class="form-control ckeditor">'+order_treatment_details[i]+'</textarea><br/></div>');

                                $(wrapperx_2).on("click", ".remove_field", function(e) {

                                  e.preventDefault();

                                  $(this).parent('div').remove();

                                  x--;

                                });

                                if (CKEDITOR.instances['order_treatment_two_update_'+[i]]) {

                                  CKEDITOR.remove(CKEDITOR.instances['order_treatment_two_update_'+[i]]);

                                } else{

                                  if(order_treatment_details[i]){

                                    var editor = CKEDITOR.inline( 'order_treatment_two_update_'+[i] );

                                  }else{

                                    CKEDITOR.replace('order_treatment_two_update_'+[i]);

                                  }

                                }

                                $('.' +target.substr(1)).find('td.order_treatment-two-update').find('textarea:nth('+[i]+')').css('background-color', '#eee').before('<input type="text" class="form-control" name="order_treatment[]" value="'+

                                order_treatment[i]+'" placeholder="Treatment" /><br/>');

                                /* ################## END TWO ##################*/

                              }

                            }

                            // ####### END status level 1, 2, 3 #########################################################################################################

                          }

                        });

                      });

                      function resetErrors() {

                        $('form input, form select, form textarea').removeClass('inputTxtError');

                        $('label.error').remove();

                      }

                    });

                    /*

                    * textareaId: ID of textarea needs to convert in CKEDITOR

                    * column: column use to check if has value

                    *

                    */

                    function validateCkeditor(textareaId, column){

                      if(CKEDITOR.instances[textareaId])

                      {

                        CKEDITOR.remove(CKEDITOR.instances[textareaId]);

                      }

                      else

                      {

                        if(column)

                        {

                          CKEDITOR.inline(textareaId, {removePlugins: 'toolbar'});

                        }

                        else

                        {

                          CKEDITOR.replace(textareaId, {toolbarStartupExpanded : false});

                        }

                      }

                    }

                    $('#modal').on('hide', function() {

                      window.location.reload();

                    });

                    //gdd

                    $(".gdd").on('click', function(e) {

                      e.preventDefault();

                      var $this = $(this);

                      var orderid = $(this).attr('data-order-id');

                      var href = $(this).attr('href');

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: href,

                        type: 'POST',

                        data: {

                          order_id: orderid

                        },

                        success: function(data) {

                        }

                      });

                    });

                    $(".gi").on('click', function(e) {

                      e.preventDefault();

                      var $this = $(this);

                      var orderid = $(this).attr('data-order-id');

                      var href = $(this).attr('href');

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: href,

                        type: 'POST',

                        data: {

                          order_id: orderid

                        },

                        success: function(data) {

                        }

                      });

                    });

                    //gq

                    $(".gq").on('click', function(e) {

                      e.preventDefault();

                      var $this = $(this);

                      var $this = $(this);

                      var href = $(this).attr('href');

                      var orderid = $(this).attr('data-order-id');

                      var clientid = $(this).attr('data-order-client_id');

                      var supplier = $(this).attr('data-order-supplier');

                      var product = $(this).attr('data-order-product');

                      var amount = $(this).attr('data-order-amount');

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: href,

                        type: 'POST',

                        success: function(data) {

                          console.log(data);

                        }

                      });

                    });

                    // 6, 7,8

                    $(".gsc").on('click', function(e) {

                      e.preventDefault();

                      var $this = $(this);

                      var href = $(this).attr('href');

                      var orderid = $(this).attr('data-order-id');

                      var clientid = $(this).attr('data-order-client_id');

                      var supplier = $(this).attr('data-order-supplier');

                      var product = $(this).attr('data-order-product');

                      var amount = $(this).attr('data-order-amount');

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: href,

                        type: 'POST',

                        success: function(data) {

                          console.log(data);

                        }

                      });

                    });

                    // gcc

                    $(".gcc").on('click', function(e) {

                      e.preventDefault();

                      var $this = $(this);

                      var href = $(this).attr('href');

                      var orderid = $(this).attr('data-order-id');

                      var clientid = $(this).attr('data-order-client_id');

                      var supplier = $(this).attr('data-order-supplier');

                      var product = $(this).attr('data-order-product');

                      var amount = $(this).attr('data-order-amount');

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: href,

                        type: 'POST',

                        success: function(data) {

                          console.log(data);

                        }

                      });

                    });

                    var windows = {};

                    $('a#eccd').click(function(e) {

                      var url = "{{url('/edit-request-quotation-letter')}}";

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                      }

                    });

                    $("#generate-invoice").submit(function(e) {

                      e.preventDefault();

                      var $this = $(this).find("[type='submit']");

                      $.ajaxSetup({

                        headers: {

                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        }

                      });

                      $.ajax({

                        url: $(this).attr('action'),

                        type: 'POST',

                        dataType: 'json',

                        processData: false,

                        contentType: false,

                        data: new FormData(this),

                        success: function(data) {

                          console.log(data.error);

                          if (data.error) {

                            printErrorMsg('print-error-msg', data.error);

                          }

                        },

                        error: function(data) {

                          if (data.success) {

                            alert('Invoice sent.');

                            window.location.reload();

                          }

                        },

                        complete: function() {

                        },

                      });

                      function printErrorMsg(err, msg) {

                        $('.' + err).find("ul").html('');

                        $('.' + err).css('display', 'block');

                        $.each(msg, function(key, value) {

                          $('.' + err).find("ul").append('<li>' + value + '</li>');

                        });

                      }

                    });

                    var windows = {};

                    $('a.gq').click(function(e) {

                      var url = $(this).attr('href');

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        var w = window.innerWidth;

                        var h = window.innerHeight;

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                        // close child popup window when parent close

                        window.onbeforeunload = function() {

                          popupWindow.close();

                        };

                      }

                    });

                    var windows = {};

                    $('a#eql').click(function(e) {

                      var url = "{{url('/edit-request-quotation-letter')}}";

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                      }

                    });

                    //check for navigation time API support

                    if (window.performance) {

                      console.info("window.performance work's fine on this browser");

                    }

                    if (performance.navigation.type == 1) {

                      console.info("This page is reloaded");

                    } else {

                      console.info("This page is not reloaded");

                    }

                    // six seven eight

                    var windows = {};

                    $("a.gsc").on('click', function(e) {

                      var url = $(this).attr('href');

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        var w = window.innerWidth;

                        var h = window.innerHeight;

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                        // close child popup window when parent close

                        window.onbeforeunload = function() {

                          popupWindow.close();

                        };

                      }

                    });

                    var windows = {};

                    $('a#ecfts').click(function(e) {

                      var url = "{{url('/edit-request-quotation-letter')}}";

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                      }

                    });

                    var windows = {};

                    $("a.gcc").on('click', function(e) {

                      var url = $(this).attr('href');

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        var w = window.innerWidth;

                        var h = window.innerHeight;

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                        // close child popup window when parent close

                        window.onbeforeunload = function() {

                          popupWindow.close();

                        };

                      }

                    });

                    var windows = {};

                    $('a.gdd').click(function(e) {

                      var url = $(this).attr('href');

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        var w = window.innerWidth;

                        var h = window.innerHeight;

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                        // close child popup window when parent close

                        window.onbeforeunload = function() {

                          popupWindow.close();

                        };

                      }

                    });

                    var windows = {};

                    $('a.gi').click(function(e) {

                      var url = $(this).attr('href');

                      var name = $(this).attr('id');

                      if (windows.hasOwnProperty(name) && !windows[name].closed) {

                        windows[name].focus();

                      } else {

                        var w = window.innerWidth;

                        var h = window.innerHeight;

                        windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');

                        // close child popup window when parent close

                        window.onbeforeunload = function() {

                          popupWindow.close();

                        };

                      }

                    });

                    var lstore_form = $('#lstore-form'),

                    qsr = $('#qsr'),

                    chShipBlock = $('#changeShipInputs');

                    chShipBlock.hide();

                    qsr.on('click', function() {

                      if ($(this).is(':checked')) {

                        chShipBlock.show();

                        chShipBlock.find('input').attr('required', true);

                      } else {

                        chShipBlock.hide();

                        chShipBlock.find('input').attr('required', false);

                      }

                    });

                    $("#edit-order").on('click', function(e) {

                      e.preventDefault();

                    });

                    $(document).ready(function() {

                      var max_fields = 9999;

                      var wrapper = $(".input_fields_wrap");

                      var add_button = $(".add_field_button");

                      var x = 1;

                      $(add_button).click(function(e) {

                        e.preventDefault();

                        if (x < max_fields) {

                          x++;

                          $(wrapper).append('<div class="col-md-12 multi-row">' +

                          '<button type="button" class="close remove_field" aria-label="Close">' +

                          '<span aria-hidden="true">&times;</span>' +

                          '</button>' +

                          '<div class="row">' +

                          '<div class="col-md-4 mb-3">' +

                          '<label for="contactPersonFirstName">First name</label>' +

                          '<input type="text" class="form-control" id="contactFirstName" name="contact_person_first_name[]" value="" >' +

                          '<div class="invalid-feedback"> Valid first name is required' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-4 mb-3">' +

                          '<label for="contactPersonLastName">Last name</label>' +

                          '<input type="text" class="form-control" id="contactLastName" name="contact_person_last_name[]" value="" >' +

                          '<div class="invalid-feedback"> Valid last name is required' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-4 mb-3">' +

                          '<label for="contactPersonEmail">Contact Person Email</label>' +

                          '<div class="input-group">' +

                          '<div class="input-group-prepend">' +

                          '<span class="input-group-text">@</span>' +

                          '</div>' +

                          '<input type="email" class="form-control" id="contact_person_email" name="contact_person_email[]">' +

                          '<div class="invalid-feedback" style="width: 100%;">Contact Person Email is required' +

                          '</div>' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="contactPersonTelephone">Contact Person Telephone</label>' +

                          '<input type="text" class="form-control" id="contact_person_telephone" name="contact_person_telephone[]">' +

                          '<div class="invalid-feedback">Please enter your Company Telephone.' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="contactPersonFunction">Function</label>' +

                          '<input type="text" class="form-control" id="contactPersonFunction" name="contact_person_function[]" value="" >' +

                          '<div class="invalid-feedback">  Valid Contact Person Function is required' +

                          '</div>' +

                          '</div>' +

                          '</div>' +

                          '</div>');

                        }

                      });

                      $(wrapper).on("click", ".remove_field", function(e) {

                        e.preventDefault();

                        $(this).parent('div').remove();

                        x--;

                      });

                    });

                    $(document).ready(function() {

                      $(".input_fields_wrap_products").on("change keyup keydown paste propertychange bind mouseover", function() {

                        // calculateSum();

                      });

                      var max_fields = 9999;

                      var wrapper = $(".input_fields_wrap_products").find("#foo");

                      var add_button = $(".add_field_button");

                      var x = 0;

                      $(add_button).click(function(e) {

                        e.preventDefault();

                        if (x < max_fields) {

                          x++;

                          counter = x;

                          var num = counter +1;

                          $(wrapper).append('<div class="add-row" style="margin-bottom:5px; border-top:1px solid #ced4da;">' +

                          '<button type="button" class="close remove_field" aria-label="Close">' +

                          '<span aria-hidden="true">&times;</span>' +

                          '</button>' +

                          '<div class="row">' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="ban">Product '+num+'</label>' +

                          '<input type="text" class="form-control" data-error="order_product.' + counter + '" id="order_product" name="order_product[]">' +

                          '<div class="invalid-feedback">' +

                          'Name on card is required' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="ban">Amount</label>' +

                          '<input type="number" min="1" class="form-control order_amount" data-error="order_amount.' + counter + '" id="order_amount" name="order_amount[]">' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="vn">Material</label>' +

                          '<input type="text" class="form-control" data-error="order_material.' + counter + '" id="order_material" name="order_material[]">' +

                          '<div class="invalid-feedback">' +

                          'Please select Suppier' +

                          '</div>' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="ban">Dimensions/Weight</label>' +

                          '<input type="text" class="form-control" data-error="order_dimensionweight.' + counter + '" id="order_dimensionweight" name="order_dimensionweight[]">' +

                          '</div>' +

                          '<div class="col-md-6 mb-3">' +

                          '<label for="ban">Technical/Drawing Reference</label>' +

                          '<input type="text" class="form-control" data-error="order_technical_drawingreference.' + counter + '" id="order_technical_drawingreference" name="order_technical_drawingreference[]">' +

                          '</div>' +

                          '</div>' +

                          '<input type="hidden" name="ValoreTotale" value="0.00" class= "somma">' +

                          '</div>');

                        }

                        $(".somma").each(function() {

                          $(this).keyup(function() {

                            // calculateSum();

                          });

                        });

                      });

                      $(wrapper).on("click", ".remove_field", function(e) {

                        e.preventDefault();

                        $(this).parent('div').remove();

                        x--;

                      });

                      // treatment detail

                      var max_fields = 9999;

                      var wrapperx = $(".input_fields_wrap_treatment").find("#treatment-detail");

                      var add_button = $(".add_field_buttonx");

                      var x = 0;

                      $(add_button).click(function(e) {

                        e.preventDefault();

                        if (x < max_fields) {

                          x++;

                          counter = x;

                          $(wrapperx).append('<div class="treatment"><hr/>'+

                          '<button type="button" class="close remove_field" aria-label="Close">' +

                          '<span aria-hidden="true">&times;</span>' +

                          '</button>'+

                          '<div class="mb-3">'+

                          '<label for="">Treatment</label>'+

                          '<input type="text" class="form-control" id="order_treatment" name="order_treatment[]"> '+

                          '</div>'+

                          '<div class="mb-3">'+

                          '<label for="orderProduct">Treatment Detail</label>'+

                          '<textarea class="form-control" rows="5" name="order_treatment_details[]" id="order_treatment_details_'+counter+'"></textarea>'+

                          '</div>' +

                          '</div>');

                          // it converts many textareas in ckeditor using append(textarea)

                          CKEDITOR.replace('order_treatment_details_'+counter, {toolbarStartupExpanded : false});

                        }

                      });

                      $(wrapperx).on("click", ".remove_field", function(e) {

                        e.preventDefault();

                        $(this).parent('div').remove();

                        x--;

                      });

                      //  /end treatment detail

                    });

                    $(document).ready(function() {

                      $("#kstore-form, #kupdate-form, #lstore-form, #lupdate-form").submit(function(e) {

                        e.preventDefault();

                        resetErrors();

                        var btn             = $(this).find('[type="submit"]');

                        var originaltext    = "original-text";

                        var imgurl          = "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request";

                        var error_id        = $(this).attr('id');

                        var postData        = $(this).serialize();

                        $.ajax({

                          url: $(this).attr('action'),

                          type: 'POST',

                          data: postData,

                          beforeSend: function() {

                            var loadingText = imgurl;

                            btn.data(originaltext, $(this).html());

                            btn.html(loadingText);

                          },

                          success: function(data) {

                            if ($.isEmptyObject(data.error)) {

                              $.when(btn.html('Form submitted successfully')).done(function() {

                                window.location.reload();

                              });

                            } else {

                              $.each(data.error, function(i, v) {

                                if (v == true) {

                                  location.reload();

                                } else {

                                  var msg = '<label class="error" for="' + i + '">' + v + '</label>';

                                  $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);

                                  btn.html('Send');

                                }

                              });

                              var keys = Object.keys(data);

                              $('input[name="' + keys[0] + '"]').focus();

                            }

                          }

                        });

                      });

                      function resetErrors() {

                        $('form input, form select').removeClass('inputTxtError');

                        $('label.error').remove();

                      }

                    });

                    $(document).ready(function() {

                      var clientTable = $('#klanten').DataTable({

                        "order": [

                          [0, "desc"]

                        ], // 0 is the first row

                        // "orderSequence": ["desc"],

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ],

                        columnDefs: [{

                          targets: 0,

                          render: function(data, type, row) {

                            return data.substr(0, 10);

                          }

                        }]

                      });

                      // klanten

                      $('#klanten tbody tr td#edit_row').on('click', 'a', function() {

                        var data = clientTable.row(this).data();

                        var id = $(this).attr('id');

                        // var url = "{{url('klanten/edit/id/"+id+"')}}";

                        var href = $(this).attr('href');

                        if (confirm("you want to edit this row?")) {

                          window.location.href = url;

                        }

                        return false

                      });

                      $('#klanten tbody tr td#delete_row').on('click', 'a', function() {

                        var data = clientTable.row(this).data();

                        var id = $(this).attr('id');

                        // var url = "{{url('/kdelete/id')}}/"+id;

                        var href = $(this).attr('href');

                        // alert(href);

                        var name = $(this).attr('data-name');

                        if (confirm("Are you sure do you want to delete client name: " + name + " ?")) {

                          window.location.href = href;

                          // location.reload();

                        }

                        return false

                      });

                    });

                    // leveranciers

                    $(document).ready(function() {

                      var supplierTable = $('#leveranciers').DataTable({

                        "order": [

                          [0, "desc"]

                        ],

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ],

                      });

                      // leveranciers

                      $('#leveranciers tbody tr td#edit_row').on('click', 'a', function() {

                        var data = supplierTable.row(this).data();

                        var id = $(this).attr('id');

                        if (confirm("you want to edit this row?")) {

                          window.location.href = url;

                        } else {

                          alert('Why did you press cancel? You should have confirmed');

                        }

                        return false

                      });

                      $('#leveranciers tbody tr td#delete_row').on('click', 'a', function() {

                        var data = supplierTable.row(this).data();

                        var id = $(this).attr('id');

                        var href = $(this).attr('href');

                        var name = $(this).attr('data-name');

                        if (confirm("Are you sure do you want to delete supplier name: " + name + " ?")) {

                          window.location.href = href;

                        }

                        return false

                      });

                    });

                    // orders

                    $(document).ready(function() {

                      var ordersTable = $('#orders').DataTable({

                        "order": [

                          // [0, "desc"]

                        ],

                        // // filter:false,

                        'columnDefs': [

                          // { 'sortable': true, 'searchable': true, 'visible': false, 'type': 'num', 'targets': [3] },

                          // {

                          // orderData: [[0, 'asc'], [3, 'desc']]//sort by age then by salary

                          // }

                          { 'orderData':[3], 'targets': [2] },

                          {

                            'targets': [3],

                            'visible': false,

                            'searchable': false

                          },

                        ],

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ],

                      });

                      var itemsOrdersTable = $('#itemsordered').DataTable({

                        "order": [

                        ],

                        "lengthMenu": [

                          [15, 25, 50, -1],

                          [15, 25, 50, "All"]

                        ],

                      });

                      // leveranciers

                      $('#orders tbody tr td#edit_row').on('click', 'a', function() {

                        var data = ordersTable.row(this).data();

                        var id = $(this).attr('id');

                        if (confirm("you want to edit this row?")) {

                          window.location.href = url;

                        } else {

                          alert('Why did you press cancel? You should have confirmed');

                        }

                        return false

                      });

                      // order row delete

                      $('#orders tbody tr td#delete_order_row').on('click', 'a', function() {

                        var data = ordersTable.row(this).data();

                        var id = $(this).attr('id');

                        // var url = "{{url('/kdelete/id')}}/"+id;

                        var href = $(this).attr('href');

                        // alert(href);

                        var refno = $(this).attr('data-refno');

                        if (confirm("Are you sure do you want to delete this reference number: " + refno + " ?")) {

                          window.location.href = href;

                          // location.reload();

                        }

                        return false

                      });

                    });

                    //

                    $(document).ready(function() {

                      // customer view

                      var table = $('#contact-person-information').DataTable({

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ]

                      });

                      var table = $('#company-related-order').DataTable({

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ]

                      });

                      // end customer view

                      // supplier view

                      var table = $('#supplier-related-order').DataTable({

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ]

                      });

                      // supplier view

                      var table = $('#supplier-person-information').DataTable({

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ]

                      });

                      // end supplier view

                      // order view

                      var table = $('#items-ordered').DataTable({

                        "lengthMenu": [

                          [10, 25, 50, -1],

                          [10, 25, 50, "All"]

                        ]

                      });

                    });

                    // $('span').hasClass('current').css('border','1px solid red');

                    </script>

                    <!-- CKEDITOR -->

                    <script>

                    var elements = CKEDITOR.document.find( 'ckeditor' ),

                    i = 0,

                    element;

                    while ( ( element = elements.getItem( i++ ) ) ) {

                      CKEDITOR.replace( element, {});

                    }

                    // CKEDITOR.replace( order_treatment_details, {toolbarStartupExpanded : false});

                    // CKEDITOR.replace( editor1, {toolbarStartupExpanded : false});

                    </script>

                  </body>

                  </html>

