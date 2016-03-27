<?php

	session_start();
	require_once('config.php');
	
//	function clean($str) {
//		$str = @trim($str);
//		if(get_magic_quotes_gpc()) {
//			$str = stripslashes($str);
//		}
//		return mysql_real_escape_string($str);	
//	}
	
	$email = $_POST['useremail'];
	$pword = $_POST['pword'];

	if ( isset($email) && isset($pword) )
	{
		$conn= mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	
		if(!$conn) {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		mysql_select_db(DB_DATABASE, $conn);
		$sel = mysql_select_db(DB_DATABASE, $conn);
		if(!$sel) {
			die('Unable to select database');
		}
		
		$sql = "SELECT * FROM members WHERE email = '$email' AND password = '$pword'";
		$result = mysql_query($sql) or die('Unable to connect.');
		
		$num_matches= mysql_num_rows($result);
		if ($num_matches > 0)
			{
			$auth= true;
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LOGIN'] = $member['email'];
			session_write_close();
			header("Location:./members.php");
		} else {
			echo 'You must enter a valid username & password.';
			exit;
			}
		}
?>