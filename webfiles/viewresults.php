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
			<h1>Search results</h1>
				<?php 
					//connect to db
					$dbhost = 'localhost';
					$dbname = 'ce29x_gj17980';
					$dbuser = 'gj17980';
					$dbpass = 'IxlCmG9Nh2T5O';

					$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
					or die( "Unable to Connect to '$dbhost'" );

					mysqli_select_db( $link, $dbname )
					or die("Could not open the db '$dbname'");

					//fetch the results
					$carid = $_POST['carid'];
					
					echo $carid."<br><br>";
					
					$model ="";
					
					$carq = "SELECT car_model_id, colour_id, trim_type_id, interior_type_id, engine_capacity, wheel_id, sensor_bool FROM created_choice WHERE choice_hash ='$carid'";
					
					$result = mysqli_query( $link, $carq );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						echo "Model: ".$row['car_model_id'];
						$model = $row['car_model_id'];
						echo "<br>";
						echo "Colour: ".$row['colour_id'];
						echo "<br>";
						echo "Trim: ".$row['trim_type_id'];
						echo "<br>";
						echo "Interior: ".$row['interior_type_id'];
						echo "<br>";
						echo "Engine: ".$row['engine_capacity'];
						echo "<br>";
						echo "Wheels: ".$row['wheel_id'];
						echo "<br>";
						echo "Sensors: ".$row['sensor_bool'];
					}
					echo "<br>";
					$carimg = 'img/'.$model.'.png';
					echo "<img src='$carimg'>";	

				?>
			</center>
		</div>	
	</body>
</html>