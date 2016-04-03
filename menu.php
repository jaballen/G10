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
				<a href="index.html"><img src="Images/templogo.png"
				alt="Cupcakes on a Cloud"></a>
				</div>
				<div class="address">
				<p>1154 Robson St<br>Vancouver, BC<br>V6E 1B5<br>(778)123-4567<br><br>OPEN 10:00 - 8:00<br>CLOSED WEDNESDAYS</p>
				<?php
						if (isLoggedIn()){
							echo '<p id="loggedin">Hello, '.$_SESSION['SESS_FIRST_NAME'].' <br/> <a href="./logout.php">Logout</a><br/></p>';
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
					<li><a class="active" href="menu.php">Menu</a></li>
					<li><a href="rewards.php">Rewards</a>
						<ul>
						<?php if (isLoggedIn()) { 
							echo '<li><a href="members.php">Member Area</a></li>';
							} else {							
							echo '<li><a href="login.php">Log In</a></li>';
							echo '<li><a href="rewards.php">Sign Up</a></li>';
						} ?>
						</ul>
					</li>
				</ul>
			</div>
				
			<!-- div content -->
			<div id="content">
				<div class="row1">
				<h1>CUPCAKE OF THE WEEK</h1>
				<img src="Images/ccweek.png"
				alt="Cupcake of the Week image">
				</div>
				<div class="row2">
				<h1>MENU</h1>
				</div>
				<div class="acolumn1">
				<div class="menu">
					<ul>
						<li><p>Easy Breezy Cupcake</p>
							<ul>
								<li><p>Lemon cupcake topped with blue vanilla frosting, granulated brown sugar, and graham cracker bears. </p></li>
							</ul>
						</li>
						<li><p>Stairway to Heaven Cupcake</p>
							<ul>
								<li><p>Chocolate angel food cupcake with chocolate cream cheese whipped frosting, topped with fresh fruit.</p></li>
							</ul>
						</li>
						<li><p>The Peak Cupcake</p>
							<ul>
								<li><p>Vanilla cupcake filled with Nutella, with marshmellow cloud frosting.</p></li>
							</ul>
						</li>
					</ul>
				</div>
				</div>
				<div class="acolumn2">
				<div class="menu">
					<ul>
						<li><p>Rainbow Cupcake</p>
							<ul>
								<li><p>Moist white cake with rainbow swirl, topped with vanilla buttercream frosting and suspended gel candy.</p></li>
							</ul>
						</li>
						<li><p>Red Velvet Cupcake </p>
							<ul>
								<li><p>Traditional chocolate cupcake with chocolate filling, chocolate drizzle, and vanilla frosting.</p></li>
							</ul>
						</li>
						<li><p>London Fog Cupcake</p>
							<ul>
								<li><p>Traditional Earl Grey infused vanilla cupcake with lavender frosting and tea leaves.</p></li>
							</ul>
						</li>
					</ul>
				</div>
				</div>
				<div class="acolumn3">
				<div class="menu">
					<ul>
						<li><p>Shock and Awe Cupcake</p>
							<ul>
								<li><p>Chocolate based cupcake with whipped topping and infused with either Kahlua or spiced rum.</p></li>
							</ul>
						</li>
						<li><p>Sunny Cupcake</p>
							<ul>
								<li><p>Your choice of chocolate or vanilla based cupcake with whipped frosting, and cookie sprinkles.</p></li>
							</ul>
						</li>
						<li><p>Snowflake Cupcake</p>
							<ul>
								<li><p>Vanilla bean cupcake with vanilla icing, snowflake designed fondant covered in white sugar crystals.</p></li>
							</ul>
						</li>
					</ul>
				</div>
				</div>
				<div class="row3">
				<h1>PRICING</h1>
				<div id="centering">
				<table>
						<tr>
							<th>Number Of Cupcakes</th>
							<td>1 Cupcake</td>
							<td>3 Cupcakes</td>
							<td>Half Dozen</td>
							<td>Dozen</td>
						</tr>
						<tr>
							<td></td>
							<td>$2.75</td>
							<td>$7.50</td>
							<td>$14.50</td>
							<td>$26.00</td>	
						</tr>
					</table>
				</div>
				</div>
			</div>

			<!-- div footer -->
			<div id="footer">
				<p>© 2016 | Cupcakes on a Cloud | <a href="sitemap.html">Sitemap</a></p>
				
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
		
