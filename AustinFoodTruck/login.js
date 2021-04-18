$('#login').click(function() {
    console.log('Trying Username and Password')
    $.ajax({
        type: 'POST',
        url: 'checkLog.php',
        data: {
            username: $('#username').val(),
            pwd: $('#pwd').val()
        },
        success: function(response) {
            $('#content').html(response);
        }
    });
});
