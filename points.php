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
	
	$receipt = clean($_POST['receiptno']);

	$updaterec = "UPDATE receipts SET count='1' WHERE number = '$receipt'";
	@mysql_query($updaterec);
	$update = mysql_query($updaterec);
	$updatearray = mysql_fetch_assoc($update);	
	$count = $updatearray['count'];
	
	if ($count = 1) { //checks if they've redeemed already. if so, $count will be > 1. count initialized to 0. 	
		$points = "SELECT points FROM receipts WHERE number = '$receipt'";	
		//@mysql_query($points);
		
		$getpoints = mysql_query($points);
		$pointsarray = mysql_fetch_assoc($getpoints);
		$p = $pointsarray['points'];
		
		$setpoints = "UPDATE users SET points=points+ '$p' WHERE number = '$receipt'";
		@mysql_query($setpoints);
		
		header("Location:./members.php");
		exit();
	} else {
		echo "Already redeemed points";
	}
	
	
?>
