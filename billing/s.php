<?php
$con = mysql_connect("localhost","root","");
if (!$con)
 { die('Could not connect: ' . mysql_error()); }
mysql_select_db("billing", $con);
$sql="INSERT INTO customer(CUSTOMER_DETAILS,INVOICE, DATE,CUSTOMER_TIN_NUMBER)values('$_GET[address]','$_GET[invoice]','$_GET[date]','$_GET[tin]')" ;
echo $sql;
if (mysql_query($sql,$con))
  { echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; }
//0
$i=$_GET['invoice'];
$it=$_GET['itemname'];
$cost=$_GET['cost'];
$q=$_GET['qty'];
$p=$_GET['price'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
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
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
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
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
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
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
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
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
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
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//6
$i=$_GET['invoice'];
$it=$_GET['itemname6'];
$cost=$_GET['cost6'];
$q=$_GET['qty6'];
$p=$_GET['price6'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 
//7
$i=$_GET['invoice'];
$it=$_GET['itemname7'];
$cost=$_GET['cost7'];
$q=$_GET['qty7'];
$p=$_GET['price7'];
$t=$_GET['total'];
$ta=$_GET['paid'];
$b=$_GET['due'];
$sql="INSERT INTO demo(INVOICE,item_name,cost,quantity, price,total,tax,balance)values('$i','$it','$cost','$q','$p','$t','$ta','$b')";
echo $sql;
if (mysql_query($sql,$con))
  {echo "<script>alert(data stored);</script>"; }
else
  { echo "<script>alert(data not stored);</script>"; } 

?>
