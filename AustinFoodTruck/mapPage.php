<!DOCTYPE html>

<html lang="en">

<head>
	<title>Map - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="map">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="mapPage.css">
	<style type="text/css">
      /* body {
        margin: 0;
        padding: 10px 20px 20px;
        font-family: Arial;
        font-size: 16px;
      }

      #map-container {
        padding: 6px;
        border-width: 1px;
        border-style: solid;
        border-color: #ccc #ccc #999 #ccc;
        -webkit-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        -moz-box-shadow: rgba(64, 64, 64, 0.5) 0 2px 5px;
        box-shadow: rgba(64, 64, 64, 0.1) 0 2px 5px;
        width: 600px;
      }

      #map {
        width: 600px;
        height: 400px;
      } */
    </style>

	<script src="map.js" defer ></script>
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

	<div id="map-cintainer"> <div id="map"></div> </div>

	<script
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWh3WusfJbB7AKtA7lPMCFq24JEfg3W9s&callback=initMap&libraries=&v=weekly"
    	async>
	</script>

	<div id="footer">
		<div id="contact">
			<p>Questions or concerns? We're always looking for the newest and best spots to eat around town! <a href="./aboutPage.php#contact-form">Contact Us Here!</a></p>
		</div>
		<div id="signature">
			<p>Date Updated: 05/02/2021</p>
			<p>Authors: Group 2</p>
		</div>
	</div>
</div>

</body>
</html>