// Calls PHP script that checks login status
function checkLogin() {
    console.log("Checking Login")
    $.ajax({
        url: 'login.php',
        success: function(response) {
            $('#login').html(response);
        }
    });
}