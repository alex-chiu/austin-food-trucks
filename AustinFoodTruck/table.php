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
$sql = "DROP TABLE IF EXISTS FoodTrucks, Users, Reviews";
         
if(mysqli_query($conn, $sql)) {  
  echo "Tables is deleted successfully <br>";  
} else {  
  echo "Tables is not deleted successfully\n <br>";
  }



$trucksSQL = 'CREATE TABLE IF NOT EXISTS FoodTrucks(
    id INT(6) PRIMARY KEY,
    truckName VARCHAR(30),
    imageLink VARCHAR(30),
    shortDescription MEDIUMTEXT,
    foodType VARCHAR(30),
    contactMethod VARCHAR(30),
    contactInfo VARCHAR(30),
    address VARCHAR(60),
    website VARCHAR(45),
    initialRating DECIMAL(2,1),
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8)
)';
$userSQL = 'CREATE TABLE IF NOT EXISTS Users(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30),
    password VARCHAR(30)
)';

$reviewsSQL = 'CREATE TABLE IF NOT EXISTS Reviews(
    reviewID INT(6) AUTO_INCREMENT PRIMARY KEY,
    truckID INT(6) UNSIGNED,
    truckName VARCHAR(30),
    starRating INT(6) UNSIGNED,
    review TINYTEXT
)';



if ($conn->query($trucksSQL) === TRUE) {
    echo "Table Trucks created successfully";
  } else {
    echo "Error creating Trucks table: " . $conn->error;
  }
echo '<br><br>';

if ($conn->query($userSQL) === TRUE) {
    echo "Table Users created successfully";
  } else {
    echo "Error creating Users table: " . $conn->error;
  }
echo '<br><br>';

if ($conn->query($reviewsSQL) === TRUE) {
    echo "Table Reviews created successfully";
  } else {
    echo "Error creating Reviews table: " . $conn->error;
  }
  
echo "<br> <a href='initialPopulateDB.php'> Populate DB </a> ";

  $conn->close();
  ?>