define([
    'jquery',
    'mage/smart-keyboard-handler',
    'matchMedia',
    'jquery/ui',
    'mage/mage',
    'mage/ie-class-fixer',
    'rdnavbar',
    'carouselInit',
    'blockCollapse',
    'camera',
    'jquery.animateNumber.min'
], function ($, keyboardHandler, mediaCheck) {
    'use strict';

    if ($('body').hasClass('checkout-cart-index')) {
        if ($('#co-shipping-method-form .fieldset.rates').length > 0 && $('#co-shipping-method-form .fieldset.rates :checked').length === 0) {
            $('#block-shipping').on('collapsiblecreate', function () {
                $('#block-shipping').collapsible('forceActivate');
            });
        }
    }

    $('.cart-summary').mage('sticky', {
        container: '#maincontent'
    });

    keyboardHandler.apply();
    /* Navbar init */
    var o = $('.rd-navbar');
    if (o.length > 0) {
        o.RDNavbar({
            responsive: {
                0: {
                    layout: 'rd-navbar-fixed',
                    stickUp: true
                },
                768: {
                    layout: 'rd-navbar-static',
                    stickUp: true
                }
            }
        });
    }

    /* Sidebar block collapse in mibile */
    $(".sidebar-additional .block").sidebarCollapse();

    /* Carousel init */
    $(".carousel").carouselInit();


    // ==============================================
    // Animation Skills
    // ==============================================

    if($('.skills .number').length > 0){
        var number = $('.skills .number');
        number.each(function(){
            var finish = $(this).data('finish');
            $(this).animateNumber({ number: finish }, 2000);
        })
    }

    // ==============================================
    // Camera Slider
    // ==============================================

    if($('#camera_wrap').length > 0){
        $('#camera_wrap').camera({
            alignmen: 'topCenter',
            height: '54.325956%',
            minHeight: '100px',
            loader : false,
            navigation: false,
            fx: 'simpleFade',
            navigationHover:false,
            thumbnails: false,
            playPause: false,
            pagination:true
        });
    }

    // ==============================================
    // Carousels
    // ==============================================

    $('.products-crosssell .product-items').carouselInit();

    $('.owl-testimonials').carouselInit({
        responsive:{
            0:{
                items:1,
            },
            400:{
                items:1,
            },
            768:{
                items:1,
            },
            991:{
                items:1,
            }
        },
        singleItem: true,
        nav : true,
        navigationText : [ ],
        loop : true,
        dots : false,
        autoPlay : true,
        autoplay : 3000,
        autoplayTimeout: 2000,
        autoplayHoverPause: true
    });

    $('.cms-index-index .widget.block-new-products .widget-new-grid').carouselInit({
        items: 3,
        itemsDesktop: [1199,3],
        itemsDesktopSmall: [979,3],
        itemsTablet: [768,2],
        itemsMobile: [400,1],
        navigation : true,
        pagination: false,
        navigationText : [ ],
        autoPlay : false
    });

    $('.cms-index-index .widget.block-products-list .widget-product-grid').carouselInit({
        items: 6,
        itemsDesktop: [1199,4],
        itemsDesktopSmall: [979,3],
        itemsTablet: [768,2],
        itemsMobile: [400,1],
        navigation : true,
        pagination: false,
        navigationText : [ ],
        autoPlay : false
    });

    // ==============================================
    // Side navbar
    // ==============================================

    $('.side-navbar').each(function(){

        var keys = {37: 1, 38: 1, 39: 1, 40: 1};

        function preventDefault(e) {
            e = e || window.event;
            if (e.preventDefault)
                e.preventDefault();
            e.returnValue = false;
        }

        function preventDefaultForScrollKeys(e) {
            if (keys[e.keyCode]) {
                preventDefault(e);
                return false;
            }
        }

        function disableScroll() {
            if (window.addEventListener) // older FF
                window.addEventListener('DOMMouseScroll', preventDefault, false);
            window.onwheel = preventDefault; // modern standard
            window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
            window.ontouchmove  = preventDefault; // mobile
            document.onkeydown  = preventDefaultForScrollKeys;
        }

        function enableScroll() {
            if (window.removeEventListener)
                window.removeEventListener('DOMMouseScroll', preventDefault, false);
            window.onmousewheel = document.onmousewheel = null;
            window.onwheel = null;
            window.ontouchmove = null;
            document.onkeydown = null;
        }

        var _body = $('body');
        var NavBar = $(this);
        $(NavBar).find('.side-navbar-box').each(function(){
            var NavBarBtn = $(this).find('.side-navbar-btn');

             if($(this).hasClass('side-navbar-login')){
                var auth = $('.authorization-link', this).hide();
                var btn = $('a', auth).addClass('side-navbar-btn');
                if(auth.hasClass('sign_in')) NavBarBtn.addClass('sign_in');
                if(auth.hasClass('sign_out')){
                    auth.show();
                    NavBarBtn.hide();
                }
            }

            $(NavBarBtn).click(function(){
                var NavbarBox = $(this).parent();
                var Navbar = $(NavbarBox).parent();
                if($(Navbar).hasClass('active') && $(NavbarBox).hasClass('active')){
                    $(NavBar).find('.side-navbar-box').each(function(){
                        $(this).removeClass('active');
                    });
                    $(NavBar).removeClass('active');
                    $(_body).removeClass('locked');
                    enableScroll();
                }
                else if($(Navbar).hasClass('active') && !$(NavbarBox).hasClass('active')){
                    $(NavBar).find('.side-navbar-box').each(function(){
                        $(this).removeClass('active');
                    });
                    $(NavbarBox).addClass('active');
                    $(_body).addClass('locked');
                    disableScroll();
                }
                else{
                    $(NavbarBox).addClass('active');
                    $(NavBar).addClass('active');
                    $(_body).addClass('locked');
                    disableScroll();
                }
            });
        });
        $(NavBar).find('.minicart-wrapper').each(function(){
            var NavbarCart = $(this);
            var NavBar = $(NavbarCart).parent();
            $(NavbarCart).find('.showcart').click(function(){
                if($(NavBar).hasClass('active') && !$(NavbarCart).hasClass('active')){
                    console.log('cart click');
                    $(NavBar).find('.side-navbar-box').each(function(){
                        var NavbarBox = $(this);
                        var Navbar = $(NavBarBox).parent();
                        $(Navbar).removeClass('active');
                        $(NavbarBox).removeClass('active');
                        $(_body).removeClass('locked');
                        enableScroll();
                    })
                }else if(!$(NavBar).hasClass('active') && !$(NavbarCart).hasClass('active')){
                    
                }
            });
        });
        $(NavBar).find('.side-navbar-close').each(function(){
            var NavBarClose = $(this);
            $(NavBarClose).click(function(){
                $(NavBar).find('.side-navbar-box').each(function(){
                    $(this).removeClass('active');
                });
                $(NavBar).removeClass('active');
                $(_body).removeClass('locked');
                enableScroll();
            });
        });
    });


    //$('.side-navbar-btn--cart').click(function(e){
    //    e.preventDefault();
    //});

        //Login and create account switcher
        var loginSwitcher = $('.login-switcher');
        var loginBlock = $('.login-block');
        var registerSwitcher = $('.register-switcher');
        var registerBlock = $('.register-block');

        $(loginSwitcher).click(function(e){
            e.preventDefault();
            $(loginBlock).removeClass('active');
            $(registerBlock).addClass('active');
        });
        $(registerSwitcher).click(function(e){
            e.preventDefault();
            $(registerBlock).removeClass('active');
            $(loginBlock).addClass('active');
        });


    // ==============================================
    // Footer accordion
    // ==============================================
    var acc = $("#footer-col-wrapper");
    var params = {
        header : ".footer-col h4",
        content : ".footer-col .footer-col-content",
        trigger : ".footer-col h4",
        active: "0",
        collapsible: true,
        multipleCollapsible: true,
        animate: 200
    }
    mediaCheck({
        media: '(max-width: 767px)',
        entry: function(){
            accInit(acc, params);
        },
        exit: function(){
            accInit(acc, params);
            accDestroy(acc);
        }
    });

    function accInit(elem, params){
        elem.accordion(params);
    }

    function accDestroy(elem){
        elem.accordion("destroy");
    }
});
