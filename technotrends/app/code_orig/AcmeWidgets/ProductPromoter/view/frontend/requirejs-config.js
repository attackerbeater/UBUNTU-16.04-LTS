var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                // 'AcmeWidgets_ProductPromoter/js/action/set-shipping-information-mixin' : true
            }
        }
    },
    "map": {
        "*": {
            "Magento_Checkout/js/model/shipping-save-processor/default" : "AcmeWidgets_ProductPromoter/js/shipping-save-processor"
        }
    }
};
