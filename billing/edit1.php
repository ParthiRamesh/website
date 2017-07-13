 <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title> PHP SEARCH DATA USING PDO</title>
    </head>
    <body>
            customer_details:  <input type="text" name="customer_details"value="<?php echo $customer_details;?>"><br><br>
   date:  <input type="text" name="date"value="<?php echo $date;?>"><br><br>
           customer_tin_number:  <input type="text" name="customer_tin_number"value="<?php echo $customer_tin_number;?>"><br><br>
       <input type="submit" name="find" value="find data">
                          
                    

		</body>
		</html>
</style>
<form action="#" method="POST">
<input type="text" name="invoice" id="invoice" VALUE="" placeholder="invoice">
<input type="submit">
</form>
</style>
<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','','billing');
if($con==false)
{
	die("Error".mysqli_connect_error());	
}
$invoice=$_POST['invoice'];

         $customer_details = "";
         $date = "";
         $customer_tin_number = "";
		 $pdoQuery = "SELECT * from customer WHERE invoice=:invoice";
$pdoResult = $pdoconnect->prepare($pdoQuery);
$pdoExec = $pdoResult->execute(array(":invoice"=>$invoice));
if($pdoExec)
{
  if($pdoResult->rowcount()>0)
  {
      foreach($pdoResult as $row)
      {
         $customer_details = $row['customer_details'];
         $date = $row['date'];
         $customer_tin_number = $row['customer_tin_number'];
      }
  }
  else
      {
      echo'No Data With This Id';
  }
 }
 ?>
