<?php
$servername = "localhost";
$username = "root";
$password = "newpassword";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if($conn->select_db("AustinFoodTrucksDB") == false){

  // Create database
  $sql = "CREATE DATABASE AustinFoodTrucksDB";
  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }
}else{
  echo 'AustinFoodTrucksDB already exists';
}
echo "<br> <a href='table.php'> Go to tables </a> ";

$conn->close();
?>