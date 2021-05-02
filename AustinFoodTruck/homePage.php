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
    <script src="homePage.js" defer></script>
</head> 

<body onload="checkLogin();">
<div id="container">
    <div id="logo-div">
        <a href="./homePage.php"><img id="logo" src="./images/logo.jpeg" alt="logo" width="100%"></a>
    </div>
    <div id="login"></div>

    <ul id="nav-bar">
        <li><a href="./homePage.php">HOME</a></li>
        <li><a href="./reviewsPage.php">REVIEWS</a></li>
        <li><a href="./mapPage.php">MAP</a></li>
        <li><a href="./aboutPage.php">ABOUT</a></li>
        <?php
        if( isset($_COOKIE["login"]) and $_COOKIE["login"] == "valid"){
            echo '<li><a href="./ratePage.php">RATE</a></li> ';
        }
        ?>
    </ul>

    <img id="homePageImg" src="./images/homePageImg.jpg" alt="austin" width="100%">
    <div align="center"><audio controls autoplay>
        <source src="images/alright.mp3" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
    </div>
    
    <p id="description">Austin has a thriving food truck scene and with so many options, it can get hard to decide where to eat. That’s why we’re here! Discover the best food trucks options in Austin!</p>
    <p id="description">Check out this <a href="https://www.youtube.com/watch?v=XtyP_kYlYTw">video</a> to discover the variety of Austin's foodtruck and don't hesitate to browse the youtube channel as well!</p>

    <div id="footer">
        <div id="contact">
            <p>Questions or concerns? We're always looking for the newest and best spots to eat around town! <a href="./aboutPage.html#contact-form">Contact Us Here!</a></p>
        </div>
        <div id="signature">
            <p>Date Updated: 05/02/2021</p>
            <p>Authors: Group 2</p>
        </div>
    </div>
</div>
</body>
</html>