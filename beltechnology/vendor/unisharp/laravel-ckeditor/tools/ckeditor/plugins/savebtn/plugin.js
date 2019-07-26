

CKEDITOR.plugins.add( 'savebtn', {
  icons: 'savebtn',
  init: function( editor ) {
    editor.addCommand( 'savecontent', {
      
      exec : function(editor){
        
        //get the text from ckeditor you want to save
        var data = editor.getData();
                  
        //get the current url
        var page = document.URL;
  
        var order_id  = $('textarea#'+editor.name).parent().find('input[name="order_id"]').val();
        var filename  = $('textarea#'+editor.name).parent().find('input[name="filename"]').val();
        var client_id = $('textarea#'+editor.name).parent().find('input[name="client_id"]').val();
        var transaction_type = $('textarea#'+editor.name).parent().find('input[name="transaction_type"]').val();
        
        console.log('order_id: '+order_id);
        console.log('filename: '+filename);
        console.log('client_id: '+client_id);
        console.log('transaction_type: '+transaction_type);
        
        //path to the ajaxloader gif
        loading_icon=CKEDITOR.basePath+'plugins/savebtn/icons/loader.gif';
        
        //css style for setting the standard save icon. We need this when the request is completed.
        normal_icon=$('.cke_button__savebtn_icon').css('background-image');
        
        //replace the standard save icon with the ajaxloader icon. We do this with css.
        $('.cke_button__savebtn_icon').css("background-image", "url("+loading_icon+")");

        // Now we are ready to post to the server...
        $.ajax({
          url: editor.config.saveSubmitURL,//the url to post at... configured in config.js ex( process.php )
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          type: 'POST', 
          data: {
            editor: data,
            id: editor.name,
            page: page,
            order_id: order_id,
            filename: filename,
            client_id: client_id,
            transaction_type: transaction_type
          } //editor.name contains the id of the current editable html tag
        })
        .done(function(response) {
          console.log("success : "+response);
          console.log('id: '+editor.name);
          var base_url = window.location.origin;
          alert(base_url);
          // console.log('id: '+data);
          // console.log('id: '+editor.name+' \nurl: '+page+' \ntext: '+data);
          // console.log('id: '+data);
          // console.log('text: '+data);
        })
        .fail(function() {
          console.log("error");
          alert('error');
        })
        .always(function() {
          console.log("complete");
          alert('complete');
          $('.cke_button__savebtn_icon').css("background-image", normal_icon);          
        });   
      } 
    });
    
    
    //add the save button to the toolbar
    
    editor.ui.addButton( 'savebtn', {
      label: 'Save',
      command: 'savecontent'
      // toolbar: 'insert'
    });
    
    
  }
});
