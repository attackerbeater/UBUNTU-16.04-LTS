define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component, rendererList) {
        'use strict';

        rendererList.push(
            {
                type: 'acmewidgets-payment-method',
                component: 'AcmeWidgets_PaymentMethod/js/view/payment/method-renderer/acmewidgets-payment-method'
            }
        );

        return Component.extend({});
    }
);
