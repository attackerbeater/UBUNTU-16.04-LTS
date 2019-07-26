// checklist
selector = "#gfcr";
status = "GOODS RECEIVED";

$(selector).on('click', function(e){
    e.preventDefault();
    // alert(1);
    $(this).toggleClass("gfcr");
    if ($(".gfcr")[0]){
        $(this).find("#order_status").prop("checked", true);           
        $(this).css({
            'color': "#fff",
            'background-color': "#28a745",
            'border-color': "#28a745"
        });

    }else{
        $(this).find("#order_status").prop("checked", false);              
        $(this).css({
            'color': "#fff",
            'background-color': "#dc3545",
            'border-color': "#dc3545"                    
        });
    }  
});

selector = "#gscr";
status = "GOODS SENT SUP";

$(selector).on('click', function(e){
    e.preventDefault();
    // alert(1);
    $(this).toggleClass("gscr");
    if ($(".gscr")[0]){
        $(this).find("#order_status").prop("checked", true);           
        $(this).css({
            'color': "#fff",
            'background-color': "#28a745",
            'border-color': "#28a745"
        });

    }else{
        $(this).find("#order_status").prop("checked", false);              
        $(this).css({
            'color': "#fff",
            'background-color': "#dc3545",
            'border-color': "#dc3545"                    
        });
    }   
});


selector = "#grfs";
status = "GOOD RECEIVED SUP";

$(selector).on('click', function(e){
    e.preventDefault();
    // alert(1);
    $(this).toggleClass("grfs");
    if ($(".grfs")[0]){
        $(this).find("#order_status").prop("checked", true);           
        $(this).css({
           'color': "#fff",
           'background-color': "#28a745",
           'border-color': "#28a745"
        });

   }else{
        $(this).find("#order_status").prop("checked", false);              
        $(this).css({
           'color': "#fff",
           'background-color': "#dc3545",
           'border-color': "#dc3545"                    
        });
   }  
});

selector = "#gstc";
status = "GOODS SENT";

$(selector).on('click', function(e){
    e.preventDefault();
    // alert(1);
    $(this).toggleClass("gstc");
    if ($(".gstc")[0]){
        $(this).find("#order_status").prop("checked", true);           
        $(this).css({
            'color': "#fff",
            'background-color': "#28a745",
            'border-color': "#28a745"
        });

    }else{
        $(this).find("#order_status").prop("checked", false);              
        $(this).css({
            'color': "#fff",
            'background-color': "#dc3545",
            'border-color': "#dc3545"                    
        });
    }  
});    