<?php
session_start();
if (!isset($_COOKIE['login'])) {
    echo("  <a href='./login.html'>
                <button id='login-button'>Login</button>
            </a>
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