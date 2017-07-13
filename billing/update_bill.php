
        <script type="text/javascript">
        function codeAddress() {
            alert('ok');
        }
        </script>
		
    <body onload="codeAddress();">
    
    </body>
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
$sql1="UPDATE customer set customer_details='$_POST[address]',date='$_POST[date]',customer_tin_number='$_POST[tin]' where invoice='$_POST[invoice]'";
if(mysqli_query($con,$sql1))
	{
		echo "Customers Record updated successfully<br>";
	}
$productcount=$_POST['productcount'];
for($i=1;$i<=$productcount;$i++){
	$cost="cost".$i."";
	$invoice="invoice".$i."";
	$quantity="quantity".$i."";
	$price="price".$i."";
	$total="total".$i."";
	$tax="paid".$i."";
	//$tax1="paid1".$i"";
	$balance="balance".$i."";
	$item_name="item_name".$i."";
	$sql="UPDATE demo set customer_details='$_POST[address]',cost='$_POST[$cost]', quantity='$_POST[$quantity]', price ='$_POST[$price]',total ='$_POST[$total]',tax ='$_POST[$tax]',                 tax1 = '$_POST[$tax1]',balance ='$_POST[$balance]',date='$_POST[date]' where invoice='$_POST[$invoice]' and item_name ='$_POST[$item_name]';";
	if(mysqli_query($con,$sql))
	{
		echo "Records updated successfully".$i."<br>";
	}
}
/*$sql="UPDATE demo set cost='$_POST[cost]', quantity='$_POST[quantity]', price ='$_POST[price]',total ='$_POST[total]',tax ='$_POST[tax]',balance ='$_POST[balance]' where invoice='$_POST[invoice]' and item_name ='$_POST[item_name]';";
if(mysqli_query($con,$sql))
{
	echo "Records updated successfully";
	//header('Location:edit_index.php?invoice='.$_POST[invoice].'');
}
else{
	echo "ERROR:could not able to execute";
}*/
header('Location:edit_index.php?invoice='.$_POST[invoice].'');
?>