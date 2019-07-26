define([
    'jquery',
    'ko',
    'uiComponent'
  ],function($, ko, Component){
    'use strict';
    // alert(2);
    return Component.extend({
        defaults: {
          template: 'AcmeWidgets_Knockout/test2',
        },
        // alert(1);
        // File: vendor/magento/module-ui/view/base/web/js/lib/core/element/element.js
        //  __construct
        initialize: function (config) {
          console.log(config) //logs My Value

        }

      	// var self = this;


        // div2: ko.observable('Div2 content'),


        // loop: ko.observableArray(['value 1','value 2','value 3','value 4','value 5']),
        //
        // getDiv2: function () {
  			// 	var self = this;
        //   self.div2();
        // },



    });

});
