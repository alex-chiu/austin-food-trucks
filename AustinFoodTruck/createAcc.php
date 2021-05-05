<?php
session_start();
// Checks if username and password are sent by POST
if (isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['pwdRepeat'])) {
    $login_success = false;
    $user = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    
    // Check if values empty
    if (($user == '') || ($pwd == '') || ($pwdRepeat == '')) {
        echo(400);
    }
    else if ($pwd != $pwdRepeat) {
        echo (401);
    }
    else {
        // Create MySQLI Object
        $db = new mysqli ('spring-2021.cs.utexas.edu', 'cs329e_bulko_alexch1u', 'bonus3Crunch8sunset', 'cs329e_bulko_alexch1u');

        // Check if Connected
        if ($db->connect_errno) {
            die('Connection Error: ' . $db->connect_errno . ": " . $mysqli->connect_error);
        }
        else {
            // Create SQL query
            $userCommand = "SELECT * FROM foodTruckUsers WHERE username='$user';";
            $userQuery = $db->query($userCommand);
    
            // Check if query failed
            if (!$userQuery) {
                die("Query failed: $db->error <br> SQL command = $userCommand");
            }
            else {
                // Check if username already exists
                if ($userQuery->num_rows > 0) {
                    echo(402);
                }
                else {
                    $newUserCommand = "INSERT INTO foodTruckUsers VALUES('$user', '$pwd');";
                    $newUserQuery = $db->query($newUserCommand);
                    if (!$newUserQuery) {
                        die("Query failed: $db->error <br> SQL command = $newUserCommand");
                    }
                    else {
                        setcookie("login", "valid", time() + 3600, "/");
                        $_SESSION["username"] = $user;
                        echo(100);
                    }
                }
            }
        }
    }
}
?>