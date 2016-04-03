<?php
	session_start();
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	$conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	
	if(!$conn) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	$sel = mysql_select_db(DB_DATABASE, $conn);
	if(!$sel) {
		die('Unable to select database');
	}
	
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
	$phone = clean($_POST['phonenum']);
	$date= clean($_POST['eventdate']);
	$about = clean($_POST['aboutus']);
	$order = clean($_POST['orderdesc']);
	
	$insert = "INSERT INTO orders(firstname, lastname, email, phone, odate,
	about, details) VALUES ('$fname', '$lname', '$email', '$phone', '$date', '$about', '$order')";
	$result = mysql_query($insert);
	
	if ($result) {
		header("Location:./order_thanks.php");
		exit();
	} else {
		echo "Error: ". mysql_error($conn);
		exit();
	}
			
?>
		
		
		
