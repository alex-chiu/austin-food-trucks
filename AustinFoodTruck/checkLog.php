<?php
session_start();
// Checks if username and password are sent by POST
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $login_success = false;
    $f = fopen("pwd.txt", "r") or die("Unable to Open File!");

    // Check if username and password combination exists
    while (!feof($f)) {
        $line = trim(fgets($f), " \n");
        $line = explode(":", $line);
        if (($line[0] == $_POST['username']) and ($line[1] == $_POST['pwd'])) {
            $login_success = true;
        }
    }
    fclose($f);

    // Upon successful login, sets a cookie and provides story content
    if ($login_success == true) {
        $_SESSION['username'] = $_POST['username'];
        echo("  <p>Login Successful!</p>
                <p><a href='./homePage.php'>Return to Home Page</a></p>
        ");
        setcookie("login", "valid", time() + 86400, "/");
    }
    else {
        echo("  <p>Login Unsuccessful! Create Account:</p>
                <div id='input'>
                    <table>
                        <tr>
                            <th><label for='username'>Username</label></th>
                            <td><input type='text' id='username' name='username'></td>
                        </tr>
                        <tr>
                            <th><label for='pwd'>Password</label></th>
                            <td><input type='password' id='pwd' name='pwd'></td>
                        </tr>
                        <tr>
                            <th><label for='pwdRepeat'>Repeat Password</label></th>
                            <td><input type='password' id='pwdRepeat' name='pwdRepeat'></td>
                        </tr>
                    </table>
                </div>
                <div id='buttons'>
                    <button id='create'>Create Account</button>
                </div>
                <script>
                    $('#create').click(function() {
                        console.log('Creating New Account')
                        $.ajax({
                        type: 'POST',
                            url: 'createAcc.php',
                            data: {
                                username: $('#username').val(),
                                pwd: $('#pwd').val(),
                                pwdRepeat: $('#pwdRepeat').val()
                            },
                            success: function(response) {
                                if (response == 'success') {
                                    alert('Account Successfully Created! Please Log In!');
                                    login();
                                }
                                else {
                                    alert('Error! ' + response);
                                }
                            }
                        });
                    });

                    function login() {
                        window.location = './login.html';
                    }
                </script>
        ");
    }
}
?>