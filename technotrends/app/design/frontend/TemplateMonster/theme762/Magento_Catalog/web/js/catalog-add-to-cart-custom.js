/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
define([
    'jquery',
    'mage/translate',
    'jquery/ui',
    'catalogAddToCart'
], function($, $t) {
    "use strict";

    $.widget('TemplateMonster.catalogAddToCartCustom', $.mage.catalogAddToCart, {

        options: {
            addToCartButtonTextDefault: $t('+ Add to Cart')
        },

        _create: function() {
            this._super();
        },

    });

    return $.TemplateMonster.catalogAddToCartCustom;
});