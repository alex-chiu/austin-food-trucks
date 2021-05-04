<!DOCTYPE html>

<html lang="en">

<head>
	<title>Reviews - Austin's Food Trucks</title>
	<meta charset="UTF-8">
	<meta name="description" content="reviews">
	<meta name="author" content="Group 2">
	<link rel="stylesheet" href="reviewsPage.css">
	<script type="text/javascript" src="reviewsPage.js" defer></script>
	<style>
	.collapsible {
		background-color: #ebab46;
		color: white;
		cursor: pointer;
		padding: 10px;
		border: none;
		text-align: center;
		outline: none;
		display: block;
		font-size: 15px;
		margin-left: auto;
    	margin-right: auto;
	}

	.active, .collapsible:hover {
		background-color: #000000;
	}

	.content {
		padding: 0 18px;
		display: none;
		overflow: hidden;
		background-color: #ebab46;
		margin-left: auto;
    	margin-right: auto;
	}

	#suggestB{
		background-color: #3c3d31;
		border: none;
		color: white;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 12px;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	#buttons{
		width: 25%;
		margin-left: auto;
		margin-right: auto; 
		font-family: Tahoma ; 
	}
	</style>
</head> 

<body>

<div id="container">
	<a href="./homePage.php"><img id="logo" src="./images/logo.jpeg" alt="logo"></a>

	<ul id="nav-bar">
        <li><a href="./homePage.php">HOME</a></li>
        <li><a href="./reviewsPage.php">REVIEWS</a></li>
        <li><a href="./mapPage.php">MAP</a></li>
        <li><a href="./aboutPage.php">ABOUT</a></li>
        <?php
        if(isset($_COOKIE["login"]) and $_COOKIE["login"] == "valid"){
            echo '<li><a href="./ratePage.php">RATE</a></li> ';
        }
        ?>
    </ul>

	<?php
		session_start();
        if(isset($_COOKIE["login"]) and $_COOKIE["login"] == "valid"){
			if (isset($_POST["truckSuggested"])){ 
				$mysqli = new mysqli ("spring-2021.cs.utexas.edu", "cs329e_bulko_edoardop", "viking-leper9none", "cs329e_bulko_edoardop");
				$truck = $_POST["truckSuggested"];
				$command = "SELECT * FROM truckssuggestions WHERE suggestion='$truck'";
				$result = $mysqli->query($command);
				if ($result->num_rows === 0){
					$command = "INSERT INTO truckssuggestions VALUES('$truck', 1)";
					$result = $mysqli->query($command);
				}
				else{
					$command = "UPDATE truckssuggestions SET number=number+1 WHERE suggestion='$truck'";
					$result = $mysqli->query($command);
				}
			}
			//echo $_SESSION['username'];
			echo '<table id="buttons">';
			echo '<tr>';
			echo '<td style="width:10%"></td>';
			echo '<td><button type="button" class="collapsible">All Suggestions</button>';
			echo '<div class="content">';
			echo "<table>";
			$mysqli = new mysqli ("spring-2021.cs.utexas.edu", "cs329e_bulko_edoardop", "viking-leper9none", "cs329e_bulko_edoardop");
			$query = "SELECT * FROM truckssuggestions";
			$result = $mysqli->query($query);
			while($row = $result->fetch_row()){ 
				echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
			}
			echo "</table>";
			echo '</div></td>';
			echo '<td><button type="button" class="collapsible">Suggest a Food Truck You Want to See on Here!</button>';
			echo '
			<div class="content">
			  <form method = "POST">
			  <input type="text" name="truckSuggested" id="truckSuggested" required>
			  <br>
			  <input id="suggestB" type="submit" value="Suggest"/>
			  </form>
			</div></td>
			';
			echo '</tr>';
			echo '</table>';

        }
    ?>
	<script language = "javascript" type = "text/javascript">
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.display === "block") {
			content.style.display = "none";
			} else {
			content.style.display = "block";
			}
		});
		}
	</script>

	<form>
		<label for="trucks">Let me see:</label>
		<select name="trucks" id="trucks" onmousedown="this.value='';" onchange="selection(this.value);">
			<option value="all">All</option>
			<option value="best">Highest Rated</option>
			<option value="mexican">Mexican Food</option>
			<option value="mediterranean">Mediterranean Food</option>
			<option value="asian">Asian Food</option>
			<option value="italian">Italian Food</option>
			<option value="sa">South American Food</option>
			<option value="american">American Food</option>
			<option value="dessert">Dessert</option>
		</select>
	</form>
	
	<!-- All trucks -->
	<div id="all">
	<table id="allTrucks" border="1" style="width:75%">
		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truckPicnic.jpg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truckPicnic.jpg" width="280px" height= "300px">
						<div class="desc">The Picnic at Barton Springs</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">The Picnic</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Outdoor eating destination featuring a wide variety of food trucks and retail vendors.</th>
					</tr>

					<tr>
						<th width="33%" class="num"><a href="mailto:PicnicAustin@gmail.com">PicnicAustin@gmail.com</a></th>
						<th width="33%" class="addy">1720 Barton Springs Rd, Austin, TX 78704</th>
						<th width="33%" class="websites"><a href="https://www.thepicnicaustin.com/" target="_blank">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truckAbuOmar.jpg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truckAbuOmar.jpg" width="280px" height= "300px">
						<div class="desc">Abu Omar Halal</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Abu Omar Halal</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Abu Omar Halal serves a variety of halal street food and sandwiches, but is best known for its signature chicken shawarma.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15125579818">(512) 557-9818</a></th>
						<th width="33%" class="addy">2718 Guadalupe St, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="https://www.abuomarhalal.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truck4Bros.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truck4Bros.jpeg" width="280px" height= "300px">
						<div class="desc">Four Brothers - Rainey St.</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Four Brothers</th>
						<th></th>
						<th class="ratings">4.8</th>
					</tr>

					<tr>
						<th colspan="3">Food truck serving arepas & other Venezuelan favorites in a parking lot with outdoor picnic tables.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5122263971">(512) 226-3971</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.grubhub.com/restaurant/four-brothers-venezuelan-food-80-rainey-st-austin/492612" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truckBananarchy.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truckBananarchy.jpeg" width="280px" height= "300px">
						<div class="desc">Bananarchy</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Bananarchy</th>
						<th></th>
						<th class="ratings">5.0</th>
					</tr>

					<tr>
						<th colspan="3">Dessert Truck serving chocolate covered bananas that are sourced ethically.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5125229316">(512) 522-9316</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://bananarchy.net/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>
        
        <tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truckPatrizis.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truckPatrizis.jpeg" width="280px" height= "300px">
						<div class="desc">Patrizi's</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Patrizi's</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">This food truck dishes up old-school Italian standards & housemade pasta.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5125224834">(512) 522-4834</a></th>
						<th width="33%" class="addy">2307 Manor Rd, Austin, TX 78722</th>
						<th width="33%" class="websites"><a href="https://www.patrizis.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckSpicyBoys.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckSpicyBoys.jpeg" width="280px" height= "300px">
						<div class="desc">Spicy Boys</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Spicy Boys</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Pan-Asian food truck serving addiction-level sambal wings and a Thai fried chicken sandwich hearty enough to soak up even the strongest IPA</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5125389658">(512) 538-9658</a></th>
						<th width="33%" class="addy">1701 E 6th St, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="https://www.spicyboyschicken.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckArlos.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckArlos.jpeg" width="280px" height= "300px">
						<div class="desc">Arlo's</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Arlo's</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Food trailer outside Cheer Up Charlie's for vegan tacos & burgers, plus beer & picnic-table seats.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5128401600">(512) 840-1600</a></th>
						<th width="33%" class="addy">900 Red River St, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="http://arloscurbside.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckMiSaborOaxaqueño.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckMiSaborOaxaqueño.jpeg" width="280px" height= "300px">
						<div class="desc">Mi Sabor Oaxaqueño</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Mi Sabor Oaxaqueño</th>
						<th></th>
						<th class="ratings">4.8</th>
					</tr>

					<tr>
						<th colspan="3">Authentic Mexican food truck selling the best homemade tlayudas and picaditas in town</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5125274751">(512) 527-4751</a></th>
						<th width="33%" class="addy">10503 N Lamar Blvd, Austin, TX 78753</th>
						<th width="33%" class="websites"><a href="https://www.doordash.com/store/mi-sabor-oaxaqueno-austin-1316827">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckTonysJamaican.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckTonysJamaican.jpeg" width="280px" height= "300px">
						<div class="desc">Tony's Jamaican Food</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Tony's Jamaican Food</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Low-key window-serve eatery featuring a menu of traditional Jamaican dishes & outdoor seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5129455090">(512) 945-5090</a></th>
						<th width="33%" class="addy">1200 E 11th St, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="https://www.tonysjamaicanfood.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckTLocsSonora.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckTLocsSonora.jpeg" width="280px" height= "300px">
						<div class="desc">T-Loc's Sonora</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">T-Loc's Sonora</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Specialty hot dogs with origins in Mexico & Arizona, tacos, burritos, tortas & fries from a truck.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5129948982">(512) 994-8982</a></th>
						<th width="33%" class="addy">5000 Burnet Rd, Austin, TX 78756</th>
						<th width="33%" class="websites"><a href="https://www.tlocs.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckKebabalicious.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckKebabalicious.jpeg" width="280px" height= "300px">
						<div class="desc">Kebabalicious</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Kebabalicious</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Organic Turkish kebobs in the brick-&-mortar outpost of a popular food truck. Live music outdoors.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5124666997">(512) 466-6997</a></th>
						<th width="33%" class="addy">1311 E 7th St, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="http://www.kebabalicious.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckBatonCreole.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckBatonCreole.jpeg" width="280px" height= "300px">
						<div class="desc">Baton Creole</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Baton Creole</th>
						<th></th>
						<th class="ratings">4.4</th>
					</tr>

					<tr>
						<th colspan="3">Quirky hot-pink food trailer doling our Southern Louisiana-style street eats amid picnic tables.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5129863834">(512) 986-3834</a></th>
						<th width="33%" class="addy">5500 S Congress Ave, Austin, TX 78745</th>
						<th width="33%" class="websites"><a href="http://batoncreole.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckDonJapaneseKitchen.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckDonJapaneseKitchen.jpeg" width="280px" height= "300px">
						<div class="desc">Don Japanese Kitchen</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Don Japanese Kitchen</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Japanese craft your own donburi spot with hefty portions, creative toppings & novelty beverages.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+2817253686">(281) 725-3686</a></th>
						<th width="33%" class="addy">411 W 23rd St, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="http://donjapaneseaustin.com/?utm_source=gmb&utm_medium=referral">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckValentinas.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckValentinas.jpeg" width="280px" height= "300px">
						<div class="desc">Valentina's Tex Mex BBQ</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Valentina's Tex Mex BBQ</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Permanent trailer for mesquite-smoked BBQ with a Tex Mex Twist.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+5122214248">(512) 221-4248</a></th>
						<th width="33%" class="addy">11500 Manchaca Rd, Austin, TX 78748</th>
						<th width="33%" class="websites"><a href="http://www.valentinastexmexbbq.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckDeeDee.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckDeeDee.jpeg" width="280px" height= "300px">
						<div class="desc">DEE DEE</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">DEE DEE</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Northern Thai specialties featuring market-fresh ingredients from a food trailer with picnic tables.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="mailto: info@deedeeatx.com"> info@deedeeatx.com</a></th>
						<th width="33%" class="addy">4204 Manchaca Rd, Austin, TX 78704</th>
						<th width="33%" class="websites"><a href="http://deedeeatx.com/">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckPepes.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckPepes.jpeg" width="280px" height= "300px">
						<div class="desc">Pepe's Tacos</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Pepe's Tacos</th>
						<th></th>
						<th class="ratings">4.8</th>
					</tr>

					<tr>
						<th colspan="3">Birria style tacos, tortas, and more</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+17372034175">(737) 203-4175</a></th>
						<th width="33%" class="addy">704 N Lamar Blvd, Austin, TX 78703</th>
						<th width="33%" class="websites"><a href="https://www.pepestacostx.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckPinch.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckPinch.jpeg" width="280px" height= "300px">
						<div class="desc">Pinch</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Pinch</th>
						<th></th>
						<th class="ratings">4.4</th>
					</tr>

					<tr>
						<th colspan="3">Walk-up window with Asian-inspired bento boxes served with rice, veggies, & choice of protein.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15128206611">(512) 820-6611</a></th>
						<th width="33%" class="addy">2011 Whitis Ave, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="https://www.facebook.com/pinchthefoodtrailer/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckLonghornChicken.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckLonghornChicken.jpeg" width="280px" height= "300px">
						<div class="desc">Longhorn Chicken</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Longhorn Chicken</th>
						<th></th>
						<th class="ratings">4.0</th>
					</tr>

					<tr>
						<th colspan="3">Yellow food truck dishing up chicken & waffles, wings & sandwiches from the window until late.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15127202334">(512) 720-2334</a></th>
						<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="http://thelonghornchicken.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckEspadasDeBrazil.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckEspadasDeBrazil.jpeg" width="280px" height= "300px">
						<div class="desc">Espadas de Brazil</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Espadas de Brazil</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">A curated menu specializing in Brazilian meats, sides, & sandwiches with picnic table seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15129653181">(512) 965-3181</a></th>
						<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="http://espadasdebrazil.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckColdCookie.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckColdCookie.jpeg" width="280px" height= "300px">
						<div class="desc">Cold Cookie Company</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Cold Cookie Company</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Brightly colored food truck serving gourmet ice cream sandwiches with an array of flavors & topping.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="mailto:coldcookiecompany@gmail.com">coldcookiecompany@gmail.com</a></th>
						<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="http://coldcookiecompany.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckWrigleyville.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckWrigleyville.jpeg" width="280px" height= "300px">
						<div class="desc">Wrigleyville South Dogs & Beef</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Wrigleyville South Dogs & Beef</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">All the fixings on a Vienna, Polish, or 100% Italian Beef hot dog. Spice it up with a chili-cheese dog. Good old fashioned man food. Ballpark hotdogs.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+16308858008">(630) 885-8008</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.wrigleyvillesouthdogsandbeef.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckSaperlipopette.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckSaperlipopette.jpeg" width="280px" height= "300px">
						<div class="desc">Saperlipopette!</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Saperlipopette!</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Grab a french hot dog (hot dog in a baguette) or a brie, jam, and honey drizzled crepe. Ideal place for ice cream on a nice day. Lots of shaded seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15126212166">(512) 621-2166</a></th>
						<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.saperlipopette-atx.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckLittleLucys.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckLittleLucys.jpeg" width="280px" height= "300px">
						<div class="desc">Little Lucy's</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Little Lucy's</th>
						<th></th>
						<th class="ratings">4.4</th>
					</tr>

					<tr>
						<th colspan="3">Colorful, late-night food truck making mini-donuts with creative flavors, toppings & dipping sauces.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+14242358297">(424) 235-8297</a></th>
						<th width="33%" class="addy">75 1/2 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://littlelucys.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckTommyWantWingy.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckTommyWantWingy.jpeg" width="280px" height= "300px">
						<div class="desc">Tommy Want Wingy</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Tommy Want Wingy</th>
						<th></th>
						<th class="ratings">4.4</th>
					</tr>

					<tr>
						<th colspan="3">Pick your spice level. Hand “rubbed” chicken wings are delicious. Easy finger food that satisfies that chicken wing hankering!</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15126628516">(512) 662-8516</a></th>
						<th width="33%" class="addy">94 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.tommywantwingyatx.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckQuezzas.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckQuezzas.jpeg" width="280px" height= "300px">
						<div class="desc">Quezzas</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Quezzas</th>
						<th></th>
						<th class="ratings">4.4</th>
					</tr>

					<tr>
						<th colspan="3">Think of Quezzas as an open-faced quesadilla with your choice of toppings. This quesadilla “pizza” is a melty, cheesy treat with a wide range of sauces.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15129837927">(512) 983-7927</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.quezzas.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckMrSandwich.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckMrSandwich.jpeg" width="280px" height= "300px">
						<div class="desc">Mr Sandwich</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Mr Sandwich</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Go gluten free by ditching the bun and getting your order on top of fries. A reliable burger joint on Rainey Street. Austin French Fries are loaded to the max!</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+7372243016">(737) 224-3016</a></th>
						<th width="33%" class="addy">82 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.facebook.com/pg/mrsandwichus/posts/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckBurroCheeseKitchen.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckBurroCheeseKitchen.jpeg" width="280px" height= "300px">
						<div class="desc">Burro Cheese Kitchen</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Burro Cheese Kitchen</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Artisan cheeses melted on salty sourdough bread. Fried to mouth watering perfection. Toasted Sourdough adds a nice texture. Plenty of common area seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15127672810">(512) 767-2810</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.burrocheesekitchen.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckGobbleGobble.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckGobbleGobble.jpeg" width="280px" height= "300px">
						<div class="desc">Gobble Gobble</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Gobble Gobble</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">The grass-fed beef here it difficult to find anywhere else on Rainey Street. Throw out the bun and turn it into a salad. Healthy man food.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+19145520358">(914) 552-0358</a></th>
						<th width="33%" class="addy">83 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.icenhauers.com/gobble-gobble" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="280px" height= "300px">
						<div class="desc">Gebby's BBQ</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Gebby's BBQ</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Sliced brisket sandwich and gouda mac and cheese are mouth watering. Lots of common area seating. Easy, filling, and reliable.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15122719448">(512) 271-9448</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://gebbysbbq.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="280px" height= "300px">
						<div class="desc">Bummer Burrito</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Bummer Burrito</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Queso and jalapeno poppers make an excellent pre-game snack. Churros if you’re craving sweets. Burritos are massive, easily feeds two people.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15123053133">(512) 305-3133</a></th>
						<th width="33%" class="addy">89 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.bummerburrito.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckOlaya.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckOlaya.jpeg" width="280px" height= "300px">
						<div class="desc">Olaya Peruvian Food</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Olaya Peruvian Food</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Only place on Rainey Street to get ceviche! They also have tasty steak, chicken, or mushroom wok bowls. Olaya is a fresh take on South American cuisine.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+17872191900">(787) 219-1900</a></th>
						<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://www.olayatx.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckMonksMomo.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckMonksMomo.jpeg" width="280px" height= "300px">
						<div class="desc">Monk's Momo</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Monk's Momo</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Beef, chicken, or veggie “pot sticker” dumplings by the 10 piece. Comfort food with dipping sauce. Hard to beat if your in the mood for something salty and savory.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+17376100968">(787) 219-1900</a></th>
						<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.facebook.com/monksmomoatx/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckBigFatGreekGyros.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckBigFatGreekGyros.jpeg" width="280px" height= "300px">
						<div class="desc">Big Fat Greek Gyros</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Big Fat Greek Gyros</th>
						<th></th>
						<th class="ratings">4.3</th>
					</tr>

					<tr>
						<th colspan="3">Salty, beefy, yogurt sauce all wrapped up. Grab a honey drizzled baklava for dessert. Go gluten free and turn it into a delicious salad. Lots of seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15123646635">(512) 364-6635</a></th>
						<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://bigfatgreekgyros.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckLaSirena.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckLaSirena.jpeg" width="280px" height= "300px">
						<div class="desc">La Sirena</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">La Sirena</th>
						<th></th>
						<th class="ratings">4.3</th>
					</tr>

					<tr>
						<th colspan="3">Traditional and authentic mexican carnitas tacos are delicate and delicious. Cheese quesadillas for the kids. Lots of seating.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15126193008">(512) 619-3008</a></th>
						<th width="33%" class="addy">96 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.facebook.com/lafantabuloustaqueria/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckVia313.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckVia313.jpeg" width="280px" height= "300px">
						<div class="desc">Via 313</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Via 313</th>
						<th></th>
						<th class="ratings">4.8</th>
					</tr>

					<tr>
						<th colspan="3">This trailer outside Craft Pride is known for Detroit-style pies & the only Via 313 location with brunch.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15126099405">(512) 609-9405</a></th>
						<th width="33%" class="addy">96 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://via313.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckEastSideKing.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckEastSideKing.jpeg" width="280px" height= "300px">
						<div class="desc">East Side King</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">East Side King</th>
						<th></th>
						<th class="ratings">4.5</th>
					</tr>

					<tr>
						<th colspan="3">This hip food truck behind The Grackle (one of a local trio) serves Asian-fusion bites until late.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15124078166">(512) 407-8166</a></th>
						<th width="33%" class="addy">1618 E 6th St, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="http://eastsideking.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckMickelthwait.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckMickelthwait.jpeg" width="280px" height= "300px">
						<div class="desc">Mickelthwait</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Mickelthwait</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">Trailer with outdoor picnic tables serves up BBQ meats, notably a daily smoked-sausage selection.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15127915961">(512) 791-5961</a></th>
						<th width="33%" class="addy">1309 Rosewood Ave, Austin, TX 78702</th>
						<th width="33%" class="websites"><a href="http://craftmeatsaustin.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckHollaMode.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckHollaMode.jpeg" width="280px" height= "300px">
						<div class="desc">Holla Mode</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Holla Mode</th>
						<th></th>
						<th class="ratings">3.8</th>
					</tr>

					<tr>
						<th colspan="3">Basic trailer dispensing Thai-style rolled ice cream in gourmet & seasonal flavors.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15122656789">(512) 265-6789</a></th>
						<th width="33%" class="addy">1800 Barton Springs Rd, Austin, TX 78704</th>
						<th width="33%" class="websites"><a href="http://hollamode.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckWaySide.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckWaySide.jpeg" width="280px" height= "300px">
						<div class="desc">Wayside</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Wayside</th>
						<th></th>
						<th class="ratings">4.7</th>
					</tr>

					<tr>
						<th colspan="3">All of your favorite food with a chicken and waffles-style twist, from loaded waffle friest to the pulled pork sandwich to the classic Wayside Burger, there are a lot to choose from.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15128319900">(512) 831-9900</a></th>
						<th width="33%" class="addy">606 Maiden Ln, Austin, TX 78705</th>
						<th width="33%" class="websites"><a href="http://www.waysideatx.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>
		
	</table>
	</div>




	<div id="best">
	<table id="allTrucks" border="1" style="width:75%">
		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/truckPicnic.jpg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/truckPicnic.jpg" width="280px" height= "300px">
						<div class="desc">The Picnic at Barton Springs</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">The Picnic</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Outdoor eating destination featuring a wide variety of food trucks and retail vendors.</th>
					</tr>

					<tr>
						<th width="33%" class="num"><a href="mailto:PicnicAustin@gmail.com">PicnicAustin@gmail.com</a></th>
						<th width="33%" class="addy">1720 Barton Springs Rd, Austin, TX 78704</th>
						<th width="33%" class="websites"><a href="https://www.thepicnicaustin.com/" target="_blank">Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckTacoBaby.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckTacoBaby.jpeg" width="280px" height= "300px">
						<div class="desc">Taco Baby</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Taco Baby</th>
						<th></th>
						<th class="ratings">4.9</th>
					</tr>

					<tr>
						<th colspan="3">Carnitas is top notch and the price is right. Has veggie and mahi mahi tacos. Easy to make healthy and gluten free. Easy winner for chips and queso.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+19177508576">(917) 750-8576</a></th>
						<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="https://www.tacobabyaustin.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>

		<tr>
			<th width="20%">
				<div class="dropdown">
					<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="140px" height= "150px">
					<div class="dropdown-content">
						<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="280px" height= "300px">
						<div class="desc">Gebby's BBQ</div>
					</div>
				</div>
				
			</th>
			<th class="truckInfo">
				<table style="width:100%" height= "150px">
					<tr>
						<th colspan="2" class="truckNames">Gebby's BBQ</th>
						<th></th>
						<th class="ratings">4.6</th>
					</tr>

					<tr>
						<th colspan="3">Sliced brisket sandwich and gouda mac and cheese are mouth watering. Lots of common area seating. Easy, filling, and reliable.</th>
						
					</tr>

					<tr>
						<th width="33%" class="num"><a href="tel:+15122719448">(512) 271-9448</a></th>
						<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
						<th width="33%" class="websites"><a href="http://gebbysbbq.com/" target=_blank>Website!</a></th>
					</tr>
				</table>
			</th>
		</tr>
	</table>
	</div>



	<div id="italian">
		<table id="allTrucks" border="1" style="width:75%">
			<tr>
				<th width="20%">
					<div class="dropdown">
						<img class="trucks" src="./images/truckPatrizis.jpeg" width="140px" height= "150px">
						<div class="dropdown-content">
							<img class="trucks" src="./images/truckPatrizis.jpeg" width="280px" height= "300px">
							<div class="desc">Patrizi's</div>
						</div>
					</div>
					
				</th>
				<th class="truckInfo">
					<table style="width:100%" height= "150px">
						<tr>
							<th colspan="2" class="truckNames">Patrizi's</th>
							<th></th>
							<th class="ratings">4.7</th>
						</tr>
	
						<tr>
							<th colspan="3">This food truck dishes up old-school Italian standards & housemade pasta.</th>
							
						</tr>
	
						<tr>
							<th width="33%" class="num"><a href="tel:+5125224834">(512) 522-4834</a></th>
							<th width="33%" class="addy">2307 Manor Rd, Austin, TX 78722</th>
							<th width="33%" class="websites"><a href="https://www.patrizis.com/" target=_blank>Website!</a></th>
						</tr>
					</table>
				</th>
			</tr>

			<tr>
				<th width="20%">
					<div class="dropdown">
						<img class="trucks" src="./images/trucks/truckVia313.jpeg" width="140px" height= "150px">
						<div class="dropdown-content">
							<img class="trucks" src="./images/trucks/truckVia313.jpeg" width="280px" height= "300px">
							<div class="desc">Via 313</div>
						</div>
					</div>
					
				</th>
				<th class="truckInfo">
					<table style="width:100%" height= "150px">
						<tr>
							<th colspan="2" class="truckNames">Via 313</th>
							<th></th>
							<th class="ratings">4.8</th>
						</tr>
	
						<tr>
							<th colspan="3">This trailer outside Craft Pride is known for Detroit-style pies & the only Via 313 location with brunch.</th>
							
						</tr>
	
						<tr>
							<th width="33%" class="num"><a href="tel:+15126099405">(512) 609-9405</a></th>
							<th width="33%" class="addy">96 Rainey St, Austin, TX 78701</th>
							<th width="33%" class="websites"><a href="http://via313.com/" target=_blank>Website!</a></th>
						</tr>
					</table>
				</th>
			</tr>
			
		</table>
		</div>



		<div id="sa">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/truck4Bros.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/truck4Bros.jpeg" width="280px" height= "300px">
								<div class="desc">Four Brothers - Rainey St.</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Four Brothers</th>
								<th></th>
								<th class="ratings">4.8</th>
							</tr>
		
							<tr>
								<th colspan="3">Food truck serving arepas & other Venezuelan favorites in a parking lot with outdoor picnic tables.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5122263971">(512) 226-3971</a></th>
								<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.grubhub.com/restaurant/four-brothers-venezuelan-food-80-rainey-st-austin/492612" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckEspadasDeBrazil.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckEspadasDeBrazil.jpeg" width="280px" height= "300px">
								<div class="desc">Espadas de Brazil</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Espadas de Brazil</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">A curated menu specializing in Brazilian meats, sides, & sandwiches with picnic table seating.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15129653181">(512) 965-3181</a></th>
								<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="http://espadasdebrazil.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="280px" height= "300px">
								<div class="desc">Bummer Burrito</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Bummer Burrito</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Queso and jalapeno poppers make an excellent pre-game snack. Churros if you’re craving sweets. Burritos are massive, easily feeds two people.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15123053133">(512) 305-3133</a></th>
								<th width="33%" class="addy">89 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.bummerburrito.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</div>



		<div id="mediterranean">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/truckAbuOmar.jpg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/truckAbuOmar.jpg" width="280px" height= "300px">
								<div class="desc">Abu Omar Halal</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Abu Omar Halal</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Abu Omar Halal serves a variety of halal street food and sandwiches, but is best known for its signature chicken shawarma.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15125579818">(512) 557-9818</a></th>
								<th width="33%" class="addy">2718 Guadalupe St, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="https://www.abuomarhalal.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckKebabalicious.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckKebabalicious.jpeg" width="280px" height= "300px">
								<div class="desc">Kebabalicious</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Kebabalicious</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Organic Turkish kebobs in the brick-&-mortar outpost of a popular food truck. Live music outdoors.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5124666997">(512) 466-6997</a></th>
								<th width="33%" class="addy">1311 E 7th St, Austin, TX 78702</th>
								<th width="33%" class="websites"><a href="http://www.kebabalicious.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckBigFatGreekGyros.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckBigFatGreekGyros.jpeg" width="280px" height= "300px">
								<div class="desc">Big Fat Greek Gyros</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Big Fat Greek Gyros</th>
								<th></th>
								<th class="ratings">4.3</th>
							</tr>
		
							<tr>
								<th colspan="3">Salty, beefy, yogurt sauce all wrapped up. Grab a honey drizzled baklava for dessert. Go gluten free and turn it into a delicious salad. Lots of seating.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15123646635">(512) 364-6635</a></th>
								<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://bigfatgreekgyros.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</div>



		<div id="asian">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckSpicyBoys.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckSpicyBoys.jpeg" width="280px" height= "300px">
								<div class="desc">Spicy Boys</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Spicy Boys</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Pan-Asian food truck serving addiction-level sambal wings and a Thai fried chicken sandwich hearty enough to soak up even the strongest IPA</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5125389658">(512) 538-9658</a></th>
								<th width="33%" class="addy">1701 E 6th St, Austin, TX 78702</th>
								<th width="33%" class="websites"><a href="https://www.spicyboyschicken.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckDonJapaneseKitchen.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckDonJapaneseKitchen.jpeg" width="280px" height= "300px">
								<div class="desc">Don Japanese Kitchen</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Don Japanese Kitchen</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Japanese craft your own donburi spot with hefty portions, creative toppings & novelty beverages.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+2817253686">(281) 725-3686</a></th>
								<th width="33%" class="addy">411 W 23rd St, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="http://donjapaneseaustin.com/?utm_source=gmb&utm_medium=referral">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckDeeDee.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckDeeDee.jpeg" width="280px" height= "300px">
								<div class="desc">DEE DEE</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">DEE DEE</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Northern Thai specialties featuring market-fresh ingredients from a food trailer with picnic tables.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="mailto: info@deedeeatx.com"> info@deedeeatx.com</a></th>
								<th width="33%" class="addy">4204 Manchaca Rd, Austin, TX 78704</th>
								<th width="33%" class="websites"><a href="http://deedeeatx.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckPinch.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckPinch.jpeg" width="280px" height= "300px">
								<div class="desc">Pinch</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Pinch</th>
								<th></th>
								<th class="ratings">4.4</th>
							</tr>
		
							<tr>
								<th colspan="3">Walk-up window with Asian-inspired bento boxes served with rice, veggies, & choice of protein.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15128206611">(512) 820-6611</a></th>
								<th width="33%" class="addy">2011 Whitis Ave, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="https://www.facebook.com/pinchthefoodtrailer/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckMonksMomo.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckMonksMomo.jpeg" width="280px" height= "300px">
								<div class="desc">Monk's Momo</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Monk's Momo</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Beef, chicken, or veggie “pot sticker” dumplings by the 10 piece. Comfort food with dipping sauce. Hard to beat if your in the mood for something salty and savory.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+17376100968">(787) 219-1900</a></th>
								<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.facebook.com/monksmomoatx/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckEastSideKing.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckEastSideKing.jpeg" width="280px" height= "300px">
								<div class="desc">East Side King</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">East Side King</th>
								<th></th>
								<th class="ratings">4.5</th>
							</tr>
		
							<tr>
								<th colspan="3">This hip food truck behind The Grackle (one of a local trio) serves Asian-fusion bites until late.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15124078166">(512) 407-8166</a></th>
								<th width="33%" class="addy">1618 E 6th St, Austin, TX 78702</th>
								<th width="33%" class="websites"><a href="http://eastsideking.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
				
			</table>
		</div>


		<div id="mexican">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckArlos.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckArlos.jpeg" width="280px" height= "300px">
								<div class="desc">Arlo's</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Arlo's</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Food trailer outside Cheer Up Charlie's for vegan tacos & burgers, plus beer & picnic-table seats.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5128401600">(512) 840-1600</a></th>
								<th width="33%" class="addy">900 Red River St, Austin, TX 78702</th>
								<th width="33%" class="websites"><a href="http://arloscurbside.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckMiSaborOaxaqueño.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckMiSaborOaxaqueño.jpeg" width="280px" height= "300px">
								<div class="desc">Mi Sabor Oaxaqueño</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Mi Sabor Oaxaqueño</th>
								<th></th>
								<th class="ratings">4.8</th>
							</tr>
		
							<tr>
								<th colspan="3">Authentic Mexican food truck selling the best homemade tlayudas and picaditas in town</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5125274751">(512) 527-4751</a></th>
								<th width="33%" class="addy">10503 N Lamar Blvd, Austin, TX 78753</th>
								<th width="33%" class="websites"><a href="https://www.doordash.com/store/mi-sabor-oaxaqueno-austin-1316827">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
				
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckTLocsSonora.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckTLocsSonora.jpeg" width="280px" height= "300px">
								<div class="desc">T-Loc's Sonora</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">T-Loc's Sonora</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Specialty hot dogs with origins in Mexico & Arizona, tacos, burritos, tortas & fries from a truck.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5129948982">(512) 994-8982</a></th>
								<th width="33%" class="addy">5000 Burnet Rd, Austin, TX 78756</th>
								<th width="33%" class="websites"><a href="https://www.tlocs.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckPepes.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckPepes.jpeg" width="280px" height= "300px">
								<div class="desc">Pepe's Tacos</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Pepe's Tacos</th>
								<th></th>
								<th class="ratings">4.8</th>
							</tr>
		
							<tr>
								<th colspan="3">Birria style tacos, tortas, and more</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+17372034175">(737) 203-4175</a></th>
								<th width="33%" class="addy">704 N Lamar Blvd, Austin, TX 78703</th>
								<th width="33%" class="websites"><a href="https://www.pepestacostx.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckQuezzas.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckQuezzas.jpeg" width="280px" height= "300px">
								<div class="desc">Quezzas</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Quezzas</th>
								<th></th>
								<th class="ratings">4.4</th>
							</tr>
		
							<tr>
								<th colspan="3">Think of Quezzas as an open-faced quesadilla with your choice of toppings. This quesadilla “pizza” is a melty, cheesy treat with a wide range of sauces.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15129837927">(512) 983-7927</a></th>
								<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.quezzas.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckTacoBaby.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckTacoBaby.jpeg" width="280px" height= "300px">
								<div class="desc">Taco Baby</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Taco Baby</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Carnitas is top notch and the price is right. Has veggie and mahi mahi tacos. Easy to make healthy and gluten free. Easy winner for chips and queso.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+19177508576">(917) 750-8576</a></th>
								<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.tacobabyaustin.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckLaSirena.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckLaSirena.jpeg" width="280px" height= "300px">
								<div class="desc">La Sirena</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">La Sirena</th>
								<th></th>
								<th class="ratings">4.3</th>
							</tr>
		
							<tr>
								<th colspan="3">Traditional and authentic mexican carnitas tacos are delicate and delicious. Cheese quesadillas for the kids. Lots of seating.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15126193008">(512) 619-3008</a></th>
								<th width="33%" class="addy">96 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.facebook.com/lafantabuloustaqueria/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
			</table>
		</div>




		<div id="american">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckBatonCreole.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckBatonCreole.jpeg" width="280px" height= "300px">
								<div class="desc">Baton Creole</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Baton Creole</th>
								<th></th>
								<th class="ratings">4.4</th>
							</tr>
		
							<tr>
								<th colspan="3">Quirky hot-pink food trailer doling our Southern Louisiana-style street eats amid picnic tables.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5129863834">(512) 986-3834</a></th>
								<th width="33%" class="addy">5500 S Congress Ave, Austin, TX 78745</th>
								<th width="33%" class="websites"><a href="http://batoncreole.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckValentinas.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckValentinas.jpeg" width="280px" height= "300px">
								<div class="desc">Valentina's Tex Mex BBQ</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Valentina's Tex Mex BBQ</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Permanent trailer for mesquite-smoked BBQ with a Tex Mex Twist.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+5122214248">(512) 221-4248</a></th>
								<th width="33%" class="addy">11500 Manchaca Rd, Austin, TX 78748</th>
								<th width="33%" class="websites"><a href="http://www.valentinastexmexbbq.com/">Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckLonghornChicken.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckLonghornChicken.jpeg" width="280px" height= "300px">
								<div class="desc">Longhorn Chicken</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Longhorn Chicken</th>
								<th></th>
								<th class="ratings">4.0</th>
							</tr>
		
							<tr>
								<th colspan="3">Yellow food truck dishing up chicken & waffles, wings & sandwiches from the window until late.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15127202334">(512) 720-2334</a></th>
								<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="http://thelonghornchicken.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckWrigleyville.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckWrigleyville.jpeg" width="280px" height= "300px">
								<div class="desc">Wrigleyville South Dogs & Beef</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Wrigleyville South Dogs & Beef</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">All the fixings on a Vienna, Polish, or 100% Italian Beef hot dog. Spice it up with a chili-cheese dog. Good old fashioned man food. Ballpark hotdogs.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+16308858008">(630) 885-8008</a></th>
								<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.wrigleyvillesouthdogsandbeef.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckTommyWantWingy.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckTommyWantWingy.jpeg" width="280px" height= "300px">
								<div class="desc">Tommy Want Wingy</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Tommy Want Wingy</th>
								<th></th>
								<th class="ratings">4.4</th>
							</tr>
		
							<tr>
								<th colspan="3">Pick your spice level. Hand “rubbed” chicken wings are delicious. Easy finger food that satisfies that chicken wing hankering!</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15126628516">(512) 662-8516</a></th>
								<th width="33%" class="addy">94 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.tommywantwingyatx.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckMrSandwich.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckMrSandwich.jpeg" width="280px" height= "300px">
								<div class="desc">Mr Sandwich</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Mr Sandwich</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Go gluten free by ditching the bun and getting your order on top of fries. A reliable burger joint on Rainey Street. Austin French Fries are loaded to the max!</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+7372243016">(737) 224-3016</a></th>
								<th width="33%" class="addy">82 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.facebook.com/pg/mrsandwichus/posts/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckBurroCheeseKitchen.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckBurroCheeseKitchen.jpeg" width="280px" height= "300px">
								<div class="desc">Burro Cheese Kitchen</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Burro Cheese Kitchen</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Artisan cheeses melted on salty sourdough bread. Fried to mouth watering perfection. Toasted Sourdough adds a nice texture. Plenty of common area seating.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15127672810">(512) 767-2810</a></th>
								<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.burrocheesekitchen.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckGobbleGobble.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckGobbleGobble.jpeg" width="280px" height= "300px">
								<div class="desc">Gobble Gobble</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Gobble Gobble</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">The grass-fed beef here it difficult to find anywhere else on Rainey Street. Throw out the bun and turn it into a salad. Healthy man food.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+19145520358">(914) 552-0358</a></th>
								<th width="33%" class="addy">83 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.icenhauers.com/gobble-gobble" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckGebbysBBQ.jpeg" width="280px" height= "300px">
								<div class="desc">Gebby's BBQ</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Gebby's BBQ</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Sliced brisket sandwich and gouda mac and cheese are mouth watering. Lots of common area seating. Easy, filling, and reliable.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15122719448">(512) 271-9448</a></th>
								<th width="33%" class="addy">80 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://gebbysbbq.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckBummerBurrito.jpeg" width="280px" height= "300px">
								<div class="desc">Bummer Burrito</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Bummer Burrito</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Queso and jalapeno poppers make an excellent pre-game snack. Churros if you’re craving sweets. Burritos are massive, easily feeds two people.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15123053133">(512) 305-3133</a></th>
								<th width="33%" class="addy">89 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://www.bummerburrito.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckOlaya.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckOlaya.jpeg" width="280px" height= "300px">
								<div class="desc">Olaya Peruvian Food</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Olaya Peruvian Food</th>
								<th></th>
								<th class="ratings">4.6</th>
							</tr>
		
							<tr>
								<th colspan="3">Only place on Rainey Street to get ceviche! They also have tasty steak, chicken, or mushroom wok bowls. Olaya is a fresh take on South American cuisine.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+17872191900">(787) 219-1900</a></th>
								<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.olayatx.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckMickelthwait.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckMickelthwait.jpeg" width="280px" height= "300px">
								<div class="desc">Mickelthwait</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Mickelthwait</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Trailer with outdoor picnic tables serves up BBQ meats, notably a daily smoked-sausage selection.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15127915961">(512) 791-5961</a></th>
								<th width="33%" class="addy">1309 Rosewood Ave, Austin, TX 78702</th>
								<th width="33%" class="websites"><a href="http://craftmeatsaustin.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckWaySide.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckWaySide.jpeg" width="280px" height= "300px">
								<div class="desc">Wayside</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Wayside</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">All of your favorite food with a chicken and waffles-style twist, from loaded waffle friest to the pulled pork sandwich to the classic Wayside Burger, there are a lot to choose from.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15128319900">(512) 831-9900</a></th>
								<th width="33%" class="addy">606 Maiden Ln, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="http://www.waysideatx.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
			</table>

		</div>




		<div id="dessert">
			<table id="allTrucks" border="1" style="width:75%">
				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckColdCookie.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckColdCookie.jpeg" width="280px" height= "300px">
								<div class="desc">Cold Cookie Company</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Cold Cookie Company</th>
								<th></th>
								<th class="ratings">4.7</th>
							</tr>
		
							<tr>
								<th colspan="3">Brightly colored food truck serving gourmet ice cream sandwiches with an array of flavors & topping.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="mailto:coldcookiecompany@gmail.com">coldcookiecompany@gmail.com</a></th>
								<th width="33%" class="addy">2512 Rio Grande St, Austin, TX 78705</th>
								<th width="33%" class="websites"><a href="http://coldcookiecompany.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckSaperlipopette.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckSaperlipopette.jpeg" width="280px" height= "300px">
								<div class="desc">Saperlipopette!</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Saperlipopette!</th>
								<th></th>
								<th class="ratings">4.9</th>
							</tr>
		
							<tr>
								<th colspan="3">Grab a french hot dog (hot dog in a baguette) or a brie, jam, and honey drizzled crepe. Ideal place for ice cream on a nice day. Lots of shaded seating.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15126212166">(512) 621-2166</a></th>
								<th width="33%" class="addy">75 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="http://www.saperlipopette-atx.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckLittleLucys.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckLittleLucys.jpeg" width="280px" height= "300px">
								<div class="desc">Little Lucy's</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Little Lucy's</th>
								<th></th>
								<th class="ratings">4.4</th>
							</tr>
		
							<tr>
								<th colspan="3">Colorful, late-night food truck making mini-donuts with creative flavors, toppings & dipping sauces.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+14242358297">(424) 235-8297</a></th>
								<th width="33%" class="addy">75 1/2 Rainey St, Austin, TX 78701</th>
								<th width="33%" class="websites"><a href="https://littlelucys.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>

				<tr>
					<th width="20%">
						<div class="dropdown">
							<img class="trucks" src="./images/trucks/truckHollaMode.jpeg" width="140px" height= "150px">
							<div class="dropdown-content">
								<img class="trucks" src="./images/trucks/truckHollaMode.jpeg" width="280px" height= "300px">
								<div class="desc">Holla Mode</div>
							</div>
						</div>
						
					</th>
					<th class="truckInfo">
						<table style="width:100%" height= "150px">
							<tr>
								<th colspan="2" class="truckNames">Holla Mode</th>
								<th></th>
								<th class="ratings">3.8</th>
							</tr>
		
							<tr>
								<th colspan="3">Basic trailer dispensing Thai-style rolled ice cream in gourmet & seasonal flavors.</th>
								
							</tr>
		
							<tr>
								<th width="33%" class="num"><a href="tel:+15122656789">(512) 265-6789</a></th>
								<th width="33%" class="addy">1800 Barton Springs Rd, Austin, TX 78704</th>
								<th width="33%" class="websites"><a href="http://hollamode.com/" target=_blank>Website!</a></th>
							</tr>
						</table>
					</th>
				</tr>
				
			</table>

		</div>


	<br>
	<br>

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
