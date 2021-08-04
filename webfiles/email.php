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
			<h1>Thank you for your enquiry!</h1>
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
													
					//Retrieve the values from post	
					$hashvalue .= $_POST['hashvalue'];
					$to = $_POST['to'];
					
					//We create a user with the given email, unless he already exists.
					$userq = "SELECT email FROM users WHERE email ='$to'";
					$result = mysqli_query( $link, $userq );
					$found = false;
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$found = true;
						//echo "found existing user";
					}
					if(!$found){
						$new_ref = "INSERT INTO users VALUES (0,'$to','user')";
						if (mysqli_query($link, $new_ref))
						{
							//echo "success adding data";
						}
						else
						{
							echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
						}
					}
					
					//Fetch the users id using their email address
					$idq = "SELECT user_id FROM users WHERE email ='$to'";
					$result = mysqli_query( $link, $idq );
					$userid = "";
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$userid = $row['user_id'];
					}
					//Fetch the car id using the hash value
					$carq = "SELECT choice_id FROM created_choice WHERE choice_hash ='$hashvalue'";
					$result = mysqli_query( $link, $carq );
					$carid = 0;
					while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$carid = $row['choice_id'];
					}
					
					//Check if userchoice exists, if so. Update.
					$found = false;
					$check = "SELECT user_id from user_choice where user_id='$userid'";
					$result = mysqli_query( $link, $check );
					while ($row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
					{
						$found=true;
						$datainsert = "UPDATE user_choice SET choice_id='$carid' WHERE user_id='$userid'";
					}
					if(!$found)
					{
						//Insert the user choice with id into the link table
						$datainsert = "INSERT INTO user_choice VALUES ('$userid','$carid')";
					}

					if (mysqli_query($link, $datainsert))
					{
							//echo "success adding data";
					}
					else
					{
							echo "ERROR: Not able to execute $sql. " . mysqli_error($link);
					}
					


					//Email creation
					$message = '<html><body>';
					$message .= $_POST['message'];
					$message .= "</body></html>";
					$subject = "Your FREE quotation!";
					$headers = "From: cars@essex.ac.uk \r\n";
					$headers .= "Reply-To: gj17980@essex.ac.uk \r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					
					echo "To: ".$to;
					echo "<br>";
					echo "Subject: ".$subject;
					echo "<br>";
					echo "Message: ".$message;
					echo "<br>";
					
					//Send the mail to the user
					mail($to,$subject,$message,$headers);
				?>
			</center>
		</div>	
	</body>
</html>