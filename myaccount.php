<?php
	include 'functions.php';
	session_start();
	require_once('config.php');
	
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	
	if(!$conn) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	mysql_select_db(DB_DATABASE, $conn);
	$sel = mysql_select_db(DB_DATABASE, $conn);
	if(!$sel) {
		die('Unable to select database');
	}
	
	$sql = "SELECT * FROM members WHERE email = '".$_SESSION['SESS_LOGIN']."'";
	$getinfo = mysql_query($sql);
	$infoarray = mysql_fetch_assoc($getinfo);	
	
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
					<li><a href="menu.php">Menu</a></li>
					<li><a class="active" href="rewards.php">Rewards</a>
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
				<h1>My Account</h1>
				</div>
				<div class="bcolumn2">
					<table class="hours">
						<tr>
							<td>FIRST NAME</td>
							<td><?php echo $infoarray['firstname'] ?></td>
						</tr>
						<tr>
							<td>LAST NAME</td>
							<td><?php echo $infoarray['lastname'] ?></td>
						</tr>
						<tr>
							<td>EMAIL</td>
							<td><?php echo $infoarray['email'] ?></td>
						</tr>
						<tr>
							<td>PHONE NUMBER</td>
							<td><?php echo $infoarray['phone'] ?></td>
						</tr>
						<tr>
							<td>BIRTHDAY</td>
							<td><?php echo $infoarray['birthday'] ?></td>
						</tr>
						<tr>
							<td>REWARDS POINTS</td>
							<td><?php echo $infoarray['points'] ?></td>
						</tr>
					</table>
					<br>
					<a href="dereg.php"><p>DELETE MY ACCOUNT</p></a>
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
		
