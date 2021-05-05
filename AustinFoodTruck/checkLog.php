<?php
session_start();
// Checks if username and password are sent by POST
if (isset($_POST['username']) && isset($_POST['pwd'])) {
    $login_success = false;
    $user = $_POST['username'];
    $pwd = $_POST['pwd'];
    
    // Check if values empty
    if (($user == '') || ($pwd == '')) {
        echo(400);
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
                    $pwdCommand = "SELECT * FROM foodTruckUsers WHERE username='$user' AND pwd='$pwd';";
                    $pwdQuery = $db->query($pwdCommand);
                    if (!$pwdQuery) {
                        die("Query failed: $db->error <br> SQL command = $pwdCommand");
                    }
                    else {
                        // Check if password is same
                        if ($pwdQuery->num_rows > 0) {
                            setcookie("login", "valid", time() + 3600, "/");
                            $_SESSION["username"] = $user;
                            echo(100);
                        }
                        else {
                            echo(401);
                        }
                    }
                }
                else {
                    echo(401);
                }
            }
        }
    }
}
?>