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
            template: 'AcmeWidgets_JsLayout/layout'
          },
          initialize: function(config){
            var self = this;
            this._super();
            console.log(config);

          },

          text1: ko.observable('text 20')
        });
    }
);
