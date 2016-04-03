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
	
		$receipt = clean($_POST['receiptno']);
		
		$getcount = "SELECT count FROM receipts WHERE number = '$receipt'";
		$get = mysql_query($getcount) or die('Unable to get count');
		$getarray = mysql_fetch_assoc($get);	
		$count = $getarray['count'];
		
	//checks if they've redeemed already. if so, $count will be > 1. count initialized to 0 in database. 		
	if ($count == 0) 
	{ 
		$value = "SELECT value FROM receipts WHERE number = '$receipt'";			
		$getvalue = mysql_query($value);
		$valuearray = mysql_fetch_assoc($getvalue);
		$p = $valuearray['value'];
		
		$updaterec = "UPDATE receipts SET count=count+'1' WHERE number = '$receipt'";
		$update = mysql_query($updaterec);
		@mysql_query($updaterec) or die('Unable to select update receipt');
		
		$sessemail = $_SESSION['SESS_LOGIN'];
		$setpoints = "UPDATE members SET points=points+ '$p' WHERE email = '$sessemail'" ;
		@mysql_query($setpoints) or die('Unable to select update points');	
		header("Location:./members.php");
		exit();
	} else {
		$errmsg_arr[] = 'Already redeemed points.';
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		header("Location: ./members.php");
		exit();		
	}

?>
