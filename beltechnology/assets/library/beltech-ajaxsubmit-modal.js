(function($) {
  
  $.fn.beltechAjaxsubmitModal = function(options) {
    
    // Default options
    var settings = $.extend({
      alertmsg: '',
      statusmsg: '',
      imgurl: '',
      originaltext: '',
      datatarget: '',
      reload: true,
      showMessage: false
    }, options);
    
    return this.each(function() {
      
      $(this).on('submit', function(e) {
        e.preventDefault();
        resetErrors();
        var btn             = $(this).find("[type='submit']");
        var file            = $(this).find('input[type="file"]').val(); //.trim();
        var row_num         = $(this).find('[name="row_num"]').val();
        var count_row       = row_num - 1;
        var column_num      = $(this).find('[name="column_num"]').val();
        var column_count    = column_num - 1;
        
        var id = $(this).find('[name="id"]').val();
        
        for (instance in CKEDITOR.instances) {
          CKEDITOR.instances[instance].updateElement();
        }
        
        if(confirm("Are you sure you want to save this?")){
          
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            processData: false, // set it to false if will using new FormData(this).
            cache: false,
            contentType: false, // set it to false if will using new FormData(thi   s).
            data: new FormData(this), // use this to belong file input because if use serialize fike type not belongs and it hards for ajax to save the uploaded file
            beforeSend: function() {
              
              var loadingText = settings.imgurl;
              btn.data(settings.originaltext, $(this).html());
              btn.html(loadingText);
              
            },
            success: function(data) {
              
              $.each(data.error, function(i, v) {
                if (v == true) {
                  location.reload();
                } else {
                  var msg = '<label class="error" for="' + i + '">' + v + '</label>';
                  $('input[name="' + i + '"], select[name="' + i + '"], textarea[name="' + i + '"], input[data-error="' + i + '"]').addClass('inputTxtError').after(msg);
                  btn.html('Send');
                }
              });
              
              var keys = Object.keys(data);
              $('input[name="' + keys[0] + '"]').focus();
              $('select[name="' + keys[0] + '"]').focus();
              $('textarea[name="' + keys[0] + '"]').focus();
            },
            
            // remember that's why calling success message placed here in error: function because when you used new FormData(this)
            // it's hard to read the data from controller from success: function(data)
            error: function(xhr, err) {
              
              if (xhr.status == 200) {
                
                // checks if file input upload is not empty, then do the logic
                if (file) {
                  
                  $.when(btn.html('Form submitted successfully')).done(function() {
                    
                    btn.html('Send');
                   location.reload();
                  });
                  
                } else {
                  if (settings.showMessage) {
                    alert('Nothing has changed');
                  } else {
                    
                    $.when(btn.html('Form submitted successfully')).done(function() {
                      btn.html('Success');
                     location.reload();
                    });
                  }
                }
                
                // use this catch server internal error response.
              } else if (xhr.status == 500) {
                btn.html('Send');
                alert('500 (Internal Server Error)');
                
              }
            }
          });
          
          
          
        }else{
          btn.html('Send');
        }
        
        
        function getAllUpdateOrders(){
          
          $.ajax({
            type: "GET",
            url: window.location.origin+'/admin/ordersupdates',
            dataType: "json",
            success: function(response){
              $.each(response, function(k, value) {
                
                if(value.id  == id){
                  
                  $("#orders").find("tbody > tr").each(function(index, tr){
                    
                    var targetRow = $(this);
                    
                    if(targetRow.attr('id') == value.id){
                      
                      $(this).find("td:nth(0)").find('a').css('border', '1px dotted green').text(value.order_reference_number);
                      $(this).find("td:nth(1)").find('a').css('border', '1px dotted green').text(value.order_clients);
                      $(this).find("td:nth(2)").find('a').css('border', '1px dotted green').text(value.order_status);
                      $(this).find("td:nth(2)").find('a').attr('data-target','.good-received-from-supplier');
                      
                      $('form').find('tr:nth-child(3)').find('td').find('input').css('border', '1px dotted green').val(value.order_subject);
                      
                      var order_product = value.order_product.split(",");
                      if(order_product){
                        for (i = 0; i < order_product.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(4)').find('td').find('input#order_product:nth('+[i]+')').css('border', '1px dotted green').val(order_product[i]);
                        }
                      }
                      
                      var order_amount = value.order_amount.split(",");
                      if(order_amount){
                        for (i = 0; i < order_amount.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(4)').find('td').find('input#order_amount:nth('+[i]+')').css('border', '1px dotted green').val(order_amount[i]);
                        }
                      }
                      
                      var order_material = value.order_material.split(",");
                      if(order_material){
                        for (i = 0; i < order_material.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(4)').find('td').find('input#order_material:nth('+[i]+')').css('border', '1px dotted green').val(order_material[i]);
                        }
                      }
                      
                      var order_dimensionweight = value.order_dimensionweight.split(",");
                      if(order_dimensionweight){
                        for (i = 0; i < order_dimensionweight.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(4)').find('td').find('input#order_dimensionweight:nth('+[i]+')').css('border', '1px dotted green').val(order_dimensionweight[i]);
                        }
                      }
                      
                      var order_technical_drawingreference = value.order_technical_drawingreference.split(",");
                      if(order_technical_drawingreference){
                        for (i = 0; i < order_technical_drawingreference.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(4)').find('td').find('input#order_technical_drawingreference:nth('+[i]+')').css('border', '1px dotted green').val(order_technical_drawingreference[i]);
                        }
                      }
                      
                      // TREATMET
                      var order_treatment = value.order_treatment;
                      
                      if(order_treatment){
                        for (i = 0; i < order_treatment.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(5)').find('td').find('input#order_treatment:nth('+[i]+')').css('border', '1px dotted green').val(order_treatment[i]);
                        }
                      }
                      
                      
                      var order_treatment_price = value.order_treatment_price;
                      if(order_treatment_price){
                        for (i = 0; i < order_treatment_price.length; ++i) {
                          // upadate form fields without refresh
                          $('form').find('tr:nth-child(5)').find('td').find('input#order_treatment_price:nth('+[i]+')').css('border', '1px dotted green').val(order_treatment_price[i]);
                        }
                      }
                      
                      $('form').find('tr:nth-child(8)').find('td').find('input').css('border', '1px dotted green').val(value.transport);
                      $('form').find('tr:nth-child(9)').find('td').find('input').css('border', '1px dotted green').val(value.delivery_time);
                      
                      // $.when(btn.html('Form submitted successfully')).done(function() {
                      //     alert(settings.alertmsg);
                      //     btn.html('Send');
                      // });
                    }
                  });
                }
              });
            }
          });
        }
        
        function resetErrors() {
          $('form input, form select, form textarea').removeClass('inputTxtError');
          $('label.error').remove();
        }
      });
    });
  };
}(jQuery));
