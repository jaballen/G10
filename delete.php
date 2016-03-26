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
	
	$email = clean($_POST['deregemail']);
	$password = md5(clean($_POST['deregpword']));

	
	$delete = "DELETE FROM members WHERE login = '$email' AND passwd = '$password'";
	
	@mysql_query($delete);
	$result = mysql_query($delete);
	if ($result) {
		//echo "record deleted";
		//Unset the variables stored in session
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
