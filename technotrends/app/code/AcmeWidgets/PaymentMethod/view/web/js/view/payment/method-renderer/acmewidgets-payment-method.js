define(
    [
        'Magento_Checkout/js/view/payment/default'
    ],
    function (Component) {
        'use strict';

        return Component.extend({
            defaults: {
                template: 'AcmeWidgets_PaymentMethod/payment/acmewidgets-payment-method-form'
            },
            context: function () {
                return this;
            },

            getCode: function () {
                return 'acmewidgets-payment-method';
            },

            isActive: function () {
                return true;
            },

            getSampleData: function () {
                return window.checkoutConfig.payment.acmewidgetsPaymentMethod[0];
            }
        });
    }
);
