
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
					$query0 = "show tables";
					//find all cars
					$query0 = "show tables";
					$result0 = mysqli_query($link, $query0);
					while ($row = mysqli_fetch_array($result0, MYSQLI_ASSOC))
					{
						$table = $row['Tables_in_ce29x_gj17980'];
						echo "<h3>$table</h3>";
						$query1 = "show columns from $table";
						$result1 = mysqli_query($link, $query1);
						echo "<table style=\"width:100%\">";
						echo "<tr>";
						while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
						{
							echo "<th>";
							echo $row['Field'];
							echo "</th>";
						}

						echo "</tr>";
						$query1 = "select * from $table";
						$result1 = mysqli_query($link, $query1);
						while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC))
						{
							echo "<tr>";
							foreach($row as $value)
							{
								echo "<td>" . $value . "</td>";
							}
							echo "</tr>";
						}
						echo "</table>";
					}

   					mysqli_free_result( $result );
   					mysqli_close( $link );
   
   ?>