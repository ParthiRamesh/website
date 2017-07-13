<html>
<head>
<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	
</head>
<body>
<form method="GET" action="#">
	<input type="submit" name="submit"  value="Refresh" style="background-color:green; color:white; width:10%; padding:12px 15px;"/>
 <input type="button" value="Home" class = "form-control" style="background-color:green; color:white; width:10%; padding:12px 15px;" onclick="window.location.href='hl.html'">
</form>
<?php
   ob_start();
   session_start();
?>
<?php
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$sql="DELETE from demo where cost=0";
	if($result=mysqli_query($con,$sql))
	{
			echo" ";	
	}
?>
