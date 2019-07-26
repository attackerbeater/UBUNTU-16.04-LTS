/**
 * Copyright © 2015. All rights reserved.
 */

define([
    'jquery',
    'jquery/ui',
    'owlcarousel'
], function($){
    "use strict";

    $.widget('TemplateMonster.carouselInit', {

        options: {

            navigation:true,
            items: 3,
            itemsDesktop: [1199,3],
            itemsDesktopSmall: [979,3],
            itemsTablet: [768,2],
            itemsMobile: [400,1],
            autoPlay: false,
            pagination: false,
            navigationText: [],
           
        },

        _create: function() {
            this.element.owlCarousel(this.options);
        },

        _setOption: function( key, value ) {
          this._super( "_setOption", key, value );
        },
        
    });

    return $.TemplateMonster.carouselInit;

});
