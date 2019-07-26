/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {}
    },
    paths: {
        "carouselInit":     "js/carouselInit",
        "blockCollapse":    "js/sidebarCollapse",
        "rdnavbar":         'Magento_Theme/js/jquery.rd-navbar',
        "owlcarousel":      'Magento_Theme/js/owl.carousel'
    },
    shim: {
        "rdnavbar":     ["jquery"],
        "owlcarousel":  ["jquery"]
    },
    deps: [
        "jquery",
        "jquery/jquery.mobile.custom",
        "mage/common",
        "mage/dataPost",
        "mage/bootstrap"
    ]
};

