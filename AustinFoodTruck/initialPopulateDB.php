<?php

// This script is only called once by admin in order to populate the DB.


$servername = "localhost";
$username = "root";
$password = "newpassword";
$dbname = "AustinFoodTrucksDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
mysqli_options($conn, MYSQLI_OPT_LOCAL_INFILE, true);

$sql = "LOAD DATA LOCAL INFILE '/Users/robertmartinez/Sites/AustinFoodTrucksFinal/AustinFoodTruck/foodTrucks.csv' 
        INTO TABLE FoodTrucks
        FIELDS TERMINATED BY ','
        LINES TERMINATED BY '\n'
        ";
      

$load = mysqli_query($conn, $sql);
//show Food Trucks

$query = "SELECT * FROM FoodTrucks";
echo "<b> <center>Database Output</center> </b> <br> <br>";

if ($result = $conn->query($query)) {

    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $truckName = $row["truckName"];
        $imageLink = $row["imageLink"];
        $shortDescription = $row["shortDescription"];
        $foodType = $row["foodType"];
        $contactMethod = $row["contactMethod"];
        $contactInfo = $row["contactInfo"];
        $address = $row["address"];
        $website = $row["website"];
        $initialRating = $row["initialRating"];
        $latitude = $row["latitude"];
        $longitude = $row["longitude"];



        echo $id."  ".$truckName."<br>".$shortDescription."  ".$website."  ".$initialRating."<br><br>";
    }

/*freeresultset*/
$result->free();
}

$conn->close();
?>