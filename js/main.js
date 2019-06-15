$(document).ready(function() {
    $('#sendData').click(function(e) {
        e.preventDefault();
        var url = $('#url').val();
        $.ajax({
            url: 'controller.php',
            method: 'POST',
            dataType: 'json',
            data: {
                url,
            },
            success(response) {
                $('.msg').html(response.result);
            },
            error(response) {
                $('.msg').html('Something went wrong...');
            }
        })
    })
});