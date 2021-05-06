<?php
//use on localhost
// $servername = "localhost";
// $username = "root";
// $password = "newpassword";
// $dbname = "AustinFoodTrucksDB";
// $conn = new mysqli ($servername, $username, $password, $dbname);


// Create connection
// $conn = new mysqli ('spring-2021.cs.utexas.edu', 'cs329e_bulko_alexch1u', 'bonus3Crunch8sunset', 'cs329e_bulko_alexch1u');
  
  $conn = new mysqli ('spring-2021.cs.utexas.edu', 'cs329e_bulko_robdmart', 'Strike!Rouge=Cater', 'cs329e_bulko_robdmart');
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = "SELECT latitude, longitude, truckName, shortDescription, website FROM FoodTrucks";
  $objects = [];

  if ($result = $conn->query($query)) {

    while ($row = $result->fetch_assoc()) {
    $singleObject = [];
    $latitude = $row["latitude"];
    $longitude = $row["longitude"];
    $truckName = $row["truckName"];
    $shortDescription = $row["shortDescription"];
    $website = $row["website"];
    $coord = [ "lat" => $latitude, "lng" => $longitude ];
    array_push($singleObject, $coord, $truckName, $shortDescription, $website);
    array_push($objects, $singleObject);
  }
}
  $encoded_data = json_encode($objects);
// [
//   [
//     {"lat":"30.26374275","long":"-97.76290793"},
//     "The Picnic",
//     "Outdoor eating destination featuring a wide variety of food trucks and retail vendors.",
//     "https:\/\/www.thepicnicaustin.com\/"
//     ]
// ]
?>



<!DOCTYPE html>

<html lang="en">

<head>
	<title>Map - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="map">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="mapPage.css">
  <script type="text/javascript"> var data = <?php echo json_encode($objects); ?>; </script>
	<script src="map.js" defer >   </script>
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
  <input type="hidden" id="data" value = "<?php echo $encoded_data ?>" />
	<div id="map-cntainer"> <div id="map"></div> </div>


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


