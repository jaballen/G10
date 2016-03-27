<?php
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

	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_LOGIN']);
	session_write_close();
	header("Location:./index.php");
	exit();
?>
