
<?php

   #Create the car choices, given the car name variable $page_id
   
					$dbhost = 'localhost';
   					$dbname = 'ce29x_gj17980';
   					$dbuser = 'gj17980';
   					$dbpass = 'IxlCmG9Nh2T5O';

   
   					$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
   					or die( "Unable to Connect to '$dbhost'" );
   
   					mysqli_select_db( $link, $dbname )
   					or die("Could not open the db '$dbname'");
					
					

					
					//Query to get results
   					$colquery = "SELECT colour_id FROM car_colour WHERE car_model_id ='$page_id'";
   					$engquery = "SELECT engine_capacity FROM car_engine WHERE car_model_id ='$page_id'";
   					$wheelquery = "SELECT wheel_id FROM car_wheels WHERE car_model_id ='$page_id'";
   					$freshtrimquery = "SELECT trim_type_id FROM car_trim WHERE car_model_id ='$page_id'";
   					$intquery = "SELECT interior_type_id FROM car_interior WHERE car_model_id ='$page_id'";
   					$sensquery = "SELECT sensor_bool FROM parking_sensors WHERE car_model_id ='$page_id'";
					
					//find cost
					$cost = "SELECT model_price FROM cars_model WHERE car_model_id ='$page_id'";
					$result = mysqli_query( $link, $cost );
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						$cost_ = $row['model_price'];
   					}
					
					
					//echo top of page
					echo'
					<div id="content">
						<center>
							<img src="img/'.$page_id.'.png">	
						</center>
						<div id="contentLeft">
							<h1>
								CHOSEN PARTS
							</h1>
							<P>
								<div id="choices">
									You have not chosen a configuration.
								</div>
							</P>
							<P>
								Base cost £'.$cost_.
							'</P>
						</div>
					<div id="contentRight">
					<h1>CHOOSE YOUR CONFIGURATION</h1>';
   					
					//open our form,, set it to the displayed model for posting
					echo "<form method='get' action='purchase_post.php'>";
					
					$result = mysqli_query( $link, $colquery );
					//Echo title of the part choices
					echo '<div id="configChoice"><h2>Colours</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"colours\" value=\"";
						echo $row['colour_id'];
						echo "\">";
						echo $row['colour_id'];
   						echo "</br>";
   					}
					echo '</div>';
   
   					$result = mysqli_query( $link, $engquery );
					//Echo title
					echo '<div id="configChoice"><h2>Engine</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"engine\" value=\"";
						echo $row['engine_capacity'];
						echo "\">";
						echo $row['engine_capacity'];
   						echo "</br>";
   					}
					echo '</div>';
					
      				$result = mysqli_query( $link, $wheelquery );
					//Echo title
					echo '<div id="configChoice"><h2>Wheels</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"wheels\" value=\"";
						echo $row['wheel_id'];
						echo "\">";
						echo $row['wheel_id'];
   						echo "</br>";
   					}
					echo '</div>';
					
					$result = mysqli_query( $link, $freshtrimquery );
					//Echo title
					echo '<div id="configChoice"><h2>Trim</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"trim\" value=\"";
						echo $row['trim_type_id'];
						echo "\">";
						echo $row['trim_type_id'];
   						echo "</br>";
   					}
					echo '</div>';
					
					$result = mysqli_query( $link, $intquery );
					//Echo title
					echo '<div id="configChoice"><h2>Interior</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"interior\" value=\"";
						echo $row['interior_type_id'];
						echo "\">";
						echo $row['interior_type_id'];
   						echo "</br>";
   					}
					echo '</div>';
					
					$result = mysqli_query( $link, $sensquery );
					//Echo title
					echo '<div id="configChoice"><h2>Parking sensor</h2>';
					//Print all the choices in the table
   					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
   					{
						echo " <input type=\"radio\" name=\"sensor\" value=\"";
						echo $row['sensor_bool'];
						echo "\">";
						echo $row['sensor_bool'];
   						echo "</br>";
   					}
					echo '</div>';
					
					//hidden choice to pass our current car
					echo "<input type='hidden' name='model' value='$page_id' />";

					//Button creation
					echo '<div id="configChoice_no_height">';
					echo '<input type="submit" value="Choose configuration"> ';
					echo '</form>';
					echo '<input type="button" value="Update price"></div>';
   
   					mysqli_free_result( $result );
   					mysqli_close( $link );
   
   ?>