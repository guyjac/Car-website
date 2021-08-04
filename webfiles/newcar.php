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
		<div id="sideBar">
		<h3 class="sb">Available</h3>
		<h1 class="dep">MODELS</h1>
			<ul class="sidebar">
			  <li class="sidebar"><a class="side" href="admin.php">View tables</a></li>
			  <li class="curSide"><a class="side" href="newcar.php">Add new car</a></li>
			</ul>
		</div>
		<div id="content">
				<?php
					//Creates the webpage
					$dbhost = 'localhost';
   					$dbname = 'ce29x_gj17980';
   					$dbuser = 'gj17980';
   					$dbpass = 'IxlCmG9Nh2T5O';

   
   					$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
   					or die( "Unable to Connect to '$dbhost'" );
   
   					mysqli_select_db( $link, $dbname )
   					or die("Could not open the db '$dbname'");
					


					if(isset($_POST['save']))
					{
						$sql = "INSERT INTO cars_model VALUES ('".$_POST["car_manufact"]."','".$_POST["car_model_id"]."','".$_POST["model_price"]."')";

						if (mysqli_query($link, $sql))
						{
								//echo "success adding data";
						}
						else
						{
								echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
						}
					}

				?>

					<form action="newcar.php" method="post"> 
					<label id="first">car_manufact:</label><br/>
					<input type="text" name="car_manufact"><br/>

					<label id="first">car_model_id</label><br/>
					<input type="text" name="car_model_id"><br/>

					<label id="first">model_price</label><br/>
					<input type="number" name="model_price"><br/>

					<button type="submit" name="save">Save</button>
					</form>
					
				</div>
			</div>
		</div>		
</body>
</html>
