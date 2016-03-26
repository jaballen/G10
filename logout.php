<?php
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
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	session_write_close();
	header("Location:./index.php");
	exit();
?>
