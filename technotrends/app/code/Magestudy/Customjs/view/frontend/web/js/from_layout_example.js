define([
        'jquery',
    ], function ($) {
        'use strict';

        return function (config) {
            var self = this;

            console.log(config);

            self.getFirstValue = function () {
                return config.first;
            };

            self.getSecondValue = function () {
                return config.second;
            };
        }
    }
);
