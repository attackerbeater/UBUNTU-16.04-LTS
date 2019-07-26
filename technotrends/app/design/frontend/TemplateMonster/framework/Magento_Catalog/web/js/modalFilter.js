/**
 * Copyright © 2015. All rights reserved.
 */

require([
    'jquery',
    'matchMedia',
    'Magento_Ui/js/modal/modal',
], function ($, mediaCheck) {
    "use strict";

    $.widget("TemplateMonster.modalFilter", {
 
        options: { },
     
        _create: function() {

            $('.toolbar-container .filter-toggle').css('display', 'inline-block');
            this._initialization();
        },

        _initialization: function() {


           mediaCheck({
               media: '(max-width: 767px)',
               entry: function () {
                    $('.filter-toggle, .modal-header').show();
                    $('#layered-filter-block .block-title').hide();
                    $('#layered-filter-block aside').addClass('modal-slide');
                    $('.filter-content').modal({
                        "type": "slide", 
                        "wrapperClass": "filter-wrapper",
                        "trigger": "[data-trigger=filter]",
                        "parentModalClass": "_has-modal-custom _has-auth-shown",
                        "responsive": true,
                        "responsiveClass": "custom-slide",
                        "overlayClass": "dropdown-overlay modal-custom-overlay",
                        "buttons": []
                    });
               },
                exit: function () {
                    $('.filter-toggle, .filter-toggle').hide();
                    $('#layered-filter-block .block-title').show();
                    $('#layered-filter-block aside').removeClass('modal-slide');
                }
           });
        },

    });


    $('.filter-content').modalFilter();

});
   
