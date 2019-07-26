define([
    'jquery',
    'mage/smart-keyboard-handler',
    'jquery/ui',
    'mage/mage',
    'mage/ie-class-fixer',
    'rdnavbar',
    'carouselInit',
    'blockCollapse',
], function ($, keyboardHandler) {
    'use strict';

    var TM_General = {

        init: function() {

            if ($('body').hasClass('checkout-cart-index')) {
                if ($('#co-shipping-method-form .fieldset.rates').length > 0 && $('#co-shipping-method-form .fieldset.rates :checked').length === 0) {
                    $('#block-shipping').on('collapsiblecreate', function () {
                        $('#block-shipping').collapsible('forceActivate');
                    });
                }
            }

             /* Navbar init */
            var o = $('.rd-navbar');
            if (o.length > 0) {
                o.RDNavbar({
                    stickUpClone: true,
                    stickUpOffset: "100%",
                    responsive: {
                         0: {
                            layout: 'rd-navbar-fixed',
                            stickUp: true,
                            focusOnHover: false
                         },
                         767: {
                            layout: 'rd-navbar-static',
                            stickUp: true,
                         },
                         992: {
                            layout: 'rd-navbar-static',
                            stickUp: true,
                         }
                      }
                });
            }

            /***/

            $('.cart-summary').mage('sticky', {
                container: '#maincontent'
            });

            /***/

            keyboardHandler.apply();

            /* Sidebar block collapse in mibile */
            var block = $(".sidebar-additional .block");
            if(block.length > 0) {
                block.sidebarCollapse();
            }
            

            /* Carousel init */
            $(".carousel").carouselInit();

        },

    }

    TM_General.init();

});