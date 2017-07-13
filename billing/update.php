<?php
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$sql="UPDATE customer set customer_details ='$_POST[customer_details]', date='$_POST[date]', customer_tin_number='$_POST[customer_tin_number]' where invoice='$_POST[invoice]';";
if(mysqli_query($con,$sql))
{
	echo "Records updated successfully";
}
else{
	echo "ERROR:could not able to execute";
}
?>