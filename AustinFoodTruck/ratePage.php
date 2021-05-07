<!DOCTYPE html>

<html lang="en">

<head>
	<title>Rate - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="map">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="rate.css">

	<script src="map.js" defer></script>
	<script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
</head> 

<body>
    <script language = "javascript" type = "text/javascript">
        var leftRating = false;
        var selectedTruck = false;
        function displayMessage(){
            var ddl = document.getElementById("trucks");
            var selectedValue = ddl.options[ddl.selectedIndex].value;
            if (selectedValue == "selecttruck"){
                alert("Please select a truck");
                selectedTruck = false;
            }
            else{
                selectedTruck = true;
            }
            var radios = document.getElementsByName("stars");
            if (radios[0].checked){
                leftRating = true;
            }
            if (radios[1].checked){
                leftRating = true;
            }
            if (radios[2].checked){
                leftRating = true;
            }
            if (radios[3].checked){
                leftRating = true;
            }
            if (radios[4].checked){
                leftRating = true;
            }
            if(!leftRating){
                alert("Please leave a rating")
            }
            if (leftRating && selectedTruck){
                alert("Thanks for leaving a rating!");
                var dropDown = document.getElementById("trucks");
                dropDown.selectedIndex = 0;
                var radList = document.getElementsByName('stars');
                for (var i = 0; i < radList.length; i++) {
                    if(radList[i].checked){
                        radList[i].checked = false;
                    }
                }

            }

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
        <br><br>
    </div>

    <div align="center" id="rateForm">
        <form action="" align="center">

            <label for="trucks">Food Truck Name:</label>
            <select autofocus required name="trucks" id="trucks" onmousedown="this.value='';" onchange="selection(this.value);">
                <option value="selecttruck" hidden disabled selected value>(select an option)</option>
                <option value="1">The Picnic</option>
                <option value="2">Abu Omar Halal</option>
                <option value="3">Four Borthers</option>
                <option value="4">Bananarchy</option>
                <option value="5">Patrizi's</option>
                <option value="6">Spicy Boys</option>
                <option value="7">Arlo's</option>
                <option value="8">Mi Sabor Oaxaqueno</option>
                <option value="9">Tony's Jamaican Food</option>
                <option value="10">T-Loc's Sonora</option>
                <option value="11">Kebabalicious</option>
                <option value="12">Baton Creole</option>
                <option value="13">Don Japanese Kitchen</option>
                <option value="14">Valentina's Tex Mex BBQ</option>
                <option value="15">DEE DEE</option>
                <option value="16">Pepe's Tacos</option>
                <option value="17">Pinch</option>
                <option value="18">Longhorn Chicken</option>
                <option value="19">Espadas de Brazil</option>
                <option value="20">Cold Cookie Company</option>
                <option value="21">Wrigleyville South Dogs & Beef</option>
                <option value="22">Saperlipopette!</option>
                <option value="23">Little Lucy's</option>
                <option value="24">Tommy Want Wingy</option>
                <option value="25">Quezzas</option>
                <option value="26">Mr Sandwich</option>
                <option value="27">Taco Baby</option>
                <option value="28">Burro Cheese Kitchen</option>
                <option value="29">Gobble Gobble</option>
                <option value="30">Gebby's BBQ</option>
                <option value="31">Bummer Burrito</option>
                <option value="32">Olaya Peruvian Food</option>
                <option value="33">Monk's Momo</option>
                <option value="34">Big Fat Greek Gyros</option>
                <option value="35">La Sirena</option>
                <option value="36">Via 313</option>
                <option value="37">East Side King</option>
                <option value="38">Mickelthwait</option>
                <option value="39">Holla Mode</option>
                <option value="40">Wayside</option>       
            </select>

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
            <input id="rateB" align="center" type="submit" value="Rate" onclick="displayMessage(); return false"/>
		    <br>
            <input id="resetB" type="reset" value="Reset"/>
        </form>
    </div>

    <div id="footer">
		<div id="contact">
			<p>Questions or concerns? We're always looking for the newest and best spots to eat around town! <a href="./aboutPage.php#contact-form">Contact Us Here!</a></p>
		</div>
		<div id="signature">
			<p>Date Updated: 05/07/2021</p>
			<p>Authors: Group 2</p>
		</div>
	</div>

</body>
</html>