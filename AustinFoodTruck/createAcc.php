<?php
session_start();
// Checks if username and password are sent by POST
if (isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['pwdRepeat'])) {
    $f = file("./pwd.txt") or die("Unable to Open File!");
    $usernames = array();

    foreach($f as $line) {
        $line = trim($line, "\n");
        $line = explode(":", $line);
        array_push($usernames, $line[0]);
    }
    
    $vU = true;
    $vP = true;
    $failure = "";

    $u = $_POST['username'];
    $p = $_POST['pwd'];
    $pR = $_POST['pwdRepeat'];

    // Check if username is duplicate
    if (in_array($u, $usernames)) {
        $vU = false;
        $failure = "Username already exists!";
    }

    // Check if passwords match
    if ($p != $pR) {
        $vP = false;
        $failure = "Passwords Don't Match!";
    }

    // Check if valid username and password
    if ($vU == true && $vP == true) {
        $new = "\n$u:$p";
        array_push($f, $new);
        file_put_contents("pwd.txt", implode('', $f));
        echo("success");
    }
    else {
        echo($failure);
    }
}
?>