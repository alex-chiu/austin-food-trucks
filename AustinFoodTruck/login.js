$('#login').click(function() {
    $.ajax({
        type: 'POST',
        url: 'checkLog.php',
        data: {
            username: $('#username').val(),
            pwd: $('#pwd').val()
        },
        success: function(response) {
            if (response == '100') {
                alert('Logged in! Welcome!');
                window.location.href = './homePage.php';
            }
            else if (response == '400') {
                alert('Please enter a username and password!');
            }
            else if (response == '401') {
                alert('Incorrect username or password! Please try again.')
                $('#pwd').val('');
            }
        }
    });
});

$('#create').click(function() {
    window.location.href = './createAcc.html'
})