<?php
session_start();
if (!isset($_COOKIE['login'])) {
    echo("  <button id='login-button'>Login</button>
            <script>
                $('#login-button').click(function() {
                    window.location.href = './login.html';
                });
            </script>
    ");
}
else {
    echo("  <p>Welcome ".ucwords($_SESSION['username']) ."!</p>
            <form method='POST' action='./logout.php'>
                <input type='submit' value='Logout' name='logout' id='logout'>
            </form>
    "); 
}
?>