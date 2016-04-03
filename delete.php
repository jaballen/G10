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
	
	$password = clean($_POST['deregpword']);

	$delete = "DELETE FROM members WHERE email = '".$_SESSION['SESS_LOGIN']."' AND password = '$password'";
	$select = "SELECT * FROM members WHERE email = '".$_SESSION['SESS_LOGIN']."' AND password = '$password'";

	$result = mysql_query($select);
	$num_matches= mysql_num_rows($result);
		
	if ($num_matches == 1) 
	{
		@mysql_query($delete);
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_FIRST_NAME']);
		unset($_SESSION['SESS_LAST_NAME']);
		session_write_close();
		header("Location:./dereg_complete.php");
		exit();		
	} else {
		$errmsg_arr[] = 'Password is incorrect.';
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		header("Location: ./dereg.php");
		exit();		
	}
	
?>
