// Quote request
var windows = {};
$('a.gqr').click(function(e) {   
  e.preventDefault();                   
  if(confirm("Are you sure you want to generate this file ?"))
  {
    var $this     = $(this);
    var orderid   = $(this).attr('data-order-id');
    var client_id = $(this).attr('data-order-client_id');
    var supplier  = $(this).attr('data-order-supplier');
    var product   = $(this).attr('data-order-product');
    var amount    = $(this).attr('data-order-amount');
    var url       = $(this).attr('href');        
    var name      = $(this).attr('id');    
    
    if(windows.hasOwnProperty(name) && !windows[name].closed) 
    {
      windows[name].focus();
    } 
    else 
    {
      var w = window.innerWidth;
      var h = window.innerHeight;          
      windows[name] = window.open(url, name, 'width=800,height=824,left=0,top=0,scrollbars=1');  
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $.ajax({
        url: url,
        type: 'POST',
        success: function(data) {
          console.log(data);          
        }
      });                           
    }
  }
  else
  {
    return false;
  }  
});
