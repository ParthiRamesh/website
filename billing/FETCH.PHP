<html>
<body>
<form action="#" method="POST">
<input type="date" name="from" id="from" VALUE="" placeholder="from date">

<input type="date" name="to" id="to" VALUE="" placeholder="to date">
<input type="submit">
</form>
</body>
</html>
<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$from=$_POST['from'];
$to=$_POST['to'];
echo"<html>";
echo"<center>";
echo"<h2>DATE:$from to DATE:$to</h2>";
$in=$_POST['customer.invoice'];
$from=$_POST['from'];
$to=$_POST['to'];
//$sql="SELECT * FROM customer WHERE date>='$from' AND date<='$to'";
//$sql=" SELECT * FROM demo WHERE date>='$from' AND date<='$to' ";
//$sql="SELECT c.*,d.* FROM customer c,demo d WHERE date>='$from' AND date<='$to'";
echo $sql;
$sql="select customer.customer_details, customer.customer_tin_number, demo.tax, demo.total, demo.balance from (select customer.date from customer union select demo.date from demo) as tabkey left join customer on tabkey.date=customer.date left join demo on tabkey.date=demo.date";
//$sql="SELECT * FROM demo WHERE invoice='$in' ";

if($res=mysqli_query($con,$sql))
{

	echo"<table border=6>";
		echo"<tr>";
		echo"<th>CUSTOMER DETAILS</th>";
		echo"<th>TIN NUMBER</th>";
		echo"</tr>";
	if(mysqli_num_rows($res)<1)
	{
		
		while($row=mysqli_fetch_array($res))
		{
			echo"</tr>";
			echo"<td>".$row['customer_details']."</td>";
			echo"<td>".$row['customer_tin_number']."</td>";
            //echo"<td>".$row['tax']."</td>";
			echo"</tr>";

		}
		echo"</center>";
		echo"</html>";
		mysqli_free_result($res1);
	}
 
}
mysqli_close($con);
?>
