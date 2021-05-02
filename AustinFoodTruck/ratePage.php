<!DOCTYPE html>

<html lang="en">

<head>
	<title>Map - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="map">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="rate.css">

	<script src="map.js" defer></script>
	<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
</head> 

<body>
    <script language = "javascript" type = "text/javascript">
        function displayMessage(){
            // if food truck name is valid and user selected a rating
            alert("Thanks for leaving a rating!");
            // if food truck name is not valid display alert saying not valid
            
            // if food truck name is valid but did not select a rating display alert saying pls select rating
        }
    </script>

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
    </div>

    <div id="message">
        <h2>Leave a Review of Your Favorite Food Truck:</h2>
        <p>If you would like to leave a review for a food truck you visited recently, fill out the form below.</p>
        <p>Please use the correct and complete Food Truck name so we may include it in the correct set of reviews.</p>
        <br><br>
    </div>

    <div id="rateForm">
        <form action="" align="center">
            <label for="foodTruckName">Food Truck Name</label>
            <input type="text" name="foodTruckName" id="foodTruckName" required> <br>

            <p>Star Ratings: </p>
            <input type="radio" id="oneStar" name="stars" value="1">
            <label for="oneStar">1</label>
            <input type="radio" id="twoStar" name="stars" value="2">
            <label for="twoStar">2</label>
            <input type="radio" id="threeStar" name="stars" value="3">
            <label for="threeStar">3</label>
            <input type="radio" id="fourStar" name="stars" value="4">
            <label for="fourStar">4</label>
            <input type="radio" id="fiveStar" name="stars" value="5">
            <label for="fiveStar">5</label>
            <br><br>

            <label for="review">Review of Food Truck</label> <br>
            <textarea id="review" name="review" placeholder="Leave a review" style="height:200px; width:500px"></textarea>
            <br><br>
            <input type="submit" value="Rate" onclick="displayMessage(); return false"/>
		    <input type="reset" value="Reset"/>
        </form>
    </div>

    <div id="footer">
		<div id="contact">
			<p>Questions or concerns? We're always looking for the newest and best spots to eat around town! <a href="./aboutPage.html#contact-form">Contact Us Here!</a></p>
		</div>
		<div id="signature">
			<p>Date Updated: 05/02/2021</p>
			<p>Authors: Group 2</p>
		</div>
	</div>

</body>
</html>