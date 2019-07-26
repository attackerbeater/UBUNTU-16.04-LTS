(function($){

    // alert(1);
 
    $.fn.beltechwindowOpenEmailAjax = function( options ) {
 
        // Default options
        var settings = $.extend({
            alertmsg: 'Welcome to the junggle',
            imgurl: '',
            progressbar: '',
            originaltext: '',
            reload: true,
            parentwindow: ''                     
        }, options );

        return this.each(function(){

            // $(this).text(settings.alertmsg); 
            $(this).on('submit', function(e){
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var $this = $(this).find("#form-btn");
                $.ajax({     
                     
                    url: $(this).attr('action'),
                    type:'POST', 
                    dataType: 'json',                     
                    processData:false,
                    contentType: false,                  
                    data: new FormData(this),
                    beforeSend: function(){                        
                        var loadingText = settings.imgurl;
                        if ($(this).html() !== loadingText) {
                            $this.data(settings.originaltext, $(this).html());
                            $this.html(loadingText);
                        }
                    },                   
                    success: function(data) {
                        if(!$.isEmptyObject(data.error)){
                            printErrorMsg('form-error-msg', data.error); 
                            $this.html('Error send');                                                     
                        }               
                       
                    },
                    error: function(xhr, err) {   

                    
                        if(xhr.status == 200){
                            $('.form-error-msg').css('display','none');
                            window.opener.location.reload();
                            $this.html('Form submitted successfully');  
                            window.close();
                                                
                        }else if(xhr.status == 500){
                            $this.html('500 (Internal Server Error)');
                    
                            var serverErrors = confirm ("500 (Internal Server Error)");
                                                  
                        }                                           
                    }                               
                });

                function printErrorMsg (err, msg) {
                    $('.'+err).find("ul").html('');
                    $('.'+err).css('display','block');
                    $.each( msg, function( key, value ) {
                        $('.'+err).find("ul").append('<li>'+value+'</li>');
                    });
                }
            });
        });
 
    };
 
}( jQuery ));