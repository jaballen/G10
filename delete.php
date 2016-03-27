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

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);	
	}
	
	$email = clean($_POST['deregemail']);
	$password = clean($_POST['deregpword']);

	$delete = "DELETE FROM members WHERE email = '$email' AND password = '$password'";
	
	@mysql_query($delete);
	$result = mysql_query($delete);
	if ($result) {
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_FIRST_NAME']);
		unset($_SESSION['SESS_LAST_NAME']);
		session_write_close();
		header("Location:./dereg_complete.php");
		exit();		
	} else {
		echo "Error: ". mysql_error($conn);
	}
	
?>
