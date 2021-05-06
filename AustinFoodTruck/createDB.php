<?php
//only used on local host when DB is being created. On CS servers a DB is assigned for us. 
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


// if($conn->select_db("AustinFoodTrucksDB") == false){

//   // Create database
//   $sql = "CREATE DATABASE AustinFoodTrucksDB";
//   if ($conn->query($sql) === TRUE) {
//     echo "Database created successfully";
//   } else {
//     echo "Error creating database: " . $conn->error;
//   }
// }else{
//   echo 'AustinFoodTrucksDB already exists';
// }
echo "<br> <a href='table.php'> Go to tables </a> ";

$conn->close();
?>