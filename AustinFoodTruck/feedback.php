<?php
session_start();
echo($_POST['name']);
echo($_POST['email']);
echo($_POST['subject']);
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject'])) {
    echo("Feedback Received!");
    
    if(file_exists("feedback.json")) {
        $current_data = json_decode(file_get_contents("feedback.json"), true);

        $new_data = array(
            'Name' => $_POST['name'],
            'Email' => $_POST['email'],
            'Content' => $_POST['subject']
        );
        array_push($current_data, $new_data);
        file_put_contents("feedback.json", json_encode($current_data));
    }
    else {
        $data = array(
            'Name' => $_POST['name'],
            'Email' => $_POST['email'],
            'Content' => $_POST['subject']
        );
        file_put_contents("feedback.json", json_encode($data));
    }
}
else {
    echo("Invalid Feedback!");
}
header("Location: ./aboutPage.html");
?>