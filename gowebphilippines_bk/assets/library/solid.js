
// for adding Products
// for adding treatments 
// it follows Interface Segregation
var StatusThree = (function() {
    function onkeyup(element, id){
        $(element).keyup(function() {
            var val = '';
            $(element).each(function() {
                val = $(this).val();    
            });
            $(id).val(val); 
        });
    }   

    function elementAssignValue(element, elemType, elemId, elemVaule, formId){
        $(element).attr({    
            type: elemType,
            id: elemId,
            name: elemVaule,
        }).css("display", "none").appendTo(formId);  
    }
    return {
       onkeyup:onkeyup,
       elementAssignValue:elementAssignValue
    }  
})();

