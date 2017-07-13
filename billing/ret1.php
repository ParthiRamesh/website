<html>
<body>
<form method="POST" action="#">
invoice:<input type="text" name="invoice" id="invoice">
	<input type="submit" name="submit" value="update"/>

</form>
<?php 
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$in=$_POST['invoice'];
echo"<html>";
echo"<center>";
echo"<h2>INVOICE:$in</h2>";
echo"<form method='post' action='update.php'>";
$in=$_POST['invoice'];
$sql="SELECT * FROM customer WHERE invoice='$in' ";

if($res=mysqli_query($con,$sql))
{
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_array($res))
		{
			echo"<h2>CUSTOMER DETAILS: </h2>";
						echo"<input type='text' name='invoice' value=".$row['invoice']." readonly >";
			echo"<input type='text' name='customer_details' value=".$row['customer_details'].">";
			echo"<input type='text' name='date' value=".$row['date'].">";
			echo"<input type='text' name='customer_tin_number' value=".$row['customer_tin_number'].">";
			
		}
		mysqli_free_result($res);
		echo"<input type='submit'>";
		echo"</form>";
	}
	else
	{
		echo"no records matching your query were found";
	}
}
else
{
	echo"ERROR: Could not able to execute $sql".mysqli_error($con);
	
}
mysqli_close($con);


?>