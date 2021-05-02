<?php
function logout(){
    setcookie("login", "valid", time() - 3600, "/");
}
logout();
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<title>Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="Austin's Best Food Trucks">
	<meta name="author" content="Group 2">
    <link rel="stylesheet" href="homePage.css">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">
    </script>
    <script src="login.js" defer></script>
</head> 

<body>
<div id="container">
    <div id="logo-div">
        <a href="./homePage.php"><img id="logo" src="./images/logo.jpeg" alt="logo" width="100%"></a>
    </div>

    <ul id="nav-bar">
        <li><a href="./homePage.php">HOME</a></li>
        <li><a href="./reviewsPage.html">REVIEWS</a></li>
        <li><a href="./mapPage.html">MAP</a></li>
        <li><a href="./aboutPage.html">ABOUT</a></li>
    </ul>

    <div id="content">
        <p>Thank you for logging out. Come back and visit us soon! </p>
    </div>

    

    <div id="footer">
        <div id="contact">
            <p>Questions or concerns? We're always looking for the newest and best spots to eat around town! <a href="./aboutPage.html#contact-form">Contact Us Here!</a></p>
        </div>
        <div id="signature">
            <p>Date Updated: 04/18/2021</p>
            <p>Authors: Group 2</p>
        </div>
    </div>
</div>
</body>
</html>