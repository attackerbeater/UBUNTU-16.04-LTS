$(function() {

    
    $('#row_dim').find('[type="text"]').removeAttr('name');

    $('#row_dim').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'new_email') {
            $('#row_dim').show(); 
            $('#row_dim').find('[type="text"]').attr('name', 'email');
        } else {
            $('#row_dim').hide(); 
            $('#row_dim').find('[type="text"]').removeAttr('name');
        } 
    });
});