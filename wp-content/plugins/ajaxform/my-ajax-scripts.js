jQuery(document).ready(function($) {
    $('#display-data-button').click(function() {
        $.ajax({
            url: ajax_object.ajaxurl, 
            type: 'POST',
            data: {
                action: 'my_ajax_data',
            },
            success: function(response) {
                $('#data-display').html(response);
            },
        });
    });
});

