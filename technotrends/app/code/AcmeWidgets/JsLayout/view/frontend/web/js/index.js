define(
    [
      'jquery',
      'ko',
      'uiComponent'
    ],
    function (
      $,
      ko,
      Component
    ) {
        'use strict';
        return Component.extend({
          defaults: {
            template: 'AcmeWidgets_JsLayout/index'
          },
          initialize: function(config){
            var self = this;
            this._super();
            console.log(config);

          },

          getCode: function () {
            return 'example';
          },

          // text1: ko.observable('text 10')
        });
    }
);
