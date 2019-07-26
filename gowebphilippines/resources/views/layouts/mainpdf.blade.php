<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bel Technology') }}</title>
        <!-- <link rel="stylesheet" type="text/css" href="{{url('bootstrap/css/bootstrap.min.css')}}"> -->
        <link rel="stylesheet" type="text/css" href="{{url('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/dist/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/inventory/css/dashboard.css')}}">
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/inventory/css/datatables/css/jquery.dataTables.min.css')}}">
        <!-- <link rel="stylesheet" href="{{url('assets/css/beltech.css')}}"> -->

        <!-- bootstrap-dropdown-select -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-dropdown-select/dist/css/bootstrap-select.css')}}">
        <script src="{{url('assets/bootstrap-dropdown-select/dist/js/jquery.min.js')}}"></script>
        <script src="{{url('assets/bootstrap-dropdown-select/dist/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap-dropdown-select/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap-dropdown-select/dist/js/bootstrap-select.js')}}"></script>


        <script src="{{ asset('vendor/unisharp/laravel-ckeditor/tools/ckeditor/ckeditor.js') }}"></script>

        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

        <style type="text/css">
            
        div#fr, div#nl, div#de { display: none; }    
        </style>
       
    </head>
    <body>

    @yield('content')
    
<!-- bootstrap-dropdown-select -->
<!-- footer query  -->
<script src="{{url('assets/bootstrap-dropdown-select/dist/js/jquery.min.js')}}"></script>
<script src="{{url('assets/bootstrap-dropdown-select/dist/js/popper.min.js')}}"></script>
<script src="{{url('assets/bootstrap-dropdown-select/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/bootstrap-dropdown-select/dist/js/bootstrap-select.js')}}"></script>
<script src="{{asset('assets/js/app.js') }}"></script>

<script src="{{url('assets/library/ckeditor-design.js')}}"></script>
<script>
textareCkEditor('editor-en', "<?php echo URL::to('/'); ?>");
textareCkEditor('editor-fr', "<?php echo URL::to('/'); ?>");
textareCkEditor('editor-nl', "<?php echo URL::to('/'); ?>");
textareCkEditor('editor-de', "<?php echo URL::to('/'); ?>");
</script>

@if(!empty($client_names) && !empty($suppliers))

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
    function createOptions(ids, names) {
        var options = [], _options;
        for (var i = 0; i < ids.length; i++) {
            var option = '<option id="selected_client_name" value="' + ids[i] + '">'+ names[i] + '</option>';
            options.push(option);
        }
        _options = options.join('');
        $('#client')[0].innerHTML = _options;
        $('#client-order-details')[0].innerHTML = _options;
    }
    createOptions(ids, names);
    </script>

    <script type="text/javascript">
    function createOptions() {
        var options = [], _options;
        var supnames = <?php echo json_encode($supnames); ?>;  // get supplier names
        for (var i = 0; i < supnames.length; i++) {
            var option = '<option value="' + supnames[i] + '">'+ supnames[i] + '</option>';
            options.push(option);
        }
        _options = options.join('');
        $('#orderSuppier')[0].innerHTML = _options;
        $('#orderSuppierdetails')[0].innerHTML = _options;
    }
    createOptions();
    </script>
@endif
<!-- /bootstrap-dropdown-select-->


<script src="{{url('assets/ajax/libs/jquery/3.2.1/jquery.js')}}"></script>
<!-- Datatables js -->
<script src="{{url('assets/inventory/css/datatables/js/jquery-1.12.4.js')}}"></script>
<script src="{{url('assets/inventory/css/datatables/js/jquery.dataTables.min.js')}}"></script>
<!-- customize by me -->

<script src="{{url('assets/library/beltech-ajaxsubmit-modal.js')}}"></script>
<script src="{{url('assets/library/use-beltech-ajaxsubmit-modal.js')}}"></script>

<script src="{{url('assets/library/beltech-window-open-email-ajax.js')}}"></script>
<script src="{{url('assets/library/use-beltech-window-open-email-ajax.js')}}"></script>
<script src="{{url('assets/library/beltech-order-checklists.js')}}"></script>
<script src="{{url('assets/library/beltech-modal-generate-btn.js')}}"></script>

<link href="{{url('assets/css/bootstrap-editable.css')}}" rel="stylesheet"/>
<script src="{{url('assets/library/bootstrap-editable.js')}}"></script>
<script src="{{url('assets/library/bootstrap-editable.min.js')}}"></script>

<script src="{{url('assets/library/pdf/custom-email.js')}}"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

<script>
 feather.replace()
</script>
<script type="text/javascript">

// var height = $(document).height()-250;  
// $(".modal-body").css({"height": height+'px'});   
            
$('#localization').on('change', function(){

  if (this.value == 'en') {

      $('div#en').css('display', 'block');
      $('div#fr, div#nl, div#de').css('display','none');

  } else if(this.value == 'fr'){

      $('div#fr').css('display', 'block');
      $('div#en, div#nl, div#de').css('display','none');

  } else if(this.value == 'nl'){

      $('div#nl').css('display', 'block');
      $('div#en, div#fr, div#de').css('display','none');

  } else if(this.value == 'de'){

      $('div#de').css('display', 'block');
      $('div#en, div#fr, div#nl').css('display','none');

  }
});

$("#new-order").click(function(){
    resetErrors();      
});    

function resetErrors() {
    $('form input, form select, form textarea').removeClass('inputTxtError');
    $('label.error').remove();
}
// $(document).on('keypress','#order_number_from_client', function(event){
$("#order_number_from_client").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValidWithForwarSlashes(character);
});

function isValidWithForwarSlashes(str) {
    return /^[a-z0-9\/]+$/g.test(str);
}
// prevent special characters
$("#company_number, #supplier_number").keypress(function(event) {
    var character = String.fromCharCode(event.keyCode);
    return isValid(character);
});

function isValid(str) {
    return !/[~`!@#$%\^&*()+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
}

// $("#transport_price, #transport_price_orderdetails").keypress(function(event) {
//     var character = String.fromCharCode(event.keyCode);
//     return isValidWithNumericprice(character);
// });

// function isValidWithNumericprice(str) {
//     return /^[0-9]+$/g.test(str);
// }

$(document).ready(function() {
    $('body.hidden, div.hidden').fadeIn(1000).removeClass('hidden');
});

$("body").on('keydown', '#clientAddress, #supplierPrimaryContactName, #primaryContactName, #supplierContactFirstName', function() {
    var inputValue = $(this).val();
    $("#primaryContactName, #supplierContactFirstName, #clientAddress, #supplierPrimaryContactName").val(inputValue);
});

$.fn.editable.defaults.mode = 'inline';
$(document).ready(function() {
    // company view
    $('.company-view-edit').editable({
        params: function(params) {
            // add additional params from data-attributes of trigger element
            params._token = $("#_token").data("token"); //$('meta[name="csrf-token"]').attr('content');
            params.company_name = $(this).editable().data('company_name');
            params.company_street = $(this).editable().data('company_street');
            params.company_primary_contact = $(this).editable().data('company_primary_contact');
            params.company_zip = $(this).editable().data('company_zip');
            params.company_country = $(this).editable().data('company_country');
            params.company_city = $(this).editable().data('company_city');
            params.company_telephone = $(this).editable().data('company_telephone');
            params.ban = $(this).editable().data('ban');
            params.vn = $(this).editable().data('vn');
            params.company_email = $(this).editable().data('company_email');
            // params.company_telephone = $(this).editable().data('company_telephone');
            params.company_general_fax = $(this).editable().data('company_general_fax');
            params.company_rate = $(this).editable().data('company_rate');
            params.company_sector = $(this).editable().data('company_sector');
            params.contact_lastname = $(this).editable().data('contact_lastname');
            params.contact_first_name = $(this).editable().data('contact_first_name');
            params.contact_email = $(this).editable().data('contact_email');
            params.contact_telephone = $(this).editable().data('contact_telephone');

            return params;
        },
        error: function(response, newValue) {
            if (response.status === 500) {
                return 'Server error. Check entered data.';
            } else {
                return response.responseText;
                // return "Error.";
            }
        }
    });

    // supplier view
    $('.supplier-view-edit').editable({
        params: function(params) {
            // add additional params from data-attributes of trigger element
            params._token = $("#_token").data("token"); //$('meta[name="csrf-token"]').attr('content');
            params.supplier_name = $(this).editable().data('supplier_name');
            params.supplier_street = $(this).editable().data('supplier_street');
            params.supplier_primary_contact = $(this).editable().data('supplier_primary_contact');
            params.supplier_zip = $(this).editable().data('supplier_zip');
            params.supplier_country = $(this).editable().data('supplier_country');
            params.supplier_city = $(this).editable().data('supplier_city');
            params.supplier_telephone = $(this).editable().data('supplier_telephone');
            params.ban = $(this).editable().data('ban');
            params.vn = $(this).editable().data('vn');
            params.supplier_email = $(this).editable().data('supplier_email');
            // params.company_telephone = $(this).editable().data('company_telephone');
            params.supplier_general_fax = $(this).editable().data('supplier_general_fax');
            params.supplier_rate = $(this).editable().data('supplier_rate');
            params.supplier_sector = $(this).editable().data('supplier_sector');
            params.contact_lastname = $(this).editable().data('contact_lastname');
            params.contact_first_name = $(this).editable().data('contact_first_name');
            params.contact_email = $(this).editable().data('contact_email');
            params.contact_telephone = $(this).editable().data('contact_telephone');
            params.contact_function = $(this).editable().data('contact_function');

            return params;
        },
        error: function(response, newValue) {
            if (response.status === 500) {
                return 'Server error. Check entered data.';
            } else {
                return response.responseText;
                // return "Error.";
            }
        }
    });

    $('.order-view-edit').editable({
        params: function(params) {
            // add additional params from data-attributes of trigger element
            params._token = $("#_token").data("token"); //$('meta[name="csrf-token"]').attr('content');
            params.order_status = $(this).editable().data('order_status');
            params.order_product = $(this).editable().data('order_product');
            return params;
        },
        error: function(response, newValue) {
            if (response.status === 500) {
                return 'Server error. Check entered data.';
            } else {
                return response.responseText;
                // return "Error.";
            }
        }
    });
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
    // datatarget  : '.quote-request',
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
    // datatarget  : '.quote-request',
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

$(function() {
    var selected_client_name = [];
    $(".openModalLink").click(function() {
        resetErrors();
        var id = $(this).attr('id');
        // alert(id);
        // console.log($('#modal .modal-content').empty());
        // $(this).removeData('modal-content');

        var orderlist = $(this).attr('data-orderlist');
        var target = $(this).attr('data-target');
        var td = $(this).text();

        // alert(target);

        // get column position
        var column_num = parseInt($(this).parent("table#orders td").index()) + 1;
        // get row position
        var row_num = parseInt($(this).parent("table#orders td").parent().index()) + 1;

        // alert($(this).parent('td').index()); + $(this).parent("table#orders td").find('a').css('color', 'red')
        // console.log(target+ ' column_num: ' + column_num + ' row_num:  ' + row_num+ ' column_text: ' );
        // $(this).parent("table#orders tr").eq(row_num).css('color', 'yellow');
        // $(this).parent('table#orders tr td:nth-child(' + column_num + ')').css("background-color", "#F00");
        // $(this).parent("table#orders td").find('a').css('color', 'red');

        $('#modal').find('quote-modal').attr('class', target);
        $('#set-quote').text($(this).text());

        if (target.substr(1) == 'quote-received') {
            // append to form as specific column count val and specific row count val
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/oquotedreceived") }}/' + id;
        }

        // 2/3
        if (target.substr(1) == 'quote-request') {
            // append to form as specific column count val and specific row count val
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/quote-request") }}/' + id;
        }

        if (target.substr(1) == 'quote-sup-received') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/quote-sup-received") }}/' + id;

        }

        if (target.substr(1) == 'order-details') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/order-details") }}/' + id;
        }

        // 4/5
        if (target.substr(1) == 'quote-sent') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/quote-sent") }}/' + id;
        }

        if (target.substr(1) == 'quote-acceptance') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/quote-acceptance") }}/' + id;
        }

        // 6/7/8
        if (target.substr(1) == 'send-confirmation-to-supplier') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/send-confirmation-to-supplier") }}/' + id;
        }
        if (target.substr(1) == 'upload-confirmation-supplier-doc') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/upload-confirmation-to-supplier-doc") }}/' + id;
        }
        if (target.substr(1) == 'generate-confirmation-to-client-doc') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/generate-confirmation-to-client-doc") }}/' + id;
        }

        // 9/10/11/12
        if (target.substr(1) == 'goods-received') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/goods-recieved") }}/' + id;
            // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;
        }
        if (target.substr(1) == 'goods-sent-sup') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/goods-sent-sup") }}/' + id;
            // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;
        }
        if (target.substr(1) == 'good-received-sup') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/good-received-sup") }}/' + id;
            // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;
        }
        if (target.substr(1) == 'goods-sent') {
            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            var ostore_url = '{{ url("admin/admin/upload-supplier-invoice") }}/' + id;
            // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;
        }

        if (target.substr(1) == 'invoice-sent') {

            $('[name="row_num"]').val(row_num);
            $('[name="column_index"]').val(column_num);
            // var ostore_url = '{{ url("admin/admin/sent-delivery-document-to-supplier") }}/'+id;
            // var ostore_url = '{{ url("admin/ogoodRecievedSent") }}/'+id;
        }

        data = $.parseJSON(orderlist);
        $.each(data, function(i, item) {

            if (item.id == id) {

                // alert(item.id);

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

                if (target.substr(1) == 'quote-request') {
                    $('.' + target.substr(1)).find('#gqr').hide();
                }

                // $('.'+target.substr(1)).find('#gscr').attr('disabled','disabled');

                // $('.'+target.substr(1)).find('#client').find('option[value="'+item.order_clients+'"]').removeAttr("selected");

                // alert(item.order_clients);

                $('.' + target.substr(1)).find('form').attr('action', ostore_url);

                var form = new FormData();
                form.append(item.upload_quotation_received, $('input[type=file]')[0].files[0]);

                // $('.'+target.substr(1)).find('#client-order-details').find('input[type=file]').val(item.upload_quotation_received);

                $('.' + target.substr(1)).find('#client-order-details').find('option[value="' + item.client_id + '"]').attr("selected", true);
                $('.' + target.substr(1)).find('#client-order-details').parent().find('.filter-option-inner').text(item.order_clients);

                $('.' + target.substr(1)).find('[name="order_supplier"]').find('option[value="' + item.order_supplier + '"]').attr("selected", true);
                $('.' + target.substr(1)).find('[name="order_supplier"]').parent().find('.filter-option-inner').text(item.order_supplier);

                // hide uplaod file
                if (item.order_status == 'QUOTE SENT') {
                    $('.' + target.substr(1)).find('#gq').css({
                        'display': 'none'
                    });
                    $('.' + target.substr(1)).find('#fileHelp').hide();
                }

                if (item.order_status == 'SEND CONFIRMATION TO SUPPLIER') {
                    $('.' + target.substr(1)).find('#gsc').parent('.mb-3').css({
                        'display': 'none'
                    });
                    // $('.'+target.substr(1)).find('.text-muted').parent('.mb-3').css({'display':'none'});
                } else if (item.order_status == 'SEND CONFIRMATION TO SUPPLIER' || item.order_status == 'UPLOAD CONFIRMATION SUPPLIER DOC') {
                    $('.' + target.substr(1)).find('#gsc').parent('.mb-3').css({
                        'display': 'none'
                    });
                    $('.' + target.substr(1)).find('.upload_confirmation_supplier_doc-btn').css({
                        'display': 'none'
                    });
                    $('.' + target.substr(1)).find('[name="upload_confirmation_supplier_doc"]').parent('div').css({
                        'display': 'none'
                    });

                } else {
                    $('.' + target.substr(1)).find('#gsc').parent('.mb-3').css({
                        'display': 'block'
                    });
                    $('.' + target.substr(1)).find('#gsc').parent('.mb-3').css({
                        'display': 'block'
                    });
                    $('.' + target.substr(1)).find('[name="upload_confirmation_supplier_doc"]').parent('.mb-3').css({
                        'display': 'block'
                    });
                }

                if (item.order_status == 'GOOD RECEIVED SUP') {
                    $('.' + target.substr(1)).find('#upload_delivery_document').parent('div.mb-3').css({
                        'display': 'none'
                    });
                    $('.' + target.substr(1)).find('.upload_delivery_document_btn').css({
                        'display': 'none'
                    });
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
                $('.' + target.substr(1)).find('#order_details').val(item.order_details);
                $('.' + target.substr(1)).find('#order_technicaldetails').val(item.order_technicaldetails);


                $('.' + target.substr(1)).find('#orderReferenceNumber').val(item.order_reference_number);
                $('.' + target.substr(1)).find('#orderCommissionRate').val(item.order_commission_rate);
                $('.' + target.substr(1)).find('#orderSupplier').val(item.order_supplier);
                // $('.'+target.substr(1)).find('#orderProduct').val(item.order_product);


                var finalvalue = 0;
                var partsOfStr = item.order_product.split(',');
                // console.log(partsOfStr);
                for (i = 0; i < partsOfStr.length; i++) {
                    finalvalue += partsOfStr[i];
                    // console.log(finalvalue);
                }

                // console.log(finalvalue);

                var product = $('.' + target.substr(1)).find('#orderProduct').val(item.order_product);
                var amount = $('.' + target.substr(1)).find('#orderAmount').val(item.order_amount);
                $('.' + target.substr(1)).find('td#orderAmount').text(item.order_amount);
                var client = $('.' + target.substr(1)).find('#client').find('option[value="' + item.order_clients + '"]').attr("selected", true);
                var supplier = $('.' + target.substr(1)).find('#orderSuppier').find('option[value="' + item.order_supplier + '"]').attr("selected", true);
                $('.' + target.substr(1)).find('#exclusivityStatus').find('option[value="' + item.order_exclusively_status + '"]').attr("selected", true);

                // for quote recieved and request
                var URL = '{{url("/admin/generate-quotation-request-form")}}/' + id + '/' + supplier.val() + '/' + row_num + '/' + column_num;
                // $('[name="row_num"]').val(row_num);
                // $('[name="column_index"]').val(column_num);
                $('.' + target.substr(1)).find('#gqr').attr('href', URL);
                $('.' + target.substr(1)).find('#gqr').attr('row_num', row_num);
                $('.' + target.substr(1)).find('#gqr').attr('column_num', column_num);
                $('.' + target.substr(1)).find('#gqr').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gqr').attr('data-order-client_id', item.client_id);
                $('.' + target.substr(1)).find('#gqr').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gqr').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gqr').attr('data-order-amount', amount.val());
                $('.' + target.substr(1)).find('#gqr').attr('data-order-client', client.val());
                //
                var URL = '{{url("/admin/generate-quotation-request")}}/' + id + '/' + item.client_id;
                $('.' + target.substr(1)).find('#gq').attr('href', URL);
                $('.' + target.substr(1)).find('#gq').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gq').attr('data-order-client_id', item.client_id);
                $('.' + target.substr(1)).find('#gq').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gq').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gq').attr('data-order-amount', amount.val());
                $('.' + target.substr(1)).find('#gq').attr('data-order-client', client.val());


                // for quote supplier recieved
                // $('.'+target.substr(1)).find('#gq').attr('data-order-id', id);
                // $('.'+target.substr(1)).find('#gq').attr('data-order-client_id', item.client_id);
                // $('.'+target.substr(1)).find('#gq').attr('data-order-product', product.val());
                // $('.'+target.substr(1)).find('#gq').attr('data-order-amount', amount.val());

                //gsc
                var URL = '{{url("/admin/send-confirmation-to-supplier")}}/' + id + '/' + supplier.val();
                // alert(URL);
                $('.' + target.substr(1)).find('#gsc').attr('href', URL);
                $('.' + target.substr(1)).find('#gsc').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gsc').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gsc').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gsc').attr('data-order-amount', amount.val());


                // for gcc
                var URL = '{{url("/admin/generate-client-confirmation")}}/' + id + '/' + item.client_id;
                $('.' + target.substr(1)).find('#gcc').attr('href', URL);
                $('.' + target.substr(1)).find('#gcc').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gcc').attr('data-order-client_id', item.client_id);
                $('.' + target.substr(1)).find('#gcc').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gcc').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gcc').attr('data-order-amount', amount.val());

                //eql
                // $('.'+target.substr(1)).find('#gql').attr('href', URL);
                // $('.'+target.substr(1)).find('#gql').attr('data-order-id', id);
                // $('.'+target.substr(1)).find('#gql').attr('data-order-client_id', item.client_id);
                // $('.'+target.substr(1)).find('#gql').attr('data-order-supplier', supplier.val());
                // $('.'+target.substr(1)).find('#gql').attr('data-order-product', product.val());
                // $('.'+target.substr(1)).find('#gql').attr('data-order-amount', amount.val());

                var URL = '{{url("/admin/generate-delivery-document")}}/' + id;

                $('.' + target.substr(1)).find('#gdd').attr('href', URL);
                $('.' + target.substr(1)).find('#gdd').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gdd').attr('data-order-client_id', item.client_id);
                $('.' + target.substr(1)).find('#gdd').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gdd').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gdd').attr('data-order-amount', amount.val());

                var URL = '{{url("/admin/generate-invoice")}}/' + id;
                $('.' + target.substr(1)).find('#gi').attr('href', URL);
                $('.' + target.substr(1)).find('#gi').attr('data-order-id', id);
                $('.' + target.substr(1)).find('#gi').attr('data-order-client_id', item.client_id);
                $('.' + target.substr(1)).find('#gi').attr('data-order-supplier', supplier.val());
                $('.' + target.substr(1)).find('#gi').attr('data-order-product', product.val());
                $('.' + target.substr(1)).find('#gi').attr('data-order-amount', amount.val());

            }
        });

    });
    
    function resetErrors() {
        $('form input, form select, form textarea').removeClass('inputTxtError');
        $('label.error').remove();
    }
});

//Quote request
$("#gqr").on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var orderid = $(this).attr('data-order-id');
    var href = $(this).attr('href');
    var client_id = $(this).attr('data-order-client_id');
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
         

        }
    });

});


//gdd
$("#gdd").on('click', function(e) {
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

$("#gi").on('click', function(e) {
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
$("#gq").on('click', function(e) {

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
$("#gsc").on('click', function(e) {

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
$("#gcc").on('click', function(e) {

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

        windows[name] = window.open(url, name, 'width=820,height=824,left=0,top=128,scrollbars=1');

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
$('a#gq').click(function(e) {
    var url = $(this).attr('href');
    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {

        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);
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

        windows[name] = window.open(url, name, 'width=820,height=824,left=0,top=128,scrollbars=1');

    }
});

// four five
var windows = {};
$('a#gqr').click(function(e) {
    var url = $(this).attr('href');

    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {
        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);

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
$("a#gsc").on('click', function(e) {

    var url = $(this).attr('href');

    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {

        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);
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

        windows[name] = window.open(url, name, 'width=820,height=824,left=0,top=128,scrollbars=1');

    }
});

var windows = {};
$("a#gcc").on('click', function(e) {

    var url = $(this).attr('href');
    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {

        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);
        // close child popup window when parent close
        window.onbeforeunload = function() {
            popupWindow.close();
        };

    }

});

var windows = {};
$('a#gdd').click(function(e) {
    var url = $(this).attr('href');
    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {

        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);
        // close child popup window when parent close
        window.onbeforeunload = function() {
            popupWindow.close();
        };

    }
});

var windows = {};
$('a#gi').click(function(e) {
    var url = $(this).attr('href');
    var name = $(this).attr('id');
    if (windows.hasOwnProperty(name) && !windows[name].closed) {
        windows[name].focus();
    } else {
        var w = window.innerWidth;
        var h = window.innerHeight;

        windows[name] = window.open(url, name, "width=" + w + ",height=" + h);
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
                '<input type="text" class="form-control" id="contactFirstName" name="contact_person_first_name[]" placeholder="" value="" >' +
                '<div class="invalid-feedback"> Valid first name is required' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4 mb-3">' +
                '<label for="contactPersonLastName">Last name</label>' +
                '<input type="text" class="form-control" id="contactLastName" name="contact_person_last_name[]" placeholder="" value="" >' +
                '<div class="invalid-feedback"> Valid last name is required' +
                '</div>' +
                '</div>' +
                '<div class="col-md-4 mb-3">' +
                '<label for="contactPersonEmail">Contact Person Email</label>' +
                '<div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<span class="input-group-text">@</span>' +
                '</div>' +
                '<input type="email" class="form-control" id="contact_person_email" name="contact_person_email[]" placeholder="Contact Person Email">' +
                '<div class="invalid-feedback" style="width: 100%;">Contact Person Email is required' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6 mb-3">' +
                '<label for="contactPersonTelephone">Contact Person Telephone</label>' +
                '<input type="text" class="form-control" id="contact_person_telephone" name="contact_person_telephone[]" placeholder="">' +
                '<div class="invalid-feedback">Please enter your Company Telephone.' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6 mb-3">' +
                '<label for="contactPersonFunction">Function</label>' +
                '<input type="text" class="form-control" id="contactPersonFunction" name="contact_person_function[]" placeholder="" value="" >' +
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
    })
});

$(document).ready(function() {

    $(".input_fields_wrap_products").on("change keyup keydown paste propertychange bind mouseover", function() {
        calculateSum();
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
            $(wrapper).append('<div class="add-row" style="background: #eee; margin-bottom:5px;">' +
                '<button type="button" class="close remove_field" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '<div class="row">' +
                '<div class="col-md-6 mb-3">' +
                '<label for="ban">Product</label>' +
                '<input type="text" class="form-control" data-error="order_product.' + counter + '" id="order_product" name="order_product[]">' +
                '<div class="invalid-feedback">' +
                'Name on card is required' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6 mb-3">' +
                '<label for="vn">Price / Piece</label>' +
                '<input type="text" class="form-control order_price" data-error="order_price.' + counter + '" id="order_price" name="order_price[]">' +
                '<div class="invalid-feedback">' +
                'Please enter your Vat Number address.' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6 mb-3">' +
                '<label for="ban">Amount</label>' +
                '<input type="text" class="form-control order_amount" data-error="order_amount.' + counter + '" id="order_amount" name="order_amount[]">' +
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
                '</div>' +
                '<input type="hidden" name="ValoreTotale" value="0.00" class= "somma">' +
                '</div>');
        }

        $(".somma").each(function() {
            $(this).keyup(function() {
                calculateSum();
            });
        });

        $("#order_price, #order_amount").keypress(function(event) {
            var character = String.fromCharCode(event.keyCode);
            return isNumeric(character);
        });

        function isNumeric(str) {
            return /^[0-9]+$/g.test(str);
        }

    });

    $(wrapper).on("click", ".remove_field", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });     

    function calculateSum() {
        var sum = 0;
        $(".somma").each(function() {
            // if (!isNaN(this.value) && this.value.length != 0) {

                var order_amount = $(this).closest(".add-row").find("input.order_amount:text").val();
                var order_price = $(this).closest(".add-row").find("input.order_price:text").val();

                var subTot = (order_amount * order_price);

                $(this).val(subTot.toFixed(2));

                sum += parseFloat(subTot.toFixed(2));
            // }
        });
        $('#amount').val(sum.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
      
        // $('#amount').val(sum.toFixed(2).replace(/^([0-9]+)|((([1-9][0-9]*)|([0-9]))([.,])[0-9]{1,2})$/g, "$1,"));
    }
});

$(document).ready(function() {

    $("#kstore-form, #kupdate-form, #lstore-form, #lupdate-form").submit(function(e) {
        e.preventDefault();
        resetErrors();

        var error_id = $(this).attr('id');

        var postData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: postData,
            success: function(data) {
                console.log(data);
                if ($.isEmptyObject(data.error)) {
                    window.location.reload();
                } else {
                    $.each(data.error, function(i, v) {

                        if (v == true) {
                            location.reload();
                        } else {
                            var msg = '<label class="error" for="' + i + '">' + v + '</label>';
                            $('input[name="' + i + '"], select[name="' + i + '"]').addClass('inputTxtError').after(msg);
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
    var table = $('#klanten').DataTable({
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
        var data = table.row(this).data();
        var id = $(this).attr('id');
        // var url = "{{url('klanten/edit/id/"+id+"')}}";
        var href = $(this).attr('href');

        if (confirm("you want to edit this row?")) {
            window.location.href = url;
        }
        return false
    });

    $('#klanten tbody tr td#delete_row').on('click', 'a', function() {
        var data = table.row(this).data();
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

    //order row delete
    $('#orders tbody tr td#delete_order_row').on('click', 'a', function() {
        var data = table.row(this).data();
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

// leveranciers
$(document).ready(function() {
    var table = $('#leveranciers').DataTable({
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
        var data = table.row(this).data();
        var id = $(this).attr('id');
        // var url = "leveranciers/edit/id/"+id;

        if (confirm("you want to edit this row?")) {
            window.location.href = url;
        } else {
            alert('Why did you press cancel? You should have confirmed');
        }

        return false
    });

    $('#leveranciers tbody tr td#delete_row').on('click', 'a', function() {
        var data = table.row(this).data();
        var id = $(this).attr('id');
        // var url = "{{url('/kdelete/id')}}/"+id;
        var href = $(this).attr('href');
        // alert(href);

        var name = $(this).attr('data-name');

        if (confirm("Are you sure do you want to delete supplier name: " + name + " ?")) {
            window.location.href = href;
            // location.reload();
        }

        return false
    });


    // $('#leveranciers tbody').on('click', 'tr', function() {
    //     var data = table.row(this).data();
    //     var id = $(this).attr('id');

    //     if (confirm("you want to edit this row?")) {
    //           window.location.href = "index.php/leveranciers/edit/id/"+id;
    //     } else {
    //         alert('Why did you press cancel? You should have confirmed');
    //     }
    // });
});

// orders
$(document).ready(function() {
    var table = $('#orders').DataTable({
        "order": [
            [0, "desc"]
        ],
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ]
    });

    // leveranciers
    $('#orders tbody tr td#edit_row').on('click', 'a', function() {
        var data = table.row(this).data();
        var id = $(this).attr('id');

        if (confirm("you want to edit this row?")) {
            window.location.href = url;
        } else {
            alert('Why did you press cancel? You should have confirmed');
        }

        return false
    });

    $('#orders tbody tr td#delete_row').on('click', 'a', function() {
        var data = table.row(this).data();
        var id = $(this).attr('id');

        if (confirm("you want to delete this row?")) {
            window.location.href = url;
        } else {
            alert('Why did you press cancel? You should have confirmed');
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
</script>

</body>
</html>
    