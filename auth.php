<?php

	//Start session
	session_start();

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//assume user is not authenticated
	$auth= false;
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);	
	}
	
	$email = clean($_POST['useremail']);
	$pword = md5(clean($_REQUEST['pword']));

	$server = 'bcitdevcom.ipagemysql.com';
	$username = 'comp15362014';
	$password = '2014-1536';
	$database = '1536forum';

	//if ( isset($email) && isset($password) )
	//{
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
		
		//SQL query to find if this entered username/password is in the db
		$sql = "SELECT * FROM members WHERE login = '$email' AND '".md5($_REQUEST['pword'])."'";
		
		//mysql_query($sql);
		
		//put the SQL command and SQL instructions into variable
		$result = mysql_query($sql) or die('Unable to connect.');
		
		//get number or rows in command; if more than 0, row is found
		$num_matches= mysql_num_rows($result);
		if ($num_matches > 0)
			{
			//matching row found authenticates user
			$auth= true;
			//echo "<br/>You are in!!<br/>";
			}
			
		if (!$auth)
			{
			echo 'You must enter a valid username & password.';
			exit;
			}
		else
			{
			header("Location:./members.php");
		exit();
			}
?>