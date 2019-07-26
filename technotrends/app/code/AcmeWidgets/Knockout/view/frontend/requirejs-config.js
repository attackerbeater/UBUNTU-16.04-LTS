var config = {
  paths: {
    'index' : 'AcmeWidgets/Knockout/js/index'
  },
  config: {
    mixins: {
      'Magento_Checkout/js/sidebar': {
        'AcmeWidgets_Knockout/js/sidebar': true
      }
    }
  },
  map: {
    '*': {
      'Magento_Checkout/template/minicart/item/default.html': 'AcmeWidgets_Knockout/template/minicart/item/default.html'
    }
  }
};
