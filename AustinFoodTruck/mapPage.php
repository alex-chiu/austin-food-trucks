<!DOCTYPE html>

<html lang="en">

<head>
	<title>Map - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="map">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="mapPage.css">

	<script src="map.js" defer></script>
	<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
</head> 

<body>

<div id="container">
	<a href="./homePage.php"><img id="logo" src="./images/logo.jpeg" alt="logo" width="8%"></a>

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

	<div id="map"></div>

	<script
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWh3WusfJbB7AKtA7lPMCFq24JEfg3W9s&callback=initMap&libraries=&v=weekly"
    	async>
	</script>

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