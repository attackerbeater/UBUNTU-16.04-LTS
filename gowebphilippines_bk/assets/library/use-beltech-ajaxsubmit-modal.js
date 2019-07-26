/**
* use plugin    : beltech-ajaxsubmit-modal.js
* develop by    : John Manducdoc.Junsay
* experise      : Php Magento, Laravel, Codeigniter, wordpress
* description   :
* path affected : /beltechnology/orders
* element       : modal submit
**/
// 1


$("#1").beltechAjaxsubmitModal({
  alertmsg: 'Request for quotation recieved from client.',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

// 2, 3
$(".23").beltechAjaxsubmitModal({
  alertmsg: '(PARTIAL/FULL): Request(s) received from supplier(s)',
  // statusmsg: 'ORDER DETAILS xxx',
  // datatarget: '.order-details',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$(".form-one-update, .form-two-update, .form-three-update, .form-four-update, .form-five-update, .form-six-update, .form-seven-update, .form-eight-update, .form-nine-update, .form-ten-update, .form-eleven-update, .form-twelve-update").beltechAjaxsubmitModal({
  alertmsg: 'Record has been updated',
  tatusmsg: 'Updates',
  // datatarget: '.order-details',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

// order details
$("#order-details").beltechAjaxsubmitModal({
  alertmsg: 'Order details has been added',
  // statusmsg: 'QUOTE SUP RECEIVED',
  // datatarget: '.quote-sup-received',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("form#45, form#4a").beltechAjaxsubmitModal({
  alertmsg: 'Quote sent to Client',
  // statusmsg: 'QUOTE ACCEPTANCE',
  // datatarget: '.quote-acceptance',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#thirdbtnredirect").click(function(){
  if(confirm("Are you sure you want to save this?")){
    $('form#45').find('[name="status"]').val('4.QUOTE SENT to CLIENT');
    var path = $('form#45').attr('action');
    var id = $('form#45').find('[name="id"]').val();
    var values = $('form#45').serialize();
    $.ajax({
      url: path,
      type: "post",
      data: values ,
      success: function (response) {
        location.reload();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        alert(textStatus, errorThrown);
      }
    });

  }else{

  }
});

$("#5").beltechAjaxsubmitModal({
  alertmsg: 'Quote acceptance from Client',
  // statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
  // datatarget: '.upload-confirmation-supplier-doc',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#6").beltechAjaxsubmitModal({
  alertmsg: 'Send confirmation to supplier',
  // statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
  // datatarget: '.upload-confirmation-supplier-doc',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#7").beltechAjaxsubmitModal({
  alertmsg: 'Upload confirmation supplier doc',
  // statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
  // datatarget: '.upload-confirmation-supplier-doc',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#8").beltechAjaxsubmitModal({
  alertmsg: 'Generate Confirmation to Client',
  // statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
  // datatarget: '.upload-confirmation-supplier-doc',
  reload: true,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

// 9,10,11,12
$("#9").beltechAjaxsubmitModal({
  alertmsg: 'Good sent to Supplier.',
  // statusmsg: '',
  // datatarget: '',
  reload: true,
  showMessage: false,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#10").beltechAjaxsubmitModal({
  alertmsg: 'Good received from Supplier',
  reload: true,
  showMessage: false,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

$("#11").beltechAjaxsubmitModal({
  alertmsg: 'Good sent to Client.',
  // statusmsg: '',
  // datatarget: '',
  reload: true,
  showMessage: false,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

//12
$("#12").beltechAjaxsubmitModal({
  alertmsg: 'Invoice received.',
  // statusmsg: '',
  // datatarget: '',
  reload: true,
  showMessage: false,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

//13
$("#13").beltechAjaxsubmitModal({
  alertmsg: 'Invoice sent.',
  // statusmsg: '',
  // datatarget: '',
  reload: true,
  showMessage: false,
  imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
  originaltext: "original-text"
});

// 13,14,15
