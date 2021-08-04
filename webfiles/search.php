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
			<h1>Enter your unique car identity</h1>
				<p>
					<form action="viewresults.php" method="post">
					<input type='hidden' name='hashvalue' value='$hashvalue'/>
					Car identity number: <br><input type="text" size=35 name="carid"> <br>
					<br>
					<input type="submit">
					</form>
				</p>
   
   			</center>
		</div>	
	</body>
</html>