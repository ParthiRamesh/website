<style>
 input[type="text"] {
            margin-bottom: -1px;
			width:10%;
			padding:12px 20px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
		 
input[type="submit"]{
			 background-color:#4CAF50;
			 color:white;
			 padding:14px 20px;
			 margin:8px 0;
			 border:none;
			 cursor:pointer;
			 width:10%;
			 
		 }

th{
	padding:10px 10px;
	height:50px;
	text-align:center;
	background-color:grey;

}

td{
	padding:5px 5px;
	text-align:center;
}
</style>
<form action="#" method="POST">
<input type="text" name="invoice" id="invoice" VALUE="" placeholder="invoice">
<input type="submit">
<input type="button" value="Back" class = "form-control" style="float:right; color:red" onclick="window.location.href='retrive.html'">
<input type="button" value="Logout" class = "form-control" style="float:right; color:red" onclick="window.location.href='logout.php'">
 <input type="button" value="Home" class = "form-control" style="float:right; color:red" onclick="window.location.href='hl.html'">
<!--<a href = "logout.php" title = "Logout" style="float:right">Logout>></a>-->
</form>
<?php
   ob_start();
   session_start();
?>
<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$in=$_POST['invoice'];
echo"<html>";
echo"<title>GPP-Customer Report</title>";

echo"<center>";
echo"<h2>INVOICE:$in</h2>";
$in=$_POST['invoice'];
$sql="SELECT * FROM customer WHERE invoice='$in' ";
if($res=mysqli_query($con,$sql))
{

	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_array($res))
		{
			echo"<h2>CUSTOMER DETAILS: </h2>";
			echo"<h2>".$row['customer_details']."</h2>";
			echo"<h4>DATE: ".$row['date']."</h4>";
			echo"<h4>TIN NUMBER: ".$row['customer_tin_number']."</h4>";
		}
		mysqli_free_result($res);
	}
}
$sql="SELECT * FROM demo WHERE invoice='$in' ";

if($result=mysqli_query($con,$sql))
{
	if(mysqli_num_rows($result)>0)
	{
		echo"<table border=3>";
		echo"<tr>";
		echo"<th>ITEM NAME</th>";
		echo"<th>COST</th>";
		echo"<th>QUANTITY</th>";
		echo"<th>PRICE</th>";
		echo"</tr>";
		while($row=mysqli_fetch_array($result))
		{
			if(!empty(trim($row['item_name']))){
			echo"</tr>";
			echo"<td>".$row['item_name']."</td>";
			echo"<td>".$row['cost']."</td>";
			echo"<td>".$row['quantity']."</td>";
			echo"<td>".$row['price']."</td>";
			echo"</tr>";
			}
		}
		
		echo"</table>";
		
		mysqli_free_result($result);
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
$sql="SELECT * FROM demo WHERE invoice='$in' ";

if($res1=mysqli_query($con,$sql))
{

	if(mysqli_num_rows($res1)>0)
	{
		if($row=mysqli_fetch_array($res1))
		{
			echo"<h4>TOTAL: ".$row['total']."</h4>";
			echo"<h4>TAX: ".$row['tax']."</h4>";
			echo"<h4>BALANCE: ".$row['balance']."</h4>";
		}
		echo"</center>";
		echo"</html>";
		mysqli_free_result($res1);
	}
}

mysqli_close($con);
?>

<html>
<style>


         button{
			 background-color:#4CAF50;
			 color:white;
			 padding:14px 20px;
			 margin:8px 0;
			 border:none;
			 cursor:pointer;
			 width:20%;
			 
		 }
         
</style>
<center><button onclick="myFunction()">PRINT</button></center>
	<script>
	
	function myFunction(){
		window.print();
	}	
	</script>
</html>