$('#submit').click(function() {

    var form_data = {
        name: $('#name').val(),
        email: $('#email').val(),
        message: $('#message').val()
    };
    $.ajax({
        url: "<?php echo site_url('login/submit'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == "no") {
                $('#contact_form').append(msg);
            }
            if (msg == "yes") {
                $('#contact_form').append(msg);
            }
        }
    });

    return false;
});


