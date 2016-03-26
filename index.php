<?php
	include 'functions.php';
	session_start();
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Cupcakes on a Cloud</title>
		<link rel="stylesheet" type="text/css" href="Style/base.css">
	</head>
	
	<body>
	
		<div id="wrapper">
			<!-- div header -->
			<div id="header">
				<div class="headerimg">
				<a href="index.php"><img src="Images/templogo.png"
				alt="Cupcakes on a Cloud"/></a>
				</div>
				<div class="address">
				<p>1154 Robson St<br>Vancouver, BC<br>V6E 1B5<br>(778)123-4567<br><br>OPEN 10:00 - 8:00<br>CLOSED WEDNESDAYS</p>
				<?php
						if (isLoggedIn()){
							echo '<p id="loggedin">Hello, '.$_SESSION['SESS_LAST_NAME'].' <br/> <a href="./members.php">Members</a><br/></p>';
						} 
				?>					
				</div>
			</div>

			<!-- div navigation -->
			
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a>
						<ul>
							<li><a href="about.php">Our Story</a></li>
							<li><a href="location_contact.php">Location</a></li>
						</ul>
					</li>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="order.php">Order</a></li>
					<li><a href="menu.php">Menu</a></li>
					<li><a href="rewards.php">Rewards</a>
						<ul>
							<li><a href="login.php">Log In</a></li>
							<li><a href="rewards.php">Sign Up</a></li>
						</ul>
					</li>
				</ul>
			</div>
				
			<!-- div content -->
			<div id="content">
				<div class="indexcolumn1">
				<img src="Images/indeximage1.png"
				alt="Image 1">
				</div>
				<div class="indexcolumn2">
				<img src="Images/decorating.png"
				alt="Image 2">
				</div>
				<div class="indexcolumn3">
				<img src="Images/cupcakedisplay.png"
				alt="Image 3">
				</div>
			</div>	
			<!-- div socialbanner -->
			<div class="socialbanner">
				<div class="bcolumn1">
				<p>Find us on Social Media!</p>
				</div>
				<div class="bannerbuttons">
					<a href="facebook"><img src="Images/facebook.png" alt="Facebook"></a>
					<a href="twitter"><img src="Images/twitter.png" alt="Twitter"></a>
					<a href="instagram"><img src="Images/instagram.png" alt="Instagram"></a>
				</div>
			</div>	
			
			<!-- div footer -->
			<div id="footer">
				<p>© 2016 | Cupcakes on a Cloud | <a href="sitemap.php">Sitemap</a></p>
			</div>
			
		</div>		
	</body>
	</html>
		
