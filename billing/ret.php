<html>
<body>
<form method="get" action="#">
invoice:<input type="text" name="invoice" id="invoice">
	<input type="submit" name="submit" value="update"/>

</form>
<?php 
$query=mysql_connect("localhost","root","","billing");
echo "hi";
if(isset($_GET['invoice']))
{
	$invoice = $_GET['invoice'];
	if(isset($_POST['submit']))
	{
		$customer_details = $_POST['customer_details'];
		$date = $_POST['date'];
		$tin = $_POST['customer_tin_number'];
		$query3 = mysql_query("update customer set customer_details = '$customer_details', date = '$date', customer_tin_number = '$tin' where invoice = '$invoice'");
		if($query3)
		{
			header('location : select.php');
		}
	}
	$query1 = mysql_query("select * from customer where invoice = '$invoice'");
	$query4 = mysql_query($query,$query1);
	$query2 = mysql_fetch_array($query4);

?>
	<form method="post" action="#">
	Customer details: <input type="textarea" name="customer_details" value="<?php echo $query['customer_details'];?>"><br>
	Date: <input type="textarea" name="date" value="<?php echo $query['date'];?>"><br>
	Customer tin number: <input type="textarea" name="customer_tin_number" value="<?php echo $query['customer_tin_number'];?>"><br>
	<input type="submit" name="submit" value="update"/>
	</form>
<?php } ?>
</body>
</html>
	
