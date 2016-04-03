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
		<script>
		function ValidateForm(){
			var fn = document.getElementById('firstname');
			var ln = document.getElementById('lastname');
			var email = document.getElementById('email');
			var emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
			var phone = document.getElementById('phonenum');
			var phoneRegex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/
			var date = document.getElementById('eventdate');
			var order = document.getElementById('orderdesc');
			if(fn.value == ""){
				fn.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				return false;
			} else {
				fn.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
			}
			if(ln.value == ""){
				ln.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				return false;
			} else {
				ln.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
			}
			if(email.value == ""){
				email.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				return false;
			} else {
				email.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
			}
			if (!email.value.match(emailRegex)) {
				email.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				document.getElementById("emailInvalid").style.display = "inline";
				return false;
			} else {
				email.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
				document.getElementById("emailInvalid").style.display = "none";
			}
			if(phone.value == ""){
				phone.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				return false;
			} else {
				phone.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
			}
			if (!phone.value.match(phoneRegex)) {
				phone.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				document.getElementById("phoneInvalid").style.display = "inline";
				return false;
			} else {
				phone.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
				document.getElementById("phoneInvalid").style.display = "none";
			}
			if (date.value == null){
				date.style.borderColor = "red";
				return false;
			} else {
				date.style.borderColor = "#ccc";
			}
			if (order.value == ""){
				order.style.borderColor = "red";
				return false;
			} else {
				order.style.borderColor = "#ccc";
			}
			return true;
		}
		</script>
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
					<li><a class="active" href="order.php">Order</a></li>
					<li><a href="menu.php">Menu</a></li>
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
				<h1>CUSTOM ORDERS</h1>
				</div>
				<div class="bcolumn1">
                    <form name="orderForm" id="form" onsubmit="return ValidateForm()" action="orderprocess.php" method="post">
						<h1>Order Form<span id="required" style="display: none">&nbsp;*Please fill in the highlighted field</span></h1>
						<label for="firstname">FIRST NAME</label>
						<input type="text" name="firstname" id="firstname" >
						<label for="lastname">LAST NAME</label>
						<input type="text" name="lastname" id="lastname">
						<label for="email">EMAIL<span id="emailInvalid" style="display: none">&nbsp;*Please enter a valid email</span></label>
						<input type="text" name="email" id="email">
						<label for="phonenum">PHONE NUMBER<span id="phoneInvalid" style="display: none">&nbsp;*Please enter a valid phone number</span></label>
						<input type="text" name="phonenum" id="phonenum">
						<label for="eventdate">DATE OF EVENT</label>
						<br>
						<input type="date" name="eventdate" id="eventdate">
						<br><br>
						<label for="aboutus">HOW DID YOU HEAR ABOUT US?</label>
						<select name="aboutus" id="aboutus">
							<option value="blank"></option>
							<option value="Social Media">Social Media</option>
                            <option value="Friends">Friends</option>
                            <option value="Other">Other</option>
                        </select>
						<br>
						<label for="orderdesc">ORDER DESCRIPTION</label>
						<br>
						<textarea name="orderdesc" id="orderdesc"></textarea> 
						<br>
						<input id="mySubmit" type="submit" value="Submit">
                    </form>
				</div>
				<div class="bcolumn2">
                    <h2>HAVE A SPECIAL EVENT?</h2>
                    <p>We love tackling new and exciting challenges to create the best creations that you desire. No matter how large or small
					the request is, we want you to count on us for your event.</p>
					<p>Please fill out the form with your contact details and 
					your request. Include design details, catering location, and culinary preferences, is applicable. We look forward to 
					helping you make your vision come true!</p>
				<br>
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
		
