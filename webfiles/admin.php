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
			  <li class="curSide"><a class="side" href="admin.php">View tables</a></li>
			  <li class="sidebar"><a class="side" href="newcar.php">Add new car</a></li>
			</ul>
		</div>
		<div id="content">
				<?php
					//Creates the webpage
					require('viewtables.php');
				?>
				</div>
			</div>
		</div>		
</body>
</html>
