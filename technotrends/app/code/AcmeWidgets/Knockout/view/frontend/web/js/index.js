define([
    'jquery',
    'ko',
    'jquery/ui'
  ],function($, ko){
    'use strict';

    return function(config){
        var self = this;
        // alert(1);
        console.log('index.js is running.. .');

        self.div1 = ko.observable(config.div1Content);
        self.div1();

    }

});
