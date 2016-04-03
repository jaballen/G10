<?php
	session_start();
	require_once('config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	$email = $_POST['useremail'];
	$pword = $_POST['pword'];

	if ( isset($email) && isset($pword) )
	{
		$conn= mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);	
		if(!$conn) {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$sel = mysql_select_db(DB_DATABASE, $conn);
		if(!$sel) {
			die('Unable to select database');
		}
		
		$sql = "SELECT * FROM members WHERE email = '$email' AND password = '$pword'";
		$result = mysql_query($sql) or die('Unable to connect.');
		
		$num_matches= mysql_num_rows($result);
		if ($num_matches == 1)
		{
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['firstname'];
			$_SESSION['SESS_LAST_NAME'] = $member['lastname'];
			$_SESSION['SESS_LOGIN'] = $member['email'];
			session_write_close();
			header("Location:./members.php");
		} else {
			$errmsg_arr[] = 'Login failed. Email and password do not match.';
			$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
			header("Location: ./login.php");
			exit();
		}
	}
?>