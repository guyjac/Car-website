<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Design a car</title>
    <link rel="stylesheet" href="default_style.css" type="text/css" />
  </head>
  
  <body>
	  <div id="navBar">
			<ul class="topbar">
			  <li class="topbar"><a class="nav" href="search.php"><img src="img/save.png"> VIEW YOUR CAR</a></li>
			</ul>
		</div>

		<div id="purchase_content">
			<center>
				<?php
				#process chosen items for the car
			   
					$dbhost = 'localhost';
					$dbname = 'ce29x_gj17980';
					$dbuser = 'gj17980';
					$dbpass = 'IxlCmG9Nh2T5O';

   
					$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
					or die( "Unable to Connect to '$dbhost'" );
   
					mysqli_select_db( $link, $dbname )
					or die("Could not open the db '$dbname'");
					
					$model = $_GET[ 'model' ];
					
					//Fetch the chosen item from URL and put in vars
					$colour = $_GET[ 'colours' ];
					$engine = $_GET[ 'engine' ];
					$wheel = $_GET[ 'wheels' ];
					$trim = $_GET[ 'trim' ];
					$interior = $_GET[ 'interior' ];
					$parking = $_GET[ 'sensor' ];
					$price = 0;

					$escaped_wheel = addslashes($wheel);
					$carimg = 'img/'.$model.'.png';
					
					//Generate cost
										//Query for prices
					$colquery = "SELECT colour_cost FROM car_colour WHERE colour_id ='$colour' AND car_model_id ='$model'";
					$engquery = "SELECT engine_cost FROM car_engine WHERE engine_capacity ='$engine' AND car_model_id ='$model'";
					$wheelquery = "SELECT wheel_price FROM car_wheels WHERE wheel_id ='$escaped_wheel' AND car_model_id ='$model'";
					$trimquery = "SELECT trim_cost FROM car_trim WHERE trim_type_id ='$trim' AND car_model_id ='$model'";
					$interiorquery = "SELECT interior_cost FROM car_interior WHERE interior_type_id ='$interior' AND car_model_id ='$model'";
					$parkingquery = "SELECT sensor_cost FROM parking_sensors WHERE sensor_bool ='$parking' AND car_model_id ='$model'";
					$modelquery = "SELECT model_price FROM cars_model WHERE car_model_id ='$model'";
					
					$result = mysqli_query( $link, $engquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['engine_cost'];
						//echo $row['engine_cost']; echo "</br>";
					}
					$result = mysqli_query( $link, $colquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['colour_cost'];
						//echo $row['colour_cost']; echo "</br>";
					}
					$result = mysqli_query( $link, $trimquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['trim_cost'];
						//echo $row['trim_cost']; echo "</br>";
					}
					$result = mysqli_query( $link, $wheelquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['wheel_price'];
						//echo $row['wheel_price']; echo "</br>";
					}
					$result = mysqli_query( $link, $interiorquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['interior_cost'];
						//echo $row['interior_cost']; echo "</br>";
					}
					$result = mysqli_query( $link, $parkingquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['sensor_cost'];
						//echo $row['sensor_cost']; echo "</br>";
					}
					$result = mysqli_query( $link, $modelquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$price += $row['model_price'];
						//echo $row['model_price']; echo "</br>";
					}
					
					//load image and prices
					echo "<img src='$carimg'>";	
					echo "<h1>YOUR CONFIGURATION</h1>";
					
					echo "Colour: ".$colour ."<br>";
					echo "Engine: ".$engine ."<br>";
					echo "Wheel type: ".$wheel ."<br>";
					echo "Trim type".$trim ."<br>";
					echo "Interior: ".$interior ."<br>";
					echo "Parking sensors: ".$parking;
					echo "<p><h2>Total Cost: £$price</h2></p>";
					
					//Create a hash of our product in table and compare it to other made cars
					$hashvalue = md5($model.$colour.$trim.$interior.$engine.$wheel.$parking);
					$hashquery = "SELECT choice_id FROM created_choice WHERE choice_hash ='$hashvalue'";
					$found = false;
					//Create an entry for the user with their hash and their email.
					$result = mysqli_query( $link, $hashquery );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$found = true;
						//echo "found existing car";
					}
					
					if (!$found){
						$_wheel = addslashes($wheel);
						$new_ref = "INSERT INTO created_choice VALUES (0,'$model','$colour','$trim','$interior','$engine','$_wheel','$parking','$hashvalue')";

						if (mysqli_query($link, $new_ref))
						{
							//echo "success adding data";
						}
						else
						{
							echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
						}
					}			
					
					//hidden choice to pass our current config and price
					echo "Enter your email address to recieve a copy of your configuration and a free quotation.<p>";
					
					//escape wheel... or html doesnt work.
					$wheel = str_replace("'"," Inch", $wheel);
					
					echo '<form action="email.php" method="post">';
					echo "<input type='hidden' name='hashvalue' value='$hashvalue'/>";
					echo "<input type='hidden' name='message' value='Thank you for requesting a quote for a $model. <br> You have selected the following customisations:<br>Colour: $colour <br>Engine: $engine <br>Trim level: $trim <br>Interior: $interior <br>Parking sensors: $parking <br>Wheel type: $wheel <br> Total cost £$price <br><br> Your unique car id: $hashvalue <br> You can view your car at anytime by using this code.' />";
					echo 'E-mail: <input type="text" size=25 name="to"> ';
					echo '<input type="submit">';
					echo '</form></p>';
					
					
					
	

   
					mysqli_free_result( $result );
					mysqli_close( $link );
			   
			   ?>
   
   			</center>
		</div>	
	</body>
</html>