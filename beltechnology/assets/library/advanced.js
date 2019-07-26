var table;
$(document).ready(function () {
    table = $('#klanten').DataTable();
    table.MakeCellsEditable({
        "onUpdate": myCallbackFunction,
        "inputCss":'my-input-class',
        "columns": [0,1,2,3],
        "allowNulls": {
            "columns": [3],
            "errorClass": 'error'
        },
        "confirmationButton": { // could also be true
            "confirmCss": 'my-confirm-class',
            "cancelCss": 'my-cancel-class'
        },
        "inputTypes": [
            {
                "column": 0,
                "type": "text",
                "options": null
            },
            {
                "column":1, 
                "type": "list",
                "options":[
                    { "value": "1", "display": "Beaty" },
                    { "value": "2", "display": "Doe" },
                    { "value": "3", "display": "Dirt" }
                ]
            },
            {
                "column": 2,
                "type": "datepicker", // requires jQuery UI: http://http://jqueryui.com/download/
                "options": {
                    "icon": "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif" // Optional
                }
            }
             // Nothing specified for column 3 so it will default to text
            
        ]
    });

});

function myCallbackFunction (updatedCell, updatedRow, oldValue) {
    // console.log("The new value for the cell is: " + updatedCell.data());
    // console.log("The old value for that cell was: " + oldValue);
    // console.log("The values for each cell in that row are: " + updatedRow.data());

    // var updatedCell = updatedCell.data(); // A random variable for this example
    // var oldValue =oldValue;

    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var editurl = baseUrl+"/admin/kupdateid/"+ oldValue; 
    // alert(getUrl);
    // http://localhost/beltechnology/admin/kupdate/18719
    // alert(editurl);s

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
        type:'POST', 
        dataType: 'json',                        
        url: editurl, // This is the url we gave in the route
        data: {updateid : updatedCell.data()}, // a JSON object to send back
        success: function(response){ // What to do if we succeed
            console.log(response); 
            // alert(1);
        }
        // error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        //     console.log(JSON.stringify(jqXHR));
        //     console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        // }
    });
}

function destroyTable() {
    if ($.fn.DataTable.isDataTable('#klanten')) {
        table.destroy();
        table.MakeCellsEditable("destroy");
    }
}