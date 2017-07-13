<?php
   ob_start();
   session_start();
?>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
 { die('Could not connect: ' . mysql_error()); }
mysql_select_db("billing", $con);
$sql="INSERT INTO customer(CUSTOMER_DETAILS,INVOICE, DATE,customer_tin_number)values('$_GET[address]','$_GET[invoice]','$_GET[date]','$_GET[tin]')" ;
if (mysql_query($sql,$con))
  { echo "<script>alert(data stored);</script>"; 
//0
$i=$_GET['invoice'];
$it=$_GET['itemname'];
$cost=$_GET['cost'];
$q=$_GET['qty'];
$p=$_GET['price'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql0="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql0,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
  
//1
$i=$_GET['invoice'];
$it=$_GET['itemname1'];
$cost=$_GET['cost1'];
$q=$_GET['qty1'];
$p=$_GET['price1'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql1="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql1,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//2
$i=$_GET['invoice'];
$it=$_GET['itemname2'];
$cost=$_GET['cost2'];
$q=$_GET['qty2'];
$p=$_GET['price2'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql2="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql2,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//3
$i=$_GET['invoice'];
$it=$_GET['itemname3'];
$cost=$_GET['cost3'];
$q=$_GET['qty3'];
$p=$_GET['price3'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql3="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql3,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//4
$i=$_GET['invoice'];
$it=$_GET['itemname4'];
$cost=$_GET['cost4'];
$q=$_GET['qty4'];
$p=$_GET['price4'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql4="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql4,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//5
$i=$_GET['invoice'];
$it=$_GET['itemname5'];
$cost=$_GET['cost5'];
$q=$_GET['qty5'];
$p=$_GET['price5'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$d=$_GET['date'];
$extra=$_GET['extra'];
$tv=$_GET['tax'];
$tv1=$_GET['tax1'];
$ta1=$_GET['paid1'];
$sql5="INSERT INTO demo(INVOICE,CUSTOMER_DETAILS,item_name,cost,quantity, price,total,tax,tax1,balance,date,extra,tax_value,tax_value1)values('$i','$_GET[address]','$it','$cost','$q','$p','$t','$ta','$ta1','$b','$d','$extra','$tv','$tv1')";
if (mysql_query($sql5,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 

if (mysql_query($sql6,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 

}

else
  { echo "<script>alert(data not stored);</script>"; }
if($con==true)
{
			header("location:index.html"); 
			//header('Location:edit_index.html?invoice='.$_POST[invoice].'');

}
else
{
			header("location:index.html"); 
			

}
						// //header('Location:edit_index.html?invoice='.$_POST[invoice].'');

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
