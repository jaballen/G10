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
		<script src="DV.js" type="text/javascript"></script>
		<script type="text/javascript">
		var img1 = '<img src="Images/gallery1.png" width="1292" height="833" border="0" alt="Image 1">'
		var img2 = '<img src="Images/gallery2.png" width="1292" height="833" border="0" alt="Image 2">' 
		var img3 = '<img src="Images/gallery3.png" width="1292" height="833" border="0" alt="Image 3">'
		var img4 = '<img src="Images/gallery4.png" width="1292" height="833" border="0" alt="Image 4">'
		var img5 = '<img src="Images/gallery5.png" width="1292" height="833" border="0" alt="Image 5">'
		var img6 = '<img src="Images/gallery6.png" width="1292" height="833" border="0" alt="Image 6">'
		var img7 = '<img src="Images/gallery7.png" width="1292" height="833" border="0" alt="Image 7">'
		var img8 = '<img src="Images/gallery8.png" width="1292" height="833" border="0" alt="Image 8">'
		var img9 = '<img src="Images/gallery9.png" width="1292" height="833" border="0" alt="Image 9">'
		</script>
		
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
					<li><a class="active" href="gallery.php">Gallery</a></li>
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
				<div class="gallery">
					<div class="acolumn1">
					<a href="#" onClick="dv.showDV(img1); return false"><img src="Images/gallery1.png"
					alt="Image 1"></a>
					<a href="#" onClick="dv.showDV(img2); return false"><img src="Images/gallery2.png"
					alt="Image 2"></a>
					<a href="#" onClick="dv.showDV(img3); return false"><img src="Images/gallery3.png"
					alt="Image 3">
					</div>
					<div class="acolumn2">
					<a href="#" onClick="dv.showDV(img4); return false"><img src="Images/gallery4.png"
					alt="Image 4">
					<a href="#" onClick="dv.showDV(img5); return false"><img src="Images/gallery5.png"
					alt="Image 5">
					<a href="#" onClick="dv.showDV(img6); return false"><img src="Images/gallery6.png"
					alt="Image 6">
					</div>
					<div class="acolumn3">
					<a href="#" onClick="dv.showDV(img7); return false"><img src="Images/gallery7.png"
					alt="Image 7">
					<a href="#" onClick="dv.showDV(img8); return false"><img src="Images/gallery8.png"
					alt="Image 8">
					<a href="#" onClick="dv.showDV(img9); return false"><img src="Images/gallery9.png"
					alt="Image 9">
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