/**
 * Copyright © 2015. All rights reserved.
 */

define([
    'jquery',
    'jquery/ui',
    'matchMedia',
    "mage/common",
    'mage/collapsible'
], function($, collapsible, mediaCheck){
    "use strict";

    $.widget('TemplateMonster.sidebarCollapse', {

        options: {},
        self: this,

        _create: function() {
            var selector = this.element;
            this._initialization(selector);
        },

        _setOption: function( key, value ) {
          this._super( "_setOption", key, value );
        },

        _isDisplay: function(elem) {
            if(elem.hasClass('no-display')) return false; 
            return true;
        },

        _initCollapse: function(elem, content) {
            $(elem).collapsible({
                active: false,
                content: content,
                collapsible: true,
                animate: 200, 
                multipleCollapsible: true
            });
        },

        _closedCollapse: function(header, content) {
            this._initCollapse(header, content);
            $(header).collapsible("activate");
            
        },
        _openedCollapse: function(header, content) {
            this._initCollapse(header, content);
            $(header).collapsible("deactivate");
        },

        _initialization: function(selector) {
            if(selector.length) {
                var title = $('.block-title', selector);
                var content = $('.block-content', selector);
                $(selector).wrap('<div class="collapsible-block">');
                var collapse = $(selector).parent('.collapsible-block');
                var header = '';

                if(this._isDisplay(title)){
                    header = $('strong', title)
                        .clone()
                        .addClass('opener')
                        .removeAttr('id')
                        .prependTo(collapse);
                    this._initCollapse(header, content);
                }
                var el = this;
                mediaCheck({
                    media: '(max-width: 767px)',
                    entry: function () { 
                        el._openedCollapse(header, content);
                        if(header.length) header.show();
                        if(el._isDisplay(title)) title.hide();
                    },
                    exit: function ()  {
                        el._closedCollapse(header, content);
                        if(header.length) header.hide();
                        if(el._isDisplay(title)) title.show();
                    }
                });
            }
        },
    });

    return $.TemplateMonster.sidebarCollapse;

});