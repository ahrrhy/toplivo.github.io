$(document).ready(function() {
    ouibounce($('#js-optin-wrap')[0], {
        // Uncomment the line below if you want the modal to appear every time
        // More options here: https://github.com/carlsednaoui/ouibounce
        aggressive: true,
        sitewide: true,
    });

    $("#js-optin-submit").click(function(event) {
        event.preventDefault();

        $(this).val('Отсылаем...').prop('disabled');

        var data = {
            'name': 'combeck',
            'tel': $('#js-optin-email').val(),
            'sender': $('#js-optin-sender').val()
        };

        $.post('../ajax_send.php', data, function(response) {
            console.log('Server returned:', response);

            // Handle the response (take care of error reporting!)
            $('#js-optin-step1').hide().next('#js-optin-step2').show();
        });
    });

    $('.js-optin-close').on('click', function(event) {
        event.preventDefault();
        $('#js-optin-wrap').hide();
    });
});