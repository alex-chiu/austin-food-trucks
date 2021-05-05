$('#create').click(function() {
    $.ajax({
        type: 'POST',
        url: 'createAcc.php',
        data: {
            username: $('#username').val(),
            pwd: $('#pwd').val(),
            pwdRepeat: $('#pwd-repeat').val()
        },
        success: function(response) {
            if (response == '100') {
                alert('New Account Created! Welcome!');
                window.location.href = './homePage.php';
            }
            else if (response == '400') {
                alert('Please fill out all fields!');
            }
            else if (response == '401') {
                alert('Passwords need to match!');
            }
            else if (response == '402') {
                alert('Username already exists! Please try again.');
                $('#username').val('');
            }
        }
    });
})