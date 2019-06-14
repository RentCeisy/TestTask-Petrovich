$(document).ready(function() {
    $('#sendData').click(function(e) {
        e.preventDefault();
        var url = $('#url').val();
        $.ajax({
            url: 'controller.php',
            method: 'POST',
            data: {
                url,
            },
            success(response) {
                console.log(response);
            },
            error(response) {
                console.log(response);

            }
        })
    })
});