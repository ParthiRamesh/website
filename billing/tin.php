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

}

td{
	padding:5px 5px;
	text-align:center;
}
</style>
<form action="#" method="POST">
<input type="text" name="customer" id="customer" VALUE="" placeholder="CUSTOMER NAME">
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
$customer=$_POST['customer'];
echo"<html>";
echo"<center>";
// echo"<h2>CUSTOMER DETAILS:$customer</h2>";
$customer=$_POST['customer'];

// for($i=1;$i<=$j;$i++){

$sql="SELECT * FROM demo WHERE invoice = $customer ";
echo "hi";
if($res=mysqli_query($con,$sql))
{
echo "hi";

	while(mysqli_num_rows($res)>0)
	{
		echo"<table border=3>";
		echo"<tr>";
		echo"<th>ITEM NAME</th>";
		echo"<th>COST</th>";
		echo"<th>QUANTITY</th>";
		echo"<th>PRICE</th>";
		echo"</tr>";
		while($row=mysqli_fetch_array($res))
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