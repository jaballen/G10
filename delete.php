<?php
	//Start session
	session_start();

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	$server = 'bcitdevcom.ipagemysql.com';
	$username = 'comp15362014';
	$password = '2014-1536';
	$database = '1536forum';
	
	//Connect to mysql server
	$conn= mysql_connect($server, $username, $password);	
	if(!$conn) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	mysql_select_db($database, $conn);
	$sel = mysql_select_db($database, $conn);
	if(!$sel) {
		die('Unable to select database');
	}
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);	
	}
	
	$fname = clean($_POST['firstname']);
	$lname = clean($_POST['lastname']);
	$email = clean($_POST['email']);
	//$phone = clean($_POST['phone']);
	//$birthday = clean($_POST['birthday']);
	$password = md5(clean($_POST['deregpword']));

	
	$insert = "INSERT INTO members(firstname, lastname, login, passwd)
	VALUES ('$fname', '$lname', '$email', '$password')";
	
	@mysql_query($insert);
	$result = mysql_query($insert);
	if ($result) {
		//echo "New record created successfully";
		header("Location:./reg_complete.php");
		
	} else {
		echo "Error: ". mysql_error($conn);
	}
	
	if($result) {
		header("Location:./login.php");
		exit();
	} else {
		die("Query failed");
	}
	
	
?>
