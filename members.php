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
				alt="Cupcakes on a Cloud"></a>
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
					<li><a class="active" href="rewards.php">Rewards</a>
						<ul>
							<li><a href="myaccount.php">My Account</a></li>
						</ul>
					</li>
				</ul>
			</div>
				
			<!-- div content -->
			<div id="content">
				<h1>Members</h1>
				<div class="bcolumn2">
					<p>You have 34 REWARDS POINTS!</p>
					<p><a href="myaccount.php">My Account</a></p>
					<br><br>
					<div id="form">
						<h2>ENTER YOUR RECEIPT NUMBER TO GET YOUR POINTS!</h2>
						<label for="receiptno">RECEIPT NUMBER</label>
						<input type="text" name="receiptno" id="receiptno">
						<input id="mySubmit" type="submit" value="Submit">
					</div>
				</div>
			</div>

			<!-- div footer -->
			<div id="footer">
				<p>© 2016 | Cupcakes on a Cloud | <a href="sitemap.php">Sitemap</a></p>
				
				<!-- div socialbuttons -->
				<div class="socialbuttons">
					<a href="facebook"><img src="Images/facebook.png" alt="Facebook"></a>
					<a href="twitter"><img src="Images/twitter.png" alt="Twitter"></a>
					<a href="instagram"><img src="Images/instagram.png" alt="Instagram"></a>
				</div>
			</div>
			
		</div>		
	</body>
	</html>
		
