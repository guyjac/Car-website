<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Design a car</title>
    <link rel="stylesheet" href="default_style.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="getitems.js"></script>
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
			  <li class="sidebar"><a class="side" href="fiesta.php">Fiesta</a></li>
			  <li class="sidebar"><a class="side" href="mondeo.php">Mondeo</a></li>
			  <li class="curSide"><a class="side" href="focus.php">Focus</a></li>
			</ul>
		</div>

				<?php
					$page_id ="Focus";
					require('config_choice.php');
				?>
				

			</div>

		</div>		
</body>
</html>
