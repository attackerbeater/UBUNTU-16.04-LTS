(function($) {

    $.fn.quotation = function( customText ) {

        // Future home of "Hello, World!"

        this.each( function() {
            $(this).text(customText);
        });

    }

}(jQuery));