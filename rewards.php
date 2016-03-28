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
			var birthday = document.getElementById('birthday');			
			if(fn.value == ""){
				fn.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
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
			if (!birthday.value){
				birthday.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				return false;
			} else {
				birthday.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
			}		
			return passValid();
		}
		function passValid() {
			var testPass = false;
			var password1 = document.getElementById('password1');
			var password2 = document.getElementById('password2');
			var match = document.getElementById('match');
			var nomatch = document.getElementById('nomatch');
			var pwordRegex = /^(?=.*\d)(?=.*[a-zA-Z]).[^\s]{4,8}$/;
			if (!password1.value.match(pwordRegex)) {
				password1.style.borderColor = "red";
				document.getElementById("required").style.display = "inline";
				match.innerHTML = "  Password too weak";
				nomatch.innerHTML = " ";
				testPass = false;
			} else {
				password1.style.borderColor = "#ccc";
				match.innerHTML = "  Password is valid";
				testPass = true;
			}
			if (password1.value != password2.value || (password2.value == "" && password1.value == "")) {
				nomatch.innerHTML = " Password must be between 4 to 8 characters &nbsp &nbsp long and include at least one numeric digit";
				document.getElementById("required").style.display = "inline";
				testPass = false;
			} else if (password1.value.match(pwordRegex) && password1.value == password2.value) {
				match.innerHTML = "  Passwords match";
				nomatch.innerHTML = "";
				password1.style.borderColor = "#ccc";
				document.getElementById("required").style.display = "none";
				testPass = true;
			}		
			return testPass;
		}
			
		
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
				<h1>REWARDS</h1>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est.</p>
				</div>
				<div class="bcolumn1">
				<h1>MEMBER BENEFITS</h1>
					<ul>
						<li>Free Cupcake on your birthday</li>
						<li>Save points for special promotions</li>
						<li>Special Members Only events and coupons</li>
						<li>So much more...</li>
					</ul>
				</div>
				<div class="bcolumn2">
					<form id="form" onsubmit="return ValidateForm()" action="register.php" method="post">
						<h1>SIGN UP<span id="required" style="display: none">&nbsp;*Please fill in the highlighted field</span></h1>
						<label for="firstname">FIRST NAME</label>
						<input type="text" id="firstname" name="firstname">
						<br>
						<label for="lastname">LAST NAME</label>
						<input type="text" id="lastname" name="lastname">
						<br>
						<label for="email">EMAIL<span id="emailInvalid" style="display: none">&nbsp;*Please enter a valid email</span></label>
						<input type="text" id="email" name="email">
						<br>
						<label for="phonenum">PHONE NUMBER<span id="phoneInvalid" style="display: none">&nbsp;*Please enter a valid phone number</span></label>
						<input type="text" id="phonenum" name="phonenum">
						<br>
						<label for="birthday">BIRTHDAY</label>
						<br>
						<input type="date" id="birthday" name="bday">
						<br>
                        <br>
						<label for="password">PASSWORD</label>
						<label for="password">PASSWORD<span id="pwInvalid" style="display: none">&nbsp;Must be 4-8 characters, with at least one digit, and one uppercase letter</span></label>
						<br>
					    <input type="password" id="password1" name="password1" onblur="ValidateForm()"><br><span id="match"></span>
                        <br>
						<br>
						<label for="password">CONFIRM PASSWORD</label>
						<br>
						<input type="password" id="password2" name="password2" onblur="ValidateForm()"><span id="nomatch"></span>
						<br>
                        <br>
						<input type="submit">
						<br>
						<a href="login.php">Already a member?</a>
					</form>
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
		
