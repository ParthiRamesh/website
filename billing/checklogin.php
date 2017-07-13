<?php
	$host="localhost"; // Host name
	$username="root"; // Mysql default username
	//$password=""; // Mysql No password
	$db_name="billing"; // Database name
	$tbl_name="login"; // Table name
	// Connect to server and select databse.
	mysql_connect("$host", "$username")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	// username and password sent from form
	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1)
		echo "Welcome To Our Web Page";
	else 
		echo "Wrong Username or Password";
?>
