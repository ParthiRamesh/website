
<style>
 input[type="date"] {
            margin-bottom: -1px;
			width:15%;
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
	height:50px;
	padding:5px 10px;
	text-align:center;
	background-color:grey;
}

td{
	padding:5px 5px;
	text-align:center;

}
td:hover{background-color:#cce0ff}

</style>

<form action="#" method="POST">
<center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="from" id="from" VALUE="" placeholder="from date">

<input type="date" name="to" id="to" VALUE="" placeholder="to date">
<input type="button" value="Back" class = "form-control" style="float:right; color:red" onclick="window.location.href='retrive.html'">
<input type="button" value="Logout" class = "form-control" style="float:right; color:red" onclick="window.location.href='logout.php'">
<input type="button" value="Home" class = "form-control" style="float:right; color:red" onclick="window.location.href='hl.html'">
<br>
<input type="submit">
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
$start=$_POST['from'];
$end=$_POST['to'];
echo"<html>";
echo"<title>GPP-Monthly Report</title>";

echo"<center>";
echo"<h2>DATE:&nbsp;$start </h2>";
echo"<h2>  to  </h2>";
echo"<h2>DATE:&nbsp;$end</h2>";
$in=$_POST['invoice'];
$start=$_POST['from'];
$end=$_POST['to'];
//date
//$sql="SELECT * FROM customer WHEE between date>='$from' AND date<='$to'";
$sql = "select * from customer join demo on (demo.invoice = customer.invoice) GROUP BY demo.invoice HAVING demo.date>='$start' AND demo.date<='$end' ORDER BY demo.invoice"; //DESC";
// $sql="SELECT * FROM customer WHERE date>='$from' AND date<='$to' ;";
//$sql ="SELECT DISTINCT FROM demo WHERE date>='$from' AND date<='$to' ";

//$sql="SELECT * FROM demo WHERE invoice='$in' ";
// print_r(array_unique($sql));
if(mysqli_multi_query($con,$sql))
{
	
		
 if($res=mysqli_store_result($con)){
	echo"<table border=6>";
		echo"<tr>";
		echo"<th>DATE</th>";
		echo"<th>CUSTOMER DETAILS </th>";
		echo"<th><center>INVOICE</center></th>";
		echo"<th>TIN NUMBER</th>";
		echo"<th>BASIC AMOUNT</th>";
		echo"<th>TAX AMOUNT</th>";
		echo"<th>OTHERS</th>";
		echo"<th>TOTAL BALANCE</th>";
		echo"</tr>";
		$final=0;
	if(mysqli_num_rows($res)>0)
	{
		
		while($row=mysqli_fetch_array($res))
		{
			
			echo"</tr class='final'>";
			echo"<td>".$row['date']."</td>";
			echo"<td>".$row['customer_details']."</td>";
			echo"<td><center>".$row['invoice']."</center></td>";
			echo"<td>".$row['customer_tin_number']."</td>";
			echo"<td>".$row['total']."</td>";
			echo"<td>".$row['tax_value']."</td>";
			echo"<td>".$row['extra']."</td>";
			echo"<td>".$row['balance']."</td>";
					
			//
			$final=$final + $row['total'];
			
			echo"</tr>";

		}
		
		echo"</table>";
		echo"<br>";
		echo"<table border=4>";
		echo"<tr><td><b>MONTHLY TOTAL</b></td>";
		echo"<td>$final</td></tr>";
		echo"</table>";
		echo"</center>";
		echo"</html>";
		mysqli_free_result($res1);
	}
 }
	
}
mysqli_close($con);
?>
<html>
	<script type='text/javascript' src='js/report.js'></script> 

<style>


         button{
			 background-color:#4CAF50;
			 color:white;
			 padding:14px 20px;
			 margin:8px 0;
			 border:none;
			 cursor:pointer;
			 width:10%;
			 
		 }
         
</style>
<center><button onclick="myFunction()">PRINT</button></center>
	<script>
	
	function myFunction(){
		window.print();
	}	
	</script>
</html>