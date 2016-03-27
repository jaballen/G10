<?php
	session_start();
	require_once('config.php');
	
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
	$birthday = clean($_POST['bday']);
	$pword = clean($_POST['password1']);

	$insert = "INSERT INTO members(firstname, lastname, email, phone, birthday,
	password, points)
	VALUES ('$fname', '$lname', '$email', '$phone', '$birthday', '$pword', '0')";
	
	$result = mysql_query($insert);
	if ($result) {
		header("Location:./reg_complete.php");
		exit();
	} else {
		echo "Error: ". mysql_error($conn);
	}
	
?>
