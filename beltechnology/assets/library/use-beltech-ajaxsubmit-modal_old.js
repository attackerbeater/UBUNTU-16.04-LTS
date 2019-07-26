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
    reload: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 2, 3
$(".23").beltechAjaxsubmitModal({
    alertmsg: '(PARTIAL/FULL): Request(s) received from supplier(s)',
    // statusmsg: 'ORDER DETAILS xxx',
    // datatarget: '.order-details',
    reload: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});


$(".form-one-update, .form-two-update, .form-three-update, .form-four-update, .form-five-update, .form-six-update, .form-seven-update, .form-eight-update, .form-nine-update, .form-ten-update, .form-eleven-update, .form-twelve-update").beltechAjaxsubmitModal({
    alertmsg: 'Record has been updated',
    tatusmsg: 'Updates',
    // datatarget: '.order-details',
    reload: false,
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

$("#45, #4a").beltechAjaxsubmitModal({
    alertmsg: 'Accept quotation request from client',
    // statusmsg: 'QUOTE ACCEPTANCE',
    // datatarget: '.quote-acceptance',
    reload: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 6,7,8
$("#5, #6, #7, #8").beltechAjaxsubmitModal({
    alertmsg: 'Upload confirmation supplier doc',
    // statusmsg: 'UPLOAD CONFIRMATION SUPPLIER DOC',
    // datatarget: '.upload-confirmation-supplier-doc',
    reload: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 9,10,11,12
$("#9101112").beltechAjaxsubmitModal({
    alertmsg: 'Upload delivery document.',
    // statusmsg: '',
    // datatarget: '',
    reload: false,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});


//12
$("#12").beltechAjaxsubmitModal({
    alertmsg: 'Invoice received.',
    // statusmsg: '',
    // datatarget: '',
    reload: false,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

//13
$("#13").beltechAjaxsubmitModal({
    alertmsg: 'Invoice sent.',
    // statusmsg: '',
    // datatarget: '',
    reload: false,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});

// 13,14,15
$("#131415").beltechAjaxsubmitModal({
    alertmsg: 'Upload supplier invoice.',
    // statusmsg: '',
    // datatarget: '',
    reload: false,
    showMessage: false,
    imgurl: "<img src='/beltechnology/assets/images/ajax-loader.gif'/> Processing request",
    originaltext: "original-text"
});